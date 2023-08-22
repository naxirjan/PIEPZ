@extends('layouts/layoutMaster')
@section('title', 'Basic Inputs - Forms')
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
<h4 class="fw-bold py-3 mb-4">
   Profit Calculator
</h4>
<div class="row">
   <div class="col-md-6">
      <div class="card mb-4">
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Number of places decreased</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <div class="form-floating">
                     <input type="text" class="form-control" id="floatingInput" placeholder="1" aria-describedby="floatingInputHelp" />
                     <label for="floatingInput">1</label>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Purchase Price</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <div class="form-floating">
                     <input type="text" class="form-control" id="floatingInput" placeholder="1" aria-describedby="floatingInputHelp" />
                     <label for="floatingInput">$48</label>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Transaction costs</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <div class="form-floating">
                     <input type="text" class="form-control" id="floatingInput" placeholder="1" aria-describedby="floatingInputHelp" />
                     <label for="floatingInput">$0.00</label>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Transportation Costs</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <div class="form-floating">
                     <input type="text" class="form-control" id="floatingInput" placeholder="1" aria-describedby="floatingInputHelp" />
                     <label for="floatingInput">$15</label>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Packagin Costs</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <div class="form-floating">
                     <input type="text" class="form-control" id="floatingInput" placeholder="1" aria-describedby="floatingInputHelp" />
                     <label for="floatingInput">1</label>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Other Costs</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <div class="form-floating">
                     <input type="text" class="form-control" id="floatingInput" placeholder="1" aria-describedby="floatingInputHelp" />
                     <label for="floatingInput">1</label>
                  </div>
               </div>
            </div>
         </div>
         <hr class="m-0" />
         <!-- section 2 -->
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Category</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <select id="largeSelect" class="form-select form-select-lg">
                     <option>Baby - Baby M...</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Shipping Method</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <select id="largeSelect" class="form-select form-select-lg">
                     <option>LVG (Logistics)</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Select LVB Size</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <select id="largeSelect" class="form-select form-select-lg">
                     <option>Select LVB Size</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Expected Return</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <div class="form-floating">
                     <input type="text" class="form-control" id="floatingInput" placeholder="1" aria-describedby="floatingInputHelp" />
                     <label for="floatingInput">%1</label>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <p class="card-header">Expected Return per piece</p>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <div class="form-floating">
                     <input type="text" class="form-control" id="floatingInput" placeholder="1" aria-describedby="floatingInputHelp" />
                     <label for="floatingInput">$0.00</label>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="card mb-4">
         <div class="row">
            <div class="col-md-6">
               <div class="card-body">
                  <div class="form-floating">
                     <input type="text" class="form-control" id="floatingInput" placeholder="1" aria-describedby="floatingInputHelp" />
                     <label for="floatingInput">%1</label>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card-body">
                  <select id="largeSelect" class="form-select form-select-lg">
                     <option>Select LVB Size</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
               </div>
            </div>
         </div>
      </div>
      <div class="card mb-4">
         <div class="row" style="margin:10px">
            <!-- Sales last year -->
            <div class="col-xl-4 col-md-4 col-6 mb-4">
               <div class="card">
                  <div class="card-header pb-0">
                     <h5 class="card-title mb-0">Gross Profits</h5>
                     <br>
                     <small class="text-muted">$12.39</small>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-md-4 col-6 mb-4">
               <div class="card">
                  <div class="card-header pb-0">
                     <h5 class="card-title mb-0">Gross Turnover</h5>
                     <small class="text-muted">$80</small><br>
                     <small class="text-muted">include Vat:00</small>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-md-4 col-6 mb-4">
               <div class="card">
                  <div class="card-header pb-0">
                     <h5 class="card-title mb-0">Gross sell per piece</h5>
                     <small class="text-muted">$80</small><br>
                     <small class="text-muted">include Vat:00</small>
                  </div>
               </div>
            </div>
         </div>
         <div class="row" style="margin:10px">
            <!-- Sales last year -->
            <div class="col-xl-4 col-md-4 col-6 mb-4">
               <div class="card">
                  <div class="card-header pb-0">
                     <h5 class="card-title mb-0">Lose per piece</h5>
                     <br>
                     <small class="text-muted">$50</small>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-md-4 col-6 mb-4">
               <div class="card">
                  <div class="card-header pb-0">
                     <h5 class="card-title mb-0">Profit loss margin</h5>
                     <br>
                     <small class="text-muted">0%</small>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-md-4 col-6 mb-4">
               <div class="card">
                  <div class="card-header pb-0">
                     <h5 class="card-title mb-0">Break even</h5>
                     <br>
                     <small class="text-muted">0 stucc</small>
                     <br>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card mb-4">
         <div class="row">
            <div class="col-md-6">
            <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column">
                <div class="card-title mb-auto">
                  <h5 class="mb-1 text-nowrap">Cost Analysis</h5>
                  <div id="generatedLeadsChart"></div>
                </div>
                
              </div>
            
            </div>
          </div>
            </div>
            <div class="col-md-6">
               <div class="card-body">
               <div class="nav-align-top mb-4">
      <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">Total</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">Per Unit</button>
        </li>
       
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
          <p>
            Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear
            claw
            candy topping.
          </p>
          <p class="mb-0">
            Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o
            jelly-o ice
            cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
          </p>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
          <p>
            Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice cream. Gummies
            halvah
            tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream cheesecake fruitcake.
          </p>
          <p class="mb-0">
            Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah cotton candy
            liquorice caramels.
          </p>
        </div>
       
      </div>
    </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection