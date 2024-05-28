@php
$marketplaces = App\Models\PurchasePackageMarketplace::get();
@endphp
@extends('layouts/layoutMaster')

@section('title', 'Marketplace - Packages')

@section('content')
<h4 class="fw-bold py-3 mb-4">
Marketplace and eCommerce Connection Software
</h4>
<!--  add marketplace alert -->
@if (\Session::has('added'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('added') !!}</li>
        </ul>
    </div>
@endif
<!-- end add market alert -->
<!-- add market code -->
<div class="row">
  <!-- Default switches -->

  <div class="col-xl-12">
  <div class="card mb-4">
  <h5 class="card-header">Add Marketplace</h5>
    <div class="card-body">
            <form method="POST" action="{{ route('add-marketplace') }}">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="addon-name">Marketplace Title</label>
                <div class="col-sm-10">
                  <input type="text" name="title" class="form-control" id="addon-name"  />
                  @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="addon-price">Marketplace Price</label>
                <div class="col-sm-10">
                  <input type="number" name="price" class="form-control" id="addon-price" />
                  @error('price')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>


              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Marketplace</button>
                </div>
              </div>
            </form>
    </div>
    </div>
  </div>
</div>
<!-- end add marketplace -->
<div class="row">
  <!-- Basic Custom Radios -->
  <div class="col-xl-12 mb-4">
    <div class="card">
      <div class="card-body">
          <!-- start market places -->

                        <div class="row mb-3">
                           @foreach($marketplaces as $marketplace)
                           <div class="col-md-4 mb-md-0 mb-2">
                              <div class="form-check custom-option custom-option-basic">
                                 <label class="form-check-label custom-option-content" for="marketplace.{{ $marketplace->id}}">
                                 <input class="form-check-input checkbox" name="marketplaces" type="checkbox" value="{{$marketplace->id}}" id="marketplace.{{ $marketplace->id}}"  data-price="{{ $marketplace->price }}" {{ ($marketplace->status==1) ? "checked" : "unchecked" }}/>
                                 <span class="custom-option-header">
                                 <span class="h6 mb-0">{{$marketplace->title}}</span>
                                 <span class="text-muted">€{{$marketplace->price}}</span>
                                 </span>
                                 <span class="custom-option-body">
                                 <small class="option-text">{{$marketplace->type}}</small>
                                 </span>
                                 <a href="{{route('edit-marketplace', ['id' => $marketplace->id])}}"><i class="fa-solid fa-pencil"></i></a>

                                 </label>
                              </div>
                           </div>
                           @endforeach
                        </div>
                        <!-- market places end -->
      </div>
    </div>
  </div>
  <!-- /Basic Custom Radios -->

</div>
<script>
  // Check selected custom option
  window.Helpers.initCustomOptionCheck();

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    // Execute this code when the page is ready
    $(document).ready(function() {
        // Listen for changes to the checkbox
        $('.checkbox').change(function() {


        });
        $(document).on('change', '[type=checkbox]', function() {

          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var  checkboxValue = $(this).val();

          //  Send the checkbox value to the server
            $.ajax({
                url: 'marketplace-status', // Replace with the actual server-side script
                method: 'POST',
                data: { checkboxValue: checkboxValue },
                success: function(response) {


         // Set the options that I want
                toastr.options = {
                  "closeButton": true,
                  "newestOnTop": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                  toastr.success("status updated successfully...");
                },
                error: function(xhr, status, error) {
                    // Handle errors (if any)
                    console.error('Error:', error);
                }
            });
});
    });
</script>
@endsection
