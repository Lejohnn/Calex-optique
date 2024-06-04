<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Http\Services\NotificationService;
use App\Models\Client;
use App\Models\Notification;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;

class ClientController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {

        $clients = Client::all();
        //dd($clients, auth()->user()->role_id);
        $data = [
            [
                'role_id' => 3,
                'choix_service' => 'consultation',
            ],
            [
                'role_id' => 4,
                'choix_service' => 'entretien_lunettes',
            ],
            [
                'role_id' => 5,
                'choix_service' => 'caisse',
            ],
        ];
        foreach ($data as $roleMapping) {

            $roleId = $roleMapping['role_id'];
            $serviceChoices = $roleMapping['choix_service'];

            if (auth()->user()->role_id == $roleId){
                    $clients = Client::where('choix_service', $serviceChoices)->get();
                }

        }


        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('clients.index', compact('clients', 'notifications', 'notifications_notread'));
    }

    public function create()
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('clients.create', compact('notifications', 'notifications_notread'));
    }

    public function register()
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('clients.register', compact('notifications', 'notifications_notread'));
    }


    public function store(Request $request)
    {
        // Notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Données pour le rôle et le service
        $datas = [
            ['role_id_not' => 3, 'choix_service' => 'consultation'],
            ['role_id_not' => 4, 'choix_service' => 'entretien_lunettes'],
            ['role_id_not' => 5, 'choix_service' => 'caisse'],
        ];

        // Validation des données du formulaire avec messages personnalisés
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'telephone' => 'required|string|unique:clients,telephone',
            'carte_identite' => 'nullable|string|unique:clients,carte_identite',
            'date_naissance' => 'nullable|date',
            'lieu_naissance' => 'nullable|string',
            'profession' => 'nullable|string',
            'sexe' => 'required',
            'societe_attache' => 'nullable|string',
            'assurance' => 'nullable|string',
            'disciplines_pratiquees' => 'nullable|string',
            'date_debut' => 'nullable|date',
            'activite_interpelant_vision' => 'nullable|string',
            'antecedents_familiaux' => 'nullable|string',
            'antecedents_chirurgicaux' => 'nullable|string',
            'traitements_en_cours' => 'nullable|string',
            'allergies' => 'nullable|string',
            'mentions_generales' => 'nullable|string',
            'portez_vous_des_lunettes' => 'nullable|boolean',
            'besoin_changer_lunettes' => 'nullable|boolean',
            'autre_choses' => 'nullable|string',
            'diagnostic' => 'nullable|string',
            'prescription' => 'nullable|string',
            'examen_particulier' => 'nullable|string',
            'rendez_vous' => 'nullable|date',
            'choix_service' => 'required|string',
            'entretien' => 'nullable|string',
            'montant' => 'nullable|numeric',
        ], [
            'telephone.unique' => 'Le numéro de téléphone existe déjà.',
            'carte_identite.unique' => 'Le numéro de carte d\'identité existe déjà.',
        ]);

        try {
            foreach ($datas as $roleMapping) {
                $roleId = $roleMapping['role_id_not'];
                $serviceChoices = $roleMapping['choix_service'];
                if ($request->choix_service == $serviceChoices) {
                    $client = new Client($request->all());
                    $client->save();

                    $name_client = strtoupper($request->nom);
                    $notification = new Notification([
                        'message' => "$serviceChoices de Mrs $name_client (cliquez pour accéder)",
                        'status' => 0,
                        'visibility' => 0,
                        'role_id'=> $roleId,
                        'client_id' => $client->id,
                    ]);
                    $notification->save();

                    return redirect()->route('clients.index')
                        ->with('success', 'Client "'.$client->nom.'" ajouté avec succès. Une notification a été envoyée au responsable')
                        ->with('notifications', $notifications)
                        ->with('notifications_notread', $notifications_notread);
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de l\'enregistrement du client. Veuillez réessayer.']);
        }
    }



    public function show(Client $client)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('clients.show', compact('client', 'notifications', 'notifications_notread'));
    }

    public function edit(Client $client)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('clients.edit', compact('client', 'notifications', 'notifications_notread'));
    }

    public function update(Request $request, Client $client)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Validation des données du formulaire avec messages personnalisés
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'telephone' => 'required|string',
            'carte_identite' => 'nullable|string',
            'date_naissance' => 'nullable|date',
            'lieu_naissance' => 'nullable|string',
            'profession' => 'nullable|string',
            'sexe' => 'required',
            'societe_attache' => 'nullable|string',
            'assurance' => 'nullable|string',
            'disciplines_pratiquees' => 'nullable|string',
            'date_debut' => 'nullable|date',
            'activite_interpelant_vision' => 'nullable|string',
            'antecedents_familiaux' => 'nullable|string',
            'antecedents_chirurgicaux' => 'nullable|string',
            'traitements_en_cours' => 'nullable|string',
            'allergies' => 'nullable|string',
            'mentions_generales' => 'nullable|string',
            'portez_vous_des_lunettes' => 'nullable|boolean',
            'besoin_changer_lunettes' => 'nullable|boolean',
            'autre_choses' => 'nullable|string',
            'diagnostic' => 'nullable|string',
            'prescription' => 'nullable|string',
            'examen_particulier' => 'nullable|string',
            'rendez_vous' => 'nullable|date',
            'choix_service' => 'required|string',
            'entretien' => 'nullable|string',
            'montant' => 'nullable|numeric',
        ], [
            'telephone.unique' => 'Le numéro de téléphone existe déjà.',
            'carte_identite.unique' => 'Le numéro de carte d\'identité existe déjà.',
        ]);

        try {
            // Mise à jour des informations du client
            $client->update($request->all());

            Notification::where('client_id', $client->id)
                ->where('visibility', 0)
                ->update(['status' => 1]);

            // Redirection vers une page appropriée avec un message de succès
            return redirect()->route('clients.index')
                ->with('success', 'Client "'.$client->nom.' '.$client->prenom.'" modifié avec succès.')
                ->with('notifications', $notifications)
                ->with('notifications_notread', $notifications_notread);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) { // Le code d'erreur 1062 correspond à une violation de contrainte unique
                return redirect()->back()->withErrors(['error' => 'Le numéro de téléphone ou le numéro de carte d\'identité existe déjà.']);
            } else {
                return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour du client. Veuillez réessayer.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour du client. Veuillez réessayer.']);
        }
    }





        public function destroy(Client $client)
        {
            $notifications = $this->notificationService->notification_template()[0];
            $notifications_notread = $this->notificationService->notification_template()[1];
            $clientName = $client->nom;
            // Suppression du client
            $client->delete();

            return redirect()->route('clients.index')
                ->with('success', 'Client "'.$clientName.'" supprimé avec succès.')
                ->with('notifications', $notifications)
                ->with('notifications_notread', $notifications_notread);
        }


        // public function open() {
        //     return view ('clients.facture');
        // }

        public function generatePDF()
    {
        // Récupérer les données de tous les clients
        $clients = Client::all();

        // Contenu HTML pour la facture PDF
        $html = '<h1>Liste des clients</h1>';

        // Boucle à travers chaque client et ajoutez ses détails au contenu HTML
        foreach ($clients as $client) {
            $html .= '<h2>Détails du client ' . $client->nom . '</h2>';
            $html .= '<p><strong>Nom:</strong> ' . $client->nom . '</p>';
            $html .= '<p><strong>Prénom:</strong> ' . $client->prenom . '</p>';
            // Ajoutez les autres détails du client de la même manière
            // ...

            // Ajoutez une séparation entre chaque client
            $html .= '<hr>';
        }

        // Générer le PDF à partir du contenu HTML
        $pdf = PDF::loadHTML($html);

        // Télécharger le PDF
        return $pdf->download('liste_clients.pdf');
    }



    public function generate(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom_patient' => 'required|string|max:255',
            'age' => 'required|integer',
            'date' => 'required|date',
            'sph_od' => 'nullable|string|max:255',
            'cyl_od' => 'nullable|string|max:255',
            'axe_od' => 'nullable|string|max:255',
            'add_od' => 'nullable|string|max:255',
            'sph_og' => 'nullable|string|max:255',
            'cyl_og' => 'nullable|string|max:255',
            'axe_og' => 'nullable|string|max:255',
            'add_og' => 'nullable|string|max:255',
        ]);

        // Enregistrer les données dans la base de données
        $prescription = Prescription::create($request->all());

        // Collecter les données nécessaires pour l'ordonnance
        $nom_patient = $prescription->nom_patient;
        $age = $prescription->age;
        $date = $prescription->date->format('d-m-Y');
        $sph_od = $prescription->sph_od;
        $cyl_od = $prescription->cyl_od;
        $axe_od = $prescription->axe_od;
        $add_od = $prescription->add_od;
        $sph_og = $prescription->sph_og;
        $cyl_og = $prescription->cyl_og;
        $axe_og = $prescription->axe_og;
        $add_og = $prescription->add_og;

        // Informations de l'en-tête
        $header = '
            <p style="font-size: 40px; color: #1E90FF; text-align: center;">CALEX\'<span style="color: red;">OP</span>TIC SARL</p>
            <p style="font-size: 15px;"><strong>Pierre Calvin NGATCHA KAMTCHOUM</strong> <span style="float: right; margin-right: 10%;">Yaoundé, le ' . $date . '</span><br>Opticien diplomé de l\'académie de Paris<br>Examen de vue et de prise de Mesure<br>Tél : 696 15 04 29 / 677 87 19 51<br>Situé en face de l\'Ecole de Police</p>
        ';

        // Générer le contenu HTML pour l'ordonnance
        $html = '
            <style>
                body { font-family: Arial, sans-serif; }
                h3 { text-align: center; }
                p { margin-bottom: 10px; }
                th, .gras { font-weight: bold; }
                td, th { border: 1.5px solid black; padding: 8px; }
                .footer { position: absolute; bottom: 0; width: 100%; text-align: center; }
            </style>
            ' . $header . '
            <br><br> <p><strong>Nom du Patient:</strong> ' . $nom_patient . '</p>
            <p><strong>Age:</strong> ' . $age . '</p>
            <h3 style="text-align: center;">PRESCRIPTION DE LUNETTES</h3><br><br>
            <div style="text-align: center;">
                <table style="border-collapse: collapse; width: 80%; margin-left: 10%;">
                    <tr>
                        <td colspan="3" style="text-align: center;"></td>
                        <td colspan="3" class="gras" style="text-align: center;">SPH</td>
                        <td colspan="3" class="gras" style="text-align: center;">CYL</td>
                        <td colspan="3" class="gras" style="text-align: center;">AXE</td>
                        <td colspan="3" class="gras" style="text-align: center;">ADD</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center; font-weight: bold;">OD</td>
                        <td colspan="3" style="text-align: center;">' . $sph_od . '</td>
                        <td colspan="3" style="text-align: center;">' . $cyl_od . '</td>
                        <td colspan="3" style="text-align: center;">' . $axe_od . '</td>
                        <td colspan="3" style="text-align: center;">' . $add_od . '</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center; font-weight: bold;">OG</td>
                        <td colspan="3" style="text-align: center;">' . $sph_og . '</td>
                        <td colspan="3" style="text-align: center;">' . $cyl_og . '</td>
                        <td colspan="3" style="text-align: center;">' . $axe_og . '</td>
                        <td colspan="3" style="text-align: center;">' . $add_og . '</td>
                    </tr>
                </table>
            </div>
            <br><br>
            <p style="text-align: left; display: inline-block; width: 32%; font-weight: bold;">C. VAL OD/OG</p>
            <p style="text-align: center; display: inline-block; width: 32%; font-weight: bold;">C.AVP ODG</p>
            <p style="text-align: right; display: inline-block; width: 32%; font-weight: bold;">DIP OD/OG</p>

            <p><strong>Type de port</strong>: &nbsp;&nbsp;  Constant - Temporaire</p>
            <p><strong>Type de verres</strong>: Progressif, Désignatif, Bifocaux, Unifocaux</p>
            <p><strong>Matière</strong>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Minéraux, Organiques, Polycarbonate, Blue Protect</p>
            <p><strong>Traitement</strong>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AR - UVA - ARB - Hydrophobe</p>
            <p><strong>Teinte</strong>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Blanc - AB - Photochromique - Transition</p>
            <p><strong>Indice</strong></p>

            <div class="footer">
                <hr style="margin-bottom: 10px;">
                <p style="text-align: center;">Verres à contrôler après achat</p>
            </div>
        ';

        // Générer le PDF à partir du contenu HTML
        $pdf = PDF::loadHTML($html);

        // Télécharger le PDF
        return $pdf->download('ordonnance.pdf');
    }



    public function indexOrdonnance()
    {
        // Récupérer les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];


        $prescriptions = Prescription::all();
        return view('clients.listeOrdonnance', compact('prescriptions', 'notifications', 'notifications_notread'));
    }

    public function voirOrdonnance($id)
    {
        // Récupérer les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];


        $prescription = Prescription::findOrFail($id);
        return view('clients.voirOrdonnance', compact('prescription', 'notifications', 'notifications_notread'));
    }

    public function editOrdonnance($id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('prescriptions.edit', compact('prescription'));

    }

    public function updateOrdonnance(Request $request, $id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->update($request->all());
        return redirect()->route('prescriptions.index')->with('success', 'Ordonnance mise à jour avec succès');
    }

    public function destroyOrdonnance($id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->delete();
        return redirect()->route('prescriptions.index')->with('success', 'Ordonnance supprimée avec succès');
    }










    public function showordonnance(){
        // Récupérer les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Retourner la vue avec les factures et les notifications
        return view('clients.ordonnance', compact('notifications', 'notifications_notread'));

    }

    }
