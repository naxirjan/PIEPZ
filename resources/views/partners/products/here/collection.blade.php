
@extends('layouts/layoutMaster')

@section('title', 'Product Details')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('front-assets/css/main.css?v=3.4')}}">
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
<main class="main">       
 <div class="row">
    <div class="col-lg-4 col-md-4 mb-md-3 mb-lg-0">
            <select id="categorySelect">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

       
    </div>
    <div class="col-lg-4 col-md-4 mb-md-3 mb-lg-0">
         

        <select id="subcategorySelect">
            <option value="">Select Subcategory</option>
        </select>
    </div>
 </div>
        <section class="featured section-padding position-relative">   
        <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
                     
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('front-assets/imgs/theme/icons/feature-1.png')}}" alt="">
                            <h4 class="bg-1">Free Shipping</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('front-assets/imgs/theme/icons/feature-2.png')}}" alt="">
                            <h4 class="bg-3">Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('front-assets/imgs/theme/icons/feature-3.png')}}" alt="">
                            <h4 class="bg-2">Save Money</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('front-assets/imgs/theme/icons/feature-4.png')}}" alt="">
                            <h4 class="bg-4">Promotions</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('front-assets/imgs/theme/icons/feature-5.png')}}" alt="">
                            <h4 class="bg-5">Happy Sell</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('front-assets/imgs/theme/icons/feature-6.png')}}" alt="">
                            <h4 class="bg-6">24/7 Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
      
    </main>
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
    <script src="{{asset('front-assets/js/main.js?v=3.4')}}"></script>
    <script src="{{asset('front-assets/js/shop.js?v=3.4')}}"></script>
<script>
    $('#categorySelect').on('change', function() {
    var categoryId = $(this).val();
    $.get('/partner/products/get-subcategories/' + categoryId, function(data) {
        $('#subcategorySelect').html(data);
    });
});

</script>
@endsection
