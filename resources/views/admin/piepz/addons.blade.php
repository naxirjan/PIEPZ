@php
$addons = App\Models\PurchasePackageAddon::get();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Addons - Package')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Package /</span> Addons</h4>
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
  <h5 class="card-header">Add Addon</h5>
       <div class="card-body">
        <form method="POST" action="{{ route('add-addon') }}">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="title">Title</label>
            <div class="col-sm-10">
              <input type="text" name="title" class="form-control" id="title"  />
              @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="addon-price">Price</label>
            <div class="col-sm-10">
              <input type="number" name="price" class="form-control" id="price" />
              @error('price')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>


          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Add Addon</button>
            </div>
          </div>
        </form>
       </div>
      </div>
  </div>
</div>
<!-- end add addon -->

<div class="row">
  <!-- Default switches -->
  <div class="col-xl-12">
    <div class="card mb-4">
      <h5 class="card-header">Package Addons</h5>

      <hr class="m-0" />
      <div class="row row-bordered g-0">
                           @foreach($addons as $addon)
                           <div class="col-sm-4 p-4">
                              <div class="text-light small fw-semibold mb-3">{{$addon->title}}</div>
                              <label class="switch switch-square  switch-success">
                              <span class="switch-label">On</span>
                              <input type="checkbox" id="checkbox" name="addon" value="{{$addon->id}}" class="switch-input checkbox" data-price="{{$addon->price}}" {{ ($addon->status==1) ? "checked" : "unchecked" }}/>
                              <span class="switch-toggle-slider">
                              <span class="switch-on"><i class="ti ti-check"></i></span>
                              <span class="switch-off"><i class="ti ti-x"></i></span>
                              </span>
                              <span class="switch-label">Off - €{{$addon->price}}</span>
                              <a href="{{route('edit-addon', ['id' => $addon->id])}}"><i class="fa-solid fa-pencil"></i></a>
                              </label>
                           </div>
                           @endforeach
                        </div>
                        <!-- package addons close -->
    </div>
  </div>
  <!--/ Default switches -->





</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    // Execute this code when the page is ready
    $(document).ready(function() {
        // Listen for changes to the checkbox
        $('#checkbox').change(function() {


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
                url: 'addon-status', // Replace with the actual server-side script
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
