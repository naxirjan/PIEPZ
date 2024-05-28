@extends('layouts/layoutMaster')

@section('title', 'Invcoices')

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
    #gridInvoices th{
      text-transform: none;
    }
  </style>

@endsection

@section('page-script')
  <script src="{{asset('assets/bootGrid/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/bootGrid/dist/jquery.bootgrid.js')}}"></script>
  <script src="{{asset('js/jsBootGrid.js')}}"></script>
  <script src="{{asset('js/partner/jsInvoices.js')}}"></script>
@endsection


@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Partner /</span> Orders Invoices KK
  </h4>
  <div class="row">
    <div class="col-sm-12">
      <ul class="nav nav-tabs widget-nav-tabs pb-1 gap-2 mx-1 d-flex flex-nowrap" role="tablist">
        <li class="nav-item">
          <a style="width: 100px !important; height: auto !important;" href="/partner/invoices/{{base64_encode(0)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{$iStatus == 0 ? "active" : ""}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;All Invoices&nbsp;</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 115px !important; height: auto !important;" href="/partner/invoices/{{base64_encode(1)}}"
             class="nav-link btn  d-flex flex-column align-items-center justify-content-center {{$iStatus == 1 ? "active" : ""}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;Open Invoices&nbsp;</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 110px !important; height: auto !important;" href="/partner/invoices/{{base64_encode(2)}}"
             class="nav-link btn  d-flex flex-column align-items-center justify-content-center {{$iStatus == 2 ? "active" : ""}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;Paid Invoices&nbsp;</div>
          </a>
        </li>
      </ul>
      <hr/>
      <div class="row">
        <div class="col-md-12">
          <table id="gridInvoices" class="table  table-hover"
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
            @if(count($aInvoices))
              @foreach($aInvoices as $iKey => $aInvoice)
                <tr>
                  <td><b>{{($iKey+1)}}</b></td>
                  <td><span class="badge badge-xs {{($aInvoice->StatusId == 1 ? 'bg-warning' : ($aInvoice->StatusId == 2 ? 'bg-success' : 'bg-danger'))}}">{{$aInvoice->status}}</span></td>
                  <td>
                    {{$aInvoice->funnel}}</td>
                  <td>{{$aInvoice->order_number}}</td>
                  <td>{{$aInvoice->quantity}}</td>
                  <td>{{$aInvoice->partner}}</td>
                  <td>{{$aInvoice->total_price}}</td>
                  <td>{{date("d F Y", strtotime($aInvoice->created_at))}}</td>
                  <td>
                    <a title="View Details" href="/partner/invoice/details/{{base64_encode($aInvoice->id)}}" class="badge bg-info">View</a>
                    <a title="Download Invoice" href="/partner/invoice/download/{{base64_encode($aInvoice->id)}}" class="badge bg-primary">Download</a>
                  </td>
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
