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
<form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data" >

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Product Add
</h4>
<div class="row">


  <!-- Earning Reports -->
  <div class="col-lg-8 mb-4">

      @if(session('success'))
       <div class="alert alert-sucess">
          <h1>{{session('success')}}</h1>
       </div>
      @endif
    <div class="card h-100">
      <div class="card-body">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <!-- Product Name Field -->
      <div>
          <label for="defaultFormControlInput" class="form-label">Title</label>
          <input type="text" class="form-control" id="defaultFormControlInput" placeholder="simply dummy text of the printing and typesetting industry" aria-describedby="defaultFormControlHelp" / name="name">
        </div>
      <!-- Product Description  -->
      <hr class="my-5">
      <div>
      <label for="defaultFormControlInput" class="form-label">Product Description</label>
      <br>
     <textarea name="description" id="summernote"></textarea>
     </div>
     <hr class="my-5">

     <div>
          <label for="defaultFormControlInput" class="form-label">Short Descirption</label>
          <br>

     <textarea name="short_description" id="summernote"></textarea>

        </div>
         <!--<div id="snow-toolbar">
          <span class="ql-formats">
            <select class="ql-font"></select>
            <select class="ql-size"></select>
          </span>
          <span class="ql-formats">
            <button class="ql-bold"></button>
            <button class="ql-italic"></button>
            <button class="ql-underline"></button>
            <button class="ql-strike"></button>
          </span>
          <span class="ql-formats">
            <select class="ql-color"></select>
            <select class="ql-background"></select>
          </span>
          <span class="ql-formats">
            <button class="ql-script" value="sub"></button>
            <button class="ql-script" value="super"></button>
          </span>
          <span class="ql-formats">
            <button class="ql-header" value="1"></button>
            <button class="ql-header" value="2"></button>
            <button class="ql-blockquote"></button>
            <button class="ql-code-block"></button>
          </span>
        </div>
        <div id="snow-editor">
          <h6></h6>
          <p> </p>
        </div> -->


      <!-- Product Description End -->

      <!-- File Upload -->
          <!-- Basic  -->
          <hr class="my-5">
  <label for="defaultFormControlInput" class="form-label">Product Feature Image</label>

        <!-- <form action="/upload" class="dropzone needsclick" id="dropzone-basic"> -->
          <!-- <div class="dz-message needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
          </div> -->
          <div class="fallback">
            <input name="images[]" type="file" /  multiple>
          </div>


      <!-- /Basic  -->
      <!-- File Upload End -->

      <hr class="my-5">

      <!-- prices -->
    <div class="row">

    <div class="col-md-6">
         <div class="input-group">
          <span class="input-group-text">SKU</span>
          <input type="text" class="form-control" placeholder="149" aria-label="Dollar amount (with dot and two decimal places)" name="sku">
        </div>
    </div>
    <br>
      <br>
    <div class="col-md-6">
         <div class="input-group">
          <span class="input-group-text">Price ($)</span>
          <input type="text" class="form-control" placeholder="149" aria-label="Dollar amount (with dot and two decimal places)" name="price">
        </div>
    </div>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">Stock</span>
          <input type="number" class="form-control" placeholder="1349" aria-label="Dollar amount (with dot and two decimal places)" name="stock">
        </div>
      </div>

      <br>
      <br>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">In Stock</span>
          <input type="number" class="form-control" placeholder="349" aria-label="Dollar amount (with dot and two decimal places)" name="in_stock">
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">Low Stock</span>
          <input type="number" class="form-control" placeholder="349" aria-label="Dollar amount (with dot and two decimal places)" name="low_stock">
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
            <option value="1">Active</option>
            <!-- <option value="2">Draft</option> -->
            <option value="0">UnAvailable</option>
          </select>
    </div>



    <!-- <hr class="my-5">

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
              </li> -->
            <!-- </ul> -->

            <!-- <hr class="my-5">

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
                  <option value="{{$category->name}}">{{$category->name}}</option>
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
