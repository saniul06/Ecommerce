<?php $__env->startSection('admin-content'); ?>
    <h3>You are log in as admin!</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('dashboard'); ?>
    active
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/nn/resources/views/admin/home.blade.php ENDPATH**/ ?>