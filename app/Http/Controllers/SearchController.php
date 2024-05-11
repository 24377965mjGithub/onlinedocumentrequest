<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchRequest(SearchRequest $request) {
        $userIds = [];
        $search = User::where('name', 'like', '%'.$request->search.'%')->get();
        foreach ($search as $key => $value) {
            array_push($userIds, $value['id']);
        }

        $userRequests = [];
        foreach ($userIds as $key => $value) {
            array_push($userRequests, Requests::where('userid', $value)->get());
        }

        if (isset($userRequests[0])) {
            return view('admin.search', [
                'searchResultFor' => $request->search,
                'requests' => $userRequests[0]
            ]);
        } else {
            return back()->with('errorsearch', 'No request found associated with that name.');
        }



        // return response()->json($userRequests);
    }
}
