<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
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
        $jb = JenisBarang::all();

        return view('pages.jenisBarang.index', compact('jb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jenisBarang.create');
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
            'kode_jenis_barang' => 'required',
            'nama_barang' => 'required',
        ]);
        $jb = JenisBarang::create($request->all());
        if ($jb) {
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('jenisBarang.index');
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
        $jb = JenisBarang::find($id);

        return view('pages.jenisBarang.edit', compact('jb'));
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
            'kode_jenis_barang' => 'required' ,
            'nama_barang' => 'required',
        ]);

        $data = JenisBarang::find($id);
        $data->update([
            'kode_jenis_barang' => $request->kode_jenis_barang,
            'nama_barang' => $request->nama_barang
        ]);
        if ($data) {
            alert('Data Berhasil Terupdate!')->background('#B5EDCC');
        } else {
            alert('Update Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('jenisBarang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisBarang::find($id)->delete();
    }
}
