@extends('layouts.app')

@section('title')
    Liste des Reçus
@endsection

@section('contenu')
    <script src="{{ asset('backend/vendors/js/tables/datatable/datatables.min.js') }}"></script>

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
                                                    @foreach($receipts as $facture)
                                                    <tr>
                                                        <td>{{ $facture->id }}</td>
                                                        <td>{{ $facture->client_name }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($facture->date_facture)->format('d/m/Y') }}</td>
                                                        <td>{{ $facture->montant_du }}</td>
                                                        <td>{{ $facture->montant }}</td>
                                                        <td>{{ $facture->reste }}</td>
                                                        <td>
                                                            @if($facture->reste == 0)
                                                                <button class="btn btn-success btn-sm">Terminé</button>
                                                            @else
                                                                <button class="btn btn-warning btn-sm">Pas terminé</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('client.detailFacture', $facture->id) }}"><i class="ft-eye text-info"></i></a>
                                                            @if(auth()->user()->role_id == 3)
                                                                <a href="#"><i class="ft-edit text-success ml-1"></i></a>
                                                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal{{ $facture->id }}"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                            @endif
                                                            <a href="{{ route('generate.receipt.pdf', $facture->id) }}" class="btn btn-primary">
                                                                <i class="feather icon-printer"></i> Reçu
                                                            </a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteConfirmationModal{{ $facture->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $facture->id }}" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $facture->id }}">Confirmation de suppression</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Êtes-vous sûr de vouloir supprimer le reçu de <strong>{{ $facture->client_name }}</strong> ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <form id="delete-form-{{ $facture->id }}" action="#" method="POST">
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
<script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend/js/core/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>

