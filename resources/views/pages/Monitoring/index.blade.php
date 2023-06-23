@extends('layout.master')
@section('statusmonitoring','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Monitoring</h4>
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
                <a href="{{route('Monitoring.index')}}">Monitoring</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Monitoring.index')}}">Data Monitoring</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-end">
                        <div class="col-md-6">
                            <h4 class="card-title">Data Monitoring</h4>
                        </div>
                        <div class="col-md-6">
                            @if (Auth::user()->tipe_user == 'user')
                            <a class="btn btn-primary ml-1 btn-sm" href="{{route('Monitoring.scan')}}">
                                <i class="fa fa-plus"></i>
                                Tambah Data Monitoring
                            </a>
                            @endif
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
                            <label for="show_page" class="col-md-3 col-form-label">Tampilkan</label>
                            <div class="col-md-9">
                                <div id="show_page" class="input-full"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tabelMonitoring" class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Aset</th>
                                    <th>Jumlah Monitoring</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mo as $monitoring)
                                <tr>
                                    <td style="white-space:nowrap; width:1%;">{{$monitoring->kode_aset}}</td>
                                    <td style="white-space:nowrap; width:1%;">{{$monitoring->jumlah}}</td>
                                    <td style="white-space:nowrap; width:1%;">
                                        <div class="form-button-action">
                                            <a href="{{route('Monitoring.list', $monitoring->id_detail_aset)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Lihat Data">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            @if (Auth::user()->tipe_user == 'user')
                                            <button type="button" data-id="{{$monitoring->id_detail_aset}}" id="remove" data-toggle="tooltip" title="" class="btn btn-link btn-danger deletemonitoring" data-original-title="Hapus Monitoring">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
<script>
    $(document).ready(function() {
        $('#tabelMonitoring').DataTable({
            "bLengthChange": true,
            "bInfo": false,
            "paginate": true,
            "language": {
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya"
                },
                search: "",
                searchPlaceholder: "Monitoring",
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
                $('#tabelMonitoring_paginate').appendTo('#pagination');
                $('#tabelMonitoring_filter').appendTo('#search');
                $('#tabelMonitoring_length').appendTo('#show_page');
            },
        });
    });
</script>
<script>
    $('.deletemonitoring').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Monitoring?',
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
                    url: '/monitoring/' + id + '/deleteall',
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