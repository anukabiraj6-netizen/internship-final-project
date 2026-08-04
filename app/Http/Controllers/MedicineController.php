<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Category;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Display all medicines
    public function index(Request $request)
    {
        $search = $request->search;

        $medicines = Medicine::with(['category', 'pharmacy'])
            ->when($search, function ($query) use ($search) {
                $query->where('medicine_name', 'like', "%{$search}%")
                      ->orWhere('manufacturer', 'like', "%{$search}%")
                      ->orWhere('batch_no', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('medicine.index', compact('medicines'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();
        $pharmacies = Pharmacy::all();

        return view('medicine.create', compact('categories', 'pharmacies'));
    }

    // Store medicine
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'pharmacy_id' => 'required',
            'medicine_name' => 'required',
            'manufacturer' => 'required',
            'batch_no' => 'required',
            'expiry_date' => 'required|date',
            'mrp' => 'required|numeric',
            'stock' => 'required|integer',
            'availability' => 'required',
            'description' => 'nullable',
        ]);

        Medicine::create($request->all());

        return redirect()->route('medicine.index')
            ->with('success', 'Medicine Added Successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);

        $categories = Category::all();
        $pharmacies = Pharmacy::all();

        return view('medicine.edit', compact(
            'medicine',
            'categories',
            'pharmacies'
        ));
    }

    // Update medicine
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'pharmacy_id' => 'required',
            'medicine_name' => 'required',
            'manufacturer' => 'required',
            'batch_no' => 'required',
            'expiry_date' => 'required|date',
            'mrp' => 'required|numeric',
            'stock' => 'required|integer',
            'availability' => 'required',
            'description' => 'nullable',
        ]);

        $medicine = Medicine::findOrFail($id);

        $medicine->update($request->all());

        return redirect()->route('medicine.index')
            ->with('success', 'Medicine Updated Successfully.');
    }

    // Delete medicine
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);

        $medicine->delete();

        return redirect()->route('medicine.index')
            ->with('success', 'Medicine Deleted Successfully.');
    }
}
