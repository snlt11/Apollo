<?php $__env->startSection('title',"User Register"); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <h1 class="my-4 text-center">User Register</h1>
            <?php if(\App\classes\Session::has('error')): ?>
                <?php echo e(\App\classes\Session::flashMessage('error')); ?>

            <?php endif; ?>
            <?php if(\App\classes\Session::has('success')): ?>
                <?php echo e(\App\classes\Session::flashMessage('success')); ?>

            <?php endif; ?>
            <form method="post" action="/user/register">
                <input type="hidden" name="token" value="<?php echo e(\App\classes\CSRFToken::__token()); ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <br><br>
                <p>
                    Already member?
                    <a href="/user/login">Login</a>
                </p>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>