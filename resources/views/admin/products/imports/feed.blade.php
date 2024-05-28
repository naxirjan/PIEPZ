@extends('layouts/layoutMaster')

@section('title', 'Import Products')



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
  <span class="text-muted fw-light">Admin /</span> Select File
  <a href="/admin/products" type="button" style="float:right;"
     class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
     data-bs-placement="left" data-bs-original-title="Back">
    <i class="ti ti-arrow-left"></i>
  </a>
</h4>

<div class="row">
  <!-- Custom Icon Radios -->
  <div class="col-xl-12 mb-4">
    <div class="card" >
      <h5 class="card-header">Import Products</h5>
      <div class="card-body">
        <form action="#" method="post" enctype="multipart/form-data" id="form">


        <input class="form-control excel_upload_file" type="file" id="fileUpload" name="file">
        <hr class="my-1">
        <button type="button" class="btn btn-primary btn-next show_exl_header" id="upload" value="Upload" onclick="return Upload()"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Choose Fields</span> <i class="ti ti-arrow-right ti-xs"></i></button>

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

                  <!-- <tr>
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
                    <tr>
                      <td>Manufacturer</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="manufacturer">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Shipping Price</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="shipping_price">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>B2B Shipping</td>
                      <td>
                        <select required id="" class="select1 form-control" data-allow-clear="true" name="b2b_shipping">
                      <option value=" ">Select</option>
                      </select>
                      </td>
                    </tr> -->
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

@php

$columns = \Schema::getColumnListing('products');
$exclude_columns = ['created_at', 'updated_at',
'deleted_at','user_id','id','is_approved'
];
$columns = array_diff($columns, $exclude_columns);

@endphp
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

<!-- Libs Toaster -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/toastr.min.css')}}">
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<!-- Libs Toaster -->



<script>
var columns=<?php echo json_encode($columns)?>;
const myJSON = JSON.stringify(columns);
var column_options='<option value=" ">Select</option>';
$.each(columns, function(i, item) {
  column_options+='<option value="'+columns[i]+'">'+columns[i]+'</option>';
});

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
        var i=0,j;
        header_options='<option value=" ">Select</option>';
        header.forEach(function (name){
          j++;
          header_options+='<option value="'+name+'">'+name+'</option>';
          })
        header.forEach(function (name){

        jQuery("table").append('<tr><td><select required id="" class="select1 form-control '+i+'" data-allow-clear="true" name="header'+i+'">'+header_options+'</select></td><td><select required id="" class="select1 form-control '+i+'" data-allow-clear="true" name="db_column'+i+'">'+column_options+'</select></td></tr>');
        i++;

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
  var form_data_ ={};
  var form_data2 = {};
  $("select.select1").each(function(i,val){
    let sel = $(this).parent().siblings(i);
    if ($(val).val()!=" " && $(sel).children(0).val()!=" "  ) {
    form_data_[$(this).attr('name')]= $(val).val();
    form_data2[$(val).val()]= $(sel).children(0).val();

    }

  });

  // var form_data_={'price':$("[name='price']").val(),'type':$("[name='type']").val(),
  //   'short_description':$("[name='short_description']").val(),'description':$("[name='description']").val(),
  //   'image':$("[name='image']").val(),'low_stock':$("[name='low_stock']").val(),
  //   'in_stock':$("[name='in_stock']").val(),'stock':$("[name='stock']").val(),
  //   'sku':$("[name='sku']").val(),'name':$("[name='name']").val(),
  //   'category':$("[name='category']").val(),'type':$("[name='type']").val(),
  //   'manufacturer':$("[name='manufacturer']").val(),'shipping_price':$("[name='shipping_price']").val(),'b2b_shipping':$("[name='b2b_shipping']").val()

  // };
  // var validation_=false;

//   $.each(form_data_, function(key, value) {
//   if(value==" "){
//     toastr.warning("<span>Please select "+key+" field to upload</span><br>");
//     validation_=true;
//   }

// });
// if (validation_) {
//   return 0;
// }

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
          form_data:form_data2,
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

