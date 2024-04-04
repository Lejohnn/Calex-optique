 
@extends('layouts.app')

@section('title')
      Dashbord
@endsection

@section('contenu')
         <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Liste des Clients</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Accueil</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Clients</a>
                                </li>
                                <li class="breadcrumb-item active">Tous les clients
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
                    </div>
                </div> -->
            </div>
            <div class="content-body">
    <!-- List Of All Patients -->
    <section id="patients-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Liste des clients</h2>
                        <!-- @if (Session::has('success'))
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
                                @endif -->
                                <div class="heading-elements">
                                    <a href="{{ route('clients.create') }}" class="btn btn-primary  ">
                                        <i class="la la-plus font-small-2"></i> Ajouter un client
                                    </a>
                                </div> 
                                @if(session('success'))
                                        <br>
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                @endif

                    </div>
                    <div class="card-body collapse show">
                        <div class="card-body card-dashboard">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered patients-list">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Numéro de téléphone</th>
                                        <th>Date de naissance</th>
                                        <th>Lieu de naissance</th>
                                        <th>Numero CNI</th>
                                        <th>Sexe</th>
                                        <th>Profession</th>
                                        <th>Societe d'attache</th>
                                        <th>Assurance</th>
                                        <th>disciplines_pratiquees</th>
                                        <th>date_debut</th>
                                        <th>activite_interpelant_vision</th>
                                        <th>antecedents_familiaux</th>
                                        <th>antecedents_chirurgicaux</th>
                                        <th>traitements_en_cours</th>
                                        <th>allergies</th>
                                        <th>mentions_generales</th>
                                        <th>portez_vous_des_lunettes</th>
                                        <th>besoin_changer_lunettes</th>
                                        <th>autre_choses</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->nom }}</td>
                                        <td>{{ $client->prenom }}</td>
                                        <td>{{ $client->telephone }}</td>
                                        <td>{{ $client->date_naissance }}</td>
                                        <td>{{ $client->lieu_naissance }}</td>
                                        <td>{{ $client->carte_identite }}</td>
                                        <td>{{ $client->sexe }}</td>
                                        <td>{{ $client->profession }}</td>
                                        <td>{{ $client->societe_attache }}</td>
                                        <td>{{ $client->assurance }}</td>
                                        <td>{{ $client->disciplines_pratiquees }}</td>
                                        <td>{{ $client->date_debut }}</td>
                                        <td>{{ $client->activite_interpelant_vision }}</td>
                                        <td>{{ $client->antecedents_familiaux }}</td>
                                        <td>{{ $client->antecedents_chirurgicaux }}</td>
                                        <td>{{ $client->traitements_en_cours }}</td>
                                        <td>{{ $client->allergies }}</td>
                                        <td>{{ $client->mentions_generales }}</td>
                                        <td>{{ $client->portez_vous_des_lunettes ? 'Oui' : 'Non' }}</td>
                                        <td>{{ $client->besoin_changer_lunettes ? 'Oui' : 'Non' }}</td>
                                        <td>{{ $client->autre_choses }}</td>
                                        <td>
                                            <a href="{{ route('clients.show', $client->id) }}"><i class="ft-eye text-info"></i></a>
                                            <a href="{{ route('clients.edit', $client->id) }}"><i class="ft-edit text-success ml-1"></i></a>
                                            <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal{{ $client->id }}"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteConfirmationModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $client->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $client->id }}">Confirmation de suppression</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Êtes-vous sûr de vouloir supprimer le client <strong>{{ $client->nom }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <form id="delete-form-{{ $client->id }}" action="{{ route('clients.destroy', $client->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>



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

<!-- <script>
    function confirmDelete(url) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce client?')) {
            window.location.href = url;
        }
    }
</script> -->

<!-- <script>
    function confirmDelete(url) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce client?')) {
            event.preventDefault(); // Empêche le rechargement de la page
            $.ajax({
                url: url,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Réussite de la suppression, redirigez ou mettez à jour la liste des clients
                    window.location.reload(); // Recharge la page pour afficher la mise à jour
                },
                error: function(xhr, status, error) {
                    // Gestion des erreurs
                    console.error(xhr.responseText);
                }
            });
        }
    }
</script> -->


</div>



        </div>





       

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

@endsection

 @yield('script')
