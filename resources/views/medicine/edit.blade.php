@extends('layouts.app')

@section('title', 'Edit Medicine')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">
            <h3>Edit Medicine</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('medicine.update', $medicine->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Medicine Name</label>
                        <input type="text"
                               name="medicine_name"
                               class="form-control"
                               value="{{ old('medicine_name', $medicine->medicine_name) }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category</label>

                        <select name="category_id" class="form-select" required>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ $medicine->category_id == $category->id ? 'selected' : '' }}>

                                    {{ $category->category_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pharmacy</label>

                        <select name="pharmacy_id" class="form-select" required>

                            @foreach($pharmacies as $pharmacy)

                                <option value="{{ $pharmacy->id }}"
                                    {{ $medicine->pharmacy_id == $pharmacy->id ? 'selected' : '' }}>

                                    {{ $pharmacy->pharmacy_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Manufacturer</label>

                        <input type="text"
                               name="manufacturer"
                               class="form-control"
                               value="{{ old('manufacturer', $medicine->manufacturer) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Batch Number</label>

                        <input type="text"
                               name="batch_no"
                               class="form-control"
                               value="{{ old('batch_no', $medicine->batch_no) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Expiry Date</label>

                        <input type="date"
                               name="expiry_date"
                               class="form-control"
                               value="{{ old('expiry_date', $medicine->expiry_date) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">MRP</label>

                        <input type="number"
                               step="0.01"
                               name="mrp"
                               class="form-control"
                               value="{{ old('mrp', $medicine->mrp) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stock</label>

                        <input type="number"
                               name="stock"
                               class="form-control"
                               value="{{ old('stock', $medicine->stock) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Availability</label>

                        <select name="availability" class="form-select" required>

                            <option value="Available"
                                {{ $medicine->availability == 'Available' ? 'selected' : '' }}>
                                Available
                            </option>

                            <option value="Not Available"
                                {{ $medicine->availability == 'Not Available' ? 'selected' : '' }}>
                                Not Available
                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>

                        <textarea name="description"
                                  rows="4"
                                  class="form-control">{{ old('description', $medicine->description) }}</textarea>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Update Medicine
                </button>

                <a href="{{ route('medicine.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
