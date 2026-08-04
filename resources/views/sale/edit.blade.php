@extends('layouts.app')

@section('title', 'Edit Sale')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">
            <h3>Edit Sale</h3>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('sale.update',$sale->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Pharmacy</label>

                        <select name="pharmacy_id" class="form-select" required>

                            @foreach($pharmacies as $pharmacy)

                                <option value="{{ $pharmacy->id }}"
                                    {{ $sale->pharmacy_id == $pharmacy->id ? 'selected' : '' }}>

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
                                    {{ $sale->medicine_id == $medicine->id ? 'selected' : '' }}>

                                    {{ $medicine->medicine_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Customer Name</label>

                        <input type="text"
                               name="customer_name"
                               class="form-control"
                               value="{{ old('customer_name', $sale->customer_name) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Quantity</label>

                        <input type="number"
                               name="quantity"
                               class="form-control"
                               value="{{ old('quantity', $sale->quantity) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Sale Price</label>

                        <input type="number"
                               step="0.01"
                               name="sale_price"
                               class="form-control"
                               value="{{ old('sale_price', $sale->sale_price) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Sale Date</label>

                        <input type="date"
                               name="sale_date"
                               class="form-control"
                               value="{{ old('sale_date', $sale->sale_date) }}"
                               required>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Update Sale
                </button>

                <a href="{{ route('sale.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
