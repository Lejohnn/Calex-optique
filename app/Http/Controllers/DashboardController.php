<?php

namespace App\Http\Controllers;


use App\Http\Services\NotificationService;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller{
    private $notificationService;
    public function __construct(NotificationService $notificationService){
        $this->notificationService = $notificationService;
    }
    public function index(){

        $notifications = $this->notificationService->notification_template()[0];
        $notifications_notread = $this->notificationService->notification_template()[1];
        $today = now()->format('Y-m-d'); // Get today's date in YYYY-MM-DD format
        $todayCarbon = now();

        $billing_counter = Facture::whereDate('created_at', $today)->count();
        $billingToday = Facture::whereDate('created_at', $today)
            ->orderBy('created_at') // Order by creation date
            ->get();

        $totalAmount = $billingToday->sum('montant_total_ht');
        //dd($billing_counter,$totalAmount);
        $billingMangement = [$billing_counter, $totalAmount];

        // Statistique de Gestion des rendez vous des clients par le medecins

        $clientThisDay = Notification::whereDate('created_at', $today)
            ->count();
        $clientThisDayGood = Notification::whereDate('created_at', $today)
            ->where('status', 1)
            ->count();

        $clientThisWeek = Notification::where('created_at', '>=', $todayCarbon->startOfWeek()->format('Y-m-d'))
            ->where('created_at', '<=', $todayCarbon->endOfWeek()->format('Y-m-d'))
            ->orderBy('created_at')
            ->get()->count();

        $clientThisWeekGood = Notification::where('created_at', '>=', $todayCarbon->startOfWeek()->format('Y-m-d'))
            ->where('created_at', '<=', $todayCarbon->endOfWeek()->format('Y-m-d'))
            ->where('status', 1)
            ->orderBy('created_at')
            ->get()->count();

        $clientThisMonth = Notification::where('created_at', '>=', $todayCarbon->startOfMonth()->format('Y-m-d'))
            ->where('created_at', '<=', $todayCarbon->endOfMonth()->format('Y-m-d'))

            ->orderBy('created_at')
            ->get()->count();

        $clientThisMonthGood = Notification::where('created_at', '>=', $todayCarbon->startOfMonth()->format('Y-m-d'))
            ->where('created_at', '<=', $todayCarbon->endOfMonth()->format('Y-m-d'))
            ->where('status', 1)
            ->orderBy('created_at')
            ->get()->count();

        $clientThisYear = Notification::where('created_at', '>=', $todayCarbon->startOfYear()->format('Y-m-d'))
            ->where('created_at', '<=', $todayCarbon->endOfYear()->format('Y-m-d'))
            ->orderBy('created_at')
            ->get()->count();

        $clientThisYearGood = Notification::where('created_at', '>=', $todayCarbon->startOfYear()->format('Y-m-d'))
            ->where('created_at', '<=', $todayCarbon->endOfYear()->format('Y-m-d'))
            ->where('status', 1)
            ->orderBy('created_at')
            ->get()->count();

        $allStatsClients= [["Aujourd'hui", $clientThisDayGood, $clientThisDay],
            ["Semaine en cours",$clientThisWeekGood, $clientThisWeek],
            ["Mois en cours", $clientThisMonthGood, $clientThisMonth],
            ["Année en cours",$clientThisYearGood, $clientThisYear]
        ];

        // recuperer les statistisque des nouveaux clients par rapport au nombre total
        $clientThisDayNew = Notification::whereDate('created_at', $today)
            ->count();
        $allclients = Client::all()->count();

        $newClientByTotal = [$clientThisDayNew, $allclients];
// statistique des patients traités par la caisse
        $patientGoodCaisseDay = Facture::whereDate('created_at', $today)
            ->groupBy('client_id')->count();

        $patientsCaisse = Client::where('choix_service', 'caisse')->count();

        $patientGoodCaisseMonth = Facture::where('updated_at', '>=', Carbon::now()->startOfMonth()->format('Y-m-d'))
            ->where('updated_at', '<=', Carbon::now()->endOfMonth()->format('Y-m-d'))
            ->groupBy('client_id')->count();





        $allStatsPatients= [["Aujourd'hui", $patientGoodCaisseDay, $patientsCaisse],
            ["Mois en cours", $patientGoodCaisseMonth, $patientsCaisse],
        ];

        return view('dashboard.index', compact("notifications",
            "notifications_notread",
            "billingMangement",
            "allStatsClients",
            "newClientByTotal",
            "allStatsPatients",
        ));
    }
}
