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
        $nom_client = Client::Where('id', $client_id)->first();
        $date_facture = $request->input('date_facture');
        $produits = [
            'noms' => $request->input('produit'),
            'quantites' => $request->input('quantite'),
            'prix_unitaires' => $request->input('prix_unitaire'),
            'reductions' => $request->input('reduction'),
        ];
;

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
            <p style="font-size: 40px; color: #1E90FF; text-align: center;">CALEX\'<span style="color: red;">OP</span>TIC</p>
            <p style="font-size: 10px;"><strong>Pierre Calvin NGATCHA KAMTCHOUM</strong><br>Opticien diplomé de l\'académie de Paris<br>Examen de vue et de prise de Mesure<br>Tél : 696 15 04 29 / 677 87 19 51<br>Situé en face de l\'Ecole de Police</p>
            <hr style="margin-bottom: 10px;">
        ';

        // Générer le contenu HTML pour la facture avec l'en-tête inclus
        $html = '
            <style>
                body { font-family: Arial, sans-serif; }
                h3 { text-align: center;  } /* Bleu vif foncé */
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid #ccc; padding: 10px; }
                th { background-color: #f2f2f2; }
            </style>
            ' . $header . '
            <h3>FACTURE</h3>
            <p><strong>Nom du Client:</strong> ' . $nom_client . '</p>
            <p><strong>Date de la Facture:</strong> ' . $date_facture . '</p>
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Réduction (%)</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>';

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
                </tbody>
            </table>
            <p><strong>Montant Total HT:</strong> ' . $montant_total_ht . '</p>
        ';

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
