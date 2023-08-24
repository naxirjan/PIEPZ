@extends('layouts/layoutMaster')
@section('title', 'DataTables - Tables')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />


<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />

@endsection


@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>

<script>
$( document ).ready(function() {

    //Get All Products
    $("#GetProducts").load('ajax-get-bulk-edit-products');

    //Check All
    $("#checkAll").change(function () {
    $(".cb-element").prop('checked', $(this).prop("checked"));
});


    //Check Single
    $(document).on('click', '.cb-element',function()
     {
        if($('.cb-element:checked').length == $('.cb-element').length)
        {
            $('#checkAll').prop('checked',true);
        }
        else{
            $('#checkAll').prop('checked',false);
        }
    });


    //Search By Category
    $("#idBtnSearch").click(function ()
     {
        var iCategoryId = $("#idCategory").val();
        var iStatusId = $("#idStatus").val();
        var iVendor = $("#idVendor").val();

        if( (iCategoryId == "" || iCategoryId == null) &&  (iStatusId == "" || iStatusId == null) && (iVendor == "" || iVendor == null))
        {
            alert("Please Select Any Filter !...");
            return false;
        }

        $.ajax({
                type:'POST',
                url:'ajax-get-bulk-edit-products-by-filters',
                data:{
                    _token: "{{ csrf_token() }}",

                    iCategoryId:iCategoryId,
                    iStatusId:iStatusId,
                    iVendor:iVendor
                },
                success: function( sResponse )
                {
                    $("#GetProducts").html(sResponse);
                }
            });
//
     });


    // Reset Filter
    $("#idBtnResetFilter").click(function () {

        $("#idCategory").val('').trigger('change');
        $("#idStatus").val('').trigger('change');
        $("#idVendor").val('').trigger('change');

        //Get All Products
        $("#GetProducts").load('ajax-get-bulk-edit-products');
    });


});
function Validate()
    {
        {
            alert("Please Select Products !...");
            return false;
        }
    }
</script>
@endsection

@section('page-script')

<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection


@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4">
   <span class="text-muted fw-light">Admin /</span> Bulk Update Products
</h4>



    <div class="row">
  <!-- Vendor -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body">
         <label for="idVendor" class="form-label">Vendor</label>
            <select id="idVendor" class="select2 form-select form-select-lg" data-allow-clear="true">
             <option value="">-</option>
              <option value="-1">All</option>
             @foreach($objVendors as $objVendor)
                <option value="{{$objVendor->id}}">{{$objVendor->first_name}} {{$objVendor->last_name}}</option>
             @endforeach
            </select>

      </div>
    </div>
  </div>

  <!-- Category -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body">
          <label for="idCategorys" class="form-label">Category</label>
            <select id="idCategory" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="">-</option>
              <option value="-1">All</option>
                @foreach($objCategories as $objCategory)
                    <option value="{{$objCategory->id}}">{{$objCategory->name}}</option>
                @endforeach
            </select>

      </div>
    </div>
  </div>

<!-- Status-->
    <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body">
             <label for="idStatus" class="form-label">Status</label>
            <select id="idStatus" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="">-</option>
              <option value="-1">All</option>
              <option value="0">In Active</option>
              <option value="1">Active</option>
            </select>
      </div>
    </div>
  </div>

</div>

    <div class="row">
        <div class="col-xl-4 col-md-4 col-6 mb-4"></div>
        <div class="col-xl-4 col-md-4 col-6 mb-4 text-center">
            <button id="idBtnSearch" class="btn btn-success btn-lg me-5 waves-effect waves-light" type="button">Search</button>
            <button id="idBtnResetFilter" class="btn btn-info btn-lg me-5 waves-effect waves-light" type="button">
                Reset<i class="ti ti-refresh ti-sm"></i></button>
        </div>
        <div class="col-xl-4 col-md-4 col-6 mb-4"></div>
    </div>



<!-- Scrollable -->
<div class="card" style="padding:20px;">
    @if (session('msg'))
    <p class="alert alert-success text-center">
        {{ session('msg') }}
    </p>
    @endif
   <div class="table-responsive text-nowrap">
      <form action="bulk-update-procducts-process" method="post" >
       <table class="table">
         <thead>
            <tr>
                <th><input class="form-check-input" type="checkbox" id="checkAll" /></th>
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
       <button name="submit" class="btn btn-success btn-lg waves-effect waves-light" type="submit" value="submit">Update All</button>
       </form>
   </div>
</div>
<!--/ Scrollable -->


</div>
@endsection
