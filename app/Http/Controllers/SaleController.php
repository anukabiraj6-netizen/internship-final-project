<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Medicine;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    // Display Sale List
    public function index(Request $request)
    {
        $search = $request->search;

        $sales = Sale::with(['medicine', 'pharmacy'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('medicine', function ($q) use ($search) {
                    $q->where('medicine_name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view('sale.index', compact('sales'));
    }

    // Show Create Form
    public function create()
    {
        $medicines = Medicine::all();
        $pharmacies = Pharmacy::all();

        return view('sale.create', compact('medicines', 'pharmacies'));
    }

    // Store Sale
    public function store(Request $request)
    {
        $request->validate([
            'pharmacy_id' => 'required',
            'medicine_id' => 'required',
            'customer_name' => 'required',
            'quantity' => 'required|integer|min:1',
            'sale_price' => 'required|numeric',
            'sale_date' => 'required|date',
        ]);

        $medicine = Medicine::findOrFail($request->medicine_id);

        if ($medicine->stock < $request->quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        Sale::create($request->all());

        // Decrease Stock
        $medicine->stock -= $request->quantity;

        if ($medicine->stock <= 0) {
            $medicine->stock = 0;
            $medicine->availability = 'Not Available';
        }

        $medicine->save();

        return redirect()->route('sale.index')
            ->with('success', 'Sale Added Successfully.');
    }

    // Show Edit Form
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);

        $medicines = Medicine::all();
        $pharmacies = Pharmacy::all();

        return view('sale.edit', compact(
            'sale',
            'medicines',
            'pharmacies'
        ));
    }

    // Update Sale
    public function update(Request $request, $id)
    {
        $request->validate([
            'pharmacy_id' => 'required',
            'medicine_id' => 'required',
            'customer_name' => 'required',
            'quantity' => 'required|integer|min:1',
            'sale_price' => 'required|numeric',
            'sale_date' => 'required|date',
        ]);

        $sale = Sale::findOrFail($id);

        $sale->update($request->all());

        return redirect()->route('sale.index')
            ->with('success', 'Sale Updated Successfully.');
    }

    // Delete Sale
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        $sale->delete();

        return redirect()->route('sale.index')
            ->with('success', 'Sale Deleted Successfully.');
    }
}
