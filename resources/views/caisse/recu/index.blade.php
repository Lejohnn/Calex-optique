@extends('layouts.app')

@section('title')
    Liste des Reçus
@endsection

@section('contenu')
    <script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Tableau des Reçus -->
                <section id="recus">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Reçus</h4>
                                    {{-- <div class="heading-elements">
                                        <a href="{{ route('caisse.recu.create') }}" class="btn btn-dark btn-sm">
                                            <i class="fas fa-plus"></i> Nouveau Reçu
                                        </a>
                                    </div> --}}
                                </div>
                                <div class="card-body collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nom du Client</th>
                                                        <th>Date de Réception</th>
                                                        <th>Montant dû</th>
                                                        <th>Montant</th>
                                                        <th>Reste</th>
                                                        <th>Statut</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($receipts as $receipt)
                                                    <tr>
                                                        <td>{{ $receipt->id }}</td>
                                                        <td>{{ $receipt->nom_client }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($receipt->date_reception)->format('d/m/Y') }}</td>
                                                        <td>{{ $receipt->montant_du }}</td>
                                                        <td>{{ $receipt->montant }}</td>
                                                        <td>{{ $receipt->reste }}</td>
                                                        <td>
                                                            @if($receipt->reste == 0)
                                                                <button class="btn btn-success btn-sm">Terminé</button>
                                                            @else
                                                                <button class="btn btn-warning btn-sm">Pas terminé</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('recus.show', $receipt->id) }}"><i class="ft-eye text-info"></i></a>
                                                            @if(auth()->user()->role_id == 1)
                                                                <a href="{{ route('recus.edit', $receipt->id) }}"><i class="ft-edit text-success ml-1"></i></a>
                                                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal{{ $receipt->id }}"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                            @endif
                                                            @if(auth()->user()->role_id == 5 or auth()->user()->role_id == 1)
                                                                <a href="{{ route('generate.receipt.pdf', $receipt->id) }}" class="btn btn-primary">
                                                                    <i class="feather icon-name text-color"></i>Reçu
                                                                </a>
                                                            @endif
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteConfirmationModal{{ $receipt->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $receipt->id }}" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $receipt->id }}">Confirmation de suppression</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Êtes-vous sûr de vouloir supprimer le reçu de <strong>{{ $receipt->nom_client }}</strong> ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <form id="delete-form-{{ $receipt->id }}" action="{{ route('recus.destroy', $receipt->id) }}" method="POST">
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




<!-- Scripts -->
<script src="{{asset('backend/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backend/js/core/app-menu.js')}}"></script>
<script src="{{asset('backend/js/core/app.js')}}"></script>
<script src="{{asset('backend/js/scripts/pages/hospital-patients-list.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
