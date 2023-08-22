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

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}">
</script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
<script>
  jQuery(document).on("click",".khalid_upload_btn",function(){
  
  let file = jQuery('.excel_upload_file')[0].files[0];

        if (typeof file=='undefined') {
          jQuery(".upload_message").text('Please Select Excel File...!');
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
console.log(file);

workbook.SheetNames.forEach(function(sheetName) {
  // Here is your object
  var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
  var json_object = JSON.stringify(XL_row_object);
          var total   =XL_row_object.length;


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
  url:"products",
  type:"post",
  datatype:"json",
   data: {
          action:'khalid_fetch_scraping_data',
           rows:send_rows,
           "_token": "{{ csrf_token() }}",
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
                 //console.log("else");
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

<div class="row">
  <!-- Website Analytics -->
  <div class="col-lg-12 mb-4">
   <!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header"><i class="fa fa-download" aria-hidden="true" style="font-size:24px"></i> Import Setup</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Import Type</th>
          <th>Bron</th>
          <th>Wijzig</th>
          <th>Status</th>
        
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td><img src="https://www.gstatic.com/images/branding/product/1x/hh_sheets_64dp.png" alt="" srcset=""> <strong>Google Sheet</strong></td>
          <td>Product Database</td>
          <td>
          <i class="fa fa-download" aria-hidden="true"></i>
          <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-secondary waves-effect">Instellen</button>
                <button type="button" class="btn btn-outline-secondary waves-effect">Wijzig Mapping</button>
                <button type="button" class="btn btn-outline-secondary waves-effect">Veilighed</button>
              </div>
          </td>
          <td>
          <button type="button" class="btn btn-primary waves-effect waves-light">uitovoeren</button><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></td>
          
        </tr>
     
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->
  </div>
  <!--/ Website Analytics -->



</div>
 <form action="{{route('admin.import.products')}}" method="POST" enctype="multipart/form-data">
<input type="file" name="file" class="excel_upload_file">
@csrf
<button type="button" class="khalid_upload_btn">IMport</button>
 </form>
@endsection
