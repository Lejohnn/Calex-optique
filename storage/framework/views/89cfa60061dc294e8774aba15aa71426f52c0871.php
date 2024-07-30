<?php $__env->startSection('title', 'Ajouter un Utilisateur'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Add User Form -->
            <section id="add-user">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ajouter un Utilisateur</h4>
                                </div>
                                <?php if(Session::has('success')): ?>
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
                                <?php endif; ?>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="<?php echo e(route('users.store')); ?>" method="POST" class="add-user-form">
                                            <?php echo csrf_field(); ?>
                                            <!-- Informations de l'utilisateur -->
                                            <h6>
                                                <i class="step-icon la la-user"></i>
                                                Informations de l'utilisateur
                                            </h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="name" name="name" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Adresse email <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="email" name="email" type="email" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">Mot de passe <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="password" name="password" type="password" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role">Rôle <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="role" name="role_id" required>
                                                                <option value="">Sélectionner un rôle</option>
                                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div id="description_<?php echo e($role->id); ?>" class="role-description" style="display: none;">
                                                                <?php echo e($role->description); ?>

                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- Bouton de soumission -->
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fonction pour afficher la description du rôle sélectionné
        function showRoleDescription() {
            // Récupérer la valeur sélectionnée dans la liste déroulante
            var roleId = document.getElementById('role').value;
            // Masquer toutes les descriptions de rôle
            var roleDescriptions = document.querySelectorAll('.role-description');
            roleDescriptions.forEach(function (description) {
                description.style.display = 'none';
            });
            // Afficher la description du rôle sélectionné
            var selectedRoleDescription = document.getElementById('description_' + roleId);
            if (selectedRoleDescription) {
                selectedRoleDescription.style.display = 'block';
            }
        }

        // Ajouter un écouteur d'événement de changement à la liste déroulante
        var roleSelect = document.getElementById('role');
        roleSelect.addEventListener('change', function () {
            showRoleDescription();
        });

        // Appeler la fonction une fois pour afficher la description initiale
        showRoleDescription();
    });
</script>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/users/create.blade.php ENDPATH**/ ?>