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
      <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pb-5 pt-3 mb-0 mb-md-4">
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
      </div>

      <div class="row mx-0 gy-3 px-lg-5">

      <!-- Packages view -->

        @foreach($pack as $pk)
        <div class="col-lg mb-md-0 mb-4">
          <div class="card border rounded shadow-none">
            <div class="card-body">
              <div class="my-3 pt-2 text-center">
                <img src="{{asset('assets/img/illustrations/page-pricing-basic.png')}}" alt="Basic Image" height="140">
              </div>
              <h3 class="card-title fw-semibold text-center text-capitalize mb-1">{{$pk->package_title}}</h3>
              <p class="text-center">{{"$".$pk->package_price}}</p>
              <p class="text-center">Registration Fees $50</p>

              <ul class="ps-3 my-4 pt-2">
                                       {!!$pk->package_description!!}
              </ul>
              @php
                                    $i=1;
                                    $myString = $pk->durations;
                                    $codes = explode(',', $myString);
                                    $myString1 = $pk->duration_price;
                                    $names = explode(',', $myString1);
                                    @endphp
                                    @foreach( $codes as $index => $code )
                                    <div class="col-md mb-md-0 ps-2 my-2 pt-1">
                                       <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                                          <label class="form-check-label custom-option-content" for="{{$names[$index].$pk->id}}" style="padding:0px;">
                                          <span class="custom-option-body">
                                          <span class="custom-option-title">${{$names[$index]}}</span>
                                          <small> {{$code}}</small>
                                          </span>
                                          </label>
                                       </div>
                                    </div>
                                    @endforeach
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!--/ Pricing Plans -->
  <!-- Pricing Free Trial -->
  <div class="pricing-free-trial bg-label-primary">
    <div class="container">
      <div class="position-relative">
        <div class="d-flex justify-content-between flex-column-reverse flex-lg-row align-items-center py-4 px-5">
          <div class="text-center text-lg-start mt-2 ms-3">
            <h3 class="text-primary mb-1">Still not convinced? Start with a 14-day FREE trial!</h3>
            <p class="text-body mb-1">You will get full access to with all the features for 14 days.</p>
            <a href="{{url('auth/register-basic')}}" class="btn btn-primary mt-4 mb-2">Start 14-day FREE trial</a>
          </div>
          <!-- image -->
          <div class="text-center">
            <img src="{{asset('assets/img/illustrations/girl-with-laptop.png')}}" class="img-fluid me-lg-5 pe-lg-1 mb-3 mb-lg-0" alt="Api Key Image" width="202">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Pricing Free Trial -->
  <!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Price</th>
         <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
       @foreach($packages as $pack)
       <tr>
          <td>{{$pack->package_title}}</td>

          <td><span class="badge bg-label-primary me-1">{{$pack->package_price}}</span></td>
          <td>

                <a href="{{ url('admin/piepz/update-package/'.$pack->id) }}"><i class="ti ti-pencil me-1"></i> Edit</a>

            </div>
          </td>
        </tr>
       @endforeach

      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->

</div>
@endsection
