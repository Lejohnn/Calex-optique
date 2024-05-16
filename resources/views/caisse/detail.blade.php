@extends('layouts.app')

@section('title', 'Détails de la Facture')

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
                                <h3 class="card-title">Détails de la Facture <strong>{{ $facture->id }}</strong></h3>
                                <div class="heading-elements">
                                    <a href="{{ route('caisse.facture')}}" class="btn btn-dark btn-sm">
                                        <i class="fas fa-edit"></i> generer une facture
                                    </a>
                                    <a href="{{ route('caisse.views') }}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-arrow-left"></i> Retour à la liste des factures
                                    </a>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <fieldset class="col-md-6">
                                            <div class="facture-detail">
                                                <h4 class="mb-3">Informations générales:</h4>
                                                <ul>
                                                    <li><strong>Nom du Client:</strong> {{ $facture->nom_client }}</li>
                                                    <li><strong>Date de la Facture:</strong> {{ $facture->date_facture }}</li>
                                                    <li><strong>Montant Total HT:</strong> {{ $facture->montant_total_ht }}</li>
                                                </ul>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="row">
                                        <fieldset class="col-md-12">
                                            <div class="facture-detail">
                                                <h4 class="mb-3">Produits:</h4>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Produit</th>
                                                            <th>Quantité</th>
                                                            <th>Prix unitaire</th>
                                                            <th>Réduction (%)</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($produits['noms'] as $key => $nom_produit)
                                                        <tr>
                                                            <td>{{ $nom_produit }}</td>
                                                            <td>{{ $produits['quantites'][$key] }}</td>
                                                            <td>{{ $produits['prix_unitaires'][$key] }}</td>
                                                            <td>{{ $produits['reductions'][$key] }}</td>
                                                            <td>{{ (($produits['quantites'][$key] * $produits['prix_unitaires'][$key]) - ($produits['quantites'][$key] * $produits['prix_unitaires'][$key] * ($produits['reductions'][$key] / 100))) }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
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
