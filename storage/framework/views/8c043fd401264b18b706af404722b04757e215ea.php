

<?php $__env->startSection('title', 'E-commerce'); ?>


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/apex-charts/apex-charts.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/dashboards-ecommerce.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <!-- View sales -->
  <div class="col-xl-4 mb-4 col-lg-5 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Welcome John! 🎉</h5>
            <p class="mb-2">Best vendor of the month</p>
            <h4 class="text-primary mb-1">$48.9k</h4>
            <a href="javascript:;" class="btn btn-primary">View Sales</a>
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="<?php echo e(asset('assets/img/illustrations/card-advance-sale.png')); ?>" height="140" alt="view sales">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- View sales -->

  <!-- Statistics -->
  <div class="col-xl-8 mb-4 col-lg-7 col-12">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between mb-3">
          <h5 class="card-title mb-0">Statistics</h5>
          <small class="text-muted">Updated 1 month ago</small>
        </div>
      </div>
      <div class="card-body">
        <div class="row gy-3">
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-primary me-3 p-2"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">230k</h5>
                <small>Sales</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">8.549k</h5>
                <small>Customers</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-danger me-3 p-2"><i class="ti ti-shopping-cart ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">1.423k</h5>
                <small>Products</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-success me-3 p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">$9745</h5>
                <small>Revenue</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Statistics -->
  <!-- Popular Product -->
  <div class="col-md-12 col-xl-12 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title m-0 me-2">
          <h5 class="m-0 me-2">All Imports</h5>
          <small class="text-muted">Total Imports 10.4k </small>
        </div>
     
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-1">
            <div class="me-3">
              <img src="data:image/jpeg;base64,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" alt="User" class="rounded" width="46">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">XML</h6>
                <small class="text-muted d-block">12/04/2025</small>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <p class="mb-0 fw-semibold">200 products</p>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="me-3">
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF4AAACBCAMAAAB+ZP2mAAAAkFBMVEX////y8vIgpGQXoF0fpGMZoV8hpGQlpmcYoV8XoF4ipWWO0bEeo2IaomAjpWYdo2IWoF0comEbomEkpWa/3sz3+/gckVrG3tAAmUwAk0UbllsAnVXj6+Ygj1uBvpn89/pvwZjP4tir0rt2u5JPr3sAiUuZ1bgAk1A4p2wAlEBstom02sRbt4dEr3h/x6VNpnpnJ9JDAAAE90lEQVRogb3a2VrbOhQFYDJiu55NSDimB9JwOCEp7fu/XT3ItrQHacvh67pDFz+LbXkg8d3dX8rONx728bSuPXJo8vQqLv5aJ+m9mapL2ibqsu2y7LJukr++y/6A3Tm5R6H5SW/4bzL/J6Fb2w+8yL/WhC7jJf5nNJ93+zuyvJR3+vvbeJf/kPN8KuAdvhe/JPhv7/58JW9v928ejt33ak8Ox+oLeXjJMXneJ3nr6Cme9f35NcVz/lfxjE/x1Rye9nk+tR1Zgid9greX53nKn8nHFE/4mK/wbPDoaR77D+iCzJYX8MhH7R3lHTz0IV/dyAMf8BZdn42FN32TBzpf3sIbvsFXZHmSD36+S3yNr6BOzGbkyzOr6/7IV5xOlG9423Q0/6GuDFpYPo6Lews/+g0PQ5ZHfBx8CnzMu/Wej/PzL6cP+TQVlo+zLAl/n1j+1zvB23XAZ+vw8Tub//aIR7plNlnrFx586tBh+a6/kE9TXufKZ1mRTP6jGcWnOJGtvMnrvvlLWB7q/GwavvXbA9wd5Mfv7vZ2HZRXPhGGRzpVXucbX8xHkUd5xZekT/CRUDfKFyXpIz6idDdflqRv8lE0U+/4xv8HRPERFag7edW/l/v2Dxy/FemZoSewP8uzuq088hl+i3V3+Y43fZq36I7ywP+f4LdineI3uo/47VaiW8pvdF/ntyhId5dveM1XPJYNXVK+HHXNt/BLl86V13yeJ3TbaPTym02gfI5fWnR3+SBQPs0vvXXEB0HI8Mjtk5gZRT0bjW99yOut0XOtkS34OQDlGz4M65FfwtTXZ49ca1R+4pHd8vuXhTgv+5oob+fl+mLR8pu/yIc2vtkpc/nAyXcbUfFHIwtureFxeYof9rnicz0fz+3S84fxPYfJ6+XDA+C100jxQZJNOfT8YThXu6cDxRPlB35NZOSna0E88vrDh8EHM/kM8nR7g1+J+UzGm+UFfJhocx74aS3Ic5Zf8XwcK/6+0j4uqXu++V9M+5BD40F5jm/HofgXIwtujeBXNK92iu9ZS5QHfLyMp9zKryY+JuI/HFRewH++aTn3h/asr33S/ErG50F/G20vOcGwMQP9QjTwuLyAV9ec/rHAuOYMT8SKD3B5ns8ynU8KzCc0H7r5rq/GFwXmBz03eUOn+OHiO/EF4rWHHDmfGVG8ceew3U4IfeAzIorfG1lwaySfu3nxWUvoX8yH/rz4okCU5/miUPwPIwtureXBcWX5bhN67xw0Goof9/i478fbajnt++lxeNr3uLzOFyDEvXbkJ33iifIDD2mGLyd+w/Gr+fz0pDDqAeANXcDX1DOmtjQeWjwaCX/Sc+n5i7Go82b5FcuX5XBauc7X4bTCOsd3g/a9KODRUPx4HGfwsPzAl0T8eaRb+eOLR4411B18fvnXI5ecKG/jyxwHv0A2LCHdyTOfR+jP8dMdhNRZnv+0w8Cxro+G5gmaqc7rNE/KAKd0ejQjz7EE7qNLeA4n9BXQ3fxmhj7yuYPncZFu5Tcw3jrPI5vBeZ3jseyj6+VNnnYRLtcH3gLb8EmnBj/wezsfzNAHvv3eavchtT31/KN71fGc34Qzg29y7t4kuB4ktoGL9MO1fxHiDU4f0T76sFK/qdc4dufaTgtwqId1Nb5kursc8py8JXYBOsXDlfrpor/CejzVT1+Y+nS8A/F+g/1rXm6/KX8AC6r7zLYXMy0AAAAASUVORK5CYII=" style="width:46px;height:46px;" alt="">
          </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Google Sheet</h6>
                <small class="text-muted d-block">12/08/2023</small>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <p class="mb-0 fw-semibold">90 products</p>
              </div>
            </div>
          </li>
        
        </ul>
      </div>
    </div>
  </div>
  <!--/ Popular Product -->

  
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\piep-frontend\resources\views/vendors/index.blade.php ENDPATH**/ ?>