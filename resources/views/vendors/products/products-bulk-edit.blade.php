@extends('layouts/layoutMaster')

@section('title', 'Bulk Edit Products')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}"/>
  <style>
    #gridBulkEditProducts th{
      text-transform: none;
    }
  </style>
 @endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

  <!-- bootGrid Libs - Start -->
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/dist/jquery.bootgrid.css')}}">
  <script src="{{asset('assets/bootGrid/js/moderniz.2.8.1.js')}}"></script>
  <!-- bootGrid Libs - Start -->
@endsection

@section('page-script')
  <script src="{{asset('assets/bootGrid/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/bootGrid/dist/jquery.bootgrid.js')}}"></script>
  <script src="{{asset('assets/js/forms-selects.js')}}"></script>

  <!-- Libs Toaster -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/toastr.min.css')}}">
  <script src="{{asset('assets/js/toastr.min.js')}}"></script>
  <!-- Libs Toaster -->

  <script src="{{asset('js/jsBootGrid.js')}}"></script>
  <script src="{{asset('js/jsCommon.js')}}"></script>
  <script src="{{asset('js/vendor/jsProductBulkEdit.js')}}"></script>
@endsection

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Admin /</span> Bulk Edit Products
  </h4>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div id="divActions" class="col-md-12">
          <a href="/vendor/products" type="button"
             class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
             data-bs-placement="bottom" data-bs-original-title="Back">
            <i class="ti ti-arrow-left"></i>
          </a>
          <a href="{{Request::url()}}" type="button" class="btn rounded-pill btn-icon btn-label-primary waves-effect"
             data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Refresh">
            <i class="ti ti-refresh"></i>
          </a>
          <button id="btnSave" type="button" class="btn rounded-pill btn-icon btn-label-primary waves-effect"
                  data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Save All">
            <i class="ti ti-device-floppy"></i>
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!--
            Note: If you want to add more columns in Grid then, you must also do code for them in getUpdatedData() function to get updated data.
            File path:public\js\jsProductBulkEdit.js
          -->
          <table id="gridBulkEditProducts" data-total="{{count($aProducts)}}" class="table  table-hover" style="table-layout: auto;">
            <thead>
        <tr>
          <th
            data-column-id="id" data-identifier="true"
            data-type="number"
            data-width="50"
            data-align="center"
            data-header-align="center">ID
          </th>
          <th
            data-column-id="image"
            data-type="string"
            data-width="80"
            data-align="right">Image
          </th>
          <th
            data-column-id="product" data-align="left"
            data-type="string"
            data-width="200"
            data-formatter="product"
            data-header-align="left">Product
          </th>
          <th
            data-column-id="status"
            data-filterable="true"
            data-width="100"
            data-align="center"
            data-header-align="center">
            Status
          </th>
          <th
            data-column-id="type"
            data-formatter="type"
            data-width="200"
            data-type="string">
            Type
          </th>
          <th
            data-column-id="price"
            data-formatter="price"
            data-width="100"
            data-visible="true">
            Price
          </th>
          <th
            data-column-id="stock"
            data-width="100"
            data-formatter="stock">
            Stock
          </th>
          <th
            data-column-id="categories"
            data-formatter="categories"
            data-visible="false"
            data-width="200"
          >
            Categories
          </th>
        </tr>
        </thead>
            <tbody>
        @if(count($aProducts))
          @foreach($aProducts as $product)
            <tr>
              <td class="headcol">{{$product->id}}</td>
              <td class="headcol"><img src='{{asset("storage")}}/{{$product->image}}' alt='No'/></td>
              <td class="headcol">{{$product->name}}</td>
              <td>
                <select class="status form-control" id="{{$product->id}}-status-{{$product->sku}}">
                  @foreach($aProductStatuses as $aProductStatus)
                    @if($aProductStatus['title'] == $product->status)
                      <option value="{{$aProductStatus['id']}}" selected>{{$aProductStatus['title']}}</option>
                    @else
                      <option value="{{$aProductStatus['id']}}">{{$aProductStatus['title']}}</option>
                    @endif
                  @endforeach
                </select>
              </td>
              <td>
                  <?php
                  $sSelected = "";
                  $sOptions = '<option value="">-</option>';
                    foreach($aProductTypes as $aProductType){
                      $sSelected = "";
                      if($product->type == $aProductType['title']) $sSelected = "selected";
                        $sOptions .= '<option value="'.($aProductType['id']).'" '.$sSelected.'>'.($aProductType['title']).'</option>';
                    }
                  ?>
                <select class="type form-control" id="{{$product->id}}-type-{{$product->sku}}">
                  <?php echo $sOptions; ?>
                </select>
                <script type="application/javascript">
                  jQuery("#<?php echo $product->id;?>-type-<?php echo $product->sku;?>").select2();
                </script>
              </td>
              <td>
                <input id="{{$product->id}}-price-{{$product->sku}}" type="number" class="price form-control" value="{{$product->price}}" />
              </td>
              <td>
                <input id="{{$product->id}}-stock-{{$product->sku}}" type="number" class="stock form-control" value="{{$product->stock}}" />
              </td>
              <td>
                  <?php
                  $aCategories = array();
                  $sSelected = "";
                  $sOptions = '<option value="">-</option>';

                  $sCategories = $product->categories;
                  if (!empty($sCategories)) $aCategories = explode("|", $sCategories);
                  if(!is_array($aCategories)) $aCategories = array();
                  $aCategories = array_flip($aCategories);

                  foreach($aProductCategories as $aProductCategory){
                    $sProductCategoryName = $aProductCategory['name'];
                    $iProductCategoryId = $aProductCategory['id'];
                    $sSelected = "";
                    if(isset($aCategories[$sProductCategoryName])) $sSelected = "selected";
                    $sOptions .= '<option value="'.($iProductCategoryId).'" '.$sSelected.'>'.$sProductCategoryName.'</option>';
                  }
                ?>
                <select id="{{$product->id}}-categories-{{$product->sku}}" class="categories form-control" multiple>
                    <?php echo $sOptions; ?>
                </select>
                <script type="application/javascript">
                  jQuery("#<?php echo $product->id;?>-categories-<?php echo $product->sku;?>").select2();
                </script>
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
