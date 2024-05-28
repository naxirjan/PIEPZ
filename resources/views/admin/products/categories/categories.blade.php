@extends('layouts/layoutMaster')

@section('title', 'Categories')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
  <style>
    #gridCategories th{
      text-transform: none;
    }
  </style>
@endsection

@section('vendor-script')
  <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>

  <!-- bootGrid Libs - Start -->
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/bootGrid/dist/jquery.bootgrid.css')}}">
  <script src="{{asset('assets/bootGrid/js/moderniz.2.8.1.js')}}"></script>
  <!-- bootGrid Libs - Start -->
@endsection

@section('page-script')
  <script src="{{asset('assets/bootGrid/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/bootGrid/dist/jquery.bootgrid.js')}}"></script>
  <script src="{{asset('js/jsBootGrid.js')}}"></script>
  <script src="{{asset('js/admin/jsCategories.js')}}"></script>
  <script>
    $("#selCategories").select2();
  </script>
@endsection


@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Admin /</span> Categories
  </h4>

  <div class="row">
    <div class="col-md-12">
      <div class="tab-content py-0">
        <div class="tab-pane fade active show" id="delivery" role="tabpanel">
          <div id="accordionDelivery" class="accordion">
            <div class="card accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#accordionDelivery-1" aria-controls="accordionDelivery-1">
                 <b>Add Categories & Sub Categories</b>
                </button>
              </h2>

              <div id="accordionDelivery-1" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  <div class="col mt-3 mb-3">
                    <div class="form-check form-check-inline">
                      <input name="category-action-type" class="form-check-input category-action-type" type="radio" value="category" id="category-action-type-home" checked="">
                      <label class="form-check-label" for="category-action-type-home">Categories</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input name="category-action-type" class="form-check-input category-action-type" type="radio" value="subcategory" id="category-action-type-office">
                      <label class="form-check-label" for="category-action-type-office">Sub Categories </label>
                    </div>
                  </div>
                  <div id="CategoryForm">
                    <form action="{{route('admin.add.category')}}" method="post">
                      @csrf
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="category_name" placeholder="Add Category Name" aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Category Name</label>
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Add Category</button>
                      </div>
                    </form>
                  </div>
                  <div id="SubCategoryForm" style="display:none;">
                    <form action="{{route('admin.add.sub.category')}}" method="post">
                      @csrf
                      <select id="selCategories" name="category_id" class="selec2 form-select form-select-lg" data-allow-clear="true" required>
                        <option value="">-</option>
                        @foreach($aAllCategories as $cat)
                          <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                      </select>
                      <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="floatingInput" name="sub_category_name" placeholder="Add Category Name" aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">SubCategory Name</label>
                      </div>
                      <button type="submit" class="btn btn-primary mt-3">Add Sub Category</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      <hr />
      <table id="gridCategories" class="table table-condensed table-hover table-responsive"
             style="table-layout: auto">
        <thead>
        <tr>
          <th
            data-column-id="sno"
            data-identifier="true"
          >
            #
          </th>
          <th
            data-column-id="category"
            data-align="left"
            data-header-align="left">
            Category
          </th>
          <th
            data-column-id="subcategories"
            data-align="left"
            data-header-align="left">
            Sub Categories
          </th>
          <th
            data-column-id="status"
            data-align="center"

            data-header-align="center">
            Status
          </th>
          <th
            data-column-id="created_at"
            data-align="center"
            data-header-align="center">
            Added On
          </th>
        </tr>
        </thead>

        <tbody>
        @if(count($aCategories))
          @foreach($aCategories as $iKey => $aCategory)
            <tr>
              <td>{{($iKey+1)}}</td>
              <td>{{$aCategory->category}}</td>
              <td>
                @php
                  $aSubCategories = explode("|", $aCategory->sub_categories);
                @endphp
                @foreach($aSubCategories as $iIndex => $sSubCategory)
                  <span class="badge badge-sm bg-primary">{{$sSubCategory}}</span>
                  @if($iIndex % 3 == 1) <br />@endif

                @endforeach
              </td>
              <td><span class="badge badge-xs {{($aCategory->status == 0 ? 'bg-danger' : 'bg-success')}}">{{($aCategory->status == 0 ? 'Inactive' : 'Active')}}</span></td>
              <td>{{date('d F Y', strtotime($aCategory->created_at))}}</td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>

    </div>
  </div>
@endsection
