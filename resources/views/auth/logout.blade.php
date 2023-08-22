@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Not Authorized - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection


@section('content')
<!-- Not Authorized -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-1 mx-2">You are logout successfully!</h2>
    <div class="mt-4">
      <img src="{{ asset('assets/img/logout.png') }}" alt="page-misc-not-authorized" width="170" class="img-fluid">
    </div>
    <br><br>
    <a href="{{url('/')}}" class="btn btn-primary mb-4">Back to home</a>
   
  </div>
</div>

<!-- /Not Authorized -->
@endsection
