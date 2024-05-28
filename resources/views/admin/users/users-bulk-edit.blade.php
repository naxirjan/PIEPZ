@extends('layouts/layoutMaster')

@section('title', 'Users Bulk Edit')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}"/>
  <style>
    #gridUsersBulkEdit th{
      text-transform: none;
    }
  </style>
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

  <!-- bootGrid Libs - Start -->
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/dist/jquery.bootgrid.css')}}">
  <script src="{{asset('assets/bootGrid/js/moderniz.2.8.1.js')}}"></script>
  <!-- bootGrid Libs - Start -->
@endsection

@section('page-script')
  <script src="{{asset('assets/bootGrid/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/bootGrid/dist/jquery.bootgrid.js')}}"></script>
  <script src="{{asset('assets/js/forms-selects.js')}}"></script>

  <!-- Libs Toaster -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/toastr.min.css')}}">
  <script src="{{asset('assets/js/toastr.min.js')}}"></script>
  <!-- Libs Toaster -->

  <script src="{{asset('js/jsBootGrid.js')}}"></script>
  <script src="{{asset('js/jsCommon.js')}}"></script>
  <script src="{{asset('js/admin/jsUsersBulkEdit.js')}}"></script>
@endsection



@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Admin /</span> Users Bulk Edit
  </h4>
  <div class="row">
    <div id="divActions" class="col-md-12">
      <a href="/admin/users" type="button"
         class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
         data-bs-placement="bottom" data-bs-original-title="Back">
        <i class="ti ti-arrow-left"></i>
      </a>
      <a href="{{Request::url()}}" type="button" class="btn rounded-pill btn-icon btn-label-primary waves-effect"
         data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Refresh">
        <i class="ti ti-refresh"></i>
      </a>
      <button id="btnSave" type="button" class="btn rounded-pill btn-icon btn-label-primary waves-effect"
              data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Save All">
        <i class="ti ti-device-floppy"></i>
      </button>
    </div>
  </div>

  <!-- Users Bulk Edit-->
  <div class="row">
    <div class="col-md-12">
      <table id="gridUsersBulkEdit" class="table table-condensed table-hover" data-totalss="{{count($aUsers)}}"
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
            data-column-id="role_id"
            data-header-align="center"
            data-align="center">
            Role
          </th>
          <th
            data-column-id="first_name"
            data-type="string"
            data-align="center"
            data-header-align="center">
            First Name
          </th>
          <th
            data-column-id="last_name"
            data-align="center"
            data-header-align="center">
            Last Name
          </th>
          <th
            data-column-id="country"
            data-type="string"
            data-header-align="left"
            data-align="left"
          >
            Country
          </th>

          <th
            data-column-id="status"
            data-align="center"
            data-header-align="center">
            Status
          </th>
        </tr>
        </thead>
        <tbody>
        @if(count($aUsers))
          @foreach($aUsers as $iKey => $aUser)
            <tr>
              <td>{{($iKey+1)}}</td>
              <td>
                <select class="role form-control" id="{{$aUser->id}}-role">
                  @foreach($aRoles as $aRole)
                    @if($aRole->id == $aUser->role_id)
                      <option value="{{$aRole->id}}" selected>{{$aRole->role}}</option>
                    @else
                      <option value="{{$aRole->id}}">{{$aRole->role}}</option>
                    @endif
                  @endforeach
                </select>
              </td>
              <td><input id="{{$aUser->id}}-first_name" type="text" class="first_name form-control" value="{{$aUser->first_name}}"/></td>
              <td><input id="{{$aUser->id}}-last_name" type="text" class="last_name form-control" value="{{$aUser->last_name}}"/></td>
              <td><input id="{{$aUser->id}}-country" type="text" class="country form-control" value="{{$aUser->country}}"/></td>
              <td>
                <select class="status form-control" id="{{$aUser->id}}-status">
                  @php
                    $aStatuses = array('Inactive', 'Active');
                  @endphp
                  @foreach($aStatuses as $iKey => $sStatus)
                    @if($iKey == $aUser->status)
                      <option value="{{$iKey}}" selected>{{$sStatus}}</option>
                    @else
                      <option value="{{$iKey}}">{{$sStatus}}</option>
                    @endif
                  @endforeach
                </select>
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>
    </div>
  </div>

@endsection
