@extends('layout.master')
@section('statusmutasi','active')
@section('statusberitaacara','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Daftar Berita Acara</h4>
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
                <a href="{{route('beritaAcara.index')}}">Berita Acara</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">

                <a href="{{route('beritaAcara.show', $ba->id)}}">Detail Berita Acara</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Berita Acara</div>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                        <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Nomor Memo</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$ba->memo->kode_memo}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Nomor Berita Acara</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$ba->kode_berita_acara}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Tanggal Berita Acara</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$ba->tanggal_berita_acara}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Perihal</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$ba->perihal}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="deskripsi" class="col-md-4 col-form-label">Deskripsi</label>
                                        <div class="col-md-8 p-0">
                                            <textarea class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>{{$ba->deskripsi}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <a class="btn btn-danger" href="{{route('beritaAcara.index')}}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection