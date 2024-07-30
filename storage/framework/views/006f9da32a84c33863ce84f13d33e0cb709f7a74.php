<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <h1 class="mb-4 text-center">Statistiques des Montures</h1>
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card card-hover text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Total Montures en Stock</h5>
                            <p class="card-text display-4"><?php echo e($totalFrames); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card card-hover text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Montures Activées</h5>
                            <p class="card-text display-4"><?php echo e($activeFrames); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card card-hover text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Montures Désactivées</h5>
                            <p class="card-text display-4"><?php echo e($inactiveFrames); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card card-hover text-white bg-danger">
                        <div class="card-body">
                            <h5 class="card-title">Désactivées Aujourd'hui</h5>
                            <p class="card-text display-4"><?php echo e($inactiveFramesToday); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<style>
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-hover:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
</style>

<script src="<?php echo e(asset('backend/vendors/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app.js')); ?>"></script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/caisse/frames/stats.blade.php ENDPATH**/ ?>