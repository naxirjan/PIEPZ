@extends('layouts/layoutMaster')

@section('title', 'Support - Vendors Questions')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
  <style>
    #gridVendorTickets th{
      text-transform: none;
    }
  </style>
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>

  <!-- bootGrid Libs - Start -->
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/dist/jquery.bootgrid.css')}}">
  <script src="{{asset('assets/bootGrid/js/moderniz.2.8.1.js')}}"></script>
  <!-- bootGrid Libs - Start -->
@endsection

@section('page-script')
  <script src="{{asset('assets/bootGrid/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/bootGrid/dist/jquery.bootgrid.js')}}"></script>
  <script src="{{asset('js/jsBootGrid.js')}}"></script>
  <script src="{{asset('js/admin/jsTickets.js')}}"></script>
@endsection

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Admin /</span> Tickets
  </h4>
  <div class="row">
    <div class="col-xl-12">
      <ul class="nav nav-tabs widget-nav-tabs pb-1 gap-2 mx-1 d-flex flex-nowrap">
        <li class="nav-item">
          <!-- 2 is role id (vendor) and 0 is status (pending)-->
          <a style="width: 135px !important; height: auto !important;" href="/admin/tickets/{{base64_encode("2|0")}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iRoleId == 2 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;Vendor Questions&nbsp;</div>
          </a>
        </li>
        <li class="nav-item">
          <!-- 3 is role id (partner) and 0 is status (pending)-->
          <a style="width: 155px !important; height: auto !important;" href="/admin/tickets/{{base64_encode("3|0")}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iRoleId == 3 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">B2B Partner Questions</div>
          </a>
        </li>
      </ul>
      <hr/>
      <div class="row">
        <div class="col-xl-12">
          <div class="nav-align-left">
            <ul class="nav nav-pills" role="tablist">
              <li class="nav-item " role="presentation">
                <a href="/admin/tickets/{{base64_encode("$iRoleId|0")}}" class="nav-link {{($iStatus == 0 ? "active" : "")}}" >
                  <b>New</b>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a href="/admin/tickets/{{base64_encode("$iRoleId|1")}}" class="nav-link {{($iStatus == 1 ? "active" : "")}}" >
                  <b>Open</b>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a href="/admin/tickets/{{base64_encode("$iRoleId|2")}}" class="nav-link {{($iStatus == 2 ? "active" : "")}}" >
                  <b>Closed</b>
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane {{(in_array($iStatus, array(0,1,2)) ? "active show" : "")}}" id="navs-pills-left-home" role="tabpanel">
                <table id="gridVendorTickets" class="table table-condensed table-hover" data-total="{{count($aTickets)}}"
                       style="table-layout: auto;">
                  <thead>
                  <tr>
                    <th
                      data-column-id="sno"
                      data-identifier="true"
                      data-align="center"
                      data-header-align="center"
                    >
                      #
                    </th>
                    <th
                      data-column-id="order_number"
                      data-align="center"
                      data-header-align="center">
                      Order Number
                    </th>
                    <th
                      data-column-id="customer"
                      data-align="center"
                      data-header-align="center"
                      >
                      Customer Name
                    </th>
                    <th
                      data-column-id="question"
                      data-align="left"
                      data-header-align="left"
                    >
                      Question
                    </th>
                    <th
                      data-column-id="action"
                      data-header-align="center"
                      data-align="center">
                      Action
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  @if(count($aTickets))
                    @foreach($aTickets as $iKey => $aTicket)
                      <tr>
                        <td>{{($iKey+1)}}</td>
                        <td>{{$aTicket->order_number}}</td>
                        <td>{{$aTicket->customer}}</td>
                        <td>{{$aTicket->question}}</td>
                        <td>
                          <a href="/admin/ticket/details/{{base64_encode($aTicket->id)}}" class="badge bg-primary">Open Ticket</a>
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
      </div>
    </div>
  </div>
@endsection
