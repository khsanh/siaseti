@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdatakaryawan','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Karyawan</h4>
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
                <a href="{{route('Karyawan.index')}}">Karyawan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                @foreach($p as $pegawai)
                <a href="{{route('Karyawan.edit', $pegawai->id)}}">Edit</a>
                @endforeach
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" enctype="multipart/form-data" action="{{ route('Karyawan.update', $pegawai->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <div class="card-title">Edit Data Karyawan</div>
                    </div>
                    <div class="card-body">
                        <div class="row col-md-12">
                            <ul class="nav nav-pills nav-primary nav-pills-icons col-lg-12" id="pills-tab-with-icon" role="tablist">
                                <li class="nav-item col-md-4">
                                    <a class="nav-link active text-center text-bold" id="pills-home-tab-icon" data-toggle="pill" href="#kontrak" role="tab" aria-controls="kontrak" aria-selected="true">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">1</span>
                                        &nbsp Data Kontrak
                                    </a>
                                </li>
                                <li class="nav-item col-md-4 text-center">
                                    <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#data-pribadi" role="tab" aria-controls="data-pribadi" aria-selected="false">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">2</span>
                                        &nbsp Data Pribadi
                                    </a>
                                </li>
                                <li class="nav-item col-md-4 text-center">
                                    <a class="nav-link" id="pills-contact-tab-icon" data-toggle="pill" href="#data-kelengkapan" role="tab" aria-controls="data-kelengkapan" aria-selected="false">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">3</span>
                                        &nbsp Data Kelengkapan
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @foreach($p as $pegawai)
                        <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                            <div class="tab-pane fade show active" id="kontrak" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="kontrak_1">Kontrak 1</label>
                                            <input name="kontrak_1" type="text" value="@if(!empty(old('kontrak_1'))){{ old('kontrak_1')}}@else{{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_1)->format('d-m-Y')}}@endif" class="form-control date1 @error('kontrak_1') is-invalid @enderror" id="kontrak_1" onchange="getTanggalPensiun(); getMasaKerja()">
                                            @error('kontrak_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_2">Kontrak 2</label>
                                            <input name="kontrak_2" type="text" value="@if(!empty($pegawai->kontrak->kontrak_2)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_2)->format('d-m-Y')}}@else{{ old('kontrak_2') }}@endif" class="form-control date2 @error('kontrak_2') is-invalid @enderror" id="kontrak_2" onchange="getTanggalPensiun();">
                                            @error('kontrak_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_3">Kontrak 3</label>
                                            <input name="kontrak_3" type="text" value="@if(!empty($pegawai->kontrak->kontrak_3)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_3)->format('d-m-Y')}}@else{{ old('kontrak_3') }}@endif" class="form-control date3 @error('kontrak_3') is-invalid @enderror" id="kontrak_3" onchange="getTanggalPensiun();">
                                            @error('kontrak_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_4">Kontrak 4</label>
                                            <input name="kontrak_4" type="text" value="@if(!empty($pegawai->kontrak->kontrak_4)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_4)->format('d-m-Y')}}@else{{ old('kontrak_4') }}@endif" class="form-control date4 @error('kontrak_4') is-invalid @enderror" id="kontrak_4" onchange="getTanggalPensiun();">
                                            @error('kontrak_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_5">Kontrak 5</label>
                                            <input name="kontrak_5" type="text" value="@if(!empty($pegawai->kontrak->kontrak_5)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_5)->format('d-m-Y')}}@else{{ old('kontrak_5') }}@endif" class="form-control date5 @error('kontrak_5') is-invalid @enderror" id="kontrak_5" onchange="getTanggalPensiun();">
                                            @error('kontrak_5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_6">Kontrak 6</label>
                                            <input name="kontrak_6" type="text" value="@if(!empty($pegawai->kontrak->kontrak_6)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_6)->format('d-m-Y')}}@else{{ old('kontrak_6') }}@endif" class="form-control date6 @error('kontrak_6') is-invalid @enderror" id="kontrak_6" onchange="getTanggalPensiun();">
                                            @error('kontrak_6')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_7">Kontrak 7</label>
                                            <input name="kontrak_7" type="text" value="@if(!empty($pegawai->kontrak->kontrak_7)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_7)->format('d-m-Y')}}@else{{ old('kontrak_7') }}@endif" class="form-control date7 @error('kontrak_7') is-invalid @enderror" id="kontrak_7" onchange="getTanggalPensiun();">
                                            @error('kontrak_7')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_8">Kontrak 8</label>
                                            <input name="kontrak_8" type="text" value="@if(!empty($pegawai->kontrak->kontrak_8)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_8)->format('d-m-Y')}}@else{{ old('kontrak_8') }}@endif" class="form-control date7 @error('kontrak_8') is-invalid @enderror" id="kontrak_8" onchange="getTanggalPensiun();">
                                            @error('kontrak_8')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_9">Kontrak 9</label>
                                            <input name="kontrak_9" type="text" value="@if(!empty($pegawai->kontrak->kontrak_9)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_9)->format('d-m-Y')}}@else{{ old('kontrak_9') }}@endif" class="form-control date7 @error('kontrak_9') is-invalid @enderror" id="kontrak_9" onchange="getTanggalPensiun();">
                                            @error('kontrak_9')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kontrak_10">Kontrak 10</label>
                                            <input name="kontrak_10" type="text" value="@if(!empty($pegawai->kontrak->kontrak_10)){{\Carbon\Carbon::parse($pegawai->kontrak->kontrak_10)->format('d-m-Y')}}@else{{ old('kontrak_10') }}@endif" class="form-control date7 @error('kontrak_10') is-invalid @enderror" id="kontrak_10" onchange="getTanggalPensiun();">
                                            @error('kontrak_10')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_npp">Tanggal NPP</label>
                                            <input name="tanggal_npp" value="@if(!empty($pegawai->kontrak->tanggal_npp)){{\Carbon\Carbon::parse($pegawai->kontrak->tanggal_npp)->format('d-m-Y')}}@else{{ old('tanggal_npp') }}@endif" type="text" class="form-control date16 @error('tanggal_npp') is-invalid @enderror" id="tanggal_npp">
                                            <span class="text-warning text-capitalize text-small">Kosongkan field untuk tanpa inputan</span>
                                            @error('tanggal_npp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="selesai_kontrak_1">Selesai Kontrak 1</label>
                                            <input name="selesai_kontrak_1" value="@if(!empty($pegawai->kontrak->selesai_kontrak_1)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_1)->format('d-m-Y')}}@else{{ old('selesai_kontrak_1') }}@endif" type="text" class="form-control date8 @error('selesai_kontrak_1') is-invalid @enderror" id="selesai_kontrak_1" onchange="getTanggalPensiun();">
                                            @error('selesai_kontrak_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_2">Selesai Kontrak 2</label>
                                            <input name="selesai_kontrak_2" value="@if(!empty($pegawai->kontrak->selesai_kontrak_2)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_2)->format('d-m-Y')}}@else{{ old('selesai_kontrak_2') }}@endif" type="text" class="form-control date9 @error('selesai_kontrak_2') is-invalid @enderror" id="selesai_kontrak_2" onchange="getTanggalPensiun();">
                                            @error('selesai_kontrak_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_3">Selesai Kontrak 3</label>
                                            <input name="selesai_kontrak_3" value="@if(!empty($pegawai->kontrak->selesai_kontrak_3)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_3)->format('d-m-Y')}}@else{{ old('selesai_kontrak_3') }}@endif" type="text" class="form-control date10 @error('selesai_kontrak_3') is-invalid @enderror" id="selesai_kontrak_3" onchange="getTanggalPensiun();">
                                            @error('selesai_kontrak_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_4">Selesai Kontrak 4</label>
                                            <input name="selesai_kontrak_4" value="@if(!empty($pegawai->kontrak->selesai_kontrak_4)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_4)->format('d-m-Y')}}@else{{ old('selesai_kontrak_4') }}@endif" type="text" class="form-control date11 @error('selesai_kontrak_4') is-invalid @enderror" id="selesai_kontrak_4" onchange="getTanggalPensiun();">
                                            @error('selesai_kontrak_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_5">Selesai Kontrak 5</label>
                                            <input name="selesai_kontrak_5" value="@if(!empty($pegawai->kontrak->selesai_kontrak_5)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_5)->format('d-m-Y')}}@else{{ old('selesai_kontrak_5') }}@endif" type="text" class="form-control date12 @error('selesai_kontrak_5') is-invalid @enderror" id="selesai_kontrak_5" onchange="getTanggalPensiun();">
                                            @error('selesai_kontrak_5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_6">Selesai Kontrak 6</label>
                                            <input name="selesai_kontrak_6" value="@if(!empty($pegawai->kontrak->selesai_kontrak_6)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_6)->format('d-m-Y')}}@else{{ old('selesai_kontrak_6') }}@endif" type="text" class="form-control date13 @error('selesai_kontrak_6') is-invalid @enderror" id="selesai_kontrak_6" onchange="getTanggalPensiun();">
                                            @error('selesai_kontrak_6')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_7">Selesai Kontrak 7</label>
                                            <input name="selesai_kontrak_7" value="@if(!empty($pegawai->kontrak->selesai_kontrak_7)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_7)->format('d-m-Y')}}@else{{ old('selesai_kontrak_7') }}@endif" type="text" class="form-control date14 @error('selesai_kontrak_7') is-invalid @enderror" id="selesai_kontrak_7" onchange="getTanggalPensiun();">
                                            @error('selesai_kontrak_7')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_8">Selesai Kontrak 8</label>
                                            <input name="selesai_kontrak_8" value="@if(!empty($pegawai->kontrak->selesai_kontrak_8)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_8)->format('d-m-Y')}}@else{{ old('selesai_kontrak_8') }}@endif" type="text" class="form-control date14 @error('selesai_kontrak_8') is-invalid @enderror" id="selesai_kontrak_8" onchange="getTanggalPensiun();">
                                            @error('selesai_kontrak_8')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_9">Selesai Kontrak 9</label>
                                            <input name="selesai_kontrak_9" value="@if(!empty($pegawai->kontrak->selesai_kontrak_9)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_9)->format('d-m-Y')}}@else{{ old('selesai_kontrak_9') }}@endif" type="text" class="form-control date14 @error('selesai_kontrak_9') is-invalid @enderror" id="selesai_kontrak_9" onchange="getTanggalPensiun();">
                                            @error('selesai_kontrak_9')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="selesai_kontrak_10">Selesai Kontrak 10</label>
                                            <input name="selesai_kontrak_10" value="@if(!empty($pegawai->kontrak->selesai_kontrak_10)){{\Carbon\Carbon::parse($pegawai->kontrak->selesai_kontrak_10)->format('d-m-Y')}}@else{{ old('selesai_kontrak_10') }}@endif" type="text" class="form-control date14 @error('selesai_kontrak_10') is-invalid @enderror" id="selesai_kontrak_10" onchange="getTanggalPensiun();">
                                            @error('selesai_kontrak_10')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_pensiun">Tanggal Pensiun</label>
                                            <input name="tanggal_pensiun" value="@if(!empty($pegawai->kontrak->tanggal_pensiun)){{\Carbon\Carbon::parse($pegawai->kontrak->tanggal_pensiun)->format('d-m-Y')}}@else{{ old('tanggal_pensiun') }}@endif" type="text" class="form-control date17 @error('tanggal_pensiun') is-invalid @enderror" id="tanggal_pensiun">
                                            @error('tanggal_pensiun')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="dokumen_dasar_pensiun">Dokumen Dasar Pensiun</label>
                                            <input type="file" class="form-control @error('dokumen_dasar_pensiun') is-invalid @enderror" id="dokumen_dasar_pensiun" name="dokumen_dasar_pensiun" @if($errors->has('dokumen_dasar_pensiun')) autofocus @endif>
                                            @error('dokumen_dasar_pensiun')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                            @if(!empty($pegawai->kontrak->dokumen_dasar_pensiun) && Storage::exists($pegawai->kontrak->dokumen_dasar_pensiun))
                                            <div class="text text-black">
                                                <div class="text-capitalize text-black">Dokumen tersimpan</div>
                                                <ul>
                                                    <li><a href="{{ Storage::url($pegawai->kontrak->dokumen_dasar_pensiun)}}">{{$pegawai->nip}} - {{$pegawai->nama}} - Dokumen Dasar Pensiun</a></li>
                                                </ul>
                                                <span class="text-danger text-capitalize text-small"> *** Kosongkan Dokumen jika tidak ingin mengubah</span>
                                            </div>
                                            @elseif(empty($pegawai->kontrak->dokumen_dasar_pensiun) && !Storage::exists($pegawai->kontrak->dokumen_dasar_pensiun))
                                            <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                            @elseif(!empty($pegawai->kontrak->dokumen_dasar_pensiun) && !Storage::exists($pegawai->kontrak->dokumen_dasar_pensiun))
                                            <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="data-pribadi" role="tabpanel" aria-labelledby="pills-profile-tab-icon">
                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" name="nip" value="@if(!empty(old('nip'))){{ old('nip') }}@else{{$pegawai->nip}}@endif" class="form-control @error('nip') is-invalid @enderror" id="nip" readonly>
                                            @error('nip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_tipe_pegawai">Tipe Pegawai</label>
                                            <select name="kode_tipe_pegawai" class="form-control  @error('kode_tipe_pegawai') is-invalid @enderror" id="kode_tipe_pegawai">
                                                <option value="">---Pilih---</option>
                                                @foreach($tp as $tipe)
                                                <option value="{{$tipe->id}}" @if(!empty(old('kode_tipe_pegawai'))){{old('kode_tipe_pegawai') == $tipe->id ? 'selected' : ''}}@else{{$pegawai->kode_tipe_pegawai == $tipe->id ? 'selected' : ''}}@endif>{{$tipe->nama_tipe_pegawai}}</option>
                                                @endforeach
                                            </select>
                                            @error('kode_tipe_pegawai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" name="nama" value="@if(!empty(old('nama'))){{ old('nama') }}@else{{$pegawai->nama}}@endif" class="form-control  @error('nama') is-invalid @enderror" id="nama">
                                            @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="asal_kepegawaian">Asal Kepegawaian</label>
                                            <select name="asal_kepegawaian" class="form-control  @error('asal_kepegawaian') is-invalid @enderror" id="asal_kepegawaian">
                                                <option value="">---Pilih---</option>
                                                <option value="INKA" @if(!empty(old('asal_kepegawaian'))) {{old('asal_kepegawaian') == 'INKA' ? 'selected' : ''}} @else{{$pegawai->asal_kepegawaian == 'INKA' ? 'selected' : ''}}@endif>INKA</option>
                                                <option value="REKA" @if(!empty(old('asal_kepegawaian'))) {{old('asal_kepegawaian') == 'REKA' ? 'selected' : ''}} @else{{$pegawai->asal_kepegawaian == 'REKA' ? 'selected' : ''}}@endif>REKA</option>
                                            </select>
                                            @error('asal_kepegawaian')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status_karyawan">Status Karyawan</label>
                                            <select class="form-control @error('status_karyawan') is-invalid @enderror" name="status_karyawan" id="status_karyawan">
                                                <option value="">--- Pilih ---</option>
                                                <option value="Aktif" @if(!empty(old('status_karyawan'))) {{old('status_karyawan') == 'Aktif' ? 'selected' : ''}} @else{{$pegawai->status_karyawan == 'Aktif' ? 'selected' : ''}}@endif>Aktif</option>
                                                <option value="Nonaktif" @if(!empty(old('status_karyawan'))) {{old('status_karyawan') == 'Nonaktif' ? 'selected' : ''}} @else{{$pegawai->status_karyawan == 'Nonaktif' ? 'selected' : ''}}@endif>Nonaktif</option>
                                            </select>
                                            @error('status_karyawan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control  @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin">
                                                <option value="">---Pilih---</option>
                                                <option value="Laki-Laki" @if(!empty(old('jenis_kelamin'))) {{old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : ''}} @else{{$pegawai->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}@endif>Laki-Laki</option>
                                                <option value="Perempuan" @if(!empty(old('jenis_kelamin'))) {{old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''}} @else{{$pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}@endif>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan_tnt">Pendidikan T/NT</label>
                                            <select name="pendidikan_tnt" class="form-control  @error('pendidikan_tnt') is-invalid @enderror" id="pendidikan_tnt">
                                                <option value="">---Pilih---</option>
                                                <option value="Teknik" @if(!empty(old('pendidikan_tnt'))) {{old('pendidikan_tnt') == 'Teknik' ? 'selected' : ''}} @else{{$pegawai->pendidikan_tnt == 'Teknik' ? 'selected' : ''}}@endif>Teknik</option>
                                                <option value="Non Teknik" @if(!empty(old('pendidikan_tnt'))) {{old('pendidikan_tnt') == 'Non Teknik' ? 'selected' : ''}} @else{{$pegawai->pendidikan_tnt == 'Non Teknik' ? 'selected' : ''}}@endif>Non Teknik</option>
                                            </select>
                                            @error('pendidikan_tnt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="sekolah_universitas">Asal Sekolah / Universitas</label>
                                            <input name="sekolah_universitas" type="text" value="@if(!empty(old('sekolah_universitas'))){{ old('sekolah_universitas') }}@else{{$pegawai->sekolah_universitas}}@endif" class="form-control  @error('sekolah_universitas') is-invalid @enderror" id="sekolah_universitas">
                                            @error('sekolah_universitas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input name="tempat_lahir" type="text" value="@if(!empty(old('tempat_lahir'))){{ old('tempat_lahir') }}@else{{$pegawai->tempat_lahir}}@endif" class="form-control  @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir">
                                            @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="umur">Umur</label>
                                            <input name="umur" type="text" value="@if(!empty(old('umur'))){{ old('umur') }}@elseif(!empty($pegawai->umur)){{$pegawai->umur}}@endif" class="form-control  @error('umur') is-invalid @enderror umur" id="umur" readonly>
                                            @error('umur')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                            <select name="pendidikan_terakhir" class="form-control  @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir">
                                                <option value="">---Pilih---</option>
                                                <option value="SMA" @if(!empty(old('pendidikan_terakhir'))) {{old('pendidikan_terakhir') == 'SMA' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'SMA' ? 'selected' : ''}}@endif>SMA</option>
                                                <option value="S1" @if(!empty(old('pendidikan_terakhir'))) {{old('pendidikan_terakhir') == 'S1' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'S1' ? 'selected' : ''}}@endif>S1</option>
                                                <option value="S2" @if(!empty(old('pendidikan_terakhir'))) {{old('pendidikan_terakhir') == 'S2' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'S2' ? 'selected' : ''}}@endif>S2</option>
                                                <option value="S3" @if(!empty(old('pendidikan_terakhir'))) {{old('pendidikan_terakhir') == 'S3' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'S3' ? 'selected' : ''}}@endif>S3</option>
                                                <option value="D3" @if(!empty(old('pendidikan_terakhir'))) {{old('pendidikan_terakhir') == 'D2' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'D2' ? 'selected' : ''}}@endif>D2</option>
                                                <option value="D3" @if(!empty(old('pendidikan_terakhir'))) {{old('pendidikan_terakhir') == 'D3' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'D3' ? 'selected' : ''}}@endif>D3</option>
                                                <option value="D4" @if(!empty(old('pendidikan_terakhir'))) {{old('pendidikan_terakhir') == 'D4' ? 'selected' : ''}} @else{{$pegawai->pendidikan_terakhir == 'D4' ? 'selected' : ''}}@endif>D4</option>
                                            </select>
                                            @error('pendidikan_terakhir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan_pendidikan">Jurusan Pendidikan</label>
                                            <input name="jurusan_pendidikan" type="text" value="@if(!empty(old('jurusan_pendidikan'))){{ old('jurusan_pendidikan') }}@else{{$pegawai->jurusan_pendidikan}}@endif" class=" form-control  @error('jurusan_pendidikan') is-invalid @enderror" id="jurusan_pendidikan" list="jurusan">
                                            <datalist id="jurusan">
                                                <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                                                <option value="Administrasi Negara">Administrasi Negara</option>
                                                <option value="Administrasi Niaga">Administrasi Niaga</option>
                                                <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                                                <option value="Administrasi Publik">Administrasi Publik</option>
                                                <option value="Aeronotika dan Astronotika">Aeronotika dan Astronotika</option>
                                                <option value="Air Frame & Power Frame">AIR FRAME &amp; POWER FRAME</option>
                                                <option value="Akuntansi">Akuntansi</option>
                                                <option value="Bahasa & Sastra Inggris">Bahasa &amp; Sastra Inggris</option>
                                                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                                <option value="Biologi">Biologi</option>
                                                <option value="Desain Interior">Desain Interior</option>
                                                <option value="Desain Produk">Desain Produk</option>
                                                <option value="Ekonomi Pembangunan">Ekonomi Pembangunan</option>
                                                <option value="Fisika">Fisika</option>
                                                <option value="Hukum">Hukum</option>
                                                <option value="Hukum Bisnis">Hukum Bisnis</option>
                                                <option value="Hukum Perdata">Hukum Perdata</option>
                                                <option value="Hukum Pidana">Hukum Pidana</option>
                                                <option value="Hygiene Perusahaan dan Kesehatan Kerja (Hyperkes)">
                                                    Hygiene Perusahaan dan Kesehatan Kerja (Hyperkes)
                                                </option>
                                                <option value="Hyperkes">Hyperkes</option>
                                                <option value="Ilmu Ekonomi & Studi Pembangunan">Ilmu Ekonomi &amp; Studi Pembangunan</option>
                                                <option value="Ilmu Hukum">Ilmu Hukum</option>
                                                <option value="Ilmu Komputer">Ilmu Komputer</option>
                                                <option value="Ilmu komunikasi">Ilmu komunikasi</option>
                                                <option value="Ilmu Konsumen">Ilmu Konsumen</option>
                                                <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
                                                <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>
                                                <option value="Ilmu Perpustakaan">Ilmu Perpustakaan</option>
                                                <option value="Kepariwisataan">Kepariwisataan</option>
                                                <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                                                <option value="Kesejahteraan Sosial">Kesejahteraan Sosial</option>
                                                <option value="Kimia">Kimia</option>
                                                <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                                                <option value="Koperasi">Koperasi</option>
                                                <option value="Manajemen">Manajemen</option>
                                                <option value="Manajemen Bisnis & Administrasi">Manajemen Bisnis &amp; Administrasi</option>
                                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                                                <option value="Manajemen Kesekretariatan & Perkantoran">Manajemen Kesekretariatan &amp; Perkantoran</option>
                                                <option value="Manajemen Keuangan">Manajemen Keuangan</option>
                                                <option value="Manajemen Pemasaran">Manajemen Pemasaran</option>
                                                <option value="Manajemen Produksi">Manajemen Produksi</option>
                                                <option value="Manajemen Teknologi">Manajemen Teknologi</option>
                                                <option value="Manejemen Proyek">Manejemen Proyek</option>
                                                <option value="Master Bisnir Administrasi">MASTER BISNIS ADMINITRASI</option>
                                                <option value="Matematika">Matematika</option>
                                                <option value="MBA Teknologi">MBA Teknologi</option>
                                                <option value="MBTI">MBTI</option>
                                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                                <option value="Mesin Produksi">Mesin Produksi</option>
                                                <option value="Pemasaran">Pemasaran</option>
                                                <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                                                <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                                <option value="Pendidikan Biologi">Pendidikan Biologi</option>
                                                <option value="Pendidikan Fisika">Pendidikan Fisika</option>
                                                <option value="Pendidikan Kimia">Pendidikan Kimia</option>
                                                <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                                                <option value="Pendidikan Teknik Mesin">Pendidikan Teknik Mesin</option>
                                                <option value="Periklanan">Periklanan</option>
                                                <option value="Perkeretaapian">Perkeretaapian</option>
                                                <option value="Perpajakan">Perpajakan</option>
                                                <option value="Pertanian">Pertanian</option>
                                                <option value="Psikologi">Psikologi</option>
                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                <option value="Sains">Sains</option>
                                                <option value="Sastra">Sastra</option>
                                                <option value="Sekretaris">Sekretaris</option>
                                                <option value="Sumber Daya Manusia">Sumber Daya Manusia</option>
                                                <option value="Teknik">Teknik</option>
                                                <option value="Teknik AC Mekanik">Teknik AC Mekanik</option>
                                                <option value="Teknik Audio Video">Teknik Audio Video</option>
                                                <option value="Teknik Bangunan Kapal">Teknik Bangunan Kapal</option>
                                                <option value="Teknik Desain Produk Industri">Teknik Desain Produk Industri</option>
                                                <option value="Teknik Elektro">Teknik Elektro</option>
                                                <option value="Teknik Elektro - Elektronika">Teknik Elektro - Elektronika</option>
                                                <option value="Teknik Elektro - Sistem Tenaga">Teknik Elektro - Sistem Tenaga</option>
                                                <option value="Teknik Elektro - Telekomunikasi">Teknik Elektro - Telekomunikasi</option>
                                                <option value="Teknik Elektro Industri">Teknik Elektro Industri</option>
                                                <option value="Teknik Elektro Komunikasi">Teknik Elektro Komunikasi</option>
                                                <option value="Teknik Fisika">Teknik Fisika</option>
                                                <option value="Teknik Gambar Bangunan">Teknik Gambar Bangunan</option>
                                                <option value="Teknik Geofisika">Teknik Geofisika</option>
                                                <option value="Teknik Geologi">Teknik Geologi</option>
                                                <option value="Teknik Industri">Teknik Industri</option>
                                                <option value="Teknik Informasi">Teknik Informasi</option>
                                                <option value="Teknik Informatika - Sistem Informasi">Teknik Informatika - Sistem Informasi</option>
                                                <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                                <option value="Teknik Kimia">Teknik Kimia</option>
                                                <option value="Teknik Komputer Kontrol">Teknik Komputer Kontrol</option>
                                                <option value="Teknik Komunikasi">Teknik Komunikasi</option>
                                                <option value="Teknik Konstruksi Bangunan">Teknik Konstruksi Bangunan</option>
                                                <option value="Teknik Konstruksi Kayu">Teknik Konstruksi Kayu</option>
                                                <option value="Teknik Korosi & Analisis Kegagalan Material">
                                                    Teknik Korosi &amp; Analisis Kegagalan Material
                                                </option>
                                                <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                                                <option value="Teknik Listrik">Teknik Listrik</option>
                                                <option value="Teknik Manufaktur">Teknik Manufaktur</option>
                                                <option value="Teknik Mekanik Umum">Teknik Mekanik Umum</option>
                                                <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                                                <option value="Teknik Mesin">Teknik Mesin</option>
                                                <option value="Teknik Mesin - Desain">Teknik Mesin - Desain</option>
                                                <option value="Teknik Mesin - Metalurgi">Teknik Mesin - Metalurgi</option>
                                                <option value="Teknik Mesin Produksi">Teknik Mesin Produksi</option>
                                                <option value="Teknik Metalurgi & Material">Teknik Metalurgi &amp; Material</option>
                                                <option value="Teknik Otomotif">Teknik Otomotif</option>
                                                <option value="Teknik Pemanfaatan Tenaga Listrik">Teknik Pemanfaatan Tenaga Listrik</option>
                                                <option value="Teknik Penerbangan">Teknik Penerbangan</option>
                                                <option value="Teknik Pengelasan">Teknik Pengelasan</option>
                                                <option value="Teknik Perkapalan">Teknik Perkapalan</option>
                                                <option value="Teknik Permesinan Kapal">Teknik Permesinan Kapal</option>
                                                <option value="Teknik Perminyakan">Teknik Perminyakan</option>
                                                <option value="Teknik Pertambangan">Teknik Pertambangan</option>
                                                <option value="Teknik Sipil">Teknik Sipil</option>
                                                <option value="Teknik Sistem Informasi">Teknik Sistem Informasi</option>
                                                <option value="Teknik Sistem Pengaturan">Teknik Sistem Pengaturan</option>
                                                <option value="Teknik Sistem Pengaturan (Mekatronika)">Teknik Sistem Pengaturan (Mekatronika)</option>
                                                <option value="Teknik Sistem Perkapalan">Teknik Sistem Perkapalan</option>
                                                <option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
                                                <option value="Teknologi Industri">Teknologi Industri</option>
                                            </datalist>
                                            @error('jurusan_pendidikan')
                                            <span class="invalid-feedback" role="alert"><strong class="text-capitalize">{{$message}}</strong>
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan_diakui">Pendidikan Diakui</label>
                                            <select name="pendidikan_diakui" class="form-control  @error('pendidikan_diakui') is-invalid @enderror" id="pendidikan_diakui">
                                                <option value="">---Pilih---</option>
                                                <option value="SMA" @if(!empty(old('pendidikan_diakui'))){{old('pendidikan_diakui') == 'SMA' ? 'selected' : ''}}@else{{$pegawai->pendidikan_diakui == 'SMA' ? 'selected' : ''}}@endif>SMA</option>
                                                <option value="S1" @if(!empty(old('pendidikan_diakui'))){{old('pendidikan_diakui') == 'S1' ? 'selected' : ''}}@else{{$pegawai->pendidikan_diakui == 'S1' ? 'selected' : ''}}@endif>S1</option>
                                                <option value="S2" @if(!empty(old('pendidikan_diakui'))){{old('pendidikan_diakui') == 'S2' ? 'selected' : ''}}@else{{$pegawai->pendidikan_diakui == 'S2' ? 'selected' : ''}}@endif>S2</option>
                                                <option value="S3" @if(!empty(old('pendidikan_diakui'))){{old('pendidikan_diakui') == 'S3' ? 'selected' : ''}}@else{{$pegawai->pendidikan_diakui == 'S3' ? 'selected' : ''}}@endif>S3</option>
                                                <option value="D2" @if(!empty(old('pendidikan_diakui'))){{old('pendidikan_diakui') == 'D2' ? 'selected' : ''}}@else{{$pegawai->pendidikan_diakui == 'D2' ? 'selected' : ''}}@endif>D2</option>
                                                <option value="D3" @if(!empty(old('pendidikan_diakui'))){{old('pendidikan_diakui') == 'D3' ? 'selected' : ''}}@else{{$pegawai->pendidikan_diakui == 'D3' ? 'selected' : ''}}@endif>D3</option>
                                                <option value="D4" @if(!empty(old('pendidikan_diakui'))){{old('pendidikan_diakui') == 'D4' ? 'selected' : ''}}@else{{$pegawai->pendidikan_diakui == 'D4' ? 'selected' : ''}}@endif>D4</option>
                                            </select>
                                            @error('pendidikan_diakui')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input name="tanggal_lahir" value="@if(!empty(old('tanggal_lahir'))){{ old('tanggal_lahir') }} @elseif(!empty($pegawai->tanggal_lahir)){{\Carbon\Carbon::parse($pegawai->tanggal_lahir)->format('d-m-Y')}}@endif" type="text" class="form-control date15  @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir">
                                            @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select name="agama" class="form-control  @error('agama') is-invalid @enderror" id="agama">
                                                <option value="">---Pilih---</option>
                                                <option value="Islam" @if(!empty(old('agama'))) {{old('agama') == 'Islam' ? 'selected' : ''}} @else{{$pegawai->agama == 'Islam' ? 'selected' : ''}}@endif>Islam</option>
                                                <option value="Kristen" @if(!empty(old('agama'))) {{old('agama') == 'Kristen' ? 'selected' : ''}} @else{{$pegawai->agama == 'Kristen' ? 'selected' : ''}}@endif>Kristen</option>
                                                <option value="Katolik" @if(!empty(old('agama'))) {{old('agama') == 'Katolik' ? 'selected' : ''}} @else{{$pegawai->agama == 'Katolik' ? 'selected' : ''}}@endif>Katolik</option>
                                                <option value="Hindu" @if(!empty(old('agama'))) {{old('agama') == 'Hindu' ? 'selected' : ''}} @else{{$pegawai->agama == 'Hindu' ? 'selected' : ''}}@endif>Hindu</option>
                                                <option value="Buddha" @if(!empty(old('agama'))) {{old('agama') == 'Buddha' ? 'selected' : ''}} @else{{$pegawai->agama == 'Buddha' ? 'selected' : ''}}@endif>Buddha</option>
                                                <option value="Konghucu" @if(!empty(old('agama'))) {{old('agama') == 'Konghucu' ? 'selected' : ''}} @else{{$pegawai->agama == 'Konghucu' ? 'selected' : ''}}@endif>Konghucu</option>
                                            </select>
                                            @error('agama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status_hubungan_dalam_keluarga">Status Hubungan Dalam Keluarga</label>
                                            <select class="form-control @error('status_hubungan_dalam_keluarga') is-invalid @enderror" name="status_hubungan_dalam_keluarga" id="status_hubungan_dalam_keluarga">
                                                <option value="">--- Pilih ---</option>
                                                <option value="Anak" @if(!empty(old('status_hubungan_dalam_keluarga'))) {{old('status_hubungan_dalam_keluarga') == 'Anak' ? 'selected' : ''}}@else{{$pegawai->status_hubungan_dalam_keluarga == 'Anak' ? 'selected' : ''}}@endif>Anak</option>
                                                <option value="Istri" @if(!empty(old('status_hubungan_dalam_keluarga'))) {{old('status_hubungan_dalam_keluarga') == 'Istri' ? 'selected' : ''}}@else{{$pegawai->status_hubungan_dalam_keluarga == 'Istri' ? 'selected' : ''}}@endif>Istri</option>
                                                <option value="Suami" @if(!empty(old('status_hubungan_dalam_keluarga'))) {{old('status_hubungan_dalam_keluarga') == 'Suami' ? 'selected' : ''}}@else{{$pegawai->status_hubungan_dalam_keluarga == 'Suami' ? 'selected' : ''}}@endif>Suami</option>
                                            </select>
                                            @error('status_hubungan_dalam_keluarga')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama_ayah">Nama Ayah</label>
                                            <input name="nama_ayah" value="@if(!empty(old('nama_ayah'))){{ old('nama_ayah') }}@else{{$pegawai->nama_ayah}}@endif" type="text" class="form-control  @error('nama_ayah') is-invalid @enderror" id="nama_ayah">
                                            @error('nama_ayah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_ktp">Alamat KTP</label>
                                            <textarea class="form-control @error('alamat_ktp') is-invalid @enderror" name="alamat_ktp" rows="5" id="alamat_ktp">@if(!empty(old('alamat_ktp'))){{ old('alamat_ktp') }}@else{{$pegawai->alamat_ktp}}@endif</textarea>
                                            @error('alamat_ktp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kota_asal">Kota Asal</label>
                                            <input name="kota_asal" value="@if(!empty(old('kota_asal'))){{ old('kota_asal') }}@else{{$pegawai->kota_asal}}@endif" type="text" class="form-control  @error('kota_asal') is-invalid @enderror" id="kota_asal">
                                            @error('kota_asal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_ktp">No. KTP / NIK</label>
                                            <input name="no_ktp" value="@if(!empty(old('no_ktp'))){{ old('no_ktp') }}@else{{$pegawai->no_ktp}}@endif" type="text" class="form-control  @error('no_ktp') is-invalid @enderror" id="no_ktp">
                                            @error('no_ktp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_kitap">No. KITAP</label>
                                            <input name="no_kitap" value="@if(!empty(old('no_kitap'))){{ old('no_kitap') }}@else{{$pegawai->no_kitap}}@endif" type="text" class="form-control  @error('no_kitap') is-invalid @enderror" id="no_kitap">
                                            @error('no_kitap')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama_ibu">Nama Ibu</label>
                                            <input name="nama_ibu" value="@if(!empty(old('nama_ibu'))){{ old('nama_ibu') }}@else{{$pegawai->nama_ibu}}@endif" type="text" class="form-control  @error('nama_ibu') is-invalid @enderror" id="nama_ibu">
                                            @error('no_kitap')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_domisili">Alamat Domisili</label>
                                            <textarea class="form-control @error('alamat_domisili') is-invalid @enderror" name="alamat_domisili" rows="5" id="alamat_domisili">@if(!empty(old('alamat_domisili'))){{ old('alamat_domisili') }}@else{{$pegawai->alamat_domisili}}@endif</textarea>
                                            @error('alamat_domisili')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kewarganegaraan">Kewarganegaraan</label>
                                            <input name="kewarganegaraan" value="@if(!empty(old('kewarganegaraan'))){{ old('kewarganegaraan') }}@else{{$pegawai->kewarganegaraan}}@endif" type="text" class="form-control kewarganegaraan @error('kewarganegaraan') is-invalid @enderror" id="kewarganegaraan">
                                            @error('kewarganegaraan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="masa_kerja">Masa Kerja</label>
                                            <input name="masa_kerja" value="@if(!empty(old('masa_kerja'))){{ old('masa_kerja') }}@else{{$pegawai->masa_kerja}}@endif" type="text" class="form-control  @error('masa_kerja') is-invalid @enderror" id="masa_kerja" readonly>
                                            @error('masa_kerja')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row ml-1">
                                    <div class="col-md-4 col-lg-4">
                                        <div class="card">
                                            <div class="card-header" style="font-weight: bold;">Foto Pribadi</div>
                                            <div class="card-body bg-grey1 text-center">
                                                <div class="form-group mb-0">
                                                    <div class="mb-1">
                                                        <div class="image-area mt-4 bg-light">
                                                            <img asp-for="HeaderImage" id="imageResult" src="@if(!empty($pegawai->foto_pegawai)){{ Storage::url($pegawai->foto_pegawai)}}@endif" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                                            <label asp-for="HeaderImage" id="upload-label" for="upload" class="font-weight-light text-muted" style="white-space: pre;"></label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="upload" class="btn btn-grey m-auto rounded-pill px-4">Pilih / Ubah Foto</label>
                                                        <input name="foto_pegawai" id="upload" type="file" onchange="readURL(this);" style="display: none;" class="form-control border-1 @error('foto_pegawai') is-invalid @enderror" @if(!empty($pegawai->foto_pegawai)) 'value="{{$pegawai->foto_pegawai}}"'@endif>
                                                        @error('foto_pegawai')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-capitalize">{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="data-kelengkapan" role="tabpanel" aria-labelledby="pills-contact-tab-icon">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_bpjs_kesehatan">No. BPJS Kesehatan</label>
                                            <input name="no_bpjs_kesehatan" value="@if(!empty(old('no_bpjs_kesehatan'))){{ old('no_bpjs_kesehatan') }}@else{{$pegawai->no_bpjs_kesehatan}}@endif" type="text" class="form-control @error('no_bpjs_kesehatan') is-invalid @enderror" id="no_bpjs_kesehatan">
                                            @error('no_bpjs_kesehatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_passport">No. Passport</label>
                                            <input name="no_passport" value="@if(!empty(old('no_passport'))){{ old('no_passport') }} @else{{$pegawai->no_passport}}@endif" type="text" class="form-control @error('no_passport') is-invalid @enderror" id="no_passport">
                                            @error('no_passport')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_bpjs_ketenagakerjaan">No. BPJS Ketenagakerjaan</label>
                                            <input name="no_bpjs_ketenagakerjaan" value="@if(!empty(old('no_bpjs_ketenagakerjaan'))){{ old('no_bpjs_ketenagakerjaan') }} @else{{$pegawai->no_bpjs_ketenagakerjaan}}@endif" type="text" class="form-control @error('no_bpjs_ketenagakerjaan') is-invalid @enderror" id="no_bpjs_ketenagakerjaan">
                                            @error('no_bpjs_ketenagakerjaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="npwp">No. NPWP</label>
                                            <input name="npwp" value="@if(!empty(old('npwp'))){{ old('npwp') }} @else{{$pegawai->npwp}}@endif" type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp">
                                            @error('npwp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_bank">Nama Bank</label>
                                            <input name="nama_bank" value="@if(!empty(old('nama_bank'))){{ old('nama_bank') }} @else{{$pegawai->nama_bank}}@endif" type="text" class="form-control @error('nama_bank') is-invalid @enderror" id="nama_bank">
                                            @error('nama_bank')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_rekening_gaji">No. Rekening Gaji</label>
                                            <input name="no_rekening_gaji" value="@if(!empty(old('no_rekening_gaji'))){{ old('no_rekening_gaji') }} @else{{$pegawai->no_rekening_gaji}}@endif" type="text" class="form-control @error('no_rekening_gaji') is-invalid @enderror" id="no_rekening_gaji">
                                            @error('no_rekening_gaji')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_handphone">No. Hp</label>
                                            <input name="no_handphone" value="@if(!empty(old('no_handphone'))){{ old('no_handphone') }} @else{{$pegawai->no_handphone}}@endif" type="text" class="form-control @error('no_handphone') is-invalid @enderror" id="no_hp">
                                            @error('no_handphone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_jabatan">Jabatan</label>
                                            <select name="kode_jabatan" class="form-control @error('kode_jabatan') is-invalid @enderror" id="kode_jabatan">
                                                <option value="">---Pilih---</option>
                                                @foreach($j as $jabatan)
                                                <option value="{{$jabatan->id}}" @if(!empty(old('kode_jabatan'))){{old('kode_jabatan') == $jabatan->id ? 'selected' : ''}}@else{{$jabatan->id == $pegawai->kode_jabatan ? 'selected' : ''}}@endif>{{$jabatan->nama_jabatan}}</option>
                                                @endforeach
                                            </select>
                                            @error('kode_jabatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="departemen">Departemen</label>
                                            <input name="departemen" value="@if(!empty(old('departemen'))){{old('departemen')}}@else{{$pegawai->departemen}}@endif" type="text" class="form-control @error('departemen') is-invalid @enderror" list="departemens" id="departemen">
                                            <datalist id="departemens">
                                                <option value="-">-</option>
                                            </datalist>
                                            @error('departemen')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_rekening_ppip">No. Rekening PPIP</label>
                                            <input name="no_rekening_ppip" value="@if(!empty(old('no_rekening_ppip'))){{ old('no_rekening_ppip') }} @else{{$pegawai->no_rekening_ppip}}@endif" type="text" class="form-control @error('no_rekening_ppip') is-invalid @enderror" id="no_rekening_ppip">
                                            @error('no_rekening_ppip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input name="email" value="@if(!empty(old('email'))){{ old('email') }}@else{{$pegawai->email}}@endif" type="email" class="form-control @error('email') is-invalid @enderror" id="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="division">Divisi</label>
                                            <select name="division" class="form-control @error('division') is-invalid @enderror division" onchange="getUnitKerja()" id="division">
                                                <option value="">---Pilih---</option>
                                                @foreach($d as $divisi)
                                                <option value="{{$divisi->nama_divisi}}" @if(!empty(old('division'))) {{old('division') == $divisi->nama_divisi ? 'selected' : ''}}@else{{$pegawai->division == $divisi->nama_divisi ? 'selected' : ''}}@endif>{{$divisi->nama_divisi}}</option>
                                                @endforeach
                                            </select>
                                            @error('division')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="unit_kerja">Selection / Unit Kerja</label>
                                            <select name="unit_kerja" class="form-control @error('unit_kerja') is-invalid @enderror" id="unit_kerja">
                                                <option value="">---Pilih---</option>
                                            </select>
                                            @error('unit_kerja')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{ route('Karyawan.index') }}">Batal</a>
                        <button type="submit" class="btn btn-success submitbtn">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
<script>
    function hitungSelisihTahun(dt1, tipe) {
        let dt2 = new Date();
        dt2 = [dt2.getDate(), dt2.getMonth(), dt2.getFullYear()].join('-');
        let [day1, month1, year1] = dt1.split('-');
        let [day2, month2, year2] = dt2.split('-');
        let diff = ((year2 - year1) * 12) + (month2 - month1);
        let tahun = Math.round(diff / 12);
        if (!Number.isInteger(diff / 12)) {
            tahun -= 1;
        }
        if (tahun < 10 && tahun >= 0) {
            tahun = '0' + tahun;
        } else if (tahun < 0) {
            tahun = '0';
        }
        let sisabulan = diff % 12;
        if (sisabulan < 10 && sisabulan >= 0) {
            sisabulan = '0' + sisabulan;
        } else if (sisabulan < 0) {
            sisabulan = '0';
        }
        let perbedaan = tahun;
        if (tipe == 'masakerja') {
            perbedaan += ' Tahun ' + sisabulan + ' Bulan'
        } else if (tipe == 'umur') {
            perbedaan = perbedaan;
        }

        return perbedaan;
    }
    $(document).ready(function() {
        $(function() {
            $('input[name^=kontrak_]').datepicker({
                format: 'dd-mm-yyyy'
            });
            $('input[name^=selesai_kontrak_]').datepicker({
                format: 'dd-mm-yyyy'
            });
            $('input[name^=tanggal_]').datepicker({
                format: 'dd-mm-yyyy'
            });
        });


        $('.date15').change(function() {
            let tgl_lahir = $('#tanggal_lahir').val();
            $('.umur').attr('value', hitungSelisihTahun(tgl_lahir, 'umur'));
        });

        if ($('.division').val() != '') {
            getUnitKerja();
        }

        getMasaKerja();
    });

    function isSelected(nama) {
        var old = "{{old('unit_kerja')}}";
        var saved = "{{$pegawai->unit_kerja}}";
        if (saved.indexOf('&') !== -1) {
            saved = saved.replace(/&amp;/g, '&');
        }
        if (old.indexOf('&') !== -1) {
            old = old.replace(/&amp;/g, '&');
        }
        if (old !== '') {
            if (nama === old) {
                return 'selected';
            } else {
                return '';
            }
        } else {
            if (nama === saved) {
                return 'selected';
            } else {
                return '';
            }
        }
    }

    function getUnitKerja(divisi_name) {
        var divisi_name = $('.division').val();
        if (divisi_name) {
            $.ajax({
                type: "GET",
                url: "/get/getUnitKerja/" + divisi_name,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#unit_kerja").empty();
                        $("#unit_kerja").append('<option value="">---Pilih---</option>');
                        $.each(res, function(kode, nama) {
                            $("#unit_kerja").append('<option value="' + nama + '" ' + isSelected(nama) + '> ' + nama + ' </option>');
                        });
                    } else {
                        $("#unit_kerja").empty();
                        $("#unit_kerja").append('<option value="">---Pilih---</option>');
                    }
                }
            });
        } else {
            $("#unit_kerja").empty();
            $("#unit_kerja").append('<option value="">---Pilih---</option>');
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function() {
        $('#upload').on('change', function() {
            readURL(input);
        });
    });
    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');
    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }

    function getTanggalPensiun() {
        for (let i = 10; i >= 1; i--) {
            if ($('#kontrak_' + i).val() !== '' && $('#selesai_kontrak_' + i).val() !== '') {
                $('#tanggal_pensiun').val($('#selesai_kontrak_' + i).val());
                // console.log(masa);
                break;
            }
        }
    }

    function getMasaKerja() {
        let tanggalKontrak = $('#kontrak_1').val();
        let masa = hitungSelisihTahun(tanggalKontrak, 'masakerja');
        $('#masa_kerja').val(masa);
    }
</script>
@endpush