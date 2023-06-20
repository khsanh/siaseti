@extends('layout.master')
@section('statusdaftarpegawai','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Daftar Pegawai</h4>
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
                <a href="{{route('penanggungJawab.index')}}">Daftar Pegawai</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('penanggungJawab.index')}}">Edit Pegawai</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Daftar Pegawai</div>
                </div>
                <form method="POST" action="{{route('penanggungJawab.update', $dp->id)}}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nip">NIP Pegawai</label>
                                    <input value="@if(!empty(old('nip'))){{ old('nip') }}@else{{$dp->nip}}@endif" type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip">
                                    @error('nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama">Nama Pegawai</label>
                                    <input value="@if(!empty(old('nama'))){{ old('nama') }}@else{{$dp->nama}}@endif" type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                                    @error('nama')
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
                <a class="btn btn-danger" href="{{route('penanggungJawab.index')}}">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection