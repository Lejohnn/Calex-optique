@extends('layouts.app')

@section('title', 'Interactions de Service Call')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Interactions de Service Call pour {{ $client->nom }} {{ $client->prenom }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
                            <li class="breadcrumb-item active">Interactions de Service Call</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <section id="service-call-interactions">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Liste des Interactions</h2>
                                <div class="heading-elements">
                                    <a href="{{ route('call.entreprise.create', $client->id) }}" class="btn btn-primary">
                                        <i class="la la-plus font-small-2"></i> Ajouter une Interaction
                                    </a>
                                </div>
                            </div>
                            <div class="card-body collapse show">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Détails</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($interactions as $interaction)
                                            <tr>
                                                <td>{{ $interaction->type }}</td>
                                                <td>{{ $interaction->details }}</td>
                                                <td>{{ $interaction->formatted_date }}</td>
                                                {{-- <td>{{ date('d/m/Y', strtotime($interaction->interaction_date)) }}</td> --}}
                                                <td>
                                                    <a href="{{ route('call.entreprise.edit', [$client->id, $interaction->id]) }}"><i class="ft-edit text-success"></i></a>
                                                    <a href="{{ route('call.entreprise.show', [$client->id, $interaction->id]) }}"><i class="ft-eye text-info"></i></a>
                                                    <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal{{ $interaction->id }}"><i class="ft-trash-2 ml-1 text-warning"></i></a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteConfirmationModal{{ $interaction->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $interaction->id }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $interaction->id }}">Confirmation de suppression</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Êtes-vous sûr de vouloir supprimer cette interaction?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                    <form action="{{ route('call.entreprise.destroy', [$client->id, $interaction->id]) }}" method="POST">
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
            </section>
        </div>
    </div>
</div>
@endsection


<!-- BEGIN: Vendor JS-->
<script src="{{asset('backend/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('backend/js/core/app-menu.js')}}"></script>
<script src="{{asset('backend/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('backend/js/scripts/pages/hospital-patients-list.js')}}"></script>
<!-- END: Page JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>
