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
 

  <!-- Sales Overview -->
  <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-1">$0</h4>
        <h4 class="card-title mb-1">Revenue</h4>
      </div>
    </div>
  </div>
  <!--/ Sales Overview -->

   <!-- Sales Overview -->
   <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-1">$0</h4>
        <h4 class="card-title mb-1">Cost</h4>
      </div>
    </div>
  </div>
  <!--/ Sales Overview -->

   <!-- Sales Overview -->
   <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-1">$0</h4>
        <h4 class="card-title mb-1">Gross Profit</h4>
      </div>
    </div>
  </div>
  <!--/ Sales Overview -->

   <!-- Sales Overview -->
   <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-1">$0</h4>
        <h4 class="card-title mb-1">Non Profit</h4>
      </div>
    </div>
  </div>
  <!--/ Sales Overview -->

 <!-- Basic Bootstrap Table -->
    <div class="card">
    <h5 class="card-header">Your Result Over The Period</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
        <thead>
            <tr>
            <th>Revenue</th>
            <th>Amount(Exluding Vat)</th>
            <th>Vat %</th>
            <th>Vat</th>
            <th>Total</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <tr>
            <td>Corrections Sales Price Items</td>
            <td>$124343</td>
            <td>$124343</td>
            <td>$124343</td>
            <td>$124343</td>
            </tr>
            <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td>$540</td>
            <td>$124343</td>
            </tr>
        
        </tbody>
        </table>
    </div>
    </div>
<!--/ Basic Bootstrap Table -->

<hr class="my-1">
  
<!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr>
                <th>Cost</th>
                <th>Amount(Exluding Vat)</th>
                <th>Vat %</th>
                <th>Vat</th>
                <th>Total</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                <td>Corrections Committee</td>
                <td>$124343</td>
                <td>$124343</td>
                <td>$124343</td>
                <td>$124343</td>
                </tr>
                <tr>
                <td>Total</td>
                <td></td>
                <td></td>
                <td>$540</td>
                <td>$124343</td>
                </tr>
            
            </tbody>
            </table>
        </div>
    </div>
<!--/ Basic Bootstrap Table -->

    <hr class="my-1">

<!-- Basic Bootstrap Table -->
        <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr>
                <th>Result</th>
                <th>Total</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                <td>Gross Profit</td>
                <td>$1243</td>
                </tr>
                <tr>
                <td>Vat</td>
                <td>$2323</td>
                </tr>
                <tr>
                <td>Net Profit</td>
                <td>$33</td>
                </tr>
            
            </tbody>
            </table>
        </div>
        </div>
<!--/ Basic Bootstrap Table -->



  <!--/ Projects table -->
</div>

@endsection
