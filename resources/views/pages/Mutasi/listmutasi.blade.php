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
                <a href="{{route('Mutasi.index')}}">List Mutasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                        <h4 class="card-title">Data Mutasi : @if(!empty($detail->kode_aset)) <span class="text text-dark bg-grey1">{{$detail->kode_aset}}</span>@endif</h4>
                        <a class="btn btn-primary ml-auto btn-sm" href="{{route('Mutasi.create')}}">
                            <i class="fa fa-plus"></i>
                            Tambah Mutasi
                        </a>
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
                        <table id="tabelMutasi" class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal Mutasi</th>
                                    <th>Kode Berita Acara</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mu as $Mutasi)
                                <tr>
                                    <td style="white-space:nowrap; width:1%;">{{\Carbon\Carbon::parse($Mutasi->tgl_mutasi)->format('d-m-Y')}}</td>
                                    <td style="white-space:nowrap; width:1%;">{{$Mutasi->berita_acara->kode_berita_acara}}</td>
                                    <td style="white-space:nowrap; width:1%;">
                                        <div class="form-button-action">
                                            <a href="{{route('Mutasi.edit', $Mutasi->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Mutasi">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('Mutasi.show', $Mutasi->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Lihat Data">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <button type="submit" data-id="{{$Mutasi->id}}" id="remove" data-toggle="tooltip" title="" class="btn btn-link btn-danger deletemutasi" data-original-title="Hapus Mutasi">
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
                <div class="card-action">
                    <a class="btn btn-danger" href="{{route('Mutasi.index')}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
<script>
    $(document).ready(function() {
        $('#tabelMutasi').DataTable({
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
                searchPlaceholder: "Mutasi",
            },
            initComplete: (settings, json) => {
                $('#tabelMutasi_paginate').appendTo('#pagination');
                $('#tabelMutasi_filter').appendTo('#search');
                $('#tabelMutasi_length').appendTo('#show_page');
            },
        });
    });
</script>
<script>
    $('.deletemutasi').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Mutasi?',
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
                    url: '/Mutasi/' + id,
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