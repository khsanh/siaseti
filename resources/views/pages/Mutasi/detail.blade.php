@extends('layout.master')
@section('statusmutasi','active')
@section('statusdatamutasi','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Monitoring</h4>
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
                <a href="{{route('Monitoring.index')}}">Monitoring</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Monitoring.show', $monitoring->id)}}">Detail Monitoring</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Data Monitoring</div>
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        <div class="col-9">
                            <div class="form-group form-inline">
                                <label for="kode_aset" class="col-md-4 col-form-label">Kode Aset</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$monitoring->detail_aset->kode_aset}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="nama_barang" class="col-md-4 col-form-label">Nama Barang</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$monitoring->detail_aset->nama_barang}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="tanggal_monitoring" class="col-md-4 col-form-label">Tanggal Monitoring</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{\Carbon\Carbon::parse($monitoring->tanggal_monitoring)->format('d-m-Y')}}" class="form-control input-full" id="tanggal_monitoring" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF; color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="kondisi" class="col-md-4 col-form-label">Kondisi</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$monitoring->kondisi}}" class="form-control input-full" id="nama" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="deskripsi" class="col-md-4 col-form-label">Deskripsi</label>
                                <div class="col-md-8 p-0">
                                    <textarea class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>{{$monitoring->deskripsi}}</textarea>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="inlineinput" class="col-md-4 col-form-label">Foto</label>
                                <div class="col-md-8 p-0">
                                    @if(Storage::exists($monitoring->foto))
                                    <iframe src="{{ asset('/laraview/#..'.Storage::url($monitoring->foto)) }}" width="600px" height="400px"></iframe>
                                    <a class="btn btn-primary btn-sm text-white" href="{{ Storage::url($monitoring->foto)}}"> Download File</a>
                                    @else
                                    <h6 class="text-center">foto Tidak ada. Klik <span class="badge badge-primary"><a class="text-white" href="{{route('Monitoring.edit',$monitoring->id)}}">Edit Monitoring</a></span> untuk Menambahkan.</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <a class="btn btn-danger" href="{{route('Monitoring.list', $monitoring->id_detail_aset)}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection