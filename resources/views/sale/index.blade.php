@extends('layouts.app')

@section('title', 'Sale Management')

@section('content')

<div class="container mt-4">

    <div class="row mb-3">

        <div class="col-md-6">
            <h2 class="fw-bold">Sale Management</h2>
            <p class="text-muted">Manage all medicine sales.</p>
        </div>

        <div class="col-md-6 text-end">
            <a href="{{ route('sale.create') }}" class="btn btn-primary">
                + Add Sale
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

    {{-- Error Message --}}
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    {{-- Search --}}
    <div class="card shadow mb-4">

        <div class="card-body">

            <form action="{{ route('sale.index') }}" method="GET">

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

    {{-- Sale Table --}}
    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Sale List</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Pharmacy</th>

                        <th>Medicine</th>

                        <th>Customer</th>

                        <th>Quantity</th>

                        <th>Sale Price</th>

                        <th>Sale Date</th>

                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($sales as $sale)

                        <tr>

                            <td>{{ $sale->id }}</td>

                            <td>{{ $sale->pharmacy->pharmacy_name }}</td>

                            <td>{{ $sale->medicine->medicine_name }}</td>

                            <td>{{ $sale->customer_name }}</td>

                            <td>{{ $sale->quantity }}</td>

                            <td>₹ {{ number_format($sale->sale_price,2) }}</td>

                            <td>{{ \Carbon\Carbon::parse($sale->sale_date)->format('d M Y') }}</td>

                            <td>

                                <a href="{{ route('sale.edit',$sale->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('sale.destroy',$sale->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this sale?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8" class="text-center text-danger">

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
