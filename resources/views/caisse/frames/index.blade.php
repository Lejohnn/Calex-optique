@extends('layouts.app')

@section('title', 'Liste des Montures')

@section('contenu')
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
                                        <a href="{{ route('frames.create') }}" class="btn btn-primary">
                                            <i class="la la-plus font-small-2"></i> Ajouter une Monture
                                        </a>
                                    </div>
                                    @if(auth()->user()->role_id == 1 )
                                        <div class="" style="margin-left: 50%">
                                            <a href="{{ route('frames.stats') }}" class="btn btn-primary">
                                                <i class="la la-plus font-small-2"></i> Stats sur les Montures
                                            </a>
                                        </div>
                                    @endif
                                </div>
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
                                                @foreach ($frames as $frame)
                                                    <tr id="frame-{{ $frame->id }}" class="{{ $frame->status ? '' : 'table-secondary' }}">
                                                        <td>{{ $frame->id }}</td>
                                                        <td>{{ $frame->code }}</td>
                                                        <td>{{ $frame->brand->name }}</td>
                                                        <td>
                                                            <a href="{{ route('frames.show', $frame->id) }}"><i class="ft-eye text-info"></i></a>
                                                            @if(auth()->user()->role_id == 1 )

                                                                <a href="{{ route('frames.edit', $frame->id) }}"><i class="ft-edit text-success ml-1"></i></a>
                                                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal{{ $frame->id }}">
                                                                    <i class="ft-trash-2 ml-1 text-warning"></i>
                                                                </a>
                                                                <button type="button" class="btn toggle-status-btn {{ $frame->status ? 'btn-success' : 'btn-warning' }}" data-id="{{ $frame->id }}">
                                                                    {{ $frame->status ? 'Désactiver' : 'Activer' }}
                                                                </button>
                                                            @endif
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteConfirmationModal{{ $frame->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $frame->id }}" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $frame->id }}">Confirmation de suppression</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Êtes-vous sûr de vouloir supprimer le cadre <strong>{{ $frame->frame_name }}</strong> ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <form id="delete-form-{{ $frame->id }}" action="{{ route('frames.destroy', $frame->id) }}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend/js/core/app.js') }}"></script>
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
                    _token: '{{ csrf_token() }}'
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
