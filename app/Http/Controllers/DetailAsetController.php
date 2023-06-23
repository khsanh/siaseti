<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\DetailAset;
use App\Models\Lokasi;
use App\Models\JenisBarang;
use PDF;


class DetailAsetController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $da = DetailAset::all();
        $L = Lokasi::all();

        return view('pages.detailAset.index', compact('da', 'L'));
    }
    public function index2()
    {
        $da = DetailAset::all();
        $L = Lokasi::all();

        return view('pages.prosesMutasi.index', compact('da', 'L'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $da = DetailAset::all();
        $L = Lokasi::all();
        $jb = JenisBarang::all();

        return view('pages.detailAset.create', compact('da','L', 'jb'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nomor_aset' => 'required',
            'kategori_aset' => 'required',
            'id_jenis_barang' => 'required',
            'deskripsi_aset' => 'required',
            'merek_aset' => 'required',
            'tgl_kapitalisasi' => 'required',
            'kondisi' => 'required',
            'status_aset' => 'required',
            'id_lokasi' => 'required',
            'asal_perusahaan' => 'required',
            'bast' => 'required|file|mimes:pdf,jpg,png,jpeg',
            'sertifikat' => 'required|file|mimes:pdf,jpg,png,jpeg',
            'pic_aset' => 'required',
            'foto_aset' => 'required|file|mimes:pdf,jpg,png,jpeg',
            'nomor_kartu_aset' => 'required',
        ]);
        $jb = JenisBarang::find($request->id_jenis_barang);
        $L = Lokasi::find($request->id_lokasi);
        $kode_aset = $request->nomor_aset . '/' . $request->asal_perusahaan . '/' . $jb->kode_jenis_barang . '/' . $L->kode_lokasi . '/' . $request->kategori_aset . '/' . $request->tgl_kapitalisasi;
        
        $file_f = $request->file('foto_aset');
        $name_f = 'detailAset_' . $kode_aset . '_' . $this->getTanggal('date') . '.' . $file_f->extension();
        if (Storage::exists('public/Aset/' . $kode_aset . '/' . $name_f)) {
            Storage::delete('public/Aset/' . $kode_aset . '/' . $name_f);
        }
        $url_f = Storage::putFileAs('public/Aset/' . $kode_aset, $file_f, $name_f);

        $file_b = $request->file('bast');
        $name_b = 'detailAset_' . $kode_aset . '_' . $this->getTanggal('date') . '.' . $file_b->extension();
        if (Storage::exists('public/dAset/' . $kode_aset . '/' . $name_b)) {
            Storage::delete('public/dAset/' . $kode_aset . '/' . $name_b);
        }
        $url_b = Storage::putFileAs('public/dAset/' . $kode_aset, $file_b, $name_b);

        $file_s = $request->file('sertifikat');
        $name_s = 'detailAset_' . $kode_aset . '_' . $this->getTanggal('date') . '.' . $file_s->extension();
        if (Storage::exists('public/deAset/' . $kode_aset . '/' . $name_s)) {
            Storage::delete('public/deAset/' . $kode_aset . '/' . $name_s);
        }
        $url_s = Storage::putFileAs('public/deAset/' . $kode_aset, $file_s, $name_s);

        $da = DetailAset::create([
            'id' => $kode_aset,
            'nomor_aset' => $request->nomor_aset,
            'kode_aset' => $kode_aset,
            'kategori_aset' => $request->kategori_aset,
            'id_jenis_barang' => $request->id_jenis_barang,
            'deskripsi_aset' => $request->deskripsi_aset,
            'merek_aset' => $request->merek_aset,
            'tgl_kapitalisasi' => $request->tgl_kapitalisasi,
            'kondisi' => $request->kondisi,
            'status_aset' => $request->status_aset,
            'id_lokasi' => $request->id_lokasi,
            'asal_perusahaan' => $request->asal_perusahaan,
            'bast' => $url_b,
            'sertifikat' => $url_s,
            'pic_aset' => $request->pic_aset,
            'foto_aset' => $url_f,
            'nomor_kartu_aset' => $request->nomor_kartu_aset,
        ]);
        if ($da) {
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('detailAset.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $da = DetailAset::find($id);
        $L = Lokasi::all();
        
        return view('pages.detailAset.detail', compact('da', 'L'));
    }
    
    public function showLabel($id)
    {
        $da = DetailAset::findOrFail($id);
        // $pdf = PDF::loadView('pages.detailAset.label', compact('da'));
        // $pdf->setPaper('a4', 'portait');
        // return $pdf->stream('label.pdf');
        
        return view('pages.detailAset.label', compact('da'));
    }

    public function showLabel2($idLokasi)
    {
        $L = Lokasi::findOrFail($idLokasi);
        $da = DetailAset::where('id_lokasi', $idLokasi)->get();
        // $pdf = PDF::loadView('pages.detailAset.label', compact('da'));
        // $pdf->setPaper('a4', 'portait');
        // return $pdf->stream('label.pdf');
        
        return view('pages.detailAset.cetak', compact('L', 'da'));
    }
    
    // public function printData(Request $request)
    // {
    //     $id_lokasi = $request->input('id_lokasi');

    //     if (empty($id_lokasi)) {
    //         // Tampilkan semua data jika tidak ada filter
    //         $da = DetailAset::pluck('id','kode_aset');
    //     } else {
    //         $da = DetailAset::where('id_lokasi', $id_lokasi)->pluck('id','kode_aset');
    //     }

    //     if ($da->isEmpty()) {
    //         // Data tidak ditemukan
    //         return redirect()->back()->with('error', 'Data tidak ditemukan');
    //     }

    //     return view('label', ['da' => $da]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $da = DetailAset::find($id);
        $L = Lokasi::all();
        $jb = JenisBarang::all();

        return view('pages.detailAset.edit', compact('da', 'L', 'jb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $da = DetailAset::where('id', $id)->first();
        if (($da->sertifikat != null && Storage::exists($da->sertifikat)) && ($da->bast != null && Storage::exists($da->bast)) && ($da->foto_aset != null && Storage::exists($da->foto_aset))) {
            $request->validate([
                'nomor_aset' => 'required',
                'kategori_aset' => 'required',
                'id_jenis_barang' => 'required',
                'deskripsi_aset' => 'required',
                'merek_aset' => 'required',
                'tgl_kapitalisasi' => 'required',
                'kondisi' => 'required',
                'status_aset' => 'required',
                'id_lokasi' => 'required',
                'asal_perusahaan' => 'required',
                'pic_aset' => 'required',
                'nomor_kartu_aset' => 'required',
                'pj_edit' => 'required',
                'tgl_edit' => 'required|date',
            ]);
        } else if (($da->sertifikat != null && !Storage::exists($da->sertifikat)) || ($da->bast != null && !Storage::exists($da->bast)) || ($da->foto_aset != null && !Storage::exists($da->foto_aset))){
            $request->validate([
                'nomor_aset' => 'required',
                'kategori_aset' => 'required',
                'id_jenis_barang' => 'required',
                'deskripsi_aset' => 'required',
                'merek_aset' => 'required',
                'tgl_kapitalisasi' => 'required',
                'kondisi' => 'required',
                'status_aset' => 'required',
                'id_lokasi' => 'required',
                'asal_perusahaan' => 'required',
                'pic_aset' => 'required',
                'nomor_kartu_aset' => 'required',
                'pj_edit' => 'required',
                'tgl_edit' => 'required|date',
                'bast' => 'file|mimes:pdf,jpg,png,jpeg|required_with:sertifikat',
                'sertifikat' => 'file|mimes:pdf,jpg,png,jpeg|required_with:bast',
                'foto_aset' => 'file|mimes:pdf,jpg,png,jpeg|required',
            ]);
        } else {
            $request->validate([
                'nomor_aset' => 'required',
                'kategori_aset' => 'required',
                'id_jenis_barang' => 'required',
                'deskripsi_aset' => 'required',
                'merek_aset' => 'required',
                'tgl_kapitalisasi' => 'required',
                'kondisi' => 'required',
                'status_aset' => 'required',
                'id_lokasi' => 'required',
                'asal_perusahaan' => 'required',
                'pic_aset' => 'required',
                'nomor_kartu_aset' => 'required',
                'pj_edit' => 'required',
                'tgl_edit' => 'required|date',
                'bast' => 'file|mimes:pdf,jpg,png,jpeg|required_with:sertifikat',
                'sertifikat' => 'file|mimes:pdf,jpg,png,jpeg|required_with:bast',
                'foto_aset' => 'file|mimes:pdf,jpg,png,jpeg|required',
            ]);
        }

        $jb = JenisBarang::find($request->id_jenis_barang);
        $L = Lokasi::find($request->id_lokasi);
        $kode_aset = $request->nomor_aset . '/' . $request->asal_perusahaan . '/' . $jb->kode_jenis_barang . '/' . $L->kode_lokasi . '/' . $request->kategori_aset . '/' . $request->tgl_kapitalisasi;
        $da = DetailAset::find($id);
        $da->nomor_aset = $request->nomor_aset;
        $da->kode_aset = $kode_aset;
        $da->kategori_aset = $request->kategori_aset;
        $da->id_jenis_barang = $request->id_jenis_barang;
        $da->deskripsi_aset = $request->deskripsi_aset;
        $da->merek_aset = $request->merek_aset;
        $da->tgl_kapitalisasi = $request->tgl_kapitalisasi;
        $da->kondisi = $request->kondisi;
        $da->status_aset = $request->status_aset;
        $da->id_lokasi = $request->id_lokasi;
        $da->asal_perusahaan= $request->asal_perusahaan;
        $da->pic_aset = $request->pic_aset;
        $da->nomor_kartu_aset = $request->nomor_kartu_aset;
        $da->pj_edit = $request->pj_edit;
        if ($request->has('tgl_edit')) {
            $da->tgl_edit = Carbon::createFromFormat('d-m-Y', $request['tgl_edit']);
        } else {
            $da->tgl_edit = $request['tgl_edit'];
        }
        if ($request->has('foto_aset') && $request->foto_aset != ''){
            $file_f = $request->file('foto_aset');
            $name_f = 'detailAset_' . $kode_aset . '_' . $this->getTanggal('date') . '.' . $file_f->extension();
            if (Storage::exists($da->foto_aset)) {
                Storage::delete($da->foto_aset);
            }
            $url_f = Storage::putFileAs('public/Aset/' . $kode_aset, $file_f, $name_f);
            $da->foto_aset= $url_f;
        }
        if ($request->has('bast') && $request->foto_bast != ''){
            $file_b = $request->file('bast');
            $name_b = 'detailAset_' . $kode_aset . '_' . $this->getTanggal('date') . '.' . $file_b->extension();
            if (Storage::exists($da->bast)) {
                Storage::delete($da->bast);
            }
            $url_b = Storage::putFileAs('public/dAset/' . $kode_aset, $file_b, $name_b);
            $da->bast= $url_b;
        }
        if ($request->has('sertifikat') && $request->sertifikat != ''){
            $file_s = $request->file('sertifikat');
            $name_s = 'detailAset_' . $kode_aset . '_' . $this->getTanggal('date') . '.' . $file_s->extension();
            if (Storage::exists($da->sertifikat)) {
                Storage::delete($da->sertifikat);
            }
            $url_s = Storage::putFileAs('public/deAset/' . $kode_aset, $file_s, $name_s);
            $da->sertifikat= $url_s;
        }
        if ($da->save()) {
            alert('Data Berhasil Terupdate!')->background('#B5EDCC');
        } else {
            alert('Update Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('detailAset.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailAset::find($id)->delete();
    }
    public function getTanggal($tipe)
    {
        if ($tipe == 'date') {
            return Carbon::now()->format('d-m-Y');
        } else if ($tipe == 'datetime') {
            return Carbon::now()->format('d-m-Y-H-i-m');
        }
    }
    public function cetakLabel($id)
    {
        $da = array();
        foreach ($request->id as $id) {
            $label = DetailAset::find($id);
            $da[] = $label;
        }
    
    $pdf = PDF::loadView('detailAset.label', compact('da'));
    $pdf->setPaper('a4', 'portait');
    return $pdf->stream('label.pdf');
    }
}
