@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login Basic - Pages')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection
<style>
 .authentication-wrapper.authentication-basic .authentication-inner {
    max-width: 800px !important;
    position: relative;
}
</style>

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection



@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-body fw-bold ms-1">Products Feed</span>
            </a>
          </div>
          <!-- /Logo -->
         
          <form id="formAuthentication" class="mb-3" action="{{route('vendor.confirmation')}}" method="GET">
           <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Import Field</th>
          <th>Project</th>
          <th>Select</th>
         
        
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">

      @for ($i = 0; $i <= 5; $i++)
      <tr>
          <td>Product Name</td>
          <td>
          
            <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
              <option>Field 1</option>
              <option>Field 2</option>
              <option>Field 3</option>
            </select>
          </td>
          <td><input class="form-check-input" type="checkbox" value="" id="defaultCheck1" /></td>
        </tr>

    @endfor
       
     
      </tbody>
    </table>
  </div>  
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>
        </div>
         
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection
