<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('query');

        // Search in the database and return the result
        $results = Product::search($search)->get();

        // Return the search view with the results
        return view('search', ['results' => $results]);
    }
}
