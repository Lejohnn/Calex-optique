<?php $__env->startSection('title', 'Afficher la Marque'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="show-brand">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Détails de la Marque</h4>
                                    <div class="heading-elements">
                                        <a href="<?php echo e(route('brands.index')); ?>" class="btn btn-primary">
                                            <i class="la la-list font-small-2"></i> Voir les Marques
                                        </a>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nom</th>
                                                <td><?php echo e($brand->name); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date de création</th>
                                                <td><?php echo e($brand->created_at->format('d/m/Y')); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date de mise à jour</th>
                                                <td><?php echo e($brand->updated_at->format('d/m/Y')); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script src="<?php echo e(asset('backend/vendors/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app.js')); ?>"></script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/caisse/brands/show.blade.php ENDPATH**/ ?>