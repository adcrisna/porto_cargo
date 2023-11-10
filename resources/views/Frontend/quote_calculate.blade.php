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
            left: 36%;
            transform: translate(-50%, -50%);
            text-align: left;
            color: rgb(46, 10, 173);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
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
                left: 65%;
                top: 20%;
            }

            .imageQuote {
                width: 65%;
                left: 50%;
                margin-bottom: 15px;
            }
        }

        .garis_vertikal {
            border-left: 1px rgb(211, 211, 211) solid;
            height: 95px;
            width: 0px;
            float: left;
            margin-top: 5px;
            margin-right: 20px;
        }

        .modalHeader {
            margin: 5px;
            text-align: center !important;
        }

        .modal-body {
            overflow-y: auto;
        }

        .borderProduct {
            width: 20%;
            border: 1px solid rgb(197, 197, 197);
            margin: 5px;
            padding: 5px;
            border-radius: 10px;
            justify-content: center;
        }

        @media screen and (max-width: 768px) {
            .borderProduct {
                width: 60%;
            }
        }

        .modalFooter {
            margin-left: 20px;
            float: left;
        }

        .btnFooter {
            float: right;
            margin-right: 10px;
            width: 30%;
        }

        @media screen and (max-width: 768px) {
            .btnFooter {
                float: left;
                margin-left: 10px;
            }
        }

        p {
            font-size: 12px !important;
        }

        label {
            font-size: 12px !important;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <img src="{{ asset('images/Quote.png') }}" alt="Gambar Responsif" class="responsive-image imageQuote">
        <div class="textQuote">
            <h2 class="text-primary">Quote</h2>
            <p style="font-size: 22px" class="text-primary">Let's get your quote now!</p>
        </div>
    </div>
    <br>
    <br>
    <div id="detailInsured">
        @php
            $send = $data;
        @endphp
        <div class="row mt-2" style="justify-content: center">
            <div class="card border-primary mb-3">
                <div class="card-body text-primary">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Company Name</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['companyName'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Phone Number</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['phoneNumber'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Company Email</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['companyEmail'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Insured Address</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['insuranceAddress'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Conveyance</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['conveyance'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Goods Type</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['goodsType'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Departure</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['departure'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Arrival</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['arrival'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Point of Origin</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['pointOforigin'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Point of Destination</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['pointOfDesti'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Sum Insured</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: IDR {{ $data['sumInsured'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Invoice Number</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['invoiceNumber'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Packing List Number</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['packingListNumber'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Bill of Landing Number</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['billOfLanding'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Ship Name</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['shipName'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Vessel Group</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['vesselGroup'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Container Load</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['containerLoad'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Vessel Material</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['vesselMaterial'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Vessel Type</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['vesselType'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Classified</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['classified'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Built Year</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data['builtYear'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Transhipment</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ !empty($data['transhipment']) == 'on' ? 'YES' : 'NO' }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="yourInsurancePlan">
        <br>
        <center>
            <h1 class="text-primary">Your Insurance Plan</h1>
        </center>
        <br>

        <div class="row mt-2" style="justify-content: center">
            <div class="card border-primary">
                <div class="card-body text-primary">
                    <div class="row" style="justify-content: center">
                        <div class="col-sm-2 align-self-center" style="width: 140px">
                            <img src="{{ asset('images/Contact Us.png') }}" style="width: 120px"
                                class="img-fluid rounded-circle" alt="logo">
                        </div>
                        <div class="col-sm-3 align-self-center" style="width: 300px">
                            <div class="card" style="max-width: 100%; padding:0px; margin:0px">
                                <div class="card-body text-primary" style="height: 25%">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center" style="margin: 0px">
                                            <p><b>ICC A</b></p>
                                        </div>
                                        <div class="col-sm-9 align-self-center">
                                            <div class="garis_vertikal"></div>
                                            <P style="font-size: 10px">Premium Ammount</P>
                                            <h5 class="text-primary">IDR 1.000.000</h5>
                                            <p></p>
                                            <button type="button" class="btn btn-sm btn-default border-primary"
                                                data-bs-toggle="modal" data-bs-target="#detailInsurance">Details</button>
                                            <a href="{{ route('quote.confirmation') }}"
                                                class="btn btn-sm btn-primary">Select</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 align-self-center" style="width: 300px">
                            <div class="card" style="max-width: 100%; padding:0px; margin:0px">
                                <div class="card-body text-primary" style="height: 25%">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center">
                                            <p><b>ICC B</b></p>
                                        </div>
                                        <div class="col-sm-9 align-self-center">
                                            <div class="garis_vertikal"></div>
                                            <P style="font-size: 10px">Premium Ammount</P>
                                            <h5 class="text-primary">IDR 700.000</h5>
                                            <p></p>
                                            <button type="button" class="btn btn-sm btn-default border-primary"
                                                data-bs-toggle="modal" data-bs-target="#detailInsurance">Details</button>
                                            <a href="{{ route('quote.confirmation') }}"
                                                class="btn btn-sm btn-primary">Select</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 align-self-center" style="width: 300px">
                            <div class="card" style="max-width: 100%; padding:0px; margin:0px">
                                <div class="card-body text-primary" style="height: 25%">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center">
                                            <p><b>ICC C</b></p>
                                        </div>
                                        <div class="col-sm-9 align-self-center">
                                            <div class="garis_vertikal"></div>
                                            <P style="font-size: 10px">Premium Ammount</P>
                                            <h5 class="text-primary">IDR 500.000</h5>
                                            <p></p>
                                            <button type="button" class="btn btn-sm btn-default border-primary"
                                                data-bs-toggle="modal" data-bs-target="#detailInsurance">Details</button>
                                            <a href="{{ route('quote.confirmation') }}"
                                                class="btn btn-sm btn-primary">Select</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2" style="justify-content: center">
            <div class="card border-primary">
                <div class="card-body text-primary">
                    <div class="row" style="justify-content: center">
                        <div class="col-sm-2 align-self-center" style="width: 140px">
                            <img src="{{ asset('images/Contact Us.png') }}" style="width: 120px"
                                class="img-fluid rounded-circle" alt="logo">
                        </div>
                        <div class="col-sm-3 align-self-center" style="width: 300px">
                            <div class="card" style="max-width: 100%; padding:0px; margin:0px">
                                <div class="card-body text-primary" style="height: 20%">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center" style="margin: 0px">
                                            <p><b>ICC A</b></p>
                                        </div>
                                        <div class="col-sm-9 align-self-center">
                                            <div class="garis_vertikal"></div>
                                            <P style="font-size: 10px">Premium Ammount</P>
                                            <h5 class="text-primary">IDR 1.000.000</h5>
                                            <p></p>
                                            <button type="button" class="btn btn-sm btn-default border-primary"
                                                data-bs-toggle="modal" data-bs-target="#detailInsurance">Details</button>
                                            <a href="{{ route('quote.confirmation') }}"
                                                class="btn btn-sm btn-primary">Select</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 align-self-center" style="width: 300px">
                            <div class="card" style="max-width: 100%; padding:0px; margin:0px">
                                <div class="card-body text-primary" style="height: 20%">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center">
                                            <p><b>ICC B</b></p>
                                        </div>
                                        <div class="col-sm-9 align-self-center">
                                            <div class="garis_vertikal"></div>
                                            <P style="font-size: 10px">Premium Ammount</P>
                                            <h5 class="text-primary">IDR 700.000</h5>
                                            <p></p>
                                            <button type="button" class="btn btn-sm btn-default border-primary"
                                                data-bs-toggle="modal" data-bs-target="#detailInsurance">Details</button>
                                            <a href="{{ route('quote.confirmation') }}"
                                                class="btn btn-sm btn-primary">Select</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 align-self-center" style="width: 300px">
                            <div class="card" style="max-width: 100%; padding:0px; margin:0px">
                                <div class="card-body text-primary" style="height: 20%">
                                    <div class="row">
                                        <div class="col-sm-3 align-self-center">
                                            <p><b>ICC C</b></p>
                                        </div>
                                        <div class="col-sm-9 align-self-center">
                                            <div class="garis_vertikal"></div>
                                            <P style="font-size: 10px">Premium Ammount</P>
                                            <h5 class="text-primary">IDR 500.000</h5>
                                            <p></p>
                                            <button type="button" class="btn btn-sm btn-default border-primary"
                                                data-bs-toggle="modal" data-bs-target="#detailInsurance">Details</button>
                                            <a href="{{ route('quote.confirmation') }}"
                                                class="btn btn-sm btn-primary">Select</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="btnCancel">
            <div class="row" style="justify-content: center">
                <button class="btn btn-primary" id="cancel" style="width: 80%">CANCEL</button>
            </div>
        </div>
        <br>
        <br>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/quote.js') }}"></script>
@endsection
