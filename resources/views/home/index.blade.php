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

<div class="text-center mt-5">

    <h1 class="fw-bold">
        Welcome to MediLink
    </h1>

    <p class="lead">
        Find Medicine Availability in Nearby Pharmacies
    </p>

    <a href="/login" class="btn btn-primary">
        Login
    </a>

    <a href="/register" class="btn btn-success">
        Register
    </a>

</div>

@endsection
</body>
</html>
