@extends('layouts.app')

@section('title', 'Liste des Factures')

@section('contenu')
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Tableau des Factures -->
            <section id="factures">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste des Factures</h4>
                                <div class="heading-elements">
                                    <a href="{{ route('caisse.facture')}}" class="btn btn-dark btn-sm">
                                        <i class="fas fa-edit"></i> Nouvelle Facture
                                    </a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom Client</th>
                                                    <th>Date Facture</th>
                                                    <th>Montant Total HT</th>
                                                    <th>Actions</th> <!-- Ajout de cette colonne pour les actions -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($factures as $facture)
                                                <tr>
                                                    <td>{{ $facture->id }}</td>
                                                    <td>{{ $facture->nom_client }}</td>
                                                    <td>{{ $facture->date_facture }}</td>
                                                    <td>{{ $facture->montant_total_ht }}</td>
                                                    <td>
                                                        <a href="{{ route('factures.details', $facture->id) }}" class="btn btn-primary">Détails</a>
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
