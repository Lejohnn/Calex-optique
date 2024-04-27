<?php

namespace App\Http\Services;

use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class NotificationService
{
    public function editStatus(Notification $notification)
    {

        $state = $notification->update(
            [
                'visibility' => 1,
            ]
        );

        //dd($state);
        // Suppression du client
        if ($state){
            return true;
        }
         return false;

        //return redirect()->route('notifications.index')->with('success', 'Client "'.$notification_desc.'" supprimé avec succès.');
    }

    public function notification_template(){
        $notifications = Notification::where('visibility', 0)
            ->where('user_id',  auth()->user()->role->id)
            ->get();

        $notifications_notread= DB::table('notifications')->where([['status', 0]])
            ->where('user_id',  auth()->user()->role->id)
            ->count();


        return [$notifications,$notifications_notread];
    }
}
