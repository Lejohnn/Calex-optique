<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Services\NotificationService;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Facture;


class CaisseController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    // Fonction pour afficher les notifications
    public function showNotifications()
    {
        // Récupérer les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Retourner la vue avec les données des notifications
        return view('caisse.notifications', compact('notifications', 'notifications_notread'));
    }

    public function generateInvoice(Request $request)
{
    // Collecter les données nécessaires pour la facture
    $client_id = $request->input('nom_client');
    $nom_client = 'John';
    $date_facture = $request->input('date_facture');
    $produits = [
        'noms' => $request->input('produit'),
        'quantites' => $request->input('quantite'),
        'prix_unitaires' => $request->input('prix_unitaire'),
        'reductions' => $request->input('reduction'),
    ];

    // Calculer le montant total HT
    $montant_total_ht = 0;
    foreach ($produits['quantites'] as $key => $quantite) {
        $prix_unitaire = $produits['prix_unitaires'][$key];
        $reduction = $produits['reductions'][$key];
        $total = ($quantite * $prix_unitaire) - ($quantite * $prix_unitaire * ($reduction / 100));
        $montant_total_ht += $total;
    }

    // Informations de l'en-tête pour la facture (copiées de l'ordonnance)
    $header = '
        <p style="font-size: 40px; color: #1E90FF; text-align: center;">CALEX\'<span style="color: red;">OP</span>TIC SARL</p>
        <p style="font-size: 10px;"><strong>Pierre Calvin NGATCHA KAMTCHOUM</strong><br>Opticien diplômé de l\'académie de Paris<br>Examen de vue et de prise de Mesure<br>Tél : 696 15 04 29 / 677 87 19 51<br>Situé en face de l\'Ecole de Police</p>

    ';

    // Générer le contenu HTML pour la facture avec l'en-tête inclus
    $html = '
        <style>
            body { font-family: Arial, sans-serif; }
            h3 { text-align: center; } /* Bleu vif foncé */
            table { width: 100%; border-collapse: collapse; margin-top: 5px; }
            th, td { border: none; padding: 5px; } /* suppression des traits */
            th { background-color: #f2f2f2; }
            .info-table-wrapper { display: inline-block; border: 1px solid black; padding: 4px; }
            .info-table { width: 100%; border: none; }
            .info-table td { border: none; padding: 5px; font-size: 9px; }
            .info-table td:first-child { font-weight: bold; }
            .table-principale { display: flex; flex-direction: column; }
            .title-table { border: 2px solid black; font-size: 0.6em; text-align: center; max-width: 20%; padding: 2px 3px; color: white; background: black; font-weight: bold; }
            .wide-column-1 { width: 18%; }
            .wide-column-2 { width: 22%; }
            .narrow-column { width: 12%; }
            .product-table { width: 100%; }
            .product-table th, .product-table td { padding: 5px; font-size: 9px; border: none; } /* suppression des traits */
            .product-table th { background-color: black; color: white; font-weight: bold; }
        </style>

        ' . $header . '
        <h3>FACTURE</h3>
        <div class="table-principale">
            <div class="title-table">inscription</div>
            <div class="info-table-wrapper">
                <table class="info-table">
                    <tr>
                        <td>Nom du Client:</td>
                        <td>' . $nom_client . '</td>
                    </tr>
                    <tr>
                        <td>Autre:</td>
                        <td>Donnée exemple 1</td>
                    </tr>
                    <tr>
                        <td>Numéro:</td>
                        <td>123456789</td>
                    </tr>
                    <tr>
                        <td>Médecin:</td>
                        <td>Dr. Smith</td>
                    </tr>
                    <tr>
                        <td>Date de Prescription:</td>
                        <td>' . $date_facture . '</td>
                    </tr>
                </table>
            </div>
        </div> <br>
        <div class="table-principale">
            <div class="title-table">prescription</div>
            <div class="info-table-wrapper" style="width: 100%;">
                <table class="info-table">
                    <tr>
                        <td class="wide-column-1">Produit</td>
                        <td class="wide-column-2">DR NDONGO</td>
                        <td class="narrow-column">Oeil</td>
                        <td class="narrow-column">Sphère</td>
                        <td class="narrow-column">Cylindre</td>
                        <td class="narrow-column">Axe</td>
                        <td class="narrow-column">Add</td>
                    </tr>
                    <tr>
                        <td class="wide-column-1">Cadre</td>
                        <td class="wide-column-2">05/03/2024</td>
                        <td class="narrow-column">ODD</td>
                        <td class="narrow-column">+0,50</td>
                        <td class="narrow-column"></td>
                        <td class="narrow-column"></td>
                        <td class="narrow-column"></td>
                    </tr>
                    <tr>
                        <td class="wide-column-1">Caps Red</td>
                        <td class="wide-column-2">05/03/2025</td>
                        <td class="narrow-column">OG</td>
                        <td class="narrow-column">+0,25</td>
                        <td class="narrow-column">-0,25</td>
                        <td class="narrow-column">125°</td>
                        <td class="narrow-column"></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="table-principale">
            <div class="title-table">détails des produits</div>
            <div class="info-table-wrapper" style="width: 100%;">
                <table class="product-table">
                    <tr>
                        <td><strong>DESIGNATION</strong></td>
                        <td><strong>QTE</strong></td>
                        <td><strong>P.U.H.T</strong></td>
                        <td><strong>%</strong></td>
                        <td><strong>MONTANT H.T.</strong></td>
                    </tr>';

    foreach ($produits['noms'] as $key => $nom_produit) {
        $html .= '
                    <tr>
                        <td>' . $nom_produit . '</td>
                        <td>' . $produits['quantites'][$key] . '</td>
                        <td>' . $produits['prix_unitaires'][$key] . '</td>
                        <td>' . $produits['reductions'][$key] . '</td>
                        <td>' . (($produits['quantites'][$key] * $produits['prix_unitaires'][$key]) - ($produits['quantites'][$key] * $produits['prix_unitaires'][$key] * ($produits['reductions'][$key] / 100))) . '</td>
                    </tr>';
    }

    $html .= '
    </table>
    </div>
    </div>
    <div class="table-principale" style="margin-left: auto;">
    <div class="info-table-wrapper" style="width: 75%;">
        <table class="summary-table">
            <tr>
                <td style="font-size: 8px;"><strong>Total HT</strong></td>
                <td style="font-size: 8px;">' . $montant_total_ht . '</td>
            </tr>
            <tr>
                <td style="font-size: 8px;"><strong>Remise</strong></td>
                <td style="font-size: 8px;">0</td>
            </tr>
            <tr>
                <td style="font-size: 8px;"><strong>Taxe</strong></td>
                <td style="font-size: 8px;">0</td>
            </tr>
            <tr>
                <td style="font-size: 8px;"><strong>Net</strong></td>
                <td style="font-size: 8px;">' . $montant_total_ht . '</td>
            </tr>
        </table>
    </div>
    </div>';







    // Générer le PDF à partir du contenu HTML
    $pdf = PDF::loadHTML($html);

    // Enregistrer la facture en base de données
    $facture = new Facture();
    $facture->client_id = $client_id;
    $facture->date_facture = $date_facture;
    $facture->produits = json_encode($produits); // Convertir les produits en JSON avant de les enregistrer
    $facture->montant_total_ht = $montant_total_ht;
    $facture->save();

    // Télécharger le PDF
    return $pdf->download('facture.pdf');
}










    public function voirFactures()
    {
        // Récupérer les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Récupérer toutes les factures enregistrées en base de données
        $factures = Facture::all();

        // Retourner la vue avec les factures et les notifications
        return view('caisse.views', compact('factures', 'notifications', 'notifications_notread'));
    }

    public function detailFacture($id)
    {
        // Récupérer la facture correspondant à l'ID
        $facture = Facture::findOrFail($id);

        // Décoder les données JSON des produits
        $produits = json_decode($facture->produits, true);

        // Récupérer les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Retourner la vue avec les détails de la facture et les notifications
        return view('caisse.detail', compact('facture', 'produits', 'notifications', 'notifications_notread'));
    }






    public function showInvoice()
    {

        // Récupérer les notifications
    $notifications = $this->notificationService->notification_template()[0];
    $notifications_notread = $this->notificationService->notification_template()[1];

    $clientCaisses = Client::Where('choix_service', 'caisse')->get();


    return view('caisse.facture', compact('notifications', 'notifications_notread',"clientCaisses"));
        // return view('caisse.facture');
    }
}
