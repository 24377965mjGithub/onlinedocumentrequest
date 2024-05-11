<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackerController extends Controller
{
    public function trackRequest($id) {
        if (Auth::user()->role === 'student') {
            $statuses = Status::where('requestid', $id)->orderBy('id', 'desc')->get();
            return view('student.track-request', [
                'statuses' => $statuses
            ]);
        } else {
            return redirect('/dashboard');
        }
    }
}
