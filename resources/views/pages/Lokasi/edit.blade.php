@extends('layout.master')
@section('statuslokasi','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Lokasi</h4>
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
                <a href="{{route('lokasi.index')}}">Daftar Lokasi</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('lokasi.index')}}">Edit Lokasi</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Daftar Lokasi</div>
                </div>
                <form method="POST" action="{{route('lokasi.update', $L->id)}}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="kode_lokasi">Kode Lokasi</label>
                                    <input value="@if(!empty(old('kode_lokasi'))){{ old('kode_lokasi') }}@else{{$L->kode_lokasi}}@endif" type="text" name="kode_lokasi" class="form-control @error('kode_lokasi') is-invalid @enderror" id="kode_lokasi">
                                    @error('kode_lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_lokasi">Nama Lokasi</label>
                                    <input value="@if(!empty(old('nama_lokasi'))){{ old('nama_lokasi') }}@else{{$L->nama_lokasi}}@endif" type="text" name="nama_lokasi" class="form-control @error('nama_lokasi') is-invalid @enderror" id="nama_lokasi">
                                    @error('nama_lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_divisi">Letak Divisi</label>
                                    <select name="id_divisi" class="form-control form-control">
                                        @foreach($d as $div)
                                            <option value="{{$div->id}}" {{ $L->id_divisi == $div->id ? 'selected' : '' }} > {{$div->kode_divisi}} - {{$div->nama_divisi}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_divisi')
                                        <span class="invalid-feedback" role="alert">
                                             <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="detail_lokasi">Detail Lokasi</label>
                                    <input value="@if(!empty(old('detail_lokasi'))){{ old('detail_lokasi') }}@else{{$L->detail_lokasi}}@endif" type="text" name="detail_lokasi" class="form-control @error('detail_lokasi') is-invalid @enderror" id="detail_lokasi">
                                    @error('detail_lokasi')
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
                <a class="btn btn-danger" href="{{route('detailAset.index')}}">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection