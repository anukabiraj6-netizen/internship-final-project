@extends('layouts.app')

@section('title', 'Medicine Search')

@section('content')

<div class="container mt-4">

    <div class="row mb-4">

        <div class="col-md-12">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Search Medicine</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('search.index') }}" method="GET">

                        <div class="row">

                            <div class="col-md-10">

                                <input type="text"
                                       name="search"
                                       class="form-control"
                                       placeholder="Enter Medicine Name..."
                                       value="{{ request('search') }}">

                            </div>

                            <div class="col-md-2">

                                <button type="submit"
                                        class="btn btn-success w-100">
                                    Search
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Search Result</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Medicine Name</th>
                        <th>Category</th>
                        <th>Pharmacy</th>
                        <th>Manufacturer</th>
                        <th>Stock</th>
                        <th>MRP</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($medicines as $medicine)

                        <tr>

                            <td>{{ $medicine->id }}</td>

                            <td>{{ $medicine->medicine_name }}</td>

                            <td>{{ $medicine->category->category_name }}</td>

                            <td>{{ $medicine->pharmacy->pharmacy_name }}</td>

                            <td>{{ $medicine->manufacturer }}</td>

                            <td>{{ $medicine->stock }}</td>

                            <td>₹ {{ number_format($medicine->mrp,2) }}</td>

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

                            <td colspan="8" class="text-center text-danger">

                                No Medicine Found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
