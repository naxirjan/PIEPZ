@extends('layouts/layoutMaster')
@section('title', 'Order Details')
@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
@endsection
@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>
@endsection
@section('page-script')
  <script src="{{asset('assets/js/forms-editors.js')}}"></script>
  <script src="{{asset('assets/js/forms-file-upload.js')}}"></script>
  <script src="{{asset('assets/js/forms-selects.js')}}"></script>
  <script src="{{asset('assets/js/forms-tagify.js')}}"></script>
  <script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection
@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Admin /</span> Order Details
    <span style="float: right;">
        <span style="float: right;">
    <a href="/admin/orders" type="button"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Back">
    <i class="ti ti-arrow-left"></i>
  </a>
    </span>
  </h4>
  <div class="row">
    <!-- Earning Reports -->
    <div class="col-lg-8 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <!-- product section -->
          @if(session('msg'))
            <div class="alert alert-dismissible alert-success">{{session('msg')}}</div>
          @endif
          <p><i class="ti ti-brand-dribbble mb-2" style="color: #c5952a;"></i>Outstanding</p>
          <p><i class="fa-solid fa-location-dot"></i> location:  northwestern Europe with overseas territories in the Caribbean</p>
          <p><i class="fa-solid fa-location-dot"></i> location:  {{($aOrderData[0]->shipping_address ?? "")}}</p>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
              @php
                $iTotalItems = count($aOrderData);
                $iTotalItemsPrice = 0;
              @endphp
              @foreach($aOrderData as $iIndex => $aOrder)
                <li class="d-flex mb-4 pb-1">
                  <div class="me-3">
                    <img src="{{$aOrder->product_image}}" alt="User" class="rounded" width="46">
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">{{$aOrder->product_name}}</h6>
                      <small class="text-muted d-block">Item: #{{$aOrder->product_id}}</small>
                      <small class="text-muted d-block">SKU: {{$aOrder->sku}}</small>
                    </div>
                    <div class="user-progress d-flex align-items-center gap-1">
                      <p class="mb-0 fw-semibold">${{$aOrder->product_price}} x {{$aOrder->product_quantity}} = </p>
                      <p class="mb-0 fw-semibold">
                        @php
                          $iItemsPrice = ($aOrder->product_price * $aOrder->product_quantity);
                          $iTotalItemsPrice += $iItemsPrice;
                        @endphp
                        $ {{number_format($iItemsPrice, 2)}}
                      </p>
                    </div>
                  </div>
                </li>
                </li>
              @endforeach

            </ul>
          </div>
          <!-- end product section -->
          <hr class="my-5">
          <!-- payment -->
          <p><i class="fa fa-check" aria-hidden="true" style="border-radius: 50%;
               border: solid;
               color: #547435;"></i> Betaald</p>
          <br><br>
          <table class="table">
            <tr>
              <td>Subtotal</td>
              <td> {{$iTotalItems}} item(s)</td>
              <td>${{$iTotalItemsPrice}}</td>
            </tr>
            <tr>
              <td>dispatch</td>
              <td>Free Shipping</td>
              <td>$0.0</td>
            </tr>
            <tr>
              <td>Tax</td>
              <td>NL 20%</td>
              <td>$50</td>
            </tr>
            <tr>
              <td>Total</td>
              <td></td>
              <td>$539</td>
            </tr>
          </table>
          <!-- end payment -->

          <hr class="my-5">

          <!-- leave a comment -->
          <form action="{{route('admin.order.comment')}}" method="post">
            @csrf
            <input type="hidden" name="order_id" value="">
            <label for="exampleFormControlTextarea1" class="form-label">Leave a Comment</label>
            <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
            <button  class="btn btn-sm btn-primary mt-3" type="submit">Add Comment</button>
          </form>
          <!-- leave a comment end -->
          <!-- all commets start -->
          <div class="card-body pb-0">
            <ul class="timeline ms-1 mb-0">

              @foreach($aComments as $comment)
                <li class="timeline-item timeline-item-transparent ps-4 border-0">
                  <span class="timeline-point timeline-point-info"></span>
                  <div class="timeline-event pb-0">
                    <div class="timeline-header">
                      <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                      <small class="text-muted">10 Day Ago</small>
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
          <!--  all commets end -->

        </div>
      </div>
    </div>
    <!--/ Earning Reports -->
    <!-- Earning Reports -->
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <ul class="timeline timeline-advance " style="height:auto !important;">
            <li class="timeline-item ps-4 border-left-dashed">
                  <span class="timeline-indicator timeline-indicator-success">
                  <i class="ti ti-circle-check"></i>
                  </span>
              <div class="timeline-event ps-0 pb-0">
                <div class="timeline-header">
                  <small class="text-success text-uppercase fw-semibold">Vendor</small>
                </div>
                <h6 class="mb-0">Myrtle Ullrich</h6>
                <p class="text-muted mb-0">101 Boulder, California(CA), 95959</p>
                <h6 class="mb-0">{{($aOrderData[0]->vendor ?? "-")}}</h6>
                <p class="text-muted mb-0">{{($aOrderData[0]->vendor_address ?? "-")}}</p>
              </div>
            </li>
            <li class="timeline-item ps-4 border-0">
                  <span class="timeline-indicator timeline-indicator-primary">
                  <i class="ti ti-map-pin"></i>
                  </span>
              <div class="timeline-event ps-0 pb-0">
                <div class="timeline-header">
                  <small class="text-primary text-uppercase fw-semibold">Partner</small>
                </div>
                <h6 class="mb-0">Barry Schowalter</h6>
                <p class="text-muted mb-0">939 Orange, California(CA),92118</p>

                <h6 class="mb-0">{{($aOrderData[0]->customer ?? "-")}}</h6>
                <p class="text-muted mb-0">{{($aOrderData[0]->customer_address ?? "-")}}</p>
              </div>
            </li>
          </ul>
          <hr class="my-5">
            <form method="post" action="{{ route('admin.order.updateorderstatus') }}">
              <hr class="my-4">
              <label for="select2Basic" class="form-label">Status </label>
              <select name="status" class="select2 form-select form-select-lg" data-allow-clear="true">
                <?php
                $iOrderStatus = ($aOrderData[0]->status ?? 0);
                foreach ($aOrderStatuses as $iKey => $aValue){
                  ?>
                <option {{( $iOrderStatus == $aValue->id ? "selected" : "")}} value="{{$aValue->id}}">{{$aValue->title}}</option>
                  <?php
                }
                ?>
              </select>
              <hr class="my-5">
              <label for="select2Basic" class="form-label my-3">Add Tracking Code</label>
              <input class="form-control" type="text" name="tracking_code"  value="{{($aOrderData[0]->tracking_code ?? "")}}">
              @csrf
              <input type="hidden" name="data-id" value="{{base64_encode(($aOrderData[0]->id ?? 0))}}" />
              <p class="text-center my-3"><button type="submit" class="btn btn-sm btn-primary pull-right">Update</button></p>
            </form>
        </div>
      </div>
    </div>
    <!--/ Earning Reports -->
  </div>
  <hr class="my-5">
@endsection

