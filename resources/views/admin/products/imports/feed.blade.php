@extends('layouts/layoutMaster')

@section('title', 'Analytics')



@section('content')
<style>
    
.separator{
  display:flex;
  align-items: center;
}

.separator .line{
  height: 1px;
  flex: 1;
  background-color: #000;
}

.separator h2{
  padding: 0 2rem;
}
</style>

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Select File Type
</h4>

<div class="row">
  <!-- Custom Icon Radios -->
  <div class="col-xl-12 mb-4">
    <div class="card">
      <h5 class="card-header">Import Products</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon1">
                <span class="custom-option-body">
                <i class="fa fa-file" style="font-size:24px"></i>
                  <span class="custom-option-title">XML</span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
              </label>
            </div>
          </div>
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon2">
                <span class="custom-option-body">
                <i class="fa fa-file" style="font-size:24px"></i>
                  <span class="custom-option-title"> CSV </span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon2" />
              </label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon3">
                <span class="custom-option-body">
                <i class="fa fa-file" style="font-size:24px"></i>
                  <span class="custom-option-title"> TXT </span>
                 
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
                <i class="fa fa-file" style="font-size:24px"></i>
                  <span class="custom-option-title">Google Sheets</span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon4"  />
              </label>
            </div>
          </div>
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon5">
                <span class="custom-option-body">
                <i class="fa fa-file" style="font-size:24px"></i>
                  <span class="custom-option-title"> Shopify </span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon5" />
              </label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-check custom-option custom-option-icon">
              <label class="form-check-label custom-option-content" for="customRadioIcon6">
                <span class="custom-option-body">
                <i class="fa fa-file" style="font-size:24px"></i>
                  <span class="custom-option-title"> WooCommerce </span>
                 
                </span>
                <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon6" />
              </label>
            </div>
          </div>
        </div>
        <br><br>

        <div>
          <label for="defaultFormControlInput" class="form-label">Name</label>
          <input type="text" class="form-control" id="defaultFormControlInput" placeholder="" aria-describedby="defaultFormControlHelp" />
        </div>

        <div>
          <label for="defaultFormControlInput" class="form-label">Website URL</label>
          <input type="text" class="form-control" id="defaultFormControlInput" placeholder="www.google.com" aria-describedby="defaultFormControlHelp" />
        </div>

        <hr class="my-5">

        <div class="separator">
            <div class="line"></div>
            <h2>OR</h2>
            <div class="line"></div>
        </div>
        <input class="form-control" type="file" id="formFile">
        <br><br>
        <button class="btn btn-primary btn-lg" type="button">save</button>

      </div>
    </div>
  </div>
  <!-- /Custom Icon Radios -->
</div>
 

@endsection
