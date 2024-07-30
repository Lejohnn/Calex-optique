<?php $__env->startSection('title'); ?>
    Liste Facture
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
    <script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Tableau des Factures -->
                <section id="factures">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Factures</h4>
                                    <div class="heading-elements">
                                        <a href="<?php echo e(route('caisse.facture')); ?>" class="btn btn-dark btn-sm">
                                            <i class="fas fa-edit"></i> Nouvelle Facture
                                        </a>
                                        <a href="<?php echo e(route('caisse.recu.index')); ?>" class="btn btn-info btn-sm">
                                            <i class="fas fa-receipt"></i> Voir les Reçus
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered patients-list datatable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nom Client</th>
                                                        <th>Date Facture</th>
                                                        <th>Société</th>
                                                        <th>Téléphone</th>
                                                        <th>Médecin</th>
                                                        <th>Montant Total HT</th>
                                                        <th>Avance</th>
                                                        <th>Reste</th>
                                                        <th>Actions</th> <!-- Ajout de cette colonne pour les actions -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $factures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($facture->id); ?></td>
                                                        <td><?php echo e($facture->client->nom); ?></td>
                                                        <td><?php echo e($facture->date_facture); ?></td>
                                                        <td><?php echo e($facture->societe); ?></td>
                                                        <td><?php echo e($facture->telephone); ?></td>
                                                        <td><?php echo e($facture->medecin); ?></td>
                                                        <td><?php echo e($facture->montant_total_ht); ?> FCFA</td>
                                                        <td><?php echo e($facture->avance); ?> FCFA</td>
                                                        <td><?php echo e($facture->reste); ?> FCFA</td>
                                                        <td>
                                                            <a href="<?php echo e(route('factures.details', $facture->id)); ?>" class="btn btn-primary">Détails</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
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

<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset('backend/vendors/js/vendors.min.js')); ?>"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset('backend/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app.js')); ?>"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo e(asset('backend/js/scripts/pages/hospital-patients-list.js')); ?>"></script>
<!-- END: Page JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Vérifiez si DataTable est déjà initialisé
        if (!$.fn.DataTable.isDataTable('.datatable')) {
            $('.datatable').DataTable({
                "order": [[ 2, "desc" ]] // Indice de la colonne Date Facture (2) et ordre décroissant (desc)
            });
        }
    });
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/caisse/views.blade.php ENDPATH**/ ?>