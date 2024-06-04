@extends('layouts.app')

@section('title')
      Dashboard
@endsection

@section('contenu')
     <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="welcome-message">
                            <div class="welcome-container">
                                <h1 class="welcome-title">Bienvenue, {{ Auth::user()->name }} !</h1>
                                <p class="welcome-subtitle">Nous sommes ravis de vous revoir. Découvrez les dernières mises à jour et ... Bon Boulot à Vous pour cette nouvelle journée</p>
                                <a class="btn btn-primary welcome-button" href="{{ route('notifications.index') }}">Notifications</a>
                            </div>
                        </div>
                    </div>
                </div>

                @if(auth()->user()->role_id == 1)
                <div class="row mt-4">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h2>nbre de factures aujourd'hui</h2>
                                            <h3 class="info">{{$billingMangement[0]}}</h3>
                                            <h6>l'argent généré par ces factures</h6>
                                            <h3 class="info"><span>{{$billingMangement[1]}}</span> FCFA</h3>
                                        </div>
                                        <div>
                                            <i class="icon-basket-loaded info font-large-1 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h5>nb person traités par le medecin /nbre de personnes qui l'ont sollicité</h5>
                                            @foreach($allStatsClients as $allStatsClient)
                                                <div>
                                                    <span>{{$allStatsClient[0]}}: </span>
                                                    <span class="fw-bold badge bg-warning fs-4 ml-50">
                                                        <span>{{$allStatsClient[1]}}</span>/
                                                        <span>{{$allStatsClient[2]}}</span>
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div>
                                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">{{$newClientByTotal[0]}}/{{$newClientByTotal[1]}}</h3>
                                            <h6>Nouveaux Clients/Total</h6>
                                        </div>
                                        <div>
                                            <i class="icon-user-follow success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h5>nb person traités par la caisse /nbre de personnes qui l'ont sollicité</h5>
                                            @foreach($allStatsPatients as $allStatsPatient)
                                                <div>
                                                    <span>{{$allStatsPatient[0]}}: </span>
                                                    <span class="fw-bold badge bg-danger fs-4 ml-50">
                                                        <span>{{$allStatsPatient[1]}}</span>/
                                                        <span>{{$allStatsPatient[2]}}</span>
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div>
                                            <i class="icon-heart danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- END: Content-->
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

<style>
    .welcome-message {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
        background-color: #f0f2f5;
    }
    .welcome-container {
        text-align: center;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .welcome-title {
        font-size: 2.5rem;
        margin-bottom: 10px;
        color: #007bff;
    }
    .welcome-subtitle {
        font-size: 1.25rem;
        margin-bottom: 20px;
        color: #6c757d;
    }
    .welcome-button {
        font-size: 1rem;
        padding: 10px 20px;
    }
</style>
