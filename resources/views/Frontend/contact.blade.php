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
            top: 150px;
            left: 40%;
            transform: translate(-50%, -50%);
            text-align: left;
            color: rgb(46, 10, 173);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 280px;
        }

        .textQuote {
            position: absolute;
            top: 250px;
            left: 65%;
            transform: translate(-50%, -50%);
            text-align: left;
            color: rgb(46, 10, 173);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
        }

        @media screen and (max-width: 768px) {
            .textQuote {
                width: 100%;
                left: 78%;
                top: 20%;
            }

            .imageQuote {
                width: 65%;
                left: 50%;
                margin-bottom: 15px;
            }
        }

        .confirmCancel {
            margin-left: 9%;
        }

        .contactCard {
            height: 350px;
        }

        @media screen and (max-width: 768px) {
            .contactCard {
                height: 100%;
            }
        }

        .boxWa {
            height: 70px;
            width: 310px;
            margin-top: 30px;
            float: right;
        }

        @media screen and (max-width: 768px) {
            .boxWa {
                width: 100%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <img src="{{ asset('images/Contact Us.png') }}" alt="Gambar Responsif" class="responsive-image imageQuote">
        <div class="textQuote">
            <h2 class="text-primary">Contact US</h2>
        </div>
    </div>
    <div id="contactUs">
        <div class="row" style="justify-content: center">
            <div class="card border-primary">
                <div class="card-body text-primary">
                    <div class="row contactCard">
                        <div class="col-sm-3">
                            <img src="{{ asset('images/qr-code.png') }}" alt="Gambar" class="responsive-image"
                                style="width: 160px; height:160px; margin-top: 40px !important; margin-left: 20px;">
                        </div>
                        <div class="col-sm-9" style="margin-top: 40px">
                            <p class="text-dark">Jl. Tomang Raya No.47F, Kota Jakarta Barat, <br>
                                Daerah Khusus Ibukota Jakarta, 11440.
                            </p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-dark"><b>Email</b></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-dark">: cs@salvus.co.id</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-dark"><b>24 - Hour WhatsApp Salvus Assistance</b></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-dark">: 0821 1335 3479</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-dark"><b>24 - Hour Call Center</b></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-dark">: (021) 5695 3505</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('images/boxWa.png') }}" alt="Gambar" class="responsive-image boxWa">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
@endsection
