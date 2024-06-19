@extends('layouts.app')

@section('title', 'Générer une Facture')

@section('contenu')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Facture Form -->
            <section id="facture">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Générer une Facture</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{ route('generate.invoice') }}" method="POST" class="facture-form">
                                            <!-- Informations de la Facture -->
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nom_client">Nom du Client <span class="text-danger">*</span></label>
                                                        <select name="nom_client" class="form-control" required>
                                                            @foreach($clientCaisses as $clientCaisse)
                                                                <option value="{{ $clientCaisse->id }}">{{ $clientCaisse->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="date_facture">Date de la Facture <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="date_facture" name="date_facture" type="date" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Informations Société, Téléphone et Médecin -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="societe">Société</label>
                                                        <input class="form-control" id="societe" name="societe" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="telephone">Téléphone</label>
                                                        <input class="form-control" id="telephone" name="telephone" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="medecin">Médecin</label>
                                                        <input class="form-control" id="medecin" name="medecin" type="text" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Champs OD et OG -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sphere_od">Sphere OD</label>
                                                        <input class="form-control" id="sphere_od" name="sphere_od" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sphere_og">Sphere OG</label>
                                                        <input class="form-control" id="sphere_og" name="sphere_og" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cylindre_od">Cylindre OD</label>
                                                        <input class="form-control" id="cylindre_od" name="cylindre_od" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cylindre_og">Cylindre OG</label>
                                                        <input class="form-control" id="cylindre_og" name="cylindre_og" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="axe_od">Axe OD</label>
                                                        <input class="form-control" id="axe_od" name="axe_od" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="axe_og">Axe OG</label>
                                                        <input class="form-control" id="axe_og" name="axe_og" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="add_od">Add OD</label>
                                                        <input class="form-control" id="add_od" name="add_od" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="add_og">Add OG</label>
                                                        <input class="form-control" id="add_og" name="add_og" type="text" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tableau des Produits -->
                                            <table class="table" id="products-table">
                                                <thead>
                                                    <tr>
                                                        <th>Produit</th>
                                                        <th>Quantité</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Réduction (%)</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Ligne de produit template -->
                                                    <tr class="product-template">
                                                        <td><input class="form-control" type="text" name="produit[]" required /></td>
                                                        <td><input class="form-control" type="number" min="1" name="quantite[]" required /></td>
                                                        <td><input class="form-control" type="text" name="prix_unitaire[]" required /></td>
                                                        <td><input class="form-control" type="number" min="0" max="100" name="reduction[]" /></td>
                                                        <td><input class="form-control" type="text" readonly style="width: 100px;" /></td>
                                                        <td><button type="button" class="btn btn-danger btn-remove-row">Supprimer</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!-- Total -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="montant_total_ht">Montant Total HT</label>
                                                        <input class="form-control" id="montant_total_ht" name="montant_total_ht" type="text" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="avance">Avance</label>
                                                <input type="number" class="form-control" id="avance" name="avance" step="0.01" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="reste">Reste</label>
                                                <input type="number" class="form-control" id="reste" name="reste" step="0.01" readonly>
                                            </div>

                                            <!-- Boutons -->
                                            <button type="button" class="btn btn-primary" id="add-product-row">Ajouter Produit</button>
                                            <button type="submit" class="btn btn-primary">Générer Facture</button>
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
    // Fonction pour calculer le total d'une ligne de produit
    function calculateTotal(row) {
        var quantity = row.find('input[name="quantite[]"]').val();
        var price = row.find('input[name="prix_unitaire[]"]').val();
        var discount = row.find('input[name="reduction[]"]').val();
        var total = (quantity * price) - (quantity * price * (discount / 100));
        row.find('input[type="text"]:last').val(total.toFixed(2) + " FCFA");

        // Mettre à jour les totaux de la facture
        updateInvoiceTotals();
    }

    // Fonction pour recalculer les totaux HT, remise, taxe et montant net
    function updateInvoiceTotals() {
        var totalHT = 0;
        var remise = parseFloat($('#remise').val()) || 0;
        var taxe = 0;

        // Calculer le total HT
        $('#products-table tbody tr').each(function() {
            var quantity = parseInt($(this).find('input[name="quantite[]"]').val()) || 0;
            var price = parseFloat($(this).find('input[name="prix_unitaire[]"]').val()) || 0;
            var reduction = parseFloat($(this).find('input[name="reduction[]"]').val()) || 0;
            var total = (quantity * price) - (quantity * price * (reduction / 100));
            totalHT += total;
        });

        // Calculer la taxe (TVA 20%)
        var taxe = totalHT * 0.2;

        // Mettre à jour les champs
        $('#montant_total_ht').val(totalHT.toFixed(2) + " FCFA");
        $('#taxe').val(taxe.toFixed(2) + " FCFA");
        $('#montant_net').val((totalHT + taxe - remise).toFixed(2) + " FCFA");

        // Mettre à jour le champ "reste"
        updateReste();
    }

    // Fonction pour mettre à jour le champ "reste" en fonction de l'avance et du montant total HT
    function updateReste() {
        var avance = parseFloat($('#avance').val()) || 0;
        var montantTotal = parseFloat($('#montant_total_ht').val()) || 0;
        var reste = montantTotal - avance;
        $('#reste').val(reste.toFixed(2));
    }

    $(document).ready(function() {
        // Ajouter une nouvelle ligne de produit
        $('#add-product-row').on('click', function() {
            var newRow = $('.product-template').clone();
            newRow.removeClass('product-template');
            newRow.find('input').val('');
            newRow.find('input[type="text"]:last').prop('readonly', true);
            newRow.appendTo('#products-table tbody');
        });

        // Supprimer une ligne de produit
        $(document).on('click', '.btn-remove-row', function() {
            $(this).closest('tr').remove();
            updateInvoiceTotals();
        });

        // Calculer le total lors de la saisie des valeurs
        $(document).on('input', '#products-table input', function() {
            var row = $(this).closest('tr');
            calculateTotal(row);
        });

        // Mettre à jour les totaux initiaux lors du chargement de la page
        updateInvoiceTotals();

        // Mettre à jour le reste lorsque l'avance change
        $('#avance').on('input', function() {
            updateReste();
        });
    });
</script>


