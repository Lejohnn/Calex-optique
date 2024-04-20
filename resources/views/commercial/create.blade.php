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
                                    <h4 class="card-title text-center">Fiche journalière</h4>
                                    <h5 class="text-center">Date: <input class="form-control" id="date" name="date" type="date" /></h5>
                                    <h5 class="text-center">Nom du commercial: <input class="form-control" id="nom_commercial" name="nom_commercial" type="text" /></h5>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <!-- Informations du client -->

                                        <div class="form-group">
                                            <label for="entreprise">Entreprise visitée</label>
                                            <input class="form-control" id="entreprise" name="entreprise" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label for="responsable">Nom/Titre du responsable contacté</label>
                                            <input class="form-control" id="responsable" name="responsable" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label for="contact">Contact</label>
                                            <input class="form-control" id="contact" name="contact" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label for="heure">Heure</label>
                                            <input class="form-control" id="heure" name="heure" type="text" />
                                        </div>

                                        <h6 class="text-center">(Prestations offertes ou obtenues)</h6>

                                        <div class="form-group">
                                            <label for="nom_prenom">Nom/Prenom</label>
                                            <input class="form-control" id="nom_prenom" name="nom_prenom" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label for="contact">Contact</label>
                                            <input class="form-control" id="contact" name="contact" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label for="societe">Société</label>
                                            <input class="form-control" id="societe" name="societe" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label for="heure">Heure</label>
                                            <input class="form-control" id="heure" name="heure" type="text" />
                                        </div>
                                        <!-- Bouton de soumission -->
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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

@yield('script')
