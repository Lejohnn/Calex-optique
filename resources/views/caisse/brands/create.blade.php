@extends('layouts.app')

@section('title', 'Ajouter une Marque')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="add-brand">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ajouter une Marque</h4>
                                    <div class="heading-elements">
                                        <a href="{{ route('brands.index') }}" class="btn btn-primary">
                                            <i class="la la-list font-small-2"></i> Voir les Marques
                                        </a>
                                    </div>
                                </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{ route('brands.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Nom de la Marque <span class="text-danger">*</span></label>
                                                <input type="text" id="name" name="name" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
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

<script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend/js/core/app.js') }}"></script>
