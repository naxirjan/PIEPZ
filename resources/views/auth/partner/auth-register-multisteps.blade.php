<meta name="csrf-token" content="{{ csrf_token() }}">
@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Multi Steps Sign-up')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth-multisteps.js')}}"></script>
<script src="{{asset('assets/js/toaster.js')}}"></script>
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover authentication-bg">
  <div class="authentication-inner row">



    <!--  Multi Steps Registration -->
    <div class="d-flex col-lg-12 align-items-center justify-content-center p-sm-5 p-3">
      <div class="w-px-700">
        <div id="multiStepsValidation" class="bs-stepper shadow-none">
          <div class="bs-stepper-header border-bottom-0">
            <div class="step" data-target="#accountDetailsValidation">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-circle"><i class="ti ti-smart-home ti-sm"></i></span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Account</span>
                  <span class="bs-stepper-subtitle">Account Details</span>
                </span>
              </button>
            </div>

          </div>
          <div class="bs-stepper-content">
            <form id="multiStepsForm" onSubmit="return false" method="POST">
              @csrf
              <!-- Account Details -->
                 <!-- Account Details -->
                 <div id="accountDetailsValidation" class="content">
                        <div class="content-header mb-4">
                           <h4 class="fw-bold py-3 mb-4">Company Details</h4>
                        </div>
                        <div class="row g-3">

                           <div class="col-sm-6">
                              <label class="form-label" for="companyName">Company Name <span class="text-warning">*Required</span></label>
                              <input type="text" name="companyName" id="companyName" class="form-control" />
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="multiStepsURL">Website Link</label>
                              <input type="text" name="websiteLink" id="websiteLink" class="form-control" placeholder="https://piepz.com" aria-label="johndoe" />
                           </div>
                           <div class="content-header mb-1">
                              <h4 class="fw-bold py-3 mb-4"> Account Details</h4>
                           </div>
                           @if(!Auth::check())
                              <div class="col-sm-6">
                              <label class="form-label" for="firstName">First Name<span class="text-warning">*Required</span></label>
                              <input type="text" name="firstName" id="firstName" class="form-control" placeholder="john" />
                              </div>
                              <div class="col-sm-6">
                              <label class="form-label" for="lastName">Last Name<span class="text-warning">*Required</span></label>
                              <input type="text" name="lastName" id="lastName" class="form-control" placeholder="doe" />
                              </div>
                              @else
                              <div class="col-sm-6">
                              <label class="form-label" for="firstName">First Name<span class="text-warning">*Required</span></label>
                              <input type="text" name="firstName" value="{{auth::user()->first_name}}" id="firstName" class="form-control" placeholder="john" / readonly>
                              </div>
                              <div class="col-sm-6">
                              <label class="form-label" for="lastName">Last Name<span class="text-warning">*Required</span></label>
                              <input type="text" name="lastName" value="{{auth::user()->last_name}}" id="lastName" class="form-control" placeholder="doe" / readonly>
                              </div>
                              @endif
                           <div class="col-md-12">
                              <label class="form-label" for="address">Street/Address <span class="text-warning">*Required</span></label>
                              <input type="text" name="address" id="address" class="form-control" placeholder="address" aria-label="address" />
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="zip">Zip Code <span class="text-warning">*Required</span></label>
                              <input type="text" name="zip" id="zip" class="form-control" />
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="phone">Phone</label>
                              <input type="text" name="phone" id="phone" class="form-control" placeholder="+123 456" aria-label="12345" />
                           </div>

                           <div class="col-md-12">
                              <label class="form-label" for="country">Country</label>
                              <input type="text" name="country" id="country" class="form-control" placeholder="country" aria-label="country" />
                           </div>
                           <div class="content-header mb-1">
                              <h4 class="fw-bold py-3 mb-4">Login Details</h4>
                           </div>
                           @if(!Auth::check())
                           <div class="col-sm-6">
                           <label class="form-label" for="email">Email<span class="text-warning">*Required</span></label>
                           <input type="email" name="email" id="email" class="form-control txtEmail" placeholder="john@gmail.com" />
                           </div>
                           <div class="col-sm-6">
                           <label class="form-label" for="password">Password<span class="text-warning">*Required</span></label>
                           <input type="password" name="password" id="password" class="form-control" placeholder="*" aria-label="*" />
                           </div>
                           @else
                           <div class="col-sm-6">
                           <label class="form-label" for="email">Email<span class="text-warning">*Required</span></label>
                           <input type="email" name="email" id="email" value="{{auth::user()->email}}" class="form-control txtEmail" placeholder="john@gmail.com"  readonly/>
                           </div>
                           <div class="col-sm-6">
                           <label class="form-label" for="password">Password<span class="text-warning">*Required</span></label>
                           <input type="password" name="password" value="{{auth::user()->password}}" id="password" class="form-control" placeholder="*" aria-label="*" / readonly>
                           </div>

                           @endif
                           <div class="col-sm-6">

                              <label class="form-label tool" data-tip="Business registration number at Chamber of Commerce" for="cocnumber">C.O.C Number <i class="fa fa-info-circle" aria-hidden="true"></i></span><span class="text-warning"> *Required </label>
                              <input type="text" name="cocnumber" id="cocnumber" class="form-control" placeholder="9545" />
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label tool" data-tip="TAX number for TAX Authorities" for="taxnumber">Tax Number <i class="fa fa-info-circle" aria-hidden="true"></i><span class="text-warning">*Required</span></label>
                              <input type="text" name="taxnumber" id="taxnumber" class="form-control" placeholder="1234" aria-label="1234" />
                           </div>
                           <div class="col-12 d-flex justify-content-between mt-4">
                              <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button type="submit" class="btn btn-success btn-next btn-submit">Submit</button>
                           </div>
                        </div>
                     </div>
                     <!-- Account Details -->

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- / Multi Steps Registration -->
  </div>
</div>
	<!-- jQuery -->
	<script src="{{asset('assets/js/ajax_jquery.min.js')}}"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/toastr.min.css')}}">
	<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script>
  // Check selected custom option
  window.Helpers.initCustomOptionCheck();

</script>
@endsection
