<?php $__env->startSection('title', 'Générer une Ordonnance'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Génération d'une Ordonnance -->
            <section id="ordonnance-generation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Générer une Ordonnance</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="<?php echo e(route('ordonnance.generate')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="nom_patient">Nom du Patient</label>
                                            <input type="text" id="nom_patient" name="nom_patient" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="age">Âge</label>
                                            <input type="number" id="age" name="age" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date du jour</label>
                                            <input type="date" id="date" name="date" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sph_od">SPH OD</label>
                                            <input type="text" id="sph_od" name="sph_od" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="cyl_od">CYL OD</label>
                                            <input type="text" id="cyl_od" name="cyl_od" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="axe_od">AXE OD</label>
                                            <input type="text" id="axe_od" name="axe_od" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="add_od">ADD OD</label>
                                            <input type="text" id="add_od" name="add_od" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="sph_og">SPH OG</label>
                                            <input type="text" id="sph_og" name="sph_og" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="cyl_og">CYL OG</label>
                                            <input type="text" id="cyl_og" name="cyl_og" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="axe_og">AXE OG</label>
                                            <input type="text" id="axe_og" name="axe_og" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="add_og">ADD OG</label>
                                            <input type="text" id="add_og" name="add_og" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="submit-btn">Générer l'Ordonnance</button>
                                    </form>
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

<script>
    document.getElementById('ordonnance-form').addEventListener('submit', function() {
        document.getElementById('submit-btn').disabled = true;
    });
</script>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/clients/ordonnance.blade.php ENDPATH**/ ?>