@extends('layouts/layoutMaster')

@section('title', 'Support - Tickets')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Support /</span> Tickets</h4>



<div class="row">
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="ti ti-currency-dollar ti-md"></i></div>
        <h5 class="card-title mb-1 pt-2">Phone</h5>

        <div class="pt-1">
          <span class="badge bg-label-secondary">Call</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="ti ti-currency-dollar ti-md"></i></div>
        <h5 class="card-title mb-1 pt-2">Live Chat</h5>

        <div class="pt-1">
          <span class="badge bg-label-secondary">Chat</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="ti ti-currency-dollar ti-md"></i></div>
        <h5 class="card-title mb-1 pt-2">Mail</h5>

        <div class="pt-1">
          <span class="badge bg-label-secondary">Mail</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Pills -->
<div class="row">


  <div class="col-xl-12">
    <h6 class="text-muted">Customers  Questions</h6>
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
