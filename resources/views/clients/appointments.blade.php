@extends('layouts.app')

@section('title', 'Rendez-vous du Client')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="client-appointments">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rendez-vous pour {{ $client->nom }} {{ $client->prenom }}</h4>
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
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            var eventsUrl = '{{ $eventsUrl }}';

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
                            url: '{{ route('clients.appointments.store', $client->id) }}',
                            method: 'POST',
                            data: {
                                title: title,
                                start: start.format(),
                                end: end.format(),
                                _token: '{{ csrf_token() }}'
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
                            url: '{{ route('clients.appointments.update', '') }}/' + event.id,
                            method: 'PUT',
                            data: {
                                start: event.start.format(),
                                end: event.end.format(),
                                _token: '{{ csrf_token() }}'
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
                            url: '{{ route('clients.appointments.delete', '') }}/' + event.id,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
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
@endsection
