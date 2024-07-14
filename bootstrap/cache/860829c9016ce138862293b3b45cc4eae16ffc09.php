<?php $__env->startSection('title','Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <?php echo $__env->make('layouts.adminSidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-md-8">

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>