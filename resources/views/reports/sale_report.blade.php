@extends('layouts.app')

@section('title', 'Sale Report')

@section('content')

<div class="container mt-4">

    <div class="row mb-3">

        <div class="col-md-6">
            <h2 class="fw-bold">Sale Report</h2>
            <p class="text-muted">View all sale records.</p>
        </div>

        <div class="col-md-6 text-end">
            <button onclick="window.print()" class="btn btn-success">
                Print Report
            </button>
        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Sale Report</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Medicine</th>
                        <th>Pharmacy</th>
                        <th>Customer</th>
                        <th>Quantity</th>
                        <th>Sale Price</th>
                        <th>Sale Date</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($sales as $sale)

                    <tr>

                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->medicine->medicine_name }}</td>
                        <td>{{ $sale->pharmacy->pharmacy_name }}</td>
                        <td>{{ $sale->customer_name }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>₹ {{ number_format($sale->sale_price,2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($sale->sale_date)->format('d M Y') }}</td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center text-danger">
                            No Sale Records Found.
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
