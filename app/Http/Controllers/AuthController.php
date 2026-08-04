<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;
use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Hospital;
class AuthController extends Controller
{
    public function home()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }
    public function store(Request $request)
    {
    $request->validate([
        'role_id' => 'required',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|max:15',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = User::create([
        'role_id' => $request->role_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
    ]);

    // Patient
    if ($request->role_id == 2) {

        Patient::create([
            'user_id' => $user->id,
            'gender' => '',
            'age' => 0,
            'address' => '',
            'city' => '',
            'state' => '',
        ]);

    }

    // Pharmacy
    elseif ($request->role_id == 3) {

        Pharmacy::create([
            'user_id' => $user->id,
            'pharmacy_name' => '',
            'owner_name' => '',
            'license_number' => '',
            'license_file' => '',
            'address' => '',
            'city' => '',
            'state' => '',
            'phone' => '',
            'opening_time' => '09:00:00',
            'closing_time' => '21:00:00',
        ]);

    }

    // Hospital
    elseif ($request->role_id == 4) {

        Hospital::create([
            'user_id' => $user->id,
            'hospital_name' => '',
            'address' => '',
            'city' => '',
            'state' => '',
            'phone' => '',
        ]);

    }

    return redirect()->route('login')
                     ->with('success', 'Registration Successful. Please Login.');
    }
    public function authenticate(Request $request)
    {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        $role = Auth::user()->role_id;

        if ($role == 1) {
            return redirect()->route('admin.dashboard');
        }

        elseif ($role == 2) {
            return redirect()->route('patient.dashboard');
        }

        elseif ($role == 3) {
            return redirect()->route('pharmacy.dashboard');
        }

        elseif ($role == 4) {
            return redirect()->route('hospital.dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'Invalid Email or Password.',
    ]);
    }
    public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('home');
    }
}
