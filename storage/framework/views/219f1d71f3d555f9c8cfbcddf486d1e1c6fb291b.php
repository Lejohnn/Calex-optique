<?php $__env->startSection('title', 'Statistiques des commerciaux '); ?>

<?php $__env->startSection('contenu'); ?>
<script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
    <!-- CSS pour effet hover -->
    <style>
        .card-link {
            text-decoration: none;
        }

        .card-link .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-link .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .monthly-performance-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        }
    </style>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Statistiques des Commerciaux -->
            <section id="commercial-stats">
                <div class="row">
                    <?php $__currentLoopData = $commercials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commercial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-3 col-md-6 col-12">
                        <a href="<?php echo e(route('commercial.prospects', $commercial->id)); ?>" class="card-link">
                            <div class="card" data-commercial-id="<?php echo e($commercial->id); ?>">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo e($commercial->name); ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-body">
                                            <h5 class="text-bold-700 mb-0"><?php echo e($commercial->prospects_today); ?></h5>
                                            <span>Prospects ajoutés aujourd'hui</span>
                                        </div>
                                        <div class="media-right ml-2">
                                            <i class="icon-user font-large-2"></i>
                                        </div>
                                    </div>
                                    <div class="media d-flex align-items-center mt-1">
                                        <div class="media-body">
                                            <h5 class="text-bold-700 mb-0"><?php echo e($commercial->total_prospects); ?></h5>
                                            <span>Total des prospects</span>
                                        </div>
                                        <div class="media-right ml-2">
                                            <i class="icon-users font-large-2"></i>
                                        </div>
                                    </div>
                                    <div class="media d-flex align-items-center mt-1">
                                        <div class="media-body">
                                            <h5 class="text-bold-700 mb-0" style="color: <?php echo e($commercial->daily_note['color']); ?>">
                                                <?php echo e($commercial->daily_note['note']); ?>

                                            </h5>
                                            <span>Note quotidienne</span>
                                        </div>
                                        <div class="media-right ml-2">
                                            <i class="icon-star font-large-2" style="color: <?php echo e($commercial->daily_note['color']); ?>"></i>
                                        </div>
                                    </div>
                                    <div class="media d-flex align-items-center mt-1">
                                        <div class="media-body">
                                            <h5 class="text-bold-700 mb-0"><?php echo e($commercial->points); ?></h5>
                                            <span>Points</span>
                                        </div>
                                        <div class="media-right ml-2">
                                            <i class="icon-trophy font-large-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>

        </div>
    </div>
</div>



<!-- Ajouter une div pour afficher la liste des prospects -->
<div id="prospects-list"></div>

<?php if(auth()->user()->role_id == 1 ): ?>
    <!-- Bouton pour accéder aux performances mensuelles -->
    <a href="<?php echo e(route('performance')); ?>" class="btn btn-primary monthly-performance-btn">
        Performances Mensuelles
    </a>
<?php endif; ?>
<?php $__env->stopSection(); ?>


    <!-- Ajouter ce script à la fin de votre vue principale -->
    




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

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/commercial/stat.blade.php ENDPATH**/ ?>