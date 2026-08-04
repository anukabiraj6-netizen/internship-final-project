@extends('layouts.app')

@section('title', 'Edit Purchase')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">
            <h3>Edit Purchase</h3>
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

            <form action="{{ route('purchase.update', $purchase->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Pharmacy</label>

                        <select name="pharmacy_id" class="form-select" required>

                            @foreach($pharmacies as $pharmacy)

                                <option value="{{ $pharmacy->id }}"
                                    {{ $purchase->pharmacy_id == $pharmacy->id ? 'selected' : '' }}>

                                    {{ $pharmacy->pharmacy_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Medicine</label>

                        <select name="medicine_id" class="form-select" required>

                            @foreach($medicines as $medicine)

                                <option value="{{ $medicine->id }}"
                                    {{ $purchase->medicine_id == $medicine->id ? 'selected' : '' }}>

                                    {{ $medicine->medicine_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Supplier Name</label>

                        <input type="text"
                               name="supplier_name"
                               class="form-control"
                               value="{{ old('supplier_name', $purchase->supplier_name) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Quantity</label>

                        <input type="number"
                               name="quantity"
                               class="form-control"
                               value="{{ old('quantity', $purchase->quantity) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Purchase Price</label>

                        <input type="number"
                               step="0.01"
                               name="purchase_price"
                               class="form-control"
                               value="{{ old('purchase_price', $purchase->purchase_price) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Purchase Date</label>

                        <input type="date"
                               name="purchase_date"
                               class="form-control"
                               value="{{ old('purchase_date', $purchase->purchase_date) }}"
                               required>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Update Purchase
                </button>

                <a href="{{ route('purchase.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
