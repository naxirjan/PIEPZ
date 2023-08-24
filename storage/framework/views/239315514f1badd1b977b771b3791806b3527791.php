<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="<?php echo e((!empty($containerNav) ? $containerNav : 'container-fluid')); ?>">
    <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
      <div>
        © <script>
          document.write(new Date().getFullYear())

        </script>
        , made with ❤️ by <a href="<?php echo e((!empty(config('variables.creatorUrl')) ? config('variables.creatorUrl') : '')); ?>" target="_blank" class="fw-semibold"><?php echo e((!empty(config('variables.creatorName')) ? config('variables.creatorName') : '')); ?></a>
      </div>
      <div>
        <a href="<?php echo e(config('variables.licenseUrl') ? config('variables.licenseUrl') : '#'); ?>" class="footer-link me-4" target="_blank">License</a>
        <a href="<?php echo e(config('variables.moreThemes') ? config('variables.moreThemes') : '#'); ?>" target="_blank" class="footer-link me-4">More Themes</a>
        <a href="<?php echo e(config('variables.documentation') ? config('variables.documentation') : '#'); ?>" target="_blank" class="footer-link me-4">Documentation</a>
        <a href="<?php echo e(config('variables.support') ? config('variables.support') : '#'); ?>" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
      </div>
    </div>
  </div>
</footer>
<!--/ Footer-->
<?php /**PATH C:\xampp\htdocs\projects\piep-frontend\resources\views/layouts/sections/footer/footer.blade.php ENDPATH**/ ?>