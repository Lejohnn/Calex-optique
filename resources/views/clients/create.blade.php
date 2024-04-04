@extends('layouts.app')

@section('title', 'Ajouter un Client')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Add Client Form -->
            <section id="add-client">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ajouter un Client</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{ route('clients.store') }}" method="POST" class="add-client-form">
                                            @csrf
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
                                                            <input class="form-control" id="prenom" name="prenom" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nom">Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="nom" name="nom" type="text" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="telephone">N° de Téléphone <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="telephone" name="telephone" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="carte_identite">N° de carte Nationale d’identité</label>
                                                            <input class="form-control" id="carte_identite" name="carte_identite" type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date_naissance">Date de naissance</label>
                                                            <input class="form-control" id="date_naissance" name="date_naissance" type="date" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lieu_naissance">Lieu de naissance</label>
                                                            <input class="form-control" id="lieu_naissance" name="lieu_naissance" type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="profession">Profession</label>
                                                            <input class="form-control" id="profession" name="profession" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sexe">Sexe :<span class="text-danger">*</span></label>
                                                            <select class="form-control" id="sexe" name="sexe" required>
                                                                <option value="" selected disabled>Sélectionnez le sexe</option>
                                                                <option value="M">Masculin</option>
                                                                <option value="F">Féminin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="assurance">Assurance</label>
                                                            <input class="form-control" id="assurance" name="assurance" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="societe_attache">Société d’attache</label>
                                                            <input class="form-control" id="societe_attache" name="societe_attache" type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Informations supplémentaires (Médecin/Administrateur) -->
                                            <h6>
                                                <i class="step-icon la la-plus"></i>
                                                Informations supplémentaires (Médecin/Administrateur)
                                            </h6>
                                            <fieldset>
                                                <!-- Ajoutez ici les nouveaux champs pour les informations supplémentaires -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="disciplines_pratiquees">Discipline(s) pratiquée(s)</label>
                                                            <input class="form-control" id="disciplines_pratiquees" name="disciplines_pratiquees" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date_debut">Date de début</label>
                                                            <input class="form-control" id="date_debut" name="date_debut" type="date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="activite_interpelant_vision">Activité interpelant la vision</label>
                                                            <input class="form-control" id="activite_interpelant_vision" name="activite_interpelant_vision" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="antecedents_familiaux">Antécédents familiaux</label>
                                                            <textarea class="form-control" id="antecedents_familiaux" name="antecedents_familiaux"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="antecedents_chirurgicaux">Antécédents chirurgicaux (avec date) y compris ORL, ophtalmo</label>
                                                            <textarea class="form-control" id="antecedents_chirurgicaux" name="antecedents_chirurgicaux"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="traitements_en_cours">Traitements en cours</label>
                                                            <textarea class="form-control" id="traitements_en_cours" name="traitements_en_cours"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="allergies">Allergies</label>
                                                            <textarea class="form-control" id="allergies" name="allergies"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mentions_generales">Mentions générales</label>
                                                            <textarea class="form-control" id="mentions_generales" name="mentions_generales"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="portez_vous_des_lunettes">Portez-vous des lunettes ?</label>
                                                            <select class="form-control" id="portez_vous_des_lunettes" name="portez_vous_des_lunettes">
                                                                <option value="" selected disabled>Choisissez</option>
                                                                <option value="1">Oui</option>
                                                                <option value="0">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="besoin_changer_lunettes">Avez-vous besoin de changer de lunettes ?</label>
                                                            <select class="form-control" id="besoin_changer_lunettes" name="besoin_changer_lunettes">
                                                            <option value="" selected disabled>Choisissez</option>
                                                                <option value="1">Oui</option>
                                                                <option value="0">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="autre_choses">Autre chose à mentionner au besoin</label>
                                                            <textarea class="form-control" id="autre_choses" name="autre_choses"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Bouton de soumission -->
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
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

@section('script')
<!-- Vos scripts supplémentaires ici -->
@endsection


@yield('script')

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