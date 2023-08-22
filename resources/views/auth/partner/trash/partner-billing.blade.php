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
 }
</style>
@section('content')
<form action="{{route('payment')}}" method="POST">
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
        <div class="row">

                <div class="col"><div class="card">
                <div class="card-body">
                <h5 class="my-4">Payment Method</h5>
            <div class="row g-3">
              <div class="mb-3">
                <div class="form-check form-check-inline">
                  <input name="collapsible-payment" class="form-check-input" type="radio" value="" id="collapsible-payment-cc" checked="" />
                  <label class="form-check-label d-flex gap-1" for="collapsible-payment-cc">
                    Credit/Debit <i class="ti ti-credit-card ti-xs"></i>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input name="collapsible-payment" class="form-check-input" type="radio" value="" id="collapsible-payment-cash" />
                  <label class="form-check-label d-flex gap-1" for="collapsible-payment-cash">
                    Paypal
                    <i class="ti ti-help text-muted ti-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="You can pay once you receive the product."></i>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input name="collapsible-payment" class="form-check-input" type="radio" value="" id="collapsible-payment-cash" />
                  <label class="form-check-label d-flex gap-1" for="collapsible-payment-cash">
                    Bancontant
                    <i class="ti ti-help text-muted ti-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="You can pay once you receive the product."></i>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input name="collapsible-payment" class="form-check-input" type="radio" value="" id="collapsible-payment-cash" />
                  <label class="form-check-label d-flex gap-1" for="collapsible-payment-cash">
                    Bank Transfer
                    <i class="ti ti-help text-muted ti-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="You can pay once you receive the product."></i>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input name="collapsible-payment" class="form-check-input" type="radio" value="" id="collapsible-payment-cash" />
                  <label class="form-check-label d-flex gap-1" for="collapsible-payment-cash">
                    Ideal
                    <i class="ti ti-help text-muted ti-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="You can pay once you receive the product."></i>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input name="collapsible-payment" class="form-check-input" type="radio" value="" id="collapsible-payment-cash" />
                  <label class="form-check-label d-flex gap-1" for="collapsible-payment-cash">
                    Sofort
                    <i class="ti ti-help text-muted ti-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="You can pay once you receive the product."></i>
                  </label>
                </div>
              </div>


            </div>
                <h5 class="my-4 pt-2">Billing Information</h5>

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Company  Name</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Billing  Address</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">City</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">State</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Zipcode</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Country</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>

                </div></div></div>

                <div class="col"><div class="card">
                <div class="card-body">
                <h5 class="my-4">Credit Card Information</h5>


                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Card  Number</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Name on Card</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Expiration Date</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">CVV</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Code</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="Placeholder" />
                  </div>

                <h5 class="my-4">Summary</h5>

                <table style="width: 100%;">
                  <tr><td>Subscription Fees</td><td>${{$package_price}}</td></tr>
                  <tr><td>Addon Fees</td><td>${{$addons_p}}</td></tr>
                  <tr><td>Registration Fees</td><td>$0</td></tr>
                  <tr><td>Taxes</td><td>$0</td></tr>
                  <tr><td>Total</td><td>${{$tot}}</td></tr>
                </table>
                <input type="hidden" name="total" value="{{$addons_p+$package_price+$tot}}">
                <input type="hidden" name="user_id" value="{{$_GET['user_id']}}">

                @csrf
                <div class="d-flex justify-content-center">
                <a href=""><button class="btn btn-primary d-grid w-100" type="submit" style="margin: 1px;">Pay Now</button></a>

                <!-- <a href="{{route('partner.confirmation')}}"><button class="btn btn-primary d-grid w-100" type="submit" style="margin: 1px;">Pay Now</button></a> -->



          </div>
                </div></div></div>
        </div>
      <!-- /Register -->
    </div>
  </div>
</div>
</form>
@endsection
