@extends('layout.master')
@section('statusjenisbarang','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Daftar Jenis Barang</h4>
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
                <a href="{{route('jenisBarang.create')}}">Tambah Jenis Barang</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Jenis Barang</div>
                </div>
                <form method="POST" action="{{route('jenisBarang.store')}}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                               <div class="form-group">
                                    <label for="kode_jenis_barang">Kode Jenis Barang</label>
                                    <select name="kode_jenis_barang" class="form-control input-full @error('kode_jenis_barang') is-invalid @enderror" id="kode_jenis_barang">
                                        <option value="">---Pilih---</option>
                                        <option value="IT-A" @if(!empty(old('kode_jenis_barang'))){{old('kode_jenis_barang') == 'IT-A' ? 'selected' : ''}}@endif>IT-A</option>
                                        <option value="IT-B" @if(!empty(old('kode_jenis_barang'))){{old('kode_jenis_barang') == 'IT-B' ? 'selected' : ''}}@endif>IT-B</option>
                                        <option value="IT-C" @if(!empty(old('kode_jenis_barang'))){{old('kode_jenis_barang') == 'IT-C' ? 'selected' : ''}}@endif>IT-C</option>
                                        <option value="SOFT" @if(!empty(old('kode_jenis_barang'))){{old('kode_jenis_barang') == 'SOFT' ? 'selected' : ''}}@endif>SOFT</option>
                                    </select>
                                    @error('kode_jenis_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" value="@if(!empty(old('nama_barang'))){{ old('nama_barang') }}@endif" class="form-control  input-full @error('nama_barang') is-invalid @enderror" id="nama_barang">
                                    @error('nama_barang')
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
                <a class="btn btn-danger" href="{{route('jenisBarang.index')}}">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection