@extends('layouts/layoutMaster')

@section('title', 'Analytics')

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
<style>
  .space{
    margin:10px;
  }
  </style>
@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}">
</script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@php

$columns = \Schema::getColumnListing('products');
$exclude_columns = ['created_at', 'updated_at',
'deleted_at','user_id','id','is_approved'
];
$columns = array_diff($columns, $exclude_columns);

@endphp
<script>
  var columns=<?php echo json_encode($columns)?>;
const myJSON = JSON.stringify(columns);
var column_options='<option value="">Select</option>';
$.each(columns, function(i, item) {
  column_options+='<option value="'+columns[i]+'">'+columns[i]+'</option>';
});

$('input[type="checkbox"]').click(function() {
   $('input[type="checkbox"]').not(this).prop("checked", false);
});
</script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>
    <script type="text/javascript">
      var workbook_data="";
        function Display() {

          var file_url=$('input[name="file"]:checked').data('file');
          if (!file_url) {
            alert("Please Select File");
            return 0;
          }
          $(" .hide ").hide();

            var xhr = new XMLHttpRequest();
            xhr.open("GET", file_url, true);
            xhr.responseType = "blob";
            xhr.onload = function (e) {
                var file = this.response;
                var reader = new FileReader();
                //For Browsers other than IE.
                if (reader.readAsBinaryString) {
                    reader.onload = function (e) {
                        ProcessExcel(e.target.result);
                    };
                    reader.readAsBinaryString(file);
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
                    reader.readAsArrayBuffer(file);
                }
            };
            xhr.send();
        };
        function ProcessExcel(data) {
            //Read the Excel File data.
            var workbook = XLSX.read(data, {
                type: 'binary'
            });
            workbook_data=workbook;
            //Fetch the name of First Sheet.
            // var firstSheet = workbook.SheetNames[0];

            // //Read all rows from First Sheet into an JSON array.
            // var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
            // console.log(excelRows);
            const firstSheetName = workbook.SheetNames[0];
        const worksheet = workbook.Sheets[firstSheetName];
        const options = { header: 1 };
        const sheetData = XLSX.utils.sheet_to_json(worksheet, options);

        // const header = sheetData.shift();

        // header.forEach(function (name){
        // jQuery(".select1").append("<option>"+name+"</option>");
        // })

          $('button').removeClass('d-none');
          $('div').removeClass('d-none');
        const header = sheetData.shift();
        var i=0,j;
        header_options='<option value="">Select</option>';
        header.forEach(function (name){
          j++;
          header_options+='<option value="'+name+'">'+name+'</option>';
          })
        header.forEach(function (name){

        jQuery("table").append('<tr><td><select required id="" class="select1 form-control" data-allow-clear="true" name="header'+i+'">'+header_options+'</select></td><td><select required id="" class="select1 form-control" data-allow-clear="true" name="db_column'+i+'">'+column_options+'</select></td></tr>');
        i++;

      })

        };


  jQuery(document).on("click",".khalid_upload_btn",function(){

//           var form_data_={'price':$("[name='price']").val(),'type':$("[name='type']").val(),
//     'short_description':$("[name='short_description']").val(),'description':$("[name='description']").val(),
//     'image':$("[name='image']").val(),'low_stock':$("[name='low_stock']").val(),
//     'in_stock':$("[name='in_stock']").val(),'stock':$("[name='stock']").val(),
//     'sku':$("[name='sku']").val(),'name':$("[name='name']").val(),
//     'category':$("[name='category']").val(),'type':$("[name='type']").val(),
//     'manufacturer':$("[name='manufacturer']").val(),'shipping_price':$("[name='shipping_price']").val(),'b2b_shipping':$("[name='b2b_shipping']").val()
//   };
//   var validation_=false;
//   toastr.options = {
//   "closeButton": true,
//   "newestOnTop": false,
//   "progressBar": true,
//   "positionClass": "toast-top-right",
//   "preventDuplicates": false,
//   "onclick": null,
//   "showDuration": "300",
//   "hideDuration": "1000",
//   "timeOut": "5000",
//   "extendedTimeOut": "1000",
//   "showEasing": "swing",
//   "hideEasing": "linear",
//   "showMethod": "fadeIn",
//   "hideMethod": "fadeOut"
// }
//   $.each(form_data_, function(key, value) {
//   if(value==" "){
//     toastr.warning("<span>Please select "+key+" field to upload</span><br>");
//     validation_=true;
//   }

// });
// if (validation_) {
//   return 0;
// }
var form_data_ ={};
  var form_data2 = {};
  $("select.select1").each(function(i,val){
    let sel = $(this).parent().siblings(i);
    if ($(val).val()!=" " && $(sel).children(0).val()!=" " && $(val).val()!=null &&  $(sel).children(0).val()!=null) {
    form_data_[$(this).attr('name')]= $(val).val();
    form_data2[$(val).val()]= $(sel).children(0).val();

    }

  });
  
  console.log(form_data2,"form_data_");
//  return 0;
$("html, body").animate({ scrollTop: "0" });

          workbook= workbook_data;
   workbook.SheetNames.forEach(function(sheetName) {
// Here is your object
var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
var json_object = JSON.stringify(XL_row_object);
        var total   =XL_row_object.length;


send_data(XL_row_object,0,total);

})





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

        result=result.replace("0", "");

        result = JSON.parse(result);

        index += 2;
        if(result.status && result.links.length>0){
            if(rows.length > index){
                 total=total-1;
                var per=index/total* 100;
                    per=parseInt(per);
                 jQuery('#status').html(per+"% File Uploaded");


                send_data1(rows, (index+1),total);

            }
            else{
               //setAlertMessages(result.message, result.status);
               jQuery('#status').html("100% Completed");

            }
        }
        else{
           jQuery('#status').html("some thing wrong in excel file");
        }
    }

})
}



})
    </script>

