@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Purchase - Addons')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />

<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>

<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
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
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-body fw-bold ms-1">Select Your Addons</span>
            </a>
          </div>
          <!-- /Logo -->

          <form id="formAuthentication" class="mb-3" action="{{route('update-package')}}" method="POST">
          @csrf
          <input type="text" name="package_id" value="{{request()->package_id}}">
          <input type="text" name="user_id" value="{{request()->user_id}}">
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
                  <input type="checkbox" name="addons[]" value="{{$addon->id}}" class="switch-input" />
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
            <h4 class="fw-bold py-3 mb-4">
             Marketpalces and ecommerce software
            </h4>
            <!-- start market places -->
              <div class="row mb-3">
                @foreach($marketplaces as $marketplace)
                <div class="col-md-4 mb-md-0 mb-2">
                      <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="marketplace.{{ $marketplace->id}}">
                          <input class="form-check-input" name="marketplaces[]" type="checkbox" value="{{$marketplace->id}}" id="marketplace.{{ $marketplace->id}}"  />
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
                    functionalities
                  </h4>
                  <div class="row mb-3">
                  @foreach($functionalities as $func)

                  <div class="col-md-4 mb-md-0 mb-2">
                      <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="function.{{ $func->id}}">
                          <input class="form-check-input" name="functionalities[]" type="checkbox" value="{{ $func->id}}" id="function.{{ $func->id}}"  />
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
                 <!-- start functionalities -->
                 <h4 class="fw-bold py-3 mb-4">
                    All in ecommerce webshop
                  </h4>
                  <div class="row mb-3">

                    <div class="col-md">
                    <div class="form-check custom-option custom-option-basic">
                      <label class="form-check-label custom-option-content" for="customCheckTemp4">
                        <input class="form-check-input" name="webshops[]" type="checkbox" value="shopify" id="customCheckTemp4" />
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
                <!-- functionalities end -->


          <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>


        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection
