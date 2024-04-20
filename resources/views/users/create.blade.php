@extends('layouts.app')

@section('title', 'Ajouter un Utilisateur')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Add User Form -->
            <section id="add-user">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ajouter un Utilisateur</h4>
                                </div>
                                @if(session('success'))
                                    <br>
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{ route('users.store') }}" method="POST" class="add-user-form">
                                            @csrf
                                            <!-- Informations de l'utilisateur -->
                                            <h6>
                                                <i class="step-icon la la-user"></i>
                                                Informations de l'utilisateur
                                            </h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="name" name="name" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Adresse email <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="email" name="email" type="email" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">Mot de passe <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="password" name="password" type="password" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role">Rôle <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="role" name="role_id" required>
                                                                <option value="">Sélectionner un rôle</option>
                                                                @foreach($roles as $role)
                                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @foreach($roles as $role)
                                                            <div id="description_{{ $role->id }}" class="role-description" style="display: none;">
                                                                {{ $role->description }}
                                                            </div>
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- Bouton de soumission -->
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fonction pour afficher la description du rôle sélectionné
        function showRoleDescription() {
            // Récupérer la valeur sélectionnée dans la liste déroulante
            var roleId = document.getElementById('role').value;
            // Masquer toutes les descriptions de rôle
            var roleDescriptions = document.querySelectorAll('.role-description');
            roleDescriptions.forEach(function (description) {
                description.style.display = 'none';
            });
            // Afficher la description du rôle sélectionné
            var selectedRoleDescription = document.getElementById('description_' + roleId);
            if (selectedRoleDescription) {
                selectedRoleDescription.style.display = 'block';
            }
        }

        // Ajouter un écouteur d'événement de changement à la liste déroulante
        var roleSelect = document.getElementById('role');
        roleSelect.addEventListener('change', function () {
            showRoleDescription();
        });

        // Appeler la fonction une fois pour afficher la description initiale
        showRoleDescription();
    });
</script>


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
