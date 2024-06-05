@extends('layouts.app')

@section('title', 'Prospects de ' . $commercial->full_name)

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="prospects-list">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-4">Prospects de {{ $commercial->full_name }}</h2>
                        @if($prospects->isEmpty())
                            <p>Aucun prospect trouvé pour ce commercial.</p>
                        @else
                            <div class="row">
                                @foreach($prospects as $prospect)
                                    <div class="col-md-4">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h4 class="card-title">{{ $prospect->entreprise_nom }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Date :</strong> {{ $prospect->date }}</p>
                                                <p><strong>Responsable :</strong> {{ $prospect->entreprise_responsable }}</p>
                                                <p><strong>Contact :</strong> {{ $prospect->entreprise_contact }}</p>
                                                <p><strong>Heure de l'entreprise :</strong> {{ $prospect->entreprise_heure }}</p>
                                                <p><strong>Rubrique :</strong> {{ $prospect->rubrique }}</p>
                                                <p><strong>Heure du rendez-vous :</strong> {{ $prospect->rdv_heure }}</p>
                                                <p><strong>Date du rendez-vous :</strong> {{ $prospect->date_rdv }}</p>
                                                <p><strong>Statut :</strong>
                                                    <span class="badge badge-{{ $prospect->statut == 'ok' ? 'success' : ($prospect->statut == 'verifie' ? 'info' : ($prospect->statut == 'pas_bon' ? 'danger' : 'warning')) }}">
                                                        {{ ucfirst($prospect->statut) }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
    <style>
        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .badge-success {
            background-color: #28a745;
        }
        .badge-info {
            background-color: #17a2b8;
        }
        .badge-danger {
            background-color: #dc3545;
        }
        .badge-warning {
            background-color: #ffc107;
        }
    </style>


 <!-- BEGIN: Vendor JS-->
 <script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
 <!-- BEGIN Vendor JS-->

 <!-- BEGIN: Page Vendor JS-->
 <script src="{{ asset('backend/vendors/js/tables/datatable/datatables.min.js') }}"></script>
 <!-- END: Page Vendor JS-->

 <!-- BEGIN: Theme JS-->
 <script src="{{ asset('backend/js/core/app-menu.js') }}"></script>
 <script src="{{ asset('backend/js/core/app.js') }}"></script>
 <!-- END: Theme JS-->

 <!-- BEGIN: Page JS-->
 <script src="{{ asset('backend/js/scripts/pages/hospital-patients-list.js') }}"></script>
 <!-- END: Page JS-->

 <!-- jQuery CDN -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

