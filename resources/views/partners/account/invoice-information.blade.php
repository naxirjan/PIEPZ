@extends('layouts/layoutMaster')

@section('title', ' Vertical Layouts - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
@endsection

@section('content')



<div class="row">
  <!-- Website Analytics -->
  <div class="col-lg-8 mb-4">
  <div class="card mb-4 h-100">
  <h5 class="card-header">Invoice Information</h5>
  <form class="card-body">
  <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Full Name</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
          </div>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
   
    </div>
    <hr class="my-4 mx-n4" />
    <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Full Name</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
          </div>
    <div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
    </div>

    
    <hr class="my-4 mx-n4" />
  
    <div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Heading</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="Placeholder" />
      </div>
    </div>
    <div class="pt-4">
      <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit Information</button>
    </div>
  </form>
</div>

  </div>
  <div class="col-lg-4 mb-4">
  <div class="card h-100">
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

@endsection
