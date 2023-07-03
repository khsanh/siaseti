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
                <a href="{{route('Monitoring.index')}}">List Monitoring</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                        <h4 class="card-title">Data Monitoring : @if(!empty($detail->kode_aset)) <span class="text text-dark bg-grey1">{{$detail->kode_aset}}</span>@endif</h4>
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
                                    <th>Tanggal Monitoring</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mo as $Monitoring)
                                <tr>
                                    <td style="white-space:nowrap; width:1%;">{{\Carbon\Carbon::parse($Monitoring->tanggal_monitoring)->format('d-m-Y')}}</td>
                                    <td style="white-space:nowrap; width:1%;">
                                        <div class="form-button-action">
                                            <a href="{{route('Monitoring.show', $Monitoring->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Lihat Data">
                                                <i class="fas fa-file-alt"></i>
                                            </a>
                                            @if (Auth::user()->tipe_user == 'user')
                                            <button type="submit" data-id="{{$Monitoring->id}}" id="remove" data-toggle="tooltip" title="" class="btn btn-link btn-danger deletemonitoring" data-original-title="Hapus Monitoring">
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
                    <div id="pagination" class="m-3">
                    </div>
                </div>
                <div class="card-action">
                    <a class="btn btn-danger" href="{{route('Monitoring.index')}}">Kembali</a>
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
            bLengthChange: true,
            bInfo: false,
            paginate: true,
            fixedColumns: {
                left: 1
            },
            language: {
                paginate: {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya"
                },
                search: "",
                searchPlaceholder: "Monitoring",
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
                    url: '/Monitoring/' + id,
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