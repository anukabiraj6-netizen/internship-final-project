<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Medicine;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Purchase Report
    public function purchaseReport()
    {
        $purchases = Purchase::with(['medicine','pharmacy'])
                        ->latest()
                        ->get();

        return view('reports.purchase_report', compact('purchases'));
    }

    // Sale Report
    public function saleReport()
    {
        $sales = Sale::with(['medicine','pharmacy'])
                    ->latest()
                    ->get();

        return view('reports.sale_report', compact('sales'));
    }

    // Stock Report
    public function stockReport()
    {
        $medicines = Medicine::with('category','pharmacy')
                        ->latest()
                        ->get();

        return view('reports.stock_report', compact('medicines'));
    }
}
