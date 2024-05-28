

@extends('layouts/layoutMaster')

@section('title', 'Functionality - Package')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Package /</span> Functionality</h4>
<!--  add addon alert -->
@if (\Session::has('added'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('added') !!}</li>
        </ul>
    </div>
@endif
<!-- end add addon alert -->
<!-- add addon code -->
<div class="row">
  <!-- Default switches -->

  <div class="col-xl-12">
  <div class="card mb-4">
  <h5 class="card-header">Edit Functionality</h5>
       <div class="card-body">
        <form method="POST" action="{{ route('update-fnc') }}">
          @csrf
          <input type="hidden" name="id" class="form-control" value="{{$data->id}}" />

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="title">Title</label>
            <div class="col-sm-10">
              <input type="text" name="title" class="form-control" value="{{$data->title}}" id="title"  />
              @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="addon-price">Price</label>
            <div class="col-sm-10">
              <input type="number" name="price" class="form-control" value="{{$data->price}}" id="price" />
              @error('price')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>


          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Update Functionality</button>
            </div>
          </div>
        </form>
       </div>
      </div>
  </div>
</div>
<!-- end add addon -->

@endsection
