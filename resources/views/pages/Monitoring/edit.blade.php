@extends('layout.master')
@section('statusmonitoring','active')
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
                <a href="{{route('Monitoring.edit', $monitoring->id)}}">Edit Data Monitoring</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Monitoring</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Monitoring.update', $monitoring->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="id_detail_aset">Kode Aset</label>
                                    <select name="id_detail_aset" class="form-control form-control @error('id_detail_aset') is-invalid @enderror" required id="id_detail_aset">
                                        <option value="">---Pilih---</option>
                                        @foreach($da as $da)
                                        <option value="{{$da->id}}" {{$monitoring->id_detail_aset == $da->id ? 'selected' : ''}}>{{$da->kode_aset}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_detail_aset')
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
                                    <label for="tanggal_monitoring">Tanggal Monitoring</label>
                                    <input name="tanggal_monitoring" type="text" value="{{\Carbon\Carbon::parse($monitoring->tanggal_monitoring)->format('d-m-Y')}}" class="form-control form-control @error('tanggal_monitoring') is-invalid @enderror" id="tanggal_monitoring">
                                    @error('tanggal_monitoring')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" id="kondisi">
                                        <option value="">---Pilih---</option>
                                        <option value="Baik" @if(!empty(old('kondisi'))) {{old('kondisi') == 'Baik' ? 'selected' : ''}}@else{{$monitoring->kondisi == 'Baik' ? 'selected' : ''}}@endif>Baik</option>
                                        <option value="Rusak" @if(!empty(old('kondisi'))) {{old('kondisi') == 'Rusak' ? 'selected' : ''}}@else{{$monitoring->kondisi == 'Rusak' ? 'selected' : ''}}@endif>Rusak</option>
                                        <option value="Bongkar" @if(!empty(old('kondisi'))) {{old('kondisi') == 'Bongkar' ? 'selected' : ''}}@else{{$monitoring->kondisi == 'Bongkar' ? 'selected' : ''}}@endif>Bongkar</option>
                                        <option value="Tidak_Terpakai" @if(!empty(old('kondisi'))) {{old('kondisi') == 'Tidak_Terpakai' ? 'selected' : ''}}@else{{$monitoring->kondisi == 'Tidak_Terpakai' ? 'selected' : ''}}@endif>Tidak Terpakai</option>
                                        <option value="Tidak_Teridentifikasi" @if(!empty(old('kondisi'))) {{old('kondisi') == 'Tidak_Teridentifikasi' ? 'selected' : ''}}@else{{$monitoring->kondisi == 'Tidak_Teridentifikasi' ? 'selected' : ''}}@endif>Tidak Teridentifikasi</option>
                                    </select>
                                    @error('kondisi')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control f3 @error('deskripsi') is-invalid @enderror text-capitalize" name="deskripsi" rows="5" id="deskripsi" required oninvalid="this.setCustomValidity('Isi deskripsi terlebih dahulu')" oninput="setCustomValidity('')">@if(!empty(old('deskripsi'))){{ old('deskripsi') }}@else{{$monitoring->deskripsi}}@endif</textarea>
                                    @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="foto">Lampiran Dokumen</label>
                                    <input type="file" class="form-control input-file @error('foto') is-invalid @enderror" name="foto">
                                    @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror

                                    @if(!empty($monitoring->foto) && Storage::exists($monitoring->foto))
                                    <div class="text text-black">
                                        <div class="text-capitalize text-black">Dokumen tersimpan</div>
                                        <ul>
                                            <li><a href="{{ Storage::url($monitoring->foto)}}">{{$monitoring->detail_aset->kode_aset}} - {{$monitoring->tanggal_monitoring}}</a></li>
                                        </ul>
                                        <span class="text-danger text-capitalize text-small"> *** Kosongkan Lampiran jika tidak ingin mengubah</span>
                                    </div>
                                    @elseif(empty($monitoring->foto) && !Storage::exists($monitoring->foto))
                                    <span class="text-danger text-capitalize text-small">Foto Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @elseif(!empty($monitoring->foto) && !Storage::exists($monitoring->foto))
                                    <span class="text-danger text-capitalize text-small">Foto Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Monitoring.list', $monitoring->id_detail_aset)}}">Kembali</a>
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
        $('#tanggal_monitoring').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
</script>
@endpush