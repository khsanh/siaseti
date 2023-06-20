<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaAcara;
use Carbon\Carbon;
use App\Models\Memo;

class BeritaAcaraController extends Controller
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
        $ba = BeritaAcara::all();

        return view('pages.beritaAcara.index', compact('ba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ba = BeritaAcara::all();
        $m = Memo::all();
        return view('pages.beritaAcara.create', compact('ba','m'));
    } 

    public function create2($id)
    {
        $ba = BeritaAcara::all();
        $m = Memo::find($id);
        return view('pages.beritaAcara.create2', compact('ba','m'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_memo' => 'required',
            'kode_berita_acara' => 'required',
            'tanggal_berita_acara' => 'required',
            'perihal' => 'required',
            'deskripsi' => 'required',
        ]);

        $ba = new BeritaAcara([
            'id_memo' => $request->id_memo,
            'kode_berita_acara' => $request->kode_berita_acara,
            'perihal' => $request->perihal,
            'tanggal_berita_acara' => Carbon::createFromFormat('d-m-Y', $request['tanggal_berita_acara']),
            'deskripsi' => $request->deskripsi,
        ]);
        if ($ba->save()) {
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('beritaAcara.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ba = BeritaAcara::find($id);
        $m = Memo::all();
        return view('pages.beritaAcara.detail', compact('ba','m'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ba = BeritaAcara::find($id);
        $m = Memo::all();

        return view('pages.beritaAcara.edit', compact('ba', 'm'));
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
        $request->validate([
            'id_memo' => 'required',
            'kode_berita_acara' => 'required',
            'tanggal_berita_acara' => 'required',
            'perihal' => 'required',
            'deskripsi' => 'required',
        ]);

        $data = BeritaAcara::find($id);
        $data->update([
            'id_memo' => $request->id_memo,
            'kode_berita_acara' => $request->kode_berita_acara,
            'tanggal_berita_acara' => $request->tanggal_berita_acara,
            'perihal' => $request->perihal,
            'deskripsi' => $request->deskripsi
        ]);
        if ($data) {
            alert('Data Berhasil Terupdate!')->background('#B5EDCC');
        } else {
            alert('Update Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('beritaAcara.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BeritaAcara::find($id)->delete();
    }
}