@endsection

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Admin /</span> Import Products
    <a href="/admin/products" type="button" style="float:right;"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Back">
      <i class="ti ti-arrow-left"></i>
    </a>
  </h4>

<div class="row">
  <!-- Website Analytics -->
  <div class="col-lg-12 mb-4">
   <!-- Basic Bootstrap Table -->
   <a href="/admin/feed/products" class="btn btn-primary btn-next show_exl_header waves-effect waves-light" > <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Import File</span> <i class="ti ti-arrow-right ti-xs"></i></a>
<p id="status" class="status"></p>
<div class="card">

  <!-- <h5 class="card-header"><i class="fa fa-download" aria-hidden="true" style="font-size:24px" ></i> Import Setup</h5> -->
  <div class="table-responsive text-nowrap hide">
    <table class="table ">
      <thead>
        <tr>
          <!-- <th>Import Type</th>
          <th>Bron</th>
          <th>Wijzig</th>
          <th>Status</th> -->
          <th>#</th>
        <th>Imported By</th>
        <!-- <th>Import File</th> -->
        <th>File Type</th>
        <th>Uploaded At</th>
        <th>Action</th>

        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @if($files->count())
        @foreach($files as $file)
        <tr>
          <td>{{$file->id}}</td>
          <td>{{$file->user->first_name}} {{$file->user->last_name}}</td>
          <!-- <td>{{$file->file_url}}</td> -->
          <td>{{$file->file_type}}</td>
          <td>{{$file->created_at}}</td>
          <td><input name="file" type="checkbox" data-file="{{asset('storage/'.$file->file_url)}}"></td>

        </tr>
        @endforeach
        @endif
      </tbody>

    </table>

<input class="space" type="button" id="upload" value="Import" onclick="Display()" />
  </div>
</div>

<!--/ Basic Bootstrap Table -->
  </div>
  <!--/ Website Analytics -->



</div>
<div class="table-responsive text-nowrap d-none">
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

@csrf
<button class="btn btn-primary btn-lg khalid_upload_btn d-none" type="button">save</button>
	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@endsection
