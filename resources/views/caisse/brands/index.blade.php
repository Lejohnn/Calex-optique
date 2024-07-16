@extends('layouts.app')

@section('title', 'Liste des Marques')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="brands-list">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Marques</h4>
                                    <div class="heading-elements">
                                        <a href="{{ route('brands.create') }}" class="btn btn-primary">
                                            <i class="la la-plus font-small-2"></i> Ajouter une Marque
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
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nom</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($brands as $brand)
                                                    <tr>
                                                        <td>{{ $brand->id }}</td>
                                                        <td>{{ $brand->name }}</td>
                                                        <td>
                                                            <a href="{{ route('brands.show', $brand->id) }}"><i class="ft-eye text-info"></i></a>
                                                            @if(auth()->user()->role_id == 1 )

                                                                <a href="{{ route('brands.edit', $brand->id) }}"><i class="ft-edit text-success ml-1"></i></a>
                                                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#deleteConfirmationModal{{ $brand->id }}">
                                                                    <i class="ft-trash-2 ml-1 text-warning"></i>
                                                                </a>
                                                            @endif
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteConfirmationModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $brand->id }}" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $brand->id }}">Confirmation de suppression</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Êtes-vous sûr de vouloir supprimer la marque <strong>{{ $brand->name }}</strong> ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <form id="delete-form-{{ $brand->id }}" action="{{ route('brands.destroy', $brand->id) }}" method="POST">
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
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend/js/core/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>
