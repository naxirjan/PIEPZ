@extends('layouts/layoutMaster')

@section('title', 'Custom Options - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Forms /</span> Custom Options
</h4>

<div class="row">
  <!-- Basic Custom Radios -->
  <div class="col-xl-12 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-basic">
              <label class="form-check-label custom-option-content" for="customRadioTemp1">
                <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp1" checked />
                <span class="custom-option-header">
                  <span class="h6 mb-0">Basic</span>
                  <span class="text-muted">Free</span>
                </span>
                <span class="custom-option-body">
                  <small>Get 1 project with 1 teams members.</small>
                </span>
              </label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-check custom-option custom-option-basic">
              <label class="form-check-label custom-option-content" for="customRadioTemp2">
                <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp2" />
                <span class="custom-option-header">
                  <span class="h6 mb-0">Premium</span>
                  <span class="text-muted">$ 5.00</span>
                </span>
                <span class="custom-option-body">
                  <small>Get 5 projects with 5 team members.</small>
                </span>
              </label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-check custom-option custom-option-basic">
              <label class="form-check-label custom-option-content" for="customRadioTemp3">
                <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp3" />
                <span class="custom-option-header">
                  <span class="h6 mb-0">Premium</span>
                  <span class="text-muted">$ 5.00</span>
                </span>
                <span class="custom-option-body">
                  <small>Get 5 projects with 5 team members.</small>
                </span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Basic Custom Radios -->

</div>

<script>
  // Check selected custom option
  window.Helpers.initCustomOptionCheck();

</script>


@endsection
