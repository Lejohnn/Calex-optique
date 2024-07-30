<?php $__env->startSection('title', 'Modifier une Interaction de Service Call'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Modifier une Interaction de Service Call pour <?php echo e($client->nom); ?> <?php echo e($client->prenom); ?></h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('clients.index')); ?>">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('clients.index')); ?>">Clients</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('call.entreprise.index', $client->id)); ?>">Interactions de Service Call</a></li>
                            <li class="breadcrumb-item active">Modifier une Interaction</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="edit-service-call-interaction">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Modifier Interaction</h2>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo e(route('call.entreprise.update', [$client->id, $interaction->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="form-group">
                                        <label for="type">Type d'Interaction</label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="">Sélectionnez un type</option>
                                            <option value="relance_confirmation_rdv" <?php echo e($interaction->type == 'relance_confirmation_rdv' ? 'selected' : ''); ?>>Relance Confirmation RDV</option>
                                            <option value="annonce_confirmation_rdv" <?php echo e($interaction->type == 'annonce_confirmation_rdv' ? 'selected' : ''); ?>>Annonce Confirmation RDV</option>
                                            <option value="relance_satisfaction" <?php echo e($interaction->type == 'relance_satisfaction' ? 'selected' : ''); ?>>Relance Satisfaction</option>
                                            <option value="relance_proposition_reduction" <?php echo e($interaction->type == 'relance_proposition_reduction' ? 'selected' : ''); ?>>Relance Proposition Réduction</option>
                                            <option value="relance_info_lunettes_disponibles" <?php echo e($interaction->type == 'relance_info_lunettes_disponibles' ? 'selected' : ''); ?>>Relance Info Lunettes Disponibles</option>
                                            <option value="renseignements_retrait" <?php echo e($interaction->type == 'renseignements_retrait' ? 'selected' : ''); ?>>Renseignements Retrait</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Détails</label>
                                        <textarea name="details" id="details" class="form-control" rows="3"><?php echo e($interaction->details); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="interaction_date">Date de l'Interaction</label>
                                        <input type="date" name="interaction_date" id="interaction_date" class="form-control" value="<?php echo e(date('Y-m-d', strtotime($interaction->interaction_date))); ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                </form>
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
        $('.datatable').DataTable();
    });
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/call/entreprise/edit.blade.php ENDPATH**/ ?>