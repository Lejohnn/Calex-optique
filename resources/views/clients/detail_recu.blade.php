@extends('layouts.app')

@section('title', 'Détail de la Facture')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Détail de la Facture -->
            <section id="facture-detail">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Détail de la Facture</h4>
                            </div>
                            <div class="card-body collapse show">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Quantité</th>
                                                <th>Prix Unitaire</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($produits as $produit)
                                            <tr>
                                                <td>{{ $produit['nom'] }}</td>
                                                <td>{{ $produit['quantite'] }}</td>
                                                <td>{{ $produit['prix_unitaire'] }}</td>
                                                <td>{{ $produit['total'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2">
                                    <h5>Total: {{ $facture->montant }}</h5>
                                </div>
                                <div class="mt-2">
                                    <a href="{{ route('client.voirFactures') }}" class="btn btn-primary">Retour à la liste</a>
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
    