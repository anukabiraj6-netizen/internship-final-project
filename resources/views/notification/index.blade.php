@extends('layouts.app')

@section('title', 'Notifications')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4 fw-bold">Medicine Notifications</h2>

    <!-- Low Stock Medicines -->
    <div class="card shadow mb-4">

        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Low Stock Medicines</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-light">

                    <tr>
                        <th>ID</th>
                        <th>Medicine</th>
                        <th>Stock</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($lowStockMedicines as $medicine)

                    <tr>

                        <td>{{ $medicine->id }}</td>
                        <td>{{ $medicine->medicine_name }}</td>
                        <td>
                            <span class="badge bg-warning text-dark">
                                {{ $medicine->stock }}
                            </span>
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3" class="text-center text-success">
                            No Low Stock Medicines
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Out Of Stock -->

    <div class="card shadow mb-4">

        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Out Of Stock Medicines</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-light">

                    <tr>

                        <th>ID</th>
                        <th>Medicine</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($outOfStockMedicines as $medicine)

                    <tr>

                        <td>{{ $medicine->id }}</td>

                        <td>{{ $medicine->medicine_name }}</td>

                        <td>

                            <span class="badge bg-danger">
                                Out Of Stock
                            </span>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3" class="text-center text-success">
                            No Out Of Stock Medicines
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Expiring Medicines -->

    <div class="card shadow">

        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Medicines Expiring Soon</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-light">

                    <tr>

                        <th>ID</th>
                        <th>Medicine</th>
                        <th>Expiry Date</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($expiryMedicines as $medicine)

                    <tr>

                        <td>{{ $medicine->id }}</td>

                        <td>{{ $medicine->medicine_name }}</td>

                        <td>{{ \Carbon\Carbon::parse($medicine->expiry_date)->format('d M Y') }}</td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3" class="text-center text-success">
                            No Medicines Expiring Soon
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
