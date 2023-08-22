@extends('layouts/layoutMaster')

@section('title', 'Preview - Invoice')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-invoice.css')}}" />
@endsection

@section('page-script')
<script src="{{asset('assets/js/offcanvas-add-payment.js')}}"></script>
<script src="{{asset('assets/js/offcanvas-send-invoice.js')}}"></script>

<script src="{{asset('assets/js/forms-file-upload.js')}}"></script>
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
@endsection

@section('content')

<div class="row invoice-preview">

 <!-- Invoice Actions -->
 <div class="col-xl-4 col-md-4 col-4 invoice-actions">
     <!-- fields -->
     <div class="card mb-4">
      <h5 class="card-header">Adjust Template</h5>
      <div class="card-body">
     

      <div class="row">
            <div class="col-6">
            <p class="card-header">Upload Logo</p>
            <div class="card-body">
                <form action="/upload">
                <div class="dz-message needsclick">
                     </div>
                <div class="fallback">
                    <input name="file" type="file" />
                </div>
                </form>
            </div>
            </div>
            <div class="col-6"></div>
      </div>
    
    </div> </div>
    <!-- fields end -->
    <div class="card" style="padding:10px;">

    
        <div class="row">
            <div class="col-6">
            <small class="text-light fw-semibold">Store Information</small>
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                <label class="form-check-label" for="defaultCheck1">
                Name
                </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" />
                <label class="form-check-label" for="defaultCheck2">
                Vat Number
                </label>
            </div>
        
            </div>
            <div class="col-6">
            <small class="text-light fw-semibold"></small>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck4" />
                <label class="form-check-label" for="defaultCheck4">
                Address
                </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck5" />
                <label class="form-check-label" for="defaultCheck5">
                Iban number
                </label>
            </div>
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" />
                <label class="form-check-label" for="defaultCheck3">
                Chamber of commerce number
                </label>
            </div>
         
    </div>
    <br>
    <!-- fields -->
    <div class="card mb-4">
      <h5 class="card-header">Footer</h5>
      <div class="card-body">
        
       <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Title</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Title" />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Subtitle</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Subtitle" />
        </div>
    
      </div>
    </div>
    <!-- fields end -->
       <!-- fields Second -->
       <div class="card mb-4">
      <h5 class="card-header">Setting</h5>
      <div class="card-body">
        
       <div class="mb-3">
        <label for="largeSelect" class="form-label">Do you want to send invoice autometically</label>
          <select id="largeSelect" class="form-select">
            <option>No</option>
            <option value="1">Yes</option>
          </select>  
        </div>
       
        <div class="mb-3">
            Note : Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
        </div>
        <div class="mb-3">
          <label class="switch">
            <input type="checkbox" class="switch-input" />
            <span class="switch-toggle-slider">
              <span class="switch-on"></span>
              <span class="switch-off"></span>
            </span>
            <span class="switch-label">Send a copy to yourself</span>
          </label>
          <br><br>
          <label class="switch">
            <input type="checkbox" class="switch-input" />
            <span class="switch-toggle-slider">
              <span class="switch-on"></span>
              <span class="switch-off"></span>
            </span>
            <span class="switch-label">Apply Kor/Vat excemption scheme?</span>
          </label>
          <label class="switch">
            <input type="checkbox" class="switch-input" />
            <span class="switch-toggle-slider">
              <span class="switch-on"></span>
              <span class="switch-off"></span>
            </span>
            <span class="switch-label">Show paid sticker</span>
          </label>
        </div>

      </div>
    </div>
    <!-- fields Second end -->
  </div>
  <!-- /Invoice Actions -->

  <!-- Invoice -->
  <div class="col-xl-8 col-md-8 col-8 mb-md-0 mb-4">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
          <div class="mb-xl-0 mb-4">
            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
              @include('_partials.macros',["height"=>20,"withbg"=>''])
              <span class="app-brand-text fw-bold fs-4">
                {{ config('variables.templateName') }}
              </span>
            </div>
            <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
            <p class="mb-2">San Diego County, CA 91905, USA</p>
            <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
          </div>
          <div>
            <h4 class="fw-semibold mb-2">INVOICE #86423</h4>
            <div class="mb-2 pt-1">
              <span>Date Issues:</span>
              <span class="fw-semibold">April 25, 2021</span>
            </div>
            <div class="pt-1">
              <span>Date Due:</span>
              <span class="fw-semibold">May 25, 2021</span>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <div class="row p-sm-3 p-0">
          <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
            <h6 class="mb-3">Invoice To:</h6>
            <p class="mb-1">Thomas shelby</p>
            <p class="mb-1">Shelby Company Limited</p>
            <p class="mb-1">Small Heath, B10 0HF, UK</p>
            <p class="mb-1">718-986-6062</p>
            <p class="mb-0">peakyFBlinders@gmail.com</p>
          </div>
          <div class="col-xl-6 col-md-12 col-sm-7 col-12">
            <h6 class="mb-4">Bill To:</h6>
            <table>
              <tbody>
                <tr>
                  <td class="pe-4">Total Due:</td>
                  <td><strong>$12,110.55</strong></td>
                </tr>
                <tr>
                  <td class="pe-4">Bank name:</td>
                  <td>American Bank</td>
                </tr>
                <tr>
                  <td class="pe-4">Country:</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td class="pe-4">IBAN:</td>
                  <td>ETD95476213874685</td>
                </tr>
                <tr>
                  <td class="pe-4">SWIFT code:</td>
                  <td>BR91905</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="table-responsive border-top">
        <table class="table m-0">
          <thead>
            <tr>
              <th>Item</th>
              <th>Description</th>
              <th>Cost</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap">Vuexy Admin Template</td>
              <td class="text-nowrap">HTML Admin Template</td>
              <td>$32</td>
              <td>1</td>
              <td>$32.00</td>
            </tr>
            <tr>
              <td class="text-nowrap">Frest Admin Template</td>
              <td class="text-nowrap">Angular Admin Template</td>
              <td>$22</td>
              <td>1</td>
              <td>$22.00</td>
            </tr>
            <tr>
              <td class="text-nowrap">Apex Admin Template</td>
              <td class="text-nowrap">HTML Admin Template</td>
              <td>$17</td>
              <td>2</td>
              <td>$34.00</td>
            </tr>
            <tr>
              <td class="text-nowrap">Robust Admin Template</td>
              <td class="text-nowrap">React Admin Template</td>
              <td>$66</td>
              <td>1</td>
              <td>$66.00</td>
            </tr>
            <tr>
              <td colspan="3" class="align-top px-4 py-4">
                <p class="mb-2 mt-3">
                  <span class="ms-3 fw-semibold">Salesperson:</span>
                  <span>Alfie Solomons</span>
                </p>
                <span class="ms-3">Thanks for your business</span>
              </td>
              <td class="text-end pe-3 py-4">
                <p class="mb-2 pt-3">Subtotal:</p>
                <p class="mb-2">Discount:</p>
                <p class="mb-2">Tax:</p>
                <p class="mb-0 pb-3">Total:</p>
              </td>
              <td class="ps-2 py-4">
                <p class="fw-semibold mb-2 pt-3">$154.25</p>
                <p class="fw-semibold mb-2">$00.00</p>
                <p class="fw-semibold mb-2">$50.00</p>
                <p class="fw-semibold mb-0 pb-3">$204.25</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-body mx-3">
        <div class="row">
          <div class="col-12">
            <span class="fw-semibold">Note:</span>
            <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance
              projects. Thank You!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Invoice -->

 
</div>

<!-- Offcanvas -->
@include('_partials/_offcanvas/offcanvas-send-invoice')
@include('_partials/_offcanvas/offcanvas-add-payment')
<!-- /Offcanvas -->
@endsection
