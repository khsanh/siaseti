@extends('layout.master')
@section('statusmutasi','active')
@section('statusdatamutasi','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Mutasi</h4>
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
                <a href="{{route('Mutasi.index')}}">Mutasi</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="">Tambah Mutasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Mutasi</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Mutasi.store2') }}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="id_detail_aset">Kode Aset</label>
                                    <input type="text" name="kode_aset_lama" value="{{ $da->kode_aset }}" class="form-control  input-full" id="kode_aset_lama" disabled>
                                    <span class="invalid-feedback a0" role="alert">
                                        <strong>Pilih Kode Aset Dulu!!!</strong>
                                    </span>
                                    @error('id_detail_aset')
                                    <span class="invalid-feedback a" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_berita_acara">Nomor Berita Acara</label>
                                    <select name="id_berita_acara" class="form-control f0 @error('id_berita_acara') is-invalid @enderror" required id="id_berita_acara">
                                        <option value="">---Pilih---</option>
                                        @foreach($ba as $ba)
                                        <option value="{{$ba->id}}">{{$ba->kode_berita_acara}} - {{$ba->perihal}}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback a0" role="alert">
                                        <strong>Pilih Berita Acara Dulu!!!</strong>
                                    </span>
                                    @error('id_berita_acara')
                                    <span class="invalid-feedback a" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_lokasi">Lokasi Aset</label>
                                    <input type="text" name="id_lokasi" value="{{$da->lokasi['nama_lokasi']}} - {{$da->lokasi['detail_lokasi']}}" class="form-control  input-full" id="id_lokasi" disabled>
                                    @error('id_lokasi')
                                        <span class="invalid-feedback" role="alert">
                                             <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="deskripsi_aset">Deskripsi Aset</label>
                                    <input value="@if(!empty(old('deskripsi_aset'))){{ old('deskripsi_aset') }}@else{{$da->deskripsi_aset}}@endif" type="text" name="deskripsi_aset" class="form-control @error('deskripsi_aset') is-invalid @enderror" id="Deskripsi_Aset">
                                    @error('deskripsi_aset')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                               <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <select name="kondisi" class="form-control form-control @error('kondisi') is-invalid @enderror" id="kondisi" disabled>
                                        <option value="baik" @if(!empty(old('kondisi'))){{old('kondisi') == 'baik' ? 'selected' : ''}}@endif>Baik</option>
                                        <option value="rusak" @if(!empty(old('kondisi'))){{old('kondisi') == 'rusak' ? 'selected' : ''}}@endif>Rusak</option>
                                        <option value="bongkar" @if(!empty(old('kondisi'))){{old('kondisi') == 'bongkar' ? 'selected' : ''}}@endif>Bongkar</option>
                                        <option value="tidak_terpakai" @if(!empty(old('kondisi'))){{old('kondisi') == 'tidak_terpakai' ? 'selected' : ''}}@endif>Tidak Terpakai</option>
                                        <option value="tidak_teridentifikasi" @if(!empty(old('kondisi'))){{old('kondisi') == 'tidak_teridentifikasi' ? 'selected' : ''}}@endif>Tidak Teridentifikasi</option>
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
                                    <select name="status_aset" class="form-control form-control @error('status_aset') is-invalid @enderror" id="status_aset">
                                        <option value="Aktif" @if(!empty(old('status_aset'))) {{old('status_aset') == 'Aktif' ? 'selected' : ''}} @else{{$da->status_aset == 'Aktif' ? 'selected' : ''}}@endif>Aktif</option>
                                        <option value="Nonaktif" @if(!empty(old('status_aset'))) {{old('status_aset') == 'Nonaktif' ? 'selected' : ''}} @else{{$da->status_aset == 'Nonaktif' ? 'selected' : ''}}@endif>Nonaktif</option>
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
                                    <label for="pic_aset">PIC Aset</label>
                                    <input value="@if(!empty(old('pic_aset'))){{ old('pic_aset') }}@else{{$da->pic_aset}}@endif" type="text" name="pic_aset" class="form-control @error('pic_aset') is-invalid @enderror" id="Pic_Aset">
                                    @error('pic_aset')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div> 
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nomor_kartu_aset">Nomor Kartu Aset</label>
                                    <input value="@if(!empty(old('nomor_kartu_aset'))){{ old('nomor_kartu_aset') }}@else{{$da->nomor_kartu_aset}}@endif" type="text" name="nomor_kartu_aset" class="form-control @error('nomor_kartu_aset') is-invalid @enderror" id="Nomor_Kartu_Aset">
                                    @error('nomor_kartu_aset')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="foto_aset">Foto Aset</label>
                                    <input type="file" class="form-control @error('foto_aset') is-invalid @enderror" id="foto_aset" name="foto_aset" @if($errors->has('foto_aset')) autofocus @endif>
                                    @if(!empty($da->foto_aset) && Storage::exists($da->foto_aset))
                                    <div class="text text-black">
                                        <div class="text-capitalize text-black">Dokumen tersimpan</div>
                                        <ul>
                                            <li><a href="{{ Storage::url($da->foto_aset)}}">{{$da->kode_aset}}</a></li>
                                        </ul>
                                        <span class="text-danger text-capitalize text-small"> *** Kosongkan jika tidak ingin mengubah</span>
                                    </div>
                                    @elseif(empty($da->foto_aset) && !Storage::exists($da->foto_aset))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @elseif(!empty($da->foto_aset) && !Storage::exists($da->foto_aset))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @endif
                                    @error('foto_aset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="tgl_mutasi">Tanggal Mutasi</label>
                                    <input name="tgl_mutasi" type="text" class="form-control f4 @error('tgl_mutasi') is-invalid @enderror" id="tgl_mutasi" required onemptied="thisetCustomValidity('Isi tanggal mutasi terlebih dahulu')" oninput="setCustomValidity('')">
                                    <span class="invalid-feedback a4" role="alert">
                                        <strong>Tanggal Mutasi Tidak Boleh Kosong!!</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('prosesMutasi.index')}}">Batal</a>
                        <input type="hidden" name="id_detail_aset" value="{{ $da->id }}">
                        <button type="submit" class="btn btn-success submit">Simpan</button>
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
        $("#id_detail_aset").select2({
            theme: "bootstrap4"
        });
        $('#tgl_mutasi').datepicker({
            format: 'dd-mm-yyyy'
        });
    });

    function validateForm() {
        var isValid = true;
        $('.form-control').each(function() {
            if ($(this).val() === '')
                isValid = false;
        });
        return isValid;
    }
