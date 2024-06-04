@extends('layouts.app')

@section('title', 'Modifier un Utilisateur')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Edit User Form -->
            <section id="edit-user">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modifier un Utilisateur</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">
                                        {{Session::get('success')}}
                                        </div>
                                        @endif
                                        @if (count($errors)> 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{ route('users.update', $user) }}" method="POST" class="edit-user-form">

                                            @csrf
                                            @method('PUT')
                                            <!-- Informations de l'utilisateur -->
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nom <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Email <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="email" name="email" type="email" value="{{ $user->email }}" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role">Rôle <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="role" name="role_id" required>
                                                                <option value="" disabled selected>Choisissez le rôle</option>
                                                                @foreach($roles as $role)
                                                                <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Bouton de soumission -->
                                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
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
