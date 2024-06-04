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
                                    <h4 class="card-title text-center"><u>Fiche journalière</u></h4>
                                    <!-- Boutons de navigation -->
                                    <div class="text-center">
                                        <button class="btn btn-primary btn-switch" data-target="entreprise">Entreprise</button>
                                        <button class="btn btn-primary btn-switch" data-target="rdv">Rendez-vous du jour</button>
                                        <button class="btn btn-primary btn-switch" data-target="nettoyage">Nettoyage</button>
                                    </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form action="{{ route('commercial.store') }}" method="POST">
                                        @csrf <!-- Ajout du jeton CSRF -->
                                        <div class="form-group">
                                            <label for="date">Date<span class="text-danger">*</span></label>
                                            <input class="form-control" id="date" name="date" type="date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nom_commercial">Nom du commercial<span class="text-danger">*</span></label>
                                            <input class="form-control" id="commercial_name" name="commercial_name" type="text" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_rdv">Date du rendez-vous<span class="text-danger">*</span></label>
                                            <input class="form-control" id="date_rdv" name="date_rdv" type="date" required>
                                        </div>
                                                                 <!-- Section Entreprise -->
                                        <div class="form-section" id="entreprise-section">
                                            <h5 class="text-center">Entreprises</h5>
                                            <div class="form-group">
                                                <label for="entreprise_nom">Entreprise visitée</label>
                                                <input class="form-control" id="entreprise_nom" name="entreprise_nom" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="entreprise_responsable">Nom/Titre du responsable contacté</label>
                                                <input class="form-control" id="entreprise_responsable" name="entreprise_responsable" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="entreprise_contact">Contact</label>
                                                <input class="form-control" id="entreprise_contact" name="entreprise_contact" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="entreprise_heure">Heure du Rendez-vous</label>
                                                <input class="form-control" id="entreprise_heure" name="entreprise_heure" type="text">
                                            </div>
                                        </div>
                                                                        <!-- Section Rendez-vous -->
                                        <div class="form-section" id="rdv-section" style="display: none;">
                                        <h4 class="text-center"> <u>Prestations offertes ou obtenues</u></h4> <br>
                                            <h5 class="text-center">Rendez-vous du jour</h5>
                                            <div class="form-group">
                                                <label for="rdv_nom_prenom">Nom/Prenom</label>
                                                <input class="form-control" id="rdv_nom_prenom" name="rdv_nom_prenom" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="rdv_contact">Contact</label>
                                                <input class="form-control" id="rdv_contact" name="rdv_contact" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="rdv_societe">Société</label>
                                                <input class="form-control" id="rdv_societe" name="rdv_societe" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="rdv_heure">Heure du Rendez-vous</label>
                                                <input class="form-control" id="rdv_heure" name="rdv_heure" type="text">
                                            </div>
                                        </div>
                                                                     <!-- Section Nettoyage -->
                                        <div class="form-section" id="nettoyage-section" style="display: none;">
                                            <h4 class="text-center"> <u>Prestations offertes ou obtenues</u></h4> <br>
                                            <h5 class="text-center"> Nettoyage</h5>
                                            <div class="form-group">
                                                <label for="nettoyage_nom_prenom">Nom/Prenom</label>
                                                <input class="form-control" id="nettoyage_nom_prenom" name="nettoyage_nom_prenom" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="nettoyage_contact">Contact</label>
                                                <input class="form-control" id="nettoyage_contact" name="nettoyage_contact" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="nettoyage_societe">Société</label>
                                                <input class="form-control" id="nettoyage_societe" name="nettoyage_societe" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="nettoyage_heure">Heure du Rendez-vous</label>
                                                <input class="form-control" id="nettoyage_heure" name="nettoyage_heure" type="text">
                                            </div>
                                        </div>
                                        <!-- Bouton de soumission -->
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
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


<script>
    $(document).ready(function() {
        // Fonction pour basculer la visibilité des sections
        $(".btn-switch").click(function() {
            var target = $(this).data("target");
            $(".form-section").hide();
            $("#" + target + "-section").show();
        });
    });
</script>
@yield('script')
