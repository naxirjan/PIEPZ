@extends('layouts/layoutMaster')
@section('title', 'DataTables - Tables')
@section('vendor-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
@endsection
@section('content')
<h4 class="fw-bold py-3 mb-4">
   <span class="text-muted fw-light">Partner /</span> Orders
</h4>
<!-- Scrollable -->
<div class="card" style="padding:20px;">
   <h5 class="card-header">Recieved Orders</h5>
   <div class="table-responsive text-nowrap">
      <table id="example" class="table" >
         <thead>
            <tr>
               <th>#</th>
               <th>Status</th>
               <th>Funnel</th>
               <th>Order Number</th>
               <th>Quantity</th>
               <th>Customer</th>
               <th>Order Total</th>
               <th>Tracking Code</th>
               <th>Date</th>
               <th>Action</th>
            </tr>
         </thead>
         @php 
         use Illuminate\Support\Str;
         $randomString1 = Str::random(10);
         $randomString2 = Str::random(5);
         $randomString3 = Str::random(8);
         $randomString4 = Str::random(4);
         $randomString5 = Str::random(6);
         $string1 =uniqid();
         @endphp
         <tbody>
            @for($i=0; $i<=2; $i++)
            <tr>
               <td>{{$i}}</td>
               <td>  <span class="badge bg-success">Open</span></td>
               <td>website {{$i}}</td>
               <td>{{$randomString5}}</td>
               <td>199</td>
               <td>{{$randomString3}}</td>
               <td>{{$randomString2}}</td>
               <td>{{ $string1}}</td>
               <td>12/4/2023</td>
               <td><a href="#"><span class="badge bg-warning">View</span></a></td>
            </tr>
            @endfor
         </tbody>
      </table>
   </div>
</div>
<!--/ Scrollable -->
<hr class="my-5">
@section('vendor-script')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
   new DataTable('#example');
</script>
@endsection
@endsection