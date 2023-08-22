@extends('layouts/layoutMaster')
@section('title', 'DataTables - Tables')
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
   <span class="text-muted fw-light">Admin /</span>Create New Order
</h4>
<div class="row">
   <!-- Earning Reports -->  
   <div class="col-lg-8 mb-4">
      <div class="card h-100">
         <div class="card-body">
            <!-- Search product section -->
            <label for="select2Basic5" class="form-label">Enter Product Name For Search</label>
            <select id="select2Basic5" class="select2 form-select form-select-lg" data-allow-clear="true">
               <option value="AK">Product Name 1</option>
               <option value="HI">Product Name 2</option>
               <option value="CA">Product Name 3</option>
               <option value="NV">Product Name 4</option>
            </select>
            <!-- end Search product section -->
            <hr class="my-5">
            <!-- payment -->
            <h3><i class="fa fa-check" aria-hidden="true" style="border-radius: 50%;
               border: solid;
               color: #547435;"></i> Betaling</h3>
            <table class="table">
               <tr>
                  <td>Subtotal</td>
                  <td></td>
                  <td>$0.0</td>
               </tr>
               <tr>
                  <td>Discount</td>
                  <td>-</td>
                  <td>$0.0</td>
               </tr>
               <tr>
                  <td>Dispatch</td>
                  <td>-</td>
                  <td>$0.0</td>
               </tr>
               <tr>
                  <td>Estimated</td>
                  <td>-</td>
                  <td>$0.0</td>
               </tr>
               <tr>
                  <td>Total</td>
                  <td></td>
                  <td>$0.0</td>
               </tr>
            </table>
            <!-- end payment -->
            <hr class="my-5">
            <!-- leave a comment -->
            <p class="mb-0"> Simply dummy text of the printing and typesetting industry</p>
            <hr class="my-5">
            <!-- leave a comment end -->
            <!-- text section start -->
            <p class="mb-0"> Simply dummy text of the printing and typesetting industry <a href="#">clickable link</a></p>
            <br>
            <!-- text section end -->
            <button type="button" class="btn btn-warning btn-lg" style="width: 45%;">Send Invoice</button>
            <button type="button" class="btn btn-info btn-lg" style="width: 45%;">Mark as Paid</button>
         </div>
      </div>
   </div>
   <!--/ Earning Reports -->
   <!-- Earning Reports -->
   <div class="col-lg-4 mb-4">
      <div class="card h-100">
         <div class="card-body">
            <p class="mb-0"> Simply dummy text of the printing and typesetting industry <a href="#">clickable link</a></p>
            <hr class="my-5">
            <label for="select2Basic" class="form-label">Customer </label>
            <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
               <option value="AK">John</option>
               <option value="HI">Robb</option>
               <option value="CA">Walled</option>
               <option value="NV">Rock</option>
            </select>
            <hr class="my-5">
            <label for="select2Basic" class="form-label">Tags</label>
            <input class="form-control" type="text" name="" id="" placeholder="">
         </div>
      </div>
   </div>
   <!--/ Earning Reports -->
</div>
<hr class="my-5">
@endsection