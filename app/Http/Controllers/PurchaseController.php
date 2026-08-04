<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Medicine;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // Display Purchase List
    public function index(Request $request)
    {
        $search = $request->search;

        $purchases = Purchase::with(['medicine', 'pharmacy'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('medicine', function ($q) use ($search) {
                    $q->where('medicine_name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view('purchase.index', compact('purchases'));
    }

    // Show Create Form
    public function create()
    {
        $medicines = Medicine::all();
        $pharmacies = Pharmacy::all();

        return view('purchase.create', compact('medicines', 'pharmacies'));
    }

    // Store Purchase
    public function store(Request $request)
    {
        $request->validate([
            'pharmacy_id' => 'required',
            'medicine_id' => 'required',
            'supplier_name' => 'required',
            'quantity' => 'required|integer|min:1',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        Purchase::create($request->all());

        // Update Medicine Stock
        $medicine = Medicine::find($request->medicine_id);

        $medicine->stock += $request->quantity;
        $medicine->availability = 'Available';
        $medicine->save();

        return redirect()->route('purchase.index')
            ->with('success', 'Purchase Added Successfully.');
    }

    // Show Edit Form
    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);

        $medicines = Medicine::all();
        $pharmacies = Pharmacy::all();

        return view('purchase.edit', compact(
            'purchase',
            'medicines',
            'pharmacies'
        ));
    }

    // Update Purchase
    public function update(Request $request, $id)
    {
        $request->validate([
            'pharmacy_id' => 'required',
            'medicine_id' => 'required',
            'supplier_name' => 'required',
            'quantity' => 'required|integer|min:1',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $purchase = Purchase::findOrFail($id);

        $purchase->update($request->all());

        return redirect()->route('purchase.index')
            ->with('success', 'Purchase Updated Successfully.');
    }

    // Delete Purchase
    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);

        $purchase->delete();

        return redirect()->route('purchase.index')
            ->with('success', 'Purchase Deleted Successfully.');
    }
}
