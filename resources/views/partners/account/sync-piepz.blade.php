@extends('layouts/layoutMaster')
<style>
  .avatar-sm {
    width: 3rem !important;
    height: 3rem !important;
}
</style>

@section('title', 'Sync')



@section('content')

<!-- ROW1 -->
<h5 class="mb-0">CSV/XML RATE</h5> <small class="text-muted float-end"></small>
<div class="row">
 <div class="col-xl-6 mb-4">
  <div class="card">
   <div class="card-body">
    <!-- section start-->
    <div class="col-md mb-md-0 mb-2">
    <td class="mb-2">
      <div class="d-flex justify-content-start align-items-center">
        <div class="avatar-wrapper">
          <div class="avatar avatar-sm me-2">
            <span class="avatar-initial"><img src="{{asset('assets/icons/1950399.avif')}}" alt=""></span></div></div>
            <div class="d-flex flex-column"><a href="#" class="text-body text-truncate"><span class="fw-semibold">14/12/23</span></a><small class="text-truncate text-muted">Products XML</small></div></div>
    </td>
    <br>
    <td class="mb-4">
      <div class="d-flex justify-content-start align-items-center">
        <div class="avatar-wrapper">
          <div class="avatar avatar-sm me-2">
            <span class="avatar-initial"><img src="{{asset('assets/icons/1552247.avif')}}" alt=""></span></div></div>
            <div class="d-flex flex-column"><a href="#" class="text-body text-truncate"><span class="fw-semibold">14/12/23</span></a><small class="text-truncate text-muted">Generals Products XML</small></div></div>
    </td>
    </div>
    <!-- section end -->
    </div>
   </div>
 </div>
</div>

<!-- ROW2 -->
<h5 class="mb-0">Prestashop Synchronization</h5> <small class="text-muted float-end"></small>
<div class="row">
 <div class="col-xl-6 mb-4">
  <div class="card">
   <div class="card-body">
    <!-- section start-->
    <div class="col-md mb-md-0 mb-2">
    <td class="mb-4">
      <div class="d-flex justify-content-start align-items-center">
        <div class="avatar-wrapper">
          <div class="avatar avatar-sm me-2">
            <span class="avatar-initial"><img src="{{asset('assets/icons/1552247.avif')}}" alt=""></span></div></div>
            <div class="d-flex flex-column"><a href="#" class="text-body text-truncate"><span class="fw-semibold">14/22/23</span></a><small class="text-truncate text-muted">Products XML</small></div></div>
    </td>
    </div>
    <!-- section end -->
    </div>
   </div>
 </div>
</div>

<!-- ROW3 -->
<h5 class="mb-0">Shipping Costs CSV</h5> <small class="text-muted float-end"></small>
<div class="row">
 <div class="col-xl-6 mb-4">
  <div class="card">
   <div class="card-body">
    <!-- section start-->
    <div class="col-md mb-md-0 mb-2">
    <td class="mb-4">
      <div class="d-flex justify-content-start align-items-center">
        <div class="avatar-wrapper">
          <div class="avatar avatar-sm me-2">
            <span class="avatar-initial"><img src="{{asset('assets/icons/1116175.avif')}}" alt=""></span></div></div>
            <div class="d-flex flex-column"><a href="#" class="text-body text-truncate"><span class="fw-semibold">14/12/23</span></a><small class="text-truncate text-muted">Manual General Shipping Costs</small></div></div>
    </td>
    <br>
    <td class="mb-4">
      <div class="d-flex justify-content-start align-items-center">
        <div class="avatar-wrapper">
          <div class="avatar avatar-sm me-2">
            <span class="avatar-initial"><img src="{{asset('assets/icons/1552247.avif')}}" alt=""></span></div></div>
            <div class="d-flex flex-column"><a href="#" class="text-body text-truncate"><span class="fw-semibold">14/12/23</span></a><small class="text-truncate text-muted">General Shipping Costs</small></div></div>
    </td>
    </div>
    <!-- section end -->
    </div>
   </div>
 </div>
</div> 

@endsection
