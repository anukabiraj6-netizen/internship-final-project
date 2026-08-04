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

        <h1 class="text-primary fw-bold">
            Contact Us
        </h1>

        <p class="lead">
            We'd love to hear from you.
        </p>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="card shadow p-4">

                <h3 class="text-primary mb-4">
                    Send Message
                </h3>

                <form>

                    <div class="mb-3">

                        <label>Name</label>

                        <input type="text"
                               class="form-control"
                               placeholder="Enter your name">

                    </div>

                    <div class="mb-3">

                        <label>Email</label>

                        <input type="email"
                               class="form-control"
                               placeholder="Enter your email">

                    </div>

                    <div class="mb-3">

                        <label>Message</label>

                        <textarea class="form-control"
                                  rows="5"
                                  placeholder="Write your message"></textarea>

                    </div>

                    <button class="btn btn-primary">
                        Send Message
                    </button>

                </form>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card shadow p-4">

                <h3 class="text-primary">
                    Contact Information
                </h3>

                <hr>

                <p>
                    <strong>Email:</strong><br>
                    medilink@gmail.com
                </p>

                <p>
                    <strong>Phone:</strong><br>
                    +91 9876543210
                </p>

                <p>
                    <strong>Address:</strong><br>
                    Ranchi, Jharkhand, India
                </p>

                <p>
                    <strong>Working Hours:</strong><br>
                    Monday - Saturday<br>
                    9:00 AM - 8:00 PM
                </p>

            </div>

        </div>

    </div>

</div>

@endsection
</body>
</html>
