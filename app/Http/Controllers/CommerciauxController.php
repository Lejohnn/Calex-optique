<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificationService;
use App\Models\Commercial;
use App\Models\Prospect;
use Illuminate\Http\Request;

class CommerciauxController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        $commercials = Commercial::all();
        return view('commercial.agent.index', compact('commercials', 'notifications', 'notifications_notread'));
    }

    public function create()
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('commercial.agent.create', compact('notifications', 'notifications_notread'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'points' => 'required|integer',
        ], [
            'required' => 'Le champ :attribute est requis.',
            'date' => 'Le :attribute doit être une date valide.',
            'integer' => 'Le :attribute doit être un entier.',
            'max' => 'Le :attribute ne peut pas dépasser :max caractères.',
        ]);

        $commercial = new Commercial();
        $commercial->full_name = $request->full_name;
        $commercial->start_date = $request->start_date;
        $commercial->points = $request->points;
        $commercial->save();

        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        return redirect()->route('agent.create')->with('success', 'Commercial créé avec succès!')
            ->with('notifications', $notifications)
            ->with('notifications_notread', $notifications_notread);
    }

    public function show(Commercial $commercial)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('commercial.agent.show', compact('commercial', 'notifications', 'notifications_notread'));
    }

    public function edit(Commercial $commercial)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        return view('commercial.agent.edit', compact('commercial', 'notifications', 'notifications_notread'));
    }

    public function update(Request $request, Commercial $commercial)
    {
        $request->validate([
            'full_name' => 'sometimes|string|max:255',
            'start_date' => 'sometimes|date',
            'points' => 'sometimes|integer',
        ], [
            'date' => 'Le :attribute doit être une date valide.',
            'integer' => 'Le :attribute doit être un entier.',
            'max' => 'Le :attribute ne peut pas dépasser :max caractères.',
        ]);

        $commercial->full_name = $request->input('full_name', $commercial->full_name);
        $commercial->start_date = $request->input('start_date', $commercial->start_date);
        $commercial->points = $request->input('points', $commercial->points);
        $commercial->save();

        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        return redirect()->route('agent.index')
            ->with('success', 'Commercial mis à jour avec succès.')
            ->with('notifications', $notifications)
            ->with('notifications_notread', $notifications_notread);
    }

    public function destroy(Commercial $commercial)
    {
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        $commercial->delete();

        return redirect()->route('agent.index')
            ->with('success', 'Commercial supprimé avec succès.')
            ->with('notifications', $notifications)
            ->with('notifications_notread', $notifications_notread);
    }

    public function stats()
    {
        // Obtenez la date actuelle
        $today = now()->format('Y-m-d');

        // Récupérez les commerciaux et leurs statistiques
        $commercials = \DB::table('commercials')
            ->leftJoin('prospects', 'commercials.id', '=', 'prospects.commercial_id')
            ->select('commercials.id', 'commercials.full_name as name',
                \DB::raw('COUNT(prospects.id) as total_prospects'),
                \DB::raw('SUM(CASE WHEN DATE(prospects.created_at) = "'.$today.'" THEN 1 ELSE 0 END) as prospects_today')
            )
            ->groupBy('commercials.id', 'commercials.full_name')
            ->get();

        // Récupérez les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Récupérer les prospects associés à chaque commercial
        $prospectsByCommercial = [];
        foreach ($commercials as $commercial) {
            $prospects = Prospect::where('commercial_id', $commercial->id)->get();
            $prospectsByCommercial[$commercial->id] = $prospects;
        }

        return view('commercial.stat', compact('commercials', 'notifications', 'notifications_notread', 'prospectsByCommercial'));
    }

    public function showProspects($id)
    {
        $commercial = Commercial::findOrFail($id);
        $prospects = $commercial->prospects;
        // Récupérez les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        return view('commercial.agentStat', compact('commercial', 'prospects', 'notifications', 'notifications_notread'));
    }

    // public function getProspects($id)
    // {
    //     $commercial = Commercial::findOrFail($id);
    //     $prospects = $commercial->prospects;

    //     return response()->json($prospects);
    // }

    // public function getProspectsByCommercial(Request $request)
    // {
    //     $commercialId = $request->input('commercialId');

    //     // Récupérez les notifications
    //     $notifications = Notification::all();

    //     // Récupérer les prospects associés au commercial spécifique depuis la base de données
    //     $prospects = Prospect::where('commercial_id', $commercialId)->get();

    //     // Passer les données des prospects et des notifications à la vue pour affichage
    //     return view('commercial.stats', ['prospects' => $prospects, 'notifications' => $notifications]);
    // }


}
