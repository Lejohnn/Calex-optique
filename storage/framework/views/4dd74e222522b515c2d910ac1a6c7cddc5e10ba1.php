<?php $__env->startSection('title', 'Détails du Client'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Détails du Client</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('clients.index')); ?>">Accueil</a></li>
                            <li class="breadcrumb-item active">Détails du Client</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <section id="client-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title"><?php echo e($client->nom); ?> <?php echo e($client->prenom); ?></h2>
                                <div class="heading-elements">
                                    <a href="<?php echo e(route('clients.edit', $client->id)); ?>" class="btn btn-primary">
                                        <i class="ft-edit"></i> Modifier
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p><strong>Email:</strong> <?php echo e($client->email); ?></p>
                                <p><strong>Téléphone:</strong> <?php echo e($client->telephone); ?></p>
                                <p><strong>Adresse:</strong> <?php echo e($client->adresse); ?></p>
                                <h4 class="mt-2">Interactions de Service Call</h4>
                                <a href="<?php echo e(route('call.entreprise.index', $client->id)); ?>" class="btn btn-secondary btn-sm">Voir toutes les Interactions</a>
                                <?php if($client->serviceCallInteractions->isEmpty()): ?>
                                    <p class="mt-2">Aucune interaction trouvée.</p>
                                <?php else: ?>
                                    <table class="table table-striped table-bordered mt-2">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Détails</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $client->serviceCallInteractions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($interaction->type); ?></td>
                                                <td><?php echo e($interaction->details); ?></td>
                                                
                                                <td><?php echo e(date('d/m/Y', strtotime($interaction->interaction_date))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('call.entreprise.edit', [$client->id, $interaction->id])); ?>" ><i class="ft-edit text-success"></i></a>
                                                    <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($interaction->id); ?>"><i class="ft-trash-2 ml-1 text-warning"></i></a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteConfirmationModal<?php echo e($interaction->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($interaction->id); ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($interaction->id); ?>">Confirmation de suppression</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Êtes-vous sûr de vouloir supprimer cette interaction?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                    <form action="<?php echo e(route('call.entreprise.destroy', [$client->id, $interaction->id])); ?>" method="POST">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/call/entreprise/show.blade.php ENDPATH**/ ?>