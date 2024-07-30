<?php $__env->startSection('title', 'Modifier un Client'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Edit Client Form -->
            <section id="edit-client">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-center"><u>Fiche journalière</u></h4>
                                    <!-- Boutons de navigation -->
                                    
                                        <?php if($errors->any()): ?>
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(session('success')): ?>
                                            <div class="alert alert-success">
                                                <?php echo e(session('success')); ?>

                                            </div>
                                        <?php endif; ?>
                                    <form action="<?php echo e(route('commercial.update', $prospect)); ?>" method="POST">
                                        <?php echo csrf_field(); ?> <!-- Ajout du jeton CSRF -->
                                        <?php echo method_field('PUT'); ?>
                                        <div class="form-group">
                                            <label for="date">Date<span class="text-danger">*</span></label>
                                            <input class="form-control" id="date" name="date" type="date" value="<?php echo e($prospect->date); ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="commercial_id">Nom du commercial</label>
                                            <select name="commercial_id" id="commercial_id" class="form-control">
                                                <?php $__currentLoopData = $commercials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commercial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($commercial->id); ?>" <?php echo e($prospect->commercial_id == $commercial->id ? 'selected' : ''); ?>>
                                                        <?php echo e($commercial->full_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_rdv">Date du rendez-vous<span class="text-danger">*</span></label>
                                            <input class="form-control" id="date_rdv" name="date_rdv" type="date" value="<?php echo e($prospect->date_rdv); ?>" required>
                                        </div>
                                        <!-- Section Entreprise -->
                                        <div class="form-section" id="entreprise-section">
                                            <h5 class="text-center">Entreprises</h5>
                                            <div class="form-group">
                                                <label for="entreprise_nom">Entreprise/Société visitée</label>
                                                <input class="form-control" id="entreprise_nom" name="entreprise_nom" type="text" value="<?php echo e($prospect->entreprise_nom); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="entreprise_responsable">Nom/Titre du responsable contacté</label>
                                                <input class="form-control" id="entreprise_responsable" name="entreprise_responsable" type="text" value="<?php echo e($prospect->entreprise_responsable); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="entreprise_contact">Contact</label>
                                                <input class="form-control" id="entreprise_contact" name="entreprise_contact" type="text" value="<?php echo e($prospect->entreprise_contact); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="entreprise_heure">Heure du Rendez-vous</label>
                                                <input class="form-control" id="entreprise_heure" name="entreprise_heure" type="text" value="<?php echo e($prospect->entreprise_heure); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="rdv_heure">Heure du Rendez-vous</label>
                                                <input class="form-control" id="rdv_heure" name="rdv_heure" type="text" value="<?php echo e($prospect->rdv_heure); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="rubrique">Entretien:</label>
                                                <select id="rubrique" name="rubrique" class="form-control"  required>
                                                    <option value="" selected disabled>Choisissez</option>
                                                    <option value="Entreprise" <?php echo e($prospect->rubrique == "Entreprise" ? 'selected' : ''); ?>>Entreprise</option>
                                                    <option value="Rendez-vous" <?php echo e($prospect->rubrique == "Rendez-vous" ? 'selected' : ''); ?>>Rendez-vous</option>
                                                    <option value="Nettoyage" <?php echo e($prospect->rubrique == "Nettoyage" ? 'selected' : ''); ?>>Nettoyage</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Section Rendez-vous -->
                                        
                                        <!-- Section Nettoyage -->
                                        
                                        <div class="form-group">
                                            <label for="statut">Statut</label>
                                            <select class="form-control" id="statut" name="statut">
                                                <option value="pas_encore" <?php echo e($prospect->statut === 'pas_encore' ? 'selected' : ''); ?>>Pas encore</option>
                                                <option value="verifie" <?php echo e($prospect->statut === 'verifie' ? 'selected' : ''); ?>>Vérifié</option>
                                                <option value="pas_bon" <?php echo e($prospect->statut === 'pas_bon' ? 'selected' : ''); ?>>Pas bon</option>
                                                <option value="ok" <?php echo e($prospect->statut === 'ok' ? 'selected' : ''); ?>>Ok</option>
                                            </select>
                                        </div>
                                        <!-- Bouton de soumission -->
                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
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
        // Fonction pour basculer la visibilité des sections
        $(".btn-switch").click(function() {
            var target = $(this).data("target");
            $(".form-section").hide();
            $("#" + target + "-section").show();
        });
    });
</script>
<?php echo $__env->yieldContent('script'); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/commercial/edit.blade.php ENDPATH**/ ?>