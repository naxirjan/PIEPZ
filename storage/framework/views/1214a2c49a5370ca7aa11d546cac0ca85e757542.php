
<?php $__env->startSection('title', 'DataTables - Tables'); ?>
<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4">
   <span class="text-muted fw-light">Admin /</span> Bulk Update Products
</h4>


<div class="row">

  <!-- Orders last week -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-3">
        <h5 class="card-title mb-0">Status</h5>

      </div>
      <div class="card-body">

        <div class="d-flex justify-content-between align-items-center gap-3">
          <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">John</option>
              <option value="HI">Smith</option>
              <option value="CA">Robb</option>
              <option value="NV">Kenn</option>

            </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Sales last year -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Vendor</h5>

      </div>

      <div class="card-body pt-0">
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
         <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">John</option>
              <option value="HI">Smith</option>
              <option value="CA">Robb</option>
              <option value="NV">Kenn</option>

            </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Profit last month -->
  <div class="col-xl-4 col-md-4 col-6 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <h5 class="card-title mb-0">Categories</h5>
      </div>
      <div class="card-body">
        <div id="profitLastMonth"></div>
        <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
         <select id="select2Basic4" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">John</option>
              <option value="HI">Smith</option>
              <option value="CA">Robb</option>
              <option value="NV">Kenn</option>

            </select>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Scrollable -->
<div class="card" style="padding:20px;">
   <div class="table-responsive text-nowrap">
      <form action="bulk-update-procducts-process" method="post">
       <table class="table">
         <thead>
            <tr>
                <th><input class="form-check-input" type="checkbox" class="cb-select-all-products" /></th>
                <th>Product Name</th>
                <th>Product Type</th>
                <th>&nbsp;Price&nbsp;</th>
                <th>Short Description</th>
                <th>Is featured</th>
                <th>Is Approved</th>
                <th>Status</th>
            </tr>
         </thead>
         <tbody id ="GetProducts"></tbody>
      </table>
       <br />
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
       <button name="submit" class="btn btn-primary me-3 waves-effect waves-light" type="submit" value="submit">Update</button>
       </form>
   </div>
</div>
<!--/ Scrollable -->


</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
$( document ).ready(function() {
   $("#GetProducts").load('ajax-get-bulk-edit-products');
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PIEPZ\resources\views/admin/products/product-bulk-edit.blade.php ENDPATH**/ ?>