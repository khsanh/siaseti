@extends('layout.master')
@section('statusmutasi','active')
@section('statusdatamemo','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Daftar Memo</h4>
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
                <a href="{{route('Memo.index')}}">Memo</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">

                <a href="{{route('Memo.show', $m->id)}}">Detail Memo</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Memo</div>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                        <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Pengirim</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$m->pengirim}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Penerima</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$m->penerima}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Nomor Memo</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$m->kode_memo}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Tanggal Memo</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$m->tanggal_memo}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Perihal</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$m->perihal}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="deskripsi" class="col-md-4 col-form-label">Deskripsi</label>
                                        <div class="col-md-8 p-0">
                                            <textarea class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled>{{$m->deskripsi}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <a class="btn btn-danger" href="{{route('Memo.index')}}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection