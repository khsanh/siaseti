<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\DetailAset;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalAset = DetailAset::where('status_aset', '=', 'Aktif')->count();

        $totalBaik = DetailAset::where('status_aset', '=', 'Aktif')->where('kondisi', '=', 'Baik')->count();

        $totalTD = DetailAset::where('status_aset', '=', 'Aktif')->where('kondisi', '=', 'Tidak_Terpakai')->count();

        $totalRusak = DetailAset::where('status_aset', '=', 'Aktif')->where('kondisi', '=', 'Rusak')->count();
        $totalBongkar = DetailAset::where('status_aset', '=', 'Aktif')->where('kondisi', '=', 'Bongkar')->count();
        $totalTT = DetailAset::where('status_aset', '=', 'Aktif')->where('kondisi', '=', 'Tidak_Teridentifikasi')->count();
        $totalLain2 = $totalRusak + $totalBongkar + $totalTT;



        

        return view('dashboard', compact(
            "totalAset",
            "totalBaik",
            "totalTD",
            "totalLain2"
        ));
    }
}
