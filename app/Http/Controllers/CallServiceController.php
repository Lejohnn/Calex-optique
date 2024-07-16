<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificationService;
use App\Models\Client;
use App\Models\Notification;
use App\Models\Prospect;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CallServiceController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    // Méthode pour afficher les prospects
    public function showProspects()
    {
        // Récupérer tous les prospects depuis la base de données
        $prospects = Prospect::all();

        // Récupérer les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Retourner la vue avec les données des prospects et des notifications
        return view('call_service.prospects', compact('prospects', 'notifications', 'notifications_notread'));
    }

    // Méthode pour afficher les clients
    public function showClients()
    {
        // Récupérer tous les clients depuis la base de données
        $clients = Client::all();

        $now = Carbon::now();
    $toastrNotifications = [];

    $clients = $clients->map(function($client) use ($now, &$toastrNotifications) {
        if (!empty($client->rendez_vous)) {
            $rendezVous = Carbon::parse($client->rendez_vous);
            $differenceInDays = $now->diffInDays($rendezVous, false);

            // Déterminer la couleur du rendez-vous
            if ($differenceInDays == 2) {
                $client->rendez_vous_color = 'btn-warning'; // Jaune
                $toastrNotifications[] = "Le rendez-vous avec {$client->nom} est dans 2 jours.";
            } elseif ($differenceInDays == 1) {
                $client->rendez_vous_color = 'btn-orange'; // Orange
                $toastrNotifications[] = "Le rendez-vous avec {$client->nom} est demain.";
            } elseif ($differenceInDays == 0) {
                $client->rendez_vous_color = 'btn-danger'; // Rouge
                $toastrNotifications[] = "Le rendez-vous avec {$client->nom} est aujourd'hui.";
            } else {
                $client->rendez_vous_color = 'btn-outline-info'; // Par défaut
            }

            // Format de la date pour les rendez-vous dans les 7 jours
            if ($differenceInDays < 7 && $differenceInDays >= 0) {
                $client->formatted_rendez_vous = $rendezVous->locale('fr')->isoFormat('dddd HH:mm:ss');
            } else {
                $client->formatted_rendez_vous = $rendezVous->format('Y-m-d H:i:s');
            }
        } else {
            $client->formatted_rendez_vous = null;
            $client->rendez_vous_color = null;
        }

        return $client;
    });

        // Récupérer les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Retourner la vue avec les données des clients et des notifications
        return view('call_service.clients', compact('clients', 'notifications', 'notifications_notread','toastrNotifications'));
    }

    // public function setAppointment(Request $request)
    //     {
    //         $validated = $request->validate([
    //             'client_id' => 'required|integer',
    //             'rendez_vous' => 'required|date',  // Validation pour la date
    //             'rendez_vous_time' => 'required|date_format:H:i',  // Validation pour l'heure
    //         ]);

    //         $client = Client::find($validated['client_id']);

    //         if ($client) {
    //             // Combine date and time
    //             $client->rendez_vous = $validated['rendez_vous'] . ' ' . $validated['rendez_vous_time'];
    //             $client->rendez_vous_time = $validated['rendez_vous_time'];
    //             $client->save();

    //             return response()->json(['success' => 'Rendez-vous défini avec succès.']);
    //         }

    //         return response()->json(['error' => 'Client non trouvé.'], 404);
    //     }
}
