@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

@section('vendor-style')



<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />

<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />


@endsection

@section('vendor-script')



<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>

@endsection

@section('page-script')


<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection






@section('content')
<form action="{{route('vendor.product.store')}}" method="POST" enctype="multipart/form-data" >

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Product Add
</h4>
<div class="row">


  <!-- Earning Reports -->
  <div class="col-lg-8 mb-4">

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
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="defaultFormControlInput" placeholder="simply dummy text of the printing and typesetting industry" aria-describedby="defaultFormControlHelp" value="{{old('name')}}"
 name="name">
 <br>
 @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
      <!-- Product Description  -->
      <hr class="my-5">
      <div>
      <label for="defaultFormControlInput" class="form-label">Product Description</label>
      <br>
     <textarea class="@error('description') is-invalid @enderror" name="description" id="summernote" >{{old('description')}}</textarea>
     </div>
     <br>
     @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
     <hr class="my-5">

     <div>
          <label for="defaultFormControlInput" class="form-label" >Short Descirption</label>
          <br>

     <textarea class="@error('short_description') is-invalid @enderror" name="short_description" id="summernote" >{{old('short_description')}}</textarea>
<br>
@error('short_description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>



      <!-- File Upload -->
          <!-- Basic  -->
          <hr class="my-5">
  <label for="defaultFormControlInput" class="form-label">Product Feature Image</label>


          <div class="fallback">
            <input name="images[]" type="file" class="@error('images') is-invalid @enderror"  multiple >
          </div>
          <br>
          @error('images')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
      <!-- /Basic  -->
      <!-- File Upload End -->

      <hr class="my-5">

      <!-- prices -->
    <div class="row">

    <div class="col-md-6">
         <div class="input-group">
          <span class="input-group-text">SKU</span>
          <input type="text" class="form-control @error('sku') is-invalid @enderror" placeholder="149" aria-label="Dollar amount (with dot and two decimal places)" value="{{old('sku')}}" name="sku">
        </div>
        <br>
        @error('sku')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
    <br>
      <br>
    <div class="col-md-6">
         <div class="input-group">
          <span class="input-group-text">Price ($)</span>
          <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="149" aria-label="Dollar amount (with dot and two decimal places)" name="price" value="{{old('price')}}">
        </div>
        <br>
        @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">Stock</span>
          <input type="number" class="form-control @error('stock') is-invalid @enderror" placeholder="1349" aria-label="Dollar amount (with dot and two decimal places)" name="stock" value="{{old('stock')}}">
        </div>
        <br>
        @error('stock')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
      </div>

      <br>
      <br>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">In Stock</span>
          <input type="number" class="form-control @error('in_stock') is-invalid @enderror" placeholder="349" aria-label="Dollar amount (with dot and two decimal places)" name="in_stock" value="{{old('in_stock')}}">
        </div>
        <br>
        @error('in_stock')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
      </div>
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">Low Stock</span>
          <input type="number" class="form-control @error('low_stock') is-invalid @enderror" placeholder="349" aria-label="Dollar amount (with dot and two decimal places)" name="low_stock" value="{{old('low_stock')}}">
        </div>
        <br>
        @error('low_stock')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
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
            <option value="1">Active</option>
            <!-- <option value="2">Draft</option> -->
            <option value="0">UnAvailable</option>
          </select>
    </div>




            <hr class="my-5">

            <label for="select2Basic" class="form-label">Product Categories</label>
            <select id="select2Basic1" class="select2 form-select form-select-lg @error('category[]') is-invalid @enderror" data-allow-clear="true" name="category[]" multiple>
              @if($categories->count())
                @foreach($categories as $category)
                  <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
              @endif

            </select>
            <br>
            @error('category')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

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
                <option value="{{$vendor->id}}">{{$vendor->first_name ." ".$vendor->last_name}}</option>
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

              <hr class="my-5">
              <label for="select2Basic" class="form-label">Is Feature</label>
            <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true" name="is_featured">
              <option value="1">Yes</option>

              <option value="0">No</option>
            </select>

    </div>
    @csrf

    </div>
</div>
<div class="row">

<div class="col-12">
    <div class="card mb-4">
      <div class="card-body">
        <div class="demo-inline-spacing">
          <button type="submit" class="btn btn-primary">ADD PRODUCT</button>
        </div>
      </div>

    </div>
  </div>
</div>
</form>
  <!--/ Earning Reports -->


<hr class="my-5">


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
