

<?php $__env->startSection('title', 'DataTables - Tables'); ?>

<?php $__env->startSection('vendor-style'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
<?php $__env->stopSection(); ?>




<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/forms-selects.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span>Edit Products 
</h4>
<style>
    .card{
        width:150%;
    }
</style>
<!-- Scrollable -->
<div class="card">
  <h5 class="card-header">Edit Products</h5>
  <div class="card-datatable text-nowrap">
  <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>P ID</th>
                <th>Img</th>
                <th>Name</th>
                <th>Status</th>
                <th>Category</th>
                <th>Vendor</th>
                <th>Price</th>
                <th>Available Quantity</th>
                <th>On Hand Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php ($i=1); ?>
        <tbody>
            <tr>
                <td><?php echo e($i++); ?></td>
               
                <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div></div></td>
               
                <td>Name</td>
               
                <td>
                  <select id="select2Basic1" class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="AK">Active</option>
                    <option value="HI">Trash</option>
                    <option value="CA">Draft</option>
                    <option value="NV">Update</option>
                  
                  </select>
                      </td>
                <td>
                <select id="select2Multiple" class="select2 form-select" multiple>
                    <optgroup label="category">
                      <option value="AK" selected>Cat 1</option>
                      <option value="HI">Cat 2</option>
                    </optgroup>
                    </select>
                </td>
            <td><select id="select2Basic2" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">John</option>
              <option value="HI">Smith</option>
              <option value="CA">Robb</option>
              <option value="NV">Kenn</option>
             
            </select>
          </td>
                <td><input type="text" class="form-control" id="defaultFormControlInput" placeholder="999" aria-describedby="defaultFormControlHelp" /></td>
                <td><input type="text" class="form-control" id="defaultFormControlInput" placeholder="100" aria-describedby="defaultFormControlHelp" /></td>
                <td><input type="text" class="form-control" id="defaultFormControlInput" placeholder="50" aria-describedby="defaultFormControlHelp" /></td>
                <td><div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="http://127.0.0.1:8000/app/user/view/account" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
            </tr>
         
        </tbody>
        </table>
  </div>
</div>
<!--/ Scrollable -->

<hr class="my-5">
<?php $__env->startSection('vendor-script'); ?>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>

<script>
  new DataTable('#example');
  
</script>

<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\piep-frontend\resources\views/admin/products/customization.blade.php ENDPATH**/ ?>