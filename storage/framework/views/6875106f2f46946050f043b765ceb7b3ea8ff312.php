<?php $__env->startSection('title', 'Afficher un Bon de Prise en Charge'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="show-bon">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Détails du Bon de Prise en Charge</h4>
                                    <div class="heading-elements">
                                        <a href="<?php echo e(route('bons.index')); ?>" class="btn btn-primary">
                                            <i class="la la-list font-small-2"></i> Voir les Bons
                                        </a>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nom du Client</th>
                                                <td><?php echo e($bon->nom_client); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date du Bon</th>
                                                <td><?php echo e($bon->date_bon); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Assurance</th>
                                                <td><?php echo e($bon->assurance); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Société</th>
                                                <td><?php echo e($bon->societe); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Téléphone</th>
                                                <td><?php echo e($bon->telephone); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Médecin</th>
                                                <td><?php echo e($bon->medecin); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Montant</th>
                                                <td><?php echo e($bon->montant); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Montant Dû</th>
                                                <td><?php echo e($bon->montant_du); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Reste</th>
                                                <td><?php echo e($bon->reste); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Statut</th>
                                                <td><?php echo e($bon->statut); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Raison</th>
                                                <td><?php echo e($bon->raison); ?></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/bons/show.blade.php ENDPATH**/ ?>