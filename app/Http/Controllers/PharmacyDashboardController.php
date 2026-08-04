<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class PharmacyDashboardController extends Controller
{
    public function index()
    {
        // Logged-in Pharmacy User ID
        $pharmacyId = Auth::user()->pharmacy_id;

        // Dashboard Counts
        $totalMedicines = Medicine::where('pharmacy_id', $pharmacyId)->count();

        $totalPurchases = Purchase::where('pharmacy_id', $pharmacyId)->count();

        $totalSales = Sale::where('pharmacy_id', $pharmacyId)->count();

        $lowStock = Medicine::where('pharmacy_id', $pharmacyId)
                    ->where('stock', '<=', 10)
                    ->count();

        $outOfStock = Medicine::where('pharmacy_id', $pharmacyId)
                    ->where('stock', 0)
                    ->count();

        $expiringMedicines = Medicine::where('pharmacy_id', $pharmacyId)
                    ->whereDate('expiry_date', '<=', now()->addDays(30))
                    ->count();

        // Recent Records
        $recentPurchases = Purchase::with('medicine')
                            ->where('pharmacy_id', $pharmacyId)
                            ->latest()
                            ->take(5)
                            ->get();

        $recentSales = Sale::with('medicine')
                        ->where('pharmacy_id', $pharmacyId)
                        ->latest()
                        ->take(5)
                        ->get();

        return view('pharmacy.dashboard', compact(
            'totalMedicines',
            'totalPurchases',
            'totalSales',
            'lowStock',
            'outOfStock',
            'expiringMedicines',
            'recentPurchases',
            'recentSales'
        ));
    }
}
