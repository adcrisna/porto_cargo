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
            <h2 class="text-primary">Quotation</h2>
            <p style="font-size: 22px" class="text-primary">Let's get your quotation now!</p>
        </div>
    </div>
    <form action="{{ route('quote.calculation') }}" method="POST">
        @csrf
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
                                <input type="text" class="form-control" name="companyName" id="companyName"
                                    value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Phone Number</label>
                                <input type="number" class="form-control" name="phoneNumber" id="phoneNumber"
                                    value="{{ Auth::user()->phone_number }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Company Email</label>
                                <input type="email  " class="form-control" name="companyEmail" id="companyEmail"
                                    value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Insurance Address</label>
                                <input type="text" name="insuranceAddress" class="form-control" id="insuranceAddress"
                                    required>
                                {{-- <textarea name="insuranceAddress" class="form-control" id="insuranceAddress" cols="2" rows="1"></textarea> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Conveyance</label>
                                <select name="conveyance" id="conveyance" class="form-select"
                                    style="background-color: #ffffff" required>
                                    <option value="Land" selected>Land</option>
                                    <option value="Sea">Sea</option>
                                    <option value="Air">Air</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Goods Type</label>
                                <select name="goodsType" id="goodsType" class="form-select"
                                    style="background-color: #ffffff" required>
                                    {{-- <option selected disabled>- Select -</option> --}}
                                    @foreach ($good as $item)
                                        <option value="{{ strtolower($item->name) }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div></div>
                            </div>
                            <div class="col-sm-6 d-none" id="specify">
                                <label style="color: rgb(126, 124, 124)">Specify</label>
                                <input type="text" class="form-control" name="specify">
                            </div>
                        </div>
                        <br>
                        <div class="right">
                            <button type="button" class="btn btn-primary" id="continueButton"
                                style="width: 120px">Continue</button>
                        </div>

                        <div id="alert_input"></div>

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
                                <input type="text" class="form-control" name="pointOforigin" id="pointOforigin"
                                    required>
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Point of Destination</label>
                                <input type="text" class="form-control" name="pointOfDestination" id="pointOfDesti"
                                    required>
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
                                <input type="number" class="form-control" name="sumInsured" min="1000"
                                    id="sumInsured" required>
                            </div>
                            {{-- <div class="col-sm-4">
                                <label style="color: rgb(126, 124, 124)"></label>
                                <input type="number" class="form-control" name="sumInsured" min="100000"
                                    id="sumInsured" required>
                            </div> --}}
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Invoice Number</label>
                                <input type="text" class="form-control" name="invoiceNumber" id="invoiceNumber"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Packing List Number</label>
                                <input type="text" class="form-control" name="packingListNumber"
                                    id="packingListNumber" required>
                            </div>
                            <div class="col-sm-6">
                                <div id="travelPermissionLand" style="display: none">
                                    <label style="color: rgb(126, 124, 124)">Travel Permission Letter Number</label>
                                    <input type="text" class="form-control" name="travelPermission"
                                        id="travelPermission">
                                </div>
                                <div id="billOfLandingSea" style="display: none">
                                    <label style="color: rgb(126, 124, 124)">Bill Of Landing</label>
                                    <input type="text" class="form-control" name="billOfLanding" id="billOfLanding">
                                </div>
                                <div id="airwayBillAir" style="display: none">
                                    <label style="color: rgb(126, 124, 124)">Airway Bill</label>
                                    <input type="text" class="form-control" name="airwayBill" id="airwayBill">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label style="color: rgb(126, 124, 124)">Item Description</label>
                                <textarea name="itemDescription" class="form-control" id="itemDescription" cols="30" rows="5"></textarea>
                                {{-- <input type="text" class="form-control" name="itemDescription" id="itemDescription"> --}}
                            </div>
                        </div>
                        <br>
                        <div id="land" style="display: none">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label style="color: rgb(126, 124, 124)">License Plate</label>
                                    <input type="text" class="form-control" name="licensePlate" id="licensePlate">
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
                            <div class="row mt-3" id="ShowlicensePlateInter" style="display: none">
                                <div class="col-sm-6">
                                    <label style="color: rgb(126, 124, 124)">License Plate</label>
                                    <input type="text" class="form-control" name="licensePlateInter"
                                        id="licensePlateInter">
                                </div>
                            </div>
                        </div>
                        <div id="sea" style="display: none">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label style="color: rgb(126, 124, 124)">Ship Name</label>
                                    <input type="text" class="form-control" name="shipName" id="shipName">
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
                                    <input type="number" min="1950" max="2100" class="form-control"
                                        name="builtYear" id="builtYear">
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
                                        <input type="checkbox" class="form-check-input" id="transhipment"
                                            name="transhipment" style="background-color: rgb(126, 124, 124)">
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
@endsection

@section('javascript')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
    <script src="{{ asset('js/quote.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#builtYear').on('input', function() {
                var year = $(this).val().replace(/\D/g, '');
                $(this).val(year);
            });
        });
    </script>
    <script>
        $(function() {
            $("#interIsland").click(function() {
                if ($(this).is(":checked")) {
                    $("#ShowlicensePlateInter").show();
                    $("#licensePlateInter").attr("required", true);
                } else {
                    $("#ShowlicensePlateInter").hide();
                    $("#licensePlateInter").attr("required", false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#goodsType').change(function() {
                var selectedGoodType = $(this).val();
                if (selectedGoodType === 'other') {
                    $('#specify').removeClass('d-none');
                } else {
                    $('#specify').addClass('d-none');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // $('#btnCalculate').css("display", "none");

            // $('#goodsType').change(function() {
            //     var selectedGoodType = $(this).val();
            //     checkGoodTypeCondition();
            // });
            // function checkGoodTypeCondition() {
            //     var selectedGoodType = $('#goodsType').val();

            //     if (selectedGoodType === null || selectedGoodType === '') {
            //         $('#btnCalculate').hide();
            //         $('#alert_input').html('<strong style="color: red;">Please fill in the data properly!</strong>');
            //     } else {
            //         $('#btnCalculate').show();
            //         $('#alert_input').empty();
            //     }
            // }

            // checkGoodTypeCondition();
        });
    </script>
@endsection
