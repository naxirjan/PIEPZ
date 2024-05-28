@extends('layouts/layoutMaster')

@section('title', 'Products')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
  <style>
    #gridProducts th{
      text-transform: none;
    }
  </style>
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>

  <!-- bootGrid Libs - Start -->
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/dist/jquery.bootgrid.css')}}">
  <script src="{{asset('assets/bootGrid/js/moderniz.2.8.1.js')}}"></script>
  <!-- bootGrid Libs - Start -->
  <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
  <script src="{{asset('assets/bootGrid/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/bootGrid/dist/jquery.bootgrid.js')}}"></script>
  <script src="{{--asset('assets/bootGrid/dist/jquery.bootgrid.fa.js')--}}"></script>
  <script src="{{asset('assets/js/dashboards-crm.js')}}"></script>
  <script src="{{asset('js/jsBootGrid.js')}}"></script>
  <script src="{{asset('js/vendor/jsProducts.js')}}"></script>

@endsection


@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Vendor /</span> Products
    <!-- Export Products -->
    <a href="javascript:void(0);" type="button" style="float:right;"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Export Products">
      <i class="ti ti-arrow-up"></i>
    </a>
    <!-- Import Products -->
    <a href="/vendor/import/products" type="button" style="float:right;"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Import Products">
      <i class="ti ti-arrow-down"></i>
    </a>
    <!-- Upload Feed -->
    <a href="/vendor/feed/products" type="button" style="float:right;"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Upload Feed">
      <i class="ti ti-file-plus"></i>
    </a>
    <!-- Add New Product -->
    <a href="/vendor/product/add" type="button" style="float:right;"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Add New Product">
      <i class="ti ti-plus"></i>
    </a>
  </h4>

  <div class="row">
    <div class="col-sm-12">
    <h5>
      <ul class="nav nav-tabs widget-nav-tabs pb-1 gap-2 mx-1 d-flex flex-nowrap" role="tablist">
        <li class="nav-item">
          <a style="width: 80px !important; height: auto !important;" href="/vendor/products/{{base64_encode(0)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iStatus == 0 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;All&nbsp;</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 80px !important; height: auto !important;" href="/vendor/products/{{base64_encode(1)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iStatus == 1 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">Active</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 80px !important; height: auto !important;" href="/vendor/products/{{base64_encode(2)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iStatus == 2 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">Draft</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 80px !important; height: auto !important;" href="/vendor/products/{{base64_encode(3)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iStatus == 3 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">Archived</div>
          </a>
        </li>
      </ul>
    </h5>
    <hr/>
    <div id="divActionsProducts">
      <button id="btnBulkEdit" type="button"
              class="btn rounded-pill btn-icon waves-effect btn-label-grey disabled" data-bs-toggle="tooltip"
              data-bs-placement="bottom" data-bs-original-title="Edit All">
        <i class="ti ti-pencil"></i>
      </button>
    </div>
    <table id="gridProducts" class="table  table-hover"
           style="table-layout: auto;">
      <thead>
      <tr>
        <th
          data-column-id="id"
          data-identifier="true"
          data-type="number"
          data-align="center"
          data-header-align="center"
          data-width="80">
          ID
        </th>
        <th
          data-column-id="image"
          data-type="string"
          data-align="center"
          data-width="100">
          Image
        </th>
        <th
          data-column-id="sku"
          data-type="string"
          data-align="left"
          data-header-align="left"
          data-width="80">
          SKU
        </th>
        <th
          data-column-id="product"
          data-align="left"
          data-type="string"
          data-header-align="left">
          Product
        </th>
        <th
          data-column-id="status"
          data-filterable="true"
          data-align="center"
          data-header-align="center">
          Status
        </th>
        <th
          data-column-id="type"
          data-type="string">
          Type
        </th>
        <th
          data-column-id="price"
          data-align="center">
          Price
        </th>
        <th
          data-column-id="stock"
          data-align="center">
          Stock
        </th>
        <th
          data-column-id="categories"
          data-visible="false"
          data-width="200">
          Categories
        </th>
      </tr>
      </thead>

      <tbody>
      @if(count($aProducts))
        @foreach($aProducts as $iKey => $product)
          <tr>
            <td>{{$product->id}}</td>
            <td><img src='{{$product->image}}' alt='No' width="50" height="40"></td>
            <td>{{$product->sku}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->status}}</td>
            <td>{{$product->type}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td>
                <?php
                $sCategories = $product->categories;
                if (!empty($sCategories)) {
                  $aCategories = explode("|", $sCategories);
                  foreach ($aCategories as $sCategory) {
                    echo "<span class='badge bg-label-primary badge-sm'>" . $sCategory . "</span>&nbsp;";
                  }
                }
                ?>
            </td>
          </tr>
        @endforeach

      @endif
      </tbody>

    </table>
  </div>
  </div>
@endsection
