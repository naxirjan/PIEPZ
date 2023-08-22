@extends('layouts/layoutMaster')

@section('title', 'Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-tagify.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection




@section('content')


   <!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header"><i class="fa-solid fa-forward" aria-hidden="true" style="font-size:24px"></i> Change Mapping</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Import Field</th>
          <th>Project</th>
          <th>Select</th>
         
        
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">

      @for ($i = 0; $i <= 5; $i++)
      <tr>
          <td>Product Name</td>
          <td>
          
            <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
              <option>Field 1</option>
              <option>Field 2</option>
              <option>Field 3</option>
            </select>
          </td>
          <td><input class="form-check-input" type="checkbox" value="" id="defaultCheck1" /></td>
        </tr>

    @endfor
       
     
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->
 

@endsection
