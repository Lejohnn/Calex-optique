@extends('layouts.app')

@section('title', 'Facture de vente - Calex Optic')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="container">
                <div class="header">
                    <h1>Facture de vente</h1>
                    <p>Calex Optic</p>
                </div>
                <div class="invoice-details">
                    <p><strong>Informations sur l'entreprise :</strong></p>
                    <p>Nom : Calex Optic</p>
                    <!-- Ajoutez les autres détails de l'entreprise ici -->
                </div>
                <div class="invoice-details">
                    <p><strong>Informations sur le client :</strong></p>
                    <!-- Ajoutez les détails du client ici -->
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Lignes pour les articles vendus -->
                        <tr>
                            <td>Lunettes de soleil</td>
                            <td>2</td>
                            <td>50,00 €</td>
                            <td>100,00 €</td>
                        </tr>
                        <!-- Ajoutez d'autres lignes si nécessaire -->
                    </tbody>
                </table>
                <div class="total">
                    <p><strong>Total : </strong>200,00 €</p>
                    <!-- Ajoutez d'autres détails comme les taxes, les réductions, etc. -->
                </div>
                <div class="footer">
                    <p>Merci pour votre achat chez Calex Optic.</p>
                </div>
            </div>
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
