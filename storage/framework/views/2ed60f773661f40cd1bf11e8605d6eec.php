<?php $__env->startSection('title', 'Đăng nhập'); ?>
<?php $__env->startSection('content'); ?>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
                        role="tab" aria-controls="tab-item-login" aria-selected="true">Login</a>
                </li>
            </ul>
            <div class="tab-content pt-2" id="login_register_tab_content">
                <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                    <div class="login-form">
                        <form method="POST" action="<?php echo e(route('customer.dologin')); ?>" name="login-form" class="needs-validation"
                            novalidate="">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('POST'); ?>
                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray " name="email" value=""
                                    autocomplete="email" autofocus="" type="text">
                                <label for="email">Email address *</label>
                                <?php if($errors->any()): ?>
                                    <span class="error-message"> *
                                        <?php echo e($errors->first('email')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input id="password" type="password" class="form-control form-control_gray "
                                    name="password" autocomplete="current-password">
                                <label for="customerPasswodInput">Password *</label>
                                <?php if($errors->any()): ?>
                                <span class="error-message"> *
                                    <?php echo e($errors->first('password')); ?>

                                </span>
                            <?php endif; ?>
                            </div>

                            <button class="btn btn-primary w-100 text-uppercase" type="submit">Log In</button>

                            <div class="customer-option mt-4 text-center">
                                <span class="text-secondary">No account yet?</span>
                                <a href="<?php echo e(route('customer.register')); ?>" class="btn-text js-show-register">Create Account</a> |
                                <a href="<?php echo e(route('customer.forgot')); ?>" class="btn-text js-show-register">Forgot Password</a> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon2\www\dat\TuneNest_DATN\resources\views/user/login.blade.php ENDPATH**/ ?>