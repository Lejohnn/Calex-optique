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
                                <li class="breadcrumb-item"><a href="index.html">Accueil</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Clients</a>
                                </li>
                                <li class="breadcrumb-item active">Tous les clients
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
                        <h2 class="card-title">Liste des clients</h2>
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
                            <table class="table table-striped table-bordered patients-list datatable">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Sexe</th>
                                        <th>Choix_service</th>
                                        <th>Rendez-vous</th>
                                        <th>Choix_service</th>
                                        <th>Type d'entretien</th>
                                        
                                        <th>Actions</th>
                                        <th>Service Call</th>
                                        <th>Type de dernière interaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($client->nom); ?></td>
                                        <td><?php echo e($client->prenom); ?></td>
                                        <td><?php echo e($client->sexe); ?></td>
                                        <td><?php echo e($client->choix_service); ?></td>
                                        <td>
                                            <?php if($client->formatted_rendez_vous): ?>
                                                <button class="btn <?php echo e($client->rendez_vous_color); ?> btn-sm appoint-btn">
                                                    <?php echo e($client->formatted_rendez_vous); ?>

                                                </button>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($client->choix_service); ?></td>
                                        <td><?php echo e($client->entretien); ?></td>
                                        
                                        <td>
                                            <a href="<?php echo e(route('clients.show', $client->id)); ?>"><i class="ft-eye text-info"></i></a>

                                            <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 3): ?>
                                            <a href="<?php echo e(route('clients.edit', $client->id)); ?>"><i class="ft-edit text-success ml-1"></i></a>
                                            <?php endif; ?>
                                            <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($client->id); ?>"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                            <a href="#" class="appointment-btn" data-id="<?php echo e($client->id); ?>" data-toggle="modal" data-target="#appointmentModal">
                                                <i class="icon-bell ml-1 text-warning"></i>
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteConfirmationModal<?php echo e($client->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($client->id); ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($client->id); ?>">Confirmation de suppression</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Êtes-vous sûr de vouloir supprimer le client <strong><?php echo e($client->nom); ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <form id="delete-form-<?php echo e($client->id); ?>" action="<?php echo e(route('clients.destroy', $client->id)); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal HTML -->
                                            <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="appointmentModalLabel">Définir la date de rendez-vous</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="appointmentForm">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" id="client_id" name="client_id">
                                                                <div class="form-group">
                                                                    <label for="rendez_vous">Date de rendez-vous</label>
                                                                    <input type="date" class="form-control" id="rendez_vous" name="rendez_vous" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="rendez_vous_time">Heure de rendez-vous</label>
                                                                    <input type="time" class="form-control" id="rendez_vous_time" name="rendez_vous_time" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('call.entreprise.index', $client->id)); ?>" class="btn btn-secondary btn-sm">Interactions</a>
                                        </td>
                                            <td>
                                                <?php if($client->serviceCallInteractions->isNotEmpty()): ?>
                                                <button class="btn btn-warning btn-sm"><?php echo e($client->serviceCallInteractions->last()->type); ?></button>
                                                <?php else: ?>
                                                    <button class="btn btn-dark btn-sm">N/A</button>
                                                <?php endif; ?>
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




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/call_service/clients.blade.php ENDPATH**/ ?>