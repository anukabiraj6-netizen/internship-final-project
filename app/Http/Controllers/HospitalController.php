<?php

namespace App\Http\Controllers;

class HospitalController extends Controller
{
    public function dashboard()
    {
        return view('hospital.dashboard');
    }
}
