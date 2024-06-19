@extends('layouts.app')

@section('title', 'Liste des Commerciaux')

@section('contenu')
<script src="{{ asset('backend/vendors/js/tables/datatable/datatables.min.js') }}"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Liste des Commerciaux</h3>
            </div>
        </div>
        <div class="content-body">
            <section id="commercials-list">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Liste des Commerciaux</h2>
                                <div class="heading-elements">
                                    <a href="{{ route('agent.create') }}" class="btn btn-primary">
                                        <i class="la la-plus font-small-2"></i> Ajouter un Commercial
                                    </a>
                                </div>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered commercials-list datatable">
                                        <thead>
                                            <tr>
                                                <th>Nom Complet</th>
                                                <th>Date de Début</th>
                                                <th>Points</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($commercials as $commercial)
                                            <tr>
                                                <td>{{ $commercial->full_name }}</td>
                                                <td>{{ $commercial->start_date }}</td>
                                                <td>{{ $commercial->points }}</td>
                                                <td>
                                                    <a href="{{ route('agent.show', $commercial->id) }}"><i class="ft-eye text-info"></i></a>
                                                    <a href="{{ route('agent.edit', $commercial->id) }}"><i class="ft-edit text-success ml-1"></i></a>
                                                    <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal{{ $commercial->id }}"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteConfirmationModal{{ $commercial->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $commercial->id }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $commercial->id }}">Confirmation de suppression</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Êtes-vous sûr de vouloir supprimer le commercial <strong>{{ $commercial->full_name }}</strong> ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                    <form id="delete-form-{{ $commercial->id }}" action="{{ route('agent.destroy', $commercial->id) }}" method="POST">
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
