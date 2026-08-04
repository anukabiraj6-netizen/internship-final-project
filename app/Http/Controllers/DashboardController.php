<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalMedicines = Medicine::count();
        $totalPharmacies = Pharmacy::count();
        $totalPurchases = Purchase::count();
        $totalSales = Sale::count();

        $recentUsers = User::latest()->take(5)->get();
        $recentMedicines = Medicine::latest()->take(5)->get();
        $recentPurchases = Purchase::latest()->take(5)->get();
        $recentSales = Sale::latest()->take(5)->get();


        return view('dashboard', compact(
        'totalUsers',
        'totalCategories',
        'totalMedicines',
        'totalPharmacies',
        'totalPurchases',
        'totalSales',
        'recentUsers',
        'recentMedicines',
        'recentPurchases',
        'recentSales'
    ));
    }
}
