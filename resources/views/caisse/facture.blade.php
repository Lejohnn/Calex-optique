@extends('layouts.app')

@section('title', 'Générer une Facture')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Facture Form -->
                {{-- <style>
                            @font-face {
                                font-family: 'LEMONMILK-Medium';
                                src: url('../fonts/LEMONMILK-Medium.otf') format('truetype');
                                /* Autres formats de police */
                            }

                            body {
                                font-family: 'LEMONMILK-Medium', sans-serif;
                            }
                </style> --}}
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
                                                        <input class="form-control" id="nom_client" name="nom_client" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="date_facture">Date de la Facture <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="date_facture" name="date_facture" type="date" required />
                                                    </div>
                                                </div>
                                            </div>
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
                                                    <!-- La première ligne de produit -->
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
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="remise">Remise</label>
                                                        <input class="form-control" id="remise" name="remise" type="text" />
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="row">
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="taxe">Taxe (TVA 20%)</label>
                                                        <input class="form-control" id="taxe" name="taxe" type="text" readonly />
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="montant_net">Montant Net</label>
                                                        <input class="form-control" id="montant_net" name="montant_net" type="text" readonly />
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <!-- Bouton de soumission -->
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
        taxe = totalHT * 0.2;

        // Mettre à jour les champs
        $('#montant_total_ht').val(totalHT.toFixed(2) + " FCFA");
        $('#taxe').val(taxe.toFixed(2) + " FCFA");
        $('#montant_net').val((totalHT + taxe - remise).toFixed(2) + " FCFA");
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
    });
</script>

