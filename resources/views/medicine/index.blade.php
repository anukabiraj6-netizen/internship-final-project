@extends('layouts.app')

@section('title', 'Medicine Management')

@section('content')

<div class="container mt-4">

    <div class="row mb-3">

        <div class="col-md-6">
            <h2 class="fw-bold">Medicine Management</h2>
            <p class="text-muted">Manage all medicines.</p>
        </div>

        <div class="col-md-6 text-end">
            <a href="{{ route('medicine.create') }}" class="btn btn-primary">
                + Add Medicine
            </a>
        </div>

    </div>

    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    {{-- Search --}}
    <div class="card shadow mb-4">

        <div class="card-body">

            <form action="{{ route('medicine.index') }}" method="GET">

                <div class="row">

                    <div class="col-md-10">

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Search Medicine..."
                               value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-success w-100">
                            Search
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Medicine Table --}}
    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">Medicine List</h4>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Medicine</th>

                    <th>Category</th>

                    <th>Pharmacy</th>

                    <th>Manufacturer</th>

                    <th>Batch No</th>

                    <th>Expiry</th>

                    <th>MRP</th>

                    <th>Stock</th>

                    <th>Status</th>

                    <th width="180">Action</th>

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

                        <td>{{ $medicine->batch_no }}</td>

                        <td>{{ $medicine->expiry_date }}</td>

                        <td>₹ {{ number_format($medicine->mrp,2) }}</td>

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

                        <td>

                            <a href="{{ route('medicine.edit',$medicine->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('medicine.destroy',$medicine->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this medicine?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="11"
                            class="text-center text-danger">

                            No Medicines Found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
