<?php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
?>



<?php $__env->startSection('title', 'Not Authorized - Pages'); ?>

<?php $__env->startSection('page-style'); ?>
<!-- Page -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-misc.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- Not Authorized -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-1 mx-2">You are logout successfully!</h2>
    <div class="mt-4">
      <img src="<?php echo e(asset('assets/img/logout.png')); ?>" alt="page-misc-not-authorized" width="170" class="img-fluid">
    </div>
    <br><br>
    <a href="<?php echo e(url('/')); ?>" class="btn btn-primary mb-4">Back to home</a>
   
  </div>
</div>

<!-- /Not Authorized -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\piep-frontend\resources\views/auth/logout.blade.php ENDPATH**/ ?>