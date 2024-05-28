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

  .price-range-slider {
    width: 80%;
    margin: 20px auto;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="range"] {
    width: 100%;
}

</style>
<div class="row">
  <div class="col-md-3">
    <nav class="sidebar card py-2 mb-4">
      <ul class="nav flex-column" id="nav_accordion">

      @foreach ($categories as $category)
    
     
        <li class="nav-item has-submenu">
          <a class="nav-link" href="#">{{ $category->name }} 
            @if(count($category->subCategories)>0)
            <i class="fa-solid fa-angle-down"></i>
            @endif
          </a>
          <ul class="submenu collapse">
          
          @foreach ($category->subCategories as $subCategory)
            <li><a class="nav-link" href="{{route('partner.products.collection',['data'=>'categories','sub_category'=>$subCategory->id])}}">{{ $subCategory->name }} </a></li>
            @endforeach
          </ul>
        </li>
        @endforeach

      </ul>
    

    </nav>
  </div>

  <div class="col-md-9">
    <div class="card mb-3">
  
     
      @if((request()->category) && !empty(request()->category))
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Activiteit en entertainment</h5>
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
        <div class="col-md-4">
          <img class="card-img card-img-right" src="{{asset('assets/img/products/1.png')}}" alt="Card image" />
        </div>
      </div>
      @endif
    </div>

@if(isset($subcategories) && !empty($subcategories))
    <h5 class="card-title mb-3">Verberg producten</h5>
    <div class="row">
    @foreach ($subcategories as $sub)
      <div class="col-md-4">
        <div class="card mb-3">
          <div class="row g-0 align-items-center">
            <div class="col-md-8">
              <div class="card-body">
                <p class="card-title m-0">{{ $sub->name }}</p>
              </div>
            </div>
            <div class="col-md-4">
              <img class="card-img card-img-right" src="{{asset('assets/img/products/1.png')}}" alt="Card image" />
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
@endif

<form action="{{route('partner.products.collection',['data'=>'filter'])}}" method="get">
    <div class="row mb-4">
      <div class="col-12">
        
        <h5 class="card-title mb-3">85 producten in Activiteit en entertainment</h5>
      </div>
      <div class="col-md-4 mb-3">
       <label for="select2Basic1" class="form-label">Search </label>
         <input class=" form-control" type="text" name="product_name" id="" >
        </div>
       <div class="col-md-4 mb-3">
       <label for="select2Basic1" class="form-label">Available</label>
          <select name="status" id="select2Basic1" class="select2 form-select" data-allow-clear="true">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
          </select>  
        </div>

        <div class="col-md-4 mb-3">
          <label for="select2Basic" class="form-label">Brand</label>
          <select name="user_id" id="select2Basic" class="select2 form-select" data-allow-clear="true">
            @foreach($vendors as $vendor)              
            <option value="{{$vendor->id}}">{{$vendor->first_name}}</option>
            @endforeach              
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <div class="price-range-slider">
              <label for="min-price">Min Price: <span id="min-price-label">$0</span></label>
              <input type="range" id="min-price" name="min-price" min="0" max="1000" step="10" value="0">
             
            </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="price-range-slider">
             
              <label for="max-price">Max Price: <span id="max-price-label">$1000</span></label>
              <input type="range" id="max-price" name="max-price" min="0" max="1000" step="10" value="1000">
            </div>
        </div>  

        <div class="col-md-4 mb-3">
        <label for="select2Basic1" class="form-label">Apply Filters </label>
          <button class="btn btn-primary">Apply</button>
        </div>   

    </div>
    </form>
    <div class="row">
    @foreach($products as $product)  
     <div class="col-md-4 mb-4">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-12 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4 mb-3">
              <a href="{{route('product_info',['product'=>$product->id])}}"><img src="{{ $product->image }}??{{asset('assets/img/elements/9.jpg')}}" class="img-fluid rounded" alt="view sales"></a>
              </div>
            </div>
            <div class="col-12">
              <div class="card-body pt-0">
                <p ><a href="{{route('product_info',['product'=>$product->id])}}">{{$product->name}}</a></p>
                <h4 class="text-primary mb-3">€{{$product->price}}</h4>
                <button id="success" data-id="{{$product->id}}" data-qty="1" class="btn btn-primary w-100">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
    {!! $products->links() !!}


  </div>
</div>
<!-- /Sticky Actions -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
   
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
<script>
      $(document).on('click', '#success', function(e) {
                toastr.success("<span>Your product added successfully...</span>");
      });
      $(document).on('click', '#success', function(e) {
            var product_id=$(this).data("id");
            var qty=$(this).data("qty");
            jQuery.ajax({
            url:"{{route('addToCart')}}",
            type:"post",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: {
                product_id:product_id,
                qty:qty
                },

                    error: function(err){
                    console.log(err);
                },
                success:function(result){
                    // location.reload();

                    console.log(result)
                }
            });
        });


        const minPriceSlider = document.getElementById("min-price");
const maxPriceSlider = document.getElementById("max-price");
const minPriceLabel = document.getElementById("min-price-label");
const maxPriceLabel = document.getElementById("max-price-label");

minPriceSlider.addEventListener("input", updatePriceLabel);
maxPriceSlider.addEventListener("input", updatePriceLabel);

function updatePriceLabel() {
    const minPrice = minPriceSlider.value;
    const maxPrice = maxPriceSlider.value;
    minPriceLabel.textContent = `$${minPrice}`;
    maxPriceLabel.textContent = `$${maxPrice}`;
}
</script>
@endsection
