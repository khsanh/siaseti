@extends('layout.master')
@section('statusdetailaset','active')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Daftar Aset</h4>
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
                <a href="{{route('detailAset.index')}}">Daftar Aset</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('detailAset.index')}}">Data Aset</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                    <div class="col-md-7">
                            <h4 class="card-title">Data Aset</h4>
                        </div>
                        <div class="col-md-6">
                            @if (Auth::user()->tipe_user == 'admin')
                            <button type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#cetakmodal">
                                <i class="fas fa-print"></i>
                                Cetak Label Per Ruang
                            </button>
                            <a class="btn btn-primary ml-1 btn-sm" href="{{route('detailAset.create')}}">
                                <i class="fa fa-plus"></i>
                                Tambah Data Aset
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="cetakmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Cetak Label Berdasarkan Ruang</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="get">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="form-group form-inline">
                                            <label for="id_lokasi" class="col-md-4 col-form-label">Lokasi</label>
                                            <div class="col-md-8 p-0">
                                                <select name="id_lokasi" class="form-control input-full" id="id_lokasi">
                                                    <option value="">---Pilih---</option>
                                                    @foreach($L as $L)
                                                    <option value="{{$L->id}}">{{$L->kode_lokasi}} - {{$L->nama_lokasi}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm btn-cetak" type="submit">
                                        Cetak
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
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
                                    <th>Kode QR</th>
                                    <th>Kode Aset</th>
                                    <th>Lokasi</th>
                                    <th>Kondisi</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <script type="text/javascript" src="{{ asset('jquery.min.js') }}"></script>
                                <script type="text/javascript" src="{{ asset('jquery.qrcode.js') }}"></script>
                                <script type="text/javascript" src="{{ asset('qrcode.js') }}"></script>
                                @foreach($da as $da)
                                <tr style="white-space:nowrap; width:1%;">
                                    <td>
                                        <div style="padding: 6px; ">
                                            {!! QrCode::size(60)->generate($da->id); !!}
                                        </div>
                                    </td>
                                    <td>{{$da->kode_aset}}</td>
                                    <td>{{$da->lokasi->nama_lokasi}}</td>
                                    <td>{{$da->kondisi}}</td>
                                    <td>
                                        @if( strpos($da->status_aset,"Aktif") !== false)
                                        <span class="badge text-success text-bold" style="background-color: #F1FFE5; border: 1px solid #2AD000">Aktif</span>
                                        @elseif(strpos($da->status_aset,"Nonaktif") !== false)
                                        <span class="badge text-danger text-bold" style="background-color: #FFE5E7; border: 1px solid #DA1E28">Nonaktif</span>
                                        @else
                                        <p>-</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::user()->tipe_user == 'admin')
                                        <a href="{{route('detailAset.edit', $da->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endif
                                        <a href="{{route('detailAset.show', $da->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Lihat Data">
                                            <i class="fas fa-file-alt"></i>
                                        </a>
                                        @if (Auth::user()->tipe_user == 'admin')
                                        <a href="{{route('detailAset.showLabel', $da->id)}}" target="_blank" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Cetak Label">
                                            <i class="fas fa-print"></i>
                                        </a>
                                        <button id="removeda" data-id="{{ $da->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger show_confirm" data-original-title="Hapus Data">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
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
<script>
    function printContent() {
        var selectElement = document.getElementById('id_lokasi');
        var selectedOption = selectElement.value;
        var url = '{{ route("detailAset.cetak", ["idLokasi" => ":idLokasi"]) }}';
        url = url.replace(':idLokasi', selectedOption);
        var printWindow = window.open(url, 'print_window');
        printWindow.addEventListener('load', function () {
            printWindow.print();
            // printWindow.close();
        });
    }

    document.querySelector('.btn-cetak').addEventListener('click', function (event) {
        event.preventDefault();
        printContent();
    });
</script>
@endpush