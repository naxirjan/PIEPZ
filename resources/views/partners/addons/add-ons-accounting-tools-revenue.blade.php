@extends('layouts/layoutMaster')

@section('title', 'Revenue - Page')

@section('content')



<!-- Contextual Classes -->

<div class="card">
  <h5 class="card-header">Revenue Page</h5>
 <div class="row">
    <div class="col-sm-10">

    </div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-warning">Add 
        <i class="fa-solid fa-plus"></i> 
        </button>
    </div>
 </div>

  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Revenue</th>
          <th>Amount(excluding Vat)</th>
          <th>Vat</th>
          <th>Vat(%)</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr class="table-default">
          <td>Webshop Number</td>
          <td>$2992</td>
          <td>$2992</td>
          <td>$2992</td>
          <td>$2992</td>
         
        </tr>
      
        <tr class="table-primary">
            <td>Webshop Number</td>
            <td>$2992</td>
            <td>$2992</td>
            <td>$2992</td>
            <td>$2992</td>
        </tr>
        <tr class="table-secondary">
            <td>Webshop Number</td>
            <td>$2992</td>
            <td>$2992</td>
            <td>$2992</td>
            <td>$2992</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!--/ Contextual Classes -->



@endsection
