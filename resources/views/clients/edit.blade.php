@extends('layouts.app')

@section('title', 'Modifier un Client')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Edit Client Form -->
            <section id="edit-client">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modifier un Client</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{ route('clients.update', $client) }}" method="POST" class="edit-client-form">
                                            @csrf
                                            @method('PUT')
                                            <!-- Informations du client -->

                                            <h6>
                                                <i class="step-icon la la-user"></i>
                                                Informations du client (Accueil)
                                            </h6>

                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="prenom">Prénom <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="prenom" name="prenom" type="text" value="{{ $client->prenom }}" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nom">Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="nom" name="nom" type="text" value="{{ $client->nom }}" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="telephone">N° de Téléphone <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="telephone" name="telephone" type="text" value="{{ $client->telephone }}" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="carte_identite">N° de carte Nationale d’identité</label>
                                                            <input class="form-control" id="carte_identite" name="carte_identite" type="text" value="{{ $client->carte_identite }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date_naissance">Date de naissance</label>
                                                            <input class="form-control" id="date_naissance" name="date_naissance" type="date" value="{{ $client->date_naissance }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lieu_naissance">Lieu de naissance</label>
                                                            <input class="form-control" id="lieu_naissance" name="lieu_naissance" type="text" value="{{ $client->lieu_naissance }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="profession">Profession</label>
                                                            <input class="form-control" id="profession" name="profession" type="text" value="{{ $client->profession }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sexe">Sexe :<span class="text-danger">*</span></label>
                                                            <select class="form-control" id="sexe" name="sexe" required>
                                                                <option value="M" @if($client->sexe == 'M') selected @endif>Masculin</option>
                                                                <option value="F" @if($client->sexe == 'F') selected @endif>Féminin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="assurance">Assurance</label>
                                                            <input class="form-control" id="assurance" name="assurance" type="text" value="{{ $client->assurance }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="societe_attache">Société d’attache</label>
                                                            <input class="form-control" id="societe_attache" name="societe_attache" type="text" value="{{ $client->societe_attache }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Informations supplémentaires (Médecin/Administrateur) -->
                                            @if(auth()->user()->role_id == 3)
                                            <fieldset>
                                                <h6>
                                                    <i class="step-icon la la-plus"></i>
                                                    Informations supplémentaires (Médecin/Administrateur)
                                                </h6>
                                                <!-- Ajoutez ici les champs pré-remplis avec les valeurs existantes du client -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="disciplines_pratiquees">Discipline(s) pratiquée(s)</label>
                                                            <input class="form-control" id="disciplines_pratiquees" name="disciplines_pratiquees" type="text" value="{{ $client->disciplines_pratiquees }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date_debut">Date de début</label>
                                                            <input class="form-control" id="date_debut" name="date_debut" type="date" value="{{ $client->date_debut }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="activite_interpelant_vision">Activité interpelant la vision</label>
                                                            <input class="form-control" id="activite_interpelant_vision" name="activite_interpelant_vision" type="text" value="{{ $client->activite_interpelant_vision }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="antecedents_familiaux">Antécédents familiaux</label>
                                                            <textarea class="form-control" id="antecedents_familiaux" name="antecedents_familiaux">{{ $client->antecedents_familiaux }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="antecedents_chirurgicaux">Antécédents chirurgicaux (avec date) y compris ORL, ophtalmo</label>
                                                            <textarea class="form-control" id="antecedents_chirurgicaux" name="antecedents_chirurgicaux">{{ $client->antecedents_chirurgicaux }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="traitements_en_cours">Traitements en cours</label>
                                                            <textarea class="form-control" id="traitements_en_cours" name="traitements_en_cours">{{ $client->traitements_en_cours }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="allergies">Allergies</label>
                                                            <textarea class="form-control" id="allergies" name="allergies">{{ $client->allergies }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mentions_generales">Mentions générales</label>
                                                            <textarea class="form-control" id="mentions_generales" name="mentions_generales">{{ $client->mentions_generales }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="portez_vous_des_lunettes">Portez-vous des lunettes ?</label>
                                                            <select class="form-control" id="portez_vous_des_lunettes" name="portez_vous_des_lunettes">
                                                                <option value="" disabled selected>Sélectionnez</option>
                                                                <option value="1" @if($client->portez_vous_des_lunettes == 1) selected @endif>Oui</option>
                                                                <option value="0" @if($client->portez_vous_des_lunettes == 0) selected @endif>Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="besoin_changer_lunettes">Avez-vous besoin de changer de lunettes ?</label>
                                                            <select class="form-control" id="besoin_changer_lunettes" name="besoin_changer_lunettes">
                                                                <option value="" disabled selected>Sélectionnez</option>
                                                                <option value="1" @if($client->besoin_changer_lunettes == 1) selected @endif>Oui</option>
                                                                <option value="0" @if($client->besoin_changer_lunettes == 0) selected @endif>Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="autre_choses">Autre chose à mentionner au besoin</label>
                                                            <textarea class="form-control" id="autre_choses" name="autre_choses">{{ $client->autre_choses }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="diagnostic">Diagnostic</label>
                                                            <textarea class="form-control" id="diagnostic" name="diagnostic">{{ $client->diagnostic }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="prescription">Prescription</label>
                                                            <textarea class="form-control" id="prescription" name="prescription">{{ $client->prescription }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="examen_particulier">Examen particulier</label>
                                                            <textarea class="form-control" id="examen_particulier" name="examen_particulier">{{ $client->examen_particulier }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="rendez_vous">Rendez-vous</label>
                                                            <input class="form-control" id="rendez_vous" name="rendez_vous" type="date" value="{{ $client->rendez_vous }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="choix_service">Choix du Service <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="choix_service" name="choix_service">
                                                            <option value="" selected disabled>Choisissez le service</option>
                                                            <option value="consultation" {{ $client->choix_service == 'consultation' ? 'selected' : '' }}>Consultation</option>
                                                            <option value="entretien_lunettes" {{ $client->choix_service == 'entretien_lunettes' ? 'selected' : '' }}>Entretien de lunettes</option>
                                                            <option value="caisse" {{ $client->choix_service == 'caisse' ? 'selected' : '' }}>Caisse</option>
                                                            <option value="service_vente" {{ $client->choix_service == 'service_vente' ? 'selected' : '' }}>Service vente</option>
                                                            <option value="visite_simple" {{ $client->choix_service == 'visite_simple' ? 'selected' : '' }}>Visite Simple</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Bouton de soumission -->
                                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                        </form>
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
