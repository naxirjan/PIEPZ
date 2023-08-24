

<?php $__env->startSection('title', 'DataTables - Tables'); ?>


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/quill/typography.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/quill/katex.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/quill/editor.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/dropzone/dropzone.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/tagify/tagify.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/ui-carousel.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/swiper/swiper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/quill/katex.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/quill/quill.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/dropzone/dropzone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/tagify/tagify.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/bloodhound/bloodhound.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/ui-carousel.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/forms-editors.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/forms-file-upload.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/forms-selects.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/forms-tagify.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/forms-typeahead.js')); ?>"></script>
<?php $__env->stopSection(); ?>







<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Product Detail
</h4>

<div class="row">


  <!-- Earning Reports -->
  <div class="col-lg-8 mb-4">
    <div class="card h-100">
      <div class="card-body">

      <!-- Product Name Field -->
      <?php if(!empty($product->name)): ?>
       <div>
          <label for="defaultFormControlInput" class="form-label">Product Name : <?php echo e($product->name); ?></label>
        </div>
        <?php endif; ?>
        <?php if(!empty($product->sku)): ?>
        <div>
          <label for="defaultFormControlInput" class="form-label">Product SKU : <?php echo e($product->sku); ?></label>
        </div>
        <?php endif; ?>
        <?php if(!empty($product->short_description)): ?>
        <div>
          <label for="defaultFormControlInput" class="form-label">Product Short Description : <?php echo e($product->short_description); ?></label>
        </div>
        <?php endif; ?>

      <!-- Product Description  -->
      <hr class="my-2">

 <!-- Gallery effect-->
 <div class="col-12">
    <h6 class="text-muted mt-3">Product Images</h6>
    <div id="swiper-gallery">
      <div class="swiper gallery-top">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('storage/'.$product->image)); ?>)"></div>
       <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('storage/'.$img->media_url)); ?>)"></div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper gallery-thumbs">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('storage/'.$product->image)); ?>)"></div>
          <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('storage/'.$img->media_url)); ?>)"></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
    </div>
  </div>
  <hr class="my-2">
      <!-- end gallery -->
    <div class="row">
    <?php if(!empty($product->price)): ?>

    <div class="col-sm-3">
    <label for="">Price</label>
         <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control"  value="<?php echo e($product->price); ?>" aria-label="Dollar amount (with dot and two decimal places)" readonly>
        </div>
    </div>
    <?php endif; ?>
    <?php if(!empty($product->stock)): ?>

      <div class="col-sm-3">
      <label for="">Stock</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
          <input type="text" class="form-control" value="<?php echo e($product->stock); ?>"  readonly>
        </div>
      </div>
    <?php endif; ?>
    <?php if(!empty($product->in_stock)): ?>

    <div class="col-sm-3">
    <label for="">In Stock</label>
         <div class="input-group">
          <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
          <input type="text" class="form-control"  value="<?php echo e($product->in_stock); ?>" readonly>
        </div>
    </div>
    <?php endif; ?>
    <?php if(!empty($product->low_stock)): ?>

      <div class="col-sm-3">
      <label for="">Low Stock</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
          <input type="text" class="form-control" value="<?php echo e($product->low_stock); ?>"  readonly>
        </div>
      </div>
      <?php endif; ?>

    </div>


      <!-- End Price -->
<!-- categories -->
<hr class="my-2">
<?php if(!empty($product->categories)): ?>
<label for="select2Multiple1" class="form-label">Categories</label>
            <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h6 class="mb-0"><?php echo e($cat->id." - ".$cat->name); ?></h6>


              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<hr class="my-2">
<!-- end categories -->
<?php if(!empty($product->description)): ?>
<label for="select2Multiple1" class="form-label">Product Description</label>

                <h6 class="mb-0"><?php echo e($product->description); ?></h6>


<?php endif; ?>
<!-- description -->

<!--end description -->

      </div>
    </div>
  </div>
  <!--/ Earning Reports -->

  <!-- Earning Reports -->
  <div class="col-lg-4 mb-4">
    <div class="card h-100">
    <div class="card-body">

    <div class="mb-3">
      <?php if($product->status==0): ?>
        <div class="p-3 mb-2 bg-info text-white">Status - Pending</div>

      <?php elseif($product->status==1): ?>
          <div class="p-3 mb-2 bg-success text-white">Status - Approved</div>
      <?php elseif($product->status==2): ?>
      <div class="p-3 mb-2 bg-warning text-white">Status - Cancelled</div>
      <?php endif; ?>
    </div>

    <hr class="my-1">

        <label for="select2Basic" class="form-label">Product Type</label>
        <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true">
          <option value="AK">Option 1</option>
          <option value="HI">Option 2</option>
          <option value="CA">Option 3</option>
          <option value="NV">Option 4</option>
        </select>

        <label for="select2Basic" class="form-label">Seller</label>
        <select id="select2Basic2" class="select2 form-select form-select-lg" data-allow-clear="true">
          <option value="AK">Option 1</option>
          <option value="HI">Option 2</option>
          <option value="CA">Option 3</option>
          <option value="NV">Option 4</option>
        </select>

        <label for="select2Multiple" class="form-label">Product Tags</label>
            <select id="select2Multiple" class="select2 form-select" multiple readonly>
              <optgroup label="Alaskan/Hawaiian Time Zone">
                <option value="AK" selected>option 1</option>
                <option value="HI" selected>option 2</option>
              </optgroup>
              </select>

              <hr class="my-2">
              <label for="select2Basic" class="form-label">Online Store</label>
            <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">Option 1</option>
              <option value="HI">Option 2</option>
              <option value="CA">Option 3</option>
              <option value="NV">Option 4</option>
            </select>
            <ul>
          <li>Tag 1</li>
          <li>Tag 2</li>
          <li>Tag 3</li>
         </ul>
    </div>
    </div>
</div>
  <!--/ Earning Reports -->


<hr class="my-5">


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PIEPZ\resources\views/admin/products/product-view.blade.php ENDPATH**/ ?>