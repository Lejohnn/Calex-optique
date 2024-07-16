<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Services\NotificationService;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Facture;
use App\Models\Receipt;
use App\Models\Brand;
use App\Models\Frame;
use NumberFormatter;
use Illuminate\Support\Facades\Http;


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

    // Récupérer le nom du client à partir de l'ID
    $client = Client::find($client_id); // Assurez-vous d'avoir importé le modèle Client
    $nom_client = $client ? $client->nom : 'Client inconnu';

    $date_facture = $request->input('date_facture');
    $societe = $request->input('societe');
    $autre_nom = $request->input('autre_nom');
    $telephone = $request->input('telephone');
    $medecin = $request->input('medecin');
    $sphere_od = $request->input('sphere_od');
    $sphere_og = $request->input('sphere_og');
    $cylindre_od = $request->input('cylindre_od');
    $cylindre_og = $request->input('cylindre_og');
    $axe_od = $request->input('axe_od');
    $axe_og = $request->input('axe_og');
    $add_od = $request->input('add_od');
    $add_og = $request->input('add_og');


    $produits = [
        'noms' => $request->input('produit'),
        'quantites' => $request->input('quantite'),
        'prix_unitaires' => $request->input('prix_unitaire'),
        'reductions' => $request->input('reduction'),
        'details' => $request->input('details')
    ];

    // Récupérer les détails spécifiques des produits
    // $od_select = $request->input('od-select');
    // $od_select2 = $request->input('od-select2');
    // $og_select = $request->input('og-select');
    // $og_select2 = $request->input('og-select2');
    // $marque_select = $request->input('marque-select');
    // $code_select = $request->input('code-select');
    // $marque_select = request()->input('marque_name');
    // $code_select = request()->input('code_name');

     // Autres données de la facture
    $marque_select = $request->input('marque_select');
    $code_select = $request->input('code_select');
    $marque_name = $request->input('marque_name');
    $code_name = $request->input('code_name'); // Utilisez le champ caché code_name

    $od_select = request()->input('od_select');
    $od_select2 = request()->input('od_select2');
    $og_select = request()->input('og_select');
    $og_select2 = request()->input('og_select2');


   // Désactiver la monture concernée avant de sauvegarder la facture
   if ($code_name) {
    $frame = Frame::where('code', $code_name)->first();
    if ($frame) {
        $frame->status = false; // Désactivez explicitement la monture
        $frame->save();
    }
    }

    // dd($marque_select, $code_select, $od_select, $od_select2, $og_select, $og_select2);

    //  Insérer un dd() pour vérifier les valeurs récupérées
    //  dd([
    //     'marque_select' => $marque_select,
    //     'code_select' => $code_select,
    //     'od_select' => $od_select,
    //     'od_select2' => $od_select2,
    //     'og_select' => $og_select,
    //     'og_select2' => $og_select2,
    // ]);

    // Calculer le montant total HT
    $montant_total_ht = 0;
    foreach ($produits['quantites'] as $key => $quantite) {
        $prix_unitaire = $produits['prix_unitaires'][$key];
        $reduction = $produits['reductions'][$key];
        $total = ($quantite * $prix_unitaire) - ($quantite * $prix_unitaire * ($reduction / 100));
        $montant_total_ht += $total;
    }

    $avance = $request->input('avance');
    $reste = $montant_total_ht - $avance;


    // Créez une instance de NumberFormatter pour le formatage des nombres en texte
    $formatter = new NumberFormatter('fr_FR', NumberFormatter::SPELLOUT);

    // Formatez le montant total en texte
    $montant_total_ht_text = $formatter->format($montant_total_ht);

    // Formatez la phrase avec le montant en texte et en chiffres
    $phrase_finale = "Arrêter la proforma à la somme de " . ucfirst($montant_total_ht_text) . " francs CFA.";
    // Informations de l'en-tête pour la facture (copiées de l'ordonnance)
    $header = '
        <p style="font-size: 40px; color: white; text-align: center;">CALEX\'<span style="color: white;">OP</span>TIC SARL</p>
        <p style="font-size: 10px;"><strong>Pierre Calvin NGATCHA KAMTCHOUM</strong><br>Opticien diplômé de l\'académie de Paris<br>Examen de vue et de prise de Mesure<br>Tél : 696 15 04 29 / 677 87 19 51<br>Situé en face de l\'Ecole de Police</p>
    ';

    // Générer le contenu HTML pour la facture avec l'en-tête inclus
    $html = '
        <style>
            body { font-family: Arial, sans-serif; }
            h3 { text-align: left; } /* Bleu vif foncé */
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
        <h3>PROFORMA</h3>
        <div class="table-principale">
            <div class="title-table">CONCERNE</div>
            <div class="info-table-wrapper">
                <table class="info-table">
                    <tr>
                        <td>PATIENT:</td>
                        <td>' . $nom_client . '</td>
                    </tr>
                    <tr>
                        <td>SOCIETE:</td>
                        <td>' . $societe . '</td>
                    </tr>
                    <tr>
                        <td>TELEPHONE:</td>
                        <td>' . $telephone . '</td>
                    </tr>
                    <tr>
                        <td>MEDECIN:</td>
                        <td>' . $medecin . '</td>
                    </tr>
                    <tr>
                        <td>DATE DE PRESCRIPTION:</td>
                        <td>' . $date_facture . '</td>
                    </tr>
                </table>
            </div>
        </div> <br>
        <div class="table-principale">
            <div class="title-table">RE PRESCRIPTION</div>
            <div class="info-table-wrapper" style="width: 100%;">
                <table class="info-table">
                    <tr>
                        <td class="wide-column-1">DOCTEUR</td>
                        <td class="wide-column-2"><strong>' . $medecin . '</strong></td>
                        <td class="narrow-column"><strong>OEIL</strong></td>
                        <td class="narrow-column"><strong>SPHERE</strong></td>
                        <td class="narrow-column"><strong>CYLINDRE</strong></td>
                        <td class="narrow-column"><strong>AXE</strong></td>
                        <td class="narrow-column"><strong>ADD</strong></td>
                    </tr>
                    <tr>
                        <td class="wide-column-1">RX DATE</td>
                        <td class="wide-column-2">' . $date_facture . '</td>
                        <td class="narrow-column">OD:</td>
                        <td class="narrow-column">' . $sphere_od . '</td>
                        <td class="narrow-column">' . $cylindre_od . '</td>
                        <td class="narrow-column">' . $axe_od . '</td>
                        <td class="narrow-column">' . $add_od . '</td>
                    </tr>
                    <tr>
                        <td class="wide-column-1">RX EXPIRED</td>
                        <td class="wide-column-2">' . $date_facture . '</td>
                        <td class="narrow-column">OG:</td>
                        <td class="narrow-column">' . $sphere_og . '</td>
                        <td class="narrow-column">' . $cylindre_og . '</td>
                        <td class="narrow-column">' . $axe_og . '</td>
                        <td class="narrow-column">' . $add_og . '</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="table-principale">
            <div class="title-table">DETAILS</div>
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
                                        <td><strong>' . $nom_produit . '</strong></td>
                                        <td>' . $produits['quantites'][$key] . '</td>
                                        <td>' . $produits['prix_unitaires'][$key] . '</td>
                                        <td>' . $produits['reductions'][$key] . '</td>
                                        <td>' . (($produits['quantites'][$key] * $produits['prix_unitaires'][$key]) - ($produits['quantites'][$key] * $produits['prix_unitaires'][$key] * ($produits['reductions'][$key] / 100))) . '</td>
                                        </tr>';

                        // Ajouter les détails spécifiques pour MONTURE et VERRES
                        if (strtolower($nom_produit) == 'monture') {
                            $html .= '
                                    <tr>
                                        <td colspan="5" style="font-size: 8px;"> ' . $marque_select . '  ' . $code_select . '</td>
                                    </tr>';
                        } elseif (strtolower($nom_produit) == 'verres') {
                            $html .= '
                                    <tr>
                                        <td colspan="5" style="font-size: 8px;"><strong>OD:</strong> ' . $od_select . '</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="font-size: 8px;">' . $od_select2 . '</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="font-size: 8px;"><strong>OG:</strong> ' . $og_select . '</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="font-size: 8px;">' . $og_select2 . '</td>
                                    </tr>';
                        }
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
    </div>
    <div class="table-principale" style="margin-top: 20px;">
        <p style="font-size: 10px;">' . $phrase_finale . '</p>
    </div>';

    // Générer le PDF à partir du contenu HTML
    $pdf = PDF::loadHTML($html);

    // Enregistrer la facture en base de données
    $facture = new Facture();
    $facture->client_id = $client_id;
    $facture->autre_nom = $autre_nom;
    $facture->date_facture = $date_facture;
    $facture->produits = json_encode($produits); // Convertir les produits en JSON avant de les enregistrer
    $facture->montant_total_ht = $montant_total_ht;
    $facture->societe = $societe;
    $facture->telephone = $telephone;
    $facture->medecin = $medecin;
    $facture->sphere_od = $sphere_od;
    $facture->sphere_og = $sphere_og;
    $facture->cylindre_od = $cylindre_od;
    $facture->cylindre_og = $cylindre_og;
    $facture->axe_od = $axe_od;
    $facture->axe_og = $axe_og;
    $facture->add_od = $add_od;
    $facture->add_og = $add_og;
    $facture->avance = $avance;
    $facture->reste = $reste;
        $facture->marque_select = $marque_select;
        $facture->code_select = $code_select;
        $facture->od_select = $od_select;
        $facture->od_select2 = $od_select2;
        $facture->og_select = $og_select;
        $facture->og_select2 = $og_select2;
    $facture->save();


    // Générer un reçu correspondant à cette facture
    $receipt = new Receipt();
    $receipt->date_reception = now();
    $receipt->montant_du = $montant_total_ht;
    $receipt->montant = $avance;
    $receipt->reste = $reste;
    $receipt->nom_client = $nom_client;

    // Enregistrer le reçu en base de données
    $receipt->save();

    // Télécharger le PDF
    return $pdf->download('facture.pdf');
}







    public function generateReceiptPdf($receiptId)
    {
        // Récupérer les informations du reçu à partir de l'ID
        $receipt = Receipt::findOrFail($receiptId);

        // Définir les variables statiques
        $dateDuJour = now()->format('d/m/Y');
        $numeroRecu = 'RC' . $receipt->id . '-' . date('Y');
        $caisseDeReception = 'Caisse Principale';
        $modePaiement = 'Espèces';
        $montantDu = $receipt->montant_du;
        $montantAvance = $receipt->montant;
        $reste = $receipt->reste;

        // Générer le contenu HTML du reçu
        $html = '
            <style>
                body { font-family: Arial, sans-serif; }
                .centered { text-align: center; }
                .left { text-align: left; }
                .right { text-align: right; }
                .bold { font-weight: bold; }
                .table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                .table th, .table td {

                    padding: 8px;
                    font-size: 12px;
                }
            </style>
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="centered">
                <h2>Reçu de caisse</h2>
                <p>Date de reçu: <span class="bold">' . $dateDuJour . '</span></p>
                <p>Numero: <span class="bold">' . $numeroRecu . '</span></p>
                <table class="table">
                    <tr>
                        <th class="left">Caisse de reception:</th>
                        <td class="right bold">' . $caisseDeReception . '</td>
                    </tr>
                    <tr>
                        <th class="left">Mode Paiement:</th>
                        <td class="right bold">' . $modePaiement . '</td>
                    </tr>
                    <tr>
                        <th class="left">Montant dû:</th>
                        <td class="right bold">' . $montantDu . '</td>
                    </tr>
                    <tr>
                        <th class="left">Montant:</th>
                        <td class="right bold">' . $montantAvance . '</td>
                    </tr>
                    <tr>
                        <th class="left">Reste:</th>
                        <td class="right bold">' . $reste . '</td>
                    </tr>
                </table>
                <p class="bold">Merci de votre confiance</p>
                <p class="bold">A BIENTOT</p>
            </div>
        ';

        // Générer le PDF à partir du contenu HTML
        $pdf = PDF::loadHTML($html);

        // Télécharger le PDF
        return $pdf->download('recu_' . $receipt->id . '.pdf');
    }

    private function deactivateFrame($code_select)
    {
        $frame = Frame::where('code', $code_select)->first();
        if ($frame) {
            $url = route('frames.toggleStatus', ['frame' => $frame->id]);
            $response = Http::patch($url);

            if ($response->successful()) {
                // La monture a été désactivée avec succès
            } else {
                // Gérer l'échec de la désactivation
            }
        }
    }






    public function voirFactures()
    {
        // Récupérer les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Récupérer toutes les factures enregistrées en base de données
        $factures = Facture::orderBy('date_facture', 'desc')->get();

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



    public function index()
{
    // Récupérer les notifications
    $notifications = $this->notificationService->notification_template()[0];
    $notifications_notread = $this->notificationService->notification_template()[1];

    $receipts = Receipt::all();
    // dd($receipts); // Assurez-vous que les données sont bien récupérées

    return view('caisse.recu.index', compact('notifications', 'notifications_notread', 'receipts'));
}


public function show($id)
{
    // Récupérer les notifications
    $notifications = $this->notificationService->notification_template()[0];
    $notifications_notread = $this->notificationService->notification_template()[1];

    $receipt = Receipt::findOrFail($id);
    return view('caisse.recu.show', compact('notifications', 'notifications_notread', 'receipt'));
}

public function edit($id)
{
     // Récupérer les notifications
     $notifications = $this->notificationService->notification_template()[0];
     $notifications_notread = $this->notificationService->notification_template()[1];

    $receipt = Receipt::findOrFail($id);
    return view('caisse.recu.edit', compact('notifications', 'notifications_notread', 'receipt'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nom_client' => 'required|string|max:255',
        'date_reception' => 'required|date',
        'montant_du' => 'required|numeric',
        'montant' => 'required|numeric',
        'reste' => 'required|numeric',
        'autre_versement' => 'nullable|numeric',
    ]);

    $receipt = Receipt::findOrFail($id);
    $receipt->update($request->all());

    // Met à jour le reste en fonction de l'autre versement
    if ($request->has('autre_versement')) {
        $receipt->reste -= $request->autre_versement;
        $receipt->autre_versement = $request->autre_versement;
        $receipt->save();
    }

    return redirect()->route('recus.show', $receipt->id)->with('success', 'Reçu mis à jour avec succès');
}

public function destroy($id)
{
    $receipt = Receipt::findOrFail($id);
    $receipt->delete();

    return redirect()->route('caisse.recu.index')->with('success', 'Reçu supprimé avec succès');
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

    public function getBrands() {



        $brands = Brand::all(); // Assurez-vous que la table des marques est correctement configurée
        return response()->json($brands);
    }

    public function getCodes($brandId)
{
    // Récupérer uniquement les montures activées pour une marque donnée
    $codes = Frame::where('brand_id', $brandId)
                  ->where('status', true) // Filtrer par statut activé
                  ->get();

    return response()->json($codes);
}

}
