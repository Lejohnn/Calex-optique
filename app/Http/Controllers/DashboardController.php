<?php

namespace App\Http\Controllers;


use App\Http\Services\NotificationService;
use App\Models\Facture;
use App\Models\Notification;
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

        $billing_counter = Facture::whereDate('created_at', $today)->count();
        $billingToday = Facture::whereDate('created_at', $today)
            ->orderBy('created_at') // Order by creation date
            ->get();

        $totalAmount = $billingToday->sum('montant_total_ht');
        //dd($billing_counter,$totalAmount);
        $billingMangement = [$billing_counter, $totalAmount];

        return view('dashboard.index', compact("notifications", "notifications_notread","billingMangement"));
    }
}
