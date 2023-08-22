@php
$pricingModal = true;
@endphp
@extends('layouts/layoutMaster')
@section('title', 'Modals - UI elements')
@section('vendor-style')
@endsection
@section('vendor-script')
@endsection
@section('page-script')
@endsection
@section('content')
<div class="row">
   <!-- Earning Reports Tabs-->
   <div class="col-12 col-xl-8 mb-4">
      <div class="card">
         <h5 class="card-header">Kiant ID: 526323</h5>
         <table class="table">
            <tbody>
               <tr>
                  <td>
                     <p>Email Address</p>
                  </td>
                  <td></td>
               </tr>
               <tr>
                  <td>Albert Cook</td>
                  <td>
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enableOTP"> Change </button>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p>Heading</p>
                  </td>
                  <td></td>
               </tr>
               <tr>
                  <td>.....</td>
                  <td>  
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enableOTP1"> Change </button>
                  </td>
               </tr>
            </tbody>
         </table>
         <br>
         <div class="card-body">
            <div class="row">
               <div class="col-md mb-md-0 mb-2">
                  <div class="form-check custom-option custom-option-basic">
                     <label class="form-check-label custom-option-content" for="customCheckTemp3">
                     <input class="form-check-input" type="checkbox" value="" id="customCheckTemp3"  />
                     <span class="custom-option-header">
                     <span class="h6 mb-0">Multicator Authentication</span>
                     </span>
                     <span class="custom-option-body">
                     <small class="option-text">Active Multicator Authentication</small>
                     </span>
                     </label>
                  </div>
               </div>
               <div class="col-md">
                  <div class="form-check custom-option custom-option-basic">
                     <label class="form-check-label custom-option-content" for="customCheckTemp4">
                     <input class="form-check-input" type="checkbox" value="" id="customCheckTemp4" />
                     <span class="custom-option-header">
                     <span class="h6 mb-0">Wallet Payments</span>
                     </span>
                     <span class="custom-option-body">
                     <small>Activate payment using your wallet in case of any incidents on payment!</small>
                     </span>
                     </label>
                  </div>
               </div>
            </div>
         </div>
         <br>
         <div class="card">
            <h5 class="card-header">File input</h5>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6 col-xl-4 mb-4">
                     <img class="card-img-top" style="border: 2px solid;" src="{{asset('assets/img/elements/im.jpg')}}" alt="Card image cap" id="showImage"/>
                     <div class="mb-3">
                        <input class="form-control" type="file"  id="image">
                     </div>
                                       
                  </div>
                  <div class="col-md-6 col-xl-4 mb-4"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Sales last 6 months -->
   <div class="col-md-6 col-xl-4 mb-4">
      <div class="card">
      <div class="card-body">
      <div class="card-title m-0 me-2">
          <h5 class="m-0 me-2">Automatically Payment</h5>
          <small class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</small>
        </div>
        <ul class="p-0 m-0">
          <li class="d-flex mb-3 pb-1 align-items-center"></li>
          <li class="d-flex mb-3 pb-1 align-items-center">
            <div class="badge bg-label-primary me-3 rounded p-2">
              <i class="ti ti-wallet ti-sm"></i>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Wallet</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0 text-danger"><a class="btn rounded-pill btn-warning waves-effect waves-light" href="#">syncronize</a></h6>
              </div>
            </div>
          </li>
      
          <li class="d-flex mb-3 pb-1 align-items-center">
            <div class="badge bg-label-danger rounded me-3 p-2">
              <i class="ti ti-brand-paypal ti-sm"></i>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Paypal</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0 text-success"><a class="btn rounded-pill btn-warning waves-effect waves-light" href="#">syncronize</a></h6>
              </div>
            </div>
          </li>

          <li class="d-flex mb-3 pb-1 align-items-center">
            <div class="badge bg-label-danger rounded me-3 p-2">
              <i class="ti ti-brand-paypal ti-sm"></i>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Card </h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0 text-success"><a class="btn rounded-pill btn-warning waves-effect waves-light" href="#">syncronize</a></h6>
              </div>
            </div>
          </li>
      
        </ul>
      </div>
      </div>
   </div>
</div>
<!-- All Modals -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
                                $(document).ready(function(){
                                
                                    $('#image').change(function (e){
                                           var reader = new FileReader();
                                           reader.onload = function(e){
                                            $('#showImage').attr('src',e.target.result);
                                           } 
                                           reader.readAsDataURL(e.target.files['0']);
                                    });
                                });
                            </script>
@include('_partials/_modals/modal-email')
@endsection