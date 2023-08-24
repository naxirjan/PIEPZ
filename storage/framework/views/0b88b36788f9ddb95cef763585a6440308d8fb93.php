<?php
$configData = Helper::appClasses();
?>



<?php $__env->startSection('title', 'Pricing - Pages'); ?>

<!-- Page -->
<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-pricing.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/pages-pricing.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <!-- Pricing Plans -->
  <div class="pb-sm-5 pb-2 rounded-top">
    <div class="container py-5">
      <h2 class="text-center mb-2 mt-0 mt-md-4">Pricing Plans</h2>
      <p class="text-center"> Get started with us - it's perfect for individuals and teams. Choose a subscription plan that meets your needs. </p>
      <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pb-5 pt-3 mb-0 mb-md-4">
        <label class="switch switch-primary ms-3 ms-sm-0 mt-2">
          <span class="switch-label">Monthly</span>
          <input type="checkbox" class="switch-input price-duration-toggler" checked />
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
          <span class="switch-label">Annual</span>
        </label>
        <div class="mt-n5 ms-n5 d-none d-sm-block">
          <i class="ti ti-corner-left-down ti-sm text-muted me-1 scaleX-n1-rtl"></i>
          <span class="badge badge-sm bg-label-primary">Save up to 10%</span>
        </div>
      </div>

      <div class="row mx-0 gy-3 px-lg-5">

      <!-- Packages view -->

        <?php $__currentLoopData = $pack; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg mb-md-0 mb-4">
          <div class="card border rounded shadow-none">
            <div class="card-body">
              <div class="my-3 pt-2 text-center">
                <img src="<?php echo e(asset('assets/img/illustrations/page-pricing-basic.png')); ?>" alt="Basic Image" height="140">
              </div>
              <h3 class="card-title fw-semibold text-center text-capitalize mb-1"><?php echo e($pk->package_title); ?></h3>
              <p class="text-center"><?php echo e("$".$pk->package_price); ?></p>
              <p class="text-center">Registration Fees $50</p>

              <ul class="ps-3 my-4 pt-2">
                                       <?php echo $pk->package_description; ?>

              </ul>
              <?php
                                    $i=1;
                                    $myString = $pk->durations;
                                    $codes = explode(',', $myString);
                                    $myString1 = $pk->duration_price;
                                    $names = explode(',', $myString1);
                                    ?>
                                    <?php $__currentLoopData = $codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md mb-md-0 ps-2 my-2 pt-1">
                                       <div class="form-check custom-option custom-option-icon" style="padding:0px;">
                                          <label class="form-check-label custom-option-content" for="<?php echo e($names[$index].$pk->id); ?>" style="padding:0px;">
                                          <span class="custom-option-body">
                                          <span class="custom-option-title">$<?php echo e($names[$index]); ?></span>
                                          <small> <?php echo e($code); ?></small>
                                          </span>
                                          </label>
                                       </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
  <!--/ Pricing Plans -->
  <!-- Pricing Free Trial -->
  <div class="pricing-free-trial bg-label-primary">
    <div class="container">
      <div class="position-relative">
        <div class="d-flex justify-content-between flex-column-reverse flex-lg-row align-items-center py-4 px-5">
          <div class="text-center text-lg-start mt-2 ms-3">
            <h3 class="text-primary mb-1">Still not convinced? Start with a 14-day FREE trial!</h3>
            <p class="text-body mb-1">You will get full access to with all the features for 14 days.</p>
            <a href="<?php echo e(url('auth/register-basic')); ?>" class="btn btn-primary mt-4 mb-2">Start 14-day FREE trial</a>
          </div>
          <!-- image -->
          <div class="text-center">
            <img src="<?php echo e(asset('assets/img/illustrations/girl-with-laptop.png')); ?>" class="img-fluid me-lg-5 pe-lg-1 mb-3 mb-lg-0" alt="Api Key Image" width="202">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Pricing Free Trial -->
  <!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Price</th>
         <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
       <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
          <td><?php echo e($pack->package_title); ?></td>

          <td><span class="badge bg-label-primary me-1"><?php echo e($pack->package_price); ?></span></td>
          <td>

                <a href="<?php echo e(url('admin/piepz/update-package/'.$pack->id)); ?>"><i class="ti ti-pencil me-1"></i> Edit</a>

            </div>
          </td>
        </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\piep-frontend\resources\views/admin/piepz/packages.blade.php ENDPATH**/ ?>