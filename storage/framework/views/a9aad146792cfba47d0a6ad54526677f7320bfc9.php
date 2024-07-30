<?php $__env->startSection('title', 'Liste des Commandes de Lunettes'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="orders-list">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Commandes de Lunettes</h4>
                                    <div class="heading-elements">
                                        <a href="<?php echo e(route('orders.create')); ?>" class="btn btn-primary">
                                            <i class="la la-plus font-small-2"></i> Ajouter une Commande
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
                                                    <th>Date de Commande</th>
                                                    <th>Verres Réceptionnés</th>
                                                    <th>Lunettes Montées</th>
                                                    <th>Commande Annulée</th>
                                                    <th>Date d'Arrivée des Verres</th>
                                                    <th>Statut</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($order->id); ?></td>
                                                        <td><strong><?php echo e($order->client_name); ?></strong></td>
                                                        <td><?php echo e($order->order_date); ?></td>
                                                        <td>
                                                            <?php if($order->glasses_received): ?>
                                                                <span class="badge badge-success">Oui</span>
                                                            <?php else: ?>
                                                                <span class="badge badge-danger">Non</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($order->glasses_assembled): ?>
                                                                <span class="badge badge-success">Oui</span>
                                                            <?php else: ?>
                                                                <span class="badge badge-danger">Non</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($order->order_cancelled): ?>
                                                                <span class="badge badge-danger">Annulée</span>
                                                            <?php else: ?>
                                                                <span class="badge badge-success">Active</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($order->glasses_arrival_date ? $order->glasses_arrival_date : 'N/A'); ?></td>
                                                        <td>
                                                            <?php
                                                                $today = \Carbon\Carbon::now();
                                                                $arrivalDate = $order->glasses_arrival_date;
                                                                $diffInWeeks = $arrivalDate ? $today->diffInWeeks($arrivalDate) : null;
                                                            ?>
                                                            <?php if($arrivalDate && $diffInWeeks <= 4): ?>
                                                                <span class="badge badge-info">En Attente</span>
                                                            <?php elseif($arrivalDate && $diffInWeeks > 4): ?>
                                                                <span class="badge badge-warning">Relance Nécessaire</span>
                                                            <?php else: ?>
                                                                <span class="badge badge-secondary">Non Déterminé</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo e(route('orders.show', $order->id)); ?>" class=""><i class="ft-eye text-info"></i></a>
                                                            <a href="<?php echo e(route('orders.edit', $order->id)); ?>" class=""><i class="ft-edit text-success ml-1"></i></a>
                                                            <a href="#" class="" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($order->id); ?>"><i class="ft-trash-2 ml-1 text-warning"></i></a>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteConfirmationModal<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($order->id); ?>" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($order->id); ?>">Confirmation de Suppression</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Êtes-vous sûr de vouloir supprimer la commande de lunettes pour <strong><?php echo e($order->client_name); ?></strong> ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <form id="delete-form-<?php echo e($order->id); ?>" action="<?php echo e(route('orders.destroy', $order->id)); ?>" method="POST">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/orders/index.blade.php ENDPATH**/ ?>