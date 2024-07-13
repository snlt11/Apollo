<?php $__env->startSection('title','Ecommerce'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Welcome Page</h1>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>