@extends('layouts.app')

@section('title', 'Liste des Commerciaux')

@section('contenu')
    <script src="{{ asset('backend/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <style>
        .btn-orange {
            background-color: #fd7e14;
            color: white;
        }

        .btn-yellow {
            background-color: #ffc107;
            color: black;
        }

        .btn-red {
            background-color: #dc3545;
            color: white;
        }

        .btn-grey {
            background-color: grey;
            color: white;
        }
    </style>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="commercial-list">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Prospectés</h4>
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (auth()->user()->role_id == 6 or auth()->user()->role_id == 1 or auth()->user()->role_id == 8)
                                        <div class="heading-elements">
                                            <a href="{{ route('commercial.create') }}" class="btn btn-primary">
                                                <i class="la la-plus font-small-2"></i> Ajouter
                                            </a>
                                        </div>
                                    @endif
                                    @if (auth()->user()->role_id == 10 or auth()->user()->role_id == 6)
                                        <div class="" style="margin-left:40%">
                                            <a href="{{ route('clients.index') }}" class="btn btn-success">
                                                <i class="la icon-list font-small-2"></i> Liste Des Clients de Calex
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="alert alert-success d-none" id="status-message"></div>
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
                                                    @if (auth()->user()->role_id == 1 or auth()->user()->role_id == 8)
                                                        <th>Heure d'enregistrement</th>
                                                        <th>Changer le Statut</th>
                                                    @endif
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($prospects as $commercial)
                                                    @php
                                                        $backgroundClass = '';

                                                        switch ($commercial->validation_status) {
                                                            case 'pending':
                                                                $backgroundClass = 'table-warning';
                                                                break;
                                                            case 'confirmed':
                                                                $backgroundClass = 'table-success';
                                                                break;
                                                            case 'denied':
                                                                $backgroundClass = 'table-danger';
                                                                break;
                                                            case 'peace':
                                                                $backgroundClass = '';
                                                                break;
                                                            default:
                                                                $backgroundClass = '';
                                                                break;
                                                        }

                                                        // Calcul de la différence en jours entre aujourd'hui et la date du rendez-vous
$diffInDays = \Carbon\Carbon::parse(
    $commercial->date_rdv,
)->diffInDays(now(), false);
// Détermination de la classe CSS en fonction de la différence en jours
if (
    $diffInDays == -1 or
    $diffInDays == -2 or
    $diffInDays == -3
) {
    $buttonClass = 'btn-orange'; // Plus de 3 jours à venir (jaune)
} elseif ($diffInDays == 0) {
    $buttonClass = 'btn-red'; // Jour du rendez-vous (rouge)
} elseif ($diffInDays < 0) {
    $buttonClass = 'btn-yellow'; // Proche des 3 jours (orange)
} else {
    $buttonClass = 'btn-grey'; // Date passée (gris)
                                                        }
                                                    @endphp
                                                    <tr id="commercial-{{ $commercial->id }}">
                                                        <td>{{ $commercial->date }}</td>
                                                        <td>{{ $commercial->commercial_name }}</td>
                                                        <td>
                                                            <button
                                                                class="btn {{ $buttonClass }}">{{ $commercial->date_rdv }}</button>
                                                        </td>
                                                        <td>
                                                            <button
                                                                class="btn {{ $buttonClass }}">{{ $commercial->rdv_heure }}</button>
                                                        </td>
                                                        <td>{{ $commercial->rubrique }}</td>
                                                        <td>{{ $commercial->entreprise_nom }}</td>
                                                        <td>{{ $commercial->entreprise_responsable }}</td>
                                                        <td>{{ $commercial->entreprise_contact }}</td>
                                                        @if (auth()->user()->role_id == 1 or auth()->user()->role_id == 8)
                                                            <td>{{ $commercial->entreprise_heure }}</td>
                                                            <td class="{{ $backgroundClass }}">
                                                                <form>
                                                                    @csrf
                                                                    <select class="form-control validation-status"
                                                                        name="validation_status"
                                                                        data-commercial-id="{{ $commercial->id }}">
                                                                        <option class="status-pending" value="pending"
                                                                            {{ $commercial->validation_status == 'pending' ? 'selected' : '' }}>
                                                                            Pending</option>
                                                                        <option class="status-confirmed" value="confirmed"
                                                                            {{ $commercial->validation_status == 'confirmed' ? 'selected' : '' }}>
                                                                            Confirmed</option>
                                                                        <option class="status-denied" value="denied"
                                                                            {{ $commercial->validation_status == 'denied' ? 'selected' : '' }}>
                                                                            Denied</option>
                                                                        <option class="status-peace" value="peace"
                                                                            {{ $commercial->validation_status == 'peace' ? 'selected' : '' }}>
                                                                            Peace</option>
                                                                    </select>
                                                                </form>
                                                            </td>
                                                        @endif

                                                        <td>
                                                            <a href="{{ route('commercial.show', $commercial->id) }}"><i
                                                                    class="ft-eye text-info"></i></a>
                                                            @if (auth()->user()->role_id == 1 or auth()->user()->role_id == 8)
                                                                <a href="{{ route('commercial.edit', $commercial->id) }}"><i
                                                                        class="ft-edit text-success ml-1"></i></a>
                                                                <a href="#" class="delete-btn" data-toggle="modal"
                                                                    data-target="#deleteConfirmationModal{{ $commercial->id }}"><i
                                                                        class="ft-trash-2 ml-1 text-warning"></i></a>
                                                                <a href="#" class="edit-rdv-heure-btn"
                                                                    data-id="{{ $commercial->id }}"
                                                                    data-date-rdv="{{ $commercial->date_rdv }}"
                                                                    data-heure-rdv="{{ $commercial->rdv_heure }}"
                                                                    data-toggle="modal" data-target="#editRdvHeureModal">
                                                                    <i class="icon-bell ml-1 text-warning"></i>
                                                                </a>

                                                                <!-- Modal -->
                                                                <div class="modal fade"
                                                                    id="deleteConfirmationModal{{ $commercial->id }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="deleteConfirmationModalLabel{{ $commercial->id }}"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="deleteConfirmationModalLabel{{ $commercial->id }}">
                                                                                    Confirmation de suppression</h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Êtes-vous sûr de vouloir supprimer le
                                                                                commercial
                                                                                <strong>{{ $commercial->commercial_name }}</strong>?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Annuler</button>
                                                                                <form
                                                                                    id="delete-form-{{ $commercial->id }}"
                                                                                    action="{{ route('commercial.destroy', $commercial->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">Supprimer</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal for editing RDV time and date -->
                                                                <div class="modal fade" id="editRdvHeureModal"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="editRdvHeureModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="editRdvHeureModalLabel">Modifier
                                                                                    l'heure et la date du Rendez-vous</h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form id="editRdvHeureForm"
                                                                                    action="{{ route('commercial.testHeure') }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <input type="hidden"
                                                                                        id="commercial_id"
                                                                                        name="commercial_id">
                                                                                    <div class="form-group">
                                                                                        <label for="date_rdv">Date du
                                                                                            Rendez-vous</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="date_rdv" name="date_rdv"
                                                                                            required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="rdv_heure">Heure du
                                                                                            Rendez-vous</label>
                                                                                        <input type="time"
                                                                                            class="form-control"
                                                                                            id="rdv_heure"
                                                                                            name="rdv_heure" required>
                                                                                    </div>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Enregistrer</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
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





