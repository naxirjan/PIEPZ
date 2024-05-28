@extends('layouts/layoutMaster')

@section('title', 'Search')


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
  <div class="col-xl-7 mb-4 col-lg-5 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">New Products</h5>
            <p class="mb-4">Best seller of the month</p>
            <a href="{{route('partner.products.collection',['data'=>'latest'])}}" class="btn btn-primary">View More</a>
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view More">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-5 mb-4 col-lg-5 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Weer Op Voorraad</h5>
            <p class="mb-4">Best seller of the month</p>
            <a href="javascript:;" class="btn btn-primary">View More</a>
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view More">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-7 mb-4 col-lg-5 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Meest Verkochte</h5>
            <p class="mb-4">Best seller of the month</p>
            <a href="javascript:;" class="btn btn-primary">View More</a>
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view More">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-5 mb-4 col-lg-5 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Outlet</h5>
            <p class="mb-4">Best seller of the month</p>
            <a href="javascript:;" class="btn btn-primary">View More</a>
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view More">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12">
    <hr/>
  </div>

  <div class="col-12">
    <div class="nav-align-top no-bg-tabs mt-3">
      <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">Categories</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">Labels</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">Brands</button>
        </li>
      </ul>
      <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
          <div class="row">
          
          
       @foreach($brands as $brand)

       
            <div class="col-md-4">
              <div class="card mb-3">
                <div class="row g-0 align-items-end">
                  <div class="col-md-8">
                    <div class="card-body">
                     <a href="{{route('partner.products.collection',['data'=>'categories','category'=>$brand->id])}}"> <h5 class="card-title"> {{$brand->name}}</h5></a>
                     
                      <p class="card-text"><u><small class="text-muted">{{$brand->product_count}} meer caregorieen</small></u></p>
                    </div>
                  </div>
                  <div class="col-md-4 text-center">
                    <i class="ti ti-xl ti-moon-stars mb-5"></i>
                    <!-- <img class="card-img card-img-left" src="{{asset('assets/img/elements/9.jpg')}}" alt="Card image" /> -->
                  </div>
                </div>
              </div>
            </div>

       @endforeach     
          </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
        <div class="row">
            <div class="col-md-4">
              <div class="card mb-3">
                <div class="row g-0 align-items-end">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Auto en motor</h5>
                      <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                      </p>
                      <p class="card-text"><u><small class="text-muted">9 meer caregorieen</small></u></p>
                    </div>
                  </div>
                  <div class="col-md-4 text-center">
                    <i class="ti ti-xl ti-moon-stars mb-5"></i>
                    <!-- <img class="card-img card-img-left" src="{{asset('assets/img/elements/9.jpg')}}" alt="Card image" /> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-3">
                <div class="row g-0 align-items-end">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Auto en motor</h5>
                      <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                      </p>
                      <p class="card-text"><u><small class="text-muted">9 meer caregorieen</small></u></p>
                    </div>
                  </div>
                  <div class="col-md-4 text-center">
                    <i class="ti ti-xl ti-moon-stars mb-5"></i>
                    <!-- <img class="card-img card-img-left" src="{{asset('assets/img/elements/9.jpg')}}" alt="Card image" /> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-3">
                <div class="row g-0 align-items-end">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Auto en motor</h5>
                      <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                      </p>
                      <p class="card-text"><u><small class="text-muted">9 meer caregorieen</small></u></p>
                    </div>
                  </div>
                  <div class="col-md-4 text-center">
                    <i class="ti ti-xl ti-moon-stars mb-5"></i>
                    <!-- <img class="card-img card-img-left" src="{{asset('assets/img/elements/9.jpg')}}" alt="Card image" /> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-3">
                <div class="row g-0 align-items-end">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Auto en motor</h5>
                      <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                      </p>
                      <p class="card-text"><u><small class="text-muted">9 meer caregorieen</small></u></p>
                    </div>
                  </div>
                  <div class="col-md-4 text-center">
                    <i class="ti ti-xl ti-moon-stars mb-5"></i>
                    <!-- <img class="card-img card-img-left" src="{{asset('assets/img/elements/9.jpg')}}" alt="Card image" /> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-3">
                <div class="row g-0 align-items-end">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Auto en motor</h5>
                      <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                      </p>
                      <p class="card-text"><u><small class="text-muted">9 meer caregorieen</small></u></p>
                    </div>
                  </div>
                  <div class="col-md-4 text-center">
                    <i class="ti ti-xl ti-moon-stars mb-5"></i>
                    <!-- <img class="card-img card-img-left" src="{{asset('assets/img/elements/9.jpg')}}" alt="Card image" /> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-3">
                <div class="row g-0 align-items-end">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Auto en motor</h5>
                      <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content.
                      </p>
                      <p class="card-text"><u><small class="text-muted">9 meer caregorieen</small></u></p>
                    </div>
                  </div>
                  <div class="col-md-4 text-center">
                    <i class="ti ti-xl ti-moon-stars mb-5"></i>
                    <!-- <img class="card-img card-img-left" src="{{asset('assets/img/elements/9.jpg')}}" alt="Card image" /> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
        <div class="row">
@foreach($vendors as $row)      
        <div class="col-md-4">
              <div class="card mb-3">
                <div class="row g-0 align-items-end">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$row->first_name}}</h5>
                     
                      <a href="{{route('partner.products.collection',['data'=>'vendors','by_vendor'=>$row->id])}}" class="card-text"><u><small class="text-muted">View Products</small></u></a>
                    </div>
                  </div>
                  <div class="col-md-4 text-center">
                    <i class="ti ti-xl ti-moon-stars mb-5"></i>
                    <!-- <img class="card-img card-img-left" src="{{asset('assets/img/elements/9.jpg')}}" alt="Card image" /> -->
                  </div>
                </div>
              </div>
            </div>
      
          </div>
        </div>
@endforeach

      </div>
    </div>
  </div>
</div>

@endsection
