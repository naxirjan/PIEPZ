@extends('layouts/layoutMaster')

@section('title', 'Sync')



@section('content')


<div class="row">
  <!-- Custom Icon Radios -->
  <div class="col-xl-12 mb-4">
    <div class="card">
      <h5 class="card-header">Sync Methods</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon1">
                <span class="custom-option-body">
                
                  <span class="custom-option-title">Sync 1</span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
              </label>
            </div>
          </div>
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon2">
                <span class="custom-option-body">
                
                  <span class="custom-option-title"> Sync 2 </span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon2" />
              </label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon3">
                <span class="custom-option-body">
                
                  <span class="custom-option-title"> Sync 3 </span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon3" />
              </label>
            </div>
          </div>
        </div>
          <hr class="my-5">
        <div class="row">
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon4">
                <span class="custom-option-body">
                
                  <span class="custom-option-title">Sync 4</span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon4"  />
              </label>
            </div>
          </div>
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon5">
                <span class="custom-option-body">
                
                  <span class="custom-option-title"> Sync 5 </span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon5" />
              </label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon6">
                <span class="custom-option-body">
                
                  <span class="custom-option-title"> Sync 6 </span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon6" />
              </label>
            </div>
          </div>
        </div>
        <hr>
        
        <br><br>
        <div class="row">
        <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon4">
                <span class="custom-option-body">
                
                  <span class="custom-option-title">Sync with open API</span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon4"  />
              </label>
            </div>
          </div>
        </div>
<br>
        <button class="btn btn-primary btn-lg" type="button">Synchronize</button>

      </div>
    </div>
  </div>
  <!-- /Custom Icon Radios -->
</div>
 

@endsection