</script>
<script>
    function fetchAssetData() {
    var selectedOption = document.getElementById('id_detail_aset').options[document.getElementById('id_detail_aset').selectedIndex];
    var idDetailAset = selectedOption.value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var assetData = JSON.parse(xhr.responseText);
            document.getElementById('nomor_aset').value = assetData.nomor_aset;
            document.getElementById('kategori_aset').value = assetData.kategori_aset;
            document.getElementById('id_jenis_barang').value = assetData.id_jenis_barang;
            document.getElementById('deskripsi_aset').value = assetData.deskripsi_aset;
            document.getElementById('merek_aset').value = assetData.merek_aset;
            document.getElementById('tgl_kapitalisasi').value = assetData.tgl_kapitalisasi;
            document.getElementById('kondisi').value = assetData.kondisi;
            document.getElementById('id_lokasi').value = assetData.id_lokasi;
            document.getElementById('asal_perusahaan').value = assetData.asal_perusahaan;
            document.getElementById('bast').value = assetData.bast;
            document.getElementById('sertifikat').value = assetData.sertifikat;
            document.getElementById('pic_aset').value = assetData.pic_aset;
            document.getElementById('foto_aset').value = assetData.foto_aset;
            document.getElementById('nomor_kartu_aset').value = assetData.nomor_kartu_aset;
            document.getElementById('kategori_aset').value = assetData.kategori_aset;
        }
    };
    xhr.open('GET', '/detailAset/' + idDetailAset, true);
    xhr.send();
}
</script>
@endpush