@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white text-center">

                        <h3>Create Account</h3>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('register.store') }}" method="POST">

                            @csrf

                            <div class="mb-3">

                                <label class="form-label">Full Name</label>

                                <input type="text" name="name" class="form-control" placeholder="Enter Full Name"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Email</label>

                                <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Phone Number</label>

                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Password</label>

                                <input type="password" name="password" class="form-control" placeholder="Enter Password"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Confirm Password</label>

                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm Password" required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Select Role</label>

                                <select name="role" id="role" class="form-control" onchange="showFields()" required>

                                    <option value="">Select Role</option>

                                    <option value="Patient">Patient</option>

                                    <option value="Pharmacy">Pharmacy</option>

                                    <option value="Hospital">Hospital</option>

                                </select>

                            </div>

                            <div class="mb-3">
                                <label>Pharmacy</label>
                                <select name="pharmacy_id" class="form-control">
                                    <option value="">Select Pharmacy</option>

                                    @foreach ($pharmacies as $pharmacy)
                                        <option value="{{ $pharmacy->id }}">
                                            {{ $pharmacy->pharmacy_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Patient Fields -->

                            <div id="patientFields" style="display:none;">

                                <hr>

                                <h4 class="text-primary">Patient Details</h4>

                                <div class="mb-3">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Age</label>
                                    <input type="number" name="age" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>State</label>
                                    <input type="text" name="state" class="form-control">
                                </div>

                            </div>

                            <!-- Pharmacy Fields -->

                            <div id="pharmacyFields" style="display:none;">

                                <hr>

                                <h4 class="text-success">Pharmacy Details</h4>

                                <div class="mb-3">
                                    <label>Pharmacy Name</label>
                                    <input type="text" name="pharmacy_name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Owner Name</label>
                                    <input type="text" name="owner_name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>License Number</label>
                                    <input type="text" name="license_number" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Address</label>
                                    <textarea name="pharmacy_address" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>City</label>
                                    <input type="text" name="pharmacy_city" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>State</label>
                                    <input type="text" name="pharmacy_state" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Opening Time</label>
                                    <input type="time" name="opening_time" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Closing Time</label>
                                    <input type="time" name="closing_time" class="form-control">
                                </div>

                            </div>

                            <!-- Hospital Fields -->

                            <div id="hospitalFields" style="display:none;">

                                <hr>

                                <h4 class="text-danger">Hospital Details</h4>

                                <div class="mb-3">
                                    <label>Hospital Name</label>
                                    <input type="text" name="hospital_name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Address</label>
                                    <textarea name="hospital_address" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>City</label>
                                    <input type="text" name="hospital_city" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>State</label>
                                    <input type="text" name="hospital_state" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="hospital_phone" class="form-control">
                                </div>

                            </div>

                            <div class="text-center">

                                <button type="submit" class="btn btn-primary btn-lg">
                                    Register
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        function showFields() {

            let role = document.getElementById('role').value;

            document.getElementById('patientFields').style.display = 'none';
            document.getElementById('pharmacyFields').style.display = 'none';
            document.getElementById('hospitalFields').style.display = 'none';

            if (role == "Patient") {
                document.getElementById('patientFields').style.display = 'block';
            }

            if (role == "Pharmacy") {
                document.getElementById('pharmacyFields').style.display = 'block';
            }

            if (role == "Hospital") {
                document.getElementById('hospitalFields').style.display = 'block';
            }

        }
    </script>
@endsection
