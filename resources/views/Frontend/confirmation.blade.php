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

        .confirmCancel {
            margin-left: 9%;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <img src="{{ asset('images/Confirmation.png') }}" alt="Gambar Responsif" class="responsive-image imageQuote">
        <div class="textQuote">
            <h2 class="text-primary">Confirmation</h2>
            <p style="font-size: 22px" class="text-primary">Let's confirm your insurance plan now!</p>
        </div>
    </div>
    <div id="detailInsured">
        <div class="row mt-2" style="justify-content: center">
            <div class="card border-primary mb-3">
                <div class="card-body text-primary">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Company Name</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: PT Ngentod Terus</p>
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
                            <p class="text-dark" style="font-size:12px">: JL. Ngentod No.69 </p>
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
    <div id="payment">
        <div class="row mt-2" style="justify-content: center">
            <div class="card border-primary mb-3">
                <div class="card-body text-primary">
                    <form action="" method="">
                        @csrf
                        <label style="color: rgb(126, 124, 124); font-size:12px"><b>Payment Method</b></label>
                        <select name="paymentMethod" id="paymentMethod" class="form-select"
                            style="background-color: #ffffff">
                            <option value="Land">BCA</option>
                            <option value="Sea">BRI</option>
                            <option value="Air">BNI</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-2" style="justify-content: center">
            <div class="card border-primary mb-3">
                <div class="card-body text-primary">
                    <p style="color: rgb(126, 124, 124); font-size:12px"><b>Total Payment</b></p>
                    <h5 class="text-primary">IDR 1.000.000</h5>
                </div>
            </div>
        </div>
        <div class="row mt-2" style="margin-left: 9%">
            <div class="col-sm-6">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="transhipment" name="transhipment"
                        style="background-color: rgb(126, 124, 124)">
                    <label class="form-check-label" style="color: black; font-size: 12px" for="transhipment">I agree to
                        the
                        terms and condition of the selected cargo insurance</label>
                </div>
            </div>
        </div>
    </div>
    <div class="confirmCancel">
        <div class="row mt-2">
            <div class="col-sm-6 mb-3">
                <button class="btn btn-default border-primary  text-primary" id="cancel"
                    style="width: 80%">Cancel</button>
            </div>
            <div class="col-sm-6 mb-3">
                <button type="button" class="btn btn-primary" id="confirm" style="width: 80%" data-bs-toggle="modal"
                    data-bs-target="#modalSuccess">Confirm</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSuccess" tabindex="-1" aria-labelledby="modalSuccessLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/Confirmation Pop Up.png') }}" alt="Gambar Responsif"
                                class="responsive-image" style="margin-top: 0 !important; width: 70%;">
                        </div>
                        <div class="col-sm-8">
                            <p class="text-primary" style="margin-top: 0 !important"><b>Congratulations, your insurance
                                    policy will be issued. <br>
                                    Meanwhile,
                                    please check policy
                                    Summary and Premium Note in your account.</b></p>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                style="width: 150px; margin-top: 20px">Ok</button>
                        </div>
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
@endsection
