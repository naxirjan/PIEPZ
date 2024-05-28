@extends('layouts/layoutMaster')
@section('title', 'Invoice Details')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>
@endsection
@section('page-script')
<script src="{{asset('assets/js/forms-editors.js')}}"></script>
<script src="{{asset('assets/js/forms-file-upload.js')}}"></script>
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-tagify.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection
@section('content')
<h4 class="fw-bold py-3 mb-4">
   <span class="text-muted fw-light">Admin /</span> Invoice Details
  <!-- Back -->
  <a href="/admin/invoices" type="button" style="float:right;"
     class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
     data-bs-placement="left" data-bs-original-title="Back">
    <i class="ti ti-arrow-back"></i>
  </a>
</h4>
<div class="row">
   <!-- Earning Reports -->
   <div class="col-lg-8 mb-4">
      <div class="card h-100">
         <div class="card-body">
            <!-- product section -->
            <p><i class="ti ti-brand-dribbble mb-2" style="color: #c5952a;"></i>Outstanding</p>
            <p><i class="fa-solid fa-location-dot"></i> location:  northwestern Europe with overseas territories in the Caribbean</p>
            <div class="card-body">
               <ul class="p-0 m-0">
                  <li class="d-flex mb-4 pb-1">
                     <div class="me-3">
                        <img src="{{ asset('assets/img/products/iphone.png') }}" alt="User" class="rounded" width="46">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                           <h6 class="mb-0">Apple iPhone 13</h6>
                           <small class="text-muted d-block">Item: #FXZ-4567</small>
                           <small class="text-muted d-block">SKU: #FXZ-4567</small>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                           <p class="mb-0 fw-semibold">$999.29x1 = </p>
                           <p class="mb-0 fw-semibold">$999.29</p>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
            <!-- end product section -->
            <hr class="my-5">
            <!-- payment -->
            <p><i class="fa fa-check" aria-hidden="true" style="border-radius: 50%;
               border: solid;
               color: #547435;"></i> Betaald</p>
            <br><br>
            <table class="table">
               <tr>
                  <td>Subtotal</td>
                  <td>1 item</td>
                  <td>$489</td>
               </tr>
               <tr>
                  <td>dispatch</td>
                  <td>Free Shipping</td>
                  <td>$0.0</td>
               </tr>
               <tr>
                  <td>Tax</td>
                  <td>NL 20%</td>
                  <td>$50</td>
               </tr>
               <tr>
                  <td>Total</td>
                  <td></td>
                  <td>$539</td>
               </tr>
            </table>
            <!-- end payment -->
            <hr class="my-5">
            <!-- leave a comment -->
            <label for="exampleFormControlTextarea1" class="form-label">Leave a Comment</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            <button type="button" class="btn btn-label-primary" style="float: right; margin-top: 5px;">Submit</button>
            <!-- leave a comment end -->
            <!-- timeline start -->
            <div class="card-header d-flex justify-content-between">
               <h5 class="card-title m-0 me-2 pt-1 mb-2">Today</h5>
               <!-- <div class="dropdown">
                  <button class="btn p-0" type="button" id="timelineWapper" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="timelineWapper">
                    <a class="dropdown-item" href="javascript:void(0);">Download</a>
                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                  </div>
                  </div> -->
            </div>
            <div class="card-body pb-0">
               <ul class="timeline ms-1 mb-0">
                  <li class="timeline-item timeline-item-transparent ps-4">
                     <span class="timeline-point timeline-point-primary"></span>
                     <div class="timeline-event">
                        <div class="timeline-header">
                           <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                           <small class="text-muted">Today</small>
                        </div>
                     </div>
                  </li>
                  <li class="timeline-item timeline-item-transparent ps-4">
                     <span class="timeline-point timeline-point-success"></span>
                     <div class="timeline-event">
                        <div class="timeline-header">
                           <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                           <small class="text-muted">2 Day Ago</small>
                        </div>
                     </div>
                  </li>
                  <li class="timeline-item timeline-item-transparent ps-4">
                     <span class="timeline-point timeline-point-success"></span>
                     <div class="timeline-event">
                        <div class="timeline-header">
                           <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                           <small class="text-muted">2 Day Ago</small>
                        </div>
                     </div>
                  </li>
                  <li class="timeline-item timeline-item-transparent ps-4">
                     <span class="timeline-point timeline-point-danger"></span>
                     <div class="timeline-event">
                        <div class="timeline-header">
                           <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                           <small class="text-muted">6 Day Ago</small>
                        </div>
                        <div class="d-flex flex-wrap gap-2 pt-1">
                           <a href="javascript:void(0)" class="me-3">
                           <img src="{{asset('assets/img/icons/misc/doc.png')}}" alt="Document image" width="15" class="me-2">
                           <span class="fw-semibold text-heading">Email Open</span>
                           </a>
                        </div>
                     </div>
                  </li>
                  <li class="timeline-item timeline-item-transparent ps-4 border-0">
                     <span class="timeline-point timeline-point-info"></span>
                     <div class="timeline-event pb-0">
                        <div class="timeline-header">
                           <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                           <small class="text-muted">10 Day Ago</small>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
            <!-- timeline end -->
         </div>
      </div>
   </div>
   <!--/ Earning Reports -->
   <!-- Earning Reports -->
   <div class="col-lg-4 mb-4">
      <div class="card h-100">
         <div class="card-body">
            <ul class="timeline timeline-advance " style="height:auto !important;">
               <li class="timeline-item ps-4 border-left-dashed">
                  <span class="timeline-indicator timeline-indicator-success">
                  <i class="ti ti-circle-check"></i>
                  </span>
                  <div class="timeline-event ps-0 pb-0">
                     <div class="timeline-header">
                        <small class="text-success text-uppercase fw-semibold">Vendor</small>
                     </div>
                     <h6 class="mb-0">Myrtle Ullrich</h6>
                     <p class="text-muted mb-0">101 Boulder, California(CA), 95959</p>
                  </div>
               </li>
               <li class="timeline-item ps-4 border-0">
                  <span class="timeline-indicator timeline-indicator-primary">
                  <i class="ti ti-map-pin"></i>
                  </span>
                  <div class="timeline-event ps-0 pb-0">
                     <div class="timeline-header">
                        <small class="text-primary text-uppercase fw-semibold">Partner</small>
                     </div>
                     <h6 class="mb-0">Barry Schowalter</h6>
                     <p class="text-muted mb-0">939 Orange, California(CA),92118</p>
                  </div>
               </li>
            </ul>
            <hr class="my-5">
            <label for="select2Basic" class="form-label">Status</label>
            <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
               <option value="AK">Cancel</option>
               <option value="HI">Complete</option>
               <option value="CA">Pending</option>
               <option value="NV">Deliver</option>
            </select>
            <hr class="my-5">
            <label for="select2Basic" class="form-label">Add Tracking Code</label>
            <input class="form-control" type="text" name="" id="" placeholder="34348">
         </div>
      </div>
   </div>
   <!--/ Earning Reports -->
</div>
<hr class="my-5">
@endsection
