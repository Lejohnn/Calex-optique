<?php $__env->startSection('title', 'Rendez-vous du Client'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="client-appointments">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rendez-vous pour <?php echo e($client->nom); ?> <?php echo e($client->prenom); ?></h4>
                            </div>
                            <div class="card-body collapse show">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(document).ready(function() {
            var eventsUrl = '<?php echo e($eventsUrl); ?>';

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                plugins: [ 'dayGrid', 'timeGrid', 'interaction' ],
                editable: true,
                events: eventsUrl,
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    var title = prompt('Titre de l\'événement:');
                    var eventData;
                    if (title) {
                        eventData = {
                            title: title,
                            start: start,
                            end: end
                        };
                        $('#calendar').fullCalendar('renderEvent', eventData, true);

                        $.ajax({
                            url: '<?php echo e(route('clients.appointments.store', $client->id)); ?>',
                            method: 'POST',
                            data: {
                                title: title,
                                start: start.format(),
                                end: end.format(),
                                _token: '<?php echo e(csrf_token()); ?>'
                            },
                            success: function(data) {
                                alert('Rendez-vous ajouté avec succès');
                            }
                        });
                    }
                    $('#calendar').fullCalendar('unselect');
                },
                eventDrop: function(event, delta, revertFunc) {
                    if (!confirm("Êtes-vous sûr de vouloir changer cet événement?")) {
                        revertFunc();
                    } else {
                        $.ajax({
                            url: '<?php echo e(route('clients.appointments.update', '')); ?>/' + event.id,
                            method: 'PUT',
                            data: {
                                start: event.start.format(),
                                end: event.end.format(),
                                _token: '<?php echo e(csrf_token()); ?>'
                            },
                            success: function(data) {
                                alert('Rendez-vous mis à jour avec succès');
                            }
                        });
                    }
                },
                eventClick: function(event) {
                    if (confirm("Êtes-vous sûr de vouloir supprimer cet événement?")) {
                        $('#calendar').fullCalendar('removeEvents', event._id);

                        $.ajax({
                            url: '<?php echo e(route('clients.appointments.delete', '')); ?>/' + event.id,
                            method: 'DELETE',
                            data: {
                                _token: '<?php echo e(csrf_token()); ?>'
                            },
                            success: function(data) {
                                alert('Rendez-vous supprimé avec succès');
                            }
                        });
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/clients/appointments.blade.php ENDPATH**/ ?>