@extends('layouts.app')

@section('title', 'Détails du prospect')

@section('contenu')
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Détails du Prospect -->
            <section id="prospect-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Détails du prospect <strong>{{ $prospect->commercial_name }}</strong></h3>
                                <div class="heading-elements">
                                    <a href="{{ route('commercial.index') }}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-arrow-left"></i> Retour à la liste des prospects
                                    </a>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <fieldset class="col-md-6">
                                            <div class="prospect-detail">
                                                <h4 class="mb-3">Informations générales:</h4>
                                                <ul>
                                                    <li><strong>Nom du Commercial:</strong> {{ $prospect->commercial_name }}</li>
                                                    <li><strong>Date:</strong> {{ $prospect->date }}</li>
                                                    <li><strong>Entreprise:</strong> {{ $prospect->entreprise_nom }}</li>
                                                    <li><strong>Responsable:</strong> {{ $prospect->entreprise_responsable }}</li>
                                                    <li><strong>Contact:</strong> {{ $prospect->entreprise_contact }}</li>
                                                    <li><strong>Heure du Rendez-vous:</strong> {{ $prospect->entreprise_heure }}</li>
                                                    <li><strong>Nom/Prenom du Rendez-vous:</strong> {{ $prospect->rdv_nom_prenom }}</li>
                                                    <li><strong>Contact du Rendez-vous:</strong> {{ $prospect->rdv_contact }}</li>
                                                    <li><strong>Société du Rendez-vous:</strong> {{ $prospect->rdv_societe }}</li>
                                                    <li><strong>Heure du Rendez-vous:</strong> {{ $prospect->rdv_heure }}</li>
                                                    <li><strong>Nom/Prenom du Nettoyage:</strong> {{ $prospect->nettoyage_nom_prenom }}</li>
                                                    <li><strong>Contact du Nettoyage:</strong> {{ $prospect->nettoyage_contact }}</li>
                                                    <li><strong>Société du Nettoyage:</strong> {{ $prospect->nettoyage_societe }}</li>
                                                    <li><strong>Heure du Nettoyage:</strong> {{ $prospect->nettoyage_heure }}</li>
                                                    <li><strong>Date du Rendez-vous:</strong> {{ $prospect->date_rdv }}</li>
                                                    <li><strong>Statut:</strong> {{ $prospect->statut }}</li>
                                                </ul>
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
