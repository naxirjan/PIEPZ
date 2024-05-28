@extends('layouts/layoutMaster')

@section('title', 'Users')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
  <style>
    #gridUsers th{
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
  <script src="{{asset('js/admin/jsUsers.js')}}"></script>
@endsection


@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Admin /</span> Users
  </h4>

  <div class="row">
    <div class="col-sm-12">
      <ul class="nav nav-tabs widget-nav-tabs pb-1 gap-2 mx-1 d-flex flex-nowrap" role="tablist">
        <li class="nav-item">
          <a style="width: 85px !important; height: auto !important;" href="/admin/users/{{base64_encode("0")}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iRoleId == 0 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;All Users</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 75px !important; height: auto !important;" href="/admin/users/{{base64_encode("2")}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iRoleId == 2 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">Vendors</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 105px !important; height: auto !important;" href="/admin/users/{{base64_encode("3")}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iRoleId == 3 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">B2B Partners</div>
          </a>
        </li>
      </ul>
      <hr/>
      <div class="row">
        <div id="divActionsUsers" class="col-md-12">
          <button id="btnBulkEdit" type="button"
                  class="btn rounded-pill btn-icon waves-effect btn-label-grey disabled" data-bs-toggle="tooltip"
                  data-bs-placement="bottom" data-bs-original-title="Edit All">
            <i class="ti ti-pencil"></i>
          </button>
        </div>
      </div>
      <table id="gridUsers" class="table table-condensed table-hover"
             style="table-layout: auto;">
        <thead>
        <tr>
          <th
            data-column-id="sno"
            data-align="center"
            data-header-align="center"
           >
            #
          </th>
          <th
            data-column-id="id"
            data-identifier="true"
            data-align="center"
            data-header-align="center"
          >
            ID
          </th>
          <th
            data-column-id="username"
            data-align="center"
            data-header-align="center">
            Username
          </th>
          <th
            data-column-id="role"
            data-header-align="center"
            data-align="center">
            Type
          </th>
          <th
            data-column-id="email"
            data-type="string"
            data-align="center"
            data-header-align="center">
            Email
          </th>
          <th
            data-column-id="orders"
            >
            Orders
          </th>
          <th
            data-column-id="orders_amount"
            data-header-align="left"
            data-align="left"
            >
            Order Total
          </th>

          <th
            data-column-id="created_at"
            data-align="center"

            data-header-align="left">
            Customer Name
          </th>
          <th
            data-column-id="status"
            data-align="center"
            data-header-align="center">
            Date
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
        @if(count($aUsers))
          @foreach($aUsers as $iKey => $aUser)
            <tr>
              <td>{{($iKey+1)}}</td>
              <td>{{$aUser->id}}</td>
              <td>{{$aUser->username}}</td>
              <td>{{$aUser->role}}</td>
              <td>{{$aUser->email}}</td>
              <td>{{$aUser->orders}}</td>
              <td>{{$aUser->orders_amount}}</td>
              <td>{{$aUser->customer}}</td>
              <td>{{date("d F Y", strtotime($aUser->date))}}</td>
              <td>
                <a href="/admin/users/profile/{{base64_encode($aUser->id)}}" class="badge bg-primary">Profile</a>
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
