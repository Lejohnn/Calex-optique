<?php

namespace App\Http\Controllers;

use App\Http\Services\NotificationService;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
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

        return view('notifications.index', compact('notifications', 'notifications_notread'));
    }

    public function editStatus(Notification $notification){
        $state = $this->notificationService->editStatus($notification);
        //$notifications = Notification::all();
        if($state == true){
            return redirect()->route('notifications.index')->with('success', 'notification supprimé avec succès.');
        }
         return redirect()->route('notifications.index')->with('error', 'une erreur s\'est produite lors de la suppression.');

    }






}
