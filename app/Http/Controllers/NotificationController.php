<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function index()
    {
        // Low Stock (less than or equal to 10)
        $lowStockMedicines = Medicine::where('stock', '<=', 10)
                                     ->where('stock', '>', 0)
                                     ->get();

        // Out of Stock
        $outOfStockMedicines = Medicine::where('stock', 0)->get();

        // Expiring within 30 days
        $expiryMedicines = Medicine::whereDate(
                'expiry_date',
                '<=',
                Carbon::now()->addDays(30)
            )
            ->get();

        return view('notification.index', compact(
            'lowStockMedicines',
            'outOfStockMedicines',
            'expiryMedicines'
        ));
    }
}
