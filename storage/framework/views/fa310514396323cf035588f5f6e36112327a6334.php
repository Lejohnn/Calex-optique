<?php $__env->startSection('title', 'Ajouter une Commande'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="order-create">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ajouter une Commande</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="<?php echo e(route('orders.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="client_name">Nom du Client</label>
                                                <input type="text" name="client_name" class="form-control" id="client_name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="order_date">Date de Commande</label>
                                                <input type="date" name="order_date" class="form-control" id="order_date" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="glasses_received">Verres Réceptionnés</label>
                                                <select name="glasses_received" class="form-control" id="glasses_received">
                                                    <option value="0">Non</option>
                                                    <option value="1">Oui</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="glasses_assembled">Lunettes Montées</label>
                                                <select name="glasses_assembled" class="form-control" id="glasses_assembled">
                                                    <option value="0">Non</option>
                                                    <option value="1">Oui</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="order_cancelled">Commande Annulée</label>
                                                <select name="order_cancelled" class="form-control" id="order_cancelled">
                                                    <option value="0">Non</option>
                                                    <option value="1">Oui</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="glasses_arrival_date">Date d'Arrivée des Verres</label>
                                                <input type="date" name="glasses_arrival_date" class="form-control" id="glasses_arrival_date">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/orders/create.blade.php ENDPATH**/ ?>