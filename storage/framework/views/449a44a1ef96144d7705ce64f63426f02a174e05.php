<?php $__env->startSection('title'); ?>
    Dashbord
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <style>
        .appoint-btn {
            background-color: #e7f1ff; /* Light blue background */
            color: #007bff; /* Blue text */
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: default;
            font-weight: bold;
        }

        .appoint-btn:hover {
            background-color: #d0e8ff; /* Slightly darker blue on hover */
            color: #0056b3; /* Darker blue text on hover */
        }
        .toast-info {
            background-color: #007bff;
            color: #ffffff;
        }
        .toast-success {
            background-color: #28a745;
            color: #ffffff;
        }
        .toast-error {
            background-color: #dc3545;
            color: #ffffff;
        }
        .toast-warning {
            background-color: #ffc107;
            color: #000000;
        }


        .btn-warning {
        background-color: #ffc107; /* Jaune */
        color: #000000; /* Texte noir */
        }
        .btn-orange {
            background-color: #fd7e14; /* Orange */
            color: #ffffff; /* Texte blanc */
        }
        .btn-danger {
            background-color: #dc3545; /* Rouge */
            color: #ffffff; /* Texte blanc */
        }
        .btn-outline-info {
            color: #17a2b8; /* Texte bleu */
            border-color: #17a2b8; /* Bordure bleu */
        }
    </style>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Liste des Clients</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="">Clients</a></li>
                                <li class="breadcrumb-item active">Tous les clients</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="patients-list">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">Liste des clients</h2>
                                    <?php if(session('success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session('success')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <?php if($errors->any()): ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 2): ?>
                                        <div class="heading-elements">
                                            <a href="<?php echo e(route('clients.create')); ?>" class="btn btn-primary">
                                                <i class="la la-plus font-small-2"></i> Ajouter un client
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(auth()->user()->role_id == 10): ?>
                                        <div class="heading-elements">
                                            <a href="<?php echo e(route('commercial.index')); ?>" class="btn btn-primary">
                                                <i class="la icon-list font-small-2"></i> Les Clients Prospectés
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body collapse show">
                                    <div class="card-body card-dashboard"></div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list datatable">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Sexe</th>
                                                    <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 2 or auth()->user()->role_id == 3 or auth()->user()->role_id == 10 or auth()->user()->role_id == 8 or auth()->user()->role_id == 6): ?>
                                                        <th>Rendez-vous</th>
                                                    <?php endif; ?>
                                                    <th>Choix_service</th>
                                                    <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 4 or auth()->user()->role_id == 10): ?>
                                                        <th>Type d'entretien</th>
                                                        <th>Montant</th>
                                                    <?php endif; ?>
                                                    <th>Actions</th>
                                                    <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 8 or auth()->user()->role_id == 10): ?>
                                                        <th>Service Call</th>
                                                    <?php endif; ?>
                                                    <th>Type de dernière interaction</th>
                                                    <th>Date d'enregistrement</th>
                                                    <th>Date du dernier passage</th>
                                                </tr>
                                            </thead>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/clients/index.blade.php ENDPATH**/ ?>