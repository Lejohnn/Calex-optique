<?php $__env->startSection('title', 'Liste des Marques'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="brands-list">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Marques</h4>
                                    <div class="heading-elements">
                                        <a href="<?php echo e(route('brands.create')); ?>" class="btn btn-primary">
                                            <i class="la la-plus font-small-2"></i> Ajouter une Marque
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
                                                    <th>Nom</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($brand->id); ?></td>
                                                        <td><?php echo e($brand->name); ?></td>
                                                        <td>
                                                            <a href="<?php echo e(route('brands.show', $brand->id)); ?>"><i class="ft-eye text-info"></i></a>
                                                            <?php if(auth()->user()->role_id == 1 ): ?>

                                                                <a href="<?php echo e(route('brands.edit', $brand->id)); ?>"><i class="ft-edit text-success ml-1"></i></a>
                                                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($brand->id); ?>">
                                                                    <i class="ft-trash-2 ml-1 text-warning"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteConfirmationModal<?php echo e($brand->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($brand->id); ?>" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($brand->id); ?>">Confirmation de suppression</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Êtes-vous sûr de vouloir supprimer la marque <strong><?php echo e($brand->name); ?></strong> ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <form id="delete-form-<?php echo e($brand->id); ?>" action="<?php echo e(route('brands.destroy', $brand->id)); ?>" method="POST">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/caisse/brands/index.blade.php ENDPATH**/ ?>