@extends('layouts/layoutMaster')

@section('title', 'Products')

@section('vendor-style')
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
@endsection

@section('page-script')
  <script src="{{asset('assets/bootGrid/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/bootGrid/dist/jquery.bootgrid.js')}}"></script>
  <script src="{{asset('js/jsBootGrid.js')}}"></script>
  <script src="{{asset('js/admin/jsProducts.js')}}"></script>
@endsection


@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Admin /</span> Products
    <!-- Export Products -->
    <a href="javascript:void(0);" type="button" style="float:right;"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Export Products">
      <i class="ti ti-arrow-up"></i>
    </a>
    <!-- Import Products -->
    <a href="/admin/import/products" type="button" style="float:right;"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Import Products">
      <i class="ti ti-arrow-down"></i>
    </a>
    <!-- Upload Feed -->
    <a href="/admin/feed/products" type="button" style="float:right;"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Upload Feed">
      <i class="ti ti-file-plus"></i>
    </a>
    <!-- Add New Product -->
    <a href="/admin/product/add" type="button" style="float:right;"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Add New Product">
      <i class="ti ti-plus"></i>
    </a>
  </h4>

  <div class="row">
    <div class="col-sm-12">
      <ul class="nav nav-tabs widget-nav-tabs pb-1 gap-2 mx-1 d-flex flex-nowrap" role="tablist">
        <li class="nav-item">
          <a style="width: 80px !important; height: auto !important;" href="/admin/products/{{base64_encode(0)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iStatus == 0 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">&nbsp;All&nbsp;</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 80px !important; height: auto !important;" href="/admin/products/{{base64_encode(1)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iStatus == 1 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">Active</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 80px !important; height: auto !important;" href="/admin/products/{{base64_encode(2)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iStatus == 2 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">Draft</div>
          </a>
        </li>
        <li class="nav-item">
          <a style="width: 80px !important; height: auto !important;" href="/admin/products/{{base64_encode(3)}}"
             class="nav-link btn d-flex flex-column align-items-center justify-content-center {{($iStatus == 3 ? "active" : "")}}">
            <div class="badge bg-label-secondary rounded p-2">Archived</div>
          </a>
        </li>
      </ul>
      <hr/>
      <div class="row">
        <div id="divActionsProducts" class="col-md-12">
          <button id="btnBulkEdit" type="button"
                  class="btn rounded-pill btn-icon waves-effect btn-label-grey disabled" data-bs-toggle="tooltip"
                  data-bs-placement="bottom" data-bs-original-title="Edit All">
            <i class="ti ti-pencil"></i>
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table id="gridProducts" class="table table-condensed table-hover"
                 style="table-layout: auto;">
            <thead>
            <tr>
              <th
                data-column-id="sno"
                data-width="80">
                #
              </th>
              <th
                data-column-id="id"
                data-identifier="true"
                data-width="80">
                ID
              </th>
              <th
                data-column-id="image"
                data-type="string"
                data-align="center"
                data-width="100"
                data-header-align="center">
                Image
              </th>
              <th
                data-column-id="sku"
                data-type="string"
                data-align="left"
                data-width="100"
                data-header-align="left">
                SKU
              </th>
              <th
                data-column-id="product"
                data-align="left"
                data-type="string"
                data-width="200"
                data-header-align="left">
                Product
              </th>
              <th
                data-column-id="status"
                data-filterable="true"
                data-align="center"
                data-width="100"
                data-header-align="center">
                Status
              </th>
              <th
                data-column-id="type"
                data-width="100"
                data-type="string"
                data-header-align="left"
                data-align="left"
              >
                Type
              </th>
              <th
                data-column-id="price"
                data-width="80"
                data-header-align="left"
                data-align="center">
                Price
              </th>
              <th
                data-column-id="stock"
                data-width="80"
                data-align="center"
                data-header-align="left">
                Stock
              </th>
              <th
                data-column-id="categories"
                data-width="200"
                data-visible="false">
                Categories
              </th>
              <th
                data-column-id="action"
                data-width="120"
                data-header-align="left"
                data-align="left">
                Action
              </th>
            </tr>
            </thead>

            <tbody>
            @if(count($aProducts))
              @foreach($aProducts as $iKey => $product)
                <tr>
                  <td>{{($iKey+1)}}</td>
                  <td>{{$product->id}}</td>
                  <td><img src='{{$product->image}}' alt='No' width="50" height="40"></td>
                  <td>{{$product->sku}}</td>
                  <td>{{$product->name}}</td>
                  <td><span class="badge badge-xs {{($product->StatusId == 1 ? 'bg-success' : ($product->StatusId == 2 ? 'bg-warning' : 'bg-danger'))}}">{{$product->status}}</span></td>
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
                  <td>
                    <a href="/admin/product/view/{{base64_encode($product->id)}}" class="badge bg-success">View</a>
                    <a href="/admin/product/edit/{{base64_encode($product->id)}}" class="badge bg-info">Edit</a>
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
