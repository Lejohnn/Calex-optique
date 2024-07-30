

<?php $__env->startSection('title', 'Se Connecter'); ?>

<?php $__env->startSection('contenu'); ?>
    <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="row flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                    <div class="card-header border-0">
                                        <div class="card-title text-center">
                                            LOGIN
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form-horizontal" action="<?php echo e(route('auth.login')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php if(session('error')): ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo e(session('error')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo e(old('email')); ?>"  placeholder="Votre email" required>
                                                    <div class="form-control-position">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="password" class="form-control" id="user-password" name="password" id="password"  placeholder="Votre Mot De Passe" required>
                                                    <div class="form-control-position">
                                                        <i class="la la-key"></i>
                                                    </div>
                                                </fieldset>
                                                <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <!-- END: Content-->


        <!-- BEGIN: Vendor JS-->
        <script src="<?php echo e(asset('backend/vendors/js/vendors.min.js')); ?>"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="<?php echo e(asset('backend/vendors/js/forms/validation/jqBootstrapValidation.js')); ?>"></script>
        <script src="<?php echo e(asset('backend/vendors/js/forms/icheck/icheck.min.js')); ?>"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="<?php echo e(asset('backend/js/core/app-menu.js')); ?>"></script>
        <script src="<?php echo e(asset('backend/js/core/app.js')); ?>"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="<?php echo e(asset('backend/js/scripts/forms/form-login-register.js')); ?>"></script>
        <!-- END: Page JS-->

    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.connect', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/auth/login.blade.php ENDPATH**/ ?>