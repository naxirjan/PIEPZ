@extends('layouts/layoutMaster')

@section('title', 'Addons Services')

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
</style>
<div class="row">
  <div class="col-md-3">
    <nav class="sidebar card py-2 mb-4">
      <ul class="nav flex-column" id="nav_accordion">
        <li class="nav-item">
          <a class="nav-link" href="#">Trending <i class="fa-solid fa-angle-down"></i></a>
          <ul class="submenu collapse show">
           
            <li><a class="nav-link" href="#">Submenu item 2 </a></li>
            <li><a class="nav-link" href="#">Submenu item 3 </a> </li>
          </ul>
        </li>
        <li class="nav-item has-submenu ">
          <a class="nav-link" href="#">Digital Marketing <i class="fa-solid fa-angle-down"></i></a>
          <ul class="submenu collapse show">
            <li><a class="nav-link" href="#">Submenu item 4 </a></li>
            <li><a class="nav-link" href="#">Submenu item 5 </a></li>
            <li><a class="nav-link" href="#">Submenu item 6 </a> </li>
          </ul>
        </li>
        <li class="nav-item has-submenu">
          <a class="nav-link" href="#">Social Media <i class="fa-solid fa-angle-down"></i></a>
          <ul class="submenu collapse show">
            <li><a class="nav-link" href="#">Submenu item 7 </a></li>
            <li><a class="nav-link" href="#">Submenu item 8 </a></li>
            <li><a class="nav-link" href="#">Submenu item 9 </a></li>
            <li><a class="nav-link" href="#">Submenu item 10 </a></li>
          </ul>
        </li>
    
        <li class="nav-item">
          <a class="nav-link" href="#">Berekenen <i class="fa-solid fa-angle-down"></i></a>
          <ul class="submenu collapse">
            <li><a class="nav-link" href="#">Submenu item 11 </a></li>
            <li><a class="nav-link" href="#">Submenu item 12 </a></li>
            <li><a class="nav-link" href="#">Submenu item 13 </a></li>
            <li><a class="nav-link" href="#">Submenu item 14 </a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Dierproducten <i class="fa-solid fa-angle-down"></i></a>
          <ul class="submenu collapse">
            <li><a class="nav-link" href="#">Submenu item 15 </a></li>
            <li><a class="nav-link" href="#">Submenu item 16 </a></li>
            <li><a class="nav-link" href="#">Submenu item 17 </a></li>
            <li><a class="nav-link" href="#">Submenu item 18 </a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Baby</a>
          <ul class="submenu collapse">
            <li><a class="nav-link" href="#">Activiteit en entertainment <i class="fa-solid fa-angle-down"></i></a></li>
            <li><a class="nav-link" href="#">Submenu item 2 </a></li>
            <li><a class="nav-link" href="#">Submenu item 3 </a> </li>
          </ul>
        </li>
        <li class="nav-item has-submenu">
          <a class="nav-link" href="#">Auto en motor <i class="fa-solid fa-angle-down"></i></a>
          <ul class="submenu collapse">
            <li><a class="nav-link" href="#">Submenu item 4 </a></li>
            <li><a class="nav-link" href="#">Submenu item 5 </a></li>
            <li><a class="nav-link" href="#">Submenu item 6 </a> </li>
          </ul>
        </li>
        <li class="nav-item has-submenu">
          <a class="nav-link" href="#">Bagage <i class="fa-solid fa-angle-down"></i></a>
          <ul class="submenu collapse">
            <li><a class="nav-link" href="#">Submenu item 7 </a></li>
            <li><a class="nav-link" href="#">Submenu item 8 </a></li>
            <li><a class="nav-link" href="#">Submenu item 9 </a></li>
            <li><a class="nav-link" href="#">Submenu item 10 </a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Berekenen <i class="fa-solid fa-angle-down"></i></a>
          <ul class="submenu collapse">
            <li><a class="nav-link" href="#">Submenu item 11 </a></li>
            <li><a class="nav-link" href="#">Submenu item 12 </a></li>
            <li><a class="nav-link" href="#">Submenu item 13 </a></li>
            <li><a class="nav-link" href="#">Submenu item 14 </a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Dierproducten <i class="fa-solid fa-angle-down"></i></a>
          <ul class="submenu collapse">
            <li><a class="nav-link" href="#">Submenu item 15 </a></li>
            <li><a class="nav-link" href="#">Submenu item 16 </a></li>
            <li><a class="nav-link" href="#">Submenu item 17 </a></li>
            <li><a class="nav-link" href="#">Submenu item 18 </a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>

  <div class="col-md-9">
    
    <h5 class="card-title mb-3">Digital Marketing</h5>

    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-12 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4 mb-3">
                <img src="{{asset('assets/img/elements/14.jpg')}}" class="img-fluid rounded" alt="view sales">
              </div>
            </div>
            <div class="col-12">
              <div class="card-body text-nowrap pt-0">
                <h5 class="card-title mb-2">Speelkleed</h5>
                <h4 class="text-primary mb-3">$48.9k</h4>
                
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
                <img src="{{asset('assets/img/elements/14.jpg')}}" class="img-fluid rounded" alt="view sales">
              </div>
            </div>
            <div class="col-12">
              <div class="card-body text-nowrap pt-0">
                <h5 class="card-title mb-2">Speelkleed</h5>
                <h4 class="text-primary mb-3">$48.9k</h4>
                
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
                <img src="{{asset('assets/img/elements/14.jpg')}}" class="img-fluid rounded" alt="view sales">
              </div>
            </div>
            <div class="col-12">
              <div class="card-body text-nowrap pt-0">
                <h5 class="card-title mb-2">Speelkleed</h5>
                <h4 class="text-primary mb-3">$48.9k</h4>
                
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
                <img src="{{asset('assets/img/elements/14.jpg')}}" class="img-fluid rounded" alt="view sales">
              </div>
            </div>
            <div class="col-12">
              <div class="card-body text-nowrap pt-0">
                <h5 class="card-title mb-2">Speelkleed</h5>
                <h4 class="text-primary mb-3">$48.9k</h4>
                
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
                <img src="{{asset('assets/img/elements/14.jpg')}}" class="img-fluid rounded" alt="view sales">
              </div>
            </div>
            <div class="col-12">
              <div class="card-body text-nowrap pt-0">
                <h5 class="card-title mb-2">Speelkleed</h5>
                <h4 class="text-primary mb-3">$48.9k</h4>
                
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
                <img src="{{asset('assets/img/elements/14.jpg')}}" class="img-fluid rounded" alt="view sales">
              </div>
            </div>
            <div class="col-12">
              <div class="card-body text-nowrap pt-0">
                <h5 class="card-title mb-2">Speelkleed</h5>
                <h4 class="text-primary mb-3">$48.9k</h4>
                
              </div>
            </div>
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
