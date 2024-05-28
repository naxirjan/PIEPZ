
@extends('layouts/layoutMaster')

@section('title', 'View User Profile')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection
<style>
  .tab-content {
    background: unset !important;
    box-shadow: unset !important;
}

.nav {
    --bs-nav-link-padding-x: 5px !important;
    --bs-nav-link-padding-y:  5px !important;


}
</style>
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-user-view.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/modal-edit-user.js')}}"></script>
<script src="{{asset('assets/js/app-user-view.js')}}"></script>
<script src="{{asset('assets/js/app-user-view-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">User / View /</span> Profile
  <!-- Back -->
  <a href="/admin/users/{{base64_encode(($data->role_id ?? ""))}}" type="button" style="float:right;"
     class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
     data-bs-placement="left" data-bs-original-title="Back">
    <i class="ti ti-arrow-back"></i>
  </a>
</h4>
<div class="row">
  <!-- User Sidebar -->
  <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
  <div>

   <!-- User Card -->
   <div class="card mb-4">
       <div class="card-body">
         <div class="user-avatar-section">
           <div class=" d-flex align-items-center flex-column">
             <img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ asset('assets/img/avatars/15.png') }}" height="100" width="100" alt="User avatar" />
             <div class="user-info text-center">
               <h4 class="mb-2">{{$data->first_name}}</h4>
               <span class="badge bg-label-secondary mt-1">Author</span>
             </div>
           </div>
         </div>
         <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
           <div class="d-flex align-items-start me-4 mt-3 gap-2">
             <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-checkbox ti-sm'></i></span>
             <div>
               <p class="mb-0 fw-semibold">1.23k</p>
               <small>Tasks Done</small>
             </div>
           </div>
           <div class="d-flex align-items-start mt-3 gap-2">
             <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-briefcase ti-sm'></i></span>
             <div>
               <p class="mb-0 fw-semibold">568</p>
               <small>Projects Done</small>
             </div>
           </div>
         </div>
         <p class="mt-4 small text-uppercase text-muted">Details</p>
         <div class="info-container">
           <ul class="list-unstyled">
             <li class="mb-2">
               <span class="fw-semibold me-1">Username:</span>
               <span>{{$data->first_name." ".$data->last_name}}</span>
             </li>
             <li class="mb-2 pt-1">
               <span class="fw-semibold me-1">Email:</span>
               <span>{{$data->email}}</span>
             </li>
             <li class="mb-2 pt-1">
               <span class="fw-semibold me-1">Status:</span>
               <span class="badge bg-label-success">Active</span>
             </li>
             <li class="mb-2 pt-1">
               <span class="fw-semibold me-1">Role:</span>
               <span>Author</span>
             </li>
             <li class="mb-2 pt-1">
               <span class="fw-semibold me-1">Tax id:</span>
               <span>{{$data->tax_number}}</span>
             </li>
             <li class="mb-2 pt-1">
               <span class="fw-semibold me-1">Contact:</span>
               <span>{{$data->phone}}</span>
             </li>
             <li class="mb-2 pt-1">
               <span class="fw-semibold me-1">Languages:</span>
               <span>French</span>
             </li>
             <li class="pt-1">
               <span class="fw-semibold me-1">Country:</span>
               <span>England</span>
             </li>
           </ul>
           <div class="d-flex justify-content-center">
             <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser" data-bs-toggle="modal">Edit</a>
             <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>
           </div>
         </div>
       </div>
     </div>
     <!-- /User Card -->
     <!-- Plan Card -->
     <div class="card mb-4">
       <div class="card-body">
         <div class="d-flex justify-content-between align-items-start">
           <span class="badge bg-label-primary">Standard</span>
           <div class="d-flex justify-content-center">
             <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary fw-normal">$</sup>
             <h1 class="fw-semibold mb-0 text-primary">99</h1>
             <sub class="h6 pricing-duration mt-auto mb-2 text-muted fw-normal">/month</sub>
           </div>
         </div>
         <ul class="ps-3 g-2 my-3">
           <li class="mb-2">10 Users</li>
           <li class="mb-2">Up to 10 GB storage</li>
           <li>Basic Support</li>
         </ul>
         <div class="d-flex justify-content-between align-items-center mb-1 fw-semibold text-heading">
           <span>Days</span>
           <span>65% Completed</span>
         </div>
         <div class="progress mb-1" style="height: 8px;">
           <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
         </div>
         <span>4 days remaining</span>
         <div class="d-grid w-100 mt-4">
           <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade Plan</button>
         </div>
       </div>
     </div>
     <!-- /Plan Card -->
 </div>
  </div>
  <!--/ User Sidebar -->


  <!-- User Content -->
  <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
  <div class="nav-align-top mb-4">
      <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true"><i class="tf-icons ti ti-home ti-xs me-1"></i> Account</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-billing" aria-controls="navs-pills-justified-billing" aria-selected="false"><i class="tf-icons ti ti-user ti-xs me-1"></i> Billing & Plans</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-connection" aria-controls="navs-pills-justified-connection" aria-selected="false"><i class="tf-icons ti ti-message-dots ti-xs me-1"></i> Connections</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-notification" aria-controls="navs-pills-justified-notification" aria-selected="false"><i class="tf-icons ti ti-user ti-xs me-1"></i> Notifications</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-security" aria-controls="navs-pills-justified-security" aria-selected="false"><i class="tf-icons ti ti-message-dots ti-xs me-1"></i> Security</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
   <!-- Activity Timeline -->
            <div class="card mb-4">
                <h5 class="card-header">User Activity Timeline</h5>
                <div class="card-body pb-0">
                  <ul class="timeline mb-0">
                    <li class="timeline-item timeline-item-transparent">
                      <span class="timeline-point timeline-point-primary"></span>
                      <div class="timeline-event">
                        <div class="timeline-header mb-1">
                          <h6 class="mb-0">12 Invoices have been paid</h6>
                          <small class="text-muted">12 min ago</small>
                        </div>
                        <p class="mb-2">Invoices have been paid to the company</p>
                        <div class="d-flex">
                          <a href="javascript:void(0)" class="me-3">
                            <img src="{{asset('assets/img/icons/misc/pdf.png')}}" alt="PDF image" width="15" class="me-2">
                            <span class="fw-semibold text-heading">invoices.pdf</span>
                          </a>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-item timeline-item-transparent">
                      <span class="timeline-point timeline-point-warning"></span>
                      <div class="timeline-event">
                        <div class="timeline-header mb-1">
                          <h6 class="mb-0">Client Meeting</h6>
                          <small class="text-muted">45 min ago</small>
                        </div>
                        <p class="mb-2">Project meeting with john @10:15am</p>
                        <div class="d-flex flex-wrap">
                          <div class="avatar me-3">
                            <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle" />
                          </div>
                          <div>
                            <h6 class="mb-0">Lester McCarthy (Client)</h6>
                            <small>CEO of {{ config('variables.creatorName') }}</small>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class=" timeline-item timeline-item-transparent">
                      <span class="timeline-point timeline-point-info"></span>
                      <div class="timeline-event">
                        <div class="timeline-header mb-1">
                          <h6 class="mb-0">Create a new project for client</h6>
                          <small class="text-muted">2 Day Ago</small>
                        </div>
                        <p class="mb-2">5 team members in a project</p>
                        <div class="d-flex align-items-center avatar-group">
                          <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy">
                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle">
                          </div>
                          <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Marrie Patty">
                            <img src="{{ asset('assets/img/avatars/12.png') }}" alt="Avatar" class="rounded-circle">
                          </div>
                          <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Jimmy Jackson">
                            <img src="{{ asset('assets/img/avatars/9.png') }}" alt="Avatar" class="rounded-circle">
                          </div>
                          <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kristine Gill">
                            <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar" class="rounded-circle">
                          </div>
                          <div class="avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Nelson Wilson">
                            <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar" class="rounded-circle">
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-item timeline-item-transparent border-0">
                      <span class="timeline-point timeline-point-success"></span>
                      <div class="timeline-event">
                        <div class="timeline-header mb-1">
                          <h6 class="mb-0">Design Review</h6>
                          <small class="text-muted">5 days Ago</small>
                        </div>
                        <p class="mb-0">Weekly review of freshly prepared design for our new app.</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
    <!-- /Activity Timeline -->
        </div>
        <div class="tab-pane fade" id="navs-pills-justified-billing" role="tabpanel">
                <!-- Current Plan -->
    <div class="card mb-4">
      <h5 class="card-header">Current Plan</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-xl-6 order-1 order-xl-0">
            <div class="mb-2">
              <h6 class="mb-1">Your Current Plan is Basic</h6>
              <p>A simple start for everyone</p>
            </div>
            <div class="mb-2 pt-1">
              <h6 class="mb-1">Active until Dec 09, 2021</h6>
              <p>We will send you a notification upon Subscription expiration</p>
            </div>
            <div class="mb-3 pt-1">
              <h6 class="mb-1"><span class="me-2">$199 Per Month</span> <span class="badge bg-label-primary">Popular</span></h6>
              <p>Standard plan for small to medium businesses</p>
            </div>
          </div>
          <div class="col-xl-6 order-0 order-xl-0">
            <div class="alert alert-warning" role="alert">
              <h5 class="alert-heading mb-2">We need your attention!</h5>
              <span>Your plan requires update</span>
            </div>
            <div class="plan-statistics">
              <div class="d-flex justify-content-between">
                <h6 class="mb-1">Days</h6>
                <h6 class="mb-1">24 of 30 Days</h6>
              </div>
              <div class="progress mb-1">
                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <p>6 days remaining until your plan requires update</p>
            </div>
          </div>
          <div class="col-12 order-2 order-xl-0">
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#upgradePlanModal">Upgrade Plan</button>
            <button class="btn btn-label-danger cancel-subscription">Cancel Subscription</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /Current Plan -->

              <!-- Payment Methods -->
              <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                  <h5 class="card-action-title mb-0">Payment Methods</h5>
                  <div class="card-action-element">
                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addNewCCModal"><i class="ti ti-plus ti-xs me-1"></i>Add Card</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="added-cards">
                    <div class="cardMaster border p-3 rounded mb-3">
                      <div class="d-flex justify-content-between flex-sm-row flex-column">
                        <div class="card-information">
                          <img class="mb-3 img-fluid" src="{{asset('assets/img/icons/payments/mastercard.png')}}" alt="Master Card">
                          <h6 class="mb-2 pt-1">Kaith Morrison</h6>
                          <span class="card-number">&#8727;&#8727;&#8727;&#8727; &#8727;&#8727;&#8727;&#8727; &#8727;&#8727;&#8727;&#8727; 9856</span>
                        </div>
                        <div class="d-flex flex-column text-start text-lg-end">
                          <div class="d-flex order-sm-0 order-1 mt-3">
                            <button class="btn btn-label-primary me-3" data-bs-toggle="modal" data-bs-target="#editCCModal">Edit</button>
                            <button class="btn btn-label-secondary">Delete</button>
                          </div>
                          <small class="mt-sm-auto mt-2 order-sm-1 order-0">Card expires at 12/26</small>
                        </div>
                      </div>
                    </div>
                    <div class="cardMaster border p-3 rounded mb-3">
                      <div class="d-flex justify-content-between flex-sm-row flex-column">
                        <div class="card-information">
                          <img class="mb-3 img-fluid" src="{{asset('assets/img/icons/payments/visa.png')}}" alt="Master Card">
                          <div class="d-flex align-items-center mb-2 pt-1">
                            <h6 class="mb-0 me-3">Tom McBride</h6>
                            <span class="badge bg-label-primary me-1">Primary</span>
                          </div>
                          <span class="card-number">&#8727;&#8727;&#8727;&#8727; &#8727;&#8727;&#8727;&#8727; &#8727;&#8727;&#8727;&#8727; 6542</span>
                        </div>
                        <div class="d-flex flex-column text-start text-lg-end">
                          <div class="d-flex order-sm-0 order-1 mt-3">
                            <button class="btn btn-label-primary me-3" data-bs-toggle="modal" data-bs-target="#editCCModal">Edit</button>
                            <button class="btn btn-label-secondary">Delete</button>
                          </div>
                          <small class="mt-sm-auto mt-2 order-sm-1 order-0">Card expires at 10/24</small>
                        </div>
                      </div>
                    </div>
                    <div class="cardMaster border p-3 rounded">
                      <div class="d-flex justify-content-between flex-sm-row flex-column">
                        <div class="card-information">
                          <img class="mb-3 img-fluid" src="{{asset('assets/img/icons/payments/american-ex.png')}}" alt="Visa Card">
                          <h6 class="mb-2 pt-1">Mildred Wagner</h6>
                          <span class="card-number">&#8727;&#8727;&#8727;&#8727; &#8727;&#8727;&#8727;&#8727; &#8727;&#8727;&#8727;&#8727; 5896</span>
                        </div>
                        <div class="d-flex flex-column text-start text-lg-end">
                          <div class="d-flex order-sm-0 order-1 mt-3">
                            <button class="btn btn-label-primary me-3" data-bs-toggle="modal" data-bs-target="#editCCModal">Edit</button>
                            <button class="btn btn-label-secondary">Delete</button>
                          </div>
                          <small class="mt-sm-auto mt-2 order-sm-1 order-0">Card expires at 10/27</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Payment Methods -->

                <!-- Billing Address -->
                <div class="card card-action mb-4">
                  <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">Billing Address</h5>
                    <div class="card-action-element">
                      <button class="btn btn-primary btn-sm edit-address" type="button" data-bs-toggle="modal" data-bs-target="#addNewAddress">Edit address</button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-7 col-12">
                        <dl class="row mb-0">
                          <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Company Name:</dt>
                          <dd class="col-sm-8">{{ config('variables.templateName') }}</dd>

                          <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Billing Email:</dt>
                          <dd class="col-sm-8">user@ex.com</dd>

                          <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Tax ID:</dt>
                          <dd class="col-sm-8">TAX-357378</dd>

                          <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">VAT Number:</dt>
                          <dd class="col-sm-8">SDF754K77</dd>

                          <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Billing Address:</dt>
                          <dd class="col-sm-8">100 Water Plant <br>Avenue, Building 1303<br> Wake Island</dd>
                        </dl>
                      </div>
                      <div class="col-xl-5 col-12">
                        <dl class="row mb-0">
                          <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Contact:</dt>
                          <dd class="col-sm-8">+1 (605) 977-32-65</dd>

                          <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Country:</dt>
                          <dd class="col-sm-8">Wake Island</dd>

                          <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">State:</dt>
                          <dd class="col-sm-8">Capholim</dd>

                          <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Zipcode:</dt>
                          <dd class="col-sm-8">403114</dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Billing Address -->
        </div>
        <div class="tab-pane fade" id="navs-pills-justified-connection" role="tabpanel">
          <!-- Connected Accounts -->
                  <div class="card mb-4">
                    <h5 class="card-header pb-1">Connected Accounts</h5>
                    <div class="card-body">
                      <p class="mb-4">Display content from your connected accounts on your site</p>
                      <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                          <img src="{{asset('assets/img/icons/brands/google.png')}}" alt="google" class="me-3" height="38">
                        </div>
                        <div class="flex-grow-1 row">
                          <div class="col-9 mb-sm-0 mb-2">
                            <h6 class="mb-0">Google</h6>
                            <small class="text-muted">Calendar and contacts</small>
                          </div>
                          <div class="col-3 text-end">
                            <div class="form-check form-switch">
                              <input class="form-check-input float-end" type="checkbox" checked>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                          <img src="{{asset('assets/img/icons/brands/slack.png')}}" alt="slack" class="me-3" height="38">
                        </div>
                        <div class="flex-grow-1 row">
                          <div class="col-9 mb-sm-0 mb-2">
                            <h6 class="mb-0">Slack</h6>
                            <small class="text-muted">Communication</small>
                          </div>
                          <div class="col-3 text-end">
                            <div class="form-check form-switch">
                              <input class="form-check-input float-end" type="checkbox">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                          <img src="{{asset('assets/img/icons/brands/github.png')}}" alt="github" class="me-3" height="38">
                        </div>
                        <div class="flex-grow-1 row">
                          <div class="col-9 mb-sm-0 mb-2">
                            <h6 class="mb-0">Github</h6>
                            <small class="text-muted">Manage your Git repositories</small>
                          </div>
                          <div class="col-3 text-end">
                            <div class="form-check form-switch">
                              <input class="form-check-input float-end" type="checkbox" checked>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                          <img src="{{asset('assets/img/icons/brands/mailchimp.png')}}" alt="mailchimp" class="me-3" height="38">
                        </div>
                        <div class="flex-grow-1 row">
                          <div class="col-9 mb-sm-0 mb-2">
                            <h6 class="mb-0">Mailchimp</h6>
                            <small class="text-muted">Email marketing service</small>
                          </div>
                          <div class="col-3 text-end">
                            <div class="form-check form-switch">
                              <input class="form-check-input float-end" type="checkbox" checked>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img src="{{asset('assets/img/icons/brands/asana.png')}}" alt="asana" class="me-3" height="38">
                        </div>
                        <div class="flex-grow-1 row">
                          <div class="col-9 mb-sm-0 mb-2">
                            <h6 class="mb-0">Asana</h6>
                            <small class="text-muted">Communication</small>
                          </div>
                          <div class="col-3 text-end">
                            <div class="form-check form-switch">
                              <input class="form-check-input float-end" type="checkbox">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
           <!-- /Connected Accounts -->


        </div>
        <div class="tab-pane fade" id="navs-pills-justified-notification" role="tabpanel">
         <!-- Notifications -->
         <div class="card">
                        <h5 class="card-header pb-1">Recent Devices</h5>
                        <div class="card-body">
                          <span>Change to notification settings, the user will get the update</span>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped border-top">
                            <thead>
                              <tr>
                                <th class="text-nowrap">Type</th>
                                <th class="text-nowrap text-center">Email</th>
                                <th class="text-nowrap text-center">Browser</th>
                                <th class="text-nowrap text-center">App</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-nowrap">New for you</td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck1" checked />
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck2" checked />
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck3" checked />
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-nowrap">Account activity</td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck4" checked />
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck5" checked />
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck6" checked />
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-nowrap">A new browser used to sign in</td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck7" checked />
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck8" checked />
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck9" />
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-nowrap">A new device is linked</td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck10" checked />
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck11" />
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck12" />
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="card-body">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-label-secondary">Discard</button>
                        </div>
