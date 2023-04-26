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
                <a href="{{route('dataDivisi.index')}}">Divisi</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('dataDivisi.index')}}">Edit Divisi</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Divisi</div>
                </div>
                <form method="POST" action="{{route('dataDivisi.update', $Divisi->id)}}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="Kode_Divisi">Kode Divisi</label>
                                    <input value="@if(!empty(old('kode_divisi'))){{ old('kode_divisi') }}@else{{$Divisi->kode_divisi}}@endif" type="text" name="kode_divisi" class="form-control @error('kode_divisi') is-invalid @enderror" id="Kode_Divisi">
                                    @error('kode_divisi')
                                        <span class="invalid-feedback" role="alert">
                                             <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_divisi">Nama Divisi</label>
                                    <input value="@if(!empty(old('nama_divisi'))){{ old('nama_divisi') }}@else{{$Divisi->nama_divisi}}@endif" type="text" name="nama_divisi" class="form-control @error('nama_divisi') is-invalid @enderror" id="Nama_Divisi">
                                    @error('nama_divisi')
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
                <a class="btn btn-danger" href="{{route('dataDivisi.index')}}">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection