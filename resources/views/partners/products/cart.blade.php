@extends('layouts/layoutMaster')

@section('title', 'Cart')


@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-ecommerce.js')}}"></script>
@endsection

@section('content')

<style>
  .no-bg-tabs > .tab-content {
    background: transparent;
    padding: 0;
    box-shadow: none !important;
  }
</style>

<div class="row">
  <!-- Cart -->
  <div id="checkout-cart" class="content">
    <div class="row">
      <!-- Cart left -->
      <div class="col-xl-8 mb-3 mb-xl-0">

        <!-- Offer alert -->
        <!-- <div class="alert alert-success mb-3" role="alert">
          <div class="d-flex gap-3">
            <div class="flex-shrink-0">
              <i class="ti ti-bookmarks ti-sm alert-icon alert-icon-lg"></i>
            </div>
            <div class="flex-grow-1">
              <div class="fw-semibold fs-5 mb-2">Available Offers</div>
              <ul class="list-unstyled mb-0">
                <li> - 10% Instant Discount on Bank of America Corp Bank Debit and Credit cards</li>
                <li> - 25% Cashback Voucher of up to $60 on first ever PayPal transaction. TCA</li>
              </ul>
            </div>
          </div>
          <button type="button" class="btn-close btn-pinned" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> -->
        @php $total=0; @endphp
        <!-- Shopping bag -->
        <h5>My Shopping Bag (@if(!empty(session('cart'))) {{count(session('cart'))}} @else 0 @endif Items)</h5>
        <ul class="list-group mb-3">

          @if(!empty(session('cart')))
          @foreach(session('cart') as $id => $details)
          <li class="list-group-item p-4">
            <div class="d-flex gap-3">
              <div class="flex-shrink-0 d-flex align-items-center">
                <img src="{{$details['image']}}" alt="google home" class="w-px-100">
              </div>
              <div class="flex-grow-1">
                <div class="row">
                  <div class="col-md-8">
                    <p class="me-3"><a href="javascript:void(0)" class="text-body">{{ $details['name'] }} </a></p>
                    <div class="text-muted mb-2 d-flex flex-wrap"><span class="me-1">Sold by:</span> <a href="javascript:void(0)" class="me-3">Apple</a> <span class="badge bg-label-success">In Stock</span></div>
                    <div class="read-only-ratings mb-3" data-rateyo-read-only="true"></div>
                    <input type="number" class="form-control form-control-sm w-px-75 update-cart" value="{{$details['quantity']}}" min="1" max="5" data-product="{{$id}}" data-price="{{$details['price']}}" data-oldprice="{{ $details['price'] * $details['quantity']}}">
                    <input type="hidden" class="product_price" value="{{$details['price'] * $details['quantity']}}">

                  </div>
                  <div class="col-md-4">
                    <div class="text-md-end">
                      <button type="button" class="btn-close btn-pinned remove-cart" aria-label="Close" data-product="{{$id}}"></button>
                      <div class="my-2 my-md-4 mb-md-5"><span class="text-primary product_total{{$id}}">€{{ $details['price'] * $details['quantity']}}/</span><s class="text-muted">€359</s></div>
                      <!-- <button type="button" class="btn btn-sm btn-label-primary">Move to wishlist</button> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          @php  $total=$total+ $details['price'] * $details['quantity']; @endphp
          @endforeach
        @endif
        </ul>

        <!-- Wishlist -->
        <div class="list-group">
          <a href="javascript:void(0)" class="list-group-item d-flex justify-content-between">
            <div class="row align-items-center" style="width: 100%;">
              <div class="col-md-6">
                <span>Quickly add items to your shopping cart</span>
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control form-control-sm" placeholder="Fill in EAN/SKU number">
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary btn-next waves-effect waves-light">Add</button>
              </div>
            </div>
            <!-- <i class="ti ti-sm ti-chevron-right scaleX-n1-rtl"></i> -->
          </a>
        </div>
      </div>

      <!-- Cart right -->
      <div class="col-xl-4">
        <div class="border rounded p-4 mb-3 pb-3">

          <!-- Offer -->
          <h6>Offer</h6>
          <div class="row g-3 mb-3">
            <div class="col-8 col-xxl-8 col-xl-12">
              <input type="text" class="form-control" placeholder="Enter Promo Code" aria-label="Enter Promo Code">
            </div>
            <div class="col-4 col-xxl-4 col-xl-12">
              <div class="d-grid">
                <button type="button" class="btn btn-label-primary">Apply</button>
              </div>
            </div>
          </div>

          <!-- Gift wrap -->
          <!-- <div class="bg-lighter rounded p-3">
            <p class="fw-semibold mb-2">Buying gift for a loved one?</p>
            <p class="mb-2">Gift wrap and personalized message on card, Only for $2.</p>
            <a href="javascript:void(0)" class="fw-semibold">Add a gift wrap</a>
          </div> -->
          <hr class="mx-n4">

          <!-- Price Details -->
          <h6>Price Details</h6>
          <dl class="row mb-0">
            <dt class="col-6 fw-normal">Bag Total</dt>
            <dd class="col-6 text-end">$1198.00</dd>

            <dt class="col-sm-6 fw-normal">Coupon Discount</dt>
            <dd class="col-sm-6 text-success text-end"> -$98.00</dd>

            <dt class="col-6 fw-normal">Order Total</dt>
            <dd class="col-6 text-end">$1100.00</dd>

            <dt class="col-6 fw-normal">Delivery Charges</dt>
            <dd class="col-6 text-end"><s>$5.00</s> <span class="badge bg-label-success ms-1">Free</span></dd>
          </dl>

          <hr class="mx-n4">
          <dl class="row mb-0">
            <dt class="col-6">Total</dt>
            <dd class="col-6 fw-semibold text-end mb-0 "> <span class="order_total">@if(!empty(session('cart'))) {{ $total }} @endif</span></dd>
          </dl>
        </div>
        <div class="d-grid">
          <!-- <button class="btn btn-primary btn-next">Place Order</button> -->
          <a class="btn btn-primary btn-next" href="{{route('checkout')}}">Place Order</a>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
      $(document).on('change', '.update-cart', function(e) {
                toastr.success("<span>Your cart updated successfully...</span>");
      });
      $(document).on('change', '.update-cart', function(e) {

            var product_id=$(this).data("product");
            var price=$(this).data("price");
            var qty=$(this).val();
            var pre_price=$(this).data("oldprice");
            var product_total=parseFloat(price)*parseFloat(qty);
            var order_total=$(".order_total").html();
            $(".product_total"+product_id).html(product_total);
            $(this).closest('.product_price').val(product_total);
            $(this).next('.product_price').val(product_total);

           

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
                    // location.reload();
                    var totalPrice = 0;
                    $('.product_price').each(function (i,val) {
                        totalPrice += parseFloat($(val).val());
                        console.log($(val).val());
                    });
                   $(".order_total").text(totalPrice);
                }
            });
        });
        $(document).on('click', '.remove-cart', function(e) {
            var product_id=$(this).data("product");
            $(this).closest('li').remove();
            jQuery.ajax({
            url:"{{route('removeCart')}}",
            type:"post",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: {
                product_id:product_id,
                },

                    error: function(err){
                    console.log(err);
                },
                success:function(result){
                    // location.reload();
                    var totalPrice = 0;
                    $('.product_price').each(function (i,val) {
                        totalPrice += parseFloat($(val).val());
                        console.log($(val).val());
                    });
                   $(".order_total").text(totalPrice);
                    console.log(result)
                }
            });
        });
</script>
@endsection
