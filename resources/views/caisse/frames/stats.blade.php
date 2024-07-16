@extends('layouts.app')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <h1 class="mb-4 text-center">Statistiques des Montures</h1>
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card card-hover text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Total Montures en Stock</h5>
                            <p class="card-text display-4">{{ $totalFrames }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card card-hover text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Montures Activées</h5>
                            <p class="card-text display-4">{{ $activeFrames }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card card-hover text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Montures Désactivées</h5>
                            <p class="card-text display-4">{{ $inactiveFrames }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card card-hover text-white bg-danger">
                        <div class="card-body">
                            <h5 class="card-title">Désactivées Aujourd'hui</h5>
                            <p class="card-text display-4">{{ $inactiveFramesToday }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-hover:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
</style>

<script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend/js/core/app.js') }}"></script>
