@extends('layout.master')
@section('statuskaryawan','active')
@section('statusdatakaryawan','active')
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
                <a href="{{route('Karyawan.index')}}">Karyawan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Karyawan.index')}}">Data Karyawan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                        <div class="col-md-7">
                            <h4 class="card-title">Data Karyawan</h4>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#importmodal">
                                <i class="fas fa-file-import"></i>
                                Import Data
                            </button>
                            <button type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#exportmodal">
                                <i class="fas fa-file-export"></i>Eksport Data
                            </button>
                            <a class="btn btn-primary ml-1 btn-sm" href="{{route('Karyawan.create')}}">
                                <i class="fa fa-plus"></i>
                                Tambah Karyawan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exportmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Eksport Data Karyawan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('Karyawan.export') }}" id="myForm">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="form-group form-inline">
                                            <label for="asal_kepegawaian" class="col-md-4 col-form-label">Asal Kepegawaian</label>
                                            <div class="col-md-8 p-0">
                                                <select name="asal_kepegawaian" class="form-control input-full" id="asal_kepegawaian">
                                                    <option value="">---Pilih---</option>
                                                    <option value="INKA">INKA</option>
                                                    <option value="REKA">REKA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group form-inline">
                                            <label for="kode_tipe_pegawai" class="col-md-4 col-form-label">Tipe Pegawai</label>
                                            <div class="col-md-8 p-0">
                                                <select name="kode_tipe_pegawai" class="form-control input-full" id="kode_tipe_pegawai">
                                                    <option value="">---Pilih---</option>
                                                    @foreach($tp as $tipe)
                                                    <option value="{{$tipe->id}}">{{$tipe->kode_tipe_pegawai}} - {{$tipe->nama_tipe_pegawai}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-info text-capitalize">*Kosongkan pilihan untuk eksport semua data</small>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        Eksport
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="importmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Import Data Karyawan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('Karyawan.import') }}" id="myForm">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="file" class="form-control input-file" name="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{asset('templateExcel/Template Import Data Pegawai.xlsx')}}" class="btn btn-success btn-sm text-white">Download Template</a>
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        Import
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-inline form-group col-8">
                            <label for="search" class="col-md-2 col-form-label">Search: </label>
                            <div class="col-md-3">
                                <div id="search" class="input-full"></div>
                            </div>
                        </div>
                        <div class="form-inline form-group col-4">
                            <label for="show_page" class="col-md-5 col-form-label">Tampilkan</label>
                            <div class="col-md-5">
                                <div id="show_page" class="input-full"></div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="tabelKaryawan" class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Perusahaan</th>
                                    <th>Divisi</th>
                                    <th>Tipe Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($k as $karyawan)
                                <tr style="white-space:nowrap; width:1%;">
                                    <td>{{$karyawan->nip}}</td>
                                    <td>{{$karyawan->nama}}</td>
                                    <td>@if(!empty($karyawan->asal_kepegawaian)){{$karyawan->asal_kepegawaian}}@else-@endif</td>
                                    <td>@if(!empty($karyawan->division)){{$karyawan->division}}@else-@endif</td>
                                    <td>{{$karyawan->tipepegawai['nama_tipe_pegawai']}}</td>
                                    <td>{{$karyawan->jabatan['nama_jabatan']}}</td>
                                    <td>@if(!empty($karyawan->jenis_kelamin)){{$karyawan->jenis_kelamin}}@else-@endif</td>
                                    <td>
                                        @if( strpos($karyawan->status_karyawan,"Aktif") !== false)
                                        <span class="badge text-success text-bold" style="background-color: #F1FFE5; border: 1px solid #2AD000">Aktif</span>
                                        @elseif(strpos($karyawan->status_karyawan,"Nonaktif") !== false)
                                        <span class="badge text-danger text-bold" style="background-color: #FFE5E7; border: 1px solid #DA1E28">Nonaktif</span>
                                        @else
                                        <p>-</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{route('Karyawan.edit', $karyawan->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('Karyawan.show', $karyawan->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Lihat Data">
                                                <i class="fas fa-user"></i>
                                            </a>
                                            <button id="removekaryawan" data-id="{{ $karyawan->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger removekaryawan" data-original-title="Hapus Data">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="pagination" class="m-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('plugin-scripts')
    <script>
        $(document).ready(function() {
            $('#tabelKaryawan').DataTable({
                "bLengthChange": true,
                "bInfo": false,
                "paginate": true,
                "autoWidth": true,
                "language": {
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    },
                    search: "",
                    searchPlaceholder: "Karyawan",
                    lengthMenu: '<select class="form-control">' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="30">30</option>' +
                        '<option value="40">40</option>' +
                        '<option value="50">50</option>' +
                        '<option value="-1">Semua</option>' +
                        '</select>data'
                },
                initComplete: (settings, json) => {
                    $('#tabelKaryawan_paginate').appendTo('#pagination');
                    $('#tabelKaryawan_filter').appendTo('#search');
                    $('#tabelKaryawan_length').appendTo('#show_page');
                },
            });
        });
    </script>
    <script>
        $('.removekaryawan').click(function(e) {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            swal({
                title: 'Hapus Data Karyawan?',
                text: "Apakah Anda yakin ingin menghapus Data ini",
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-focus'
                    },
                    confirm: {
                        text: 'Hapus',
                        className: 'btn btn-danger'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/Karyawan/' + id,
                        data: {
                            "id": id,
                            "_token": token,
                        },
                    }).done(function(data) {
                        swal({
                            title: 'Data berhasil terhapus',
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            }
                        }).then(function() {
                            location.reload();
                        })
                        $(".swal-modal").css('background-color', '#DCF4E6');
                    }).fail(function(data) {
                        swal({
                            title: 'Data Gagal dihapus',
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            }
                        });
                        $(".swal-modal").css('background-color', '#F4E2E2');
                    })
                } else {
                    swal.close();
                }
            });
            $(".swal-modal").css('background-color', '#F4E2E2');
        })
    </script>
    @endpush