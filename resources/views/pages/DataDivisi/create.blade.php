@extends('layout.master')
@section('statusdivisi','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Daftar Divisi</h4>
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
                <a href="{{route('dataDivisi.create')}}">Tambah Divisi</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Divisi</div>
                </div>
                <form method="POST" action="{{route('dataDivisi.store')}}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="kode_divisi">Kode Divisi</label>
                                    <input type="text" value="@if(!empty(old('kode_divisi'))){{ old('kode_divisi') }}@endif" name="kode_divisi" class="form-control input-full @error('kode_divisi') is-invalid @enderror" id="Kode_Divisi">
                                    @error('kode_divisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_divisi">Nama Divisi</label>
                                    <input type="text" name="nama_divisi" value="@if(!empty(old('nama_divisi'))){{ old('nama_divisi') }}@endif" class="form-control  input-full @error('nama_divisi') is-invalid @enderror" id="Nama_Divisi">
                                    @error('nama_Divisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-action">
                <a class="btn btn-danger" href="{{route('dataDivisi.index')}}">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection