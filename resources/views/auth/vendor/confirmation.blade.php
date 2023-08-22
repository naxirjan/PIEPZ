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

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection
<style>
 .authentication-wrapper.authentication-basic .authentication-inner {
    max-width: 80% !important;
    position: relative;
}
</style>

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
                        <span class="app-brand-text demo text-body fw-bold ms-1">Welcome to Piepz 👋</span>
                      </a>
                    </div>
                    <!-- /Logo -->


                    <div class="row mb-5">
                          <div class="col-md-6 col-lg-6">

                            <div class="card mb-4">
                              <div class="card-body">
                                <h5 class="card-title">Personal Information</h5>
                                <div class="card-subtitle  mb-3">Name: {{$user->first_name}}</div>
                                <div class="card-subtitle mb-3">Email: {{$user->email}}</div>
                                <div class="card-subtitle mb-3">Phone: {{$user->phone}}</div>

                              </div>
                            </div>

                          </div>
                          <div class="col-md-6 col-lg-6">

                            <div class="card mb-4">
                              <div class="card-body">
                                <h5 class="card-title">Company Information</h5>
                                <div class="card-subtitle text-muted mb-3">Company Name: {{$user->company->company_name}}</div>

                              </div>
                            </div>

                          </div>
                    </div>


        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection
