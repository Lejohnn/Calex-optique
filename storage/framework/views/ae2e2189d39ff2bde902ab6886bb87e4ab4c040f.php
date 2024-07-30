<?php $__env->startSection('title', 'Modifier la Marque'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="edit-brand">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modifier la Marque</h4>
                                    <div class="heading-elements">
                                        <a href="<?php echo e(route('brands.index')); ?>" class="btn btn-primary">
                                            <i class="la la-list font-small-2"></i> Voir les Marques
                                        </a>
                                    </div>
                                </div>
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
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="<?php echo e(route('brands.update', $brand->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <div class="form-group">
                                                <label for="name">Nom de la Marque <span class="text-danger">*</span></label>
                                                <input type="text" id="name" name="name" class="form-control" value="<?php echo e($brand->name); ?>" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/caisse/brands/edit.blade.php ENDPATH**/ ?>