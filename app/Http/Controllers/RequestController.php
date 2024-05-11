<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Mail\RequestSubmitted;
use App\Models\DepartmentLevels;
use App\Models\Documents;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use League\CommonMark\Node\Block\Document;

class RequestController extends Controller
{
    public function index() {
        if (Auth::user()->role === 'student') {
            $documents = Documents::all();
            $departmentlevels = DepartmentLevels::all();
            return view('student.request-a-document', [
                'documents' => $documents,
                'departmentlevels' => $departmentlevels
            ]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function requestDocumentProcess(DocumentRequest $request) {
        if (Requests::create([
            'userid' => Auth::user()->id,
            'documentid' => $request->document,
            'departmentlevelid' => $request->departmentlevel,
            'phonenumber' => $request->phonenumber,
            'schoolyeargraduated' => $request->schoolyeargraduated,
            'remarks' => $request->remarks
        ])) {

            $adminEmail = User::where('role', 'admin')->value('email');
            $user = User::where('id', Auth::user()->id)->value('name');
            $document = Documents::where('id', $request->document)->value('document');
            $departmentlevel = DepartmentLevels::where('id', $request->departmentlevel)->value('departmentlevel');
            $phonenumber = $request->phonenumber;
            $schoolyeargraduated = $request->schoolyeargraduated;
            $remarks = $request->remarks;

            if (Mail::to($adminEmail)->send(new RequestSubmitted($user, $document, $departmentlevel, $phonenumber, $schoolyeargraduated, $remarks))) {
                return back()->with('success', 'Document requested successfully.');
            }
        }
    }

    public function deleteRequest($id) {
        if (Auth::user()->role === 'student') {
            $request = Requests::where('id', $id)->first();
            return view('student.delete-request', [
                'request' => $request
            ]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function deleteRequestProcess($id) {
        if (Requests::where('id', $id)->delete()) {
            return redirect('/dashboard')->with('success', 'Request deleted successfully.');
        }
    }

    public function viewRequest($month) {
        if (Auth::user()->role === 'admin') {
            $departmentlevels = DepartmentLevels::all();
            return view('admin.view-request', [
                'month' => $month,
                'departmentlevels' => $departmentlevels
            ]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function viewDetails($month, $departmentlevelid) {
        if (Auth::user()->role === 'admin') {
            $requests = Requests::where('departmentlevelid', $departmentlevelid)->whereMonth('created_at', $month)->get();
            return view('admin.view-details', [
                'requests' => $requests,
                'month' => $month,
                'departmentlevelid' => $departmentlevelid
            ]);
        } else {
            return redirect('/dashboard');
        }
    }


}
