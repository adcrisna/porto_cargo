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



                    @if (!empty($order->policy_number))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Company Name</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->company_name }}</p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->phone_number))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Phone Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->phone_number }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->company_email))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Company Email</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->company_email }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->insured_address))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Insured Address</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->insured_address }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->conveyance))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Conveyance</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->conveyance }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->goods_type))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Goods Type</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->goods_type }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->estimated_time_of_departure))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Departure</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">
                                    :{{ date('d-m-Y', strtotime($order->estimated_time_of_departure)) }}</p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->estimated_time_of_arrival))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Arrival</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    {{ date('d-m-Y', strtotime($order->estimated_time_of_arrival)) }}</p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->point_of_origin))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Point of Origin</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->point_of_origin }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->point_of_destination))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Point of Destination</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->point_of_destination }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->$order->sum_insured))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Sum Insured</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    {{ number_format($order->sum_insured, 0, ',', '.') }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->invoice_number))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Invoice Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->invoice_number }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->packing_list_number))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Packing List Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->packing_list_number }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->bill_of_lading_number))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Bill of Landing Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->bill_of_lading_number }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->ship_name))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Ship Name</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->ship_name }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->vessel_group))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Vessel Group</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->vessel_group }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->container_load))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Container Load</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->container_load }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->vessel_material))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Vessel Material</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->vessel_material }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->vessel_type))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Vessel Type</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->vessel_type }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->classified))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Classified</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->classified }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->built_year))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Built Year</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->built_year }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->transhipment))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Transipment</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->transhipment }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->coverage))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Coverage</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->coverage }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->deductibles))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Deductibles</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->deductibles }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->total_sum_insured))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Total Sum Insurance</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->total_sum_insured }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->rate))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Rate</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->rate }} </p>
                            </div>
                        </div>
                    @endif


                    {{-- @if (!empty($order->premium_calculation))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Premium Calculation</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->premium_calculation }} </p>
                            </div>
                        </div>
                    @endif --}}


                    @if (!empty($order->premium_payment_warranty))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Premium Payment Warranty</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->premium_payment_warranty }} </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($order->security))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Security</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $order->security }} </p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('post.claim') }}" method="post" enctype="multipart/form-data">
        <div id="claimForm">
            <div class="row mt-2" style="justify-content: center">
                <div class="card border-primary mb-3">
                    <div class="card-body text-primary">
                        <h5 class="card-title text-primary">Claim Form</h5>
                        <hr>
                        @csrf
                        <input type="hidden" name="transaction_id" value="{{ $order->transaction->id }}">
                        <input type="hidden" name="claim_conveyance" value="{{ $order->conveyance }}">

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
                                <input type="file" class="form-control" accept=".doxc, .pdf, .png, .jpg, .xlsx, .jpeg"
                                    name="invoice" id="invoice" style="background-color: #ffffff">
                            </div>
                            <div class="col-sm-6">
                                @php
                                    $data = $order->conveyance;
                                @endphp
                                @if ($data == 'Land')
                                    <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Travel Permission
                                            Letter</b></label>
                                    <input type="file" accept=".doxc, .pdf, .png, .jpg, .xlsx, .jpeg"
                                        class="form-control" name="travelPermissionLetter" id="travelPermissionLetter"
                                        style="background-color: #ffffff">
                                @elseif ($data == 'Sea')
                                    <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Bill of
                                            Landing</b></label>
                                    <input type="file" accept=".doxc, .pdf, .png, .jpg, .xlsx, .jpeg"
                                        class="form-control" name="billOfLanding" id="billOfLanding"
                                        style="background-color: #ffffff">
                                @elseif ($data == 'Air')
                                    <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Airway Bill
                                        </b></label>
                                    <input type="file" accept=".doxc, .pdf, .png, .jpg, .xlsx, .jpeg"
                                        class="form-control" name="airwayBill" id="airwayBill"
                                        style="background-color: #ffffff">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Other Document</b>(Police
                                    Investigation Report / Event Report / Warrant Letter)</label>
                                {{-- <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Police Investigation
                                        Report</b>(if available)</label> --}}
                                <input type="file" accept=".doxc, .pdf, .png, .jpg, .xlsx, .jpeg" class="form-control"
                                    name="policeInvestiReport" id="policeInvestiReport"
                                    style="background-color: #ffffff">
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Packing List</b></label>
                                <input type="file" accept=".doxc, .pdf, .png, .jpg, .xlsx, .jpeg" class="form-control"
                                    name="packingList" id="packingList" style="background-color: #ffffff">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Photos of Damage Items
                                    </b></label>
                                <div id="dynamicInputsDamage">
                                    <div class="form-group">
                                        <div class="d-flex">
                                            <input type="file" accept=".doxc, .pdf, .png, .jpg, .xlsx, .jpeg"
                                                class="form-control mt-2" name="photosOfDamage[]" id="photosOfDamage"
                                                style="background-color: #ffffff">
                                            <a class="ml-3 btn btn-danger removeInputDamage mt-2"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a id="addInputDamage" class="btn btn-primary mt-2"><i class="fa fa-plus-circle"
                                        aria-hidden="true"></i></a>
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124); font-size: 14px"><b>Photos of Unloading
                                        Process</b></label>
                                <div id="dynamicInputsLoading">
                                    <div class="form-group">
                                        <div class="d-flex">
                                            <input type="file" accept=".doxc, .pdf, .png, .jpg, .xlsx, .jpeg"
                                                class="form-control mt-2" name="photosOfUnloading[]"
                                                id="photosOfUnloading" style="background-color: #ffffff">
                                            <a class="ml-3 btn btn-danger removeInputLoading mt-2"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a id="addInputLoading" class="btn btn-primary mt-2"><i class="fa fa-plus-circle"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
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
                    <input type="checkbox" class="form-check-input mt-3" id="iAggre" name="iAggre"
                        style="background-color: rgb(126, 124, 124)">
                    <label class="form-check-label" style="color: black; font-size: 12px" for="iAggre">
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
                    <button type="submit" class="btn btn-primary" id="submit" style="width: 90%"
                        disabled>Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('javascript')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
    <script>
        $(document).ready(function() {
            $("#iAggre").change(function() {
                if (this.checked) {
                    $("#submit").attr('disabled', false);
                } else {
                    $("#submit").attr('disabled', true);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var hitungDamage = 0;
            $('#addInputDamage').click(function() {
                var clone = $('#dynamicInputsDamage .form-group:first').clone();
                clone.find('input[name="photosOfDamage[]"]').val('');
                $('#dynamicInputsDamage').append(clone);
                hitungDamage++;
                updateHapusTombolStatusDamage();
            });

            $('#dynamicInputsDamage').on('click', '.removeInputDamage', function() {
                $(this).parent().parent().remove();
                hitungDamage--;
                updateHapusTombolStatusDamage();
            });

            function updateHapusTombolStatusDamage() {
                if (hitungDamage <= 0) {
                    $('.removeInputDamage').hide();
                } else {
                    $('.removeInputDamage').show();
                }
            }

            updateHapusTombolStatusDamage();
        });
    </script>
    <script>
        $(document).ready(function() {
            var hitungLoading = 0;
            $('#addInputLoading').click(function() {
                var clone = $('#dynamicInputsLoading .form-group:first').clone();
                clone.find('input[name="photosOfUnloading[]"]').val('');
                $('#dynamicInputsLoading').append(clone);
                hitungLoading++;
                updateHapusTombolStatusLoading();
            });

            $('#dynamicInputsLoading').on('click', '.removeInputLoading', function() {
                console.log('kontl');
                $(this).parent().parent().remove();
                hitungLoading--;
                updateHapusTombolStatusLoading();
            });

            function updateHapusTombolStatusLoading() {
                if (hitungLoading <= 0) {
                    $('.removeInputLoading').hide();
                } else {
                    $('.removeInputLoading').show();
                }
            }

            updateHapusTombolStatusLoading();
        });
    </script>
@endsection
