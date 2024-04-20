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
                                    <h4 class="card-title text-center">Fiche journalière</h4>
                                    <h5 class="text-center">Date: <input class="form-control" id="date" name="date" type="date" /></h5>
                                    <h5 class="text-center">Nom du commercial: <input class="form-control" id="nom_commercial" name="nom_commercial" type="text" /></h5>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{ route('commercial.update', $commercial) }}" method="POST" class="edit-commercial-form">
                                            @csrf
                                            @method('PUT')
                                            <!-- Informations du client -->
                                            <h6 class="text-center">(Entreprise visitée, Nom/Titre du responsable contacté, contact, heure)</h6>
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
                                                <label for="contact_prestation">Contact</label>
                                                <input class="form-control" id="contact_prestation" name="contact_prestation" type="text" />
                                            </div>

                                            <div class="form-group">
                                                <label for="societe">Société</label>
                                                <input class="form-control" id="societe" name="societe" type="text" />
                                            </div>

                                            <div class="form-group">
                                                <label for="heure_prestation">Heure</label>
                                                <input class="form-control" id="heure_prestation" name="heure_prestation" type="text" />
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

@section('script')

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
@endsection
@yield('script')
