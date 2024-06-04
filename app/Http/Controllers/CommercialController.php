<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificationService;
use Illuminate\Http\Request;
use App\Models\Prospect;
use Illuminate\Support\Facades\View;


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

    public function index()
{
    $prospects = Prospect::all();
    // $commercials = Prospect::select('commercial_name')->distinct()->get(); // Sélectionnez uniquement les noms des commerciaux sans doublons
    // $activeSection = 'entreprise-section';
    $notifications = $this->notificationService->notification_template()[0];
    $notifications_notread = $this->notificationService->notification_template()[1];

    // Retourner la vue en passant les données directement
    return view('commercial.index', compact('prospects', 'notifications', 'notifications_notread'));
}



public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'commercial_name' => 'required|string|max:255',
        'entreprise_nom' => 'nullable|string|max:255',
        'entreprise_responsable' => 'nullable|string|max:255',
        'entreprise_contact' => 'nullable|string|max:255',
        'entreprise_heure' => 'nullable|string|max:255',
        'rdv_nom_prenom' => 'nullable|string|max:255',
        'rdv_contact' => 'nullable|string|max:255',
        'rdv_societe' => 'nullable|string|max:255',
        'rdv_heure' => 'nullable|string|max:255',
        'nettoyage_nom_prenom' => 'nullable|string|max:255',
        'nettoyage_contact' => 'nullable|string|max:255',
        'nettoyage_societe' => 'nullable|string|max:255',
        'nettoyage_heure' => 'nullable|string|max:255',
        'date_rdv' => 'required|date',
        'statut' => 'nullable|string|in:pas_encore,verifie,pas_bon,ok',
    ], [
        'required' => 'Le champ :attribute est requis.',
        'unique' => 'Le :attribute existe déjà.',
        'in' => 'La valeur du :attribute n\'est pas valide.',
    ]);

    Prospect::create($request->all());

    return redirect()->route('commercial.index')
        ->with('success', 'Client prospecté ajouté avec succès!')
        ->with('notifications', $this->notificationService->notification_template()[0])
        ->with('notifications_notread', $this->notificationService->notification_template()[1]);
}

public function edit($id)
{
    $prospect = Prospect::findOrFail($id);
    $notifications = $this->notificationService->notification_template()[0];
    $notifications_notread = $this->notificationService->notification_template()[1];
    return view('commercial.edit', compact('prospect', 'notifications', 'notifications_notread'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'commercial_name' => 'required|string|max:255',
            'entreprise_nom' => 'nullable|string|max:255',
            'entreprise_responsable' => 'nullable|string|max:255',
            'entreprise_contact' => 'nullable|string|max:255',
            'entreprise_heure' => 'nullable|string|max:255',
            'rdv_nom_prenom' => 'nullable|string|max:255',
            'rdv_contact' => 'nullable|string|max:255',
            'rdv_societe' => 'nullable|string|max:255',
            'rdv_heure' => 'nullable|string|max:255',
            'nettoyage_nom_prenom' => 'nullable|string|max:255',
            'nettoyage_contact' => 'nullable|string|max:255',
            'nettoyage_societe' => 'nullable|string|max:255',
            'nettoyage_heure' => 'nullable|string|max:255',
            'date_rdv' => 'required|date',
            'statut' => 'required|string|in:pas_encore,verifie,pas_bon,ok',
        ], [
            'required' => 'Le champ :attribute est requis.',
            'unique' => 'Le :attribute existe déjà.',
            'in' => 'La valeur du :attribute n\'est pas valide.',
        ]);

        $prospect = Prospect::findOrFail($id);
        $prospect->update($request->all());

    return redirect()->route('commercial.index')
        ->with('success', 'Client prospecté mis à jour avec succès!')
        ->with('notifications', $this->notificationService->notification_template()[0])
        ->with('notifications_notread', $this->notificationService->notification_template()[1]);
}

public function destroy($id)
{
    $prospect = Prospect::findOrFail($id);
    $prospect->delete();

    return redirect()->route('commercial.index')
        ->with('success', 'Client prospecté supprimé avec succès!')
        ->with('notifications', $this->notificationService->notification_template()[0])
        ->with('notifications_notread', $this->notificationService->notification_template()[1]);
}

public function show($id)
{
    $prospect = Prospect::findOrFail($id);
    $notifications = $this->notificationService->notification_template()[0];
    $notifications_notread = $this->notificationService->notification_template()[1];
    return view('commercial.show', compact('prospect', 'notifications', 'notifications_notread'));
}

public function updateStatus(Request $request, $id)
{
    $prospect = Prospect::findOrFail($id);
    $prospect->update(['statut' => $request->statut]);

    return redirect()->back()->with('success', 'Statut mis à jour avec succès!');
}

public function statistique (){

    $notifications = $this->notificationService->notification_template()[0];
    $notifications_notread = $this->notificationService->notification_template()[1];

    // Retourner la vue en passant les données directement
    return view('commercial.stat', compact( 'notifications', 'notifications_notread'));
}


// public function prospectsByCommercial(Request $request)
// {
//     $commercialName = $request->input('commercial_name');
//     $prospects = Prospect::where('commercial_name', $commercialName)->get();

//     // Retourner les données sous forme de réponse JSON
//     return response()->json($prospects);
// }


    // Autres méthodes...

}
