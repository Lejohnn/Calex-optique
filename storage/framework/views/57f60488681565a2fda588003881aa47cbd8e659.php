<?php $__env->startSection('title', 'Détails de la Facture'); ?>

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
                                <h3 class="card-title">Détails de la Facture <strong><?php echo e($facture->id); ?></strong></h3>
                                <div class="heading-elements">
                                    <a href="<?php echo e(route('caisse.facture')); ?>" class="btn btn-dark btn-sm">
                                        <i class="fas fa-edit"></i> Générer une facture
                                    </a>
                                    <a href="<?php echo e(route('caisse.views')); ?>" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-arrow-left"></i> Retour à la liste des factures
                                    </a>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <fieldset class="col-md-6">
                                            <div class="facture-detail">
                                                <h4 class="mb-3">Informations générales:</h4>
                                                <ul>
                                                    <li><strong>Nom du Client:</strong> <?php echo e($facture->client->nom); ?></li>
                                                    <li><strong>Date de la Facture:</strong> <?php echo e($facture->date_facture); ?></li>
                                                    <li><strong>Société:</strong> <?php echo e($facture->societe); ?></li>
                                                    <li><strong>Téléphone:</strong> <?php echo e($facture->telephone); ?></li>
                                                    <li><strong>Médecin:</strong> <?php echo e($facture->medecin); ?></li>
                                                    <li><strong>Montant Total HT:</strong> <?php echo e($facture->montant_total_ht); ?></li>
                                                </ul>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="row">
                                        <fieldset class="col-md-12">
                                            <div class="facture-detail">
                                                <h4 class="mb-3">Produits:</h4>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Produit</th>
                                                            <th>Quantité</th>
                                                            <th>Prix unitaire</th>
                                                            <th>Réduction (%)</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $produits['noms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $nom_produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($nom_produit); ?></td>
                                                            <td><?php echo e($produits['quantites'][$key]); ?></td>
                                                            <td><?php echo e($produits['prix_unitaires'][$key]); ?></td>
                                                            <td><?php echo e($produits['reductions'][$key] === null ? 0 : $produits['reductions'][$key]); ?></td>
                                                            <td><?php echo e((($produits['quantites'][$key] * $produits['prix_unitaires'][$key]) - ($produits['quantites'][$key] * $produits['prix_unitaires'][$key] * ($produits['reductions'][$key] / 100)))); ?></td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="row">
                                        <fieldset class="col-md-12">
                                            <div class="facture-detail">
                                                <h4 class="mb-3">Détails de l'ordonnance:</h4>
                                                <ul>
                                                    <li><strong>Avance :</strong><?php echo e($facture->avance); ?> FCFA</li>
                                                    <li><strong>Reste :</strong> <?php echo e($facture->reste); ?> FCFA</li>

                                                </ul>
                                                <ul>
                                                    <li><strong>Sphère OD:</strong> <?php echo e($facture->sphere_od); ?></li>
                                                    <li><strong>Sphère OG:</strong> <?php echo e($facture->sphere_og); ?></li>
                                                    <li><strong>Cylindre OD:</strong> <?php echo e($facture->cylindre_od); ?></li>
                                                    <li><strong>Cylindre OG:</strong> <?php echo e($facture->cylindre_og); ?></li>
                                                    <li><strong>Axe OD:</strong> <?php echo e($facture->axe_od); ?></li>
                                                    <li><strong>Axe OG:</strong> <?php echo e($facture->axe_og); ?></li>
                                                    <li><strong>Add OD:</strong> <?php echo e($facture->add_od); ?></li>
                                                    <li><strong>Add OG:</strong> <?php echo e($facture->add_og); ?></li>
                                                </ul>
                                            </div>
                                        </fieldset>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/caisse/detail.blade.php ENDPATH**/ ?>