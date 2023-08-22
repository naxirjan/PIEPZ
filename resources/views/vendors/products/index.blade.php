@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')

@section('vendor-style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">

@endsection


@section('content')


<!-- Scrollable -->
<div class="card">
  <h5 class="card-header">Products</h5>
  <div class="card-datatable text-nowrap">
  <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>P ID</th>
                <th>Img</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        @php($i=1)
        <tbody>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
            <tr>
                <td>{{$i++}}</td>
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
                <td>P Name</td>
                <td>399</td>
                <td>400</td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
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
<script>
  new DataTable('#example');
</script>

@endsection


@endsection
