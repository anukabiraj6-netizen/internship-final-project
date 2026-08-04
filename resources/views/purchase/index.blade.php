@extends('layouts.app')

@section('title', 'Purchase Management')

@section('content')

<div class="container mt-4">

    <div class="row mb-3">

        <div class="col-md-6">
            <h2 class="fw-bold">Purchase Management</h2>
            <p class="text-muted">Manage all medicine purchases.</p>
        </div>

        <div class="col-md-6 text-end">
            <a href="{{ route('purchase.create') }}" class="btn btn-primary">
                + Add Purchase
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

            <form action="{{ route('purchase.index') }}" method="GET">

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

    {{-- Purchase Table --}}
    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Purchase List</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Pharmacy</th>

                        <th>Medicine</th>

                        <th>Supplier</th>

                        <th>Quantity</th>

                        <th>Purchase Price</th>

                        <th>Purchase Date</th>

                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($purchases as $purchase)

                        <tr>

                            <td>{{ $purchase->id }}</td>

                            <td>{{ $purchase->pharmacy->pharmacy_name }}</td>

                            <td>{{ $purchase->medicine->medicine_name }}</td>

                            <td>{{ $purchase->supplier_name }}</td>

                            <td>{{ $purchase->quantity }}</td>

                            <td>₹ {{ number_format($purchase->purchase_price,2) }}</td>

                            <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M Y') }}</td>

                            <td>

                                <a href="{{ route('purchase.edit',$purchase->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('purchase.destroy',$purchase->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this purchase?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="text-center text-danger">

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
