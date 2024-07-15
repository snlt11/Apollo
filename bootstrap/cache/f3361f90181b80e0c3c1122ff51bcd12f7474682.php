<?php $__env->startSection('title','Create Category'); ?>

<?php $__env->startSection('content'); ?>
            <style>
                .pagination > li{
                    padding: 5px 10px;
                    background :#ddd;
                    margin-right : 1px;
                }
            </style>
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
                                            <a href="">
                                                <i class="fa fa-edit text-warning" onclick="edit('<?php echo e($category->name); ?>','<?php echo e($category->id); ?>')">Edit</i>
                                            </a>
                                            <a href="/admin/category/<?php echo e($category->id); ?>/delete">
                                                <i class="fa fa-trash text-danger">Delete</i>
                                            </a>
                                        </span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <div class="mt-5">
                                    <?php echo $pages; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" tabindex="-1" id="categoryUpdateModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

<?php $__env->stopSection(); ?>

<script>
    function edit(name,id){
        alert(`Name is : ${name}  id : ${id}`);
    }
</script>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>