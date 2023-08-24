@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')


@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/ui-carousel.css')}}" />
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
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
<script src="{{asset('assets/js/ui-carousel.js')}}"></script>
<script src="{{asset('assets/js/forms-editors.js')}}"></script>
<script src="{{asset('assets/js/forms-file-upload.js')}}"></script>
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-tagify.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection







@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Product Detail
</h4>

<div class="row">


  <!-- Earning Reports -->
  <div class="col-lg-8 mb-4">
    <div class="card h-100">
      <div class="card-body">

      <!-- Product Name Field -->
      @if(!empty($product->name))
       <div>
          <label for="defaultFormControlInput" class="form-label">Product Name : {{$product->name}}</label>
        </div>
        @endif
        @if(!empty($product->sku))
        <div>
          <label for="defaultFormControlInput" class="form-label">Product SKU : {{$product->sku}}</label>
        </div>
        @endif
        @if(!empty($product->short_description))
        <div>
          <label for="defaultFormControlInput" class="form-label">Product Short Description : {{$product->short_description}}</label>
        </div>
        @endif

      <!-- Product Description  -->
      <hr class="my-2">

 <!-- Gallery effect-->
 <div class="col-12">
    <h6 class="text-muted mt-3">Product Images</h6>
    <div id="swiper-gallery">
      <div class="swiper gallery-top">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image:url({{asset('storage/'.$product->image)}})"></div>
       @foreach($product->images as $img)
          <div class="swiper-slide" style="background-image:url({{asset('storage/'.$img->media_url)}})"></div>
       @endforeach
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper gallery-thumbs">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image:url({{asset('storage/'.$product->image)}})"></div>
          @foreach($product->images as $img)
          <div class="swiper-slide" style="background-image:url({{asset('storage/'.$img->media_url)}})"></div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
  <hr class="my-2">
      <!-- end gallery -->
    <div class="row">
    @if(!empty($product->price))

    <div class="col-sm-3">
    <label for="">Price</label>
         <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control"  value="{{$product->price}}" aria-label="Dollar amount (with dot and two decimal places)" readonly>
        </div>
    </div>
    @endif
    @if(!empty($product->stock))

      <div class="col-sm-3">
      <label for="">Stock</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
          <input type="text" class="form-control" value="{{$product->stock}}"  readonly>
        </div>
      </div>
    @endif
    @if(!empty($product->in_stock))

    <div class="col-sm-3">
    <label for="">In Stock</label>
         <div class="input-group">
          <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
          <input type="text" class="form-control"  value="{{$product->in_stock}}" readonly>
        </div>
    </div>
    @endif
    @if(!empty($product->low_stock))

      <div class="col-sm-3">
      <label for="">Low Stock</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
          <input type="text" class="form-control" value="{{$product->low_stock}}"  readonly>
        </div>
      </div>
      @endif

    </div>


      <!-- End Price -->
<!-- categories -->
<hr class="my-2">
@if(!empty($product->categories))
<label for="select2Multiple1" class="form-label">Categories</label>
            @foreach($product->categories as $cat)
                <h6 class="mb-0">{{$cat->id." - ".$cat->name}}</h6>


              @endforeach
@endif
<hr class="my-2">
<!-- end categories -->
@if(!empty($product->description))
<label for="select2Multiple1" class="form-label">Product Description</label>

                <h6 class="mb-0">{{$product->description}}</h6>


@endif
<!-- description -->

<!--end description -->

      </div>
    </div>
  </div>
  <!--/ Earning Reports -->

  <!-- Earning Reports -->
  <div class="col-lg-4 mb-4">
    <div class="card h-100">
    <div class="card-body">

    <div class="mb-3">
      @if($product->status==0)
        <div class="p-3 mb-2 bg-info text-white">Status - Pending</div>

      @elseif($product->status==1)
          <div class="p-3 mb-2 bg-success text-white">Status - Approved</div>
      @elseif($product->status==2)
      <div class="p-3 mb-2 bg-warning text-white">Status - Cancelled</div>
      @endif
    </div>

    <hr class="my-1">

        <label for="select2Basic" class="form-label">Product Type</label>
        <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true">
          <option value="AK">Option 1</option>
          <option value="HI">Option 2</option>
          <option value="CA">Option 3</option>
          <option value="NV">Option 4</option>
        </select>

        <label for="select2Basic" class="form-label">Seller</label>
        <select id="select2Basic2" class="select2 form-select form-select-lg" data-allow-clear="true">
          <option value="AK">Option 1</option>
          <option value="HI">Option 2</option>
          <option value="CA">Option 3</option>
          <option value="NV">Option 4</option>
        </select>

        <label for="select2Multiple" class="form-label">Product Tags</label>
            <select id="select2Multiple" class="select2 form-select" multiple readonly>
              <optgroup label="Alaskan/Hawaiian Time Zone">
                <option value="AK" selected>option 1</option>
                <option value="HI" selected>option 2</option>
              </optgroup>
              </select>

              <hr class="my-2">
              <label for="select2Basic" class="form-label">Online Store</label>
            <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">Option 1</option>
              <option value="HI">Option 2</option>
              <option value="CA">Option 3</option>
              <option value="NV">Option 4</option>
            </select>
            <ul>
          <li>Tag 1</li>
          <li>Tag 2</li>
          <li>Tag 3</li>
         </ul>
    </div>
    </div>
</div>
  <!--/ Earning Reports -->


<hr class="my-5">


@endsection
