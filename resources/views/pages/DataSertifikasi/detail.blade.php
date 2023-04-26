@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdatasertifikasi','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Sertifikasi</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{route('dashboard')}}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Sertifikasi.index')}}">Sertifikasi</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Sertifikasi.show', $sertifikasi->id)}}">Detail Sertifikasi</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Data Sertifikasi</div>
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        <div class="col-9">
                            <div class="form-group form-inline">
                                <label for="nama" class="col-md-4 col-form-label">Nama Lengkap</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$sertifikasi->pegawai->nama}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="nama_sertifikasi" class="col-md-4 col-form-label">Nama Sertifikasi</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$sertifikasi->nama_sertifikasi}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="jenis_sertifikasi" class="col-md-4 col-form-label">Jenis Sertifikasi</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$sertifikasi->jenis_sertifikasi}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="bidang_sertifikasi" class="col-md-4 col-form-label">Bidang Sertifikasi</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$sertifikasi->bidang_sertifikasi}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="penyelenggara" class="col-md-4 col-form-label">Penyelenggara</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$sertifikasi->penyelenggara}}" class="form-control input-full" id="penyelenggara" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="lokasi_Sertifikasi" class="col-md-4 col-form-label">Lokasi Sertifikasi</label>
                                <div class="col-md-8 p-0">
                                    <textarea class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>{{$sertifikasi->lokasi_sertifikasi}}</textarea>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="waktu_mulai_pelaksanaan" class="col-md-4 col-form-label">Tanggal Mulai</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{\Carbon\Carbon::parse($sertifikasi->waktu_mulai_pelaksanaan)->format('d-m-Y')}}" class="form-control input-full" id="waktu_mulai_pelaksanaan" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="waktu_selesai_pelaksanaan" class="col-md-4 col-form-label">Tanggal Selesai</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{\Carbon\Carbon::parse($sertifikasi->waktu_selesai_pelaksanaan)->format('d-m-Y')}}" class="form-control input-full" id="waktu_selesai_pelaksanaan" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="tanggal_sertifikat_diterbitkan" class="col-md-4 col-form-label">Tanggal Diterbitkan</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{\Carbon\Carbon::parse($sertifikasi->tanggal_sertifikat_diterbitkan)->format('d-m-Y')}}" class="form-control input-full" id="tanggal_sertifikat_diterbitkan" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="masa_berlaku_sampai_dengan" class="col-md-4 col-form-label">Berlaku Sampai dengan</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{\Carbon\Carbon::parse($sertifikasi->masa_berlaku_sampai_dengan)->format('d-m-Y')}}" class="form-control input-full" id="masa_berlaku_sampai_dengan" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;
																color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="inlineinput" class="col-md-4 col-form-label">Lampiran Dokumen</label>
                                <div class="col-md-8 p-0">
                                    @if(Storage::exists($sertifikasi->dokumen_data_sertifikasi))
                                    <iframe src="{{ asset('/laraview/#..'.Storage::url($sertifikasi->dokumen_data_sertifikasi)) }}" width="600px" height="400px"></iframe>
                                    <a class="btn btn-primary btn-sm text-white" href="{{ Storage::url($sertifikasi->dokumen_data_sertifikasi)}}"> Download File</a>
                                    @else
                                    <h6 class="text-center">Dokumen Tidak ada. Klik <span class="badge badge-primary"><a class="text-white" href="{{route('Sertifikasi.edit',$sertifikasi->id)}}">Edit Sertifikasi</a></span> untuk Menambahkan.</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <a class="btn btn-danger" href="{{route('Sertifikasi.list', $sertifikasi->id_pegawai)}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection