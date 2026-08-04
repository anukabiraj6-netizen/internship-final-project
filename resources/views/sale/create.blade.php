@extends('layouts.app')

@section('title', 'Add Sale')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>Add Sale</h3>
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

            <form action="{{ route('sale.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pharmacy</label>

                        <select name="pharmacy_id" class="form-select" required>
                            <option value="">Select Pharmacy</option>

                            @foreach($pharmacies as $pharmacy)
                                <option value="{{ $pharmacy->id }}">
                                    {{ $pharmacy->pharmacy_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Medicine</label>

                        <select name="medicine_id" class="form-select" required>
                            <option value="">Select Medicine</option>

                            @foreach($medicines as $medicine)
                                <option value="{{ $medicine->id }}">
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
                               value="{{ old('customer_name') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Quantity</label>

                        <input type="number"
                               name="quantity"
                               class="form-control"
                               value="{{ old('quantity') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sale Price</label>

                        <input type="number"
                               step="0.01"
                               name="sale_price"
                               class="form-control"
                               value="{{ old('sale_price') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sale Date</label>

                        <input type="date"
                               name="sale_date"
                               class="form-control"
                               value="{{ old('sale_date') }}"
                               required>
                    </div>

                </div>

                <button type="submit" class="btn btn-success">
                    Save Sale
                </button>

                <a href="{{ route('sale.index') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