</div>
          <!-- /Notifications -->
        </div>
        <div class="tab-pane fade" id="navs-pills-justified-security" role="tabpanel">
                    <!-- Change Password -->
                              <div class="card mb-4">
                                <h5 class="card-header">Change Password</h5>
                                <div class="card-body">
                                  <form id="formChangePassword" method="POST" onsubmit="return false">
                                    <div class="alert alert-warning" role="alert">
                                      <h5 class="alert-heading mb-2">Ensure that these requirements are met</h5>
                                      <span>Minimum 8 characters long, uppercase & symbol</span>
                                    </div>
                                    <div class="row">
                                      <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                        <label class="form-label" for="newPassword">New Password</label>
                                        <div class="input-group input-group-merge">
                                          <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                          <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        </div>
                                      </div>

                                      <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                        <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                        <div class="input-group input-group-merge">
                                          <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                          <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        </div>
                                      </div>
                                      <div>
                                        <button type="submit" class="btn btn-primary me-2">Change Password</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                    <!--/ Change Password -->

                    <!-- Two-steps verification -->
                              <div class="card mb-4">
                                <h5 class="card-header pb-2">Two-steps verification</h5>
                                <div class="card-body">
                                  <span>Keep your account secure with authentication step.</span>
                                  <h6 class="mt-3 mb-2">SMS</h6>
                                  <div class="d-flex justify-content-between border-bottom mb-3 pb-2">
                                    <span>+1(968) 945-8832</span>
                                    <div class="action-icons">
                                      <a href="javascript:;" class="text-body me-1" data-bs-target="#enableOTP" data-bs-toggle="modal"><i class="ti ti-edit ti-sm"></i></a>
                                      <a href="javascript:;" class="text-body"><i class="ti ti-trash ti-sm"></i></a>
                                    </div>
                                  </div>
                                  <p class="mb-0">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.
                                    <a href="javascript:void(0);" class="text-body">Learn more.</a>
                                  </p>
                                </div>
                              </div>
                    <!--/ Two-steps verification -->

                    <!-- Recent Devices -->
                                  <div class="card mb-4">
                                    <h5 class="card-header">Recent Devices</h5>
                                    <div class="table-responsive">
                                      <table class="table border-top">
                                        <thead>
                                          <tr>
                                            <th class="text-truncate">Browser</th>
                                            <th class="text-truncate">Device</th>
                                            <th class="text-truncate">Location</th>
                                            <th class="text-truncate">Recent Activities</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td class="text-truncate"><i class='ti ti-brand-windows text-info ti-xs me-2'></i> <strong>Chrome on Windows</strong></td>
                                            <td class="text-truncate">HP Spectre 360</td>
                                            <td class="text-truncate">Switzerland</td>
                                            <td class="text-truncate">10, July 2021 20:07</td>
                                          </tr>
                                          <tr>
                                            <td class="text-truncate"><i class='ti ti-device-mobile text-danger ti-xs me-2'></i> <strong>Chrome on iPhone</strong></td>
                                            <td class="text-truncate">iPhone 12x</td>
                                            <td class="text-truncate">Australia</td>
                                            <td class="text-truncate">13, July 2021 10:10</td>
                                          </tr>
                                          <tr>
                                            <td class="text-truncate"><i class='ti ti-brand-android text-success ti-xs me-2'></i> <strong>Chrome on Android</strong></td>
                                            <td class="text-truncate">Oneplus 9 Pro</td>
                                            <td class="text-truncate">Dubai</td>
                                            <td class="text-truncate">14, July 2021 15:15</td>
                                          </tr>
                                          <tr>
                                            <td class="text-truncate"><i class='ti ti-brand-apple ti-xs me-2'></i> <strong>Chrome on MacOS</strong></td>
                                            <td class="text-truncate">Apple iMac</td>
                                            <td class="text-truncate">India</td>
                                            <td class="text-truncate">16, July 2021 16:17</td>
                                          </tr>
                                          <tr>
                                            <td class="text-truncate"><i class='ti ti-brand-windows text-info ti-xs me-2'></i> <strong>Chrome on Windows</strong></td>
                                            <td class="text-truncate">HP Spectre 360</td>
                                            <td class="text-truncate">Switzerland</td>
                                            <td class="text-truncate">20, July 2021 21:01</td>
                                          </tr>
                                          <tr>
                                            <td class="text-truncate border-bottom-0"><i class='ti ti-brand-android text-success ti-xs me-2'></i> <strong>Chrome on Android</strong></td>
                                            <td class="text-truncate border-bottom-0">Oneplus 9 Pro</td>
                                            <td class="text-truncate border-bottom-0">Dubai</td>
                                            <td class="text-truncate border-bottom-0">21, July 2021 12:22</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                    <!--/ Recent Devices -->
        </div>
      </div>
    </div>






  </div>
  <!--/ User Content -->
</div>

<!-- Modal -->
@include('_partials/_modals/modal-edit-user')
@include('_partials/_modals/modal-upgrade-plan')
<!-- /Modal -->
@endsection
