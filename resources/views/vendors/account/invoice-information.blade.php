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


<!-- Multi Column with Form Separator -->
<div class="card mb-4">
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


@endsection
