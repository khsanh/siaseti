@extends('layout.master')
@section('statusdetailaset','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Detail Aset</h4>
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
                <a href="{{route('detailAset.index')}}">Detail Aset</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">

                <a href="{{route('detailAset.show', $da->id)}}">Detail Data Aset</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Data Aset</div>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                        <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group form-inline">
                                        <label for="kode_aset" class="col-md-4 col-form-label">Kode Aset</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$da->kode_aset}}" class="form-control input-full" id="kode_aset" style="background-color:#E5EBFF;color: black;" disabled>
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
                                        <label for="inlineinput" class="col-md-4 col-form-label">Lokasi Aset</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$da->lokasi['nama_lokasi']}} - {{$da->lokasi['detail_lokasi']}}" class="form-control input-full" id="inlineinput" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="lokasi_aset" class="col-md-4 col-form-label">Letak Divisi</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$da->lokasi['id_divisi']}}" class="form-control input-full" id="level_organisasi" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
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
                                        <label for="status_aset" class="col-md-4 col-form-label">Status Aset</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$da->status_aset}}" class="form-control input-full" id="status_aset" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
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
                                        <label for="pj_edit" class="col-md-4 col-form-label">Penanggung Jawab Edit Terakhir</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$da->pj_edit}}" class="form-control input-full" id="pj_edit" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="tgl_edit" class="col-md-4 col-form-label">Tanggal Terakhir Edit</label>
                                        <div class="col-md-8 p-0">
                                            <input type="text" value="{{$da->tgl_edit}}" class="form-control input-full" id="tgl_edit" style="background-color:#E5EBFF; color: black;" disabled style="background-color:#E5EBFF;color: black;" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
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
                                                <h6 class="text-center">Dokumen Tidak ada. Klik <span class="badge badge-primary"><a class="text-white" href="{{route('detailAset.edit',$da->id)}}">Edit Data Aset</a></span> untuk Menambahkan.</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="inlineinput" class="col-md-4 col-form-label">Sertifikat</label>
                                        <div class="col-md-8 p-0">
                                            @if($da->sertifikat !== null)
                                            <iframe src="{{ asset('deAset/'.$da->sertifikat) }}" width="600px" height="400px"></iframe>
                                            @else
                                            <h6 class="text-center">Dokumen Tidak ada. Klik <span class="badge badge-primary"><a class="text-white" href="{{route('detailAset.edit',$da->id)}}">Edit Data Aset</a></span> untuk Menambahkan.</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <a class="btn btn-danger" href="{{route('detailAset.index')}}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection