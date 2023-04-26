@extends('layout.master')
@section('statusorganisasi','active')
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
                <a href="{{route('Organisasi.edit', $Organisasi->id)}}">Edit Organisasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Organisasi</div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('Organisasi.update', $Organisasi->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="kode_organisasi">Kode Organisasi</label>
                                    <input name="kode_organisasi" value="@if(!empty(old('kode_organisasi'))){{ old('kode_organisasi') }}@else{{$Organisasi->kode_organisasi}}@endif" type="text" class="form-control @error('kode_organisasi') is-invalid @enderror" id="kode_organisasi" @if($errors->has('kode_organisasi')) autofocus @endif>
                                    @error('kode_organisasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="level_organisasi">Level Organisasi</label>
                                    <input name="level_organisasi" type="text" value="@if(!empty(old('level_organisasi'))){{ old('level_organisasi') }}@else{{$Organisasi->level_organisasi}}@endif" class="form-control @error('level_organisasi') is-invalid @enderror" list="level_organisasis" id="level_organisasi" @if($errors->has('level_organisasi')) autofocus @endif>
                                    <datalist id="level_organisasis">
                                        <option value="Direksi">Direksi</option>
                                        <option value="Departemen">Departemen</option>
                                        <option value="Bagian">Bagian</option>
                                    </datalist>
                                    @error('level_organisasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_pejabat">Nama Pejabat</label>
                                    <input name="nama_pejabat" type="text" value="@if(!empty(old('nama_pejabat'))){{ old('nama_pejabat') }}@else{{$Organisasi->nama_pejabat}}@endif" class="form-control @error('nama_pejabat') is-invalid @enderror" id="nama_pejabat" list="pejabats" @if($errors->has('nama_pejabat')) autofocus @endif>
                                    <datalist id="pejabats">
                                        @foreach($p as $pegawai)
                                        <option value="{{$pegawai->nama}}"> {{$pegawai->jabatan->nama_jabatan}} - {{$pegawai->nama}}</option>
                                        @endforeach
                                    </datalist>
                                    @error('nama_pejabat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_organisasi">Nama Organisasi</label>
                                    <input name="nama_organisasi" type="text" value="@if(!empty(old('nama_organisasi'))){{ old('nama_organisasi') }}@else{{$Organisasi->nama_organisasi}}@endif" class="form-control @error('nama_organisasi') is-invalid @enderror" id="nama_organisasi" list="nama_organisasis" @if($errors->has('nama_organisasi')) autofocus @endif>
                                    <datalist id="nama_organisasis">
                                        <option value="President Director">President Director</option>
                                        <option value="Tecnology & Operation Director">Tecnology & Operation Director</option>
                                        <option value="Finance and Human Resource Director">Finance and Human Resource Director</option>
                                        <option value="Tecnology & Quality Control Division">Tecnology & Quality Control Division</option>
                                        <option value="Operation Division">Operation Division</option>
                                        <option value="Finance Division">Finance Division</option>
                                        <option value="Human Resource & General Affairs Division">Human Resource & General Affairs Division</option>
                                        <option value="Deputy GM Sub Quality Control">Deputy GM Sub Quality Control</option>
                                        <option value="Engineering dan Engineering Information Management">Engineering dan Engineering Information Management</option>
                                        <option value="Electrical Design">Electrical Design</option>
                                        <option value="Mechanical Design">Mechanical Design</option>
                                        <option value="Production Technology">Production Technology</option>
                                        <option value="Bidding & Pricing">Bidding & Pricing</option>
                                        <option value="Incoming Quality Control">Incoming Quality Control</option>
                                        <option value="In Process Inspection">In Process Inspection</option>
                                        <option value="Final Inspection">Final Inspection</option>
                                        <option value="After Sales">After Sales</option>
                                        <option value="Purchasing">Purchasing</option>
                                        <option value="Logistic Controlling">Logistic Controlling</option>
                                        <option value="Expedition Sub">Expedition Sub</option>
                                        <option value="Warehouse">Warehouse</option>
                                        <option value="Warehouse Candi Sewu Sub">Warehouse Candi Sewu Sub</option>
                                        <option value="Warehouse Sukosari Sub">Warehouse Sukosari Sub</option>
                                        <option value="Production Planning and Controlling">Production Planning and Controlling</option>
                                        <option value="Production Workshop Candi Sewu">Production Workshop Candi Sewu</option>
                                        <option value="Production Workshop Sukosari">Production Workshop Sukosari</option>
                                        <option value="Production Workshop INKA">Production Workshop INKA</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Tax & Verification">Tax & Verification</option>
                                        <option value="Accounting & Budgeting">Accounting & Budgeting</option>
                                        <option value="Treasury & Fund Raising">Treasury & Fund Raising</option>
                                        <option value="HR & General Affairs">HR & General Affairs</option>
                                        <option value="Corporate Secretary & Legal">Corporate Secretary & Legal</option>
                                        <option value="Information Technology">Information Technology</option>
                                    </datalist>
                                    @error('nama_organisasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input name="status" type="text" value="@if(!empty(old('status'))){{ old('status') }}@else{{$Organisasi->status}}@endif" class="form-control @error('status') is-invalid @enderror" id="status" list="statuss" @if($errors->has('status')) autofocus @endif>
                                    <datalist id="statuss">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                    </datalist>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_pejabat">Status Pejabat</label>
                                    <input name="status_pejabat" value="@if(!empty(old('status_pejabat'))){{ old('status_pejabat') }}@else{{$Organisasi->status_pejabat}}@endif" type="text" class="form-control @error('status_pejabat') is-invalid @enderror" list="status_pejabats" id="status_pejabat" @if($errors->has('status_pejabat')) autofocus @endif>
                                    <datalist id="status_pejabats">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                    </datalist>
                                    @error('status_pejabat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="jobdesk">Jobdesk</label>
                                    <input type="file" class="form-control @error('jobdesk') is-invalid @enderror" id="jobdesk" name="jobdesk" @if($errors->has('jobdesk')) autofocus @endif>
                                    @if(!empty($Organisasi->jobdesk) && Storage::exists($Organisasi->jobdesk))
                                    <div class="text text-black">
                                        <div class="text-capitalize text-black">Dokumen tersimpan</div>
                                        <ul>
                                            <li><a href="{{ Storage::url($Organisasi->jobdesk)}}">{{$Organisasi->kode_organisasi}} - {{$Organisasi->nama_organisasi}}</a></li>
                                        </ul>
                                        <span class="text-danger text-capitalize text-small"> *** Kosongkan Dokumen KK jika tidak ingin mengubah</span>
                                    </div>
                                    @elseif(empty($Organisasi->jobdesk) && !Storage::exists($Organisasi->jobdesk))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @elseif(!empty($Organisasi->jobdesk) && !Storage::exists($Organisasi->jobdesk))
                                    <span class="text-danger text-capitalize text-small">Dokumen Tidak Ditemukan. Silahkan Upload Ulang!!!</span>
                                    @endif
                                    @error('jobdesk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-capitalize">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-danger" href="{{route('Organisasi.index')}}">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection