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
                <a href="{{route('NIP.create')}}">Tambah NIP</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah NIP</div>
                </div>
                <form method="POST" action="{{ route('NIP.store') }}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" @if($errors->has('nama_lengkap')) autofocus @endif>
                                    @error('nama_lengkap')
                                    <span class="invalid-feedback a1" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tahun_sk">Tahun SK</label>
                                    <!-- <input type="text" name="input_sk" class="form-control @error('no_handphone') is-invalid @enderror" id="input_sk" > -->
                                    <input type="text" name="tahun_sk" value="{{ old('tahun_sk') }}" class="form-control @error('tahun_sk') is-invalid @enderror" id="tahun_sk" onchange="getNomor()" @if($errors->has('tahun_sk')) autofocus @endif>
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
                                    <select name="id_kepegawaian" class="form-control @error('id_kepegawaian') is-invalid @enderror" id="id_kepegawaian" onchange="getNomor()" @if($errors->has('id_kepegawaian')) autofocus @endif>
                                        <option value="">---Pilih---</option>
                                        @foreach($tp as $tipepegawai)
                                        <option value="{{$tipepegawai->kode_tipe_pegawai}}" {{ old('id_kepegawaian') ==  $tipepegawai->kode_tipe_pegawai ? 'selected' : ''}}>{{$tipepegawai->kode_tipe_pegawai}} - {{$tipepegawai->nama_tipe_pegawai}}</option>
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
                                    <input type="text" name="no_urut_pegawai" value="{{ old('no_urut_pegawai') }}" class="form-control @error('no_urut_pegawai') is-invalid @enderror" id="no_urut_pegawai" readonly>
                                    <div id="warn_no_urut" style="display: none;"></div>
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
        $('#tahun_sk').datepicker({
            format: 'yyyy',
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    });

    function getNomor() {
        var id_kepegawaian = $("#id_kepegawaian").val();
        var tahun_sk = $('#tahun_sk').val();
        if (tahun_sk && id_kepegawaian) {
            $.ajax({
                type: "GET",
                url: "/get/getNoUrut/" + id_kepegawaian + '/' + tahun_sk,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $.each(res, function(kode, nama) {
                            let nomer = parseInt(nama);
                            let l = nomer.toString().length;
                            if (l == 1) {
                                nomer = '0000' + (nomer + 1);
                            } else if (l == 2) {
                                nomer = '000' + (nomer + 1);
                            } else if (l == 3) {
                                nomer = '00' + (nomer + 1);
                            }
                            $("#no_urut_pegawai").val(nomer);
                        });
                    } else {
                        $("#no_urut_pegawai").val('0');
                    }
                }
            });
        } else {
            $("#no_urut_pegawai").val('0');
        }
    }
</script>
@endpush