<?php $__env->startSection('title', 'Détails de l\'Ordonnance'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Détails de l'Ordonnance -->
            <section id="prescription-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Détails de l'Ordonnance</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p><strong>ID:</strong> <?php echo e($prescription->id); ?></p>
                                    <p><strong>Nom du Patient:</strong> <?php echo e($prescription->nom_patient); ?></p>
                                    <p><strong>Âge:</strong> <?php echo e($prescription->age); ?></p>
                                    <p><strong>Date:</strong> <?php echo e($prescription->date->format('d-m-Y')); ?></p>
                                    <p><strong>SPH OD:</strong> <?php echo e($prescription->sph_od); ?></p>
                                    <p><strong>CYL OD:</strong> <?php echo e($prescription->cyl_od); ?></p>
                                    <p><strong>AXE OD:</strong> <?php echo e($prescription->axe_od); ?></p>
                                    <p><strong>ADD OD:</strong> <?php echo e($prescription->add_od); ?></p>
                                    <p><strong>SPH OG:</strong> <?php echo e($prescription->sph_og); ?></p>
                                    <p><strong>CYL OG:</strong> <?php echo e($prescription->cyl_og); ?></p>
                                    <p><strong>AXE OG:</strong> <?php echo e($prescription->axe_og); ?></p>
                                    <p><strong>ADD OG:</strong> <?php echo e($prescription->add_og); ?></p>
                                    <a href="<?php echo e(route('prescriptions.index')); ?>" class="btn btn-primary">Retour à la liste</a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/clients/voirOrdonnance.blade.php ENDPATH**/ ?>