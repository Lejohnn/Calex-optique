<?php $__env->startSection('title', 'Liste des Montures'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="frames-list">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Montures</h4>
                                    <div class="heading-elements">
                                        <a href="<?php echo e(route('frames.create')); ?>" class="btn btn-primary">
                                            <i class="la la-plus font-small-2"></i> Ajouter une Monture
                                        </a>
                                    </div>
                                    <?php if(auth()->user()->role_id == 1 ): ?>
                                        <div class="" style="margin-left: 50%">
                                            <a href="<?php echo e(route('frames.stats')); ?>" class="btn btn-primary">
                                                <i class="la la-plus font-small-2"></i> Stats sur les Montures
                                            </a>
                                        </div>
                                    <?php endif; ?>
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
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Code</th>
                                                    <th>Marque</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $frames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frame): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr id="frame-<?php echo e($frame->id); ?>" class="<?php echo e($frame->status ? '' : 'table-secondary'); ?>">
                                                        <td><?php echo e($frame->id); ?></td>
                                                        <td><?php echo e($frame->code); ?></td>
                                                        <td><?php echo e($frame->brand->name); ?></td>
                                                        <td>
                                                            <a href="<?php echo e(route('frames.show', $frame->id)); ?>"><i class="ft-eye text-info"></i></a>
                                                            <?php if(auth()->user()->role_id == 1 ): ?>

                                                                <a href="<?php echo e(route('frames.edit', $frame->id)); ?>"><i class="ft-edit text-success ml-1"></i></a>
                                                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo e($frame->id); ?>">
                                                                    <i class="ft-trash-2 ml-1 text-warning"></i>
                                                                </a>
                                                                <button type="button" class="btn toggle-status-btn <?php echo e($frame->status ? 'btn-success' : 'btn-warning'); ?>" data-id="<?php echo e($frame->id); ?>">
                                                                    <?php echo e($frame->status ? 'Désactiver' : 'Activer'); ?>

                                                                </button>
                                                            <?php endif; ?>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteConfirmationModal<?php echo e($frame->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel<?php echo e($frame->id); ?>" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel<?php echo e($frame->id); ?>">Confirmation de suppression</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Êtes-vous sûr de vouloir supprimer le cadre <strong><?php echo e($frame->frame_name); ?></strong> ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <form id="delete-form-<?php echo e($frame->id); ?>" action="<?php echo e(route('frames.destroy', $frame->id)); ?>" method="POST">
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
                </div>
            </section>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('backend/vendors/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    var table = $('.datatable').DataTable();

    function attachToggleStatusEvents() {
        $('.toggle-status-btn').off('click').on('click', function() {
            var frameId = $(this).data('id');
            var button = $(this);

            $.ajax({
                url: '/frames/' + frameId + '/toggleStatus',
                type: 'PATCH',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        var newStatus = response.newStatus;
                        button.toggleClass('btn-success btn-warning');
                        button.text(newStatus ? 'Désactiver' : 'Activer');
                        $('#frame-' + frameId).toggleClass('table-secondary');
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    }

    // Attach the events on initial page load
    attachToggleStatusEvents();

    // Attach the events on each draw event (pagination, search, etc.)
    table.on('draw', function() {
        attachToggleStatusEvents();
    });
});

</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/caisse/frames/index.blade.php ENDPATH**/ ?>