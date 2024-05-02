<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificationService;
use App\Models\Client;
use App\Models\Notification;
use App\Models\Prospect;
use Illuminate\Http\Request;

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

        // Récupérer les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Retourner la vue avec les données des clients et des notifications
        return view('call_service.clients', compact('clients', 'notifications', 'notifications_notread'));
    }
}
