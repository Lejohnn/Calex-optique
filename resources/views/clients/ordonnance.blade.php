@extends('layouts.app')

@section('title', 'Générer une Ordonnance')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Génération d'une Ordonnance -->
            <section id="ordonnance-generation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Générer une Ordonnance</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('ordonnance.generate') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nom_patient">Nom du Patient</label>
                                            <input type="text" id="nom_patient" name="nom_patient" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="medicaments">Médicaments</label>
                                            <textarea id="medicaments" name="medicaments" class="form-control" rows="5" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="instructions">Instructions</label>
                                            <textarea id="instructions" name="instructions" class="form-control" rows="5" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Générer l'Ordonnance</button>
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
