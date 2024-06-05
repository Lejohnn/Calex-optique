@extends('layouts.app')

@section('title', 'Ajouter un Commercial')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Add Commercial Form -->
            <section id="add-commercial">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ajouter un Commercial</h4>
                                    <div class="heading-elements">
                                        <a href="{{ route('agent.index') }}" class="btn btn-primary  ">
                                            <i class="la la-plus font-small-2"></i> Voir les Commerciaux
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
                                        <form action="{{ route('agent.store') }}" method="POST" class="add-commercial-form">
                                            @csrf
                                            <!-- Informations du commercial -->
                                            <h6>
                                                <i class="step-icon la la-user"></i>
                                                Informations du Commercial
                                            </h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="full_name">Nom complet <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="full_name" name="full_name" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="start_date">Date de début <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="start_date" name="start_date" type="date" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="points">Points <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="points" name="points" type="number" required />
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
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>
