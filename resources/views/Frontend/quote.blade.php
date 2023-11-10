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
    <form action="{{ route('quote.calculation') }}" method="POST">
        <div id="insuredProfile">
            <div class="row mt-2" style="justify-content: center">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-white">
                        <h5 class="text-primary mt-2">Insured Profile</h5>
                    </div>
                    <div class="card-body text-primary">
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Company Name</label>
                                <input type="text" class="form-control" name="companyName" id="companyName">
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Phone Number</label>
                                <input type="number" class="form-control" name="phoneNumber" id="phoneNumber">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Company Email</label>
                                <input type="email  " class="form-control" name="companyEmail" id="companyEmail">
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Insurance Address</label>
                                <input type="text" name="insuranceAddress" class="form-control" id="insuranceAddress">
                                {{-- <textarea name="insuranceAddress" class="form-control" id="insuranceAddress" cols="2" rows="1"></textarea> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Conveyance</label>
                                <select name="conveyance" id="conveyance" class="form-select"
                                    style="background-color: #ffffff">
                                    <option value="Land" selected>Land</option>
                                    <option value="Sea">Sea</option>
                                    <option value="Air">Air</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Goods Type</label>
                                <select name="goodsType" id="goodsType" class="form-select"
                                    style="background-color: #ffffff">
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="right">
                            <button type="button" class="btn btn-primary" id="continueButton" style="width: 120px">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="shipmentDetails" style="display: none">
            <div class="row mt-2" style="justify-content: center">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-white">
                        <h5 class="text-primary mt-2">Shipment Details</h5>
                    </div>
                    <div class="card-body text-primary">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="color: rgb(126, 124, 124)">Estimated Time of Departure</label>
                                    <div class="input-group ">
                                        <input type="date" class="form-control rounded-input datepicker col-sm-12"
                                            name="departure" id="departure" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="color: rgb(126, 124, 124)">Estimated Time of Arrival</label>
                                    <div class="input-group ">
                                        <input type="date" class="form-control rounded-input datepicker col-sm-12"
                                            name="arrival" id="arrival" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Point of Origin</label>
                                <input type="text" class="form-control" name="pointOforigin" id="pointOforigin">
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Point of Destination</label>
                                <input type="text" class="form-control" name="pointOfDesti" id="pointOfDesti">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label style="color: rgb(126, 124, 124)">Sum Insured</label>
                                <select class="form-select" name="Currency" id="autoSizingSelect">
                                    {{-- <option selected>IDR</option> --}}
                                    <option value="IDR" selected>IDR</option>
                                    {{-- <option value="USD">USD</option>
                                    <option value="YEN">YEN</option> --}}
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label style="color: rgb(126, 124, 124)"></label>
                                <input type="number" class="form-control" name="sumInsured" id="sumInsured">
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Invoice Number</label>
                                <input type="text" class="form-control" name="invoiceNumber" id="invoiceNumber">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Packing List Number</label>
                                <input type="number" class="form-control" name="packingListNumber"
                                    id="packingListNumber">
                            </div>
                            <div class="col-sm-6">
                                <div id="travelPermissionLand" style="display: none">
                                    <label style="color: rgb(126, 124, 124)">Travel Permission Letter Number</label>
                                    <input type="number" class="form-control" name="travelPermission"
                                        id="travelPermission">
                                </div>
                                <div id="billOfLandingSea" style="display: none">
                                    <label style="color: rgb(126, 124, 124)">Bill Of Landing</label>
                                    <input type="number" class="form-control" name="billOfLanding" id="billOfLanding">
                                </div>
                                <div id="airwayBillAir" style="display: none">
                                    <label style="color: rgb(126, 124, 124)">Airway Bill</label>
                                    <input type="number" class="form-control" name="airwayBill" id="airwayBill">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="land" style="display: none">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label style="color: rgb(126, 124, 124)">License Plate</label>
                                    <input type="number" class="form-control" name="licensePlate" id="licensePlate">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="interIsland"
                                            name="interIsland" style="background-color: rgb(126, 124, 124)">
                                        <label class="form-check-label" style="color: black" for="interIsland">Inter
                                            Island</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <label style="color: rgb(126, 124, 124)">License Plate</label>
                                    <input type="number" class="form-control" name="licensePlateInter"
                                        id="licensePlateInter">
                                </div>
                            </div>
                        </div>
                        <div id="sea" style="display: none">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label style="color: rgb(126, 124, 124)">Ship Name</label>
                                    <select class="form-select" name="shipName" id="shipName">
                                        {{-- <option selected>Star Ship</option> --}}
                                        <option value="star ship">Star Ship</option>
                                        {{-- <option value="IDR">IDR</option> --}}
                                        {{-- <option value="USD">USD</option> --}}
                                        {{-- <option value="YEN">YEN</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label style="color: rgb(126, 124, 124)">Vessel Group</label>
                                    <input type="text" class="form-control" name="vesselGroup" id="vesselGroup">
                                </div>
                                <div class="col-sm-6">
                                    <label style="color: rgb(126, 124, 124)">Container Load</label>
                                    <input type="text" class="form-control" name="containerLoad" id="containerLoad">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label style="color: rgb(126, 124, 124)">Vessel Material</label>
                                    <input type="text" class="form-control" name="vesselMaterial"
                                        id="vesselMaterial">
                                </div>
                                <div class="col-sm-6">
                                    <label style="color: rgb(126, 124, 124)">Vessel Type</label>
                                    <input type="text" class="form-control" name="vesselType" id="vesselType">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label style="color: rgb(126, 124, 124)">Classified</label>
                                    <input type="text" class="form-control" name="classified" id="classified">
                                </div>
                                <div class="col-sm-6">
                                    <label style="color: rgb(126, 124, 124)">Built Year</label>
                                    <input type="text" class="form-control" name="builtYear" id="builtYear">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-sm-6">
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="transhipment"
                                            name="transhipment" style="background-color: rgb(126, 124, 124)">
                                        <label class="form-check-label" style="color: black"
                                            for="transhipment">Transhipment</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="air" style="display: none">
                            <div class="row mt-5">
                                <div class="col-sm-6">
                                    <div class="mb-3 form-check">
                                        <input class="form-check-input" id="transhipment" disabled
                                            style="background-color: rgb(126, 124, 124)">
                                        <label class="form-check-label" style="color: black"
                                            for="transhipment">Transhipment</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="btnCalculate" style="display: none">
            <div class="row" style="justify-content: center">
                <button class="btn btn-primary" id="calculate" style="width: 80%">CALCULATE</button>
            </div>
        </div>
    </form>

    <br>
    <br>
    {{-- <div id="detailInsured">
        <div class="row mt-2" style="justify-content: center">
            <div class="card border-primary mb-3">
                <div class="card-body text-primary">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Company Name</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: PT XYZ Terus</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Phone Number</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: 086969696969</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Company Email</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: ngetodterus@gmail.com</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Insured Address</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: JL. XYZ No.69 </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Conveyance</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: Sea</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Goods Type</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: Doggy Style</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Departure</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: 7 Februari 2023</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Arrival</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: 14 Februari 2023</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Point of Origin</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: Jawa</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Point of Destination</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: Kalimantan</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Sum Insured</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: IDR 1.696.969.696</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Invoice Number</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: 696969</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Packing List Number</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: 696969</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Bill of Landing Number</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: 69696</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Ship Name</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: Maria Ozawa</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Vessel Group</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: Mother Vessel</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Container Load</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: Full Conainer Loaded</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Vessel Material</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: Steel</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Vessel Type</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: General Cargo</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Classified</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: Yes</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Built Year</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: 2023</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Transipment</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: No</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="yourInsurancePlan">
        <br>
        <center>
            <h1 class="text-primary">Your Insurece Plan</h1>
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
    <div id="specialRisk">
        <div class="row">
            <center>
                <h2 class="text-primary">Your goods are categorized as special risk</h2>
                <p class="text-primary">To assist with your special needs, our insurance specialist will contact you as
                    soon possible</p>
                <br>
                <div class="row" style="justify-content: center">
                    <button class="btn btn-primary" id="ok" style="width: 80%">OK</button>
                </div>
                <br>
            </center>
        </div>
    </div> --}}
    <div class="modal fade" id="detailInsurance" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modalHeader">
                    <h5 class="modal-title text-primary">Details</h5>
                    <center>
                        <div class="borderProduct">
                            <b class="text-primary">Zurich</b>&nbsp; &nbsp;| &nbsp; &nbsp;<b class="text-primary">ICC
                                A</b>
                        </div>
                    </center>
                </div>
                <hr style="color: #3156A5">
                <div class="modal-body">
                    <div style="height: 400px; overflow-y: scroll;">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dolores quisquam eos est explicabo
                            fugit deserunt quasi iure, quas itaque temporibus impedit numquam porro culpa delectus quam rem
                            fuga
                            doloremque!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dolores quisquam eos est explicabo
                            fugit deserunt quasi iure, quas itaque temporibus impedit numquam porro culpa delectus quam rem
                            fuga
                            doloremque!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dolores quisquam eos est explicabo
                            fugit deserunt quasi iure, quas itaque temporibus impedit numquam porro culpa delectus quam rem
                            fuga
                            doloremque!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dolores quisquam eos est explicabo
                            fugit deserunt quasi iure, quas itaque temporibus impedit numquam porro culpa delectus quam rem
                            fuga
                            doloremque!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dolores quisquam eos est explicabo
                            fugit deserunt quasi iure, quas itaque temporibus impedit numquam porro culpa delectus quam rem
                            fuga
                            doloremque!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dolores quisquam eos est explicabo
                            fugit deserunt quasi iure, quas itaque temporibus impedit numquam porro culpa delectus quam rem
                            fuga
                            doloremque!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dolores quisquam eos est explicabo
                            fugit deserunt quasi iure, quas itaque temporibus impedit numquam porro culpa delectus quam rem
                            fuga
                            doloremque!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dolores quisquam eos est explicabo
                            fugit deserunt quasi iure, quas itaque temporibus impedit numquam porro culpa delectus quam rem
                            fuga
                            doloremque!</p>
                    </div>
                </div>
                <hr style="color: #3156A5">
                <div class="row mb-3">
                    <div class="col-sm-5" style="margin-left: 20px">
                        <p class="text-primary" style="font-size: 12px">Premium Ammount <br>
                        <h5>IDR 1.000.000</h5>
                        </p>
                    </div>
                    <div class="col-sm-6" style="margin-top: 20px">
                        <a href="{{ route('quote.confirmation') }}" class="btn btn-primary btnFooter">Select</a>
                        <button type="button" class="btn btn-default border-primary btnFooter"
                            data-bs-dismiss="modal">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/quote.js') }}" ></script>
@endsection
