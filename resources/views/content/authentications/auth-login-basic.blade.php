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
              <span class="app-brand-text demo text-body fw-bold ms-1">All In One Migration Supplies</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1 pt-2">Welcome to Piepz 👋</h4>
            @if(session('success'))
                <div class="alert alert-danger" role="alert">
                    {{session('success')}}
                </div>
            @endif
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif

          <form id="formAuthentication" class="mb-3" action="{{ route('auth-login-post') }}" method="POST">
          @csrf
          <div class="mb-3">
              <label for="email" class="form-label">Email or Username</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus>
              @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="{{url('auth/forgot-password-basic')}}">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />

                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>



          <div class="divider my-4">
            <div class="divider-text">or</div>
          </div>
          <div class="d-flex justify-content-center">
           <a class="btn btn-primary  d-grid w-100" href="{{route('vendor.register')}}" style="margin:1px;">Sign Up Manufecturer and Brand</a>
           <a class="btn btn-primary  d-grid w-100" href="{{route('partner')}}" style="margin:1px;">Sign Up Dropshipping wholesale</a>



          </div>
          <br>
          <div class="d-flex justify-content-center">
            <a href="https://www.facebook.com/people/Piepzcom/100089846934182/?sk=about" class="btn btn-icon btn-label-facebook me-3">
              <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
            </a>

            <a href="https://www.linkedin.com/company/piepz-com" class="btn btn-icon btn-label-google-plus me-3">
              <i class="tf-icons fa-brands fa-linkedin fs-5"></i>
            </a>

            <a href="https://www.instagram.com/piepzcom/" class="btn btn-icon btn-label-instagram">
              <i class="tf-icons fa-brands fa-instagram fs-5"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection
