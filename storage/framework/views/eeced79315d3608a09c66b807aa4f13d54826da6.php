<?php $__env->startSection('title', 'Modifier un Bon de Prise en Charge'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="edit-bon">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modifier un Bon de Prise en Charge</h4>
                                    <div class="heading-elements">
                                        <a href="<?php echo e(route('bons.index')); ?>" class="btn btn-primary">
                                            <i class="la la-list font-small-2"></i> Voir les Bons
                                        </a>
                                    </div>
                                </div>
                                <?php if(Session::has('success')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(Session::get('success')); ?>

                                    </div>
                                <?php endif; ?>
                                <?php if(count($errors) > 0): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if(auth()->user()->role_id == 1 ): ?>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <form action="<?php echo e(route('bons.update', $bon->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="form-group">
                                                    <label for="nom_client">Nom du Client <span class="text-danger">*</span></label>
                                                    <input type="text" id="nom_client" name="nom_client" class="form-control" value="<?php echo e($bon->nom_client); ?>" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_bon">Date du Bon <span class="text-danger">*</span></label>
                                                    <input type="date" id="date_bon" name="date_bon" class="form-control" value="<?php echo e($bon->date_bon); ?>" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="assurance">Assurance <span class="text-danger">*</span></label>
                                                    <input type="text" id="assurance" name="assurance" class="form-control" value="<?php echo e($bon->assurance); ?>" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="societe">Société <span class="text-danger">*</span></label>
                                                    <input type="text" id="societe" name="societe" class="form-control" value="<?php echo e($bon->societe); ?>" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telephone">Téléphone <span class="text-danger">*</span></label>
                                                    <input type="text" id="telephone" name="telephone" class="form-control" value="<?php echo e($bon->telephone); ?>" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="medecin">Médecin</label>
                                                    <input type="text" id="medecin" name="medecin" class="form-control" value="<?php echo e($bon->medecin); ?>" readonly >
                                                </div>
                                                <div class="form-group">
                                                    <label for="montant_du">Montant Dû <span class="text-danger">*</span></label>
                                                    <input type="number" id="montant_du" name="montant_du" class="form-control" value="<?php echo e($bon->montant_du); ?>" readonly required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="montant">Montant</label>
                                                    <input type="number" id="montant" name="montant" class="form-control" value="<?php echo e($bon->montant); ?>" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="reste">Reste</label>
                                                    <input type="number" id="reste" name="reste" class="form-control" value="<?php echo e($bon->reste); ?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="statut">Statut <span class="text-danger">*</span></label>
                                                    <select id="statut" name="statut" class="form-control" required>
                                                        <option value="attente" <?php echo e($bon->statut == 'attente' ? 'selected' : ''); ?>>Attente</option>
                                                        <option value="accepte" <?php echo e($bon->statut == 'accepte' ? 'selected' : ''); ?>>Accepté</option>
                                                        <option value="rejete" <?php echo e($bon->statut == 'rejete' ? 'selected' : ''); ?>>Rejeté</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="raison">Raison</label>
                                                    <textarea id="raison" name="raison" class="form-control"><?php echo e($bon->raison); ?></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/bons/edit.blade.php ENDPATH**/ ?>