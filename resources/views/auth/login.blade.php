@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">

                    <h3>Login</h3>

                </div>

                <div class="card-body">

                    <form action="{{ route('login.authenticate') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter Email"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Enter Password"
                                   required>

                        </div>

                        <div class="d-grid">

                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                        </div>

                    </form>

                    <hr>

                    <div class="text-center">

                        <p>
                            Don't have an account?
                            <a href="{{ route('register') }}">
                                Register Here
                            </a>
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
