<?php $__env->startSection('title', 'Détails de la Commande'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="order-show">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Détails de la Commande</h4>
                                    <div class="heading-elements">
                                        <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-secondary">Retour à la Liste</a>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item"><strong>Nom du Client:</strong> <?php echo e($order->client_name); ?></li>
                                            <li class="list-group-item"><strong>Date de Commande:</strong> <?php echo e($order->order_date); ?></li>
                                            <li class="list-group-item"><strong>Verres Réceptionnés:</strong> <?php echo e($order->glasses_received ? 'Oui' : 'Non'); ?></li>
                                            <li class="list-group-item"><strong>Lunettes Montées:</strong> <?php echo e($order->glasses_assembled ? 'Oui' : 'Non'); ?></li>
                                            <li class="list-group-item"><strong>Commande Annulée:</strong> <?php echo e($order->order_cancelled ? 'Oui' : 'Non'); ?></li>
                                            <li class="list-group-item"><strong>Date d'Arrivée des Verres:</strong> <?php echo e($order->glasses_arrival_date ? $order->glasses_arrival_date : 'N/A'); ?></li>
                                        </ul>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/orders/show.blade.php ENDPATH**/ ?>