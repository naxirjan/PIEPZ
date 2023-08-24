@extends('layouts/layoutMaster')
@section('title', 'DataTables - Tables')
@section('vendor-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4">
   <span class="text-muted fw-light">Admin /</span> Bulk Update Products
</h4>


<div class="row">

  <!-- Orders last week -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-3">
        <h5 class="card-title mb-0">Status</h5>

      </div>
      <div class="card-body">

        <div class="d-flex justify-content-between align-items-center gap-3">
          <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">John</option>
              <option value="HI">Smith</option>
              <option value="CA">Robb</option>
              <option value="NV">Kenn</option>

            </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Sales last year -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Vendor</h5>

      </div>

      <div class="card-body pt-0">
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
         <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">John</option>
              <option value="HI">Smith</option>
              <option value="CA">Robb</option>
              <option value="NV">Kenn</option>

            </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Profit last month -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Categories</h5>
      </div>
      <div class="card-body">
        <div id="profitLastMonth"></div>
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
         <select id="select2Basic4" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">John</option>
              <option value="HI">Smith</option>
              <option value="CA">Robb</option>
              <option value="NV">Kenn</option>

            </select>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Scrollable -->
<div class="card" style="padding:20px;">
   <div class="table-responsive text-nowrap">
      <form action="bulk-update-procducts-process" method="post">
       <table class="table">
         <thead>
            <tr>
                <th><input class="form-check-input" type="checkbox" id="cb-select-all-products" /></th>
                <th>Product Name</th>
                <th>Product Type</th>
                <th>&nbsp;Price&nbsp;</th>
                <th>Short Description</th>
                <th>Is featured</th>
                <th>Is Approved</th>
                <th>Status</th>
            </tr>
         </thead>
         <tbody id ="GetProducts"></tbody>
      </table>
       <br />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <button name="submit" class="btn btn-primary me-3 waves-effect waves-light" type="submit" value="submit">Update</button>
       </form>
   </div>
</div>
<!--/ Scrollable -->


</div>
@endsection

@section('vendor-script')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
$( document ).ready(function() {
   $("#GetProducts").load('ajax-get-bulk-edit-products');

  $("#cb-select-all-products").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
  });

  $('.cb-select-product').on('click', function () {
    if ($('.cb-select-product:checked').length == $('.cb-select-product').length) {
      $('#cb-select-all-products"').prop('checked', true);
    } else {
      $('#cb-select-all-products"').prop('checked', false);
    }
  });

});
</script>
@endsection
