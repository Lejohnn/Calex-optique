<?php $__env->startSection('title', 'Modifier le Reçu'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Edit User Form -->
            <section id="edit-user">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modifier le Reçu</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
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
                                        <form action="<?php echo e(route('recus.update', $receipt->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>

                                            <div class="form-group">
                                                <label for="nom_client">Nom du Client</label>
                                                <input type="text" name="nom_client" id="nom_client" class="form-control" value="<?php echo e($receipt->nom_client); ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="date_reception">Date de Réception</label>
                                                <input type="date" name="date_reception" id="date_reception" class="form-control" value="<?php echo e($receipt->date_reception); ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="montant_du">Montant dû</label>
                                                <input type="number" name="montant_du" id="montant_du" class="form-control" value="<?php echo e($receipt->montant_du); ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="montant">Montant</label>
                                                <input type="number" name="montant" id="montant" class="form-control" value="<?php echo e($receipt->montant); ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="reste">Reste</label>
                                                <input type="number" name="reste" id="reste" class="form-control" value="<?php echo e($receipt->reste); ?>" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="autre_versement">Autre Versement</label>
                                                <input type="number" name="autre_versement" id="autre_versement" class="form-control" value="0" step="0.01">
                                            </div>

                                            <div class="form-group">
                                                <label for="last_updated">Dernière Modification</label>
                                                <input type="text" id="last_updated" class="form-control" value="<?php echo e($receipt->updated_at->format('d/m/Y H:i:s')); ?>" readonly>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                            <a href="<?php echo e(route('caisse.recu.index')); ?>" class="btn btn-secondary">Annuler</a>
                                        </form>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                function updateAutreVersementReadonly() {
                                                    var reste = document.getElementById('reste').value;
                                                    var autreVersement = document.getElementById('autre_versement');
                                                    if (parseFloat(reste) === 0) {
                                                        autreVersement.readOnly = true;
                                                    } else {
                                                        autreVersement.readOnly = false;
                                                    }
                                                }

                                                updateAutreVersementReadonly(); // Check on page load

                                                // Update on change event
                                                document.getElementById('reste').addEventListener('input', updateAutreVersementReadonly);
                                            });
                                        </script>
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
<script src="<?php echo e(asset('backend/js/scripts/pages/hospital-patients-list.js')); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/caisse/recu/edit.blade.php ENDPATH**/ ?>