@extends('layouts.users')
@section('css')
    <style>
        .card {
            width: 100%;
            max-width: 80%;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 10px;
            height: auto;
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
                max-width: 80%;
            }
        }

        .responsive-image {
            width: 20%;
            height: auto;
            margin-top: 50px;
        }

        .right {
            float: right;
        }

        .imageQuote {
            position: relative;
            top: 120px;
            left: 32%;
            transform: translate(-50%, -50%);
            text-align: left;
            color: rgb(46, 10, 173);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 150px;
        }

        .textQuote {
            position: absolute;
            top: 250px;
            left: 60%;
            transform: translate(-50%, -50%);
            text-align: left;
            color: rgb(46, 10, 173);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 550px;
        }

        @media screen and (max-width: 768px) {
            .textQuote {
                width: 100%;
                left: 50%;
                top: 30%;
            }

            .imageQuote {
                width: 65%;
                left: 50%;
                margin-top: 50%;
                margin-bottom: 15px;
            }
        }

        .btnOk {
            margin-left: 0;
            text-align: center;
            margin-top: 100px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <img src="{{ asset('images/Waiting Verification.png') }}" alt="Gambar Responsif" class="responsive-image imageQuote">
        <div class="textQuote">
            <h2 class="text-primary">Your account is currently waiting for verification</h2>
            <p style="font-size: 14px" class="text-primary">Please wait adn you will be notified by email as soon as posible
            </p>
        </div>
    </div>
    <div class="btnOk">
        <div class="row mt-2">
            <div class="col-sm-12 mb-3">
                <a href="" class="btn btn-primary" id="ok" style="width: 80%">OK</a>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
