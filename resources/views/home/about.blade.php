<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">About MediLink</h1>
        <p class="lead">
            Smart Healthcare & Pharmacy Network
        </p>
    </div>

    <div class="card shadow p-4 mb-4">

        <h3 class="text-primary">Project Introduction</h3>

        <p>
            MediLink is a Laravel-based web application that connects Patients,
            Pharmacies, and Hospitals on a single platform.
            It helps users quickly check whether a required medicine is available
            in nearby pharmacies.
        </p>

    </div>

    <div class="card shadow p-4 mb-4">

        <h3 class="text-primary">Problem Statement</h3>

        <p>
            Patients often visit multiple pharmacies to find medicines.
            This wastes time, increases travel expenses, and delays treatment.
            Hospitals also struggle to locate emergency medicines quickly.
        </p>

    </div>

    <div class="card shadow p-4 mb-4">

        <h3 class="text-primary">Our Solution</h3>

        <p>
            MediLink allows pharmacies to update medicine availability.
            Patients and hospitals can search medicines and instantly see
            which pharmacy has them available.
        </p>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="card shadow p-4">

                <h3 class="text-success">Mission</h3>

                <p>
                    To simplify medicine searching and connect healthcare
                    providers through one digital platform.
                </p>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card shadow p-4">

                <h3 class="text-danger">Vision</h3>

                <p>
                    To become a trusted healthcare platform that improves
                    medicine accessibility and patient care.
                </p>

            </div>

        </div>

    </div>

    <div class="card shadow p-4 mt-4">

        <h3 class="text-primary">Project Team</h3>

        <ul>
            <li>Anu Kabiraj</li>
            <li>P Simon</li>
            <li>Nandiya Tirkey</li>
            <li>S Rahul</li>
            <li>K Madhunisha</li>
        </ul>

    </div>

</div>

@endsection
</body>
</html>
