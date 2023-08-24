

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
       <div>
          <label for="defaultFormControlInput" class="form-label">Product Name : <?php echo e($product->name); ?></label>
        </div>
        <div>
          <label for="defaultFormControlInput" class="form-label">Product SKU : <?php echo e($product->sku); ?></label>
        </div>
      <!-- Product Description  -->
      <hr class="my-5">

 <!-- Gallery effect-->
 <div class="col-12">
    <h6 class="text-muted mt-3">Thumbs Gallery</h6>
    <div id="swiper-gallery">
      <div class="swiper gallery-top">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('assets/img/backgrounds/2.jpg')); ?>)">Slide 1</div>
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('assets/img/backgrounds/1.jpg')); ?>)">Slide 2</div>
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('assets/img/backgrounds/3.jpg')); ?>)">Slide 3</div>
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('assets/img/backgrounds/4.jpg')); ?>)">Slide 4</div>
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('assets/img/backgrounds/6.jpg')); ?>)">Slide 5</div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper gallery-thumbs">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('assets/img/backgrounds/2.jpg')); ?>)">Slide 1</div>
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('assets/img/backgrounds/1.jpg')); ?>)">Slide 2</div>
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('assets/img/backgrounds/3.jpg')); ?>)">Slide 3</div>
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('assets/img/backgrounds/4.jpg')); ?>)">Slide 4</div>
          <div class="swiper-slide" style="background-image:url(<?php echo e(asset('assets/img/backgrounds/6.jpg')); ?>)">Slide 5</div>
        </div>
      </div>
    </div>
  </div>

      <!-- end gallery -->
    <div class="row">

    <div class="col-md-6">
         <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control"  value="<?php echo e($product->price); ?>" aria-label="Dollar amount (with dot and two decimal places)" readonly>
        </div>
    </div>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control" value="" aria-label="Dollar amount (with dot and two decimal places)" readonly>
        </div>
      </div>
    </div>


      <!-- End Price -->


      </div>
    </div>
  </div>
  <!--/ Earning Reports -->

  <!-- Earning Reports -->
  <div class="col-lg-4 mb-4">
    <div class="card h-100">
    <div class="card-body">

    <div class="mb-3">
          <label for="defaultSelect" class="form-label">Status</label>
          <select id="defaultSelect" class="form-select">
            <option>Default select</option>
            <option value="1">Active</option>
            <option value="2">Draft</option>
            <option value="3">UnAvailable</option>
          </select>
    </div>



    <hr class="my-5">

    <label for="defaultFormControlInput" class="form-label">Sales channels and apps Manage</label>
<br><br>
    <ul class="list-unstyled mb-0">

              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="<?php echo e(asset('assets/img/icons/brands/react-label.png')); ?>" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Onlinewinkel</h6>
                      <small class="text-muted">Beschikbaarheid plannen</small>
                    </div>
                  </div>

                </div>
              </li>

              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="<?php echo e(asset('assets/img/icons/brands/react-label.png')); ?>" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Facebook & Instagram</h6>
                      <small class="text-muted">Facebook & Instagram</small>
                    </div>
                  </div>

                </div>
              </li>
              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="<?php echo e(asset('assets/img/icons/brands/react-label.png')); ?>" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Google & YouTube</h6>
                      <small class="text-muted">Beschikbaarheid plannen</small>
                    </div>
                  </div>

                </div>
              </li>

              <li class="text-center">
                <a href="javascript:;">View all teams</a>
              </li>
            </ul>

            <hr class="my-5">

            <div class="size" style="display:flex;">
            <h6>Inzichten</h6> <span style="margin-left:20px;"></span><h6>    Afgelopen 90 dagen</h6>
            </div>
            <p>12 eenheden verkocht aan 14 klantvoor € 1.197,01 aan netto-omzet.</p>
            <a href="#">Details bekijken</a>

            <hr class="my-5">

            <label for="select2Basic" class="form-label">Product Categories</label>
            <select id="select2Basic1" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">Option 1</option>
              <option value="HI">Option 2</option>
              <option value="CA">Option 3</option>
              <option value="NV">Option 4</option>
            </select>


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
            <select id="select2Multiple" class="select2 form-select" multiple>
              <optgroup label="Alaskan/Hawaiian Time Zone">
                <option value="AK" selected>option 1</option>
                <option value="HI" selected>option 2</option>
              </optgroup>
              </select>

              <hr class="my-5">
              <label for="select2Basic" class="form-label">Online Store</label>
            <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">Option 1</option>
              <option value="HI">Option 2</option>
              <option value="CA">Option 3</option>
              <option value="NV">Option 4</option>
            </select>

    </div>
    </div>
</div>
  <!--/ Earning Reports -->


<hr class="my-5">


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\piep-frontend\resources\views/admin/products/product-view.blade.php ENDPATH**/ ?>