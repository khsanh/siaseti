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
                <a href="{{route('Mutasi.show', $mutasi->id)}}">Detail Mutasi</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Data Mutasi</div>
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        <div class="col-9">
                            <div class="form-group form-inline">
                                <label for="inlineinput" class="col-md-4 col-form-label">Nomor Berita Acara</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$mutasi->berita_acara['kode_berita_acara']}} - {{$mutasi->berita_acara['perihal']}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="kode_aset" class="col-md-4 col-form-label">Kode Aset Baru</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->kode_aset}}" class="form-control input-full" id="kode_aset" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="kode_aset_lama" class="col-md-4 col-form-label">Kode Aset Lama</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$mutasi->kode_aset_lama}}" class="form-control input-full" id="kode_aset_lama" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="asal_perusahaan" class="col-md-4 col-form-label">Kepemilikan Aset</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->asal_perusahaan}}" class="form-control input-full" id="asal_perusahaan" style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="inlineinput" class="col-md-4 col-form-label">Jenis Barang</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->jenis_barang['kode_jenis_barang']}} - {{$da->jenis_barang['nama_barang']}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="inlineinput" class="col-md-4 col-form-label">Lokasi Aset Baru</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->lokasi['nama_lokasi']}} - {{$da->lokasi['detail_lokasi']}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="lokasi_aset" class="col-md-4 col-form-label">Letak Divisi Baru</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->lokasi['id_divisi']}}" class="form-control input-full" id="lokasi_aset" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="tgl_kapitalisasi" class="col-md-4 col-form-label">Tahun Kapitalisasi</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->tgl_kapitalisasi}}" class="form-control input-full" id="status" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="kategori_aset" class="col-md-4 col-form-label">Kategori Aset</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->kategori_aset}}" class="form-control input-full" id="kategori_aset" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="deskripsi_aset" class="col-md-4 col-form-label">Deskripsi Aset</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->deskripsi_aset}}" class="form-control input-full" id="deskripsi_aset" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="merek_aset" class="col-md-4 col-form-label">Merek Aset</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->merek_aset}}" class="form-control input-full" id="merek_aset" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="kondisi" class="col-md-4 col-form-label">Kondisi Aset</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->kondisi}}" class="form-control input-full" id="kondisi" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="pic_aset" class="col-md-4 col-form-label">PIC Aset</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->pic_aset}}" class="form-control input-full" id="pic_aset" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="nomor_kartu_aset" class="col-md-4 col-form-label">Nomor Kartu Aset</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{$da->nomor_kartu_aset}}" class="form-control input-full" id="nomor_kartu_aset" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="tgl_mutasi" class="col-md-4 col-form-label">Tanggal Mutasi</label>
                                <div class="col-md-8 p-0">
                                    <input type="text" value="{{\Carbon\Carbon::parse($mutasi->tgl_mutasi)->format('d-m-Y')}}" class="form-control input-full" id="tgl_mutasi" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF; color: black;" disabled>
                                </div>
                            </div><div class="form-group form-inline">
                                <label for="inlineinput" class="col-md-4 col-form-label">Foto Aset</label>
                                <div class="col-md-8 p-0">
                                    <img src="{{ asset('Aset/' . $da->foto_aset) }}" alt="image profile" class="avatar-img img-responsive rounded" style="max-height: 400px; max-width: 600px;">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="inlineinput" class="col-md-4 col-form-label">BAST</label>
                                <div class="col-md-8 p-0">
                                    @if($da->bast !== null)
                                        <iframe src="{{ asset('dAset/'.$da->bast) }}" width="600px" height="400px"></iframe>
                                    @else
                                        <h6 class="text-center">Dokumen Tidak ada</h6>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="inlineinput" class="col-md-4 col-form-label">Sertifikat</label>
                                <div class="col-md-8 p-0">
                                    @if($da->sertifikat !== null)
                                    <iframe src="{{ asset('deAset/'.$da->sertifikat) }}" width="600px" height="400px"></iframe>
                                    @else
                                    <h6 class="text-center">Dokumen Tidak ada</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <a class="btn btn-danger" href="{{route('Mutasi.list', $mutasi->id_detail_aset)}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection