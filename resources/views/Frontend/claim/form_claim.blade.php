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
            max-width: 300px;
        }

        .textQuote {
            position: absolute;
            top: 300px;
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
                left: 90%;
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
        <img src="{{ asset('images/Claim.png') }}" alt="Gambar Responsif" class="responsive-image imageQuote">
        <div class="textQuote">
            <h2 class="text-primary">Claim</h2>
        </div>
    </div>
    <div id="detaiClaim">
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
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Coverage</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: ICC A</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Deductibles</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: 1% of total sum insured per any one
                                occurrence any one conveyance</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Total Sum Insurance</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: IDR 1.000.000.000,00</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Rate</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: ICC A 0.1%</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Premium Calculation</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: IDR 1.000.000.000,00 x 0,1% = IDR
                                1.000.0000,00</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Premium Payment Warranty</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: 7 Days After Sailling Date</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Security</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: ZURICH ASURANSI INDONESIA, Tbk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="claimForm">
        <div class="row mt-2" style="justify-content: center">
            <div class="card border-primary mb-3">
                <div class="card-body text-primary">
                    <h5 class="card-title text-primary">Claim Form</h5>
                    <hr>
                    <form action="" method="" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Chronology</b></label>
                                <textarea name="chronology" class="form-control" id="chronology" cols="1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Date of Loss</b></label>
                                <input type="date" class="form-control" name="dateOfLoss" id="dateOfLoss" required>
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Ammount of Loss</b></label>
                                <input type="number" class="form-control" name="ammountOfLoss" id="ammountOfLoss"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Invoice</b></label>
                                <input type="file" class="form-control" name="invoice" id="invoice"
                                    style="background-color: #ffffff">
                            </div>
                            <div class="col-sm-6">
                                @php
                                    $data = 'Sea';
                                @endphp
                                @if ($data == 'Land')
                                    <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Travel Permission
                                            Letter</b></label>
                                    <input type="file" class="form-control" name="travelPermissionLetter"
                                        id="travelPermissionLetter" style="background-color: #ffffff">
                                @elseif ($data == 'Sea')
                                    <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Bill of
                                            Landing</b></label>
                                    <input type="file" class="form-control" name="billOfLanding" id="billOfLanding"
                                        style="background-color: #ffffff">
                                @elseif ($data == 'Air')
                                    <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Airway Bill
                                        </b></label>
                                    <input type="file" class="form-control" name="airwayBill" id="airwayBill"
                                        style="background-color: #ffffff">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Police Investigation
                                        Report</b>(if available)</label>
                                <input type="file" class="form-control" name="policeInvestiReport"
                                    id="policeInvestiReport" style="background-color: #ffffff">
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Packing List</b></label>
                                <input type="file" class="form-control" name="packingList" id="packingList"
                                    style="background-color: #ffffff">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Photos of Damage Items
                                    </b></label>
                                <input type="file" class="form-control" name="photosOfDamage[]" id="photosOfDamage"
                                    style="background-color: #ffffff" multiple>
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Photos of Unloading
                                        Process</b></label>
                                <input type="file" class="form-control" name="photosOfUnloading[]"
                                    id="photosOfUnloading" style="background-color: #ffffff" multiple>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2" style="margin-left: 10.5%">
        <div class="col-sm-12">
            <label class="form-check-label" style="color: black; font-size: 12px" for="transhipment">Additional
                supporting documents may be required by insurers to complete claim process.
            </label> <br>
        </div>
    </div>
    <br>
    <div class="row mt-2" style="margin-left: 9%">
        <div class="col-sm-12">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input mt-3" id="transhipment" name="transhipment"
                    style="background-color: rgb(126, 124, 124)">
                <label class="form-check-label" style="color: black; font-size: 12px" for="transhipment">
                    I hereby apply for compensation of repairment/replecement for goods damage which have been harm and
                    insured as details above.</label> <br>
                <i style="color: rgb(85, 84, 84); font-size: 12px">Dengan ini saya menuntut kompensasi untuk
                    perbaikan/pergantian dari kerusakan barang yang terjadi dan
                    diasuransikan dengan detil di atas.</i>
            </div>
        </div>
    </div>
    </div>
    <div class="submit" style="margin-left: 10%">
        <div class="row mt-2">
            <div class="col-sm-12 mb-3">
                <button class="btn btn-primary" id="submit" style="width: 90%">Submit</button>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
