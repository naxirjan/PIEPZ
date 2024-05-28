@php
$customizerHidden = 'customizer-hide';
$bIsActive = true;
$iRoleId = 0;
if(Auth::check()){
   $iRoleId = Auth::user()->role_id;

   if($iRoleId == 1){
       if(Auth::user()->status == 1){
           header("Location: " . URL::to('admin/dashboard'), true, 302);
           exit();
       }
       else $bIsActive = false;
   }
   else if($iRoleId == 2){
        if(Auth::user()->status == 1){
            header("Location: " . URL::to('vendor/analytics'), true, 302);
            exit();
        }
         else $bIsActive = false;
   }
   else if($iRoleId == 3){
        if(Auth::user()->status == 1){
            header("Location: " . URL::to('partner/analytics'), true, 302);
            exit();
        }
         else $bIsActive = false;
   }
}
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login')

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
  <div class="authentication-wrapper authentication-basic container">
      <!-- Login -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <img src="{{asset('assets/img/logo/logo.jpg')}}" height="80px">
              <span class="app-brand-text demo text-body fw-bold ms-1">All In One Migration Supplies</span>
            </a>
          </div>
          <!-- /Logo -->
            @if(session('success')) <br /><div class="alert alert-danger justify-content-center" role="alert"> {{session('success')}} </div> @endif
            @if(session('message')) <br /><div class="alert alert-success justify-content-center" role="alert"> {{session('message')}} </div> @endif

          @if(!Auth::check())
            <form id="formAuthentication" class="mb-3" action="{{ route('auth-login-post') }}" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus>
                  @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
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
                    <label class="form-check-label" for="remember-me" style="float: right;">
                      <a href="{{url('auth/forgot-password-basic')}}">
                        <b>Forgot Password?</b>
                      </a>
                    </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>
            <div class="divider">
              <div class="divider-text">or</div>
              <p>New to our platform? Create an account</p>
              <div class="d-flex justify-content-center">
                <a href="https://www.facebook.com/people/Piepzcom/100089846934182/?sk=about" class="btn btn-icon btn-label-facebook me-2">
                  <i class="tf-icons fa-brands fa-facebook-f fs-3"></i>
                </a>
                <a href="https://www.linkedin.com/company/piepz-com" class="btn btn-icon btn-label-google-plus me-2">
                  <i class="tf-icons fa-brands fa-linkedin fs-3"></i>
                </a>
                <a href="https://www.instagram.com/piepzcom/" class="btn btn-icon btn-label-instagram me-2">
                  <i class="tf-icons fa-brands fa-instagram fs-3"></i>
                </a>
                <a href="{{ url('auth/google') }}">
                  <img src="https://i.stack.imgur.com/tEXrz.png" style="height: 40px">
                </a>
              </div>
            </div>
          @else
          <div class="divider">
              @if($iRoleId <= 0 && $bIsActive)
                <p>Please select role</p>
                <div class="d-flex justify-content-center">
                  <a class="btn btn-info  d-grid " href="{{route('vendor.register')}}" style="margin:1px;">Sign Up Manufecturer and Brand</a>
                  <a class="btn btn-info  d-grid " href="{{route('partner')}}" style="margin:1px;">Sign Up Dropshipping wholesale</a>
                </div>
                <br>
              @elseif(session('success') == "")
            <div class="alert alert-danger" role="alert"> Sorry, your account is currently inactive, please call an administrator !...</div>
            @endif
          </div>
          @endif
        </div>
      </div>
  </div>
</div>
@endsection
