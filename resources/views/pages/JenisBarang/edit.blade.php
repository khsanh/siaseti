@extends('layout.master')
@section('statusdaftarpegawai','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Jenis Barang</h4>
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
                <a href="{{route('jenisBarang.index')}}">Daftar Jenis Barang</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('jenisBarang.index')}}">Edit Jenis Barang</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Daftar Jenis Barang</div>
                </div>
                <form method="POST" action="{{route('jenisBarang.update', $jb->id)}}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="kode_jenis_barang">Kode Jenis Barang</label>
                                    <select name="kode_jenis_barang" class="form-control form-control @error('kode_jenis_barang') is-invalid @enderror" id="kode_jenis_barang">
                                        <option value="it-a" @if(!empty(old('kode_jenis_barang'))) {{old('kode_jenis_barang') == 'it-a' ? 'selected' : ''}}@else{{$jb->kode_jenis_barang == 'it-a' ? 'selected' : ''}}@endif>IT-A</option>
                                        <option value="it-b" @if(!empty(old('kode_jenis_barang'))) {{old('kode_jenis_barang') == 'it-b' ? 'selected' : ''}}@else{{$jb->kode_jenis_barang == 'it-b' ? 'selected' : ''}}@endif>IT-B</option>
                                        <option value="it-c" @if(!empty(old('kode_jenis_barang'))) {{old('kode_jenis_barang') == 'it-c' ? 'selected' : ''}}@else{{$jb->kode_jenis_barang == 'it-c' ? 'selected' : ''}}@endif>IT-C</option>
                                        <option value="soft" @if(!empty(old('kode_jenis_barang'))) {{old('kode_jenis_barang') == 'soft' ? 'selected' : ''}}@else{{$jb->kode_jenis_barang == 'soft' ? 'selected' : ''}}@endif>SOFT</option>
                                    </select>
                                    @error('kode_jenis_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input value="@if(!empty(old('nama_barang'))){{ old('nama_barang') }}@else{{$jb->nama_barang}}@endif" type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang">
                                    @error('nama_barang')
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
                <a class="btn btn-danger" href="{{route('jenisBarang.index')}}">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection