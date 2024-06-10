<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Service::where('name', 'LIKE', '%' . $query . '%')->get();
        return response()->json($results);
    }
}
