@extends('layouts/layoutMaster')

@section('title', 'E-commerce')


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
<div class="row">
  <!-- View sales -->
  <div class="col-xl-4 mb-4 col-lg-5 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Welcome Roy! </h5>
            <p class="mb-2">Best seller of the month</p>
            <h4 class="text-primary mb-1">$48.9k</h4>
            <a href="javascript:;" class="btn btn-primary">View Sales</a>
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view sales">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- View sales -->

  <!-- Statistics -->
  <div class="col-xl-8 mb-4 col-lg-7 col-12">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between mb-3">
          <h5 class="card-title mb-0">Statistics</h5>
          <small class="text-muted">Updated 1 month ago</small>
        </div>
      </div>
      <div class="card-body">
        <div class="row gy-3">
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-primary me-3 p-2"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">230k</h5>
                <small>Sales</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">8.549k</h5>
                <small>Customers</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-danger me-3 p-2"><i class="ti ti-shopping-cart ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">1.423k</h5>
                <small>Products</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-success me-3 p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">$9745</h5>
                <small>Revenue</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Statistics -->

  <div class="col-xl-6 col-12">
    <div class="row">
     

      <!-- Generated Leads -->
      <div class="col-xl-12 mb-4 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column">
                <div class="card-title mb-auto">
                  <h5 class="mb-1 text-nowrap">Current Package Enterprise</h5>
                  <small>Monthly Report</small>
                </div>
                <div class="chart-statistics">
                  <h3 class="card-title mb-1">130 </h3>
                  <small class="text-success text-nowrap fw-semibold"> days left</small>
                </div>
              </div>
              <div id="generatedLeadsChart"></div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Generated Leads -->
    </div>
  </div>


  

  <!-- Transactions -->
  <div class="col-md-6 col-lg-6 mb-6 mb-lg-0">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title m-0 me-2">
          <h5 class="m-0 me-2">Selling Points</h5>
          <small class="text-muted">Total 58 Sell done in this Month</small>
        </div>
      
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="d-flex mb-3 pb-1 align-items-center">
            <div class="badge bg-label-primary me-3 rounded p-2">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAHC0lEQVRYha2XW2hl5RXHf2t9e5+Tk5zc5mI73pKWKmPxEqwoLZUcK0yhpRh7rwoTmLYPRXAGH/pS7EB9KQUzOPbVWovgUKjalwEvxKgPtrV2rK30qp0yt+hMcmaSOWefvb/vW33YJ8lkkrkE+sGGDd9l/db6f2utvYUNjv3TX9orku8Wqw5iNqMJT2VZcWjPjpcObfQsALnchVPPTQ4lA2dfFW2PGnGfRNcU0SkkR8URpTaTz/VN7Ln3qeZGAJLLXjjQ3CuuNVrkvQ1IqTj9k1nxjojeEqx4wazd0Hr2PNDYCIBezqL9B7/bELWHMLd3z47nD6VOnye6mQfv/s0YJjMQm+by3a6SjU+9/M2JHx+47ycPP7Nr5P8GoNV8r9jmmQfvOrjv8Ve+MolrjeS+NQlg6H9AG2KVBihJ6p/L4+yPWgv/evfhZ756SYhLSjB18Nuj6OJ49L33AqiGCRM/U6nUG0+8/PUJkc49pR+6E0DFMAo6nYX+KLy7+xdffkSpkerAWz/d+eQbGwbQSj5pOnfYu7lDT0x/cTeSNwQ3iHbGyxscQSKgYEpEwBJ8USUE6c/b2ZTP29TrlQVgYEMAP5/ePRbt75NGZ0SdfhAocKRgdk7+xCVUQDELiAiqCWYJwQfUObLsdP96NtZNw6kXv/NUor4hko2Iy8AFcvXEEEkFKIye6hDBByy2EeeIJMQgmCYcP9Fk9lgkWi9mAuIR12agfuWdj+96bpUMayKw/8X79kn60U61bmgNJFZxYZCKVKCVU3F9bOm5mk6RMbd4GKEAKXCJ4mPEzLqyRDDXlSlH0+w24OIAiEwuh9UUrEBjlS3pdq6/5g62j9xEn2zB6MXT5hTvcfC1pznr30ckB+uFWAEryv1LwxSiGwf2XQKgGCzpQWKC+CGG+67n7jvuZ1BHcFIvHTJQ18/8qXzZkDolelid3XHlaNHh882tAtj/0mRDklOIGCIeF+psqn+GHZ99gH65tlweKW+OlGaOzv4Fz0nSVPABDI9REC1gBEQFszJL2u3i1osCkCyWWhFRIljC1ZtvoibXdJcamR5hfvEUFYYYrCecbP6Dwp+BJCIqJZsYKlKm5JICUfA+XxPw8ySoNM4Nm1rCJ6/dDjEFhQX7gF+/9ggdO0YSh0m1SitfJIqRiBAMzMpLGM0wrBtNwVCCZ00qnleKk66eujy9tXYFSdeRjs84227TsbN03DHaHEHSDE0VH3xpPEoJgGHRVp0eY8EPf/n9z18QwEwbWA8WUmIUiIbhl+e3pJ/ma3c9ylV9E2j8GK5SLXklR1VQFCeCiCu91hLGCCylYnALt10QwNFBTLvKKFDw0dxhMMoH2FS9gR23f49PbWtAvhksAYmogRqIKbra8XNMKTFkExeWwC2MI0sXJWIu43fvvUKL4yDgu7Wpjy187vr7uemqe9CwpryvHaZgFYg95B29Yl2AqemJIbRFCVCmTRTPXP5vZt4+QMYpEoWqlp7WdSs3XzeOxsqlAbreYwneu6vXBUhgDMkxMswCFlJEoR3e5/BHr/Db1x/lv81XgRbavZR91Nm27aqVACbuIhBl+HwR6usCAENmHogogrM+qslmqpVBVBPa7dP8/q3XWCnTK9tVymLji2K1zaV+sFwNIyLFqga4DBDpGbPoiNHjnKNeu4Ibr/sCd9/+A67bNkFNt3PjDXdhdB2QEtV7TzRDRMsmdP4Qv/K9IJE8nOShJ7/xraXp5UKkQYdEEhJn+CC0ssjwwCfYWruVj9/cINoiifRgnNvDM9pZixiMJFFEHIZDVVF1CA6L5/UFyUmScCNwYBUAwhiWYFER66Va6aO/dys1NnXnhylCN/IOQmzxzxN/ZHFxHk0dMZS6RBPMBLNu27DVxdaiUBTxzjUSiMUhUHwsPcnCGf7w52lOh5NLJQDnzhLcIkaT2YW3+dvhN4i6tr6vWFuqqrr8LuIIwZZTcRlPEn9LJCIuwSSnE5scnm9ybOavbB2+lqHBQUQEiMw1j3Nq/n08LaLzaw1fZIg48twvp2ICMHVw92i0D8HVAChoE3URH5rknMSfOcLReUe1UiMvOlSqRot5cIZIrVs9L2V5JRt8yJdTsdzp0iGLg+9YHMAETDtI4tE0oElOjE3MztDpzIFlhCKnoj1YkVzQuJmVTzQgEmOOuvId88v3eM1H6dT0ZAN3ZhTzoyrWSCUd1RhGfMi6ISz7hIrhEiEPOWIR7WocrcKRY02OnOgQLCVRUAXVlKLISFIHVmG4/8o9j+361b7L/jnd//qDjdzPjyVJOipOxqA9FkM2qLGDM78K4OiJ0xydzYkkiHVQqZC4AavV6rMqxZuVtP7sz3Y+fWDdCGxkTE1PDEE2luLH1HQMdDRaOn78w0U+nDdT6Znt6YlvurT27GMPvHBgvTP+B65WU7iQ28hqAAAAAElFTkSuQmCC" alt="">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Shopify</h6>
                <small class="text-muted d-block">Starbucks</small>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
              <h6 class="mb-0 text-success">200 exports</h6>
              </div>
            </div>
          </li>
          <li class="d-flex mb-3 pb-1 align-items-center">
            <div class="badge bg-label-success rounded me-3 p-2">
             <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpojT_ADoQyX6umFBzMrxZRPx-Ocgq9NTMnzDvCl8-3SqmwpSaN1Gj&s=0" alt="" srcset="">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Amazon</h6>
                <small class="text-muted d-block">Add Money</small>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
              <h6 class="mb-0 text-success">200 exports</h6>
              </div>
            </div>
          </li>
          <li class="d-flex mb-3 pb-1 align-items-center">
            <div class="badge bg-label-danger rounded me-3 p-2">
              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAY1BMVEV/VLOqjcy6o9aLZLqbesTJt9+1nNOskM7////u6fWDWbWIYLj6+Pylh8rs5fSVccDCrtuggMbi2O7TxOXazumRbL7o4PHVyObPvuKaeMOOaLzd0uvEsdzx7Pfj2u718vmxltG731PZAAAA20lEQVR4AdXQBY7DQBBE0TJ/M9vh5P6nXLUsTdx7g7xhBv20KE70lWa5vALKSsbUDbRyOuC7RQ8MOhuBSUEFzJJJlmmVlAGR33CTzA4XSSU0lQLrbmSuQCfdgEUnA9BL0h2gVgTE/lHHkSOmtQWMOrhnTJiHdqDWWQN3qQWz2aWfcl7wljbgCaw2X05m3QUwfYDMkhzr/pTAWDfQhEe4W76BSdrBFPLeGEZpDDVnxkzHhc1VXo5pFX6rl3cDuJ926yVvguboVF36Iw4RfMKb3jS1/itGBbc41S/5A0aHDLvooiowAAAAAElFTkSuQmCC" alt="">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Woocommerce</h6>
                <small class="text-muted d-block mb-1">Client Payment</small>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0 text-success">200 exports</h6>
              </div>
            </div>
          </li>
         
        </ul>
      </div>
    </div>
  </div>
  <!--/ Transactions -->

</div>

@endsection
