@extends('layouts/layoutMaster')

@section('title', 'Product Details')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />

<link rel="stylesheet" href="{{asset('front-assets/css/main.css?v=3.4')}}">
<style>
    .shop-product-fillter .col-md-3{
        padding: 5px;
    }
</style>
@endsection
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
<script src="{{asset('assets/js/toaster.js')}}"></script>
@endsection

@section('content')
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-12">
                      <form action="{{route('products.filter')}}" method="get">
                      <div class="shop-product-fillter">
                           
                                <div class="col-md-3 mb-3">
                                        <label for="select2Basic" class="form-label">Brands</label>
                                        <select name="brand" id="select2Basic1" class="select2 form-select form-select-lg" data-allow-clear="true">
                                            @foreach($brands as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                          
                                            @endforeach
                                        </select>
                                </div>
                                
                                <div class="col-md-3">
                                        <div class="sidebar-widget price_range range ">
                         
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Select Price:</span><input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div> 
                                    </div>
                                
                                <div class="col-md-3 mb-3">
                                        <label for="select2Basic" class="form-label">Product Name</label>
                                        <input type="text" name="product_name" id="">
                                </div>

                                <div class="col-md-3 mb-3">
                                 <label for="select2Basic" class="form-label"></label>
                                   <input type="submit" value="Apply Filter">
                                </div>
                         
                        </div>
                      </form>
                        <div class="row product-grid-3">
                            @foreach($products as $product)
                            <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="shop-product-right.html">
                                                <img class="default-img" src="{{ url('storage/'.$product->image)}}" alt="">
                                                <img class="hover-img" src="{{ url('storage/'.$product->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                        <i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                       @if(empty($product->sale_price) && $product->stock !=0 )
                                       <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                        @elseif($product->stock ==0)
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Low stock</span>
                                        </div>
                                       @endif
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">Music</a>
                                        </div>
                                        <h2><a href="{{route('product_info',['product'=>$product->id])}}">{{$product->name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <!-- @if(empty($product->sell_price) || $product->sell_price==0)
                                            <span>{{'€'.$product->sell_price}}</span>
                                            @else
                                            <span>{{'€'.$product->price}}</span>
                                            @endif -->
                                            <span>{{'€'.$product->price}}</span>
                                            <!-- <span class="old-price">$245.8</span> -->
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" id="success" class="action-btn hover-up" data-id="{{$product->id}}" data-qty="1"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--pagination-->
                     
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
    </main>
 <!-- Vendor JS-->
    	<!-- jQuery -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    
    <script src="{{asset('front-assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/scrollup.js')}}"></script>


    <!-- Template  JS -->
    <script src="{{asset('front-assets/js/main.js')}}"></script>
    <script src="{{asset('front-assets/js/shop.js')}}"></script>
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

</script>

@endsection
