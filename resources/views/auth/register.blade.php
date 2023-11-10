@extends('layouts.users')
@section('css')
    <style>
        .card {
            width: 80%;
            max-width: 450px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 10px;
            height: 100%;
        }

        .card-image {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 20px;
            text-align: center;
        }

        @media screen and (max-width: 768px) {
            .card {
                max-width: 100%;
            }
        }

        .container {
            position: relative;
            max-width: 100%;
        }

        .text-overlay {
            position: absolute;
            top: 10%;
            left: 75%;
            transform: translate(-50%, -50%);
            text-align: left;
            color: rgb(46, 10, 173);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
        }

        .responsive-image {
            width: 50%;
            height: auto;
            margin-top: 170px
        }

        .responsive-image-shadow {
            width: 50%;
            height: auto;
            margin-top: 60px
        }

        @media screen and (max-width: 768px) {
            .text-overlay {
                width: 100%;
                left: 55%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="row py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                @include('component.session')
            </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-center text-center">
            <div class="container">
                <div class="text-overlay">
                    <h2 class="text-primary">Let's get your goods insured</h2>
                    <p style="font-size: 22px">Cargo Insurance Solution</p>
                </div>
                <img src="{{ asset('images/Home Page.png') }}" alt="Gambar Responsif" class="responsive-image">
                <img src="{{ asset('images/Ellipse.png') }}" alt="Gambar Responsif" class="responsive-image-shadow">
            </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-center">
            <div class="card border-primary mb-3">
                <div class="card-header bg-white">
                    <h5 class="text-primary mt-2">Register</h5>
                    @include('component.session')
                </div>
                <div class="card-body text-primary">
                    <form action="{{ route('auth.postregister') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label style="color: rgb(126, 124, 124)">Name Type</label>
                            <select class="form-select" name="nametype" id="nameType" style="background-color: #ffffff"
                                required>
                                <option selected>-Selected-</option>
                                <option value="PT">PT</option>
                                <option value="Individu">Individu</option>
                            </select>
                        </div>
                        <input type="hidden" value="0" id="is_verify" name="is_verify">
                        <div class="mb-3">
                            <label style="color: rgb(126, 124, 124)">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label style="color: rgb(126, 124, 124)">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label style="color: rgb(126, 124, 124)">Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" id="phone_number"
                                value="{{ old('phone_number') }}" required>
                        </div>
                        <div class="mb-3">
                            <label style="color: rgb(126, 124, 124)">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label style="color: rgb(126, 124, 124)">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
                                required>
                        </div>
                        <br>
                        <center>
                            <button type="submit" class="btn btn-primary" id="verify" style="width: 260px">Verify
                                Account</button>
                            <p></p>
                            <p style="font-size: 10px; color:rgb(126, 124, 124)">Salvus reserves the rights to verify new
                                user
                                registration.<br>Your account will be active after verification and notified by email.</p>
                            <br>
                            <button type="submit" class="btn btn-primary" id="non_verify" style="width: 260px">Processed
                                Without
                                Verification</button>
                            <p></p>
                            <p style="font-size: 10px; color:rgb(126, 124, 124)">You can processed without verification. Get
                                your quote and activate<br>your insurance plan but payment must be completed before <br>
                                certificate is issued.</p>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script>
        $(document).ready(function() {
            $('#verify').click(function() {
                $('#is_verify').val(1);
            });
        });
    </script>
@endsection
