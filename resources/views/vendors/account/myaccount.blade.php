@extends('layouts/layoutMaster')
@section('title', 'My Account')
@section('vendor-style')
@endsection
@section('vendor-script')
@endsection
@section('page-script')
@endsection
@section('content')
<div class="row">
   <!-- Earning Reports Tabs-->
   <div class="col-12 col-xl-8 mb-4">
      <!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Next Payout</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Order</th>
          <th>Invoice</th>
          <th>Amount</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
         <td>EA67639C</td>
            <td>227653</td>
            <td>
          $5000
          </td>
          <td><span class="badge bg-label-primary me-1">Active</span></td>
          <td>Download</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
         <td>EA67639C</td>
            <td>227653</td>
            <td>
          $5000
          </td>
          <td><span class="badge bg-label-primary me-1">Active</span></td>
          <td>Download</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
         <td>EA67639C</td>
            <td>227653</td>
            <td>
          $5000
          </td>
          <td><span class="badge bg-label-primary me-1">Active</span></td>
          <td>Download</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
         <td>EA67639C</td>
            <td>227653</td>
            <td>
          $5000
          </td>
          <td><span class="badge bg-label-success me-1">Completed</span></td>
          <td>Download</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-pencil me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
     
        
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->
   </div>
   <!-- Sales last 6 months -->
   <div class="col-12 col-xl-4">
      <div class="card h-100 ">
         <br>
         <div class="row">
            <div class="col-md-6 mb-md-0 mb-2">
               <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
                  <div class="card-body">
                     <p class="">Current Package</p>
                     <i class="fa-solid fa-box" style="font-size: 42px;"></i>
                  </div>
               </div>
            </div>
            <div class="col-md-6 mb-md-0 mb-2">
               <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
                  <div class="card-body">
                     <p class="">Compare Package</p>
                     <i class="fa-solid fa-code-compare" style="font-size: 42px;"></i>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="card-title m-0 me-2">
               <h5 class="m-0 me-2">Subscription Used</h5>
            </div>
         </div>
         <div class="progress" style="height: 20px; margin: 20px;">
            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
         </div>
         <div class="card-body">
            <div class="card-title m-0 me-2">
               <h5 class="m-0 me-2">Automatically Payment</h5>
               <small class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</small>
            </div>
            <ul class="p-0 m-0">
               <li class="d-flex mb-3 pb-1 align-items-center"></li>
               <li class="d-flex mb-3 pb-1 align-items-center">
                  <div class="badge bg-label-primary me-3 rounded p-2">
                     <i class="ti ti-wallet ti-sm"></i>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                     <div class="me-2">
                        <h6 class="mb-0">Wallet</h6>
                     </div>
                     <div class="user-progress d-flex align-items-center gap-1">
                        <h6 class="mb-0 text-danger"><a class="btn rounded-pill btn-warning waves-effect waves-light" href="#">syncronize</a></h6>
                     </div>
                  </div>
               </li>
               <li class="d-flex mb-3 pb-1 align-items-center">
                  <div class="badge bg-label-danger rounded me-3 p-2">
                     <i class="ti ti-brand-paypal ti-sm"></i>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                     <div class="me-2">
                        <h6 class="mb-0">Paypal</h6>
                     </div>
                     <div class="user-progress d-flex align-items-center gap-1">
                        <h6 class="mb-0 text-success"><a class="btn rounded-pill btn-warning waves-effect waves-light" href="#">syncronize</a></h6>
                     </div>
                  </div>
               </li>
               <li class="d-flex mb-3 pb-1 align-items-center">
                  <div class="badge bg-label-danger rounded me-3 p-2">
                     <i class="ti ti-brand-paypal ti-sm"></i>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                     <div class="me-2">
                        <h6 class="mb-0">Card </h6>
                     </div>
                     <div class="user-progress d-flex align-items-center gap-1">
                        <h6 class="mb-0 text-success"><a class="btn rounded-pill btn-warning waves-effect waves-light" href="#">syncronize</a></h6>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
@endsection