<?php $__env->startSection('title', 'Liste des Bons de Prise en Charge'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="bons-list">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Bons de Prise en Charge</h4>
                                    <div class="heading-elements">
                                        <a href="<?php echo e(route('bons.create')); ?>" class="btn btn-primary">
                                            <i class="la la-plus font-small-2"></i> Ajouter un Bon
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
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nom du Client</th>
                                                    <th>Statut</th>
                                                    <th>Date du Bon</th>
                                                    <th>Assurance</th>
                                                    <th>Société</th>
                                                    <th>Téléphone</th>
                                                    <th>Médecin</th>
                                                    <th>Montant</th>
                                                    <th>Montant Dû</th>
                                                    <th>Reste</th>
                                                    <th>Raison</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $bons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($bon->id); ?></td>
                                                        <td> <strong><?php echo e($bon->nom_client); ?></strong></td>
                                                        <td>
                                                            <?php if($bon->statut == 'attente'): ?>
                                                                <span class="badge badge-warning">Attente</span>
                                                            <?php elseif($bon->statut == 'accepte'): ?>
                                                                <span class="badge badge-success">Accepté</span>
                                                            <?php elseif($bon->statut == 'rejete'): ?>
                                                                <span class="badge badge-danger">Rejeté</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($bon->date_bon); ?></td>
                                                        <td><strong><?php echo e($bon->assurance); ?></strong></td>
                                                        <td><strong><?php echo e($bon->societe); ?></strong></td>
                                                        <td><?php echo e($bon->telephone); ?></td>
                                                        <td><?php echo e($bon->medecin); ?></td>
                                                        <td><?php echo e($bon->montant); ?></td>
                                                        <td><?php echo e($bon->montant_du); ?></td>
                                                        <td><?php echo e($bon->reste); ?></td>
                                                        <td><?php echo e($bon->raison); ?></td>
                                                        <td>
                                                            <a href="<?php echo e(route('bons.show', $bon->id)); ?>"><i class="ft-eye text-info"></i></a>
                                                            <?php if(auth()->user()->role_id == 1): ?>
                                                                <a href="<?php echo e(route('bons.edit', $bon->id)); ?>"><i class="ft-edit text-success ml-1"></i></a>
                                                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($bon->id); ?>">
                                                                    <i class="ft-trash-2 ml-1 text-warning"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteConfirmationModal<?php echo e($bon->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($bon->id); ?>" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($bon->id); ?>">Confirmation de suppression</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Êtes-vous sûr de vouloir supprimer le bon de prise en charge de <strong><?php echo e($bon->nom_client); ?></strong> ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <form id="delete-form-<?php echo e($bon->id); ?>" action="<?php echo e(route('bons.destroy', $bon->id)); ?>" method="POST">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('DELETE'); ?>
                                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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

<script src="<?php echo e(asset('backend/vendors/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/bons/index.blade.php ENDPATH**/ ?>