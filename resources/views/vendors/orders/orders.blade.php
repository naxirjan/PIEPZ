@extends('layouts/layoutMaster')

@section('title', 'Orders')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>

  <!-- bootGrid Libs - Start -->
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/dist/jquery.bootgrid.css')}}">
  <script src="{{asset('assets/bootGrid/js/moderniz.2.8.1.js')}}"></script>
  <!-- bootGrid Libs - Start -->
  <style>
    #gridOrders th{
      text-transform: none;
    }
  </style>

@endsection

@section('page-script')
  <script src="{{asset('assets/bootGrid/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/bootGrid/dist/jquery.bootgrid.js')}}"></script>
  <script src="{{asset('js/jsBootGrid.js')}}"></script>
  <script src="{{asset('js/vendor/jsOrders.js')}}"></script>
@endsection


@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Vendor /</span> Orders
    <a href="/vendor/create-new-order" type="button" style="float:right;" class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Create New Order">
      <i class="ti ti-plus"></i>
    </a>
  </h4>
  <div class="row">
    <div class="col-sm-12">
      <ul class="nav nav-tabs widget-nav-tabs pb-1 gap-2 mx-1 d-flex flex-nowrap" role="tablist">
        <li class="nav-item">
          <a style="width: 90px !important; height: auto !important;" href="/vendor/orders/{{base64_encode(0)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iStatus == 0 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;All Orders&nbsp;</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 140px !important; height: auto !important;" href="/vendor/orders/{{base64_encode(1)}}"
             class="nav-link btn  d-flex flex-column align-items-center justify-content-center {{($iStatus == 1 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;Processing Orders&nbsp;</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 135px !important; height: auto !important;" href="/vendor/orders/{{base64_encode(2)}}"
             class="nav-link btn  d-flex flex-column align-items-center justify-content-center {{($iStatus == 2 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;Completed Orders&nbsp;</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 130px !important; height: auto !important;" href="/vendor/orders/{{base64_encode(3)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iStatus == 3 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;Cancelled Orders&nbsp;</div>
          </a>
        </li>
      </ul>
      <hr/>
      <div class="row">
        <div class="col-md-12">
          <table id="gridOrders" class="table  table-hover"
                 style="table-layout: auto;">
            <thead>
            <tr>
              <th
                data-column-id="sno">
                #
              </th>
              <th
                data-column-id="status"
                data-align="center"
                data-header-align="center"
              >
                Status
              </th>
              <th
                data-column-id="funnel"
                data-align="center"
                data-header-align="center"
              >
                Funnel
              </th>
              <th
                data-column-id="order_number"
                data-align="center"
                data-header-align="center"
              >
                Order Number
              </th>
              <th
                data-column-id="quantity"
                data-align="center"
                data-header-align="center">
                Quantity
              </th>
              <th
                data-column-id="partner"
                data-align="center"
                data-header-align="center">
                Customer
              </th>
              <th
                data-column-id="order_total"
                data-align="center"
                data-header-align="center">
                Order Total
              </th>
              <th
                data-column-id="tracking_code"
                data-align="center"
                data-header-align="center">
                Tracking Code
              </th>
              <th
                data-column-id="date"
                data-align="center"
                data-header-align="center">
                Date
              </th>
              <th
                data-column-id="actions"
                data-align="center"
                data-header-align="center"
              >
                Action
              </th>
            </tr>
            </thead>

            <tbody>
            @if(count($aOrders))
              @foreach($aOrders as $iKey => $aOrder)
                <tr>
                  <td><b>{{($aOrder->id)}}</b></td>
                  <td><span class="badge badge-xs {{($aOrder->status == 'Open' ? 'bg-warning' : ($aOrder->status == 'Active' ? 'bg-success' : 'bg-danger'))}}">{{$aOrder->status}}</span></td>
                  <td>{{$aOrder->funnel}}</td>
                  <td>{{$aOrder->order_number}}</td>
                  <td>{{$aOrder->quantity}}</td>
                  <td>{{$aOrder->customer}}</td>
                  <td>{{$aOrder->total_price}}</td>
                  <td>{{$aOrder->tracking_code}}</td>
                  <td>{{date("d F Y", strtotime($aOrder->created_at))}}</td>
                  <td><a href="/vendor/order/details/{{base64_encode($aOrder->id)}}" class="badge bg-info">View</a> </td>
                </tr>
              @endforeach
            @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection
