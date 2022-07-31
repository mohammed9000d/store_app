<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('notification', [
            'user' => $user->notifications()->paginate(10)
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();
        $notification = $user->notifications()->find($id);
        $notification->markAsRead();
        if(isset($notification->data['order_id']) && $notification->data['url']) {
            return redirect($notification->data['url']);
        }
        return redirect()->back();
    }
}
