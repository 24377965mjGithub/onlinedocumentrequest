<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDocument;
use App\Http\Requests\UpdateDocument;
use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{
    public function index() {
        if (Auth::user()->role === 'admin') {
            $documents = Documents::all();
            return view('admin.documents', [
                'documents' => $documents
            ]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function addDocument() {
        if (Auth::user()->role === 'admin') {
            return view('admin.add-document');
        } else {
            return redirect('/dashboard');
        }
    }

    public function editDocument($id) {
        if (Auth::user()->role === 'admin') {
            $document = Documents::where('id', $id)->first();
            return view('admin.edit-document', [
                'document' => $document
            ]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function deleteDocument($id) {
        if (Auth::user()->role === 'admin') {
            $document = Documents::where('id', $id)->first();
            return view('admin.delete-document', [
                'document' => $document
            ]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function addDocumentProcess(AddDocument $request) {
        if (Documents::create(['document' => $request->name])) {
            return back()->with('success', 'Document added successfully.');
        }
    }

    public function editDocumentProcess(UpdateDocument $request, $id) {
        if (Documents::where('id', $id)->update(['document' => $request->name])) {
            return back()->with('success', 'Document updated successfully.');
        }
    }

    public function deleteDocumentProcess($id) {
        if (Documents::where('id', $id)->delete()) {
            return redirect('/documents')->with('success', 'Document deleted successfully.');
        }
    }
}
