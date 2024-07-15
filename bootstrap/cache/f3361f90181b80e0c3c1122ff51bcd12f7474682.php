<?php $__env->startSection('title','Create Category'); ?>

<?php $__env->startSection('content'); ?>
            <div class="container-fluid">
                <h1 class="text-center my-5">Create Category</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div>
                            <?php echo $__env->make('layouts.adminSidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex justify-content-center">
                            <div class="col-7">
                                <form method="POST" enctype="multipart/form-data">
                                    <?php if(\App\classes\Session::has('error')): ?>
                                        <?php echo e(\App\classes\Session::flashMessage('error')); ?>

                                    <?php endif; ?>
                                    <?php if(\App\classes\Session::has('success')): ?>
                                        <?php echo e(\App\classes\Session::flashMessage('success')); ?>

                                    <?php endif; ?>
                                    <?php echo $__env->make('layouts.reportMessages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <input type="text" name="name" class="form-control" id="category">
                                    </div>
                                    <input type="hidden" name="token" value="<?php echo e(\App\classes\CSRFToken::__token()); ?>">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                        <a href="/admin" class="btn btn-warning">Cancel</a>
                                    </div>
                                </form>
                                <ul class="list-group mt-4">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item">
                                            <a href="#"><?php echo e($category->name); ?></a>
                                        <span class="float-right">
                                            <a href="/admin/category/<?php echo e($category->id); ?>/update">
                                                <i class="fa fa-edit text-warning">Edit</i>
                                            </a>
                                            <a href="/admin/category/<?php echo e($category->id); ?>/delete">
                                                <i class="fa fa-trash text-danger">Delete</i>
                                            </a>
                                        </span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>