@extends('layouts/layoutMaster')

@section('title', 'Product Details')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('front-assets/css/main.css?v=3.4')}}">

@endsection
<style>
    .waves-light{
        color:white !important;
    }
    .slick-slide{
        height:auto !important;
    }
</style>
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


<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Fashion
                    <span></span> Abstract Print Patchwork Dress
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="detail-gallery">
                                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                            <!-- MAIN SLIDES -->
                                            <div class="product-image-slider">
                                                <figure class="border-radius-10">
                                                    <img src="{{$product->image}}" alt="product image">
                                                </figure>
                                                <figure class="border-radius-10">
                                                    <img src="{{$product->image}}" alt="product image">
                                                </figure>
                                              
                                            
                                            </div>
                                            <!-- THUMBNAILS -->
                                            <div class="slider-nav-thumbnails pl-15 pr-15">
                                                <div><img src="{{$product->image}}" alt="product image"></div>
                                                <div><img src="{{$product->image}}" alt="product image"></div>
                                              
                                            </div>
                                        </div>
                                        <!-- End Gallery -->
                                    
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="detail-info">
                                            <h2 class="title-detail">{{$product->name}}</h2>
                                            <!-- <div class="product-detail-rating">
                                                <div class="pro-details-brand">
                                                    <span> Brands: <a href="shop-grid-right.html">Bootstrap</a></span>
                                                </div>
                                                <div class="product-rate-cover text-end">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width:90%">
                                                        </div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                                </div>
                                            </div> -->
                                            <div class="clearfix product-price-cover">
                                                <div class="product-price primary-color float-left">
                                                    <p><span class="text-brand">{{"Price". "€".$product->price}}</span></p>
                                                    <p><span class="text-brand">{{"Shipping Price". "€".$product->shipping_price}}</p></ins>
                                                    <!-- <ins><span class="old-price font-md ml-15">$200.00</span></ins>
                                                    <span class="save-price  font-md color3 ml-15">25% Off</span> -->
                                                </div>
                                            </div>
                                            <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                            <div class="short-desc mb-30">
                                                <p>
                                                @if(@empty($product->short_description) || $product->short_description==NUll)
                                                <p>Empty</p>
                                                @else
                                                <p>{{$product->short_description}}</p>
                                                @endif
                                                </p>
                                            </div>
                                            <div class="product_sort_info font-xs mb-30">
                                                <ul>
                                                    <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera
                                                        Brand Warranty</li>
                                                    <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return
                                                        Policy</li>
                                                    <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- <div class="attr-detail attr-color mb-15">
                                                <strong class="mr-10">Color</strong>
                                                <ul class="list-filter color-filter">
                                                    <li><a href="#" data-color="Red"><span
                                                                class="product-color-red"></span></a></li>
                                                    <li><a href="#" data-color="Yellow"><span
                                                                class="product-color-yellow"></span></a></li>
                                                    <li class="active"><a href="#" data-color="White"><span
                                                                class="product-color-white"></span></a></li>
                                                    <li><a href="#" data-color="Orange"><span
                                                                class="product-color-orange"></span></a></li>
                                                    <li><a href="#" data-color="Cyan"><span
                                                                class="product-color-cyan"></span></a></li>
                                                    <li><a href="#" data-color="Green"><span
                                                                class="product-color-green"></span></a></li>
                                                    <li><a href="#" data-color="Purple"><span
                                                                class="product-color-purple"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="attr-detail attr-size">
                                                <strong class="mr-10">Size</strong>
                                                <ul class="list-filter size-filter font-small">
                                                    <li><a href="#">S</a></li>
                                                    <li class="active"><a href="#">M</a></li>
                                                    <li><a href="#">L</a></li>
                                                    <li><a href="#">XL</a></li>
                                                    <li><a href="#">XXL</a></li>
                                                </ul>
                                            </div> -->
                                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                            <div class="detail-extralink">
                                                <div class="detail-qty border radius">
                                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                    <span class="qty-val">1</span>
                                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                </div>
                                            
                                                <div class="product-extra-link2">
                                                    <button type="button" class="button button-add-to-cart" data-product="{{$product->id}}" data-price="{{$product->price}}" >Add to
                                                        cart</button>
                                                        <button type="button" class="button quick-add-to-cart" data-product="{{$product->id}}" data-price="{{$product->price}}" >Quick to
                                                        Buy</button>
                                                    <!-- <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn hover-up"
                                                        href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> -->
                                                </div>
                                            </div>
                                            <ul class="product-meta font-xs color-grey mt-50">
                                                <li class="mb-1">SKU: <a href="#">{{$product->sku}}</a></li>
                                                <li class="mb-1">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#"
                                                        rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                                <li>Availability:<span class="in-stock text-success ml-1">{{$product->stock}} Items In
                                                        Stock</span></li>
                                            </ul>
                                        </div>
                                        <!-- Detail Info -->
                                </div>
                            </div>
                         
                        
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                       
                      
                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                            <img src="{{asset('front-assets/imgs/banner/banner-11.jpg')}}" alt="">
                            <div class="banner-text">
                                <span>Women Zone</span>
                                <h4>Save 17% on <br>Office Dress</h4>
                                <a href="shop-grid-right.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
 <!-- Vendor JS-->
 <!-- Vendor JS-->
 <script src="{{asset('front-assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('front-assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('front-assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('front-assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('front-assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <!-- Template  JS -->
    <script src="{{asset('front-assets/js/main.js?v=3.4')}}"></script>
    <script src="{{asset('front-assets/js/shop.js?v=3.4')}}"></script>
<script>
      $(document).on('click', '.button-add-to-cart', function(e) {
                toastr.success("<span>Your product added successfully...</span>");
      });
    $(document).on('click', '.button-add-to-cart,.quick-add-to-cart', function(e) {
var elm=$(this);
var product_id=$(this).data("product");
var price=$(this).data("price");
var qty=$(".qty-val").text();
jQuery.ajax({
url:"{{route('updateCart')}}",
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
        if (elm.hasClass('quick-add-to-cart')) {
            window.location.href = "/partner/products/checkout";
        }
        // location.reload();

    }
});
});
</script>
@endsection
