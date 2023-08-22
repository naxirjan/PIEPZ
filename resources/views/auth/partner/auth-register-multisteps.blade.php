<head>
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
$package = App\Models\Package::whereNot("package_title","Free")->get();
$addons = App\Models\PurchasePackageAddon::get();
$marketplaces = App\Models\PurchasePackageMarketplace::get();
$functionalities = App\Models\PurchasePackageFunctionality::get();
@endphp
@extends('layouts/layoutMaster')
@section('title', 'Multi Steps Sign-up - Pages')
@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
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
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
@endsection
@section('page-script')
<script src="{{asset('assets/js/pages-auth-multisteps.js')}}"></script>
@endsection
@section('content')
<div class="authentication-wrapper authentication-cover authentication-bg">
   <div class="authentication-inner row">
      <div class="d-flex col-lg-2 align-items-center p-3"></div>
      <!--  Multi Steps Registration -->
      <div class="col-lg-8 align-items-center p-3">

            <div id="multiStepsValidation" class="bs-stepper shadow-none">
               <div class="bs-stepper-header border-bottom-0">
                  <div class="step" data-target="#accountDetailsValidation">
                     <button type="button" class="step-trigger">
                     <span class="bs-stepper-circle"><i class="ti ti-smart-home ti-sm"></i></span>
                     <span class="bs-stepper-label">
                     <span class="bs-stepper-title">Account</span>
                     <span class="bs-stepper-subtitle">Step 1</span>
                     </span>
                     </button>
                  </div>
                  <div class="line">
                     <i class="ti ti-chevron-right"></i>
                  </div>
                  <div class="step" data-target="#package">
                     <button type="button" class="step-trigger">
                     <span class="bs-stepper-circle"><i class="ti ti-smart-home ti-sm"></i></span>
                     <span class="bs-stepper-label">
                     <span class="bs-stepper-title">Package</span>
                     <span class="bs-stepper-subtitle">Step 2</span>
                     </span>
                     </button>
                  </div>
                  <div class="line">
                     <i class="ti ti-chevron-right"></i>
                  </div>
                  <div class="step" data-target="#personalInfoValidation">
                     <button type="button" class="step-trigger">
                     <span class="bs-stepper-circle"><i class="ti ti-users ti-sm"></i></span>
                     <span class="bs-stepper-label">
                     <span class="bs-stepper-title">Addons</span>
                     <span class="bs-stepper-subtitle">Step 3</span>
                     </span>
                     </button>
                  </div>
                  <div class="line">
                     <i class="ti ti-chevron-right"></i>
                  </div>
                  <div class="step" data-target="#billingLinksValidation">
                     <button type="button" class="step-trigger">
                     <span class="bs-stepper-circle"><i class="ti ti-file-text ti-sm"></i></span>
                     <span class="bs-stepper-label">
                     <span class="bs-stepper-title">Billing</span>
                     <span class="bs-stepper-subtitle">Step 4</span>
                     </span>
                     </button>
                  </div>
               </div>
               <div class="bs-stepper-content">
                  <form id="multiStepsForm" onSubmit="return false" method="POST">
                     <!-- Account Details -->
                     <div id="accountDetailsValidation" class="content">
                        <div class="content-header mb-4">
                           <p>Enter Your Company Details</p>
                        </div>
                        <div class="row g-3">

                           <div class="col-sm-6">
                              <label class="form-label" for="companyName">Company Name</label>
                              <input type="text" name="companyName" id="companyName" class="form-control" />
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="multiStepsURL">Website Link</label>
                              <input type="text" name="websiteLink" id="websiteLink" class="form-control" placeholder="https://piepz.com" aria-label="johndoe" />
                           </div>
                           <div class="content-header mb-1">
                              <p>Enter Your Account Details</p>
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="firstName">First Name</label>
                              <input type="text" name="firstName" id="firstName" class="form-control" placeholder="john" />
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="lastName">Last Name</label>
                              <input type="text" name="lastName" id="lastName" class="form-control" placeholder="doe" />
                           </div>
                           <div class="col-md-12">
                              <label class="form-label" for="address">Street/Address</label>
                              <input type="text" name="address" id="address" class="form-control" placeholder="address" aria-label="address" />
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="zip">Zip Code</label>
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
                              <p>Enter Your Account Login Details</p>
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="email">Email</label>
                              <input type="email" name="email" id="email" class="form-control" placeholder="john@gmail.com" />
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="password">Password</label>
                              <input type="password" name="password" id="password" class="form-control" placeholder="***" aria-label="***" />
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="cocnumber">C.O.C Number</label>
                              <input type="text" name="cocnumber" id="cocnumber" class="form-control" placeholder="9545" />
                           </div>
                           <div class="col-sm-6">
                              <label class="form-label" for="taxnumber">Tax Number</label>
                              <input type="text" name="taxnumber" id="taxnumber" class="form-control" placeholder="1234" aria-label="1234" />
                           </div>
                           <div class="col-12 d-flex justify-content-between mt-4">
                              <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                           </div>
                        </div>
                     </div>
                     <!-- Account Details -->
                     <div id="package" class="content">
                        <div class="content-header mb-4">
                           <div class="d-flex justify-content-between">
                              <div>
                                 <span> Select Your Package</span>
                              </div>
                              <div>
                                 <span class="btn btn-primary d-grid w-100" id="1" onClick="reply_click(this.id)">Start For Free


                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="row g-3">
                           <!-- package start -->
                           @foreach($package as $pack)
                           <div class="col-lg-4 mb-md-0 mb-4">
                              <div class="card border rounded shadow-none">
                                 <div class="card-body">
                                    <h3 class="card-title fw-semibold text-center text-capitalize mb-1">{{$pack->package_title}}</h3>
                                    <p class="text-center">Package Fees ${{$pack->package_price}}</p>
                                    <p class="text-center">Registration Fees $50</p>
                                    <div class="text-center">
                                    </div>
                                    <ul class="ps-3 my-4 pt-2">
                                       {!!$pack->package_description!!}
                                    </ul>
                                    <span class="btn btn-primary d-grid w-100 ps-3 my-4 pt-2" >Select Package</span>
                                    @php
                                    $i=1;
                                    $myString = $pack->durations;
                                    $codes = explode(',', $myString);
                                    $myString1 = $pack->duration_price;
                                    $names = explode(',', $myString1);
                                    @endphp
                                    @foreach( $codes as $index => $code )
                                    <div class="col-md mb-md-0 ps-2 my-2 pt-1">
                                       <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                                          <label class="form-check-label custom-option-content" for="{{$names[$index].$pack->id}}" style="padding:0px;">
                                          <span class="custom-option-body">
                                          <span class="custom-option-title">${{$names[$index]}}</span>
                                          <small> {{$code}}</small>
                                          </span>
                                          <input name="package_duration"   class="form-check-input package_duration" type="radio" value="{{ $code.','.$names[$index].','.$pack->id.','.$pack->package_price }}" id="{{$names[$index].$pack->id}}"  />
                                          </label>
                                       </div>
                                    </div>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           <!-- package end -->
                        </div>
                        <div class="row g-3">
                           <div class="col-sm-2"></div>
                           <div class="col-sm-8">
                              <div class="form-check custom-option custom-option-icon">
                                 <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                    <span class="custom-option-body">
                                       <i class="ti ti-rocket"></i>
                                       <span class="custom-option-title">Start For Free</span>
                                       <ul class="ps-3 my-4 pt-2">
                                          <li class="mb-2">TBD max Revenue</li>
                                          <li class="mb-2">TBD SKUs</li>
                                          <li class="mb-2">TBD Dealers</li>
                                       </ul>
                                    </span>
                                    <input name="package_duration" class="form-check-input" type="radio" value="" id="customRadioIcon1"  />
                                 </label>
                              </div>
                           </div>
                           <div class="col-sm-2"></div>
                        </div>
                        <div class="row g-3">
                           <div class="col-12 d-flex justify-content-between mt-4">
                              <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                           </div>
                        </div>
                     </div>
                     <!-- Personal Info -->
                     <div id="personalInfoValidation" class="content">
                        <div class="content-header mb-4">
                           <p>SELECT ADDONS FOR MORE CUSTOMIZE PACKAGE</p>
                        </div>
                        <!-- package addons   -->
                        <h4 class="fw-bold py-3 mb-4">
                           Package Addons
                        </h4>
                        <div class="row row-bordered g-0">
                           @foreach($addons as $addon)
                           <div class="col-sm-4 p-4">
                              <div class="text-light small fw-semibold mb-3">{{$addon->title}}</div>
                              <label class="switch switch-square  switch-success">
                              <span class="switch-label">No</span>
                              <input type="checkbox" name="addons[]" value="{{$addon->id}}" class="switch-input checkbox" data-price="{{$addon->price}}"/>
                              <span class="switch-toggle-slider">
                              <span class="switch-on"><i class="ti ti-check"></i></span>
                              <span class="switch-off"><i class="ti ti-x"></i></span>
                              </span>
                              <span class="switch-label">Yes - ${{$addon->price}}</span>
                              </label>
                           </div>
                           @endforeach
                        </div>
                        <!-- package addons close -->
                        <!-- start market places -->
                        <h4 class="fw-bold py-3 mb-4">
                           Marketplace and eCommerce Connection Software
                        </h4>
                        <div class="row mb-3">
                           @foreach($marketplaces as $marketplace)
                           <div class="col-md-4 mb-md-0 mb-2">
                              <div class="form-check custom-option custom-option-basic">
                                 <label class="form-check-label custom-option-content" for="marketplace.{{ $marketplace->id}}">
                                 <input class="form-check-input checkbox" name="marketplaces[]" type="checkbox" value="{{$marketplace->id}}" id="marketplace.{{ $marketplace->id}}"  data-price="{{ $marketplace->price }}"/>
                                 <span class="custom-option-header">
                                 <span class="h6 mb-0">{{$marketplace->title}}</span>
                                 <span class="text-muted">${{$marketplace->price}}</span>
                                 </span>
                                 <span class="custom-option-body">
                                 <small class="option-text">{{$marketplace->type}}</small>
                                 </span>
                                 </label>
                              </div>
                           </div>
                           @endforeach
                        </div>
                        <!-- market places end -->
                        <!-- start functionalities -->
                        <h4 class="fw-bold py-3 mb-4">
                           Extra Features
                        </h4>
                        <div class="row mb-3">
                           @foreach($functionalities as $func)
                           <div class="col-md-4 mb-md-0 mb-2">
                              <div class="form-check custom-option custom-option-basic">
                                 <label class="form-check-label custom-option-content" for="function.{{ $func->id}}">
                                 <input class="form-check-input checkbox" name="functionalities[]" type="checkbox" value="{{ $func->id}}" id="function.{{ $func->id}}" data-price="{{$func->price}}" />
                                 <span class="custom-option-header">
                                 <span class="h6 mb-0">{{$func->title}}</span>
                                 <span class="text-muted">${{$func->price}}</span>
                                 </span>
                                 <span class="custom-option-body">
                                 <small class="option-text">{{$func->type}}</small>
                                 </span>
                                 </label>
                              </div>
                           </div>
                           @endforeach
                        </div>
                        <!-- functionalities end -->
                        <!-- start webshop -->
                        <h4 class="fw-bold py-3 mb-4">
                           All in eCommerce webshop
                        </h4>
                        <div class="row mb-3">
                           <div class="col-md">
                              <div class="form-check custom-option custom-option-basic">
                                 <label class="form-check-label custom-option-content" for="customCheckTemp4">
                                 <input class="form-check-input checkbox" name="webshops[]" type="checkbox"  id="customCheckTemp4" value="399"/ data-price="399">
                                 <span class="custom-option-header">
                                 <span class="h6 mb-0">Shopify All in One</span>
                                 <span class="text-muted">$399</span>
                                 </span>
                                 <span class="custom-option-body">
                                 <small>Ecommerce Webshop</small>
                                 </span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md">
                              <label for="selectpickerBasic1" class="form-label">Shopify Theme</label>
                              <select id="selectpickerBasic1" name="webshops[]" class="selectpicker w-100" data-style="btn-default">
                                 <option value="rocky">Rocky</option>
                                 <option value="pupl">Pulp Fiction</option>
                                 <option value="godfather">The Godfather</option>
                              </select>
                           </div>
                           <div class="col-md">
                              <label for="selectpickerBasic2" class="form-label">Product Branche</label>
                              <select id="selectpickerBasic2" name="webshops[]" class="selectpicker w-100" data-style="btn-default">
                                 <option value="1">First</option>
                                 <option value="2">Second</option>
                                 <option value="3">Third</option>
                              </select>
                           </div>
                        </div>
                        <!-- webshop end -->
                        <div class="row g-3">
                           <div class="col-12 d-flex justify-content-between mt-4">
                              <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                           </div>
                        </div>
                     </div>
                     <!-- Billing Links -->
                     <div id="billingLinksValidation" class="content">
                        <div class="content-header">
                           <h3 class="mb-1">Select Plan</h3>
                           <p>Select plan as per your requirement</p>
                        </div>
                        <!-- Custom plan options -->
                        <!--/ Custom plan options -->
                        <div class="content-header mb-4">
                           <h3 class="mb-1">Payment Information</h3>
                           <p>Enter your card information</p>
                        </div>
                        <!-- Custom Svg Icon Radios -->

                              <div class="row">
                                 <div class="col-sm-2">
                                    <div class="form-check custom-option custom-option-icon">
                                       <label class="form-check-label custom-option-content" for="customRadioSvg1">
                                       <span class="custom-option-body">
                                       <i class="ti ti-credit-card ti-sm"></i>
                                       <span class="custom-option-title"> Credit Card </span>
                                       </span>
                                       <input name="customRadioSvg" class="form-check-input" type="radio" value="" id="customRadioSvg1" />
                                       </label>
                                    </div>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check custom-option custom-option-icon">
                                       <label class="form-check-label custom-option-content" for="customRadioSvg2">
                                       <span class="custom-option-body">
                                       <i class="ti ti-brand-paypal ti-sm"></i>
                                       <span class="custom-option-title"> Ideal </span>
                                       </span>
                                       <input name="customRadioSvg" class="form-check-input" type="radio" value="" id="customRadioSvg2" />
                                       </label>
                                    </div>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check custom-option custom-option-icon">
                                       <label class="form-check-label custom-option-content" for="customRadioSvg3">
                                       <span class="custom-option-body">
                                       <i class="ti ti-credit-card ti-sm"></i>
                                       <span class="custom-option-title"> Bancontact </span>
                                       </span>
                                       <input name="customRadioSvg" class="form-check-input" type="radio" value="" id="customRadioSvg3" />
                                       </label>
                                    </div>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check custom-option custom-option-icon">
                                       <label class="form-check-label custom-option-content" for="customRadioSvg4">
                                       <span class="custom-option-body">
                                       <i class="ti ti-brand-paypal ti-sm"></i>
                                       <span class="custom-option-title"> Paypal </span>
                                       </span>
                                       <input name="customRadioSvg" class="form-check-input" type="radio" value="" id="customRadioSvg4" />
                                       </label>
                                    </div>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check custom-option custom-option-icon">
                                       <label class="form-check-label custom-option-content" for="customRadioSvg5">
                                       <span class="custom-option-body">
                                       <i class="ti ti-wallet ti-sm" aria-hidden="true"></i>
                                       <span class="custom-option-title"> Stripe </span>
                                       </span>
                                       <input name="customRadioSvg" class="form-check-input" type="radio" value="" id="customRadioSvg5" />
                                       </label>
                                    </div>
                                 </div>
                              </div>

                        <!-- /Custom Svg Icon Radios -->
                        <!-- Credit Card Details -->
                        <div class="row g-3">
                           <div class="col-sm-12">
                              <div class="col-md-12">
                                 <label class="form-label w-100" for="multiStepsCard">Card Number</label>
                                 <div class="input-group input-group-merge">
                                    <input id="multiStepsCard" class="form-control multi-steps-card" name="multiStepsCard" type="text" placeholder="1356 3215 6548 7898" aria-describedby="multiStepsCardImg" />
                                    <span class="input-group-text cursor-pointer" id="multiStepsCardImg"><span class="card-type"></span></span>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <label class="form-label" for="multiStepsName">Name On Card</label>
                                 <input type="text" id="multiStepsName" class="form-control" name="multiStepsName" placeholder="John Doe" />
                              </div>
                              <div class="col-md-12">
                                 <label class="form-label" for="multiStepsExDate">Expiry Date</label>
                                 <input type="text" id="multiStepsExDate" class="form-control multi-steps-exp-date" name="multiStepsExDate" placeholder="MM/YY" />
                              </div>
                              <div class="col-md-12">
                                 <label class="form-label" for="multiStepsCvv">CVV Code</label>
                                 <div class="input-group input-group-merge">
                                    <input type="text" id="multiStepsCvv" class="form-control multi-steps-cvv" name="multiStepsCvv" maxlength="3" placeholder="654" />
                                    <span class="input-group-text cursor-pointer" id="multiStepsCvvHelp"><i class="ti ti-help text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Verification Value"></i></span>
                                 </div>
                              </div>
                              <h5 class="my-4">Summary</h5>
                              <table style="width: 100%;">
                                 <tr>
                                    <td>Subscription Fees</td>
                                    <td>
                                       <p id="package_price">€0</p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Addon Fees</td>
                                    <td>
                                       <p id="price">€0</p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Registration Fees</td>
                                    <td>€50</td>
                                 </tr>
                                 <tr>
                                    <td>Taxes</td>
                                    <td>€0</td>
                                 </tr>
                                 <tr>
                                    <td>Total</td>
                                    <td>
                                       <p class="total">€50</p>
                                    </td>
                                 </tr>
                              </table>
                           </div>
                           <div class="col-12 d-flex justify-content-between mt-4">
                              <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button type="submit" class="btn btn-success btn-next btn-submit">Submit</button>
                           </div>
                        </div>
                        <!--/ Credit Card Details -->
                     </div>
                  </form>
               </div>
            </div>

      </div>
      <!-- / Multi Steps Registration -->
      <div class="d-flex col-lg-2 align-items-center p-3"></div>
   </div>
</div>
<script>
   // Check selected custom option
   window.Helpers.initCustomOptionCheck();

</script>
@endsection
