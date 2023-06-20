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
                <a href="{{route('detailAset.index')}}">Detail Aset</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('detailAset.index')}}">Edit Detail Aset</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Aset</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{route('detailAset.update', $da->id)}}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="asal_perusahaan">Kepemilikan Aset</label>
                                    <select name="asal_perusahaan" class="form-control form-control @error('asal_perusahaan') is-invalid @enderror" id="asal_perusahaan">
                                    <option value="REKA" @if(!empty(old('asal_perusahaan'))){{old('asal_perusahaan') == 'REKA' ? 'selected' : ''}}@endif>Reka</option>
                                        <option value="REKA-KOP" @if(!empty(old('asal_perusahaan'))){{old('asal_perusahaan') == 'REKA-KOP' ? 'selected' : ''}}@endif>Reka-Kopinka</option>
                                        <option value="REKA-GIFT" @if(!empty(old('asal_perusahaan'))){{old('asal_perusahaan') == 'REKA-GIFT' ? 'selected' : ''}}@endif>Hadiah</option>
                                        <option value="REKA-HIB" @if(!empty(old('asal_perusahaan'))){{old('asal_perusahaan') == 'REKA-HIB' ? 'selected' : ''}}@endif>Hibah</option>
                                        <option value="REKA-INKA" @if(!empty(old('asal_perusahaan'))){{old('asal_perusahaan') == 'REKA-INKA' ? 'selected' : ''}}@endif>Pinjaman INKA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_jenis_barang">Jenis Barang</label>
                                    <select name="id_jenis_barang" class="form-control form-control">
                                        @foreach($jb as $jb)
                                            <option value="{{$jb->id}}" {{ $da->id_jenis_barang == $jb->id ? 'selected' : '' }} > {{$jb->kode_jenis_barang}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_jenis_barang')
                                        <span class="invalid-feedback" role="alert">
                                             <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nomor_aset">Nomor Aset</label>
                                    <input value="@if(!empty(old('nomor_aset'))){{ old('nomor_aset') }}@else{{$da->nomor_aset}}@endif" type="text" name="nomor_aset" class="form-control @error('nomor_aset') is-invalid @enderror" id="Nomor_Aset">
                                    @error('nomor_aset')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_lokasi">Lokasi Aset</label>
                                    <select name="id_lokasi" class="form-control form-control">
                                        @foreach($L as $L)
                                            <option value="{{$L->id}}" {{ $da->id_lokasi == $L->id ? 'selected' : '' }} > {{$L->kode_lokasi}} - {{$L->nama_lokasi}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_lokasi')
                                        <span class="invalid-feedback" role="alert">
                                             <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="tgl_kapitalisasi">Tahun Kapitalisasi</label>
                                    <input value="@if(!empty(old('tgl_kapitalisasi'))){{ old('tgl_kapitalisasi') }}@else{{$da->tgl_kapitalisasi}}@endif" type="text" name="tgl_kapitalisasi" class="form-control @error('tgl_kapitalisasi') is-invalid @enderror" id="Tgl_Kapitalisasi">
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
                                    <select name="kategori_aset" class="form-control form-control @error('kategori_aset') is-invalid @enderror" id="kategori_aset">
                                        <option value="AT" @if(!empty(old('kategori_aset'))){{old('kategori_aset') == 'AT' ? 'selected' : ''}}@endif>Aset Tetap</option>
                                        <option value="EC" @if(!empty(old('kategori_aset'))){{old('kategori_aset') == 'EC' ? 'selected' : ''}}@endif>Aset Dibawah Nilai Kapitalisasi</option>
                                        <option value="PJ" @if(!empty(old('kategori_aset'))){{old('kategori_aset') == 'PJ' ? 'selected' : ''}}@endif>Aset Keproyekan</option>
                                    </select>
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
                                    <label for="merek_aset">Merek Aset</label>
                                    <input value="@if(!empty(old('merek_aset'))){{ old('merek_aset') }}@else{{$da->merek_aset}}@endif" type="text" name="merek_aset" class="form-control @error('merek_aset') is-invalid @enderror" id="Merek_Aset">
                                    @error('merk_aset')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                               <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <select name="kondisi" class="form-control form-control @error('kondisi') is-invalid @enderror" id="kondisi">
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
                                    <label for="bast">BAST</label>
                                    <input type="file" class="form-control @error('bast') is-invalid @enderror" id="bast" name="bast" @if($errors->has('bast')) autofocus @endif>
                                    @if(!empty($da->bast) && Storage::exists($da->bast))
                                    <div class="text text-black">
                                        <div class="text-capitalize text-black">Dokumen tersimpan</div>
                                        <ul>
                                            <li><a href="{{ Storage::url($da->bast)}}">{{$da->kode_aset}}</a></li>
                                        </ul>
                                        <span class="text-danger text-capitalize text-small"> *** Kosongkan jika tidak ingin mengubah</span>
                                    </div>
                                    @elseif(empty($da->bast) && !Storage::exists($da->bast))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @elseif(!empty($da->bast) && !Storage::exists($da->bast))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @endif
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
                                    @if(!empty($da->sertifikat) && Storage::exists($da->sertifikat))
                                    <div class="text text-black">
                                        <div class="text-capitalize text-black">Dokumen tersimpan</div>
                                        <ul>
                                            <li><a href="{{ Storage::url($da->sertifikat)}}">{{$da->kode_aset}}</a></li>
                                        </ul>
                                        <span class="text-danger text-capitalize text-small"> *** Kosongkan jika tidak ingin mengubah</span>
                                    </div>
                                    @elseif(empty($da->sertifikat) && !Storage::exists($da->sertifikat))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @elseif(!empty($da->sertifikat) && !Storage::exists($da->sertifikat))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @endif
                                    @error('sertifikat')
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
                                    <label for="pj_edit">Penanggung Jawab Edit Terakhir</label>
                                    <input value="@if(!empty(old('pj_edit'))){{ old('pj_edit') }}@else{{$da->pj_edit}}@endif" type="text" name="pj_edit" class="form-control @error('pj_edit') is-invalid @enderror" id="Pj_Edit">
                                    @error('pj_edit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-capitalize">{{$message}}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div> 
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="tgl_edit">Tanggal Edit Terakhir</label>
                                    <input name="tgl_edit" type="text" value="{{\Carbon\Carbon::parse($da->tgl_edit)->format('d-m-Y')}}" class="form-control form-control @error('tgl_edit') is-invalid @enderror" id="tgl_edit">
                                    @error('tgl_edit')
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
        $('#tgl_edit').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
</script>
@endpush
