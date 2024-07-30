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
                                                    <?php $__currentLoopData = $receipts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($facture->id); ?></td>
                                                        <td><?php echo e($facture->client_name); ?></td>
                                                        <td><?php echo e(\Carbon\Carbon::parse($facture->date_facture)->format('d/m/Y')); ?></td>
                                                        <td><?php echo e($facture->montant_du); ?></td>
                                                        <td><?php echo e($facture->montant); ?></td>
                                                        <td><?php echo e($facture->reste); ?></td>
                                                        <td>
                                                            <?php if($facture->reste == 0): ?>
                                                                <button class="btn btn-success btn-sm">Terminé</button>
                                                            <?php else: ?>
                                                                <button class="btn btn-warning btn-sm">Pas terminé</button>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo e(route('client.detailFacture', $facture->id)); ?>"><i class="ft-eye text-info"></i></a>
                                                            <?php if(auth()->user()->role_id == 3): ?>
                                                                <a href="#"><i class="ft-edit text-success ml-1"></i></a>
                                                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($facture->id); ?>"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                            <?php endif; ?>
                                                            <a href="<?php echo e(route('generate.receipt.pdf', $facture->id)); ?>" class="btn btn-primary">
                                                                <i class="feather icon-printer"></i> Reçu
                                                            </a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteConfirmationModal<?php echo e($facture->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($facture->id); ?>" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($facture->id); ?>">Confirmation de suppression</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Êtes-vous sûr de vouloir supprimer le reçu de <strong><?php echo e($facture->client_name); ?></strong> ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <form id="delete-form-<?php echo e($facture->id); ?>" action="#" method="POST">
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

<!-- Scripts -->
<script src="<?php echo e(asset('backend/vendors/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app.js')); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/clients/recu.blade.php ENDPATH**/ ?>