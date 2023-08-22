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
    max-width: 90% !important;
 }
</style>
@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
      <div class="card">
        <div class="card-body">


                <!-- Pricing Plans -->
  <div class="pb-sm-5 pb-2 rounded-top">
    <div class="container py-5">
      <h2 class="text-center mb-2 mt-0 mt-md-4">SELECT YOUR PACKAGE</h2>
      <p class="text-center"> Get started with us - it's perfect for individuals and teams. Choose a subscription plan that meets your needs. </p>
      <!-- <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pb-5 pt-3 mb-0 mb-md-4">
        <label class="switch switch-primary ms-3 ms-sm-0 mt-2">
          <span class="switch-label">Monthly</span>
          <input type="checkbox" class="switch-input price-duration-toggler" checked />
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
          <span class="switch-label">Annual</span>
        </label>
        <div class="mt-n5 ms-n5 d-none d-sm-block">
          <i class="ti ti-corner-left-down ti-sm text-muted me-1 scaleX-n1-rtl"></i>
          <span class="badge badge-sm bg-label-primary">Save up to 10%</span>
        </div>
      </div> -->

      <div class="row mx-0 gy-3 px-lg-5">
        <!-- Basic -->

          @foreach($package as $pack)
          <div class="col-lg-4 mb-md-0 mb-4">
            <div class="card border rounded shadow-none">
              <div class="card-body">
                <h3 class="card-title fw-semibold text-center text-capitalize mb-1">{{$pack->package_title}}</h3>
                <p class="text-center">Registration Fees ${{$pack->package_price}}</p>
                <div class="text-center">


                </div>

                <ul class="ps-3 my-4 pt-2">
                {!!$pack->package_description!!}
                </ul>


<form action="{{ url('auth/partner-addons') }}" method="get">
  @csrf
  <input type="hidden" name="package_id" id="" value="{{$pack->id}}">
  <input type="hidden" name="user_id" id="" value="{{$user_id}}">
  <button class="btn btn-primary d-grid w-100" type="submit" style="margin: 1px;">Select Package</button>


             @php
             $i=1;

             $myString = $pack->durations;
              $codes = explode(',', $myString);
              $myString1 = $pack->duration_price;
              $names = explode(',', $myString1);
              @endphp


              @foreach( $codes as $index => $code )


                <div class="col-md mb-md-0 mb-2">
                  <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                    <label class="form-check-label custom-option-content" for="{{$names[$index].$pack->id}}" style="padding:0px;">
                      <span class="custom-option-body">

                        <span class="custom-option-title">${{$names[$index]}}</span>

                        <small> {{$code}}</small>

                      </span>
                      <input name="package_duration" class="form-check-input" type="radio" value="{{$code}}" id="{{$names[$index].$pack->id}}"  />

                    </label>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            </form>

          </div>
          @endforeach




      </div>
      <br>
      <div class="row mx-0 gy-3 px-lg-5">
              <!-- Enterprise -->
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="card border rounded shadow-none">
            <div class="card-body">


              <h3 class="card-title text-center text-capitalize fw-semibold mb-1">Start For Free</h3>



              <ul class="ps-3 my-4 pt-2">
                <li class="mb-2">TBD max Revenue</li>
                <li class="mb-2">TBD SKUs</li>
                <li class="mb-2">TBD Dealers</li>
               </ul>

              <a href="{{url('auth/register-basic')}}" class="btn btn-label-primary d-grid w-100">Registration Fees $50</a>

            </div>
          </div>
        </div>
        <div class="col-lg-2"></div>

      </div>


    </div>
  </div>
  <!--/ Pricing Plans -->
          <button class="btn btn-primary d-grid w-100" type="submit" style="margin: 1px;">Next</button>


        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection
