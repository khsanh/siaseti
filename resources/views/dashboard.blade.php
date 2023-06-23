@extends('layout.master')
@section('statusdashboard','active')
@section('content')
<div class="panel-header bg-primary-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
      </div>
    </div>
  </div>
</div>
<div class="page-inner mt--5">
  <div class="row mt--2">
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body ">
            <div class="row">
              <div class="col-5">
                <div class="icon-big text-center">
                  <i class="flaticon-chart-pie text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Aset IT</p>
                  <h4 class="card-title">{{ $totalAset }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body ">
            <div class="row">
              <div class="col-5">
                <div class="icon-big text-center">
                  <i class="flaticon-check text-success"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Aset IT Baik</p>
                  <h4 class="card-title">{{ $totalBaik }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <div class="icon-big text-center">
                  <i class="flaticon-error text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Aset Tidak Dipakai</p>
                  <h4 class="card-title">{{ $totalTD }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <div class="icon-big text-center">
                  <i class="flaticon-file text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Aset IT Lain-Lain</p>
                  <h4 class="card-title">{{ $totalLain2 }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection