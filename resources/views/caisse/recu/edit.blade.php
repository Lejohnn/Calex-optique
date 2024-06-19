@extends('layouts.app')

@section('title', 'Modifier le Reçu')

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
                                    <h4 class="card-title">Modifier le Reçu</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
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
                                        <form action="{{ route('recus.update', $receipt->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="nom_client">Nom du Client</label>
                                                <input type="text" name="nom_client" id="nom_client" class="form-control" value="{{ $receipt->nom_client }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="date_reception">Date de Réception</label>
                                                <input type="date" name="date_reception" id="date_reception" class="form-control" value="{{ $receipt->date_reception }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="montant_du">Montant dû</label>
                                                <input type="number" name="montant_du" id="montant_du" class="form-control" value="{{ $receipt->montant_du }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="montant">Montant</label>
                                                <input type="number" name="montant" id="montant" class="form-control" value="{{ $receipt->montant }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="reste">Reste</label>
                                                <input type="number" name="reste" id="reste" class="form-control" value="{{ $receipt->reste }}" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="autre_versement">Autre Versement</label>
                                                <input type="number" name="autre_versement" id="autre_versement" class="form-control" value="0" step="0.01">
                                            </div>

                                            <div class="form-group">
                                                <label for="last_updated">Dernière Modification</label>
                                                <input type="text" id="last_updated" class="form-control" value="{{ $receipt->updated_at->format('d/m/Y H:i:s') }}" readonly>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                            <a href="{{ route('caisse.recu.index') }}" class="btn btn-secondary">Annuler</a>
                                        </form>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                function updateAutreVersementReadonly() {
                                                    var reste = document.getElementById('reste').value;
                                                    var autreVersement = document.getElementById('autre_versement');
                                                    if (parseFloat(reste) === 0) {
                                                        autreVersement.readOnly = true;
                                                    } else {
                                                        autreVersement.readOnly = false;
                                                    }
                                                }

                                                updateAutreVersementReadonly(); // Check on page load

                                                // Update on change event
                                                document.getElementById('reste').addEventListener('input', updateAutreVersementReadonly);
                                            });
                                        </script>
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




<!-- Scripts -->
<script src="{{asset('backend/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('backend/js/core/app-menu.js')}}"></script>
<script src="{{asset('backend/js/core/app.js')}}"></script>
<script src="{{asset('backend/js/scripts/pages/hospital-patients-list.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
