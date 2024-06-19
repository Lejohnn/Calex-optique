@extends('layouts.app')

@section('title', 'Statistiques des commerciaux ')

@section('contenu')
<script src="{{ asset('backend/vendors/js/tables/datatable/datatables.min.js') }}"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Statistiques des Commerciaux -->
            <section id="commercial-stats">
                <div class="row">
                    @foreach($commercials as $commercial)
                    <div class="col-xl-3 col-md-6 col-12">
                        <a href="{{ route('commercial.prospects', $commercial->id) }}" class="card-link">
                            <div class="card" data-commercial-id="{{ $commercial->id }}">
                                <div class="card-header">
                                    <h4 class="card-title">{{ $commercial->name }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-body">
                                            <h5 class="text-bold-700 mb-0">{{ $commercial->prospects_today }}</h5>
                                            <span>Prospects ajoutés aujourd'hui</span>
                                        </div>
                                        <div class="media-right ml-2">
                                            <i class="icon-user font-large-2"></i>
                                        </div>
                                    </div>
                                    <div class="media d-flex align-items-center mt-1">
                                        <div class="media-body">
                                            <h5 class="text-bold-700 mb-0">{{ $commercial->total_prospects }}</h5>
                                            <span>Total des prospects</span>
                                        </div>
                                        <div class="media-right ml-2">
                                            <i class="icon-users font-large-2"></i>
                                        </div>
                                    </div>
                                    <div class="media d-flex align-items-center mt-1">
                                        <div class="media-body">
                                            <h5 class="text-bold-700 mb-0" style="color: {{ $commercial->daily_note['color'] }}">
                                                {{ $commercial->daily_note['note'] }}
                                            </h5>
                                            <span>Note quotidienne</span>
                                        </div>
                                        <div class="media-right ml-2">
                                            <i class="icon-star font-large-2" style="color: {{ $commercial->daily_note['color'] }}"></i>
                                        </div>
                                    </div>
                                    <div class="media d-flex align-items-center mt-1">
                                        <div class="media-body">
                                            <h5 class="text-bold-700 mb-0">{{ $commercial->points }}</h5>
                                            <span>Points</span>
                                        </div>
                                        <div class="media-right ml-2">
                                            <i class="icon-trophy font-large-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
</div>



<!-- Ajouter une div pour afficher la liste des prospects -->
<div id="prospects-list"></div>

<!-- Bouton pour accéder aux performances mensuelles -->
<a href="{{ route('performance') }}" class="btn btn-primary monthly-performance-btn">
    Performances Mensuelles
</a>
@endsection


    <!-- Ajouter ce script à la fin de votre vue principale -->
    {{-- <script>
        $(document).ready(function() {
            $('.card-link').on('click', function(e) {
                e.preventDefault();
                let commercialId = $(this).find('.card').data('commercial-id');
                $.ajax({
                    url: `/api/commercials/${commercialId}/prospects`,
                    method: 'GET',
                    success: function(data) {
                        let prospectsList = '<ul>';
                        data.forEach(prospect => {
                            prospectsList += `<li>${prospect.entreprise_nom} - ${prospect.date_rdv}</li>`;
                        });
                        prospectsList += '</ul>';
                        $('#prospects-list').html(prospectsList);
                    }
                });
            });
        });
    </script> --}}

    <!-- CSS pour effet hover -->
    <style>
        .card-link {
            text-decoration: none;
        }

        .card-link .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-link .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .monthly-performance-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
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

