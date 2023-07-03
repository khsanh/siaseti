<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\BeritaAcara;
use App\Models\User;

class MemoController extends Controller
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
        $m = Memo::all();
        $ba = BeritaAcara::all();

        return view('pages.Memo.index', compact('m', 'ba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $m = Memo::all();
        $user = User::all();
        return view('pages.Memo.create', compact('m','user'));
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
            // 'pengirim' => 'required',
            'penerima' => 'required',
            'kode_memo' => 'required',
            'tanggal_memo' => 'required',
            'perihal' => 'required',
            'deskripsi' => 'required',
        ]);
        $request ['pengirim' ]=Auth::user()->nama;
        $m = Memo::create($request->all());
        if ($m) {
            alert('Data Berhasil Tersimpan!')->background('#B5EDCC');
        } else {
            alert('Simpan Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('Memo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $m = Memo::find($id);
        $user = User::all();
        return view('pages.Memo.detail', compact('m','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $m = Memo::find($id);
        $user = User::all();

        return view('pages.Memo.edit', compact('m', 'user'));
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
            'pengirim' => 'required',
            'kode_memo' => 'required',
            'tanggal_memo' => 'required',
            'perihal' => 'required',
            'deskripsi' => 'required',
        ]);

        $data = Memo::find($id);
        $data->update([
            'penerima' => $request->penerima,
            'pengirim' => $request->pengirim,
            'kode_memo' => $request->kode_memo,
            'tanggal_memo' => $request->tanggal_memo,
            'perihal' => $request->perihal,
            'deskripsi' => $request->deskripsi
        ]);
        if ($data) {
            alert('Data Berhasil Terupdate!')->background('#B5EDCC');
        } else {
            alert('Update Data Gagal!')->background('#F4CACA');
        }
        return redirect()->route('Memo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Memo::find($id)->delete();
    }

    

}

   
