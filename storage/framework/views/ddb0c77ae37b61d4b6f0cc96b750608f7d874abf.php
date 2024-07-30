<?php $__env->startSection('title', 'Détails du client'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Client Details -->
            <section id="client-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                <h3 class="card-title">Détails du client <strong><?php echo e($client->nom); ?></strong></h3>

                                <div class="heading-elements">
                                    <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 3): ?>
                                    <a href="<?php echo e(route('clients.edit', $client->id)); ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('clients.index')); ?>" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-arrow-left"></i> Retour à la liste des clients
                                    </a>
                                    <!-- Bouton pour générer le PDF -->
                                    
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">

                                        <fieldset class="col-md-6">
                                            <div class="client-detail">
                                                <h4 class="mb-3">Informations générales:</h4>
                                                <ul>
                                                    <li><strong>Nom:</strong> <?php echo e($client->nom); ?></li>
                                                    <li><strong>Prénom:</strong> <?php echo e($client->prenom); ?></li>
                                                    <li><strong>N° de téléphone:</strong> <?php echo e($client->telephone); ?></li>
                                                    <li><strong>N° de carte Nationale d’identité:</strong> <?php echo e($client->carte_identite); ?></li>
                                                    <li><strong>Date de naissance:</strong> <?php echo e($client->date_naissance); ?></li>
                                                    <li><strong>Lieu de naissance:</strong> <?php echo e($client->lieu_naissance); ?></li>
                                                    <li><strong>Profession:</strong> <?php echo e($client->profession); ?></li>
                                                    <li><strong>Sexe:</strong> <?php echo e($client->sexe); ?></li>
                                                    <li><strong>Société d’attache:</strong> <?php echo e($client->societe_attache); ?></li>
                                                    <li><strong>Assurance:</strong> <?php echo e($client->assurance); ?></li>
                                                    <li><strong>Canal:</strong> <?php echo e($client->canal); ?></li>
                                                    <li><strong>Date d'arrivée à Calex:</strong> <?php echo e($client->created_at); ?></li>
                                                    <li><strong>Date du dernier passage:</strong> <?php echo e($client->updated_at); ?></li>
                                                </ul>
                                            </div>
                                        </fieldset>
                                    <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 3): ?>
                                        <fieldset class="col-md-6">
                                            <div class="client-detail">
                                                <h4 class="mb-3">Informations supplémentaires:</h4>
                                                <ul>
                                                    <li><strong>Discipline(s) pratiquée(s):</strong> <?php echo e($client->disciplines_pratiquees); ?></li>
                                                    <li><strong>Date de début:</strong> <?php echo e($client->date_debut); ?></li>
                                                    <li><strong>Activité interpelant la vision:</strong> <?php echo e($client->activite_interpelant_vision); ?></li>
                                                    <li><strong>Antécédents familiaux:</strong> <?php echo e($client->antecedents_familiaux); ?></li>
                                                    <li><strong>Antécédents chirurgicaux (avec date) y compris ORL, ophtalmo:</strong> <?php echo e($client->antecedents_chirurgicaux); ?></li>
                                                    <li><strong>Traitements en cours:</strong> <?php echo e($client->traitements_en_cours); ?></li>
                                                    <li><strong>Allergies:</strong> <?php echo e($client->allergies); ?></li>
                                                    <li><strong>Mentions générales:</strong> <?php echo e($client->mentions_generales); ?></li>
                                                    <li><strong>Portez-vous des lunettes ?</strong> <?php echo e($client->portez_vous_des_lunettes ? 'Oui' : 'Non'); ?></li>
                                                    <li><strong>Avez-vous besoin de changer de lunettes ?</strong> <?php echo e($client->besoin_changer_lunettes ? 'Oui' : 'Non'); ?></li>
                                                    <li><strong>Autre chose à mentionner au besoin:</strong> <?php echo e($client->autre_choses); ?></li>
                                                    <li><strong>Diagnostic:</strong> <?php echo e($client->diagnostic); ?></li>
                                                    <li><strong>Prescription:</strong> <?php echo e($client->prescription); ?></li>
                                                    <li><strong>Examen particulier:</strong> <?php echo e($client->examen_particulier); ?></li>
                                                    <li><strong>Rendez-vous:</strong> <?php echo e($client->rendez_vous); ?></li>
                                                </ul>
                                            </div>
                                        </fieldset>
                                    <?php endif; ?>
                                        <p><strong>Choix du service:</strong> <?php echo e($client->choix_service); ?></p>
                                        

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/clients/show.blade.php ENDPATH**/ ?>