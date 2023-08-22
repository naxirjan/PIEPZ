@extends('layouts/layoutMaster')

@section('title', 'Search')


@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-ecommerce.js')}}"></script>
@endsection

@section('content')

<style>
  .no-bg-tabs > .tab-content {
    background: transparent;
    padding: 0;
    box-shadow: none !important;
  }
</style>
<div class="row">
  <div class="col-xl-6 mb-4 col-lg-6 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">New Products</h5>
            <p class="mb-4">Best seller of the month</p>
            
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view More">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6 mb-4 col-lg-6 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Weer Op Voorraad</h5>
            <p class="mb-4">Best seller of the month</p>
            
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view More">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6 mb-4 col-lg-6 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Meest Verkochte</h5>
            <p class="mb-4">Best seller of the month</p>
            
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view More">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6 mb-4 col-lg-6 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Outlet</h5>
            <p class="mb-4">Best seller of the month</p>
            
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view More">
          </div>
        </div>
      </div>
    </div>
  </div>

  
  
</div>

@endsection
