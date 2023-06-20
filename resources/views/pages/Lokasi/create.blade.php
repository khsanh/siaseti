@extends('layout.master')
@section('statuslokasi','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Daftar Lokasi</h4>
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
                <a href="{{route('lokasi.create')}}">Tambah Lokasi</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Lokasi</div>
                </div>
                <form method="POST" action="{{route('lokasi.store')}}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="kode_lokasi">Kode Lokasi</label>
                                    <input type="text" name="kode_lokasi" value="@if(!empty(old('kode_lokasi'))){{ old('kode_lokasi') }}@endif" class="form-control  input-full @error('kode_lokasi') is-invalid @enderror" id="kode_lokasi">
                                    @error('kode_lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_lokasi">Nama Lokasi</label>
                                    <input type="text" name="nama_lokasi" value="@if(!empty(old('nama_lokasi'))){{ old('nama_lokasi') }}@endif" class="form-control  input-full @error('nama_lokasi') is-invalid @enderror" id="nama_lokasi">
                                    @error('nama_lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_divisi">Letak Divisi</label>
                                    <select name="id_divisi" class="form-control form-control">
                                        <option>---Pilih---</option>
                                        @foreach($d as $div)
                                            <option value="{{$div->id}}" {{ old('id_divisi') == $div->nama_divisi ? 'selected' : '' }} > {{$div->kode_divisi}} - {{$div->nama_divisi}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_divisi')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="detail_lokasi">Detail Lokasi</label>
                                    <input type="text" name="detail_lokasi" value="@if(!empty(old('ndetail_lokasi'))){{ old('detail_lokasi') }}@endif" class="form-control  input-full @error('detail_lokasi') is-invalid @enderror" id="detail_lokasi">
                                    @error('detail_lokasi')
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
                <a class="btn btn-danger" href="{{route('lokasi.index')}}">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection