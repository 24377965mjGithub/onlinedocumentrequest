<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailNotification;
use App\Mail\EmailNotification as MailEmailNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function sendNotification(EmailNotification $request, $userid) {
        $email = User::where('id', $userid)->value('email');
        $notif = $request->notify;

        if (Mail::to($email)->send(new MailEmailNotification($notif))) {
            return back()->with('notifsuccess', 'Email sent successfully.');
        }
    }
}


// copyright
// export report
// search bar
