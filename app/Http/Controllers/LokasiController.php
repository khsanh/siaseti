<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Divisi;
use Illuminate\Http\Request;

class LokasiController extends Controller
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
        $L = Lokasi::all();
        $d = Divisi::all();

        return view('pages.lokasi.index', compact('L','d'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d = Divisi::all();
        return view('pages.lokasi.create', compact('d'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'kode_lokasi' => 'required',
            'nama_lokasi' => 'required',
            'detail_lokasi' => 'required',
            'id_divisi' => 'required'
        ]);
        $L = Lokasi::create($request->all());
        if ($L) {
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('lokasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $L = Lokasi::find($id);
        $d = Divisi::all();

        return view('pages.lokasi.edit', compact('L', 'd'));
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
            'kode_lokasi' => 'required',
            'nama_lokasi' => 'required' ,
            'detail_lokasi' => 'required',
            'id_divisi' => 'required',
        ]);

        $data = Lokasi::find($id);
        $data->update([
            'kode_lokasi' => $request->kode_lokasi,
            'nama_lokasi' => $request->nama_lokasi,
            'detail_lokasi' => $request->detail_lokasi,
            'id_divisi' => $request->id_divisi
        ]);
        if ($data) {
            alert('Data Berhasil Terupdate!')->background('#B5EDCC');
        } else {
            alert('Update Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('lokasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lokasi::find($id)->delete();
    }
}
