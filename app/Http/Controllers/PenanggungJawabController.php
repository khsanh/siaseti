<?php

namespace App\Http\Controllers;

use App\Models\PenanggungJawab;
use App\Models\Divisi;
use Illuminate\Http\Request;

class PenanggungJawabController extends Controller
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
        $dp = PenanggungJawab::all();
        $d = Divisi::all();

        return view('pages.PenanggungJawab.index', compact('dp', 'd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d = Divisi::all();
        return view('pages.PenanggungJawab.create', compact('d'));
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
            'nip' => 'required|min:2',
            'nama' => 'required',
            'id_divisi' => 'required'
        ]);
        $tp = PenanggungJawab::create($request->all());
        if ($tp) {
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('penanggungJawab.index');
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
        $dp = PenanggungJawab::find($id);
        $d = Divisi::all();

        return view('pages.PenanggungJawab.edit', compact('dp','d'));
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
            'nip' => 'required|min:2',
            'nama' => 'required',
            'id_divisi' => 'required'
        ]);

        $data = PenanggungJawab::find($id);
        $data->update([
            'id_divisi' => $request->id_divisi,
            'nip' => $request->nip,
            'nama' => $request->nama,
        ]);
        if ($data) {
            alert('Data Berhasil Terupdate!')->background('#B5EDCC');
        } else {
            alert('Update Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('PenanggungJawab.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PenanggungJawab::find($id)->delete();
    }
}
