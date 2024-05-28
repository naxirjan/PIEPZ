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
    <span class="text-muted fw-light">Vendor /</span> Order Details
    <span style="float: right;"><a href="/vendor/orders"><i class="ti ti-arrow-back ti-md"></i></a></span>
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
                    <img src="{{($aOrder->product_image ?? "")}}" alt="User" class="rounded" width="46">
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">{{($aOrder->product_name ?? "-")}}</h6>
                      <small class="text-muted d-block">Item: #{{($aOrder->product_id ?? "")}}</small>
                      <small class="text-muted d-block">SKU: {{($aOrder->sku ?? "")}}</small>
                    </div>
                    <div class="user-progress d-flex align-items-center gap-1">
                      <p class="mb-0 fw-semibold">${{($aOrder->product_price ?? 0)}} x {{($aOrder->product_quantity ?? 0)}} = </p>
                      <p class="mb-0 fw-semibold">
                        @php
                          $iItemsPrice = (($aOrder->product_price ?? 0) * ($aOrder->product_quantity ?? 0));
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
          <label for="exampleFormControlTextarea1" class="form-label">Leave a Comment</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          <button type="button" class="btn btn-label-primary" style="float: right; margin-top: 5px;">Submit</button>
          <!-- leave a comment end -->
          <!-- timeline start -->
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title m-0 me-2 pt-1 mb-2">Today</h5>
            <!-- <div class="dropdown">
               <button class="btn p-0" type="button" id="timelineWapper" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="ti ti-dots-vertical ti-sm text-muted"></i>
               </button>
               <div class="dropdown-menu dropdown-menu-end" aria-labelledby="timelineWapper">
                 <a class="dropdown-item" href="javascript:void(0);">Download</a>
                 <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                 <a class="dropdown-item" href="javascript:void(0);">Share</a>
               </div>
               </div> -->
          </div>
          <div class="card-body pb-0">
            <ul class="timeline ms-1 mb-0">
              <li class="timeline-item timeline-item-transparent ps-4">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header">
                    <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                    <small class="text-muted">Today</small>
                  </div>
                </div>
              </li>
              <li class="timeline-item timeline-item-transparent ps-4">
                <span class="timeline-point timeline-point-success"></span>
                <div class="timeline-event">
                  <div class="timeline-header">
                    <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                    <small class="text-muted">2 Day Ago</small>
                  </div>
                </div>
              </li>
              <li class="timeline-item timeline-item-transparent ps-4">
                <span class="timeline-point timeline-point-success"></span>
                <div class="timeline-event">
                  <div class="timeline-header">
                    <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                    <small class="text-muted">2 Day Ago</small>
                  </div>
                </div>
              </li>
              <li class="timeline-item timeline-item-transparent ps-4">
                <span class="timeline-point timeline-point-danger"></span>
                <div class="timeline-event">
                  <div class="timeline-header">
                    <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                    <small class="text-muted">6 Day Ago</small>
                  </div>
                  <div class="d-flex flex-wrap gap-2 pt-1">
                    <a href="javascript:void(0)" class="me-3">
                      <img src="{{asset('assets/img/icons/misc/doc.png')}}" alt="Document image" width="15" class="me-2">
                      <span class="fw-semibold text-heading">Email Open</span>
                    </a>
                  </div>
                </div>
              </li>
              <li class="timeline-item timeline-item-transparent ps-4 border-0">
                <span class="timeline-point timeline-point-info"></span>
                <div class="timeline-event pb-0">
                  <div class="timeline-header">
                    <h6 class="mb-0"> simply dummy text of the printing and typesetting industry</h6>
                    <small class="text-muted">10 Day Ago</small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <!-- timeline end -->
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
                <h6 class="mb-0">{{($aOrderData[0]->vendor ?? "-")}}</h6>
                <p class="text-muted mb-0">{{($aOrderData[0]->vendor_address ?? "-")}}</p>
              </div>
            </li>
          </ul>
          <hr class="my-5">
            <form method="post" action="{{ route('vendor.order.updateorderstatus') }}">
              <hr class="my-4">
              <label for="select2Basic" class="form-label">Status </label>
              <select name="status" class="select2 form-select form-select-lg" data-allow-clear="true">
                <?php
                $iOrderStatus = ($aOrderData[0]->status ?? -1);
                foreach ($aOrderStatuses as $iKey => $aValue){
                  ?>
                <option {{( $iOrderStatus == $aValue->id ? "selected" : "")}} value="{{$aValue->id}}">{{$aValue->title}}</option>
                  <?php
                }
                ?>
              </select>
              <hr class="my-5">
              <label for="select2Basic" class="form-label my-3">Add Tracking Code</label>
              <input class="form-control" type="text" name="tracking_code"  value="{{($aOrderData[0]->tracking_code ?? 0)}}">
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

