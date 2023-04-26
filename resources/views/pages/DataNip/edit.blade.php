@extends('layout.master')
@section('statusnip','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">NIP</h4>
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
                <a href="{{route('NIP.index')}}">NIP</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('NIP.edit', $nip->id)}}">Edit NIP</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit NIP</div>
                </div>
                <form method="POST" action="{{ route('NIP.update', $nip->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="@if(!empty(old('nama_lengkap'))){{ old('nama_lengkap') }}@else{{$nip->nama_lengkap}}@endif" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap">
                                    <input type="text" name="nama_lengkap_old" value="{{$nip->nama_lengkap}}" class="form-control" id="nama_lengkap_old" readonly hidden>
                                    @error('nama_lengkap')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="input_sk">Tahun SK</label>
                                    <input type="text" name="tahun_sk" class="form-control @error('tahun_sk') is-invalid @enderror" value="@if(!empty(old('tahun_sk'))){{ old('tahun_sk') }}@else{{$nip->tahun_sk}}@endif" id="tahun_sk" onchange="cekNip();" onfocus="cekNip();">
                                    @error('tahun_sk')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="id_kepegawaian">ID Kepegawaian</label>
                                    <select name="id_kepegawaian" class="form-control @error('id_kepegawaian') is-invalid @enderror" id="id_kepegawaian" onchange="cekNip();" onfocus="cekNip();">
                                        <option value="">---Pilih---</option>
                                        @foreach($tp as $tipepegawai)
                                        <option value="{{$tipepegawai->kode_tipe_pegawai}}" @if(!empty(old('id_kepegawaian'))){{old('id_kepegawaian') == $tipepegawai->kode_tipe_pegawai ? 'selected' : ''}}@else{{$nip->id_kepegawaian == $tipepegawai->kode_tipe_pegawai ? 'selected' : ''}}@endif>{{$tipepegawai->kode_tipe_pegawai}} - {{$tipepegawai->nama_tipe_pegawai}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kepegawaian')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_urut_pegawai">No. Urut Pegawai</label>
                                    <input type="text" name="no_urut_pegawai" value="@if(!empty(old('no_urut_pegawai'))){{ old('no_urut_pegawai') }}@else{{$nip->no_urut_pegawai}}@endif" onchange="cekNip();" onfocus="cekNip();" class="form-control @error('no_urut_pegawai') is-invalid @enderror" id="no_urut_pegawai">
                                    <!-- <div id="text_no_urut_terakhir"></div> -->
                                    <div id="warn_no_urut"></div>
                                    @error('no_urut_pegawai')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('NIP.index')}}">Batal</a>
                        <button type="submit" class="btn btn-success submitbtn">Simpan</button>
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
        $('#tahun_sk').datepicker({
            format: 'yyyy',
            viewMode: "years",
            minViewMode: "years",
        });
    });

    $('.submitbtn').on('click', function() {
        let id_kepegawaian = $("#id_kepegawaian").val();
        let tahun_sk = $("#tahun_sk").val();
        let no_urut_pegawai = $('#no_urut_pegawai').val();
        if (no_urut_pegawai.length != 5) {
            $("#warn_no_urut").empty();
            $("#warn_no_urut").append('<small id="keterangan" class="form-text text-danger">Nomor Urut Pegawai Harus 5 Karakter.</small>');
            $('.submitbtn').prop('disabled', true);
            return;
        } else {
            $("#warn_no_urut").empty();
            cekNip();
        }
    });

    // function getNoUrutTerakhir(id_kepegawaian, tahun_sk) {
    //     if (tahun_sk || id_kepegawaian) {
    //         $.ajax({
    //             type: "GET",
    //             url: "/get/getNoUrut/" + id_kepegawaian + '/' + tahun_sk,
    //             dataType: 'JSON',
    //             success: function(res) {
    //                 if (res) {
    //                     $.each(res, function(key, value) {
    //                         if (value === '00000') {
    //                             $("#no_urut_pegawai").val('00001');
    //                             $("#text_no_urut_terakhir").append('<small class="form-text text-info" >Nomor urut terakhir: -</small>');
    //                         } else {
    //                             $("#text_no_urut_terakhir").append('<small class="form-text text-info" >Nomor urut terakhir: ' + value + '</small>');
    //                         }
    //                     });
    //                 } else {
    //                     $("#text_no_urut_terakhir").empty();
    //                 }
    //             }
    //         })
    //         return;
    //     }
    // }

    function cekNip() {
        let id_kepegawaian = $("#id_kepegawaian").val();
        let tahun_sk = $("#tahun_sk").val();
        let no_urut_pegawai = $('#no_urut_pegawai').val();
        let nama_lengkap = $("#nama_lengkap_old").val();
        if (no_urut_pegawai) {
            $.ajax({
                type: "GET",
                url: "/get/ceknip/" + id_kepegawaian + "/" + tahun_sk + "/" + no_urut_pegawai + "/" + nama_lengkap,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#warn_no_urut").empty();
                        $("#text_no_urut_terakhir").empty();
                        $.each(res, function(key, value) {
                            if ((key === 'danger') === true) {
                                $('.submitbtn').prop('disabled', true);
                            } else {
                                $('.submitbtn').prop('disabled', false);
                            }
                            $("#warn_no_urut").append('<small id="keterangan" class="form-text text-' + key + '" >' + value + '</small>');
                            // getNoUrutTerakhir(id_kepegawaian, tahun_sk);
                        });
                    } else {
                        $("#warn_no_urut").empty();
                        $("#text_no_urut_terakhir").empty();
                    }
                }
            })
        } else {
            $("#warn_no_urut").empty();
            $("#text_no_urut_terakhir").empty();
        }
    };
</script>
@endpush