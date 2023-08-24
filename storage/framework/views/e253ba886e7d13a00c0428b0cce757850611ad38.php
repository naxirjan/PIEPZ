<?php
$customizerHidden = 'customizer-hide';
?>



<?php $__env->startSection('title', 'Login Basic - Pages'); ?>

<?php $__env->startSection('vendor-style'); ?>
<!-- Vendor -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
<!-- Page -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-auth.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/pages-auth.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<style>
 .authentication-wrapper.authentication-basic .authentication-inner {
    max-width: 80% !important;
    position: relative;
}
</style>

<?php $__env->startSection('content'); ?>
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
                    <div class="app-brand justify-content-center mb-4 mt-2">
                      <a href="<?php echo e(url('/')); ?>" class="app-brand-link gap-2">
                        <span class="app-brand-text demo text-body fw-bold ms-1">Welcome to Piepz 👋</span>
                      </a>
                    </div>
                    <!-- /Logo -->


                    <div class="row mb-5">
                          <div class="col-md-6 col-lg-6">

                            <div class="card mb-4">
                              <div class="card-body">
                                <h5 class="card-title">Personal Information</h5>
                                <div class="card-subtitle  mb-3">Name: <?php echo e($user->first_name); ?></div>
                                <div class="card-subtitle mb-3">Email: <?php echo e($user->email); ?></div>
                                <div class="card-subtitle mb-3">Phone: <?php echo e($user->phone); ?></div>

                              </div>
                            </div>

                          </div>
                          <div class="col-md-6 col-lg-6">

                            <div class="card mb-4">
                              <div class="card-body">
                                <h5 class="card-title">Company Information</h5>
                                <div class="card-subtitle text-muted mb-3">Company Name: <?php echo e($user->company->company_name); ?></div>

                              </div>
                            </div>

                          </div>
                    </div>


        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\piep-frontend\resources\views/auth/vendor/confirmation.blade.php ENDPATH**/ ?>