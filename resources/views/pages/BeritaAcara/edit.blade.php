@extends('layout.master')
@section('statusmutasi','active')
@section('statusberitaacara','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Berita Acara</h4>
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
                <a href="{{route('beritaAcara.index')}}">Daftar Berita Acara</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('beritaAcara.index')}}">Edit Berita Acara</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Berita Acara</div>
                </div>
                <form method="POST" action="{{route('beritaAcara.update', $ba->id)}}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                               <div class="form-group">
                                    <label for="id_memo">Nama Karyawan</label>
                                    <select name="id_memo" class="form-control form-control @error('id_memo') is-invalid @enderror" required id="id_memo">
                                        <option value="">---Pilih---</option>
                                        @foreach($m as $m)
                                        <option value="{{$m->id}}" {{$ba->id_memo == $m->id ? 'selected' : ''}}>{{$m->kode_memo}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_memo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="kode_berita_acara">Nomor Berita Acara</label>
                                    <input value="@if(!empty(old('kode_berita_acara'))){{ old('kode_berita_acara') }}@else{{$ba->kode_berita_acara}}@endif" type="text" name="kode_berita_acara" class="form-control @error('kode_berita_acara') is-invalid @enderror" id="kode_berita_acara">
                                    @error('kode_berita_acara')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="tanggal_berita_acara">Tanggal Berita Acara</label>
                                    <input name="tanggal_berita_acara" type="text" value="{{\Carbon\Carbon::parse($ba->tanggal_berita_acara)->format('d-m-Y')}}" class="form-control form-control @error('tanggal_berita_acara') is-invalid @enderror" id="tanggal_berita_acara">
                                    @error('tanggal_berita_acara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input value="@if(!empty(old('perihal'))){{ old('perihal') }}@else{{$ba->perihal}}@endif" type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror" id="perihal">
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
                                    <input value="@if(!empty(old('deskripsi'))){{ old('deskripsi') }}@else{{$ba->deskripsi}}@endif" type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi">
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
                <a class="btn btn-danger" href="{{route('beritaAcara.index')}}">Batal</a>
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
            format: 'yy/mm/dd',
            autoclose: true,
            todayHighlight: true
        }); 
    });
</script>
@endpush