<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificationService;
use Illuminate\Http\Request;
use App\Models\Prospect;
use App\Models\Commercial;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class CommercialController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }


    public function testHeure(Request $request)
    {
        $request->validate([
            'commercial_id' => 'required|integer',
            'date_rdv' => 'required|date',
            'rdv_heure' => 'required|date_format:H:i',
        ]);

        try {
            $commercial = Prospect::findOrFail($request->commercial_id);
            $commercial->date_rdv = $request->date_rdv;
            $commercial->rdv_heure = $request->rdv_heure;
            $commercial->save();

            return response()->json(['success' => true, 'message' => 'L\'heure et la date du rendez-vous ont été mises à jour avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Une erreur s\'est produite lors de la mise à jour.']);
        }
    }


    public function create()
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        $commercials = Commercial::all();
        return view('commercial.create', compact('notifications', 'notifications_notread', 'commercials'));
    }

    public function index()
    {
        $prospects = Prospect::with('commercial')->get();
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        return view('commercial.index', compact('prospects', 'notifications', 'notifications_notread'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'commercial_id' => 'required|exists:commercials,id',
            'entreprise_nom' => 'nullable|string|max:255',
            'entreprise_responsable' => 'nullable|string|max:255',
            'entreprise_contact' => 'nullable|string|max:255',
            'rubrique' => 'nullable|string|max:255',
            'entreprise_heure' => 'nullable|string|max:255',
            'rdv_heure' => 'nullable|string|max:255',
            'date_rdv' => 'required|date',
            'statut' => 'nullable|string|in:pas_encore,verifie,pas_bon,ok',
        ], [
            'required' => 'Le champ :attribute est requis.',
            'unique' => 'Le :attribute existe déjà.',
            'in' => 'La valeur du :attribute n\'est pas valide.',
        ]);

        $prospect = Prospect::create($request->all());

        // Ajouter +1 point au commercial
        $commercial = Commercial::find($request->input('commercial_id'));
        $commercial->points += 1;
        $commercial->save();

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
        $commercials = Commercial::all();
        return view('commercial.edit', compact('prospect', 'notifications', 'notifications_notread', 'commercials'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'commercial_id' => 'required|exists:commercials,id',
            'entreprise_nom' => 'nullable|string|max:255',
            'entreprise_responsable' => 'nullable|string|max:255',
            'entreprise_contact' => 'nullable|string|max:255',
            'entreprise_heure' => 'nullable|string|max:255',
            'rubrique' => 'nullable|string|max:255',
            'rdv_heure' => 'nullable|string|max:255',
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
        $commercial = Commercial::find($prospect->commercial_id);

        $status = $request->input('statut');
        $prospect->update(['validation_status' => $status, 'validation_date' => now()]);

        // Adjust points based on status
        if ($status == 'confirmed') {
            $commercial->points += 1;
        } elseif ($status == 'denied') {
            $commercial->points -= 3;
        }

        $commercial->save();

        return redirect()->back()->with('success', 'Statut mis à jour avec succès!');
    }

    // public function showMonthlyPerformance($id)
    // {

    //     $notifications = $this->notificationService->notification_template()[0];
    //     $notifications_notread = $this->notificationService->notification_template()[1];

    //     $commercial = Commercial::findOrFail($id);
    //     $monthlyPerformances = $commercial->monthlyPerformances()->orderBy('month', 'desc')->get();

    //     return view('commercial.monthly_performance', compact('commercial', 'monthlyPerformances','notifications', 'notifications_notread'));
    // }





    public function statistique()
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        return view('commercial.stat', compact('notifications', 'notifications_notread'));
    }
}
