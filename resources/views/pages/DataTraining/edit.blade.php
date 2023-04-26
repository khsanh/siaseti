@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdatatraining','active')
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
                <a href="{{route('Training.index')}}">Training</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Training.edit', $training->id)}}">Edit Training</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Training</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Training.update', $training->id) }}" id="myForm">
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
                                        <option value="{{$pegawai->id}}" {{$training->id_pegawai == $pegawai->id ? 'selected' : ''}}>{{$pegawai->nip}} - {{$pegawai->nama}}</option>
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
                                    <label for="nama_training">Nama Training</label>
                                    <textarea rows="2" oninput="auto_height(this)" style="width: 100%; overflow:hidden;" name="nama_training" type="text" class="auto_height @error('nama_training') is-invalid @enderror" id="nama_training">@if(!empty(old('nama_training'))){{ old('nama_training') }}@else{{$training->nama_training}}@endif</textarea>
                                    @error('nama_training')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_training">Jenis Training</label>
                                    <select name="jenis_training" class="form-control @error('jenis_training') is-invalid @enderror" id="jenis_training">
                                        <option value="">---Pilih---</option>
                                        <option value="Softskill" @if(!empty(old('jenis_training'))) {{old('jenis_training') == 'Softskill' ? 'selected' : ''}} @else{{$training->jenis_training == 'Softskill' ? 'selected' : ''}}@endif> Soft Skill </option>
                                        <option value="Hardskill" @if(!empty(old('jenis_training'))) {{old('jenis_training') == 'Hardskill' ? 'selected' : ''}} @else{{$training->jenis_training == 'Hardskill' ? 'selected' : ''}}@endif> Hard Skill </option>
                                        <option value="Basic Training" @if(!empty(old('jenis_training'))) {{old('jenis_training') == 'Basic Training' ? 'selected' : ''}} @else{{$training->jenis_training == 'Basic Training' ? 'selected' : ''}}@endif> Basic Training </option>
                                    </select>
                                    @error('jenis_training')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="bidang_training">Bidang Training</label>
                                    <input name="bidang_training" type="text" value="@if(!empty(old('bidang_training'))){{ old('bidang_training') }}@else{{$training->bidang_training}}@endif" class="form-control form-control @error('bidang_training') is-invalid @enderror" id="bidang_training">
                                    @error('bidang_training')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="penyelenggara">Penyelenggara</label>
                                    <input name="penyelenggara" type="text" value="@if(!empty(old('penyelenggara'))){{ old('penyelenggara') }}@else{{$training->penyelenggara}}@endif" class="form-control form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara">
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
                                    <label for="lokasi_training">Lokasi Training</label>
                                    <textarea class="form-control f3 @error('lokasi_training') is-invalid @enderror text-capitalize" name="lokasi_training" rows="5" id="lokasi_training_1" required oninvalid="this.setCustomValidity('Isi lokasi training terlebih dahulu')" oninput="setCustomValidity('')">@if(!empty(old('lokasi_training'))){{ old('lokasi_training') }}@else{{$training->lokasi_training}}@endif</textarea>
                                    @error('lokasi_training')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="waktu_mulai_pelaksanaan">Tanggal Mulai</label>
                                    <input name="waktu_mulai_pelaksanaan" type="text" value="{{\Carbon\Carbon::parse($training->waktu_mulai_pelaksanaan)->format('d-m-Y')}}" class="form-control form-control @error('waktu_mulai_pelaksanaan') is-invalid @enderror" id="waktu_mulai_pelaksanaan">
                                    @error('waktu_mulai_pelaksanaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="waktu_selesai_pelaksanaan">Tanggal Selesai</label>
                                    <input name="waktu_selesai_pelaksanaan" type="text" value="{{\Carbon\Carbon::parse($training->waktu_selesai_pelaksanaan)->format('d-m-Y')}}" class="form-control form-control @error('waktu_selesai_pelaksanaan') is-invalid @enderror" id="waktu_selesai_pelaksanaan">
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
                                    <label for="dokumen_data_training">Lampiran Dokumen</label>
                                    <input type="file" class="form-control input-file @error('dokumen_data_training') is-invalid @enderror" name="dokumen_data_training">

                                    @error('dokumen_data_training')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror

                                    @if(!empty($training->dokumen_data_training) && Storage::exists($training->dokumen_data_training))
                                    <div class="text text-black">
                                        <div class="text-capitalize text-black">Dokumen tersimpan</div>
                                        <ul>
                                            <li><a href="{{ Storage::url($training->dokumen_data_training)}}">{{$training->pegawai->nip}} - {{$training->pegawai->nama}} - {{$training->jenis_training}}</a></li>
                                        </ul>
                                        <span class="text-danger text-capitalize text-small"> *** Kosongkan Lampiran jika tidak ingin mengubah</span>
                                    </div>
                                    @elseif(empty($training->dokumen_data_training) && !Storage::exists($training->dokumen_data_training))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @elseif(!empty($training->dokumen_data_training) && !Storage::exists($training->dokumen_data_training))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Training.list', $training->id_pegawai)}}">Kembali</a>
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
    });

    function auto_height(elem) {
        /* javascript */
        elem.style.height = "1px";
        elem.style.height = (elem.scrollHeight) + "px";
    }
</script>
@endpush