@extends('layouts.app')

@section('title', 'Détails de l\'utilisateur')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- User Details -->
            <section id="user-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Détails de l'utilisateur <strong>{{ $user->name }}</strong></h3>
                                <div class="heading-elements">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-arrow-left"></i> Retour à la liste des utilisateurs
                                    </a>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <fieldset class="col-md-6">
                                            <div class="user-detail">
                                                <h4 class="mb-3">Informations générales:</h4>
                                                <ul>
                                                    <li><strong>Nom:</strong> {{ $user->name }}</li>
                                                    <li><strong>Email:</strong> {{ $user->email }}</li>
                                                </ul>
                                            </div>
                                        </fieldset>
                                        <fieldset class="col-md-6">
                                            <div class="user-detail">
                                                <h4 class="mb-3">Rôle:</h4>
                                                <p>{{ $user->role->name }}</p>
                                            </div>
                                        </fieldset>
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

