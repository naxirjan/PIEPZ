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
<style>
  .authentication-wrapper.authentication-basic .authentication-inner {
    max-width: 800px;
 }
</style>
@endsection

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
          <h4 class="mb-1 pt-2">Welcome to Piepz 👋</h4>
         
          <form id="formAuthentication" class="mb-3" action="{{route('vendor.products.feed.setup')}}" method="GET">
          <div class="row">
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-icon">
                  <label class="form-check-label custom-option-content" for="customRadioIcon1">
                    <span class="custom-option-body">
                    <i class="fa fa-file" style="font-size:24px"></i>
                      <span class="custom-option-title">XML</span>
                    
                    </span>
                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                  </label>
                </div>
              </div>
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-icon">
                  <label class="form-check-label custom-option-content" for="customRadioIcon2">
                    <span class="custom-option-body">
                    <i class="fa fa-file" style="font-size:24px"></i>
                      <span class="custom-option-title"> CSV </span>
                    
                    </span>
                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon2" />
                  </label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-check custom-option custom-option-icon">
                  <label class="form-check-label custom-option-content" for="customRadioIcon3">
                    <span class="custom-option-body">
                    <i class="fa fa-file" style="font-size:24px"></i>
                      <span class="custom-option-title"> TXT </span>
                    
                    </span>
                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon3" />
                  </label>
                </div>
              </div>
            </div>
            <div class="row mb-3 my-4">
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon4">
                <span class="custom-option-body">
                <i class="fa fa-file" style="font-size:24px"></i>
                  <span class="custom-option-title">Google Sheets</span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon4"  />
              </label>
            </div>
          </div>
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon5">
                <span class="custom-option-body">
                <i class="fa fa-file" style="font-size:24px"></i>
                  <span class="custom-option-title"> Shopify </span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon5" />
              </label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon6">
                <span class="custom-option-body">
                <i class="fa fa-file" style="font-size:24px"></i>
                  <span class="custom-option-title"> WooCommerce </span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon6" />
              </label>
            </div>
          </div>
        </div>
        
        <div>
          <label for="defaultFormControlInput" class="form-label">Name</label>
          <input type="text" class="form-control" id="defaultFormControlInput" placeholder="" aria-describedby="defaultFormControlHelp" />
        </div>
        <div>
          <label for="defaultFormControlInput" class="form-label">Website URL</label>
          <input type="text" class="form-control" id="defaultFormControlInput" placeholder="www.google.com" aria-describedby="defaultFormControlHelp" />
        </div>


        <div class="divider my-4 mb-3">
            <div class="divider-text">or</div>
          </div>
          <div class="my-4 mb-3">
           <input class="form-control" type="file" id="formFile">
        </div>

            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Next</button>
            </div>
          </form>

          <p class="text-center">
            <a href="{{url('auth/register-basic')}}">
              <span>Skip</span>
            </a>
          </p>
      </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

@endsection
