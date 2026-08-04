@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container-fluid mt-4">

    <h2 class="mb-4 fw-bold">Admin Dashboard</h2>

    <!-- Dashboard Cards -->
    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h5>Total Users</h5>
                    <h2>{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h5>Total Categories</h5>
                    <h2>{{ $totalCategories }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    <h5>Total Medicines</h5>
                    <h2>{{ $totalMedicines }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-warning text-dark shadow">
                <div class="card-body">
                    <h5>Total Pharmacies</h5>
                    <h2>{{ $totalPharmacies }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                    <h5>Total Purchases</h5>
                    <h2>{{ $totalPurchases }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h5>Total Sales</h5>
                    <h2>{{ $totalSales }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Quick Actions -->
    <div class="card shadow mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Quick Actions</h5>
        </div>

        <div class="card-body">

            <a href="{{ route('category.create') }}" class="btn btn-primary m-1">Add Category</a>

            <a href="{{ route('pharmacy.create') }}" class="btn btn-success m-1">Add Pharmacy</a>

            <a href="{{ route('medicine.create') }}" class="btn btn-info m-1">Add Medicine</a>

            <a href="{{ route('purchase.create') }}" class="btn btn-warning m-1">Add Purchase</a>

            <a href="{{ route('sale.create') }}" class="btn btn-danger m-1">Add Sale</a>

        </div>
    </div>

    <div class="row">

        <!-- Recent Users -->
        <div class="col-md-6">

            <div class="card shadow mb-4">

                <div class="card-header bg-primary text-white">
                    Recent Users
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($recentUsers as $user)

                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- Recent Medicines -->

        <div class="col-md-6">

            <div class="card shadow mb-4">

                <div class="card-header bg-success text-white">
                    Recent Medicines
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Stock</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($recentMedicines as $medicine)

                            <tr>
                                <td>{{ $medicine->medicine_name }}</td>
                                <td>{{ $medicine->stock }}</td>
                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
        <div class="row">

            <!-- Recent Purchases -->

            <div class="col-md-6">

                <div class="card shadow mb-4">

                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Recent Purchases</h5>
                    </div>

                    <div class="card-body table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="table-light">

                                <tr>
                                    <th>Medicine</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>

                            </thead>

                            <tbody>

                            @forelse($recentPurchases as $purchase)

                                <tr>

                                    <td>{{ $purchase->medicine->medicine_name ?? 'N/A' }}</td>

                                    <td>{{ $purchase->quantity }}</td>

                                    <td>{{ $purchase->purchase_date }}</td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="text-center">
                                        No Purchase Found
                                    </td>
                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <!-- Recent Sales -->

            <div class="col-md-6">

                <div class="card shadow mb-4">

                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Recent Sales</h5>
                    </div>

                    <div class="card-body table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="table-light">

                                <tr>
                                    <th>Medicine</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>

                            </thead>

                            <tbody>

                            @forelse($recentSales as $sale)

                                <tr>

                                    <td>{{ $sale->medicine->medicine_name ?? 'N/A' }}</td>

                                    <td>{{ $sale->quantity }}</td>

                                    <td>{{ $sale->sale_date }}</td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="text-center">
                                        No Sales Found
                                    </td>
                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6">

                <div class="card shadow mb-4">

                    <div class="card-header bg-primary text-white">
                        Monthly Purchases
                    </div>

                    <div class="card-body">

                        <canvas id="purchaseChart"></canvas>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card shadow mb-4">

                    <div class="card-header bg-success text-white">
                        Monthly Sales
                    </div>

                    <div class="card-body">

                        <canvas id="saleChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

    </div>
@section('scripts')

<script>

const purchaseChart = new Chart(document.getElementById('purchaseChart'),{

type:'bar',

data:{

labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],

datasets:[{

label:'Purchases',

data:[12,19,8,15,20,25,18,22,14,10,17,24]

}]

}

});

const saleChart = new Chart(document.getElementById('saleChart'),{

type:'line',

data:{

labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],

datasets:[{

label:'Sales',

data:[10,15,12,18,22,19,25,28,24,20,30,35]

}]

}

});

</script>

@endsection
@endsection
