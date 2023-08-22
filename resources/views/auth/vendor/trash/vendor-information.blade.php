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
    max-width: 800px !important;
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
              <span class="app-brand-text demo text-body fw-bold ms-1">Vendor Information</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1 pt-2">Company details</h4>
         
          <form id="formAuthentication" class="mb-3" action="{{route('add.vendor.information')}}" method="POST">
          @csrf
            <!-- card start here -->
              <!-- Multi Column with Form Separator -->

          <div class="mb-3">
            <label class="form-label" for="company_name">Company  Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Placeholder" />
            @error('company_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label" for="website_url">Website URL</label>
            <input type="text" class="form-control" id="website_url" name="website_url" placeholder="Placeholder" />
            @error('website_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
          </div>

          <hr class="my-4 mx-n4" />
    <div class="row g-3">
    <h4 class="mb-1 pt-2">Personal details</h4>   
    <div class="col-md-6 mb-3">
        <label class="form-label" for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Placeholder" />
        @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror

      </div>

      
      <div class="col-md-6 mb-3">
        <label class="form-label" for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Placeholder" />
        @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
      </div>
    

    </div>

          <div class="mb-3">
            <label class="form-label" for="address">StreetName and Number</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Placeholder" />
            @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label" for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Placeholder" />
            @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" placeholder="Placeholder" />
            @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
             @enderror
          </div>
          
    
    <hr class="my-4 mx-n4" />
    <h4 class="mb-1 pt-2">Login details</h4>   
    <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Placeholder" />
            @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
          </div>

          <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Placeholder" />
          </div>
   
    <div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="coc_number">C.O.C Number</label>
        <input type="text" id="coc_number" name="coc_number" class="form-control" placeholder="Placeholder" />
        @error('coc_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Tax Number</label>
        <input type="text" id="tax_number" name="tax_number" class="form-control" placeholder="Placeholder" />
        @error('tax_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
      </div>
    
    </div>

    
   

            <!-- card end here -->
<br>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Next</button>
            </div>
          </form>

          <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{url('auth/register-basic')}}">
              <span>Create an account</span>
            </a>
          </p>

          <div class="divider my-4">
            <div class="divider-text">or</div>
          </div>
          <div class="d-flex justify-content-center">
          <button class="btn btn-primary d-grid w-100" type="submit" style="margin: 1px;">Save</button>
           

           
          </div>
          <br>
          <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
              <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
            </a>

            <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
              <i class="tf-icons fa-brands fa-google fs-5"></i>
            </a>

            <a href="javascript:;" class="btn btn-icon btn-label-twitter">
              <i class="tf-icons fa-brands fa-twitter fs-5"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection
