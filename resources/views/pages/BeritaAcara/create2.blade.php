@extends('layout.master')
@section('statusmutasi','active')
@section('statusberitaacara','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tambah Berita Acara</h4>
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
                <a href="{{route('beritaAcara.create')}}">Tambah Berita Acara</a>
            </li>
        </ul>
    </div>
 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Berita Acara</div>
                </div>
                <form method="POST" action="{{route('beritaAcara.store')}}" id="myForm">
                    @csrf
                    <div class="card-body">
                    <div class="row">
                            <div class="col-md-6 col-lg-5">
                               <div class="form-group">
                                    <label for="nomor_memo">Nomor Memo</label>
                                    <input type="text" name="nomor_memo" value="{{ $m->kode_memo }}" class="form-control  input-full" id="nomor_memo" disabled>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="kode_berita_acara">Nomor Berita Acara</label>
                                    <input type="text" name="kode_berita_acara" value="@if(!empty(old('kode_berita_acara'))){{ old('kode_berita_acara') }}@endif" class="form-control  input-full @error('kode_berita_acara') is-invalid @enderror" id="kode_berita_acara">
                                    @error('kode_berita_acara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="tanggal_berita_acara">Tanggal Berita Acara</label>
                                    <input @if($errors->has('tanggal_berita_acara')) autofocus @endif value="{{old('tanggal_berita_acara')}}" type="text" name="tanggal_berita_acara" class="form-control tanggal_berita_acara @error('tanggal_berita_acara') is-invalid @enderror" id="tanggal_berita_acara">
                                    @error('tanggal_berita_acara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" name="perihal" value="@if(!empty(old('perihal'))){{ old('perihal') }}@endif" class="form-control  input-full @error('perihal') is-invalid @enderror" id="perihal">
                                    @error('perihal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" value="@if(!empty(old('deskripsi'))){{ old('deskripsi') }}@endif" class="form-control  input-full @error('deskripsi') is-invalid @enderror" id="deskripsi">
                                    @error('deskripsi')
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
                <a class="btn btn-danger" href="{{route('Memo.index')}}">Batal</a>
                <input type="hidden" name="id_memo" value="{{ $m->id }}" required>
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
        $('#tanggal_berita_acara').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
</script>
@endpush