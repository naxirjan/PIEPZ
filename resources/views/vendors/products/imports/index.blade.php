@extends('layouts/layoutMaster')

@section('title', 'Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-advance.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}">
</script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')

<div class="row">
  <!-- Website Analytics -->
  <div class="col-lg-12 mb-4">
   <!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header"><i class="fa fa-download" aria-hidden="true" style="font-size:24px"></i> Import Setup</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Import Type</th>
          <th>Bron</th>
          <th>Wijzig</th>
          <th>Status</th>
        
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td><img src="https://www.gstatic.com/images/branding/product/1x/hh_sheets_64dp.png" alt="" srcset=""> <strong>Google Sheet</strong></td>
          <td>Product Database</td>
          <td>
          <i class="fa fa-download" aria-hidden="true"></i>
          <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-secondary waves-effect">Instellen</button>
                <button type="button" class="btn btn-outline-secondary waves-effect">Wijzig Mapping</button>
                <button type="button" class="btn btn-outline-secondary waves-effect">Veilighed</button>
              </div>
          </td>
          <td>
          <button type="button" class="btn btn-primary waves-effect waves-light">uitovoeren</button><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></td>
          
        </tr>
     
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->
  </div>
  <!--/ Website Analytics -->



</div>

@endsection
