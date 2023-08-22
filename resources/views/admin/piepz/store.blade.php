@extends('layouts/layoutMaster')

@section('title', 'Admin - Store')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection
<style>
  .card-link{
    border: 2px solid;
    padding: 2px;
    border-radius: 5px;
  }
</style>
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Store</h4>



<!-- Images -->
<div class="row mb-5">
  <div class="col-md-3 col-xl-3">
    <div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
        <small class="text-muted">Name</small>
         
        </div>
        <div class="dropdown">
        <small class="text-muted">$700</small>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">title</h5>
        <p class="card-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry
        </p>
        <p class="card-text">
          <small class="text-muted">printing and typesetting industry</small>
        </p>
        <a href="javascript:void(0);" class="card-link">First link</a>
        <a href="javascript:void(0);" class="card-link">Another link</a>
      </div>
      <img class="card-img-bottom" src="{{asset('assets/img/elements/1.jpg')}}" alt="Card image cap" />
    </div>
  </div>
  <div class="col-md-3 col-xl-3">
    <div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
        <small class="text-muted">Name</small>
         
        </div>
        <div class="dropdown">
        <small class="text-muted">$700</small>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">title</h5>
        <p class="card-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry
        </p>
        <p class="card-text">
          <small class="text-muted">printing and typesetting industry</small>
        </p>
        <a href="javascript:void(0);" class="card-link">First link</a>
        <a href="javascript:void(0);" class="card-link">Another link</a>
      </div>
      <img class="card-img-bottom" src="{{asset('assets/img/elements/5.jpg')}}" alt="Card image cap" />
    </div>
  </div>
  <div class="col-md-3 col-xl-3">
    <div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
        <small class="text-muted">Name</small>
         
        </div>
        <div class="dropdown">
        <small class="text-muted">$700</small>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">title</h5>
        <p class="card-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry
        </p>
        <p class="card-text">
          <small class="text-muted">printing and typesetting industry</small>
        </p>
        <a href="javascript:void(0);" class="card-link">First link</a>
        <a href="javascript:void(0);" class="card-link">Another link</a>
      </div>
      <img class="card-img-bottom" src="{{asset('assets/img/elements/7.jpg')}}" alt="Card image cap" />
    </div>
  </div>
  <div class="col-md-3 col-xl-3">
    <div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
        <small class="text-muted">Name</small>
         
        </div>
        <div class="dropdown">
        <small class="text-muted">$700</small>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">title</h5>
        <p class="card-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry
        </p>
        <p class="card-text">
          <small class="text-muted">printing and typesetting industry</small>
        </p>
        <a href="javascript:void(0);" class="card-link">First link</a>
        <a href="javascript:void(0);" class="card-link">Another link</a>
      </div>
      <img class="card-img-bottom" src="{{asset('assets/img/elements/8.jpg')}}" alt="Card image cap" />
    </div>
  </div>
  <div class="col-md-3 col-xl-3">
    <div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
        <small class="text-muted">Name</small>
         
        </div>
        <div class="dropdown">
        <small class="text-muted">$700</small>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">title</h5>
        <p class="card-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry
        </p>
        <p class="card-text">
          <small class="text-muted">printing and typesetting industry</small>
        </p>
        <a href="javascript:void(0);" class="card-link">First link</a>
        <a href="javascript:void(0);" class="card-link">Another link</a>
      </div>
      <img class="card-img-bottom" src="{{asset('assets/img/elements/6.jpg')}}" alt="Card image cap" />
    </div>
  </div>
  <div class="col-md-3 col-xl-3">
    <div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
        <small class="text-muted">Name</small>
         
        </div>
        <div class="dropdown">
        <small class="text-muted">$700</small>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">title</h5>
        <p class="card-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry
        </p>
        <p class="card-text">
          <small class="text-muted">printing and typesetting industry</small>
        </p>
        <a href="javascript:void(0);" class="card-link">First link</a>
        <a href="javascript:void(0);" class="card-link">Another link</a>
      </div>
      <img class="card-img-bottom" src="{{asset('assets/img/elements/7.jpg')}}" alt="Card image cap" />
    </div>
  </div>
  <div class="col-md-3 col-xl-3">
    <div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
        <small class="text-muted">Name</small>
         
        </div>
        <div class="dropdown">
        <small class="text-muted">$700</small>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">title</h5>
        <p class="card-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry
        </p>
        <p class="card-text">
          <small class="text-muted">printing and typesetting industry</small>
        </p>
        <a href="javascript:void(0);" class="card-link">First link</a>
        <a href="javascript:void(0);" class="card-link">Another link</a>
      </div>
      <img class="card-img-bottom" src="{{asset('assets/img/elements/8.jpg')}}" alt="Card image cap" />
    </div>
  </div>
  <div class="col-md-3 col-xl-3">
    <div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
        <small class="text-muted">Name</small>
         
        </div>
        <div class="dropdown">
        <small class="text-muted">$700</small>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">title</h5>
        <p class="card-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry
        </p>
        <p class="card-text">
          <small class="text-muted">printing and typesetting industry</small>
        </p>
        <a href="javascript:void(0);" class="card-link">First link</a>
        <a href="javascript:void(0);" class="card-link">Another link</a>
      </div>
      <img class="card-img-bottom" src="{{asset('assets/img/elements/9.jpg')}}" alt="Card image cap" />
    </div>
  </div>

</div>
<!--/ Images -->



@endsection
