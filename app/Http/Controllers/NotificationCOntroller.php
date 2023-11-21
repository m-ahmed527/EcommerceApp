<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationCOntroller extends Controller
{
    public function markread($id){
        if($id){
            // auth()->user()->unreadNotifications->markAsRead();
            auth()->user()->unreadNotifications->where('id',$id)->markAsRead();
        }
        return back()->with('success', 'Notification has been Read...');
    }

    public function markAllAsRead(){
       $notifications = auth()->user()->unreadNotifications;
       $notifications->markAsRead();
        return back();
        }
}
