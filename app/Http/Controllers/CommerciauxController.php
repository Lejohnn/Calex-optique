<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificationService;
use App\Models\Commercial;
use App\Models\Prospect;
use App\Models\MonthlyPerformance;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        return redirect()->route('agent.index')->with('success', 'Commercial créé avec succès!')
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
                \DB::raw('SUM(CASE WHEN DATE(prospects.created_at) = "'.$today.'" THEN 1 ELSE 0 END) as prospects_today'),
                'commercials.points'
            )
            ->groupBy('commercials.id', 'commercials.full_name', 'commercials.points')
            ->get();

        // Récupérez les notifications
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        // Récupérer les prospects associés à chaque commercial et calculer les points
        $prospectsByCommercial = [];
        foreach ($commercials as $commercial) {
            $prospects = Prospect::where('commercial_id', $commercial->id)->get();
            $prospectsByCommercial[$commercial->id] = $prospects;

            // Recalculer les points en ajoutant les points actuels
            $currentPoints = $commercial->points;
            $calculatedPoints = $this->calculatePoints($commercial->id, $prospects);

            // Seulement mettre à jour les points si le calcul est différent des points actuels
            if ($currentPoints != $calculatedPoints) {
                $commercial->points = $calculatedPoints;
                \DB::table('commercials')
                    ->where('id', $commercial->id)
                    ->update(['points' => $commercial->points]);
            }

            // Définir la note quotidienne
            $commercial->daily_note = $this->getDailyNoteAttribute($commercial->prospects_today);
        }

        return view('commercial.stat', compact('commercials', 'notifications', 'notifications_notread', 'prospectsByCommercial'));
    }





    private function calculatePoints($commercialId)
    {
        $points = 0;
        $prospects = Prospect::where('commercial_id', $commercialId)->get();

        foreach ($prospects as $prospect) {
            if ($prospect->validation_status == 'confirmed') {
                $points += 1;
            } elseif ($prospect->validation_status == 'denied') {
                $points -= 3;
            }
        }

        $threeDaysAgo = now()->subDays(3);
        $pendingProspects = Prospect::where('commercial_id', $commercialId)
            ->where('validation_status', 'pending')
            ->where('created_at', '<', $threeDaysAgo)
            ->get();

        foreach ($pendingProspects as $prospect) {
            $points -= 1;
        }

        return $points;
    }

    public function updateProspectStatus(Request $request, $id)
    {
        $request->validate([
            'validation_status' => 'required|string|in:confirmed,denied,pending,peace',
        ]);

        $prospect = Prospect::findOrFail($id);
        $prospect->validation_status = $request->validation_status;
        $prospect->save();

        // Recalculez les points du commercial
        $commercial = Commercial::findOrFail($prospect->commercial_id);
        $commercial->points = $this->calculatePoints($commercial->id);
        $commercial->save();

        return redirect()->back()->with('success', 'Statut du prospect mis à jour et points recalculés.');
    }

    private function getDailyNoteAttribute($prospectsToday)
    {
        if ($prospectsToday < 5) {
            return ['note' => 'Pas bon', 'color' => 'red'];
        } elseif ($prospectsToday == 5) {
            return ['note' => 'Passable', 'color' => 'orange'];
        } else {
            return ['note' => 'Bon', 'color' => 'green'];
        }
    }

    public function showProspects($id)
    {
        $commercial = Commercial::findOrFail($id);
        $prospects = $commercial->prospects;
        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];

        return view('commercial.agentStat', compact('commercial', 'prospects', 'notifications', 'notifications_notread'));
    }


    // public function showMonthlyPerformance()
    // {

    //     $notifications = $this->notificationService->notification_template()[0];
    //     $notifications_notread = $this->notificationService->notification_template()[1];

    //     // Récupérer tous les commerciaux avec leurs performances mensuelles
    //     $commercials = Commercial::with('monthlyPerformances')->get();
    //     return view('commercial.performance', compact('commercials', 'notifications', 'notifications_notread'));
    // }

    public function showMonthlyPerformance()
{
    $notifications = $this->notificationService->notification_template()[0];
    $notifications_notread = $this->notificationService->notification_template()[1];

    // Récupérer tous les commerciaux avec leurs performances mensuelles
    $commercials = Commercial::with('monthlyPerformances')->get();

    // Récupérer la date du mois précédent et du mois en cours
    $lastMonth = Carbon::now()->subMonth()->format('Y-m');
    $currentMonth = Carbon::now()->format('Y-m');

    // Récupérer les performances pour le mois passé, le mois en cours et toutes les performances
    $lastMonthPerformances = MonthlyPerformance::where('month', $lastMonth)->get();
    $currentMonthPerformances = MonthlyPerformance::where('month', $currentMonth)->get();
    $allPerformances = MonthlyPerformance::all();
    // dd($currentMonth);

    return view('commercial.performance', compact('commercials', 'notifications', 'notifications_notread', 'lastMonth', 'currentMonth',  'lastMonthPerformances', 'currentMonthPerformances', 'allPerformances'));
}



}
