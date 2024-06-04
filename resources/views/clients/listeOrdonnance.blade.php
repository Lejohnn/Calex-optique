@extends('layouts.app')

@section('title', 'Liste des Ordonnances')

@section('contenu')
<script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <!-- Liste des Ordonnances -->
            <section id="prescriptions-list">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Liste des Ordonnances</h2>
                                <div class="heading-elements">
                                    <a href="{{ route('ordonnance.create') }}" class="btn btn-primary  ">
                                        <i class="la la-plus font-small-2"></i> créer une ordonnance
                                    </a>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    <table class="table table-striped table-bordered patients-list datatable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom du Patient</th>
                                                <th>Âge</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($prescriptions as $prescription)
                                                <tr>
                                                    <td>{{ $prescription->id }}</td>
                                                    <td>{{ $prescription->nom_patient }}</td>
                                                    <td>{{ $prescription->age }}</td>
                                                    <td>{{ $prescription->date->format('d-m-Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('prescriptions.show', $prescription->id) }}"><i class="ft-eye text-info"></i></a>
                                                        {{-- <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="btn btn-warning">Modifier</a>
                                                        <form action="{{ route('prescriptions.destroy', $prescription->id) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Supprimer</button> --}}
                                                        </form>
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
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>
