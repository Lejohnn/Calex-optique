<?php $__env->startSection('title', 'Liste des Commerciaux'); ?>

<?php $__env->startSection('contenu'); ?>
<script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Liste des Commerciaux -->
            <section id="commercial-list">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste des Commerciaux</h4>
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
                                <div class="heading-elements">
                                    <a href="" class="btn btn-primary  ">
                                        <i class="la la-plus font-small-2"></i> Autre
                                    </a>
                                </div>
                                <?php if(session('success')): ?>
                                <br>
                                <div class="alert alert-success">
                                    <?php echo e(session('success')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="card-body collapse show">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered datatable">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Nom du Commercial</th>
                                                <th>Date du Rendez-vous</th>
                                                <th>Heure du Rendez-vous</th>
                                                <th>Rubrique</th>
                                                <th>Entreprise/Société</th>
                                                <th>Responsable</th>
                                                <th>Contact</th>
                                                <th>Heure du Rendez-vous</th>
                                                <th>Changer le Statut</th>
                                                
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?php $__currentLoopData = $prospects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commercial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                $backgroundClass = '';

                                                switch ($commercial->validation_status) {
                                                    case 'pending':
                                                        $backgroundClass = 'table-warning'; // Jaune pour pending
                                                        break;
                                                    case 'confirmed':
                                                        $backgroundClass = 'table-success'; // Vert pour confirmed
                                                        break;
                                                    case 'denied':
                                                        $backgroundClass = 'table-danger'; // Rouge pour denied
                                                        break;
                                                    case 'peace':
                                                        $backgroundClass = ''; // Pas de couleur pour peace
                                                        break;
                                                    default:
                                                        $backgroundClass = '';
                                                        break;
                                                }
                                                ?>
                                           <tr class="<?php echo e($backgroundClass); ?>">
                                            <td><?php echo e($commercial->date); ?></td>
                                            <td><?php echo e($commercial->commercial_name); ?></td>
                                            <td><?php echo e($commercial->date_rdv); ?></td>
                                            <td><?php echo e($commercial->rdv_heure); ?></td>
                                            <td><?php echo e($commercial->rubrique); ?></td>
                                            <td><?php echo e($commercial->entreprise_nom); ?></td>
                                            <td><?php echo e($commercial->entreprise_responsable); ?></td>
                                            <td><?php echo e($commercial->entreprise_contact); ?></td>
                                            <td><?php echo e($commercial->entreprise_heure); ?></td>
                                            <td>
                                                <form action="<?php echo e(route('prospects.updateStatus', $commercial->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <select class="form-control" name="validation_status" onchange="this.form.submit()">
                                                        <option value="pending" <?php echo e($commercial->validation_status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                                        <option value="confirmed" <?php echo e($commercial->validation_status == 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                                                        <option value="denied" <?php echo e($commercial->validation_status == 'denied' ? 'selected' : ''); ?>>Denied</option>
                                                    </select>
                                                </form>
                                            </td>
                                                
                                                <td>
                                                    <a href="<?php echo e(route('commercial.show', $commercial->id)); ?>"><i class="ft-eye text-info"></i></a>
                                                    <a href="<?php echo e(route('commercial.edit', $commercial->id)); ?>"><i class="ft-edit text-success ml-1"></i></a>
                                                    <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($commercial->id); ?>"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteConfirmationModal<?php echo e($commercial->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($commercial->id); ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($commercial->id); ?>">Confirmation de suppression</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Êtes-vous sûr de vouloir supprimer le commercial <strong><?php echo e($commercial->commercial_name); ?></strong>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                    <form id="delete-form-<?php echo e($commercial->id); ?>" action="<?php echo e(route('commercial.destroy', $commercial->id)); ?>" method="POST">
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
            </section>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>





<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset('backend/vendors/js/vendors.min.js')); ?>"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/call_service/prospects.blade.php ENDPATH**/ ?>