@extends('layout.master')
@section('statustipepegawai','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tipe Pegawai</h4>
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
                <a href="{{route('tipePegawai.index')}}">Tipe Pegawai</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('tipePegawai.index')}}">Edit Pegawai</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tipe Pegawai</div>
                </div>
                <form method="POST" action="{{route('tipePegawai.update', $Pegawai->id)}}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="Kode_Tipe_Pegawai">Kode Tipe Pegawai</label>
                                    <input value="@if(!empty(old('kode_tipe_pegawai'))){{ old('kode_tipe_pegawai') }}@else{{$Pegawai->kode_tipe_pegawai}}@endif" type="text" name="kode_tipe_pegawai" class="form-control @error('kode_tipe_pegawai') is-invalid @enderror" id="Kode_Tipe_Pegawai">
                                    @error('kode_tipe_pegawai')
                                        <span class="invalid-feedback" role="alert">
                                             <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_tipe_pegawai">Nama Tipe Pegawai</label>
                                    <input value="@if(!empty(old('nama_tipe_pegawai'))){{ old('nama_tipe_pegawai') }}@else{{$Pegawai->nama_tipe_pegawai}}@endif" type="text" name="nama_tipe_pegawai" class="form-control @error('nama_tipe_pegawai') is-invalid @enderror" id="Nama_Tipe_Pegawai">
                                    @error('nama_tipe_pegawai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-action">
                <a class="btn btn-danger" href="{{route('tipePegawai.index')}}">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection