@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdatasertifikasi','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Karyawan</h4>
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
                <a href="{{route('Sertifikasi.index')}}">Sertifikasi</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Sertifikasi.edit', $sertifikasi->id)}}">Edit Sertifikasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Sertifikasi</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Sertifikasi.update', $sertifikasi->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="id_pegawai">Nama Karyawan</label>
                                    <select name="id_pegawai" class="form-control form-control @error('id_pegawai') is-invalid @enderror" required id="id_pegawai">
                                        <option value="">---Pilih---</option>
                                        @foreach($p as $pegawai)
                                        <option value="{{$pegawai->id}}" {{$sertifikasi->id_pegawai == $pegawai->id ? 'selected' : ''}}>{{$pegawai->nip}} - {{$pegawai->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_pegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_sertifikasi">Nama Sertifikasi</label>
                                    <input name="nama_sertifikasi" type="text" value="@if(!empty(old('nama_sertifikasi'))){{ old('nama_sertifikasi') }}@else{{$sertifikasi->nama_sertifikasi}}@endif" class="form-control form-control @error('nama_sertifikasi') is-invalid @enderror" id="nama_sertifikasi">
                                    @error('nama_sertifikasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="jenis_sertifikasi">Jenis Sertifikasi</label>
                                    <select name="jenis_sertifikasi" class="form-control @error('jenis_sertifikasi') is-invalid @enderror" id="jenis_sertifikasi">
                                        <option value="">---Pilih---</option>
                                        <option value="Softskill" @if(!empty(old('jenis_sertifikasi'))) {{old('jenis_sertifikasi') == 'Softskill' ? 'selected' : ''}}@else{{$sertifikasi->jenis_sertifikasi == 'Softskill' ? 'selected' : ''}}@endif>Softskill</option>
                                        <option value="Hardskill" @if(!empty(old('jenis_sertifikasi'))) {{old('jenis_sertifikasi') == 'Hardskill' ? 'selected' : ''}}@else{{$sertifikasi->jenis_sertifikasi == 'Hardskill' ? 'selected' : ''}}@endif>Hardskill</option>
                                    </select>
                                    @error('jenis_sertifikasi')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="bidang_sertifikasi">Bidang Sertifikasi</label>
                                    <input name="bidang_sertifikasi" value="@if(!empty(old('bidang_sertifikasi'))){{ old('bidang_sertifikasi') }}@else{{$sertifikasi->penyelenggara}}@endif" type="text" class="form-control f1 @error('bidang_sertifikasi') is-invalid @enderror" id="bidang_sertifikasi" required oninvalid="this.setCustomValidity('Isi bidang sertifikasi terlebih dahulu')" oninput="setCustomValidity('')">
                                    @error('bidang_sertifikasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="penyelenggara">Penyelenggara</label>
                                    <input name="penyelenggara" type="text" value="@if(!empty(old('penyelenggara'))){{ old('penyelenggara') }}@else{{$sertifikasi->penyelenggara}}@endif" class="form-control form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara">
                                    @error('penyelenggara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="lokasi_sertifikasi">Lokasi Sertifikasi</label>
                                    <textarea class="form-control f3 @error('lokasi_sertifikasi') is-invalid @enderror text-capitalize" name="lokasi_sertifikasi" rows="5" id="lokasi_sertifikasi_1" required oninvalid="this.setCustomValidity('Isi lokasi sertifikasi terlebih dahulu')" oninput="setCustomValidity('')">@if(!empty(old('lokasi_sertifikasi'))){{ old('bidang_sertifikasi') }}@else{{$sertifikasi->lokasi_sertifikasi}}@endif</textarea>
                                    @error('lokasi_sertifikasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="waktu_mulai_pelaksanaan">Tanggal Mulai</label>
                                    <input name="waktu_mulai_pelaksanaan" type="text" value="{{\Carbon\Carbon::parse($sertifikasi->waktu_mulai_pelaksanaan)->format('d-m-Y')}}" class="form-control form-control @error('waktu_mulai_pelaksanaan') is-invalid @enderror" id="waktu_mulai_pelaksanaan">
                                    @error('waktu_mulai_pelaksanaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="waktu_selesai_pelaksanaan">Tanggal Selesai</label>
                                    <input name="waktu_selesai_pelaksanaan" type="text" value="{{\Carbon\Carbon::parse($sertifikasi->waktu_selesai_pelaksanaan)->format('d-m-Y')}}" class="form-control form-control @error('waktu_selesai_pelaksanaan') is-invalid @enderror" id="waktu_selesai_pelaksanaan">
                                    @error('waktu_selesai_pelaksanaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_sertifikat_diterbitkan">Tanggal Diterbitkan</label>
                                    <input name="tanggal_sertifikat_diterbitkan" type="text" value="{{\Carbon\Carbon::parse($sertifikasi->tanggal_sertifikat_diterbitkan)->format('d-m-Y')}}" class="form-control form-control @error('tanggal_sertifikat_diterbitkan') is-invalid @enderror" id="tanggal_sertifikat_diterbitkan">
                                    @error('tanggal_sertifikat_diterbitkan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="masa_berlaku_sampai_dengan">Masa Berlaku Sampai dengan</label>
                                    <input name="masa_berlaku_sampai_dengan" type="text" value="{{\Carbon\Carbon::parse($sertifikasi->masa_berlaku_sampai_dengan)->format('d-m-Y')}}" class="form-control form-control @error('masa_berlaku_sampai_dengan') is-invalid @enderror" id="masa_berlaku_sampai_dengan">
                                    @error('masa_berlaku_sampai_dengan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="dokumen_data_sertifikasi">Lampiran Dokumen</label>
                                    <input type="file" class="form-control input-file @error('dokumen_data_sertifikasi') is-invalid @enderror" name="dokumen_data_sertifikasi">
                                    @error('dokumen_data_sertifikasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror

                                    @if(!empty($sertifikasi->dokumen_data_sertifikasi) && Storage::exists($sertifikasi->dokumen_data_sertifikasi))
                                    <div class="text text-black">
                                        <div class="text-capitalize text-black">Dokumen tersimpan</div>
                                        <ul>
                                            <li><a href="{{ Storage::url($sertifikasi->dokumen_data_sertifikasi)}}">{{$sertifikasi->pegawai->nip}} - {{$sertifikasi->pegawai->nama}} - {{$sertifikasi->jenis_sertifikasi}}</a></li>
                                        </ul>
                                        <span class="text-danger text-capitalize text-small"> *** Kosongkan Lampiran jika tidak ingin mengubah</span>
                                    </div>
                                    @elseif(empty($sertifikasi->dokumen_data_sertifikasi) && !Storage::exists($sertifikasi->dokumen_data_sertifikasi))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @elseif(!empty($sertifikasi->dokumen_data_sertifikasi) && !Storage::exists($sertifikasi->dokumen_data_sertifikasi))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Sertifikasi.list', $sertifikasi->id_pegawai)}}">Kembali</a>
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
        $('#waktu_mulai_pelaksanaan').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#waktu_selesai_pelaksanaan').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#tanggal_sertifikat_diterbitkan').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#masa_berlaku_sampai_dengan').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
</script>
@endpush