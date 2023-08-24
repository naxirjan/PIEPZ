<?php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
?>



<?php $__env->startSection('title', 'Multi Steps Sign-up - Pages'); ?>

<?php $__env->startSection('vendor-style'); ?>
<!-- Vendor -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
<!-- Page -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-auth.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

<script src="<?php echo e(asset('assets/js/pages-auth-imports.js')); ?>"></script>
<script>
var total=0;
function Upload() {
        //Reference the FileUpload element.
        var fileUpload = document.getElementById("fileUpload");


        //Validate whether File is valid Excel file.
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx|.csv)$/;
        // if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();

                //For Browsers other than IE.
                if (reader.readAsBinaryString) {
                    reader.onload = function (e) {
                        ProcessExcel(e.target.result);
                    };
                    reader.readAsBinaryString(fileUpload.files[0]);
                } else {
                    //For IE Browser.
                    reader.onload = function (e) {
                        var data = "";
                        var bytes = new Uint8Array(e.target.result);
                        for (var i = 0; i < bytes.byteLength; i++) {
                            data += String.fromCharCode(bytes[i]);
                        }
                        ProcessExcel(data);
                    };
                    reader.readAsArrayBuffer(fileUpload.files[0]);
                }
            } else {
                alert("This browser does not support HTML5.");
            }

    };
    function ProcessExcel(data) {
        //Read the Excel File data.
        var workbook = XLSX.read(data, {
            type: 'binary'
        });
        const firstSheetName = workbook.SheetNames[0];
        const worksheet = workbook.Sheets[firstSheetName];
        const options = { header: 1 };
        const sheetData = XLSX.utils.sheet_to_json(worksheet, options);

        const header = sheetData.shift();
        console.log(header,"header");
        header.forEach(function (name){
        jQuery(".select1").append("<option>"+name+"</option>");
        })

    };


