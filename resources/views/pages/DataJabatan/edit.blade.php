@extends('layout.master')
@section('statusjabatan','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Jabatan</h4>
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
                <a href="{{route('Jabatan.index')}}">Jabatan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Jabatan.edit', $Jabatan->id)}}">Edit Jabatan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Jabatan</div>
                </div>
                <form method="POST" action="{{ route('Jabatan.update', $Jabatan->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label for="kode_jabatan">Kode Jabatan</label>
                                    <input disable value="@if(!empty(old('kode_jabatan'))){{ old('kode_jabatan') }}@else{{$Jabatan->kode_jabatan}}@endif" name="kode_jabatan" type="text" class="form-control @error('kode_jabatan') is-invalid @enderror" id="kode_jabatan">
                                    @error('kode_jabatan')
                                        <span class="invalid-feedback" role="alert">
                                             <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_jabatan">Nama Jabatan</label>
                                    <input value="@if(!empty(old('nama_jabatan'))){{ old('nama_jabatan') }}@else{{$Jabatan->nama_jabatan}}@endif" name="nama_jabatan" type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama_jabatan">
                                    @error('nama_jabatan')
                                        <span class="invalid-feedback" role="alert">
                                             <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control  @error('status') is-invalid @enderror" id="status">
                                        <option value="">---Pilih---</option>
                                        <option value="Aktif" @if(!empty(old('status'))) {{old('status') == 'Aktif' ? 'selected' : ''}} @else{{$Jabatan->status == 'Aktif' ? 'selected' : ''}}@endif>Aktif</option>
                                        <option value="Nonaktif"@if(!empty(old('status'))) {{old('status') == 'Nonaktif' ? 'selected' : ''}} @else{{$Jabatan->status == 'Nonaktif' ? 'selected' : ''}}@endif>Nonaktif</option>
                                    </select>
                                    @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Jabatan.index')}}">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection