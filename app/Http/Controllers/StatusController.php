<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStatus;
use App\Http\Requests\UpdateStatus;
use App\Mail\StatusAdded;
use App\Models\Documents;
use App\Models\Requests;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StatusController extends Controller
{
    public function addStatus($id, $month, $departmentlevelid) {
        if (Auth::user()->role === 'admin') {
            $request = Requests::where('id', $id)->first();
            $statuses = Status::where('requestid', $id)->orderBy('id', 'desc')->get();
            return view('admin.add-status', [
                'request' => $request,
                'statuses' => $statuses,
                'month' => $month,
                'departmentlevelid' => $departmentlevelid
            ]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function addStatusProcess(AddStatus $request, $requestid) {
        if (Status::create(['requestid' => $requestid, 'status' => $request->status])) {
            $requestUserId = Requests::where('id', $requestid)->value('userid');
            $name = User::where('id', $requestUserId)->value('name');
            $email = User::where('id', $requestUserId)->value('email');
            $requestDocumentId = Requests::where('id', $requestid)->value('documentid');
            $document = Documents::where('id', $requestDocumentId)->value('document');
            $status = $request->status;

            if (Mail::to($email)->send(new StatusAdded($name, $document, $status))) {
                return back()->with('success', 'Status added successfully.');
            }

        }
    }

    public function updateStatus($id) {
        if (Auth::user()->role === 'admin') {
            $status = Status::where('id', $id)->first();
            return view('admin.edit-status', [
                'status' => $status,
            ]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function updateStatusProcess(UpdateStatus $request, $id) {
        if (Status::where('id', $id)->update(['status' => $request->status])) {
            return back()->with('success', 'Status updated successfully.');
        }
    }

    public function deleteStatus($id) {
        if (Auth::user()->role === 'admin') {
            $status = Status::where('id', $id)->first();
            return view('admin.delete-status', [
                'status' => $status,
            ]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function deleteStatusProcess($id) {
        if (Status::where('id', $id)->delete()) {
            return back()->with('statusdeleted', 'Status deleted successfully.');
        }
    }
}
