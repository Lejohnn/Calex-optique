@extends('layouts.app')

@section('title', 'Performance Mensuelle')

@section('contenu')
<link rel="stylesheet" href="{{ asset('backend/vendors/css/tables/datatable/datatables.min.css') }}">
<style>
    .card-header {
        background-color: #f4f4f4;
        border-bottom: 1px solid #ddd;
    }

    .card-title {
        margin-bottom: 0;
    }

    .card-body {
        padding: 20px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    table.dataTable {
        width: 100% !important;
    }

    .statistics-card {
        margin-bottom: 20px;
    }

    .statistics-card .card-header {
        border-bottom: 2px solid #007bff;
    }

    .statistics-card .card-body {
        padding-top: 20px;
    }

    .total-card .card-header {
        border-bottom: 2px solid #28a745;
    }

    .total-card .card-body {
        padding-top: 20px;
    }
</style>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Détails du Prospect -->
            <section id="prospect-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Performances Mensuelles des Commerciaux</h3>
                            </div>
                        </div>
                        <div class="card-body collapse show">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th>Commercial</th>
                                            <th>Mois</th>
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($commercials as $commercial)
                                            {{-- {{ dd($commercial->monthlyPerformances) }} <!-- Ajoutez ceci pour vérifier les données dans la vue --> --}}
                                            @foreach($commercial->monthlyPerformances as $performance)
                                                <tr>
                                                    <td>{{ $commercial->full_name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($performance->month)->format('F Y') }}</td>
                                                    <td>{{ $performance->points }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

             <!-- Statistiques -->
             <section id="statistics">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card statistics-card">
                            <div class="card-header">
                                @if(isset($lastMonth))
                                    <h4 class="card-title">Statistiques du Mois Passé ({{ \Carbon\Carbon::parse($lastMonth)->format('F Y') }})</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <!-- Afficher les statistiques du mois passé -->
                                @php
                                    $lastMonthStats = [];
                                    foreach ($commercials as $commercial) {
                                        foreach ($commercial->monthlyPerformances as $performance) {
                                            $month = \Carbon\Carbon::parse($performance->month);
                                            if ($month->format('Y-m') === now()->subMonth()->format('Y-m')) {
                                                if (!isset($lastMonthStats[$commercial->id])) {
                                                    $lastMonthStats[$commercial->id] = [
                                                        'name' => $commercial->full_name,
                                                        'points' => 0,
                                                    ];
                                                }
                                                $lastMonthStats[$commercial->id]['points'] += $performance->points;
                                            }
                                        }
                                    }
                                @endphp
                                @foreach ($lastMonthStats as $stats)
                                    <p>{{ $stats['name'] }}: {{ $stats['points'] }} points</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card statistics-card">
                            <div class="card-header">
                                {{-- @if(isset($currentMonth)) --}}
                                    <h4 class="card-title">Statistiques du Mois en Cours ({{ \Carbon\Carbon::parse($currentMonth)->format('F Y') }})</h4>
                                {{-- @endif --}}
                            </div>
                            <div class="card-body">
                                <!-- Afficher les statistiques du mois en cours -->
                                @php
                                $currentMonthStats = [];
                                foreach ($commercials as $commercial) {
                                    foreach ($commercial->monthlyPerformances as $performance) {
                                        $month = \Carbon\Carbon::parse($performance->month);
                                        if ($month->format('Y-m') === now()->format('Y-m')) {
                                            if (!isset($currentMonthStats[$commercial->id])) {
                                                $currentMonthStats[$commercial->id] = [
                                                    'name' => $commercial->full_name,
                                                    'points' => 0,
                                                ];
                                            }
                                            $currentMonthStats[$commercial->id]['points'] += $performance->points;
                                        }
                                    }
                                }
                            @endphp
                            @foreach ($currentMonthStats as $stats)
                                <p>{{ $stats['name'] }}: {{ $stats['points'] }} points</p>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card total-card">
                            <div class="card-header">
                                <h4 class="card-title">Total de Tous les Mois</h4>
                            </div>
                            <div class="card-body">
                                <!-- Afficher le total de toutes les performances par commercial -->
                                @foreach ($commercials as $commercial)
                                    @php
                                        $totalPoints = 0;
                                        foreach ($commercial->monthlyPerformances as $performance) {
                                            $totalPoints += $performance->points;
                                        }
                                    @endphp
                                    <p>Total de tous les mois pour {{ $commercial->full_name }}: {{ $totalPoints }} points</p>
                                @endforeach
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>
