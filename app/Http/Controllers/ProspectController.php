<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificationService;
use Illuminate\Http\Request;
use App\Models\Prospect;

class CommercialController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function create()
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('commercial.create', compact('notifications', 'notifications_notread'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'nullable|date',
            'nom_commercial' => 'required|string|max:255',
            'entreprise_nom' => 'nullable|string|max:255',
            'entreprise_responsable' => 'nullable|string|max:255',
            'entreprise_contact' => 'required|string|max:255',
            'entreprise_heure' => 'nullable|string|max:255',
            'rdv_nom_prenom' => 'nullable|string|max:255',
            'rdv_contact' => 'required|string|max:255',
            'rdv_societe' => 'nullable|string|max:255',
            'rdv_heure' => 'nullable|string|max:255',
            'nettoyage_nom_prenom' => 'nullable|string|max:255',
            'nettoyage_contact' => 'required|string|max:255',
            'nettoyage_societe' => 'nullable|string|max:255',
            'nettoyage_heure' => 'nullable|string|max:255',
        ]);

        Prospect::create($request->all());

        return redirect()->route('commercials.index')
            ->with('success', 'Commercial ajouté avec succès!')
            ->with('notifications', $this->notificationService->notification_template()[0])
            ->with('notifications_notread', $this->notificationService->notification_template()[1]);
    }

    // Autres méthodes...

}
