@extends('layouts.app')

@section('title', 'Détails du Reçu')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Détails de la Facture -->
            <section id="facture-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Détails du Reçu </h3>
                                <div class="card-body collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable">
                                                <tr>
                                                    <th>Nom du Client</th>
                                                    <td>{{ $receipt->nom_client }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Date de Réception</th>
                                                    <td>{{ \Carbon\Carbon::parse($receipt->date_reception)->format('d/m/Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Montant dû</th>
                                                    <td>{{ $receipt->montant_du }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Montant</th>
                                                    <td>{{ $receipt->montant }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Reste</th>
                                                    <td>{{ $receipt->reste }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('recus.edit', $receipt->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('recus.destroy', $receipt->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce reçu ?')">Supprimer</button>
                                </form>
                                <a href="{{ route('caisse.recu.index') }}" class="btn btn-secondary">Retour à la liste</a>
                            </div>
@endsection


<!-- Scripts -->
<script src="{{asset('backend/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backend/js/core/app-menu.js')}}"></script>
<script src="{{asset('backend/js/core/app.js')}}"></script>
<script src="{{asset('backend/js/scripts/pages/hospital-patients-list.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
