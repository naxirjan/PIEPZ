@extends('layouts/layoutMaster')

@section('title', 'Sync')



@section('content')


<div class="row">
 <div class="col-xl-12 mb-4">
  <div class="card">
   <div class="card-body">
     
    <!-- section start-->
    
    <div class="row">
       
            <div class="col-md mb-md-0 mb-2">
              <div class="form-check custom-option custom-option-basic">
                <label class="form-check-label custom-option-content" for="customRadioTemp1">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp1" checked />
                  <span class="custom-option-header">
                    <span class="h6 mb-0">Shopify</span>
                    
                  </span>
                  <span class="custom-option-body">
                    <span class="text-muted">Active</span>
                  </span>
                </label>
              </div>
            </div>
          
            <div class="col-md">
              <div class="form-check custom-option custom-option-basic">
                <label class="form-check-label custom-option-content" for="customRadioTemp2">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp2" />
                  <span class="custom-option-header">
                    <span class="h6 mb-0">WooCommerce</span>
                    <span class="text-muted">$ 500</span>
                  </span>
                  <span class="custom-option-body">
                    <small>Single Payment</small>
                  </span>
                </label>
              </div>
            </div>
          
            <div class="col-md mb-3">
              <div class="form-check custom-option custom-option-basic">
                <label class="form-check-label custom-option-content" for="customRadioTemp3">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp3" />
                  <span class="custom-option-header">
                    <span class="h6 mb-0">Bool.com</span>
                    <span class="text-muted">$ 150</span>
                  </span>
                  <span class="custom-option-body">
                    <small>Single Payment</small>
                  </span>
                </label>
              </div>
            </div>
            
          </div>
          
    <div class="row">
       
       <div class="col-md mb-md-0 mb-2">
         <div class="form-check custom-option custom-option-basic">
           <label class="form-check-label custom-option-content" for="customRadioTemp4">
             <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp4"  />
             <span class="custom-option-header">
               <span class="h6 mb-0">Amazon</span>
               <span class="text-muted">Active</span>
             </span>
             
           </label>
         </div>
       </div>
     
       <div class="col-md">
         <div class="form-check custom-option custom-option-basic">
           <label class="form-check-label custom-option-content" for="customRadioTemp5">
             <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp5" />
             <span class="custom-option-header">
               <span class="h6 mb-0">Esty.com</span>
               <span class="text-muted">Active</span>
             </span>
             <span class="custom-option-body">
               <small></small>
             </span>
           </label>
         </div>
       </div>
     
       <div class="col-md mb-3">
         <div class="form-check custom-option custom-option-basic">
           <label class="form-check-label custom-option-content" for="customRadioTemp6">
             <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp6" />
             <span class="custom-option-header">
               <span class="h6 mb-0">Kaufland.de</span>
               <span class="text-muted">$ 150</span>
             </span>
             <span class="custom-option-body">
               <small></small>
             </span>
           </label>
         </div>
       </div>
       
     </div>

     <button class="btn btn-primary btn-lg" type="button">Synchronize</button>

    <!-- section end -->
      

  


    </div>
   </div>
 </div>
</div>
 

@endsection
