<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $medicines = Medicine::with(['category', 'pharmacy'])
            ->when($search, function ($query) use ($search) {
                $query->where('medicine_name', 'like', '%' . $search . '%');
            })
            ->where('availability', 'Available')
            ->get();

        return view('search.index', compact('medicines', 'search'));
    }
}
