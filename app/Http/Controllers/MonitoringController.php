<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\DetailAset;
use App\Models\Lokasi;
use App\Models\PenanggungJawab;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Exports\MonitoringExport;
use Maatwebsite\Excel\Facades\Excel;

class MonitoringController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $mo = Monitoring::select('id_detail_aset', 'da.kode_aset')
            ->addSelect(DB::raw('COUNT(monitoring.id) AS jumlah'))
            ->join('detail_aset as da', 'id_detail_aset', '=', 'da.id')
            ->groupBy('id_detail_aset')
            ->get();
        // return response()->json($data);
        return view('pages.Monitoring.index', compact('mo'));
    }
    public function listmonitoring($id_detail_aset)
    {
        $detail = Monitoring::select('id_detail_aset', 'da.kode_aset')
            ->join('detail_aset as da', 'id_detail_aset', '=', 'da.id')
            ->where('id_detail_aset', $id_detail_aset)
            ->first();
        $mo = Monitoring::where('id_detail_aset', $id_detail_aset)->get();
        return view('pages.Monitoring.listmonitoring', compact('mo', 'detail'));
    }

    public function create()
    {
        $da = DetailAset::all()->sortBy('kode_aset');
        $L = Lokasi::all();
        return view('pages.Monitoring.create', compact('da','L'));
    }

    public function create2($id)
    {
        $da = DetailAset::findOrFail($id);
        $L = Lokasi::all();
        $pj = PenanggungJawab::all();
        return view('pages.Monitoring.create2', compact('da','L','pj'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_detail_aset' =>'required',
            'tanggal_monitoring' => 'required',
            'deskripsi' => 'required',
            'id_penanggung_jawab' => 'required',
        ]);

        $monitoring = new Monitoring([
            'tanggal_monitoring' => Carbon::createFromFormat('d-m-Y', $request['tanggal_monitoring']),
            'deskripsi' => $request->deskripsi,
            'id_penanggung_jawab' => $request->id_penanggung_jawab,
        ]);

        $da = DetailAset::find($request->id_detail_aset);
        
        $monitoring->id_detail_aset = $request['id_detail_aset'];
        if ($monitoring->save()) {
            $da->save();
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }

        return redirect(route('Monitoring.index'));
    }

    public function edit($id)
    {
        // $monitoring = Monitoring::find($id);
        // $da = DetailAset::all()->sortBy('kode_aset');
        // return view('pages.Monitoring.edit', compact('monitoring', 'da'));
    }
    public function update(Request $request, $id)
    {
        // $detail = DetailAset::where('id', $request['id_detail_aset'])->first();
        // $data_monitoring = Monitoring::where('id', $id)->first();
        // if ($data_monitoring->foto != null && Storage::exists($data_monitoring->foto)) {
        //     $request->validate([
        //         'id_detail_aset' => 'required',
        //         'tanggal_monitoring' => 'required|date',
        //         'kondisi' => 'required',
        //         'deskripsi' => 'required'
        //     ]);
        // } else if ($data_monitoring->foto != null && !Storage::exists($data_monitoring->foto)) {
        //     $request->validate([
        //         'id_detail_aset' => 'required',
        //         'tanggal_monitoring' => 'required|date',
        //         'kondisi' => 'required',
        //         'deskripsi' => 'required',
        //         'foto' => 'required|file|mimes:pdf'
        //     ]);
        // } else {
        //     $request->validate([
        //         'id_detail_aset' => 'required',
        //         'tanggal_monitoring' => 'required|date',
        //         'kondisi' => 'required',
        //         'deskripsi' => 'required',
        //         'foto' => 'required|file|mimes:pdf'
        //     ]);
        // }
        // $identitas = $detail->kode_aset;
        // $data_monitoring->id_detail_aset= $request['id_detail_aset'];
        // if ($request->has('tanggal_monitoring')) {
        //     $data_monitoring->tanggal_monitoring = Carbon::createFromFormat('d-m-Y', $request['tanggal_monitoring']);
        // } else {
        //     $data_monitoring->tanggal_monitoring = $request['tanggal_monitoring'];
        // }
        // $data_monitoring->kondisi = $request['kondisi'];
        // $data_monitoring->deskripsi = $request['deskripsi'];
        // if ($request->has('foto') && $request->foto != '') {
        //     $file = $request->file('foto');
        //     $name = 'Foto_' . $identitas . '_' . $request['tanggal_monitoring'] . '-' . $this->getTanggal('date') . '.' . $file->extension();

        //     if (Storage::exists($data_monitoring->foto)) {
        //         Storage::delete($data_monitoring->foto);
        //     }
        //     $url = Storage::putFileAs('public/detailAset/' . $identitas . '/Dokumen/Monitoring', $file, $name);
        //     $data_monitoring->foto = $url;
        // }
        // if ($data_monitoring->save()) {
        //     alert('Data Berhasil Terupdate!')->background('#B5EDCC');
        // } else {
        //     alert('Update Data Gagal!')->background('#F4CACA');
        // }
        // return redirect(route('Monitoring.list', $request->id_detail_aset));
    }

    public function show($id)
    {
        $monitoring = Monitoring::with('detailAset')->find($id);
        $da = $monitoring->detailAset;
        return view('pages.Monitoring.detail', compact('monitoring', 'da'));
    }
    public function destroy($id)
    {
        $mon = Monitoring::where('id', $id)->first();
        if (Storage::exists($mon->foto)) {
            Storage::delete($mon->foto);
        }
        $mon->delete();
    }
    public function destroyall($id)
    {
        $mon = Monitoring::where('id_detail_aset', $id);
        $data = $mon->get();
        foreach ($data as $dat) {
            if (Storage::exists($dat->foto)) {
                Storage::delete($dat->foto);
            }
        }
        $mon->delete();
    }
    public function export()
    {
        $nama = 'report-monitoring-' . $this->getTanggal('datetime');

        $data = Monitoring::join('detail_aset', 'detail_aset.id', 'monitoring.id_detail_aset')
            ->select([
                'detail_aset.kode_aset',
                'tanggal_monitoring',
                'kondisi',
                'deskripsi',
                'foto',
            ])
            ->get();
        // return response()->json($a);
        if (!empty($data[0]['tanggal_monitoring'])) {
            return Excel::download(new MonitoringExport($data), $nama . '.xlsx');
        } else {
            alert('Data Monitoring Tidak Ditemukan!')->background('#df6464');
            return redirect()->back();
        }
    }
    
    public function scan(){
        return view('pages.Monitoring.scan');
    }

    public function validasi(Request $request){
        $qr = $request->qr_code;
        $data = DetailAset::where('id', $qr)->pluck('id')->first();
        if($qr == $data){
            return response()->json([
                'status' => 200,
                'qr_code' => $qr,
                'redirect' => route('Monitoring.create2', $qr),
            ]);
        } else{
            return response()->json([
                'status' => 400,
            ]);
        }
    }

    public function getTanggal($tipe)
    {
        if ($tipe == 'date') {
            return Carbon::now()->format('d-m-Y');
        } else if ($tipe == 'datetime') {
            return Carbon::now()->format('d-m-Y-H-i-m');
        }
    }
}

