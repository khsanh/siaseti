@extends('layout.master')
@section('statusmutasi','active')
@section('statusdatamemo','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Memo</h4>
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
                <a href="{{route('Memo.index')}}">Memo</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Memo.index')}}">Data Memo</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                        <h4 class="card-title">Data Memo</h4>
                        @if (Auth::user()->tipe_user == 'user')
                        <a class="btn btn-primary ml-auto btn-sm" href="{{route('Memo.create')}}">
                            <i class="fa fa-plus"></i>
                            Tambah Memo
                        </a>
                        @endif
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
                        <table id="Memo" class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>Nomor Memo</th>
                                    <th>Perihal</th>
                                    <th>Tanggal</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($m as $m)
                                <tr style="white-space:nowrap; width:1%;">
                                    <td>{{$m->kode_memo}}</td>
                                    <td>{{$m->perihal}}</td>
                                    <td>{{$m->tanggal_memo}}</td>
                                    <td>
                                        @if (Auth::user()->tipe_user == 'user')
                                        <a href="{{route('Memo.edit', $m->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endif
                                        <a href="{{route('Memo.show', $m->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Lihat Data">
                                            <i class="fas fa-user"></i>
                                        </a>
                                        @if (Auth::user()->tipe_user == 'user')
                                        <button id="removem" data-id="{{$m->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger show_confirm" data-original-title="Hapus Data">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                        @endif
                                        @if (Auth::user()->tipe_user == 'admin')
                                        @if (null === $ba->where('id_memo', $m->id)->first())
                                        <a href="{{route('beritaAcara.create2', $m->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Balas Memo">
                                            <i class="fas fa-square"></i>
                                        </a>
                                        @endif
                                        @endif
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
        $('#Memo').DataTable({
            "bLengthChange": false,
            "bInfo": false,
            "paginate": false,
            "autoWidth": true,
            fixedColumns: {
                leftColumns: 1
            },
            "language": {
                search: "",
                searchPlaceholder: "Memo",
            },
            initComplete: (settings, json) => {
                $('#Memo_filter').appendTo('#search');
            },
        });
    });
</script>
<script>
    $('.show_confirm').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Memo?',
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
                    url: '/Memo/' + id,
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