@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')

@section('vendor-style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">

<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
@endsection




@section('page-script')
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span>Edit Products 
</h4>
<style>
  
</style>
<!-- Scrollable -->
<div class="card">
  <h5 class="card-header">Edit Products</h5>
  <div class="card-datatable text-nowrap">
  <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>P ID</th>
                <th>Img</th>
                <th>Name</th>
                <th>Status</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
             
            </tr>
        </thead>
        @php($i=1)
        <tbody>
            <tr>
                <td>{{$i++}}</td>
               
              <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
               
              <td>Name</td>
               
              <td>
                  <select id="select2Basic1" class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="AK">Active</option>
                    <option value="HI">Trash</option>
                    <option value="CA">Draft</option>
                    <option value="NV">Update</option>
                  
                  </select>
              </td>
           
              <td>
                  <select id="select2Multiple" class="select2 form-select" multiple>
                    <optgroup label="category">
                      <option value="AK" selected>Cat 1</option>
                      <option value="HI">Cat 2</option>
                    </optgroup>
                    </select>
              </td>
              <td>  <input type="text" class="form-control" id="defaultFormControlInput" placeholder="$999" aria-describedby="defaultFormControlHelp" /></td>
              <td>    <button type="button" class="btn btn-warning">Edit</button></td>
           
        </tr>
         
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

<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>

<script>
  new DataTable('#example');
  
</script>

@endsection


@endsection
