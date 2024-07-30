<?php $__env->startSection('title', 'Détails du prospect'); ?>

<?php $__env->startSection('contenu'); ?>
<script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Détails du Prospect -->
            <section id="prospect-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Détails du prospect <strong><?php echo e($prospect->commercial_name); ?></strong></h3>
                                <div class="heading-elements">
                                    <a href="<?php echo e(route('commercial.index')); ?>" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-arrow-left"></i> Retour à la liste des prospects
                                    </a>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <fieldset class="col-md-6">
                                            <div class="prospect-detail">
                                                <h4 class="mb-3">Informations générales:</h4>
                                                <ul>
                                                    <li><strong>Nom du Commercial:</strong> <?php echo e($prospect->commercial_name); ?></li>
                                                    <li><strong>Date:</strong> <?php echo e($prospect->date); ?></li>
                                                    <li><strong>Entreprise/Société:</strong> <?php echo e($prospect->entreprise_nom); ?></li>
                                                    <li><strong>Date du Rendez-vous:</strong> <?php echo e($prospect->date_rdv); ?></li>
                                                    <li><strong>Heure du Rendez-vous:</strong> <?php echo e($prospect->rdv_heure); ?></li>
                                                    <li><strong>Heure du Rendez-vous:</strong> <?php echo e($prospect->rubrique); ?></li>
                                                    <li><strong>Nom/Responsable:</strong> <?php echo e($prospect->entreprise_responsable); ?></li>
                                                    <li><strong>Contact:</strong> <?php echo e($prospect->entreprise_contact); ?></li>
                                                    <li><strong>Heure denregistrement:</strong> <?php echo e($prospect->entreprise_heure); ?></li>
                                                    
                                                    
                                                    <li><strong>Statut:</strong> <?php echo e($prospect->statut); ?></li>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/commercial/show.blade.php ENDPATH**/ ?>