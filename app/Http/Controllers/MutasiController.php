<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\DetailAset;
use App\Models\Lokasi;
use App\Models\BeritaAcara;
use App\Models\Divisi;
use App\Models\JenisBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class MutasiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $mu = Mutasi::select('id_detail_aset', 'da.kode_aset')
            ->addSelect(DB::raw('COUNT(mutasi.id) AS jumlah'))
            ->join('detail_aset as da', 'id_detail_aset', '=', 'da.id')
            ->groupBy('id_detail_aset')
            ->get();
        // return response()->json($data);
        return view('pages.Mutasi.index', compact('mu'));
    }
    public function listmutasi($id_detail_aset)
    {
        $detail = Mutasi::select('id_detail_aset', 'da.kode_aset')
            ->join('detail_aset as da', 'id_detail_aset', '=', 'da.id')
            ->where('id_detail_aset', $id_detail_aset)
            ->first();
        $mu = Mutasi::where('id_detail_aset', $id_detail_aset)->get();
        return view('pages.Mutasi.listmutasi', compact('mu', 'detail'));
    }

    public function create()
    {
        
    }
    public function create3($id)
    {
        $da = DetailAset::findOrFail($id);
        $ba = BeritaAcara::all()->sortBy('kode_berita_acara');
        $L = Lokasi::all()->sortBy('nama_lokasi');
        $d = Divisi::all()->sortBy('nama_divisi');
        //dd($L);
        return view('pages.Mutasi.create3', compact('da','ba','L','d'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_detail_aset' => 'required',
            'id_berita_acara' => 'required',
            'lokasi_lama' => 'required',
            'tgl_mutasi' => 'required',
            'kode_aset_lama' =>'required',
        ]);
        $mutasi = new Mutasi([
            'id_berita_acara' => $request->id_berita_acara,
            'lokasi_lama' => $request->lokasi_lama, 
            'tgl_mutasi' => Carbon::createFromFormat('d-m-Y', $request['tgl_mutasi']),
            'deskripsi' => $request->deskripsi,
        ]);
        $da = DetailAset::find($request->id_detail_aset);
        $mutasi->id_detail_aset = $request['id_detail_aset'];

        if ($mutasi->save()) {
            $da->save();
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }

        return redirect(route('Mutasi.index'));
    }

    public function create2($id)
    {
        $da = DetailAset::findOrFail($id);
        $ba = BeritaAcara::all()->sortBy('kode_berita_acara');
        $L = Lokasi::all()->sortBy('nama_lokasi');
        $d = Divisi::all()->sortBy('nama_divisi');
        // dd($da);
        return view('pages.Mutasi.create2', compact('da','ba','L','d'));
    }

    public function store2(Request $request)
    {
        $validate = $request->validate([
            'id_detail_aset' => 'required',
            'id_berita_acara' => 'required',
            'tgl_mutasi' => 'required',
        ]);
        $mutasi = new Mutasi([
            'id_berita_acara' => $request->id_berita_acara,
            'tgl_mutasi' => Carbon::createFromFormat('d-m-Y', $request['tgl_mutasi']),
        ]);
        $da = DetailAset::find($request->id_detail_aset);
        $mutasi->id_detail_aset = $request['id_detail_aset'];

        if ($mutasi->save()) {
            $da->save();
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }

        return redirect(route('Mutasi.index'));
    }

    public function edit($id)
    {
        $mutasi = Mutasi::find($id);
        $da = DetailAset::all()->sortBy('kode_aset');
        $ba = BeritaAcara::all();
        $L = Lokasi::all();
        return view('pages.Mutasi.edit', compact('mutasi', 'da','ba','L'));
    }
    public function update(Request $request, $id)
    {
        $da = DetailAset::find($request->id_detail_aset);
        $data_mutasi = Mutasi::where('id', $id)->first();
        $request->validate([
            'id_detail_aset' => 'required',
            'id_berita_acara' => 'required',
            'tgl_mutasi' => 'required',
        ]);
        $data_mutasi->id_detail_aset = $request['id_detail_aset'];
        $data_mutasi->id_berita_acara = $request['id_berita_acara'];
        $data_mutasi->lokasi_lama = $request['lokasi_lama'];
        if ($request->has('tgl_mutasi')) {
            $data_mutasi->tgl_mutasi = Carbon::createFromFormat('d-m-Y', $request['tgl_mutasi']);
        } else {
            $data_mutasi->tgl_mutasi = $request['tgl_mutasi'];
        }
        if ($data_mutasi->save()) {
            alert('Data Berhasil Terupdate!')->background('#B5EDCC');
        } else {
            alert('Update Data Gagal!')->background('#F4CACA');
        }
        return redirect(route('Mutasi.list', $request->id_detail_aset));
    }


    public function show($id)
    {
        $mutasi = Mutasi::with('detailAset')->find($id);
        $da = $mutasi->detailAset;
        return view('pages.Mutasi.detail', compact('mutasi', 'da'));
    }
    public function destroy($id)
    {
        $mut = Mutasi::where('id', $id)->first();
        
        $mut->delete();
    }
    public function destroyall($id)
    {
        $mut = Mutasi::where('id_detail_aset', $id);
        $mut->delete();
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

