@extends('layouts/layoutMaster')

@section('title', 'Support - Tickets')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Support /</span> Tickets</h4>



<div class="row">
 

  <div class="col-xl-12">
    <h6 class="text-muted">B2B Partners Question</h6>
    <div class="nav-align-left mb-4">
      <ul class="nav nav-pills me-3" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-home" aria-controls="navs-pills-left-home" aria-selected="true">New Tickets</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-profile" aria-controls="navs-pills-left-profile" aria-selected="false">Open Tickets</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-messages" aria-controls="navs-pills-left-messages" aria-selected="false">Close Tickets</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-left-home" role="tabpanel">
    <table class="table">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Customer Name</th>
          <th>Question</th>
          <th>Status</th>
         
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td><strong>John Doe</strong></td>
          <td>Barry Hunter</td>
          <td>
          Lorem ipsum is a placeholder text commonly used to demonstrat
          </td>
          <td><span class="badge bg-label-warning me-1">Completed</span></td>
        
        </tr>
      </tbody>
    </table>
        </div>
        <div class="tab-pane fade" id="navs-pills-left-profile" role="tabpanel">
        <table class="table">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Customer Name</th>
          <th>Question</th>
          <th>Status</th>
         
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td><strong>John Doe</strong></td>
          <td>Barry Hunter</td>
          <td>
          Lorem ipsum is a placeholder text commonly used to demonstrat
          </td>
          <td><span class="badge bg-label-warning me-1">Completed</span></td>
        
        </tr>
      </tbody>
    </table>
        </div>
        <div class="tab-pane fade" id="navs-pills-left-messages" role="tabpanel">
        <table class="table">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Customer Name</th>
          <th>Question</th>
          <th>Status</th>
         
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td><strong>John Doe</strong></td>
          <td>Barry Hunter</td>
          <td>
          Lorem ipsum is a placeholder text commonly used to demonstrat
          </td>
          <td><span class="badge bg-label-warning me-1">Completed</span></td>
        
        </tr>
      </tbody>
    </table>
        </div>
      </div>
    </div>
  </div>
 
</div>
<!-- Pills -->
<div class="row">
 

  <div class="col-xl-12">
    <h6 class="text-muted">Vendors  Question</h6>
    <div class="nav-align-left mb-4">
      <ul class="nav nav-pills me-3" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-home1" aria-controls="navs-pills-left-home1" aria-selected="true">New Tickets</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-profile1" aria-controls="navs-pills-left-profile1" aria-selected="false">Open Tickets</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-messages1" aria-controls="navs-pills-left-messages1" aria-selected="false">Close Tickets</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-left-home1" role="tabpanel">
    <table class="table">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Customer Name</th>
          <th>Question</th>
          <th>Status</th>
         
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td><strong>John Doe</strong></td>
          <td>Barry Hunter</td>
          <td>
          Lorem ipsum is a placeholder text commonly used to demonstrat
          </td>
          <td><span class="badge bg-label-warning me-1">Completed</span></td>
        
        </tr>
      </tbody>
    </table>
        </div>
        <div class="tab-pane fade" id="navs-pills-left-profile1" role="tabpanel">
        <table class="table">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Customer Name</th>
          <th>Question</th>
          <th>Status</th>
         
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td><strong>John Doe</strong></td>
          <td>Barry Hunter</td>
          <td>
          Lorem ipsum is a placeholder text commonly used to demonstrat
          </td>
          <td><span class="badge bg-label-warning me-1">Completed</span></td>
        
        </tr>
      </tbody>
    </table>
        </div>
        <div class="tab-pane fade" id="navs-pills-left-messages1" role="tabpanel">
        <table class="table">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Customer Name</th>
          <th>Question</th>
          <th>Status</th>
         
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td><strong>John Doe</strong></td>
          <td>Barry Hunter</td>
          <td>
          Lorem ipsum is a placeholder text commonly used to demonstrat
          </td>
          <td><span class="badge bg-label-warning me-1">Completed</span></td>
        
        </tr>
      </tbody>
    </table>
        </div>
      </div>
    </div>
  </div>
 
</div>
<!-- Pills -->

@endsection
