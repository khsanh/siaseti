@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdatakeluarga','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Keluarga</h4>
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
                <a href="{{route('Keluarga.index')}}">Keluarga</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Pasangan.buat', $keluarga->id)}}">Edit Data Pasangan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Pasangan</div>
                </div>
                <form method="POST" action="{{ route('Pasangan.update', $keluarga->pasangan->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row col-md-12">
                            <ul class="nav nav-pills nav-primary nav-pills-icons col-lg-12" id="pills-tab-with-icon" role="tablist">
                                <li class="nav-item col-md-4">
                                    <span class="nav-link text-center" id="pills-home-tab-icon">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">1</span>
                                        Data Keluarga
                                    </span>
                                </li>
                                <li class="nav-item col-md-4 text-center">
                                    <span class="nav-link active" id="pills-profile-tab-icon">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">2</span>
                                        Data Pasangan
                                    </span>
                                </li>
                                <li class="nav-item col-md-4 text-center">
                                    <span class="nav-link" id="pills-contact-tab-icon">
                                        <span class="badge badge-count" style="background-color: white; color:black; font-weight:bold; border: 1px solid black; font-size:medium">3</span>
                                        Data Anak
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="id_keluarga">Pegawai</label>
                                    <input type="text" value="{{$keluarga->pegawai->nip}}-{{$keluarga->pegawai->nama}}" name="pegawai" class="form-control" id="pegawai" disabled>
                                    <input type="text" value="{{$keluarga->id}}" name="id_keluarga" class="form-control" id="id_keluarga" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="@if(!empty(old('nama_lengkap'))){{old('nama_lengkap')}}@else{{$keluarga->pasangan->nama_lengkap}}@endif" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" @if($errors->has('nama_lengkap')) autofocus @endif>
                                    @error('nama_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" @if($errors->has('jenis_kelamin')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="Laki-Laki" @if(!empty(old('jenis_kelamin'))){{old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : ''}}@else{{ $keluarga->pasangan->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}@endif>Laki-Laki</option>
                                        <option value="Perempuan" @if(!empty(old('jenis_kelamin'))){{old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''}}@else{{ $keluarga->pasangan->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}@endif>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" value="@if(!empty(old('tempat_lahir'))){{old('tempat_lahir')}}@else{{$keluarga->pasangan->tempat_lahir}}@endif" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" @if($errors->has('tempat_lahir')) autofocus @endif>
                                    @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <select class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" id="pendidikan" @if($errors->has('pendidikan')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="PAUD" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'PAUD' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'PAUD' ? 'selected' : ''}}@endif>Paud</option>
                                        <option value="TK" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'TK' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'TK' ? 'selected' : ''}}@endif>TK</option>
                                        <option value="SD" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'SD' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'SD' ? 'selected' : ''}}@endif>SD</option>
                                        <option value="SMP" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'SMP' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'SMP' ? 'selected' : ''}}@endif>SMP</option>
                                        <option value="SMA" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'SMA' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'SMA' ? 'selected' : ''}}@endif>SMA</option>
                                        <option value="S1" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'S1' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'S1' ? 'selected' : ''}}@endif>S1</option>
                                        <option value="S2" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'S2' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'S2' ? 'selected' : ''}}@endif>S2</option>
                                        <option value="S3" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'S3' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'S3' ? 'selected' : ''}}@endif>S3</option>
                                        <option value="D2" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'D2' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'D2' ? 'selected' : ''}}@endif>D2</option>
                                        <option value="D3" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'D3' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'D3' ? 'selected' : ''}}@endif>D3</option>
                                        <option value="D4" @if(!empty(old('pendidikan'))){{old('pendidikan') == 'D4' ? 'selected' : ''}}@else{{$keluarga->pasangan->pendidikan == 'D4' ? 'selected' : ''}}@endif>D4</option>
                                    </select>
                                    @error('pendidikan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_pernikahan">Status Pernikahan</label>
                                    <select class="form-control @error('status_pernikahan') is-invalid @enderror" name="status_pernikahan" id="status_pernikahan" @if($errors->has('status_pernikahan')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="Belum Menikah" @if(!empty(old('status_pernikahan'))){{old('status_pernikahan') == 'Belum Menikah' ? 'selected' : ''}}@else{{$keluarga->pasangan->status_pernikahan == 'Belum Menikah' ? 'selected' : ''}}@endif>Belum Menikah</option>
                                        <option value="Menikah" @if(!empty(old('status_pernikahan'))){{old('status_pernikahan') == 'Menikah' ? 'selected' : 'selected'}}@else{{$keluarga->pasangan->status_pernikahan == 'Menikah' ? 'selected' : 'selected'}}@endif>Menikah</option>
                                    </select>
                                    @error('status_pernikahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input type="text" value="@if(!empty(old('kewarganegaraan'))){{old('kewarganegaraan')}}@else{{$keluarga->pasangan->kewarganegaraan}}@endif" class="form-control kewarganegaraan @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" id="kewarganegaraan" @if($errors->has('kewarganegaraan')) autofocus @endif>
                                    @error('kewarganegaraan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="no_kk">Nomor Kartu Keluarga</label>
                                    <input type="text" value="{{$keluarga->no_kk}}" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK / No. KTP</label>
                                    <input type="text" value="@if(!empty(old('nik'))){{old('nik')}}@else{{$keluarga->pasangan->nik}}@endif" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" @if($errors->has('nik')) autofocus @endif>
                                    @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama" @if($errors->has('agama')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="Islam" @if(!empty(old('agama'))){{old('agama') == 'Islam' ? 'selected' : ''}}@else{{$keluarga->pasangan->agama == 'Islam' ? 'selected' : ''}}@endif>Islam</option>
                                        <option value="Kristen" @if(!empty(old('agama'))){{old('agama') == 'Kristen' ? 'selected' : ''}}@else{{$keluarga->pasangan->agama == 'Kristen' ? 'selected' : ''}}@endif>Kristen</option>
                                        <option value="Katolik" @if(!empty(old('agama'))){{old('agama') == 'Katolik' ? 'selected' : ''}}@else{{$keluarga->pasangan->agama == 'Katolik' ? 'selected' : ''}}@endif>Katolik</option>
                                        <option value="Hindu" @if(!empty(old('agama'))){{old('agama') == 'Hindu' ? 'selected' : ''}}@else{{$keluarga->pasangan->agama == 'Hindu' ? 'selected' : ''}}@endif>Hindu</option>
                                        <option value="Buddha" @if(!empty(old('agama'))){{old('agama') == 'Buddha' ? 'selected' : ''}}@else{{$keluarga->pasangan->agama == 'Buddha' ? 'selected' : ''}}@endif>Buddha</option>
                                        <option value="Konghucu" @if(!empty(old('agama'))){{old('agama') == 'Konghucu' ? 'selected' : ''}}@else{{$keluarga->pasangan->agama == 'Konghucu' ? 'selected' : ''}}@endif>Konghucu</option>
                                    </select>
                                    @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="text" value="@if(!empty(old('tanggal_lahir'))){{ old('tanggal_lahir') }}@else{{\Carbon\Carbon::parse($keluarga->pasangan->tanggal_lahir)->format('d-m-Y')}}@endif" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" @if($errors->has('tanggal_lahir')) autofocus @endif>
                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                    <input class="form-control @error('jenis_pekerjaan') is-invalid @enderror" value="@if(!empty(old('jenis_pekerjaan'))){{old('jenis_pekerjaan')}}@else{{$keluarga->pasangan->jenis_pekerjaan}}@endif" name="jenis_pekerjaan" id="jenis_pekerjaan" list="jenis_pekerjaans" @if($errors->has('jenis_pekerjaan')) autofocus @endif>
                                    <datalist id="jenis_pekerjaans">
                                        <option value="">--- Pilih ---</option>
                                        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                        <option value="Pengusaha">Pengusaha</option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Polisi">Polisi</option>
                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    </datalist>
                                    @error('jenis_pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_hubungan_dalam_keluarga">Status Hubungan Dalam Keluarga</label>
                                    <select class="form-control @error('status_hubungan_dalam_keluarga') is-invalid @enderror" name="status_hubungan_dalam_keluarga" id="status_hubungan_dalam_keluarga" @if($errors->has('status_hubungan_dalam_keluarga')) autofocus @endif>
                                        <option value="">--- Pilih ---</option>
                                        <option value="Istri" @if(!empty(old('status_hubungan_dalam_keluarga'))){{old('status_hubungan_dalam_keluarga') == 'Istri' ? 'selected':''}}@else{{$keluarga->pasangan->status_hubungan_dalam_keluarga == 'Istri' ? 'selected' : ''}}@endif>Istri</option>
                                        <option value="Suami" @if(!empty(old('status_hubungan_dalam_keluarga'))){{old('status_hubungan_dalam_keluarga') == 'Suami' ? 'selected':''}}@else{{$keluarga->pasangan->status_hubungan_dalam_keluarga == 'Suami' ? 'selected' : ''}}@endif>Suami</option>
                                    </select>
                                    @error('status_hubungan_dalam_keluarga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_kitap">No. KITAP</label>
                                    <input type="text" value="@if(!empty(old('no_kitap'))){{ old('no_kitap') }}@else{{$keluarga->pasangan->no_kitap}}@endif" name="no_kitap" class="form-control @error('no_kitap') is-invalid @enderror" id="no_kitap" @if($errors->has('no_kitap')) autofocus @endif>
                                    @error('no_kitap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="no_passport">No. Passport</label>
                                    <input type="text" value="@if(!empty(old('no_passport'))){{ old('no_passport') }}@else{{$keluarga->pasangan->no_passport}}@endif" name="no_passport" class="form-control @error('no_passport') is-invalid @enderror" id="no_passport" @if($errors->has('no_passport')) autofocus @endif>
                                    @error('no_passport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" value="@if(!empty(old('nama_ayah'))){{ old('nama_ayah') }}@else{{$keluarga->pasangan->nama_ayah}}@endif" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" @if($errors->has('nama_ayah')) autofocus @endif>
                                    @error('nama_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" value="@if(!empty(old('nama_ibu'))){{ old('nama_ibu') }}@else{{$keluarga->pasangan->nama_ibu}}@endif" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" @if($errors->has('nama_ibu')) autofocus @endif>
                                    @error('nama_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Keluarga.index')}}">Kembali</a>
                        <button type="submit" class="btn btn-success" id="btnns">Simpan dan Lanjutkan</button>
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
        $('#tanggal_lahir').datepicker({
            format: 'dd-mm-yyyy'
        });
        var status = "{{$keluarga->status_anak}}";
        if (status == "Ada") {
            $("#btnns").html('Simpan dan Lanjutkan');
        } else if (status == "Tidak Ada") {
            $("#btnns").html('Simpan');
        }
    });
</script>
@endpush