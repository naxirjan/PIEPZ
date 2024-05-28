@php
$functionalities = App\Models\PurchasePackageFunctionality::get();
@endphp
@extends('layouts/layoutMaster')

@section('title', 'Custom Options - Forms')

@section('content')

   <!-- start functionalities -->
   <h4 class="fw-bold py-3 mb-4">
                           Extra Features
                        </h4>
                        <!--  add addon alert -->
@if (\Session::has('added'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('added') !!}</li>
        </ul>
    </div>
@endif
<!-- end add addon alert -->
<!-- add addon code -->
<div class="row">
  <!-- Default switches -->

  <div class="col-xl-12">
  <div class="card mb-4">
  <h5 class="card-header">Add Functionality</h5>
<div class="card-body">

        <form method="POST" action="{{ route('add-func') }}">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="func-name">Functionality Title</label>
            <div class="col-sm-10">
              <input type="text" name="title" class="form-control" id="func-name"  />
              @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="func-price">Functionality Price</label>
            <div class="col-sm-10">
              <input type="number" name="price" class="form-control" id="func-price" />
              @error('price')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>


          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Add Functionality</button>
            </div>
          </div>
        </form>
</div>
</div>
  </div>
</div>
<!-- end add marketplace -->
                        <div class="card">
                          <div class="card-body">
                        <div class="row mb-3">
                           @foreach($functionalities as $func)
                           <div class="col-md-4 mb-md-0 mb-2">
                              <div class="form-check custom-option custom-option-basic">
                                 <label class="form-check-label custom-option-content" for="function.{{ $func->id}}">
                                 <input class="form-check-input checkbox" name="functionalities" type="checkbox" value="{{ $func->id}}" id="function.{{ $func->id}}" data-price="{{$func->price}}" {{ ($func->status==1) ? "checked" : "unchecked" }}/>
                                 <span class="custom-option-header">
                                 <span class="h6 mb-0">{{$func->title}}</span>
                                 <span class="text-muted">€{{$func->price}}</span>
                                 </span>
                                 <span class="custom-option-body">
                                 <small class="option-text">{{$func->type}}</small>
                                 </span>
                                 <a href="{{route('edit-fnc', ['id' => $func->id])}}"><i class="fa-solid fa-pencil"></i></a>

                                 </label>
                              </div>
                           </div>
                           @endforeach
                        </div>
                      </div>  </div>
                        <!-- functionalities end -->
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
                url: 'fnc-status', // Replace with the actual server-side script
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
