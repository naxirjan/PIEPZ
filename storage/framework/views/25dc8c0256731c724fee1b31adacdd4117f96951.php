

<?php $__env->startSection('title', 'DataTables - Tables'); ?>

<?php $__env->startSection('vendor-style'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Products
</h4>

<!-- Scrollable -->
<div class="card">

  <h5 class="card-header">Products</h5>
  <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
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
            <?php if(count($products)): ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger"><img src="<?php echo e(asset('storage/'.$product->image)); ?>" alt=""></span></div></div></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><?php echo e($product->stock); ?></td>
                    <td><div class="d-flex align-items-center"><a href="<?php echo e(route('admin.edit.product',['id'=>$product->id])); ?>" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="<?php echo e(route('admin.delete.product',['id'=>$product->id])); ?>" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="<?php echo e(route('vendor.product.view',['id'=>$product->id])); ?>" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
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
<script>
  new DataTable('#example');
</script>

<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PIEPZ\resources\views/admin/products/index.blade.php ENDPATH**/ ?>