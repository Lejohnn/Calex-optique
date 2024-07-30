<?php $__env->startSection('title'); ?>
    Liste des Reçus
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
    <script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Tableau des Reçus -->
                <section id="recus">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Reçus</h4>
                                    
                                </div>
                                <div class="card-body collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nom du Client</th>
                                                        <th>Date de Réception</th>
                                                        <th>Montant dû</th>
                                                        <th>Montant</th>
                                                        <th>Reste</th>
                                                        <th>Statut</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $receipts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($receipt->id); ?></td>
                                                        <td><?php echo e($receipt->nom_client); ?></td>
                                                        <td><?php echo e(\Carbon\Carbon::parse($receipt->date_reception)->format('d/m/Y')); ?></td>
                                                        <td><?php echo e($receipt->montant_du); ?></td>
                                                        <td><?php echo e($receipt->montant); ?></td>
                                                        <td><?php echo e($receipt->reste); ?></td>
                                                        <td>
                                                            <?php if($receipt->reste == 0): ?>
                                                                <button class="btn btn-success btn-sm">Terminé</button>
                                                            <?php else: ?>
                                                                <button class="btn btn-warning btn-sm">Pas terminé</button>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo e(route('recus.show', $receipt->id)); ?>"><i class="ft-eye text-info"></i></a>
                                                            <?php if(auth()->user()->role_id == 1): ?>
                                                                <a href="<?php echo e(route('recus.edit', $receipt->id)); ?>"><i class="ft-edit text-success ml-1"></i></a>
                                                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($receipt->id); ?>"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                            <?php endif; ?>
                                                            <?php if(auth()->user()->role_id == 5 or auth()->user()->role_id == 1): ?>
                                                                <a href="<?php echo e(route('generate.receipt.pdf', $receipt->id)); ?>" class="btn btn-primary">
                                                                    <i class="feather icon-name text-color"></i>Reçu
                                                                </a>
                                                            <?php endif; ?>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteConfirmationModal<?php echo e($receipt->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($receipt->id); ?>" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($receipt->id); ?>">Confirmation de suppression</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Êtes-vous sûr de vouloir supprimer le reçu de <strong><?php echo e($receipt->nom_client); ?></strong> ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <form id="delete-form-<?php echo e($receipt->id); ?>" action="<?php echo e(route('recus.destroy', $receipt->id)); ?>" method="POST">
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
<script src="<?php echo e(asset('backend/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app.js')); ?>"></script>



<!-- Scripts -->


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/caisse/recu/index.blade.php ENDPATH**/ ?>