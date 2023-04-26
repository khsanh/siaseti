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
                <a href="{{route('Sertifikasi.create')}}">Tambah Sertifikasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Sertifikasi</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Sertifikasi.store') }}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="id_pegawai">Nama Sertifikasi</label>
                                    <select name="id_pegawai" class="form-control f0 @error('id_pegawai') is-invalid @enderror" required id="id_pegawai">
                                        <option value="">---Pilih Pegawai---</option>
                                        @foreach($p as $pegawai)
                                        <option value="{{$pegawai->id}}">{{$pegawai->nip}} - {{$pegawai->nama}}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback a0" role="alert">
                                        <strong>Pilih Pegawai Dulu!!!</strong>
                                    </span>
                                    @error('id_pegawai')
                                    <span class="invalid-feedback a" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 col-lg-10"></div>
                            <div class="col-md-12 col-lg-2">
                                <button type="button" class="btn btn-primary btn-sm ml-auto tambahSertifikasi">
                                    <i class="fa fa-plus"></i>
                                    Tambah Sertifikasi
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="containerSertifikasi">
                            <div class="sertifikasi1">
                                <br>
                                <div class="row">
                                    <div class="col-md-6 col-lg-8 ml-2">
                                        <span class="h2">Data ke-1</span>
                                        <!-- <a type="button" data-toggle="tooltip" onclick="hapustraining()" data-id="1" class="btn btn-link btn-danger hapustraining" data-original-title="Hapus Data Training">
                                            <i class="fa fa-trash-alt"></i>
                                        </a> -->
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="nama_sertifikasi_1">Nama Sertifikasi</label>
                                            <input name="nama_sertifikasi_1" type="text" class="form-control f7 @error('nama_sertifikasi_1') is-invalid @enderror" id="nama_sertifikasi_1" required oninvalid="this.setCustomValidity('Isi nama sertifikasi terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a7" role="alert">
                                                <strong>Nama Sertifikasi Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="jenis_sertifikasi_1">Jenis Sertifikasi</label>
                                            <input name="jenis_sertifikasi_1" type="text" class="form-control f1 @error('jenis_sertifikasi_1') is-invalid @enderror" id="jenis_sertifikasi_1" required oninvalid="this.setCustomValidity('Isi jenis sertifikasi terlebih dahulu')" oninput="setCustomValidity('')" list="jenissertifikasis_1">
                                            <datalist id="jenissertifikasis_1">
                                                <option value="">---Pilih---</option>
                                                <option value="Softskill"> Soft Skill </option>
                                                <option value="Hardskill"> Hard Skill </option>
                                            </datalist>
                                            <span class="invalid-feedback a1" role="alert">
                                                <strong>Jenis Sertifikasi Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="bidang_sertifikasi_1">Bidang Sertifikasi</label>
                                            <input name="bidang_sertifikasi_1" type="text" class="form-control f8 @error('bidang_sertifikasi_1') is-invalid @enderror" id="bidang_sertifikasi_1" required oninvalid="this.setCustomValidity('Isi bidang sertifikasi terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a8" role="alert">
                                                <strong>Bidang Sertifikasi Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="penyelenggara_1">Penyelenggara</label>
                                            <input name="penyelenggara_1" type="text" class="form-control f2 @error('penyelenggara') is-invalid @enderror" id="penyelenggara_1" required oninvalid="this.setCustomValidity('Isi penyelenggara terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a2" role="alert">
                                                <strong>Penyelenggara Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="lokasi_sertifikasi_1">Lokasi Sertifikasi</label>
                                            <textarea class="form-control f3 @error('lokasi_sertifikasi') is-invalid @enderror text-capitalize" name="lokasi_sertifikasi_1" rows="5" id="lokasi_sertifikasi_1" required oninvalid="this.setCustomValidity('Isi lokasi sertifikasi terlebih dahulu')" oninput="setCustomValidity('')"></textarea>
                                            <!-- <input name="lokasi_training_1" type="text" class="form-control f3 @error('lokasi_training') is-invalid @enderror" id="lokasi_training_1"> -->
                                            <span class="invalid-feedback a3" role="alert">
                                                <strong>Lokasi Sertifikasi Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="waktu_mulai_pelaksanaan_1">Tanggal Mulai</label>
                                            <input name="waktu_mulai_pelaksanaan_1" type="text" class="form-control f4 @error('waktu_mulai_pelaksanaan') is-invalid @enderror" id="waktu_mulai_pelaksanaan_1" required onemptied="this.setCustomValidity('Isi waktu mulai pelaksanaan terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a4" role="alert">
                                                <strong>Tanggal Mulai Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="waktu_selesai_pelaksanaan_1">Tanggal Selesai</label>
                                            <input name="waktu_selesai_pelaksanaan_1" type="text" class="form-control f10 @error('waktu_selesai_pelaksanaan') is-invalid @enderror" id="waktu_selesai_pelaksanaan_1" required onemptied="this.setCustomValidity('Isi waktu selesai pelaksanaan terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a10" role="alert">
                                                <strong>Tanggal Selesai Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="tanggal_sertifikat_diterbitkan_1">Tanggal Diterbitkan</label>
                                            <input name="tanggal_sertifikat_diterbitkan_1" type="text" class="form-control f9 @error('tanggal_sertifikat_diterbitkan') is-invalid @enderror" id="tanggal_sertifikat_diterbitkan_1" required onemptied="this.setCustomValidity('Isi tanggal sertifikat diterbitkan terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a9" role="alert">
                                                <strong>Tanggal Diterbitkan Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="masa_berlaku_sampai_dengan_1">Masa Berlaku Sampai dengan</label>
                                            <input name="masa_berlaku_sampai_dengan_1" type="text" class="form-control f5 @error('masa_berlaku_sampai_dengan') is-invalid @enderror" id="masa_berlaku_sampai_dengan_1" required onemptied="this.setCustomValidity('Isi masa berlaku pelaksanaan terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a5" role="alert">
                                                <strong>Masa Berlaku Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="dokumen_data_sertifikasi_1">Lampiran Dokumen</label>
                                            <input type="file" class="form-control f6" id="dokumen_data_sertifikasi_1" name="dokumen_data_sertifikasi_1" required oninvalid="this.setCustomValidity('upload lampiran dokumen terlebih dahulu')" oninput="setCustomValidity('')">
                                            <span class="invalid-feedback a6" role="alert">
                                                <strong>Lampiran Dokumen Tidak Boleh Kosong!!</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <input name="jumlah" value="1" type="text" class="form-control jumlahsrtfks" id="jumlah" hidden>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Sertifikasi.index')}}">Batal</a>
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
        $("#id_pegawai").select2({
            theme: "bootstrap4"
        });
        $('#waktu_mulai_pelaksanaan_1').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#waktu_selesai_pelaksanaan_1').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#tanggal_sertifikat_diterbitkan_1').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#masa_berlaku_sampai_dengan_1').datepicker({
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

    $('.submit').click(function() {
        var jml = $('.jumlahsrtfks').val();
        var i = 1;
        var j = 1;

        if ($.trim($('.f0').val()) === '') {
            $('.a0').show();
            $('.f0').focus();
            return false;
        } else {
            $('.a0').hide();
        }
        while (i <= jml) {
            while (j <= (jml * 10)) {
                if ($.trim($('.f' + j).val()) === '') {
                    if (j === (jml * 10)) {
                        $('.a' + j).show();
                        return false;
                    } else {
                        $('.a' + j).show();
                    }
                } else {
                    $('.a' + j).hide();
                    if (validateForm()) {
                        return true;
                    }
                }
                j++;
            }
            i++;
        }
    });

    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //             $('#imageResult')
    //                 .attr('src', e.target.result);
    //         };
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // $(function() {
    //     $('#upload').on('change', function() {
    //         readURL(input);
    //     });
    // });
    // /*  ==========================================
    //     SHOW UPLOADED IMAGE NAME
    // * ========================================== */
    // var input = document.getElementById('upload');
    // var infoArea = document.getElementById('upload-label');
    // input.addEventListener('change', showFileName);

    // function showFileName(event) {
    //     var input = event.srcElement;
    //     var fileName = input.files[0].name;
    //     infoArea.textContent = 'File name: ' + fileName;
    // }

    $(document).ready(function() {
        var batas = 10;
        var containerSertifikasi = $(".containerSertifikasi");
        var tambah_sertifikasi_button = $(".tambahSertifikasi");
        var x = 1;
        $(tambah_sertifikasi_button).click(function(e) {
            e.preventDefault();
            if (x < batas) {
                x++;
                $(containerSertifikasi).append(`<br><hr><br><div class="sertifikasi` + x + `">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-8 ml-2">
                                                    <span class="h2">Data ke-` + x + `</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="nama_sertifikasi_` + x + `">Nama Sertifikasi</label>
                                                        <input name="nama_sertifikasi_` + x + `" type="text"
                                                            class="form-control f11 @error('nama_sertifikasi') is-invalid @enderror"
                                                            id="nama_sertifikasi_` + x + `" required oninvalid="this.setCustomValidity('Isi nama sertifikasi terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a11" role="alert">
                                                            <strong>Nama Sertifikasi Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="jenis_sertifikasi_` + x + `">Jenis Sertifikasi</label>
                                                        <input name="jenis_sertifikasi_` + x + `" type="text"
                                                            class="form-control f12 @error('jenis_sertifikasi') is-invalid @enderror" id="jenis_sertifikasi_` + x + `" required oninvalid="this.setCustomValidity('Isi jenis sertifikasi terlebih dahulu')" oninput="setCustomValidity('')"  list="jenissertifikasis_` + x + `">
                                                            <datalist id="jenissertifikasis_` + x + `">
                                                                <option value="Softskill">Softskill</option>
                                                                <option value="Hardskill">Hardskill</option>
                                                            </datalist> 
                                                        <span class="invalid-feedback a12" role="alert">
                                                            <strong>Jenis Sertifikasi Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="bidang_sertifikasi_` + x + `">Bidang Sertifikasi</label>
                                                        <input name="bidang_sertifikasi_` + x + `" type="text"
                                                            class="form-control f13 @error('bidang_sertifikasi_') is-invalid @enderror"
                                                            id="bidang_sertifikasi_` + x + `" required oninvalid="this.setCustomValidity('Isi Bidang sertifikasi terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a13" role="alert">
                                                            <strong>Bidang Sertifikasi Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="penyelenggara_` + x + `">Penyelenggara</label>
                                                        <input name="penyelenggara_` + x + `" type="text"
                                                            class="form-control f14 @error('penyelenggara') is-invalid @enderror" id="penyelenggara_` + x + `" required oninvalid="this.setCustomValidity('Isi penyelenggara terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a14" role="alert">
                                                            <strong>Penyelenggara Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="lokasi_sertifikasi_` + x + `">Lokasi Sertifikasi</label>
                                                        <textarea class="form-control f15 @error('lokasi_sertifikasi') is-invalid @enderror text-capitalize" name="lokasi_sertifikasi_` + x + `" rows="5" id="lokasi_sertifikasi_` + x + `" required oninvalid="this.setCustomValidity('Isi lokasi Sertifikasi terlebih dahulu')" oninput="setCustomValidity('')"></textarea>
                                                        <span class="invalid-feedback a15" role="alert">
                                                            <strong>Lokasi Sertifikasi Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="waktu_mulai_pelaksanaan_` + x + `">Tanggal Mulai</label>
                                                        <input name="waktu_mulai_pelaksanaan_` + x + `" type="text"
                                                            class="form-control f16 @error('waktu_mulai_pelaksanaan') is-invalid @enderror"
                                                            id="waktu_mulai_pelaksanaan_` + x + `" required onemptied="this.setCustomValidity('Isi waktu mulai pelaksanaan terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a16" role="alert">
                                                            <strong>Tanggal Mulai Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="waktu_selesai_pelaksanaan_` + x + `">Tanggal Selesai</label>
                                                        <input name="waktu_selesai_pelaksanaan_` + x + `" type="text"
                                                            class="form-control f17 @error('waktu_selesai_pelaksanaan') is-invalid @enderror"
                                                            id="waktu_selesai_pelaksanaan_` + x + `" required onemptied="this.setCustomValidity('Isi waktu selesai pelaksanaan terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a17" role="alert">
                                                            <strong>Tanggal Selesai Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="tanggal_sertifikat_diterbitkan_` + x + `">Tanggal Diterbitkan</label>
                                                        <input name="tanggal_sertifikat_diterbitkan_` + x + `" type="text"
                                                            class="form-control f18 @error('tanggal_sertifikat_diterbitkan') is-invalid @enderror"
                                                            id="tanggal_sertifikat_diterbitkan_` + x + `" required onemptied="this.setCustomValidity('Isi tanggal diterbitkan terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a18" role="alert">
                                                            <strong>Tanggal Diterbitkan Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="masa_berlaku_sampai_dengan_` + x + `">Masa Berlaku Sampai dengan</label>
                                                        <input name="masa_berlaku_sampai_dengan_` + x + `" type="text"
                                                            class="form-control f19 @error('masa_berlaku_sampai_dengan') is-invalid @enderror"
                                                            id="masa_berlaku_sampai_dengan_` + x + `" required onemptied="this.setCustomValidity('Isi masa berlaku terlebih dahulu')" oninput="setCustomValidity('')">
                                                        <span class="invalid-feedback a19" role="alert">
                                                            <strong>Masa Berlaku Tidak Boleh Kosong!!</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="dokumen_data_sertifikasi_` + x + `">Lampiran Dokumen</label>
                                                    <input type="file" class="form-control f20" name="dokumen_data_sertifikasi_` + x + `" required oninvalid="this.setCustomValidity('Upload lampiran dokumen terlebih dahulu')" oninput="setCustomValidity('')">
                                                    <span class="invalid-feedback a20" role="alert">
                                                        <strong>Lampiran Dokumen Tidak Boleh Kosong!!</strong>
                                                    </span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>`); //add input
                $('.jumlahsrtfks').attr('value', x);
                $('#waktu_mulai_pelaksanaan_' + x).datepicker({
                    format: 'dd-mm-yyyy'
                });
                $('#waktu_selesai_pelaksanaan_' + x).datepicker({
                    format: 'dd-mm-yyyy'
                });
                $('#tanggal_sertifikat_diterbitkan_' + x).datepicker({
                    format: 'dd-mm-yyyy'
                });
                $('#masa_berlaku_sampai_dengan_' + x).datepicker({
                    format: 'dd-mm-yyyy'
                });
                // function bacaUrl(input) {
                //     if (input.files && input.files[0]) {
                //         var reader = new FileReader();
                //         reader.onload = function(e) {
                //             $('#imageResult_' + x).attr('src', e.target.result);
                //         };
                //         reader.readAsDataURL(input.files[0]);
                //     }
                // }
                // $(function() {
                //     $('#upload_' + x).on('change', function() {
                //         bacaUrl(input);
                //     });
                // });
                // /*  ==========================================
                //     SHOW UPLOADED IMAGE NAME
                // * ========================================== */
                // var input = document.getElementById('upload_' + x);
                // var infoArea = document.getElementById('upload-label_' + x);
                // input.addEventListener('change', showFileName);

                // function showFileName(event) {
                //     var input = event.srcElement;
                //     var fileName = input.files[0].name;
                //     infoArea.textContent = 'File name: ' + fileName;
                // }
            } else {
                alert('You Reached the limits')
            }
        });
    });
</script>
@endpush