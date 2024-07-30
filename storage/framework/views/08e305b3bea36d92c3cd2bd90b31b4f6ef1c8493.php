<?php $__env->startSection('title', 'Détails du Reçu'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Détails de la Facture -->
            <section id="facture-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Détails du Reçu </h3>
                                <div class="card-body collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable">
                                                <tr>
                                                    <th>Nom du Client</th>
                                                    <td><?php echo e($receipt->nom_client); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Date de Réception</th>
                                                    <td><?php echo e(\Carbon\Carbon::parse($receipt->date_reception)->format('d/m/Y')); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Montant dû</th>
                                                    <td><?php echo e($receipt->montant_du); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Montant</th>
                                                    <td><?php echo e($receipt->montant); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Reste</th>
                                                    <td><?php echo e($receipt->reste); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php if(auth()->user()->role_id == 1): ?>
                                    <a href="<?php echo e(route('recus.edit', $receipt->id)); ?>" class="btn btn-warning">Modifier</a>
                                    <form action="<?php echo e(route('recus.destroy', $receipt->id)); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce reçu ?')">Supprimer</button>
                                    </form>
                                <?php endif; ?>
                                <a href="<?php echo e(route('caisse.recu.index')); ?>" class="btn btn-secondary">Retour à la liste</a>
                            </div>
<?php $__env->stopSection(); ?>


<!-- Scripts -->
<script src="<?php echo e(asset('backend/vendors/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/scripts/pages/hospital-patients-list.js')); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/caisse/recu/show.blade.php ENDPATH**/ ?>