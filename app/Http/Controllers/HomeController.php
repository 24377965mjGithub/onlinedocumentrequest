<?php

namespace App\Http\Controllers;

use App\Models\DepartmentLevels;
use App\Models\Documents;
use App\Models\Requests;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        if (Auth::user()->role === 'admin') {
            return view('admin.dashboard');
        }
        if (Auth::user()->role === 'student') {
            $requests = Requests::where('userid', Auth::user()->id)->get();
            $documents = Documents::all();
            $departmentlevels = DepartmentLevels::all();
            return view('student.dashboard', [
                'requests' => $requests
            ]);
        }
    }
}
