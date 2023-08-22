@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Pricing - Pages')

<!-- Page -->
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-pricing.css')}}" />
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-pricing.js')}}"></script>
@endsection

@section('content')
<div class="card">
  <!-- Pricing Plans -->
  <div class="pb-sm-5 pb-2 rounded-top">
    <div class="container py-5">
      <h2 class="text-center mb-2 mt-0 mt-md-4">Pricing Plans</h2>
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
        <div class="col-lg mb-md-0 mb-4">
          <div class="card border rounded shadow-none">
            <div class="card-body">
              <div class="my-3 pt-2 text-center">
                <img src="https://www.platinumathleticcollections.com/wp-content/uploads/2020/06/silverimg.png" alt="Basic Image" height="140">
              </div>
              <h3 class="card-title fw-semibold text-center text-capitalize mb-1">Start</h3>
              <p class="text-center">Registration Fees $50</p>
              <div class="text-center">
             

              </div>

              <ul class="ps-3 my-4 pt-2">
                <li class="mb-2">Max 15k Revenue</li>
                <li class="mb-2">Max 25k SKUs</li>
                <li class="mb-2">15 dealers</li>
                <li class="mb-2">Automate own dealers (max 25) </li>
                <li class="mb-0">onboarding </li>
                <li class="mb-0">Support</li>
              </ul>

              <a href="{{url('auth/register-basic')}}" class="btn btn-label-success d-grid w-100">Your Current Plan</a>
              <br>
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                  <label class="form-check-label custom-option-content" for="customRadioIcon1" style="padding:0px;">
                    <span class="custom-option-body">
                      <span class="custom-option-title">200</span>
                      <small> 1 month</small>
                    </span>
                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                  </label>
                </div>
              </div>
            <div class="col-md mb-md-0 mb-2">
              <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                <label class="form-check-label custom-option-content" for="customRadioIcon2" style="padding:0px;">
                  <span class="custom-option-body">
                    <span class="custom-option-title"> 500 </span>
                    <small> 6 month </small>
                  </span>
                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon2" />
                </label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                <label class="form-check-label custom-option-content" for="customRadioIcon3" style="padding:0px;">
                  <span class="custom-option-body">
                    <span class="custom-option-title"> 900 </span>
                    <small>12 month</small>
                  </span>
                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon3" />
                </label>
              </div>
            </div>
            </div>
          </div>
        </div>

        <!-- Pro -->
        <div class="col-lg mb-md-0 mb-4">
          <div class="card border-primary border shadow-none">
            <div class="card-body position-relative">
              <div class="position-absolute end-0 me-4 top-0 mt-4">
                <span class="badge bg-label-primary">Best Offer</span>
              </div>
              <div class="my-3 pt-2 text-center">
                <img src="https://www.platinumathleticcollections.com/wp-content/uploads/2020/06/platanuim.png" alt="Standard Image" height="140">
              </div>
              <h3 class="card-title fw-semibold text-center text-capitalize mb-1">Optimal</h3>
              <p class="text-center">Registration Fees $50</p>
            

              <ul class="ps-3 my-4 pt-2">
                <li class="mb-2">Max 25k Revenue</li>
                <li class="mb-2">Max 5000 SKUs</li>
                <li class="mb-2">30 dealers</li>
                <li class="mb-2">Automate own dealers (max 75) </li>
                <li class="mb-0">onboarding </li>
                <li class="mb-0">Support</li>
                <li class="mb-0">Open Api</li>
              </ul>


              <a href="{{url('auth/register-basic')}}" class="btn btn-primary d-grid w-100">Upgrade</a>
              <br>
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                  <label class="form-check-label custom-option-content" for="customRadioIcon1" style="padding:0px;">
                    <span class="custom-option-body">
                      <span class="custom-option-title">200</span>
                      <small> 1 month</small>
                    </span>
                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                  </label>
                </div>
              </div>
            <div class="col-md mb-md-0 mb-2">
              <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                <label class="form-check-label custom-option-content" for="customRadioIcon2" style="padding:0px;">
                  <span class="custom-option-body">
                    <span class="custom-option-title"> 500 </span>
                    <small> 6 month </small>
                  </span>
                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon2" />
                </label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                <label class="form-check-label custom-option-content" for="customRadioIcon3" style="padding:0px;">
                  <span class="custom-option-body">
                    <span class="custom-option-title"> 900 </span>
                    <small>12 month</small>
                  </span>
                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon3" />
                </label>
              </div>
            </div>
            </div>
          </div>
        </div>

        <!-- Enterprise -->
        <div class="col-lg">
          <div class="card border rounded shadow-none">
            <div class="card-body">

              <div class="my-3 pt-2 text-center">
                <img src="https://www.platinumathleticcollections.com/wp-content/uploads/2020/06/gold.png" alt="Enterprise Image" height="140">
              </div>
              <h3 class="card-title text-center text-capitalize fw-semibold mb-1">Platinum</h3>
              <p class="text-center">Solution for big organizations</p>

            
              <ul class="ps-3 my-4 pt-2">
                <li class="mb-2">Max 35k Revenue</li>
                <li class="mb-2">Max 15000 SKUs</li>
                <li class="mb-2">50 dealers</li>
                <li class="mb-2">Automate own dealers (max 150) </li>
                <li class="mb-0">onboarding </li>
                <li class="mb-0">Support</li>
                <li class="mb-0">Open Api</li>
              </ul>

              <a href="{{url('auth/register-basic')}}" class="btn btn-label-primary d-grid w-100">Upgrade</a>
              <br>
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                  <label class="form-check-label custom-option-content" for="customRadioIcon1" style="padding:0px;">
                    <span class="custom-option-body">
                      <span class="custom-option-title">200</span>
                      <small> 1 month</small>
                    </span>
                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                  </label>
                </div>
              </div>
            <div class="col-md mb-md-0 mb-2">
              <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                <label class="form-check-label custom-option-content" for="customRadioIcon2" style="padding:0px;">
                  <span class="custom-option-body">
                    <span class="custom-option-title"> 500 </span>
                    <small> 6 month </small>
                  </span>
                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon2" />
                </label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                <label class="form-check-label custom-option-content" for="customRadioIcon3" style="padding:0px;">
                  <span class="custom-option-body">
                    <span class="custom-option-title"> 900 </span>
                    <small>12 month</small>
                  </span>
                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon3" />
                </label>
              </div>
            </div>
            </div>
          </div>
        </div>

      </div>
      <br>
      <div class="row mx-0 gy-3 px-lg-5">
              <!-- Enterprise -->
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="card border rounded shadow-none">
            <div class="card-body">

           
              <h3 class="card-title text-center text-capitalize fw-semibold mb-1">Enterprise</h3>
              <p class="text-center">Registration Fees $50</p>

             

              <ul class="ps-3 my-4 pt-2">
                <li class="mb-2">TBD max Revenue</li>
                <li class="mb-2">TBD SKUs</li>
                <li class="mb-2">TBD Dealers</li>
                <li class="mb-2">Automate own dealers TBD</li>
                <li class="mb-0">onboarding</li>
                <li class="mb-0">Support</li>
                <li class="mb-0">Open API</li>
                <li class="mb-0">Automate Payments</li>
              </ul>

              <a href="{{url('auth/register-basic')}}" class="btn btn-label-primary d-grid w-100">Upgrade</a>
               <br>
               <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                  <label class="form-check-label custom-option-content" for="customRadioIcon1" style="padding:0px;">
                    <span class="custom-option-body">
                      <span class="custom-option-title">200</span>
                      <small> 1 month</small>
                    </span>
                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                  </label>
                </div>
              </div>
            <div class="col-md mb-md-0 mb-2">
              <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                <label class="form-check-label custom-option-content" for="customRadioIcon2" style="padding:0px;">
                  <span class="custom-option-body">
                    <span class="custom-option-title"> 500 </span>
                    <small> 6 month </small>
                  </span>
                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon2" />
                </label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                <label class="form-check-label custom-option-content" for="customRadioIcon3" style="padding:0px;">
                  <span class="custom-option-body">
                    <span class="custom-option-title"> 900 </span>
                    <small>12 month</small>
                  </span>
                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon3" />
                </label>
              </div>
            </div> 
            </div>
          </div>
        </div>
        <div class="col-lg-2"></div>

      </div>


    </div>
  </div>
  <!--/ Pricing Plans -->

  
</div>
@endsection
