

<?php $__env->startSection('title', 'DataTables - Tables'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


<?php $__env->startSection('vendor-style'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/ui-carousel.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>

<script src="<?php echo e(asset('assets/vendor/libs/swiper/swiper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/bloodhound/bloodhound.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>

<script src="<?php echo e(asset('assets/js/ui-carousel.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/forms-selects.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/forms-typeahead.js')); ?>"></script>
<?php $__env->stopSection(); ?>






<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Product Edit
</h4>
<form action="<?php echo e(route('admin.product.update')); ?>" method="POST" enctype="multipart/form-data" >
<?php echo csrf_field(); ?>
<input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
<div class="row">


  <!-- Earning Reports -->
  <div class="col-lg-8 mb-4">
  <?php if($errors->any()): ?>
          <div class="alert alert-danger">
              <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      <?php endif; ?>
      <?php if(session('success')): ?>
       <div class="alert alert-sucess">
          <h1><?php echo e(session('success')); ?></h1>
       </div>
     <?php endif; ?>
    <div class="card h-100">
      <div class="card-body">

      <!-- Product Name Field -->
      <div>
          <label for="defaultFormControlInput" class="form-label">Title</label>
          <input type="text" class="form-control" name="name" id="defaultFormControlInput" placeholder="simply dummy text of the printing and typesetting industry" aria-describedby="defaultFormControlHelp"  value="<?php echo e($product->name); ?>" />
        </div>
      <!-- Product Description  -->
      <hr class="my-5">
      <div>
      <label for="defaultFormControlInput" class="form-label">Product Description</label>
      <br>
     <textarea name="description" id="summernote"></textarea>

    </div>
     <hr class="my-5">

     <div>
          <label for="defaultFormControlInput" class="form-label">Short Descirption</label>
          <br>

     <textarea name="short_description" id="summernote"></textarea>

        </div>

      <label for="defaultFormControlInput" class="form-label">Products Images</label>



 <div class="col-12">
    <h6 class="text-muted mt-3">Product Gallery</h6>

    <div class="col-12">
    <h6 class="text-muted mt-3">Product Gallery</h6>
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

    <input name="images[]" type="file" /  multiple>

  </div>
      <!-- File Upload End -->

      <hr class="my-5">

      <!-- prices -->
    <div class="row">

    <div class="col-md-12">
         <div class="input-group">
          <span class="input-group-text">SKU</span>
          <input type="text" class="form-control" placeholder="149" aria-label="Dollar amount (with dot and two decimal places)" name="sku" value="<?php echo e($product->sku); ?>">
        </div>
    </div>

    <div class="col-md-6">
         <div class="input-group">
          <span class="input-group-text">Price ($)</span>
          <input type="text" class="form-control" value="<?php echo e($product->price); ?>" placeholder="149" aria-label="Dollar amount (with dot and two decimal places)" name="price">
        </div>
    </div>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">Stock</span>
          <input type="number" class="form-control" value="<?php echo e($product->stock); ?>" placeholder="1349" aria-label="Dollar amount (with dot and two decimal places)" name="stock">
        </div>
      </div>

      <br>
      <br>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">In Stock</span>
          <input type="number" class="form-control" value="<?php echo e($product->in_stock); ?>" placeholder="349" aria-label="Dollar amount (with dot and two decimal places)" name="in_stock">
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text">Low Stock</span>
          <input type="number" class="form-control" value="<?php echo e($product->low_stock); ?>" placeholder="349" aria-label="Dollar amount (with dot and two decimal places)" name="low_stock">
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
          <select id="defaultSelect" class="form-select" name="status">
            <option value="1" <?php if($product->status==1): ?> selected <?php endif; ?>>Active</option>
            <!-- <option value="2">Draft</option> -->
            <option value="0" <?php if($product->status==0): ?> selected <?php endif; ?>>UnAvailable</option>
          </select>
    </div>



    <hr class="my-5">
<!--
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
            <a href="#">Details bekijken</a> -->

            <hr class="my-5">

            <label for="select2Basic" class="form-label">Product Categories</label>
            <select id="select2Basic1" class="select2 form-select form-select-lg" data-allow-clear="true" name="category[]" multiple>
              <?php if($categories->count()): ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($category->name); ?>" <?php if($p_cat->id==$category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>

            </select>


            <label for="select2Basic" class="form-label">Product Type</label>
        <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="type">
          <option value="simple">Simple</option>
          <!-- <option value="HI">Option 2</option>
          <option value="CA">Option 3</option>
          <option value="NV">Option 4</option> -->
        </select>

        <label for="select2Basic" class="form-label">Seller</label>
        <select id="select2Basic2" class="select2 form-select form-select-lg" data-allow-clear="true" name="seller">
          <?php if($vendors->count()): ?>
            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($vendor->id); ?>" <?php if($product->user_id==$vendor->id): ?> selected <?php endif; ?>><?php echo e($vendor->first_name ." ".$vendor->last_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </select>

        <label for="select2Multiple" class="form-label">Product Tags</label>
            <select id="select2Multiple" class="select2 form-select" multiple>
              <optgroup label="Alaskan/Hawaiian Time Zone">
                <option value="AK" selected>option 1</option>
                <option value="HI" selected>option 2</option>
              </optgroup>
              </select>

              <!-- <hr class="my-5">
              <label for="select2Basic" class="form-label">Online Store</label>
            <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
              <option value="AK">Option 1</option>
              <option value="HI">Option 2</option>
              <option value="CA">Option 3</option>
              <option value="NV">Option 4</option>
            </select> -->
            <hr class="my-5">
              <label for="select2Basic" class="form-label">Is Feature</label>
            <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true" name="is_featured">
              <option value="1" <?php if($product->is_featured==1): ?> selected <?php endif; ?>>Yes</option>

              <option value="0" <?php if($product->is_featured==0): ?> selected <?php endif; ?>>No</option>
            </select>

    </div>

    </div>

</div>
  <!--/ Earning Reports -->



<div class="row">

<div class="col-12">
    <div class="card mb-4">
      <div class="card-body">
        <div class="demo-inline-spacing">
          <button type="submit" class="btn btn-primary">EDIT SAVE</button>
        </div>
      </div>

    </div>
  </div>
</div>
</form>


<script>
  $('textarea#summernote').summernote({
        placeholder: 'Description',
        tabsize: 2,
        height: 100,
  toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        //['fontname', ['fontname']],
       // ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        //['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
      });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PIEPZ\resources\views/admin/products/product-edit.blade.php ENDPATH**/ ?>