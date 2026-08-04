@extends('layouts.app')

@section('title', 'Stock Report')

@section('content')

<div class="container mt-4">

    <div class="row mb-3">

        <div class="col-md-6">
            <h2 class="fw-bold">Stock Report</h2>
            <p class="text-muted">Current medicine stock details.</p>
        </div>

        <div class="col-md-6 text-end">
            <button onclick="window.print()" class="btn btn-success">
                Print Report
            </button>
        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Stock Report</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Medicine</th>
                        <th>Category</th>
                        <th>Pharmacy</th>
                        <th>Stock</th>
                        <th>Availability</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($medicines as $medicine)

                    <tr>

                        <td>{{ $medicine->id }}</td>

                        <td>{{ $medicine->medicine_name }}</td>

                        <td>{{ $medicine->category->category_name }}</td>

                        <td>{{ $medicine->pharmacy->pharmacy_name }}</td>

                        <td>{{ $medicine->stock }}</td>

                        <td>

                            @if($medicine->availability == 'Available')
                                <span class="badge bg-success">
                                    Available
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    Not Available
                                </span>
                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center text-danger">
                            No Stock Records Found.
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
