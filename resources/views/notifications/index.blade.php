
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
                    <h3 class="content-header-title">Notifications</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Accueil</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Parametres</a>
                                </li>
                                <li class="breadcrumb-item active">Notifications
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
                        <h2 class="card-title">Notifications</h2>
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
                                        <th>message</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notifications as $notification)


                                    <tr>
                                            <td>
                                            @if($notification->status == 0)
                                                    <a href="{{ route('clients.index') }}" class="text-warning">
                                                        {{ $notification->message }}

                                                    </a>
                                            @endif

                                                @if($notification->status == 1)
                                                    <a href="{{ route('clients.index') }}" class="text-success font-weight-bold">
                                                        {{ $notification->message }}

                                                    </a>
                                                @endif


                                            </td>

                                        <td>
                                            @if($notification->status == 1)
                                                <span class="badge badge-success">Lu </span>
                                            @endif
                                         @if($notification->status == 0)
                                                     <span class="badge badge-danger">En Attente</span>
                                        @endif

                                        <td>

                                            <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal{{ $notification->id }}"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteConfirmationModal{{ $notification->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $notification->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $notification->id }}">Confirmation de suppression</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Êtes-vous sûr de vouloir supprimer notification <strong>{{ $notification->message }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                                                            <form id="delete-form-{{ $notification->id }}" action="{{ route('notifications.editStatus', $notification) }}" method="GET">
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

