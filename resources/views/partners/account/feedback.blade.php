@extends('layouts/layoutMaster')

@section('title', ' Vertical Layouts - Forms')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
@endsection

@section('content')

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Feedback</h5> <small class="text-muted float-end"></small>
      </div>
      <div class="card-body">
        <form>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Full Name</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
          </div>
         
          <div class="mb-3">
            <label class="form-label" for="basic-default-email">Email</label>
            <div class="input-group input-group-merge">
              <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
              <span class="input-group-text" id="basic-default-email2">@example.com</span>
            </div>
            <div class="form-text"> You can use letters, numbers & periods </div>
          </div>
          
       <div class="row">
            <div class="col-md-4 p-4">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" />
            <label class="form-check-label" for="inlineRadio1">dashboard</label>
            </div>
            </div>
            
            <div class="col-md-4 p-4">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
            <label class="form-check-label" for="inlineRadio2">Invoices</label>
            </div>
            </div>
            
            <div class="col-md-4 p-4">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" />
            <label class="form-check-label" for="inlineRadio3">payment</label>
            </div></div>
             
            <div class="col-md-4 p-4">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4" />
            <label class="form-check-label" for="inlineRadio4">Order Panel</label>
            </div></div>

            <div class="col-md-4 p-4">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5" />
            <label class="form-check-label" for="inlineRadio5">Support</label>
            </div></div>  

            <div class="col-md-4 p-4">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6" />
            <label class="form-check-label" for="inlineRadio6">Shipping </label>
            </div></div>
         
            <div class="col-md-4 p-4">
             <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option7" />
            <label class="form-check-label" for="inlineRadio7">My Account </label>
            </div></div>
         
            <div class="col-md-4 p-4">    
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio8" value="option8" />
            <label class="form-check-label" for="inlineRadio8">My Orders </label>
             </div></div>
         
        <div class="col-md-4 p-4">
           <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio9" value="option9" />
            <label class="form-check-label" for="inlineRadio9">Others </label>
            </div>
            <div id="show" style="display:none;">
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="Add Your Business" />
          </div>
        </div>    
            
          </div>  
          <div class="mb-3">
            <label class="form-label" for="basic-default-message">Feedback</label>
            <textarea id="basic-default-message" class="form-control" placeholder="Type Feedback Here"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Submit Feedback</button>
       
        </div>
          
          
          
        </form>
      </div>
    </div>
  </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    
  $("#hide").click(function(){
    $("#show").hide();
  });
  $("#inlineRadio9").click(function(){
    $("#show").show();
  });
});
</script>

@endsection
