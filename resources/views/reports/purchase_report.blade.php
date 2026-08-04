@extends('layouts.app')

@section('title', 'Purchase Report')

@section('content')

<div class="container mt-4">

    <div class="row mb-3">

        <div class="col-md-6">
            <h2 class="fw-bold">Purchase Report</h2>
            <p class="text-muted">View all purchase records.</p>
        </div>

        <div class="col-md-6 text-end">
            <button onclick="window.print()" class="btn btn-success">
                Print Report
            </button>
        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Purchase Report</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Medicine</th>
                        <th>Pharmacy</th>
                        <th>Supplier</th>
                        <th>Quantity</th>
                        <th>Purchase Price</th>
                        <th>Purchase Date</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($purchases as $purchase)

                    <tr>

                        <td>{{ $purchase->id }}</td>

                        <td>{{ $purchase->medicine->medicine_name }}</td>

                        <td>{{ $purchase->pharmacy->pharmacy_name }}</td>

                        <td>{{ $purchase->supplier_name }}</td>

                        <td>{{ $purchase->quantity }}</td>

                        <td>₹ {{ number_format($purchase->purchase_price,2) }}</td>

                        <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M Y') }}</td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center text-danger">
                            No Purchase Records Found.
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
