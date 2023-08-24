<?php $iCount = 0; $sStatus = ""; ?>
<?php $__currentLoopData = $aProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $sStatus = ($aProduct->status == 1 ? "checked=checked" : ""); ?>
    <tr>
        <td><input name="SelectedProduct_<?php echo e($iCount); ?>" class="form-check-input cb-element" type="checkbox" value="<?php echo e(base64_encode($aProduct->id)); ?>" /> </td>
        <td><input name="name_<?php echo e($iCount); ?>" type="text" value="<?php echo e($aProduct->name); ?>-<?php echo e($aProduct->id); ?>" class="form-control"></td>
        <td><input name="type_<?php echo e($iCount); ?>" type="text" value="<?php echo e($aProduct->type); ?>" class="form-control"></td>

        <td><input name="price_<?php echo e($iCount); ?>" type="number" value="<?php echo e($aProduct->price); ?>" class="form-control"></td>
        <td><input name="short_description_<?php echo e($iCount); ?>" type="text" value="<?php echo e($aProduct->short_description); ?>" class="form-control"></td>
        <td><label class="switch switch-sm pe-4">
          <input name="is_featured_<?php echo e($iCount); ?>" type="checkbox" class="switch-input" checked="" value="<?php echo e($aProduct->is_featured); ?>">
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
        </label></td>
        <td><label class="switch switch-sm pe-4">
          <input name="is_approved_<?php echo e($iCount); ?>" type="checkbox" class="switch-input" checked="" value="<?php echo e($aProduct->is_approved); ?>">
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
        </label></td>
        <td><label class="switch switch-sm pe-4">
          <input name="status_<?php echo e($iCount); ?>" type="checkbox" class="switch-input" <?php echo e($sStatus); ?>>
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
        </label></td>
    </tr>
<?php $iCount++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\PIEPZ\resources\views/admin/products/ajax/ajax-get-bulk-edit-products.blade.php ENDPATH**/ ?>