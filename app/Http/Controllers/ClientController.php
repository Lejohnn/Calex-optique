<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Http\Services\NotificationService;
use App\Models\Client;
use App\Models\Notification;
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
            $notifications = $this->notificationService->notification_template()[0];
            $notifications_notread = $this->notificationService->notification_template()[1];
            return view('clients.list', compact('clients','notifications','notifications_notread'));
        }

        // public function createcopy()
        // {
        //     return view('clients.createcopy');
        // }

        public function create()
        {
            $notifications = $this->notificationService->notification_template()[0];
            $notifications_notread = $this->notificationService->notification_template()[1];
            return view('clients.create', compact('notifications','notifications_notread'));
        }

        public function register(){
            $notifications = $this->notificationService->notification_template()[0];
            $notifications_notread = $this->notificationService->notification_template()[1];
            return view('clients.register', compact('notifications','notifications_notread'));

        }




        public function store(Request $request)
        {

            $notifications = $this->notificationService->notification_template()[0];
            $notifications_notread = $this->notificationService->notification_template()[1];

            // Validation des données du formulaire
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
            ]);
            if ($request->choix_service == "consultation"){
                $client = new Client([
                    'nom' => $request->input('nom'),
                    'prenom' => $request->input('prenom'),
                    'telephone' => $request->input('telephone'),
                    'carte_identite' => $request->input('carte_identite'),
                    'date_naissance' => $request->input('date_naissance'),
                    'lieu_naissance' => $request->input('lieu_naissance'),
                    'profession' => $request->input('profession'),
                    'sexe' => $request->input('sexe'),
                    'societe_attache' => $request->input('societe_attache'),
                    'assurance' => $request->input('assurance'),
                    'disciplines_pratiquees' => $request->input('disciplines_pratiquees'),
                    'date_debut' => $request->input('date_debut'),
                    'activite_interpelant_vision' => $request->input('activite_interpelant_vision'),
                    'antecedents_familiaux' => $request->input('antecedents_familiaux'),
                    'antecedents_chirurgicaux' => $request->input('antecedents_chirurgicaux'),
                    'traitements_en_cours' => $request->input('traitements_en_cours'),
                    'allergies' => $request->input('allergies'),
                    'mentions_generales' => $request->input('mentions_generales'),
                    'portez_vous_des_lunettes' => $request->input('portez_vous_des_lunettes', 0),
                    'besoin_changer_lunettes' => $request->input('besoin_changer_lunettes', 0),
                    'autre_choses' => $request->input('autre_choses'),
                    'diagnostic' => $request->input('diagnostic'),
                    'prescription' => $request->input('prescription'),
                    'examen_particulier' => $request->input('examen_particulier'),
                    'rendez_vous' => $request->input('rendez_vous'),
                    'choix_service' => $request->input('choix_service'),
                ]);


                // Enregistrement du client dans la base de données
                $client->save();
                $name_client = strtoupper($request->nom) ;
                $notification = new Notification(
                    [
                        'message' => "consultation de Mrs $name_client  (cliquez pour acceder)",
                        'status' => 0,
                        'visibility' => 0,
                        'user_id'=> 3,
                        'client_id' => $client->id,
                    ]
                );
                $notification->save();

                // Redirection vers une page appropriée avec un message de succès
                return redirect()->route('clients.list')
                    ->with('success', 'Client "'.$client->nom.'" ajouté avec succès. une notification à été envoyé au responsable')
                    ->with('notifications', $notifications)
                    ->with('notifications_notread' , $notifications_notread);



            }



        }


        public function show(Client $client)
        {
            $notifications = $this->notificationService->notification_template()[0];
            $notifications_notread = $this->notificationService->notification_template()[1];
            return view('clients.show', compact('client','notifications','notifications_notread'));
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
        // Validation des données du formulaire
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
            'diagnostic' => 'nullable|string', // Nouvelles colonnes
            'prescription' => 'nullable|string',
            'examen_particulier' => 'nullable|string',
            'rendez_vous' => 'nullable|date',
            'choix_service' => 'required|string',
        ]);

        // Mise à jour des informations du client
        $client->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'telephone' => $request->input('telephone'),
            'carte_identite' => $request->input('carte_identite'),
            'date_naissance' => $request->input('date_naissance'),
            'lieu_naissance' => $request->input('lieu_naissance'),
            'profession' => $request->input('profession'),
            'sexe' => $request->input('sexe'),
            'societe_attache' => $request->input('societe_attache'),
            'assurance' => $request->input('assurance'),
            'disciplines_pratiquees' => $request->input('disciplines_pratiquees'),
            'date_debut' => $request->input('date_debut'),
            'activite_interpelant_vision' => $request->input('activite_interpelant_vision'),
            'antecedents_familiaux' => $request->input('antecedents_familiaux'),
            'antecedents_chirurgicaux' => $request->input('antecedents_chirurgicaux'),
            'traitements_en_cours' => $request->input('traitements_en_cours'),
            'allergies' => $request->input('allergies'),
            'mentions_generales' => $request->input('mentions_generales'),
            'portez_vous_des_lunettes' => $request->input('portez_vous_des_lunettes', 0),
            'besoin_changer_lunettes' => $request->input('besoin_changer_lunettes', 0),
            'autre_choses' => $request->input('autre_choses'),
            'diagnostic' => $request->input('diagnostic'),
            'prescription' => $request->input('prescription'),
            'examen_particulier' => $request->input('examen_particulier'),
            'rendez_vous' => $request->input('rendez_vous'),
            'choix_service' => $request->input('choix_service'),
        ]);
        Notification::where('user_id', auth()->user()->role->id)
            ->where('visibility', 0)
            ->update(['status' => 1]);

        // Redirection vers une page appropriée avec un message de succès
        return redirect()->route('clients.list')
            ->with('success', 'Client "'.$client->nom.'" modifié avec succès.')
            ->with('notifications', $notifications)
            ->with('notifications_notread', $notifications_notread);
    }


        public function destroy(Client $client)
        {
            $notifications = $this->notificationService->notification_template()[0];
            $notifications_notread = $this->notificationService->notification_template()[1];
            $clientName = $client->nom;
            // Suppression du client
            $client->delete();

            return redirect()->route('clients.list')
                ->with('success', 'Client "'.$clientName.'" supprimé avec succès.')
                ->with('notifications', $notifications)
                ->with('notifications_notread', $notifications_notread);
        }



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
    }
