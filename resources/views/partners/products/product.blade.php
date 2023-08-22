@extends('layouts/layoutMaster')

@section('title', 'Checkout')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
@endsection

@section('content')
<!-- Sticky Actions -->
<style>

  .sidebar ul {
    padding: 0;
    margin: 0;
  }
  .sidebar li li { 
    list-style: none; 
    margin: 0; 
    padding: 0; 
    padding-left: 1rem;
  }

  .w-px-145 {
    width: 145px;
  }

  .gap-5px {
    gap: 5px;
  }

  .max-height-140 {
    max-height: 140px;
    object-fit: cover;
  }
</style>
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="row g-0">
        <div class="col-md-3">
          <img class="card-img card-img-right" src="{{asset('assets/img/products/1.png')}}" alt="Card image" />
          <div class="row mb-3">
            <div class="col-md-4">
              <img class="card-img card-img-right" src="{{asset('assets/img/products/1.png')}}" alt="Card image" />
            </div>
            <div class="col-md-4">
              <img class="card-img card-img-right" src="{{asset('assets/img/products/1.png')}}" alt="Card image" />
            </div>
            <div class="col-md-4">
              <img class="card-img card-img-right" src="{{asset('assets/img/products/1.png')}}" alt="Card image" />
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Activiteit en entertainment</h5>
                <p class="card-text">
                  This is a wider card with supporting text below as a natural lead-in to additional content. This content
                  is a little bit longer.
                </p>
                <p class="card-text"><small class="text-muted">Brand: Amazon</small></p>
                <hr/>
                <h2 class="text-primary mb-3">$480</h2>
                <hr/>
                <p class="card-text"><small class="text-muted">Quantity: </small> <input type="number" class="form-control form-control-sm w-px-75 mb-3" value="1" min="1" max="5"></p>
                
                <a href="javascript:;" class="btn btn-primary waves-effect waves-light">Order Now</a>
                <a href="javascript:;" class="btn btn-outline-primary waves-effect" style="margin-left: 5px;">Add To Cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-9">
    

    <div class="row">
      <div class="col-12">
        <h5 class="card-title mb-3">Verberg producten</h5>
        <div class="card mb-4">
          <div class="card-body">
            <ul class="mb-4">
              <li>
                Verberg producten
              </li>
              <li>
                Verberg producten
              </li>
              <li>
                Verberg producten
                <ul class="mb-1 mt-1">
                  <li>
                    Verberg producten
                  </li>
                  <li>
                    Verberg producten
                  </li>
                  <li>
                    Verberg producten
                  </li>
                </ul>
              </li>
              <li>
                Verberg producten
              </li>
              <li>
                Verberg producten
              </li>
              <li>
                Verberg producten
              </li>
              <li>
                Verberg producten
              </li>
              <li>
                Verberg producten
              </li>
            </ul>
            <p class="card-text">
              This is a wider card with supporting text below as a natural lead-in to additional content. This content
              is a
              little bit longer.
              This is a wider card with supporting text below as a natural lead-in to additional content. This content
              is a
              little bit longer.
              This is a wider card with supporting text below as a natural lead-in to additional content. This content
              is a
              little bit longer.
              This is a wider card with supporting text below as a nat
            </p>
            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h5 class="card-title mb-3">Verberg producten</h5>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-12 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4 mb-3">
                <img src="{{asset('assets/img/elements/4.jpg')}}" class="img-fluid rounded" alt="view sales">
              </div>
            </div>
            <div class="col-12">
              <div class="card-body text-nowrap pt-0">
                <h5 class="card-title mb-2">Speelkleed</h5>
                <h4 class="text-primary mb-3">$48.9k</h4>
                <a href="javascript:;" class="btn btn-primary w-100">Order Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-12 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4 mb-3">
                <img src="{{asset('assets/img/elements/4.jpg')}}" class="img-fluid rounded" alt="view sales">
              </div>
            </div>
            <div class="col-12">
              <div class="card-body text-nowrap pt-0">
                <h5 class="card-title mb-2">Speelkleed</h5>
                <h4 class="text-primary mb-3">$48.9k</h4>
                <a href="javascript:;" class="btn btn-primary w-100">Order Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-12 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4 mb-3">
                <img src="{{asset('assets/img/elements/4.jpg')}}" class="img-fluid rounded" alt="view sales">
              </div>
            </div>
            <div class="col-12">
              <div class="card-body text-nowrap pt-0">
                <h5 class="card-title mb-2">Speelkleed</h5>
                <h4 class="text-primary mb-3">$48.9k</h4>
                <a href="javascript:;" class="btn btn-primary w-100">Order Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <h5 class="card-title mb-3">Verberg producten</h5>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="row g-0 align-items-center">
            <div class="col-md-4">
              <img class="card-img card-img-right" src="{{asset('assets/img/products/1.png')}}" alt="Card image" />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <p class="mb-0">This is a wider card with supporting.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h5 class="card-title mb-3 mt-4">Verberg producten</h5>
      <div class="col-12">
        <div class="card bg-dark border-0 text-white mb-3">
          <img class="card-img max-height-140" src="{{asset('assets/img/elements/8.jpg')}}" alt="Card image">
          <div class="card-img-overlay">
            <h5 class="card-title text-white">Card title</h5>
            <a href="javascript:;" class="btn btn-primary waves-effect waves-light">See All</a>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card bg-dark border-0 text-white mb-3">
          <img class="card-img max-height-140" src="{{asset('assets/img/elements/8.jpg')}}" alt="Card image">
          <div class="card-img-overlay">
            <h5 class="card-title text-white">Card title</h5>
            <a href="javascript:;" class="btn btn-primary waves-effect waves-light">See All</a>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card bg-dark border-0 text-white mb-3">
          <img class="card-img max-height-140" src="{{asset('assets/img/elements/8.jpg')}}" alt="Card image">
          <div class="card-img-overlay">
            <h5 class="card-title text-white">Card title</h5>
            <a href="javascript:;" class="btn btn-primary waves-effect waves-light">See All</a>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card bg-dark border-0 text-white mb-3">
          <img class="card-img max-height-140" src="{{asset('assets/img/elements/8.jpg')}}" alt="Card image">
          <div class="card-img-overlay">
            <h5 class="card-title text-white">Card title</h5>
            <a href="javascript:;" class="btn btn-primary waves-effect waves-light">See All</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Sticky Actions -->

<script>
  document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
// DOMContentLoaded  end
</script>
@endsection
