@extends('layouts.app')

@section('title', 'Liste des Commerciaux')

@section('contenu')
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Liste des Commerciaux -->
            <section id="commercial-list">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste des Commerciaux</h4>
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
                                <div class="heading-elements">
                                    <a href="" class="btn btn-primary  ">
                                        <i class="la la-plus font-small-2"></i> Autre
                                    </a>
                                </div>
                            </div>
                            <div class="card-body collapse show">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered datatable">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Nom du Commercial</th>
                                                <th>Entreprise</th>
                                                <th>Responsable</th>
                                                <th>Contact</th>
                                                <th>Heure du Rendez-vous</th>
                                                <th>Nom/Prenom du Rendez-vous</th>
                                                <th>Contact du Rendez-vous</th>
                                                <th>Société du Rendez-vous</th>
                                                <th>Heure du Rendez-vous</th>
                                                <th>Nom/Prenom du Nettoyage</th>
                                                <th>Contact du Nettoyage</th>
                                                <th>Société du Nettoyage</th>
                                                <th>Heure du Nettoyage</th>
                                                <th>Date du Rendez-vous</th>
                                                {{-- <th>Statut</th>
                                                <th>Actions</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach($prospects as $commercial)
                                                @php
                                                $backgroundClass = '';

                                                switch ($commercial->statut) {
                                                    case 'pas_encore':
                                                        $backgroundClass = 'table-warning'; // Utiliser la classe de couleur d'avertissement de Bootstrap pour l'orange
                                                        break;
                                                    case 'verifie':
                                                        $backgroundClass = 'table-success'; // Utiliser la classe de couleur de succès de Bootstrap pour le vert
                                                        break;
                                                    case 'pas_bon':
                                                        $backgroundClass = 'table-danger'; // Utiliser la classe de couleur de danger de Bootstrap pour le rouge
                                                        break;
                                                    default:
                                                        $backgroundClass = '';
                                                        break;
                                                }
                                                @endphp
                                            <tr class="{{ $backgroundClass }}">
                                                <td>{{ $commercial->date }}</td>
                                                <td>{{ $commercial->commercial_name }}</td>
                                                <td>{{ $commercial->entreprise_nom }}</td>
                                                <td>{{ $commercial->entreprise_responsable }}</td>
                                                <td>{{ $commercial->entreprise_contact }}</td>
                                                <td>{{ $commercial->entreprise_heure }}</td>
                                                <td>{{ $commercial->rdv_nom_prenom }}</td>
                                                <td>{{ $commercial->rdv_contact }}</td>
                                                <td>{{ $commercial->rdv_societe }}</td>
                                                <td>{{ $commercial->rdv_heure }}</td>
                                                <td>{{ $commercial->nettoyage_nom_prenom }}</td>
                                                <td>{{ $commercial->nettoyage_contact }}</td>
                                                <td>{{ $commercial->nettoyage_societe }}</td>
                                                <td>{{ $commercial->nettoyage_heure }}</td>
                                                <td>{{ $commercial->date_rdv }}</td>
                                                {{-- <td>
                                                    <form action="{{ route('commercial.updateStatus', $commercial->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select class="form-control" name="statut" onchange="this.form.submit()">
                                                            <option value="pas_encore" {{ $commercial->statut === 'pas_encore' ? 'selected' : '' }}>Pas encore</option>
                                                            <option value="verifie" {{ $commercial->statut === 'verifie' ? 'selected' : '' }}>Vérifié</option>
                                                            <option value="pas_bon" {{ $commercial->statut === 'pas_bon' ? 'selected' : '' }}>Pas bon</option>
                                                            <option value="ok" {{ $commercial->statut === 'ok' ? 'selected' : '' }}>Ok</option>
                                                        </select>
                                                    </form>
                                                </td> --}}
                                                {{-- <td>
                                                    <a href="{{ route('commercial.show', $commercial->id) }}"><i class="ft-eye text-info"></i></a>
                                                    <a href="{{ route('commercial.edit', $commercial->id) }}"><i class="ft-edit text-success ml-1"></i></a>
                                                    <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal{{ $commercial->id }}"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteConfirmationModal{{ $commercial->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $commercial->id }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $commercial->id }}">Confirmation de suppression</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Êtes-vous sûr de vouloir supprimer le commercial <strong>{{ $commercial->commercial_name }}</strong>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                    <form id="delete-form-{{ $commercial->id }}" action="{{ route('commercial.destroy', $commercial->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('backend/js/core/app-menu.js')}}"></script>
<script src="{{asset('backend/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('backend/js/scripts/pages/hospital-patients-list.js')}}"></script>
<!-- END: Page JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>

