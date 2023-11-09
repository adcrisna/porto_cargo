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
            height: 320px;
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
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: left;
            color: rgb(46, 10, 173);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
        }

        .responsive-image {
            width: 50%;
            height: auto;
            margin-top: 150px
        }

        .responsive-image-shadow {
            width: 50%;
            height: auto;
            margin-top: 60px
        }

        @media screen and (max-width: 768px) {
            .text-overlay {
                width: 100%;
                left: 60%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="row py-5">
        <div class="col-lg-6 d-flex justify-content-center text-center">
            <div class="container">
                <div class="text-overlay">
                    <h2 class="text-primary">Stay Safe, Stay Insured</h2>
                    <p style="font-size: 22px">Cargo Insurance Solution</p>
                </div>
                <img src="{{ asset('images/Home Page.png') }}" alt="Gambar Responsif" class="responsive-image">
                <img src="{{ asset('images/Ellipse.png') }}" alt="Gambar Responsif" class="responsive-image-shadow">
            </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-center">
            <div class="card border-primary mb-3">
                <div class="card-header bg-white">
                    <h5 class="text-primary mt-2">Login</h5>
                </div>
                <div class="card-body text-primary">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label style="color: rgb(126, 124, 124)">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label style="color: rgb(126, 124, 124)">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <br>
                        <center>
                            <button type="submit" class="btn btn-primary" style="width: 120px">Login</button>
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
@endsection
