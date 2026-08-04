<?php

namespace App\Http\Controllers;

class PharmacyController extends Controller
{
    public function dashboard()
    {
        return view('pharmacy.dashboard');
    }
}
