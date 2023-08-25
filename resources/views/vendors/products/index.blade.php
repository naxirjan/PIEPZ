@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')

@section('vendor-style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">

@endsection


@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Products
</h4>

<!-- Scrollable -->
<div class="card">

  <h5 class="card-header">Products</h5>
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
  <div class="card-datatable text-nowrap md-16">
  <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Img</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @if(count($products))
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger"><img src="{{asset('storage/'.$product->image)}}" alt=""></span></div></div></td>
                    <td><a href="{{route('vendor.edit.product',['id'=>$product->id])}}" class="text-body">{{$product->name}}</a></td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td><div class="d-flex align-items-center"><a href="{{route('vendor.edit.product',['id'=>$product->id])}}" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="{{route('vendor.delete.product',['id'=>$product->id])}}" class="text-body delete-record " id="confirm-color"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="{{route('vendor.product.view',['id'=>$product->id])}}" class="dropdown-item">View P</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
                </tr>
                @endforeach
            @endif
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