@endsection

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('backend/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('backend/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('backend/js/scripts/pages/hospital-patients-list.js') }}"></script>
<!-- END: Page JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('.datatable').DataTable();

        function attachValidationStatusChangeEvents() {
            $('select.validation-status').off('change').on('change', function() {
                var commercialId = $(this).data('commercial-id');
                var validationStatus = $(this).val();
                var row = $(this).closest('tr');

                $.ajax({
                    url: '{{ url('prospects') }}/' + commercialId + '/update-status',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        validation_status: validationStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#status-message').removeClass('d-none').addClass('alert-success').text(response.message).show();

                            setTimeout(function() {
                                $('#status-message').fadeOut('slow', function() {
                                    $(this).addClass('d-none').removeClass('alert-success').text('');
                                });
                            }, 3000);

                            row.removeClass('table-warning table-success table-danger');
                            switch (response.prospect.validation_status) {
                                case 'pending':
                                    row.addClass('table-warning');
                                    break;
                                case 'confirmed':
                                    row.addClass('table-success');
                                    break;
                                case 'denied':
                                    row.addClass('table-danger');
                                    break;
                                case 'peace':
                                    break;
                            }
                        } else {
                            $('#status-message').removeClass('d-none').addClass('alert-danger').text('Erreur lors de la mise à jour du statut.').show();

                            setTimeout(function() {
                                $('#status-message').fadeOut('slow', function() {
                                    $(this).addClass('d-none').removeClass('alert-danger').text('');
                                });
                            }, 3000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        $('#status-message').removeClass('d-none').addClass('alert-danger').text('Erreur lors de la mise à jour du statut.').show();

                        setTimeout(function() {
                            $('#status-message').fadeOut('slow', function() {
                                $(this).addClass('d-none').removeClass('alert-danger').text('');
                            });
                        }, 3000);
                    }
                });
            });
        }

        table.on('draw', function() {
            attachValidationStatusChangeEvents();

            $('.edit-rdv-heure-btn').on('click', function() {
                var commercialId = $(this).data('id');
                var dateRdv = $(this).data('date-rdv');
                var heureRdv = $(this).data('heure-rdv');

                $('#editRdvHeureModal #commercial_id').val(commercialId);
                $('#editRdvHeureModal #date_rdv').val(dateRdv);
                $('#editRdvHeureModal #rdv_heure').val(heureRdv);
            });

            $('.datatable').on('click', '.delete-btn', function() {
                var prospectId = $(this).data('id');
                $('#deleteProspectForm').attr('action', '/prospects/' + prospectId);
            });

            $('#deleteProspectForm').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');

                $.ajax({
                    type: 'DELETE',
                    url: actionUrl,
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#commercial-' + prospectId).remove();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        attachValidationStatusChangeEvents();

        $('.edit-rdv-heure-btn').on('click', function() {
            var commercialId = $(this).data('id');
            var dateRdv = $(this).data('date-rdv');
            var heureRdv = $(this).data('heure-rdv');

            $('#editRdvHeureModal #commercial_id').val(commercialId);
            $('#editRdvHeureModal #date_rdv').val(dateRdv);
            $('#editRdvHeureModal #rdv_heure').val(heureRdv);
        });

        $('.datatable').on('click', '.delete-btn', function() {
            var prospectId = $(this).data('id');
            $('#deleteProspectForm').attr('action', '/prospects/' + prospectId);
        });

        $('#deleteProspectForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: 'DELETE',
                url: actionUrl,
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#commercial-' + prospectId).remove();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#editRdvHeureForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: 'POST',
                url: actionUrl,
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire(
                            'Succès',
                            'La date et l\'heure du rendez-vous ont été mises à jour avec succès.',
                            'success'
                        );
                        $('#editRdvHeureModal').modal('hide');
                        location.reload();
                    } else {
                        Swal.fire(
                            'Erreur',
                            'Une erreur s\'est produite lors de la mise à jour.',
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire(
                        'Erreur',
                        'Une erreur s\'est produite lors de la mise à jour.',
                        'error'
                    );
                }
            });
        });
    });
</script>

