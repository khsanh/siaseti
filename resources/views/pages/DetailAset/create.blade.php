@extends('layout.master')
@section('statusdetailaset','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Daftar Detail Aset</h4>
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
                <a href="{{route('detailAset.create')}}">Tambah Data Aset</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Detail Aset</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{route('detailAset.store')}}" id="myForm">
                    @csrf
                    <div class="card-body">
                    <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="asal_perusahaan">Kepemilikan Aset</label>
                                    <select name="asal_perusahaan" class="form-control input-full @error('asal_perusahaan') is-invalid @enderror" id="asal_perusahaan">
                                        <option value="">---Pilih---</option>
                                        <option value="REKA" @if(!empty(old('asal_perusahaan'))){{old('asal_perusahaan') == 'REKA' ? 'selected' : ''}}@endif>Reka</option>
                                        <option value="REKA-KOP" @if(!empty(old('asal_perusahaan'))){{old('asal_perusahaan') == 'REKA-KOP' ? 'selected' : ''}}@endif>Reka-Kopinka</option>
                                        <option value="REKA-GIFT" @if(!empty(old('asal_perusahaan'))){{old('asal_perusahaan') == 'REKA-GIFT' ? 'selected' : ''}}@endif>Hadiah</option>
                                        <option value="REKA-HIB" @if(!empty(old('asal_perusahaan'))){{old('asal_perusahaan') == 'REKA-HIB' ? 'selected' : ''}}@endif>Hibah</option>
                                        <option value="REKA-INKA" @if(!empty(old('asal_perusahaan'))){{old('asal_perusahaan') == 'REKA-INKA' ? 'selected' : ''}}@endif>Pinjaman INKA</option>
                                    </select>
                                    @error('kondisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_jenis_barang">Jenis Barang</label>
                                    <select name="id_jenis_barang" class="form-control form-control">
                                        <option>---Pilih---</option>
                                        @foreach($jb as $jb)
                                            <option value="{{$jb->id}}" {{ old('id_jenis_barang') == $jb->id ? 'selected' : '' }} > {{$jb->kode_jenis_barang}} - {{$jb->nama_barang}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_jenis_barang')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nomor_aset">Nomor Aset</label>
                                    <input type="text" name="nomor_aset" value="@if(!empty(old('nomor_aset'))){{ old('nomor_aset') }}@endif" class="form-control  input-full @error('nomor_aset') is-invalid @enderror" id="nomor_aset">
                                    @error('nomor_aset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_lokasi">Lokasi Aset</label>
                                    <select name="id_lokasi" class="form-control form-control">
                                        <option>---Pilih---</option>
                                        @foreach($L as $l)
                                            <option value="{{$l->id}}" {{ old('id_lokasi') == $l->id ? 'selected' : '' }} > {{$l->kode_lokasi}} - {{$l->nama_lokasi}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_lokasi')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="tgl_kapitalisasi">Tahun Kapitalisasi</label>
                                    <input @if($errors->has('tgl_kapitalisasi')) autofocus @endif value="{{old('tgl_kapitalisasi')}}" type="text" name="tgl_kapitalisasi" class="form-control tgl_kapitalisasi @error('tgl_kapitalisasi') is-invalid @enderror" id="tgl_kapitalisasi">
                                    @error('tgl_kapitalisasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="kategori_aset">Kategori Aset</label>
                                    <select name="kategori_aset" class="form-control input-full @error('kategori_aset') is-invalid @enderror" id="kategori_aset">
                                        <option value="">---Pilih---</option>
                                        <option value="AT" @if(!empty(old('kategori_aset'))){{old('kategori_aset') == 'AT' ? 'selected' : ''}}@endif>Aset Tetap</option>
                                        <option value="EC" @if(!empty(old('kategori_aset'))){{old('kategori_aset') == 'EC' ? 'selected' : ''}}@endif>Aset Dibawah Nilai Kapitalisasi</option>
                                        <option value="PJ" @if(!empty(old('kategori_aset'))){{old('kategori_aset') == 'PJ' ? 'selected' : ''}}@endif>Aset Keproyekan</option>
                                    </select>
                                    @error('kategori_aset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="deskripsi_aset">Deskripsi Aset</label>
                                    <input type="text" name="deskripsi_aset" value="@if(!empty(old('deskripsi_aset'))){{ old('deskripsi_aset') }}@endif" class="form-control  input-full @error('deskripsi_aset') is-invalid @enderror" id="deskripsi_aset">
                                    @error('deskripsi_aset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="merek_aset">Merek Aset</label>
                                    <input type="text" name="merek_aset" value="@if(!empty(old('merek_aset'))){{ old('merek_aset') }}@endif" class="form-control  input-full @error('merek_aset') is-invalid @enderror" id="merek_aset">
                                    @error('merek_aset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                               <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <select name="kondisi" class="form-control input-full @error('kondisi') is-invalid @enderror" id="kondisi">
                                        <option value="">---Pilih---</option>
                                        <option value="Baik" @if(!empty(old('kondisi'))){{old('kondisi') == 'Baik' ? 'selected' : ''}}@endif>Baik</option>
                                        <option value="Rusak" @if(!empty(old('kondisi'))){{old('kondisi') == 'Rusak' ? 'selected' : ''}}@endif>Rusak</option>
                                        <option value="Bongkar" @if(!empty(old('kondisi'))){{old('kondisi') == 'Bongkar' ? 'selected' : ''}}@endif>Bongkar</option>
                                        <option value="Tidak_Terpakai" @if(!empty(old('kondisi'))){{old('kondisi') == 'Tidak_Terpakai' ? 'selected' : ''}}@endif>Tidak Terpakai</option>
                                        <option value="Tidak_Teridentifikasi" @if(!empty(old('kondisi'))){{old('kondisi') == 'Tidak_Teridentifikasi' ? 'selected' : ''}}@endif>Tidak Teridentifikasi</option>
                                    </select>
                                    @error('kondisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                               <div class="form-group">
                                    <label for="status_aset">Status Aset</label>
                                    <select name="status_aset" class="form-control input-full @error('status_aset') is-invalid @enderror" id="status_aset">
                                        <option value="">---Pilih---</option>
                                        <option value="Aktif" @if(!empty(old('status_aset'))){{old('status_aset') == 'Aktif' ? 'selected' : ''}}@endif>Aktif</option>
                                        <option value="Nonaktif" @if(!empty(old('status_aset'))){{old('status_aset') == 'Nonaktif' ? 'selected' : ''}}@endif>Nonaktif</option>
                                    </select>
                                    @error('status_aset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="bast">BAST</label>
                                    <input type="file" class="form-control @error('bast') is-invalid @enderror" id="bast" name="bast" @if($errors->has('bast')) autofocus @endif>
                                    @error('bast')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="sertifikat">Sertifikat</label>
                                    <input type="file" class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" name="sertifikat" @if($errors->has('sertifikat')) autofocus @endif>
                                    @error('sertifikat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="pic_aset">PIC Aset</label>
                                    <input type="text" name="pic_aset" value="@if(!empty(old('pic_aset'))){{ old('pic_aset') }}@endif" class="form-control  input-full @error('pic_aset') is-invalid @enderror" id="pic_aset">
                                    @error('pic_aset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nomor_kartu_aset">Nomor Kartu Aset</label>
                                    <input type="text" name="nomor_kartu_aset" value="@if(!empty(old('nomor_kartu_aset'))){{ old('nomor_kartu_aset') }}@endif" class="form-control  input-full @error('nomor_kartu_aset') is-invalid @enderror" id="nomor_kartu_aset">
                                    @error('nomor_kartu_aset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="card">
                                    <div class="card-header" style="font-weight: bold;">Foto</div>
                                    <div class="card-body bg-grey1 text-center">
                                        <div class="form-group mb-4">
                                            <div class="mb-4">
                                                <div class="image-area mt-4">
                                                    <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="upload" class="btn btn-grey m-0 rounded-pill px-4">Pilih Foto</label>
                                                <input name="foto_aset" id="upload" type="file" onchange="readURL(this);" style="display: none;" class="form-control border-0">
                                            </div>
                                            @error('foto_aset')
                                            <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('detailAset.index')}}">Batal</a>
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
        $('#tgl_kapitalisasi').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function() {
        $('#upload').on('change', function() {
            readURL(input);
        });
    });
    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');
    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }
</script>
@endpush
