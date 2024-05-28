@extends('layouts/layoutMaster')

@section('title', 'Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/cards-statistics.js')}}"></script>
@endsection

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Statistics
</h4>
<div class="row">



  <!-- Orders last week -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-3">
        <h5 class="card-title mb-0">Order</h5>
        <small class="text-muted">Last week</small>
      </div>
      <div class="card-body">
        <div id="ordersLastWeek"></div>
        <div class="d-flex justify-content-between align-items-center gap-3">
          <h4 class="mb-0">124k</h4>
          <small class="text-success">+12.6%</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Sales last year -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Sales</h5>
        <small class="text-muted">Last Year</small>
      </div>
      <div id="salesLastYear"></div>
      <div class="card-body pt-0">
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
          <h4 class="mb-0">175k</h4>
          <small class="text-danger">-16.2%</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Profit last month -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Profit</h5>
        <small class="text-muted">Last Month</small>
      </div>
      <div class="card-body">
        <div id="profitLastMonth"></div>
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
          <h4 class="mb-0">624k</h4>
          <small class="text-success">+8.24%</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Sessions Last month -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Sessions</h5>
        <small class="text-muted">Last Month</small>
      </div>
      <div class="card-body">
        <div id="sessionsLastMonth"></div>
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
          <h4 class="mb-0">45.1k</h4>
          <small class="text-success">+12.6%</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Expenses -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card h-100">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">82.5k</h5>
        <small class="text-muted">Expenses</small>
      </div>
      <div class="card-body">
        <div id="expensesChart"></div>
        <div class="mt-3 text-center">
          <small class="text-muted mt-3">$21k Expenses more than last month</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Impression -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Impression</h5>
        <small class="text-muted">This Week</small>
      </div>
      <div class="card-body">
        <div id="impressionThisWeek"></div>
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
          <h4 class="mb-0">26.1k</h4>
          <small class="text-danger">-24.5%</small>
        </div>
      </div>
    </div>
  </div>


  <!-- Subscriber Gained -->
  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body pb-0">
        <div class="card-icon">
          <span class="badge bg-label-primary rounded-pill p-2">
            <i class='ti ti-users ti-sm'></i>
          </span>
        </div>
        <h5 class="card-title mb-0 mt-2">92.6k</h5>
        <small>Subscribers Gained</small>
      </div>
      <div id="subscriberGained"></div>
    </div>
  </div>

  <!-- Quarterly Sales -->
  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body pb-0">
        <div class="card-icon">
          <span class="badge bg-label-danger rounded-pill p-2">
            <i class='ti ti-shopping-cart ti-sm'></i>
          </span>
        </div>
        <h5 class="card-title mb-0 mt-2">36.5%</h5>
        <small>Quarterly Sales</small>
      </div>
      <div id="quarterlySales"></div>
    </div>
  </div>

  <!-- Order Received -->
  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body pb-0">
        <div class="card-icon">
          <span class="badge bg-label-warning rounded-pill p-2">
            <i class='ti ti-package ti-sm'></i>
          </span>
        </div>
        <h5 class="card-title mb-0 mt-2">97.5k</h5>
        <small>Order Received</small>
      </div>
      <div id="orderReceived"></div>
    </div>
  </div>

  <!-- Revenue Generated -->
  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body pb-0">
        <div class="card-icon">
          <span class="badge bg-label-success rounded-pill p-2">
            <i class='ti ti-credit-card ti-sm'></i>
          </span>
        </div>
        <h5 class="card-title mb-0 mt-2">97.5k</h5>
        <small>Revenue Generated</small>
      </div>
      <div id="revenueGenerated"></div>
    </div>
  </div>

  <!-- Average Daily Sales -->
  <div class="col-xl-4 col-sm-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="mb-2 card-title">Average Daily Sales</h5>
        <p class="mb-0">Total Sales This Month</p>
        <h5 class="mb-0">$28,450</h5>
      </div>
      <div class="card-body px-0">
        <div id="averageDailySales"></div>
      </div>
    </div>
  </div>




  <!-- Generated Leads -->
  <div class="col-lg-4 col-md-6">
    <div class="card">
      <div class="card-body d-flex justify-content-between">
        <div class="d-flex flex-column">
          <div class="card-title mb-auto">
            <h5 class="mb-1 text-nowrap">Generated Leads</h5>
            <small>Monthly Report</small>
          </div>
          <div class="chart-statistics">
            <h3 class="card-title mb-1">4,350</h3>
            <small class="text-success text-nowrap fw-semibold"><i class='ti ti-chevron-up me-1'></i> 15.8%</small>
          </div>
        </div>
        <div id="generatedLeadsChart"></div>
      </div>
    </div>
  </div>
</div>
@endsection
