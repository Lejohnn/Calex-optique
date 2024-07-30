<?php $__env->startSection('title'); ?>
      Dashbord
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
         <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Notifications</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Accueil</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Parametres</a>
                                </li>
                                <li class="breadcrumb-item active">Notifications
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
                    </div>
                </div> -->
            </div>
            <div class="content-body">
    <!-- List Of All Patients -->
    <section id="patients-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Notifications</h2>
                        <!-- <?php if(Session::has('success')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(Session::get('success')); ?>

                                    </div>
                                <?php endif; ?>
                                <?php if(count($errors)> 0): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?> -->
                                <?php if(session('success')): ?>
                                        <br>
                                        <div class="alert alert-success">
                                            <?php echo e(session('success')); ?>

                                        </div>
                                <?php endif; ?>

                    </div>
                    <div class="card-body collapse show">
                        <div class="card-body card-dashboard">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered patients-list">
                                <thead>
                                    <tr>
                                        <th>message</th>
                                        <th>status</th>
                                        <th>Date de creation</th>
                                        <th>Dernière mise à jour</th>
                                        <?php if( auth()->user()->role_id == 1): ?>
                                            <th>Actions</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <tr>
                                            <td>
                                            <?php if($notification->status == 0): ?>
                                                    <a href="<?php echo e(route('clients.index')); ?>" class="text-warning">
                                                        <?php echo e($notification->message); ?>


                                                    </a>
                                            <?php endif; ?>

                                                <?php if($notification->status == 1): ?>
                                                    <a href="<?php echo e(route('clients.index')); ?>" class="text-success font-weight-bold">
                                                        <?php echo e($notification->message); ?>


                                                    </a>
                                                <?php endif; ?>


                                            </td>

                                        <td>
                                            <?php if($notification->status == 1): ?>
                                                <span class="badge badge-success">Traité </span>
                                            <?php endif; ?>
                                         <?php if($notification->status == 0): ?>
                                                     <span class="badge badge-danger">En Attente</span>
                                            <?php endif; ?>
                                       </td>
                                       <td class="font-weight-bold">
                                          <?php echo e($notification->created_at); ?>

                                       </td>

                                       <td class="font-weight-bold">
                                       <?php echo e($notification->updated_at); ?>

                                       </td>

                                        <?php if( auth()->user()->role_id == 1): ?>
                                            <td>

                                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($notification->id); ?>"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteConfirmationModal<?php echo e($notification->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($notification->id); ?>" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($notification->id); ?>">Confirmation de suppression</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Êtes-vous sûr de vouloir supprimer notification <strong><?php echo e($notification->message); ?></strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                                                                <form id="delete-form-<?php echo e($notification->id); ?>" action="<?php echo e(route('notifications.editStatus', $notification)); ?>" method="GET">
                                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php endif; ?>


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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/notifications/index.blade.php ENDPATH**/ ?>