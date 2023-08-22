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
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>

<script src="{{asset('assets/js/forms-extras.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"> Cost Calculation</h4>


<!-- Multi Column with Form Separator -->
<div class="card mb-4">
  <form class="card-body">
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label" for="multicol-username">Name Invoice</label>
        <input type="text" id="multicol-username" class="form-control" placeholder="john.doe" />
      </div>
      <div class="col-md-6">
      <label class="form-label" for="multicol-birthdate">Invoice Date</label>
        <input type="text" id="multicol-birthdate" class="form-control dob-picker" placeholder="YYYY-MM-DD" />
   
      </div>
    
    </div>
    <hr class="my-4 mx-n4" />
    
      <div class="row g-3">
        <div class="col-md-4" style="display:contents;">
        <div class="col-md mb-md-0 mb-2">
              <div class="form-check custom-option custom-option-basic" style="width:90%">
                <label class="form-check-label custom-option-content" for="customRadioTemp1">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp1" checked />
                  <span class="custom-option-header">
                    <span class="h6 mb-0">Including Vat</span>
                  </span>
                
                </label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-check custom-option custom-option-basic" style="width:90%">
                <label class="form-check-label custom-option-content" for="customRadioTemp2">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp2" />
                  <span class="custom-option-header">
                    <span class="h6 mb-0">Excluding Vat</span>
                  
                  </span>
                
                </label>
              </div>
            </div>
        </div>
        <div class="col-md-4">
        <label class="form-check-label custom-option-content" for="customCheckTemp3">Vat Shifted?</label>
        <br>
                  <input class="form-check-input" type="checkbox" value="" id="customCheckTemp3"  />
                  <span class="custom-option-header">
                    <span class="h6 mb-0">Vat Shifted?</span>
                  </span> 
        </div>
        <div class="col-md-4">
        <label class="form-label" for="form-repeater-1-3">Vat Type</label>
                    <select id="form-repeater-1-3" class="form-select">
                      <option value="op1">Within NL</option>
                      <option value="op2">Option 2</option>
                    </select>
        </div>
  
      </div>
  </form>
</div>
 <!-- Form Repeater -->
 <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form class="form-repeater">
          <div data-repeater-list="group-a">
            <div data-repeater-item>
              <div class="row">
                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                  <label class="form-label" for="form-repeater-1-1">Category</label>
                  <select id="form-repeater-1-3" class="form-select">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                 </div>
                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                  <label class="form-label" for="form-repeater-1-2">Discription</label>
                  <input type="password" id="form-repeater-1-2" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                </div>
                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                  <label class="form-label" for="form-repeater-1-3">Amount</label>
                  <input type="text" id="form-repeater-1-1" class="form-control" placeholder="john.doe" />
                
                </div>
                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                  <label class="form-label" for="form-repeater-1-4">Vat</label>
                  <select id="form-repeater-1-4" class="form-select">
                    <option value="Designer">21%</option>
                    <option value="Developer">30%</option>
                    <option value="Tester">40%</option>
                    <option value="Manager">49%</option>
                  </select>
                </div>
                <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                  <button class="btn btn-label-danger mt-4" data-repeater-delete>
                    <i class="ti ti-x ti-xs me-1"></i>
                    <span class="align-middle">Delete</span>
                  </button>
                </div>
              </div>
              <hr>
            </div>
          </div>
          <div class="mb-0">
            <button class="btn btn-primary" data-repeater-create>
              <i class="ti ti-plus me-1"></i>
              <span class="align-middle">Add</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Form Repeater -->

@endsection
