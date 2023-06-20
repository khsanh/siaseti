@extends('layout.master')
@section('statusjenisbarang','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Jenis Barang</h4>
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
                <a href="{{route('jenisBarang.index')}}">Jenis Barang</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('jenisBarang.index')}}">Data Jenis Barang</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                        <h4 class="card-title">Data Jenis Barang</h4>
                        <a class="btn btn-primary ml-auto btn-sm" href="{{route('jenisBarang.create')}}">
                            <i class="fa fa-plus"></i>
                            Tambah Jenis Barang
                        </a>
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
                        <table id="jenisBarang" class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Jenis Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jb as $jb)
                                <tr style="white-space:nowrap; width:1%;">
                                    <td>{{$jb->kode_jenis_barang}}</td>
                                    <td>{{$jb->nama_barang}}</td>
                                    <td>
                                        <a href="{{route('jenisBarang.edit', $jb->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button id="removejb" data-id="{{ $jb->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger show_confirm" data-original-title="Hapus Data">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
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
        $('#jenisBarang').DataTable({
            "bLengthChange": false,
            "bInfo": false,
            "paginate": false,
            "autoWidth": true,
            fixedColumns: {
                leftColumns: 1
            },
            "language": {
                search: "",
                searchPlaceholder: "Jenis Barang",
            },
            initComplete: (settings, json) => {
                $('#jenisBarang_filter').appendTo('#search');
            },
        });
    });
</script>
<script>
    $('.show_confirm').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Jenis Barang?',
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
                    url: '/jenisBarang/' + id,
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