@extends('layouts/layoutMaster')

@section('title', 'Cards basic - UI elements')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Webshops</h4>

<!-- Examples -->
<div class="row mb-5">
 
<!-- card1 -->
  <div class="col-md-3 col-lg-3 mb-3">
    <div class="card h-100">
    <div class="card-header">
        <div class="d-flex justify-content-between">
          <small class="d-block mb-1 text-muted">Title</small>
          <p class="card-text text-success">$5965</p>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">Product Name</h5>
        <h6 class="card-subtitle text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
        <br>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        <div class="demo-inline-spacing">
          <button type="button" class="btn btn-outline-warning">btn 1</button>
          <button type="button" class="btn btn-outline-secondary">btn 2</button>
        </div>
        
    </div>
      <img class="img-fluid" src="{{asset('assets/img/elements/10.jpg')}}" alt="Card image cap" />
     
    </div>
  </div>
  <!-- card2 -->
  <div class="col-md-3 col-lg-3 mb-3">
    <div class="card h-100">
    <div class="card-header">
        <div class="d-flex justify-content-between">
          <small class="d-block mb-1 text-muted">Title</small>
          <p class="card-text text-success">$5965</p>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">Product Name</h5>
        <h6 class="card-subtitle text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
        <br>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        <div class="demo-inline-spacing">
          <button type="button" class="btn btn-outline-warning">btn 1</button>
          <button type="button" class="btn btn-outline-secondary">btn 2</button>
        </div>
        
    </div>
      <img class="img-fluid" src="{{asset('assets/img/elements/10.jpg')}}" alt="Card image cap" />
     
    </div>
  </div>
  <!-- card3 -->
  <div class="col-md-3 col-lg-3 mb-3">
    <div class="card h-100">
    <div class="card-header">
        <div class="d-flex justify-content-between">
          <small class="d-block mb-1 text-muted">Title</small>
          <p class="card-text text-success">$5965</p>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">Product Name</h5>
        <h6 class="card-subtitle text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
        <br>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        <div class="demo-inline-spacing">
          <button type="button" class="btn btn-outline-warning">btn 1</button>
          <button type="button" class="btn btn-outline-secondary">btn 2</button>
        </div>
        
    </div>
      <img class="img-fluid" src="{{asset('assets/img/elements/10.jpg')}}" alt="Card image cap" />
     
    </div>
  </div>
  <!-- card4 -->
  <div class="col-md-3 col-lg-3 mb-3">
    <div class="card h-100">
    <div class="card-header">
        <div class="d-flex justify-content-between">
          <small class="d-block mb-1 text-muted">Title</small>
          <p class="card-text text-success">$5965</p>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">Product Name</h5>
        <h6 class="card-subtitle text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
        <br>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        <div class="demo-inline-spacing">
          <button type="button" class="btn btn-outline-warning">btn 1</button>
          <button type="button" class="btn btn-outline-secondary">btn 2</button>
        </div>
        
    </div>
      <img class="img-fluid" src="{{asset('assets/img/elements/10.jpg')}}" alt="Card image cap" />
     
    </div>
  </div>

</div>
<!-- Examples -->

<!-- Navigation -->
<div class="row mb-5">
<div class="col-xl-12">
    <h6 class="text-muted">Information</h6>
    <div class="nav-align-left nav-tabs-shadow mb-4">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-left-home" aria-controls="navs-left-home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-left-profile" aria-controls="navs-left-profile" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-left-messages" aria-controls="navs-left-messages" aria-selected="false">category name</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-left-home">
          <p>
            Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear
            claw
            candy topping.
          </p>
          <p class="mb-0">
            Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o
            jelly-o ice
            cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
          </p>
        </div>
        <div class="tab-pane fade" id="navs-left-profile">
          <p>
            Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice cream. Gummies
            halvah
            tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream cheesecake fruitcake.
          </p>
          <p class="mb-0">
            Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah cotton candy
            liquorice caramels.
          </p>
        </div>
        <div class="tab-pane fade" id="navs-left-messages">
          <p>
            Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi
            bears
            cake chocolate.
          </p>
          <p class="mb-0">
            Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing
            sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
            jelly.
          </p>
        </div>
      </div>
    </div>
  </div>
 
</div>
<!--/ Navigation -->




@endsection
