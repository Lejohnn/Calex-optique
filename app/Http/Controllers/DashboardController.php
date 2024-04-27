<?php

namespace App\Http\Controllers;


use App\Http\Services\NotificationService;
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



        return view('dashboard.index', compact("notifications", "notifications_notread"));
    }
}
