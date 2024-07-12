<?php $__env->startSection('title','Create Category'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid my-5">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-5">
                    <form method="POST" enctype="multipart/form-data">
                        <h1 class="text-center">Create Category</h1>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" name="categoryName" class="form-control" id="category">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" name="file" type="file" id="formFile">
                        </div>
                        <input type="hidden" name="csrf_token" value="<?php echo e(\App\classes\CSRFToken::__token()); ?>">
                        <div class="">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/admin" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>