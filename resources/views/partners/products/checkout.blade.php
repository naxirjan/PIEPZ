@extends('layouts/layoutMaster')

@section('title', 'Checkout')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
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
<!-- Sticky Actions -->
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12 mx-auto">
            <!-- 1. Delivery Address -->
            <h5 class="mb-4">1. Shipping</h5>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="fullname">Company</label>
                <input type="text" id="fullname" class="form-control" placeholder="John Doe" />
              </div>
              <div class="col-md-6"></div>
              <div class="col-md-6">
                <label class="form-label" for="fullname">Name</label>
                <input type="text" id="fullname" class="form-control" placeholder="John Doe" />
              </div>
              <div class="col-md-6">
                <label class="form-label" for="fullname">Surname</label>
                <input type="text" id="fullname" class="form-control" placeholder="John Doe" />
              </div>
              <div class="col-md-6">
                <label class="form-label" for="state">Country</label>
                <select id="state" class="select2 form-select" data-allow-clear="true">
                  <option value="">Select</option>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District Of Columbia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="pincode">Postal code</label>
                <input type="text" id="pincode" class="form-control" placeholder="658468" />
              </div>
              <div class="col-md-6">
                <label class="form-label" for="state">State/Province</label>
                <select id="state" class="select2 form-select" data-allow-clear="true">
                  <option value="">Select</option>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District Of Columbia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="city">Town/City</label>
                <input type="text" id="city" class="form-control" placeholder="Jackson" />
              </div>
              <div class="col-12">
                <label class="form-label" for="address">Address</label>
                <textarea name="address" class="form-control" id="address" rows="2" placeholder="1456, Mall Road"></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="phone">Landline or mobile phone</label>
                <input type="text" id="phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" />
              </div>
              <div class="col-md-6">
                <label class="form-label" for="alt-num">Other landline or mobile phone</label>
                <input type="text" id="alt-num" class="form-control phone-mask" placeholder="658 799 8941" />
              </div>
              <!-- <div class="col-md-6">
                <label class="form-label" for="landmark">Landmark</label>
                <input type="text" id="landmark" class="form-control" placeholder="Nr. Wall Street" />
              </div> -->
              <div class="col-md-6">
                <label class="form-label" for="email">Consignee's Email Address</label>
                <div class="input-group input-group-merge">
                  <input class="form-control" type="text" required id="email" name="email" placeholder="john.doe" aria-label="john.doe" aria-describedby="email3" />
                  <span class="input-group-text" id="email3">@example.com</span>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="deliveryAdd" checked="">
                  <label class="form-check-label" for="deliveryAdd"> Use this as default delivery address </label>
                </div>
              </div>

              <!-- <label class="form-check-label">Address Type</label>
              <div class="col mt-2">
                <div class="form-check form-check-inline">
                  <input name="collapsible-address-type" class="form-check-input" type="radio" value="" id="collapsible-address-type-home" checked="" />
                  <label class="form-check-label" for="collapsible-address-type-home">Home (All day delivery)</label>
                </div>
                <div class="form-check form-check-inline">
                  <input name="collapsible-address-type" class="form-check-input" type="radio" value="" id="collapsible-address-type-office" />
                  <label class="form-check-label" for="collapsible-address-type-office"> Office (Delivery between 10 AM - 5 PM) </label>
                </div>
              </div> -->
            </div>
            <hr>
            <!-- 2. Delivery Type -->
            <h5 class="my-4">2. Shipping Method</h5>
            <div class="row">
              <div class="col-md-4 mb-md-0 mb-3">
                <div class="form-check custom-option custom-option-basic checked">
                  <label class="form-check-label custom-option-content" for="radioStandard">
                    <input name="CustomRadioDelivery" class="form-check-input" type="radio" value="" id="radioStandard" checked="">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">dpd</span>
                      <span>$35.46</span>
                    </span>
                    <span class="custom-option-body">
                      <small>3-5 Days</small>
                    </span>
                  </label>
                </div>
              </div>
              <div class="col-md-4 mb-md-0 mb-3">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="radioExpress">
                    <input name="CustomRadioDelivery" class="form-check-input" type="radio" value="" id="radioExpress">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">UPS</span>
                      <span>$77.00</span>
                    </span>
                    <span class="custom-option-body">
                      <small>2-3 Days</small>
                    </span>
                  </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="radioOvernight">
                    <input name="CustomRadioDelivery" class="form-check-input" type="radio" value="" id="radioOvernight">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">DHL</span>
                      <span>$565.00</span>
                    </span>
                    <span class="custom-option-body">
                      <small>24h</small>
                    </span>
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <!-- 3. Payment Method -->
            <h5 class="my-4">3. Payment Method</h5>
            <div class="row g-3">
              <div class="col-md-4 mb-md-0 mb-3">
                <div class="form-check custom-option custom-option-basic checked">
                  <label class="form-check-label custom-option-content" for="paypal">
                    <input name="CustomRadioDelivery" class="form-check-input" type="radio" value="" id="paypal" checked="">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">PayPal</span>
                      <!-- <span></span> -->
                    </span>
                    <!-- <span class="custom-option-body">
                      <small>3-5 Days</small>
                    </span> -->
                  </label>
                </div>
              </div>
              <div class="col-md-4 mb-md-0 mb-3">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="banckcard">
                    <input name="CustomRadioDelivery" class="form-check-input" type="radio" value="" id="banckcard">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">Bank Card</span>
                      <!-- <span>$77.00</span> -->
                    </span>
                    <!-- <span class="custom-option-body">
                      <small>2-3 Days</small>
                    </span> -->
                  </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="radioOvernight">
                    <input name="CustomRadioDelivery" class="form-check-input" type="radio" value="" id="radioOvernight">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">Bank Wire Transfer</span>
                      <!-- <span>$565.00</span> -->
                    </span>
                    <!-- <span class="custom-option-body">
                      <small>24h</small>
                    </span> -->
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <!-- Estimated Delivery -->
        <h6>Estimated Delivery Date</h6>
        <ul class="list-unstyled">
          <li class="d-flex gap-3 align-items-center">
            <div class="flex-shrink-0">
              <img src="{{ asset('assets/img/products/1.png') }}" alt="google home" class="w-px-50">
            </div>
            <div class="flex-grow-1">
              <p class="mb-0"><a class="text-body" href="javascript:void(0)">Google - Google Home - White</a></p>
              <p class="fw-semibold">18th Nov 2021</p>
            </div>
          </li>
          <li class="d-flex gap-3 align-items-center">
            <div class="flex-shrink-0">
              <img src="{{ asset('assets/img/products/2.png') }}" alt="google home" class="w-px-50">
            </div>
            <div class="flex-grow-1">
              <p class="mb-0"><a class="text-body" href="javascript:void(0)">Apple iPhone 11 (64GB, Black)</a></p>
              <p class="fw-semibold">20th Nov 2021</p>
            </div>
          </li>
        </ul>

        <hr class="mx-n4">

        <!-- Price Details -->
        <h6>Price Details</h6>
        <dl class="row mb-0">

          <dt class="col-6 fw-normal">Order Total</dt>
          <dd class="col-6 text-end">$1100.00</dd>

          <dt class="col-6 fw-normal">Delivery Charges</dt>
          <dd class="col-6 text-end"><s>$5.00</s> <span class="badge bg-label-success ms-1">Free</span></dd>

        </dl>
        <hr class="mx-n4">
        <dl class="row mb-3">
          <dt class="col-6">Total</dt>
          <dd class="col-6 fw-semibold text-end mb-0">$1100.00</dd>
        </dl>
      
        <div class="d-grid">
          <button class="btn btn-primary btn-next">Place Order</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Sticky Actions -->
@endsection
