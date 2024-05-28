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
    <div class="card" >
      <h5 class="card-header">Import Products</h5>
      <div class="card-body">
        <form action="#" method="post" enctype="multipart/form-data" id="form">
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

        <div class="separator">
            <div class="line"></div>
            <h6>OR</h6>
            <div class="line"></div>
        </div>
        <input class="form-control excel_upload_file" type="file" id="fileUpload" name="file">
        <br>
        <button type="button" class="btn btn-primary btn-next show_exl_header" id="upload" value="Upload" onclick="return Upload()"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
  
        <p id="status"></p>
        <div class="table-responsive text-nowrap d-none" >
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
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="name">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product SKU</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="sku">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>

                    <tr>
                      <td>Product  Stock</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="stock">
                      <option value=" ">Select</option>
                      </select>
                      </td>

                    </tr>
                    <tr>
                      <td>Product In Stock</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="in_stock">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product Low Stock</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="low_stock">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product Image</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="image">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product  Price</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="price">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product Description</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="description">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product  Short Description</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="short_description">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Product  Type</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="type">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Category</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="category">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>

                  </tbody>
                </table>

            </div>
        <button class="btn btn-primary btn-lg khalid_upload_btn d-none" type="button">save</button>
          </form>
      </div>
      
    </div>
  </div>
  <!-- /Custom Icon Radios -->
</div>
 

@endsection
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-advance.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}">
</script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

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

        header.forEach(function (name){
        jQuery(".select1").append("<option>"+name+"</option>");
        })
        var form_data = new FormData(document.getElementById("form"));

// var data = new FormData($(this));
  jQuery.each(jQuery('#fileUpload')[0].files, function(i, file) {
    form_data.append('file', file);
});

$.ajax({
  type: "POST",
  url: "{{route('uploadFile')}}",
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
  data: form_data,
  dataType: "json",
  encode: true,
  cache: false,
contentType: false,
processData: false,
}).done(function (data) {
  $('button').removeClass('d-none');
  $('div').removeClass('d-none');


  console.log(data);
});
    };


jQuery(document).on("click",".khalid_upload_btn",function(){



  var form_data_={'price':$("[name='price']").val(),'type':$("[name='type']").val(),
    'short_description':$("[name='short_description']").val(),'description':$("[name='description']").val(),
    'image':$("[name='image']").val(),'low_stock':$("[name='low_stock']").val(),
    'in_stock':$("[name='in_stock']").val(),'stock':$("[name='stock']").val(),
    'sku':$("[name='sku']").val(),'name':$("[name='name']").val(),
    'category':$("[name='category']").val(),'type':$("[name='type']").val(),
  };
  var validation_=false;
  toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
  $.each(form_data_, function(key, value) {
  if(value==" "){
    toastr.warning("<span>Please select "+key+" field to upload</span><br>");
    validation_=true;
  }

});
if (validation_) {
  return 0;
}

  let file = jQuery('.excel_upload_file')[0].files[0];
       

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
  url:"{{route('general.import')}}",
  type:"post",
  datatype:"json",
  
  headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
   data: {
          action:'khalid_fetch_scraping_data',
          form_data:form_data_,
           rows:send_rows
       },

        error: function(err){
          console.log(err);
      },
      success:function(result){


          result = JSON.parse(result);

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
                 window.location.href = "products";

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
@endsection

