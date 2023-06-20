@extends('layout.master')
@section('statusmutasi','active')
@section('statusprosesmutasi','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Daftar mutasi</h4>
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
                <a href="{{route('prosesMutasi.index')}}">Daftar m</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('prosesMutasi.index')}}">Data m</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                        <h4 class="card-title">Data aset</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-inline form-group col-8">
                        <label for="search" class="col-md-2 col-form-label">Search: </label>
                        <div class="col-md-3">
                            <div id="search" class="input-full"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="detailAset" class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Aset</th>
                                    <th>Lokasi</th>
                                    <th>Kondisi</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($da as $da)
                                <tr style="white-space:nowrap; width:1%;">
                                    <td>{{$da->kode_aset}}</td>
                                    <td>{{$da->lokasi->nama_lokasi}}</td>
                                    <td>{{$da->kondisi}}</td>
                                    <td>
                                        <a href="{{route('Mutasi.create3', $da->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Pemindahan Aset">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('Mutasi.create2', $da->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Penghancuran Aset">
                                            <i class="fas fa-user"></i>
                                        </a>
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
        $('#detailAset').DataTable({
            "bLengthChange": false,
            "bInfo": false,
            "paginate": false,
            "autoWidth": true,
            fixedColumns: {
                leftColumns: 1
            },
            "language": {
                search: "",
                searchPlaceholder: "Daftar Data Aset",
            },
            initComplete: (settings, json) => {
                $('#detailAset_filter').appendTo('#search');
            },
        });
    });
</script>
<script>
    $('.show_confirm').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Aset?',
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
                    url: '/detailAset/' + id,
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