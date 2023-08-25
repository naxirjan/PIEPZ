@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


@section('vendor-style')

<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/ui-carousel.css')}}" />
@endsection
@section('vendor-script')

<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>
@endsection

@section('page-script')

<script src="{{asset('assets/js/ui-carousel.js')}}"></script>
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection






@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Product Edit
</h4>
<form action="{{route('vendor.product.update')}}" method="POST" enctype="multipart/form-data" >
@csrf
<input type="hidden" value="{{$product->id}}" name="product_id">
<div class="row">


  <!-- Earning Reports -->
  <div class="col-lg-8 mb-4">
  @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      @if(session('success'))
       <div class="alert alert-success">
          {{session('success')}}
       </div>
     @endif
    <div class="card h-100">
      <div class="card-body">

      <!-- Product Name Field -->
      <div>
          <label for="defaultFormControlInput" class="form-label">Title</label>
          <input type="text" class="form-control" name="name" id="defaultFormControlInput" placeholder="simply dummy text of the printing and typesetting industry" aria-describedby="defaultFormControlHelp"  value="{{$product->name}}" />
        </div>
      <!-- Product Description  -->
      <hr class="my-5">
        <div>
          <label for="defaultFormControlInput" class="form-label">Product Description</label>
          <br>
          <textarea name="description" id="summernote">{!! $product->description !!}</textarea>
        </div>


     <hr class="my-5">
        <div>
          <label for="defaultFormControlInput" class="form-label">Short Descirption</label>
          <br>
          <textarea name="short_description" id="summernote">{!! $product->short_description !!}</textarea>
        </div>




 <div class="col-12">

    <div class="col-12">
    <h6 class="text-muted mt-3">Product Gallery</h6>
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

    <input name="images[]" type="file" /  multiple>

  </div>
      <!-- File Upload End -->

      <hr class="my-5">

      <!-- prices -->
    <div class="row">

    <div class="col-md-12">
         <div class="input-group">
          <span class="input-group-text">SKU</span>
          <input type="text" class="form-control" placeholder="149" aria-label="Dollar amount (with dot and two decimal places)" name="sku" value="{{$product->sku}}">
        </div>
    </div>

    <div class="col-md-6">
         <div class="input-group">
          <span class="input-group-text">Price ($)</span>
          <input type="text" class="form-control" value="{{$product->price}}" placeholder="149" aria-label="Dollar amount (with dot and two decimal places)" name="price">
        </div>
    </div>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">Stock</span>
          <input type="number" class="form-control" value="{{$product->stock}}" placeholder="1349" aria-label="Dollar amount (with dot and two decimal places)" name="stock">
        </div>
      </div>

      <br>
      <br>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">In Stock</span>
          <input type="number" class="form-control" value="{{$product->in_stock}}" placeholder="349" aria-label="Dollar amount (with dot and two decimal places)" name="in_stock">
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">Low Stock</span>
          <input type="number" class="form-control" value="{{$product->low_stock}}" placeholder="349" aria-label="Dollar amount (with dot and two decimal places)" name="low_stock">
        </div>
      </div>

    </div>


      <!-- End Price -->


      </div>
    </div>
  </div>
  <!--/ Earning Reports -->

  <!-- Earning Reports -->
  <div class="col-lg-4 mb-4">
    <div class="card h-100">
    <div class="card-body">

    <div class="mb-3">
          <label for="defaultSelect" class="form-label">Status</label>
          <select id="defaultSelect" class="form-select" name="status">
            <option value="1" @if($product->status==1) selected @endif>Active</option>
            <!-- <option value="2">Draft</option> -->
            <option value="0" @if($product->status==0) selected @endif>UnAvailable</option>
          </select>
    </div>



    <hr class="my-5">
<!--
    <label for="defaultFormControlInput" class="form-label">Sales channels and apps Manage</label>
<br><br>
    <ul class="list-unstyled mb-0">

              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="{{ asset('assets/img/icons/brands/react-label.png') }}" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Onlinewinkel</h6>
                      <small class="text-muted">Beschikbaarheid plannen</small>
                    </div>
                  </div>

                </div>
              </li>

              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="{{ asset('assets/img/icons/brands/react-label.png') }}" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Facebook & Instagram</h6>
                      <small class="text-muted">Facebook & Instagram</small>
                    </div>
                  </div>

                </div>
              </li>
              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="{{ asset('assets/img/icons/brands/react-label.png') }}" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Google & YouTube</h6>
                      <small class="text-muted">Beschikbaarheid plannen</small>
                    </div>
                  </div>

                </div>
              </li>

              <li class="text-center">
                <a href="javascript:;">View all teams</a>
              </li>
            </ul>

            <hr class="my-5">

            <div class="size" style="display:flex;">
            <h6>Inzichten</h6> <span style="margin-left:20px;"></span><h6>    Afgelopen 90 dagen</h6>
            </div>
            <p>12 eenheden verkocht aan 14 klantvoor € 1.197,01 aan netto-omzet.</p>
            <a href="#">Details bekijken</a> -->

            <hr class="my-5">

            <label for="select2Basic" class="form-label">Product Categories</label>
            <select id="select2Basic1" class="select2 form-select form-select-lg" data-allow-clear="true" name="category[]" multiple>
              @if($categories->count())
                @foreach($categories as $category)
                  @foreach($product->category as $p_cat)
                  <option value="{{$category->name}}" @if($p_cat->id==$category->id) selected @endif>{{$category->name}}</option>
                @endforeach

                @endforeach
              @endif

            </select>


            <label for="select2Basic" class="form-label">Product Type</label>
        <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="type">
          <option value="simple">Simple</option>
          <!-- <option value="HI">Option 2</option>
          <option value="CA">Option 3</option>
          <option value="NV">Option 4</option> -->
        </select>

        <label for="select2Basic" class="form-label">Seller</label>
        <select id="select2Basic2" class="select2 form-select form-select-lg" data-allow-clear="true" name="seller">
          @if($vendors->count())
            @foreach($vendors as $vendor)
                <option value="{{$vendor->id}}" @if($product->user_id==$vendor->id) selected @endif>{{$vendor->first_name ." ".$vendor->last_name}}</option>
            @endforeach
          @endif
        </select>

        <label for="select2Multiple" class="form-label">Product Tags</label>
            <select id="select2Multiple" class="select2 form-select" multiple>
              <optgroup label="Alaskan/Hawaiian Time Zone">
                <option value="AK" selected>option 1</option>
                <option value="HI" selected>option 2</option>
              </optgroup>
              </select>

              <!-- <hr class="my-5">
              <label for="select2Basic" class="form-label">Online Store</label>
            <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">Option 1</option>
              <option value="HI">Option 2</option>
              <option value="CA">Option 3</option>
              <option value="NV">Option 4</option>
            </select> -->
            <hr class="my-5">
              <label for="select2Basic" class="form-label">Is Feature</label>
            <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true" name="is_featured">
              <option value="1" @if($product->is_featured==1) selected @endif>Yes</option>

              <option value="0" @if($product->is_featured==0) selected @endif>No</option>
            </select>

    </div>

    </div>

</div>
  <!--/ Earning Reports -->



<div class="row">

<div class="col-12">
    <div class="card mb-4">
      <div class="card-body">
        <div class="demo-inline-spacing">
          <button type="submit" class="btn btn-primary">EDIT SAVE</button>
        </div>
      </div>

    </div>
  </div>
</div>
</form>


<script>
  $('textarea#summernote').summernote({
        placeholder: 'Description',
        tabsize: 2,
        height: 100,
  toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        //['fontname', ['fontname']],
       // ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        //['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
      });
</script>

@endsection
