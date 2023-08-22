@php
$pricingModal = true;
@endphp
@extends('layouts/layoutMaster')
@section('title', 'My account - Account Page')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection


@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-crm.js')}}"></script>
@endsection
@section('content')
<div class="row">
   <!-- Earning Reports Tabs-->
   <div class="col-12 col-xl-8 mb-4">
      <div class="row">
      
        <div class="col-md mb-md-0 mb-2">
          <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
            <div class="card-body"> 
              <p class="icon-name text-capitalize text-truncate mb-0">Current Package</p><i class="fa-solid fa-box" style="font-size: 72px;"></i>
            
            </div>
          </div>
        </div>
        
        <div class="col-md mb-md-0 mb-2">
          <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
            <div class="card-body"> 
            <p class="icon-name text-capitalize text-truncate mb-0">Marketplace & Ecommerce Software</p><i class="fa-solid fa-gear" style="font-size:50px;"></i>
            <p class="icon-name text-capitalize text-truncate mb-0"><i class="fa-solid fa-circle-plus"></i> Information</p>
         
            </div>
          </div>
        </div>

      </div>
      <div class="row">
      
            <div class="col-md mb-md-0 mb-2">
              <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
                <div class="card-body">
                <p class="icon-name text-capitalize text-truncate mb-0">Compare Package</p><i class="fa-solid fa-code-compare" style="font-size: 50px;"></i>
                <p class="icon-name text-capitalize text-truncate mb-0"><i class="fa-solid fa-circle-plus"></i> Information</p>
              
                </div>
              </div>
            </div>
            <div class="col-md mb-md-0 mb-2">
              <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
                <div class="card-body"> 
                <p class="icon-name text-capitalize text-truncate mb-0">Add-ons</p>  
                <i class="fa-solid fa-circle-plus" style="font-size: 50px;"></i>
                <p class="icon-name text-capitalize text-truncate mb-0"><i class="fa-solid fa-circle-plus"></i> Information</p>
                </div>
              </div>
            </div>

     </div>

     <div class="row">
      <div class="col-md mb-md-0 mb-2">
      <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Total Revenue</h5>
        <small class="text-muted">Last Week</small>
      </div>
      <div id="salesLastYear"></div>
      <div class="card-body pt-0">
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
          <h4 class="mb-0">175k</h4>
          <small class="text-danger">-16.2%</small>
        </div>
      </div>
    </div>
      </div>
      <div class="col-md mb-md-0 mb-2">
      <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-column">
            <div class="card-title mb-auto">
              <h5 class="mb-1 text-nowrap">Total Orders</h5>
              <small>Weekly Report</small>
            </div>
            <div class="chart-statistics">
              <h3 class="card-title mb-1">$4,673</h3>
              <span class="badge bg-label-success">+15.2%</span>
            </div>
          </div>
          <div id="revenueGrowth"></div>
        </div>
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