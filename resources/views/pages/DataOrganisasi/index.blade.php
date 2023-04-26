@extends('layout.master')
@section('statusorganisasi','active')
@push('plugin-style')
{!! Html::style('css/tree.css') !!}
@endpush
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Organisasi</h4>
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
                <a href="{{route('Organisasi.index')}}">Organisasi</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('Organisasi.index')}}">Data Organisasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="ch">
                        <div class="col-md-7">
                            <ul class="nav nav-tabs nav-primary" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tree-view-tab" data-toggle="pill" href="#tree-view" role="tab" aria-controls="tree-view" aria-selected="true">
                                        <i class="fas fa-sitemap">&nbsp Tree View</i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="form-sto-tab" data-toggle="pill" href="#form-sto" role="tab" aria-controls="form-sto" aria-selected="false">
                                        <i class="fas fa-clipboard-list">&nbsp Form STO</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary ml-1 btn-sm" data-toggle="modal" data-target="#importmodal">
                                <i class="fas fa-file-import"></i>
                                Import Data
                            </button>
                            <a href="{{route('Organisasi.export')}}">
                                <button class="btn btn-primary ml-1 btn-sm">
                                    <i class="fas fa-file-export"></i>
                                    Eksport Data
                                </button>
                            </a>
                            <a class="btn btn-primary ml-auto btn-sm" href="{{route('Organisasi.create')}}">
                                <i class="fa fa-plus"></i>
                                Tambah Data Organisasi
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="importmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Import Data Organisasi</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('Organisasi.import') }}" id="myForm">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="file" class="form-control input-file" name="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="templateExcel/Template Import Data Organisasi.xlsx" class="btn btn-success btn-sm text-white">Download Template</a>
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
                    <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="tree-view" role="tabpanel" aria-labelledby="tree-view-tab">
                            <div class="row">
                                <div class="zoom-header ml-4">
                                    <button class="zoomout btn btn-sm btn-dark">Perkecil </button>
                                    <select id="sel" class="select" onchange="handleChange()">
                                        <option value=0.1>10%</option>
                                        <option value=0.35>35%</option>
                                        <option value=0.5>50%</option>
                                        <option value=0.75>75%</option>
                                        <option value=0.85 selected>85%</option>
                                        <option value=0.9>90%</option>
                                        <option value=1>100%</option>
                                        <option value=1.2>120%</option>
                                        <option value=1.5>150%</option>
                                        <option value=0.75>reset</option>
                                    </select>
                                    <button class="zoomin btn btn-sm btn-dark"> Perbesar</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tree_container tree-body">
                                    <div class="tree">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span>President Director</span>
                                                    @if(!empty($presdir))
                                                    <p>{{$presdir->nama_pejabat}}</p>
                                                    @else
                                                    <p> - </p>
                                                    @endif
                                                </a>
                                                <ul class="active">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <span>Tecnology & Operation Director</span>
                                                            @if(!empty($techoperationdir))
                                                            <p>{{$techoperationdir->nama_pejabat}}</p>
                                                            @else
                                                            <p> - </p>
                                                            @endif
                                                        </a>
                                                        <ul class="active">
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <span>Bidding & Pricing</span>
                                                                    @if(!empty($bp))
                                                                    <p>{{$bp->nama_pejabat}}</p>
                                                                    @else
                                                                    <p> - </p>
                                                                    @endif
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <span>Tecnology & Operation Division</span>
                                                                    @if(!empty($techqualitycontroldiv))
                                                                    <p>{{$techqualitycontroldiv->nama_pejabat}}</p>
                                                                    @else
                                                                    <p> - </p>
                                                                    @endif
                                                                </a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Engineering dan Engineering Information Management</span>
                                                                            @if(!empty($eeim))
                                                                            <p>{{$eeim->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($eeimstaff as $eeims)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Engineering dan Engineering Information Management</span>
                                                                                    @if(!empty($eeims))
                                                                                    <p>{{$eeims->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Electrical Design</span>
                                                                            @if(!empty($ed))
                                                                            <p>{{$ed->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($edstaff as $eds)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Electrical Design</span>
                                                                                    @if(!empty($eds))
                                                                                    <p>{{$eds->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Mechanical Design</span>
                                                                            @if(!empty($md))
                                                                            <p>{{$md->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($mdstaff as $mds)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Mechanical Design</span>
                                                                                    @if(!empty($mds))
                                                                                    <p>{{$mds->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Production Technology</span>
                                                                            @if(!empty($prodtech))
                                                                            <p>{{$prodtech->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($ptstaff as $pts)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Production Technology</span>
                                                                                    @if(!empty($pts))
                                                                                    <p>{{$pts->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Deputy GM Sub Quality Control</span>
                                                                            @if(!empty($deputygm))
                                                                            <p>{{$deputygm->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Incoming Quality Control</span>
                                                                                    @if(!empty($iqc))
                                                                                    <p>{{$iqc->nama_pejabat}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>In Process Inspection</span>
                                                                                    @if(!empty($ipi))
                                                                                    <p>{{$ipi->nama_pejabat}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Final Inspection</span>
                                                                                    @if(!empty($fi))
                                                                                    <p>{{$fi->nama_pejabat}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>After Sales</span>
                                                                                    @if(!empty($afsale))
                                                                                    <p>{{$afsale->nama_pejabat}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <span>Operation Division</span>
                                                                    @if(!empty($operationdiv))
                                                                    <p>{{$operationdiv->nama_pejabat}}</p>
                                                                    @else
                                                                    <p> - </p>
                                                                    @endif
                                                                </a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Purchasing</span>
                                                                            @if(!empty($purchase))
                                                                            <p>{{$purchase->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($purchases as $pcs)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Purchasing</span>
                                                                                    @if(!empty($pcs))
                                                                                    <p>{{$pcs->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Logistic Controlling</span>
                                                                            @if(!empty($logcontrol))
                                                                            <p>{{$logcontrol->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($lcstaff as $lcs)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Logistic Controlling</span>
                                                                                    @if(!empty($lcs))
                                                                                    <p>{{$lcs->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Expedition Sub</span>
                                                                                    @if(!empty($expsub))
                                                                                    <p>{{$expsub->nama_pejabat}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                                @foreach($expsubs as $exps)
                                                                                <ul>
                                                                                    <li>
                                                                                        <a href="javascript:void(0);">
                                                                                            <span>Staff {{$loop->iteration}} Expedition Sub</span>
                                                                                            @if(!empty($exps))
                                                                                            <p>{{$exps->nama}}</p>
                                                                                            @else
                                                                                            <p> - </p>
                                                                                            @endif
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                                @endforeach
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Warehouse</span>
                                                                            @if(!empty($warehouse))
                                                                            <p>{{$warehouse->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($wstaff as $ws)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Warehouse</span>
                                                                                    @if(!empty($ws))
                                                                                    <p>{{$ws->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Warehouse Candi Sewu Sub</span>
                                                                                    @if(!empty($whcsewu))
                                                                                    <p>{{$whcsewu->nama_pejabat}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                                @foreach($whcsewus as $whcss)
                                                                                <ul>
                                                                                    <li>
                                                                                        <a href="javascript:void(0);">
                                                                                            <span>Staff {{$loop->iteration}} Warehouse Candi Sewu Sub</span>
                                                                                            @if(!empty($whcss))
                                                                                            <p>{{$whcss->nama}}</p>
                                                                                            @else
                                                                                            <p> - </p>
                                                                                            @endif
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                                @endforeach
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Warehouse Sukosari Sub</span>
                                                                                    @if(!empty($whsuko))
                                                                                    <p>{{$whsuko->nama_pejabat}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                                @foreach($whsukos as $whss)
                                                                                <ul>
                                                                                    <li>
                                                                                        <a href="javascript:void(0);">
                                                                                            <span>Staff {{$loop->iteration}} Warehouse Sukosari Sub</span>
                                                                                            @if(!empty($whss))
                                                                                            <p>{{$whss->nama}}</p>
                                                                                            @else
                                                                                            <p> - </p>
                                                                                            @endif
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                                @endforeach
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Production Planning and Controlling</span>
                                                                            @if(!empty($ppc))
                                                                            <p>{{$ppc->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($ppcs as $ppcss)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Production Planning and Controlling</span>
                                                                                    @if(!empty($ppcss))
                                                                                    <p>{{$ppcss->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Production Workshop Candi Sewu</span>
                                                                            @if(!empty($pwcs))
                                                                            <p>{{$pwcs->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($pwcss as $pwcsss)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Production Workshop Candi Sewu</span>
                                                                                    @if(!empty($pwcsss))
                                                                                    <p>{{$pwcsss->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Production Workshop Sukosari</span>
                                                                            @if(!empty($pws))
                                                                            <p>{{$pws->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($pwss as $pwsss)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Production Workshop Sukosari</span>
                                                                                    @if(!empty($pwsss))
                                                                                    <p>{{$pwsss->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Production Workshop INKA</span>
                                                                            @if(!empty($pwinka))
                                                                            <p>{{$pwinka->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($pwinkas as $pwinkass)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Production Workshop INKA</span>
                                                                                    @if(!empty($pwinkass))
                                                                                    <p>{{$pwinkass->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Maintenance</span>
                                                                            @if(!empty($maintenance))
                                                                            <p>{{$maintenance->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($maintenances as $maintenancess)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Maintenance</span>
                                                                                    @if(!empty($maintenancess))
                                                                                    <p>{{$maintenancess->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <span>Finance and Human Resource Director</span>
                                                            @if(!empty($financehrdir))
                                                            <p>{{$financehrdir->nama_pejabat}}</p>
                                                            @else
                                                            <p> - </p>
                                                            @endif
                                                        </a>
                                                        <ul class="active">
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <span>Finance Division</span>
                                                                    @if(!empty($financediv))
                                                                    <p>{{$financediv->nama_pejabat}}</p>
                                                                    @else
                                                                    <p> - </p>
                                                                    @endif
                                                                </a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Tax & Verification</span>
                                                                            @if(!empty($taxverif))
                                                                            <p>{{$taxverif->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($taxverifstaff as $taxverifs)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Tax & Verification</span>
                                                                                    @if(!empty($taxverifs))
                                                                                    <p>{{$taxverifs->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Accounting & Budgeting</span>
                                                                            @if(!empty($accbud))
                                                                            <p>{{$accbud->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($accbudstaff as $accbuds)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Accounting & Budgeting</span>
                                                                                    @if(!empty($accbuds))
                                                                                    <p>{{$accbuds->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Treasury & Fund Raising</span>
                                                                            @if(!empty($tfr))
                                                                            <p>{{$tfr->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($tfrstaff as $tfrs)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Treasury & Fund Raising</span>
                                                                                    @if(!empty($tfrs))
                                                                                    <p>{{$tfrs->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <span>Human Resource & General Affairs Division</span>
                                                                    @if(!empty($hrga))
                                                                    <p>{{$hrga->nama_pejabat}}</p>
                                                                    @else
                                                                    <p> - </p>
                                                                    @endif
                                                                </a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>HR & General Affairs</span>
                                                                            @if(!empty($hga))
                                                                            <p>{{$hga->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        @foreach($hgastaff as $hgas)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} HR & General Affairs</span>
                                                                                    @if(!empty($hgas))
                                                                                    <p>{{$hgas->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Corporate Secretary & Legal</span>
                                                                            @if(!empty($csl))
                                                                            <p>{{$csl->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        <!-- loop staft -->
                                                                        @foreach($cslstaff as $csls)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Corporate Secretary & Legal</span>
                                                                                    @if(!empty($csls))
                                                                                    <p>{{$csls->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <span>Information Technology</span>
                                                                            @if(!empty($it))
                                                                            <p>{{$it->nama_pejabat}}</p>
                                                                            @else
                                                                            <p> - </p>
                                                                            @endif
                                                                        </a>
                                                                        <!-- loop staft -->
                                                                        @foreach($itstaff as $its)
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span>Staff {{$loop->iteration}} Information Technology</span>
                                                                                    @if(!empty($its))
                                                                                    <p>{{$its->nama}}</p>
                                                                                    @else
                                                                                    <p> - </p>
                                                                                    @endif
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="form-sto" role="tabpanel" aria-labelledby="form-sto-tab">
                            <div class="form-inline form-group col-8">
                                <label for="search" class="col-md-2 col-form-label">Search: </label>
                                <div class="col-md-3">
                                    <div id="search" class="input-full"></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="DataOrganisasi" class="display table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kode Organisasi</th>
                                            <th>Nama Organisasi</th>
                                            <th>Nama Pejabat</th>
                                            <th>Level Organisasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Organisasi as $o)
                                        <tr style="white-space:nowrap; width:1%;">
                                            <td>{{$o->kode_organisasi}}</td>
                                            <td>{{$o->nama_organisasi}}</td>
                                            <td>{{$o->nama_pejabat}}</td>
                                            <td>{{$o->level_organisasi}}</td>
                                            <td>
                                                <a href="{{route('Organisasi.edit', $o->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('Organisasi.show', $o->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Lihat Data">
                                                    <i class="fas fa-user"></i>
                                                </a>
                                                <button id="removeorganisasi" data-id="{{ $o->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger removeorganisasi" data-original-title="Hapus Data">
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
    </div>
</div>
@endsection
@push('plugin-scripts')
<script>
    $(document).ready(function() {

        $('#DataOrganisasi').DataTable({
            "bLengthChange": false,
            "bInfo": false,
            "paginate": false,
            "autoWidth": true,
            fixedColumns: {
                leftColumns: 1
            },
            "language": {
                search: "",
                searchPlaceholder: "Data Organisasi",
            },
            initComplete: (settings, json) => {
                $('#DataOrganisasi_filter').appendTo('#search');
            },
        });
    });

    $('.removeorganisasi').click(function(e) {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: 'Hapus Data Organisasi?',
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
                    url: '/Organisasi/' + id,
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
    });

    let zoomArr = [0.1, 0.35, 0.5, 0.75, 0.85, 0.9, 1, 1.2, 1.5];


    var element = document.querySelector('.tree');
    let value = element.getBoundingClientRect().width / element.offsetWidth;

    let indexofArr = 4;
    handleChange = () => {
        let val = document.querySelector('#sel').value;
        val = Number(val);
        console.log('handle change selected value ', val);
        indexofArr = zoomArr.indexOf(val);
        console.log('Handle changes', indexofArr);
        element.style['transform'] = `scale(${val})`;
    };



    document.querySelector('.zoomin').addEventListener('click', () => {
        if (indexofArr < zoomArr.length - 1) {
            indexofArr += 1;
            value = zoomArr[indexofArr];
            document.querySelector('#sel').value = value;
            element.style['transform'] = `scale(${value})`;
        }
    });

    document.querySelector('.zoomout').addEventListener('click', () => {
        if (indexofArr > 0) {
            indexofArr -= 1;
            value = zoomArr[indexofArr];
            document.querySelector('#sel').value = value;
            element.style['transform'] = `scale(${value})`;
        }
    });

    $(function() {
        $(".tree ul").hide();
        $(".tree>ul").show();
        $(".tree ul.active").show();
        $(".tree li").on("click", function(e) {
            var children = $(this).find("> ul");
            if (children.is(":visible")) children.hide("fast").removeClass("active");
            else children.show("fast").addClass("active");
            e.stopPropagation();
        });
    });
</script>
@endpush