jQuery(document).on("click",".khalid_upload_btn",function(){


  var form_data_={'price':$("[name='price']").val(),'type':$("[name='type']").val(),
    'short_description':$("[name='short_description']").val(),'description':$("[name='description']").val(),
    'image':$("[name='image']").val(),'low_stock':$("[name='low_stock']").val(),
    'in_stock':$("[name='in_stock']").val(),'stock':$("[name='stock']").val(),
    'sku':$("[name='sku']").val(),'name':$("[name='name']").val(),
    'category':$("[name='category']").val(),'type':$("[name='type']").val(),
  };
  // $(".select1").each(function(i,val){
  //   if ($(val).val()='') {
  //     alert();
  //   }
  // })
var user_data={
  'companyName':$("[name='companyName']").val(),
  'websiteLink':$("[name='websiteLink']").val(),
  'firstName':$("[name='firstName']").val(),
  'lastName':$("[name='lastName']").val(),
  'address':$("[name='address']").val(),
  'phone':$("[name='phone']").val(),
  'country':$("[name='country']").val(),
  'email':$("[name='email']").val(),
  'password':$("[name='password']").val(),
  'cocnumber':$("[name='cocnumber']").val(),
  'taxnumber':$("[name='taxnumber']").val(),
};
  let file = jQuery('.excel_upload_file')[0].files[0];

        if (typeof file=='undefined') {
          jQuery.ajax({
  url:"productsImport",
  type:"post",
  datatype:"json",
  headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
   data: {
          action:'khalid_fetch_scraping_data',
          //  "_token": "<?php echo e(csrf_token()); ?>",
           form_data:form_data_,
           user_data:user_data
       },

        error: function(err){
          console.log(err);
      },
      success:function(result){
          console.log(result);
          // result=result.replace("0", "");
          result = JSON.parse(result);
         window.location.href = "vendor-confirmation?id=" + result.id;


      }

})
          return false;
        }
        else{
          jQuery(".upload_message").text('');

        }

var reader = new FileReader();

reader.onload = function(e) {
var data = e.target.result;
var workbook = XLSX.read(data, {
  type: 'binary'
});



workbook.SheetNames.forEach(function(sheetName) {
  // Here is your object
  var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
  var json_object = JSON.stringify(XL_row_object);
           total   =XL_row_object.length;

  send_data(XL_row_object,0,total);

})

};

reader.onerror = function(ex) {
console.log(ex);
};

reader.readAsBinaryString(file);

function send_data1(rows,index,total){
send_data(rows,index,total);
}
function send_data(rows,index,total)
{
let  send_rows = [];
  for(i = index; i <= index+2; i++){
      send_rows.push(rows[i]);
  }
jQuery.ajax({
  url:"productsImport",
  type:"post",
  datatype:"json",
  headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
   data: {
          action:'khalid_fetch_scraping_data',
           rows:send_rows,
          //  "_token": "<?php echo e(csrf_token()); ?>",
           form_data:form_data_,
           user_data:user_data
       },

        error: function(err){
          console.log(err);
      },
      success:function(result){
          console.log(result);
          result=result.replace("0", "");
          //console.log(result);
          result = JSON.parse(result);
          console.log(result);
          //console.log(index);

          index += 2;
          if(result.status && result.links.length>0){
              if(rows.length > index){
                   total=total-1;
                  var per=index/total* 100;
                      per=parseInt(per);
                   jQuery('#status').html(per+"% File Uploaded");

                  send_data1(rows, (index+1),total);
                  //console.log(result.message);
                  //console.log("if");
              }
              else{
                 //setAlertMessages(result.message, result.status);
                 jQuery('#status').html("100% Completed");
                 window.location.href = "vendor-confirmation?id=" + result.id;

              }
          }
          else{
             jQuery('#status').html("some thing wrong in excel file");
          }
      }

})
}
//without excel


})
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="authentication-wrapper authentication-cover authentication-bg">
  <div class="authentication-inner row">


    <!--  Multi Steps Registration -->
    <div class="d-flex col-lg-12 align-items-center justify-content-center p-sm-5 p-3">
      <div class="w-px-700">
        <div id="multiStepsValidation" class="bs-stepper shadow-none">
          <div class="bs-stepper-header border-bottom-0">
            <div class="step" data-target="#accountDetailsValidation">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-circle"><i class="ti ti-smart-home ti-sm"></i></span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Account Information</span>
                  <span class="bs-stepper-subtitle">Account Details</span>
                </span>
              </button>
            </div>
            <div class="line">
              <i class="ti ti-chevron-right"></i>
            </div>
            <div class="step" data-target="#personalInfoValidation">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-circle"><i class="ti ti-users ti-sm"></i></span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Products Imports</span>
                  <span class="bs-stepper-subtitle">Enter Information</span>
                </span>
              </button>
            </div>
            <div class="line">
              <i class="ti ti-chevron-right"></i>
            </div>
            <div class="step" data-target="#billingLinksValidation">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-circle"><i class="ti ti-file-text ti-sm"></i></span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Products Fields Setup</span>
                  <span class="bs-stepper-subtitle">Payment Details</span>
                </span>
              </button>
            </div>
          </div>
          <div class="bs-stepper-content">
            <form id="multiStepsForm" onSubmit="return false">
              <!-- Account Details -->
              <div id="accountDetailsValidation" class="content">
                <div class="content-header mb-4">
                  <h3 class="mb-1">Account Information</h3>
                  <p>Enter Your Account Details</p>
                </div>
                <div class="row g-3">
                <div class="col-sm-6">
                    <label class="form-label" for="companyName">Company Name</label>
                    <input type="text" name="companyName" id="companyName" class="form-control" placeholder="Piepz" aria-label="johndoe" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsURL">Website Link</label>
                    <input type="text" name="websiteLink" id="websiteLink" class="form-control" placeholder="https://piepz.com" aria-label="johndoe" />
                  </div>

                  <div class="content-header mb-1">
                    <p>Enter Your Account Details</p>
                  </div>

                  <div class="col-sm-6">
                    <label class="form-label" for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="john" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="doe" />
                  </div>

                  <div class="col-md-12">
                    <label class="form-label" for="address">Street/Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="address" aria-label="address" />
                  </div>
                  <div class="col-sm-6">
                              <label class="form-label" for="zip">Zip Code</label>
                              <input type="text" name="zip" id="zip" class="form-control" />
                           </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="+123 456" aria-label="12345" />
                  </div>
                  <div class="col-md-12">
                    <label class="form-label" for="country">Country</label>
                    <input type="text" name="country" id="country" class="form-control" placeholder="country" aria-label="country" />
                  </div>

                  <div class="content-header mb-1">
                    <p>Enter Your Account Login Details</p>
                  </div>

                  <div class="col-sm-6">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="john@gmail.com" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="*" aria-label="*" />
                  </div>


                  <div class="col-sm-6">
                    <label class="form-label" for="cocnumber">C.O.C Number</label>
                    <input type="text" name="cocnumber" id="cocnumber" class="form-control" placeholder="9545" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="taxnumber">Tax Number</label>
                    <input type="text" name="taxnumber" id="taxnumber" class="form-control" placeholder="1234" aria-label="1234" />
                  </div>





                  <div class="col-12 d-flex justify-content-between mt-4">
                    <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                      <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                  </div>
                </div>
              </div>
              <!-- Personal Info -->


              <div id="personalInfoValidation" class="content">
                <div class="content-header mb-4">
                    <div class="d-flex justify-content-between mb-3">
                       <h3 class="mb-1">Personal Information</h3>
                       <button class="btn btn-primary"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Help - Support</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                    <div class="d-flex">
                      <button class="btn btn-primary btn-next khalid_upload_btn"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Skip Now</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                    </div>
                  </div>
                </div>


                <div class="row g-3">
                <div  class="col-sm-4">
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
                <div  class="col-sm-4">
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
                <div  class="col-sm-4">
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
                <div  class="col-sm-4">
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
                <div  class="col-sm-4">
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
                <div  class="col-sm-4">
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

                  <div>
                    <label for="defaultFormControlInput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="" aria-describedby="defaultFormControlHelp" />
                  </div>
                  <div>
                    <label for="defaultFormControlInput" class="form-label">Website URL</label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="www.google.com" aria-describedby="defaultFormControlHelp" />
                  </div>
                  <div class="divider my-4 mb-3">
                      <div class="divider-text">or</div>
                    </div>
                    <div class="my-4 mb-3">
                    <input class="form-control excel_upload_file" type="file" id="fileUpload" >
                  </div>

                  <div class="col-12 d-flex justify-content-between mt-4">
                    <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                      <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button class="btn btn-primary btn-next show_exl_header" id="upload" value="Upload" onclick="return Upload()"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                  </div>
                </div>
              </div>
              <!-- Billing Links -->
              <div id="billingLinksValidation" class="content">
                <div class="content-header">
                  <h3 class="mb-1">Select Plan</h3>
                  <p>Select plan as per your requirement</p>
                  <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex">
                    <button class="btn btn-primary"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Help - Support</span> <i class="ti ti-arrow-right ti-xs"></i></button>

                  </div>
                  </div>
                       <div class="progress">
        <div id="status" class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
                </div>

                <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Import Field</th>
                      <th>Project</th>


                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">

                  <tr>
                      <td>Product Name</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="name">
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product SKU</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="sku">
                        </select>
                      </td>
                    </tr>

                    <tr>
                      <td>Product  Stock</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="stock">
                        </select>
                      </td>

                    </tr>
                    <tr>
                      <td>Product In Stock</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="in_stock">
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product Low Stock</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="low_stock">
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product Image</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="image">
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product  Price</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="price">
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product Description</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="description">
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product  Short Description</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="short_description">
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product  Type</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="type">
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Category</td>
                      <td>
                        <select id="" class="select1 form-control" data-allow-clear="true" name="category">
                        </select>
                      </td>
                    </tr>

                  </tbody>
                </table>

            </div>
                <div class="col-12 d-flex justify-content-between mt-4">
                    <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                      <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button type="button" class="btn btn-success btn-next btn-submit khalid_upload_btn">Submit</button>
                  </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- / Multi Steps Registration -->
  </div>
</div>

<script>
  // Check selected custom option
  window.Helpers.initCustomOptionCheck();

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\piep-frontend\resources\views/auth/vendor/products-import.blade.php ENDPATH**/ ?>