@extends('layout.master')
@section('statusmutasi','active')
@section('statusdatamemo','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Memo</h4>
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
                <a href="{{route('Memo.index')}}">Daftar Memo</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Memo.index')}}">Edit Memo</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Memo</div>
                </div>
                <form method="POST" action="{{route('Memo.update', $m->id)}}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="pengirim">Pengirim</label>
                                    <input value="@if(!empty(old('pengirim'))){{ old('pengirim') }}@else{{$m->pengirim}}@endif" type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim">
                                    @error('pengirim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="penerima">Penerima</label>
                                    <input value="@if(!empty(old('penerima'))){{ old('penerima') }}@else{{$m->penerima}}@endif" type="text" name="penerima" class="form-control @error('penerima') is-invalid @enderror" id="penerima">
                                    @error('penerima')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="kode_memo">Nomor Memo</label>
                                    <input value="@if(!empty(old('kode_memo'))){{ old('kode_memo') }}@else{{$m->kode_memo}}@endif" type="text" name="kode_memo" class="form-control @error('kode_memo') is-invalid @enderror" id="kode_memo">
                                    @error('kode_memo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="tanggal_memo">Tanggal Memo</label>
                                    <input name="tanggal_memo" type="text" value="{{\Carbon\Carbon::parse($m->tanggal_memo)->format('d-m-Y')}}" class="form-control form-control @error('tanggal_memo') is-invalid @enderror" id="tanggal_memo">
                                    @error('tanggal_memo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input value="@if(!empty(old('perihal'))){{ old('perihal') }}@else{{$m->perihal}}@endif" type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror" id="perihal">
                                    @error('perihal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input value="@if(!empty(old('deskripsi'))){{ old('deskripsi') }}@else{{$m->deskripsi}}@endif" type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi">
                                    @error('deskripsi')
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
                <a class="btn btn-danger" href="{{route('Memo.index')}}">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@push('plugin-scripts')
<script>
    $(document).ready(function() {
        $('#tanggal_memo').datepicker({
            format: 'yy/mm/dd',
            autoclose: true,
            todayHighlight: true
        }); 
    });
</script>
@endpush