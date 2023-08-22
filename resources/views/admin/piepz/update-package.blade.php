@extends('layouts/layoutMaster')

@section('title', ' Horizontal Layouts - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />

<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>

<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>

<script src="{{asset('assets/js/forms-editors.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
      </div>
      <div class="card-body">
        <form  id="SubmitForm">
          @csrf
          <input type="hidden" name="id" id="id" value="{{ $package->id }}">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
            <div class="col-sm-10">
              <input type="text" name="package_title" id="name" value="{{ $package->package_title }}" class="form-control" id="basic-default-name" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-price">Price</label>
            <div class="col-sm-10">
              <input type="text" name="package_price" id="price" value="{{ $package->package_price }}" class="form-control" id="basic-default-price"/>
            </div>
          </div>

            <!-- Full Editor -->
            <div class="col-12">
                <h5 class="card-header">Package Features</h5>
                <div class="card-body">


                  <div id="full-editor">
                       <div id="description">
                       {!! $package->package_description !!}
                       </div>
                  </div>

                </div>

            </div>
            <!-- /Full Editor -->

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

$('#SubmitForm').on('submit',function(e){
    e.preventDefault();

    let id = $('#id').val();
    let name = $('#name').val();
    let price = $('#price').val();

    listPrice = parseFloat(price);
    discount  = parseFloat(12);
    let month_6= listPrice - ( listPrice * discount / 100 ).toFixed(2); // Sale price for 6 month


    discount2  = parseFloat(25);
    let month_12= listPrice - ( listPrice * discount2 / 100 ).toFixed(2); // Sale price for 12 month

    let discount_price = price+","+month_6+","+month_12;


    let  description= $('.ql-editor').html();


    $.ajax({
      url: "/admin/update-package",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        id:id,
        name:name,
        price:price,
        description:description,
        discount_price:discount_price,

      },
      success:function(response){
        // $('#successMsg').show();
        // console.log(response);
        window.location.href = "/admin/piepz/packages";

      },
      error: function(response) {
       console.log("errors")
      },
      });
    });
  </script>

@endsection
