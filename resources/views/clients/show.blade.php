@extends('layouts.app')

@section('title', 'Détails du client')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Client Details -->
            <section id="client-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                <h3 class="card-title">Détails du client <strong>{{ $client->nom }}</strong></h3>

                                <div class="heading-elements">
                                    @if(auth()->user()->role_id == 1 or auth()->user()->role_id == 3)
                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    @endif
                                    <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-arrow-left"></i> Retour à la liste des clients
                                    </a>
                                    <!-- Bouton pour générer le PDF -->
                                    {{-- <a href="{{ route('generate.pdf') }}" class="btn btn-success btn-sm">
                                        <i class="far fa-file-pdf"></i> Générer PDF
                                    </a> --}}
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">

                                        <fieldset class="col-md-6">
                                            <div class="client-detail">
                                                <h4 class="mb-3">Informations générales:</h4>
                                                <ul>
                                                    <li><strong>Nom:</strong> {{ $client->nom }}</li>
                                                    <li><strong>Prénom:</strong> {{ $client->prenom }}</li>
                                                    <li><strong>N° de téléphone:</strong> {{ $client->telephone }}</li>
                                                    <li><strong>N° de carte Nationale d’identité:</strong> {{ $client->carte_identite }}</li>
                                                    <li><strong>Date de naissance:</strong> {{ $client->date_naissance }}</li>
                                                    <li><strong>Lieu de naissance:</strong> {{ $client->lieu_naissance }}</li>
                                                    <li><strong>Profession:</strong> {{ $client->profession }}</li>
                                                    <li><strong>Sexe:</strong> {{ $client->sexe }}</li>
                                                    <li><strong>Société d’attache:</strong> {{ $client->societe_attache }}</li>
                                                    <li><strong>Assurance:</strong> {{ $client->assurance }}</li>
                                                </ul>
                                            </div>
                                        </fieldset>
                                        <fieldset class="col-md-6">
                                            <div class="client-detail">
                                                <h4 class="mb-3">Informations supplémentaires:</h4>
                                                <ul>
                                                    <li><strong>Discipline(s) pratiquée(s):</strong> {{ $client->disciplines_pratiquees }}</li>
                                                    <li><strong>Date de début:</strong> {{ $client->date_debut }}</li>
                                                    <li><strong>Activité interpelant la vision:</strong> {{ $client->activite_interpelant_vision }}</li>
                                                    <li><strong>Antécédents familiaux:</strong> {{ $client->antecedents_familiaux }}</li>
                                                    <li><strong>Antécédents chirurgicaux (avec date) y compris ORL, ophtalmo:</strong> {{ $client->antecedents_chirurgicaux }}</li>
                                                    <li><strong>Traitements en cours:</strong> {{ $client->traitements_en_cours }}</li>
                                                    <li><strong>Allergies:</strong> {{ $client->allergies }}</li>
                                                    <li><strong>Mentions générales:</strong> {{ $client->mentions_generales }}</li>
                                                    <li><strong>Portez-vous des lunettes ?</strong> {{ $client->portez_vous_des_lunettes ? 'Oui' : 'Non' }}</li>
                                                    <li><strong>Avez-vous besoin de changer de lunettes ?</strong> {{ $client->besoin_changer_lunettes ? 'Oui' : 'Non' }}</li>
                                                    <li><strong>Autre chose à mentionner au besoin:</strong> {{ $client->autre_choses }}</li>
                                                    <li><strong>Diagnostic:</strong> {{ $client->diagnostic }}</li>
                                                    <li><strong>Prescription:</strong> {{ $client->prescription }}</li>
                                                    <li><strong>Examen particulier:</strong> {{ $client->examen_particulier }}</li>
                                                    <li><strong>Rendez-vous:</strong> {{ $client->rendez_vous }}</li>
                                                </ul>
                                            </div>
                                        </fieldset>
                                        <p><strong>Choix du service:</strong> {{ $client->choix_service }}</p>
                                        {{-- <p><strong>Entretien:</strong> {{ $client->entretien }}</p>
                                        <p><strong>Montant:</strong> {{ $client->montant }}</p> --}}

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
