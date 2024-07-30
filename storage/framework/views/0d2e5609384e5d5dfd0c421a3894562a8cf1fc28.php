<?php $__env->startSection('title', 'Liste des Commerciaux'); ?>

<?php $__env->startSection('contenu'); ?>
<script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Liste des Commerciaux</h3>
            </div>
        </div>
        <div class="content-body">
            <section id="commercials-list">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Liste des Commerciaux</h2>
                                <div class="heading-elements">
                                    <a href="<?php echo e(route('agent.create')); ?>" class="btn btn-primary">
                                        <i class="la la-plus font-small-2"></i> Ajouter un Commercial
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered commercials-list datatable">
                                        <thead>
                                            <tr>
                                                <th>Nom Complet</th>
                                                <th>Date de Début</th>
                                                <th>Points</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $commercials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commercial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($commercial->full_name); ?></td>
                                                <td><?php echo e($commercial->start_date); ?></td>
                                                <td><?php echo e($commercial->points); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('agent.show', $commercial->id)); ?>"><i class="ft-eye text-info"></i></a>
                                                    <a href="<?php echo e(route('agent.edit', $commercial->id)); ?>"><i class="ft-edit text-success ml-1"></i></a>
                                                    <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($commercial->id); ?>"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteConfirmationModal<?php echo e($commercial->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($commercial->id); ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($commercial->id); ?>">Confirmation de suppression</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Êtes-vous sûr de vouloir supprimer le commercial <strong><?php echo e($commercial->full_name); ?></strong> ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                    <form id="delete-form-<?php echo e($commercial->id); ?>" action="<?php echo e(route('agent.destroy', $commercial->id)); ?>" method="POST">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/commercial/agent/index.blade.php ENDPATH**/ ?>