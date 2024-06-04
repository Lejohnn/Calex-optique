@extends('layouts.app')

@section('title', 'Détails de l\'Ordonnance')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Détails de l'Ordonnance -->
            <section id="prescription-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Détails de l'Ordonnance</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p><strong>ID:</strong> {{ $prescription->id }}</p>
                                    <p><strong>Nom du Patient:</strong> {{ $prescription->nom_patient }}</p>
                                    <p><strong>Âge:</strong> {{ $prescription->age }}</p>
                                    <p><strong>Date:</strong> {{ $prescription->date->format('d-m-Y') }}</p>
                                    <p><strong>SPH OD:</strong> {{ $prescription->sph_od }}</p>
                                    <p><strong>CYL OD:</strong> {{ $prescription->cyl_od }}</p>
                                    <p><strong>AXE OD:</strong> {{ $prescription->axe_od }}</p>
                                    <p><strong>ADD OD:</strong> {{ $prescription->add_od }}</p>
                                    <p><strong>SPH OG:</strong> {{ $prescription->sph_og }}</p>
                                    <p><strong>CYL OG:</strong> {{ $prescription->cyl_og }}</p>
                                    <p><strong>AXE OG:</strong> {{ $prescription->axe_og }}</p>
                                    <p><strong>ADD OG:</strong> {{ $prescription->add_og }}</p>
                                    <a href="{{ route('prescriptions.index') }}" class="btn btn-primary">Retour à la liste</a>
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
        $('.datatable').DataTable();
    });
</script>
