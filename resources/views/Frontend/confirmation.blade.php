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

        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .loader-content {
            background-color: white;
            /* padding: 20px;
                                            border-radius: 8px; */
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
        @php
            $data;
        @endphp
        <div class="row mt-2" style="justify-content: center">

            <div class="card border-primary mb-3">

                <div class="card-body text-primary">
                    @if (!empty($data['data']->companyName))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Company Name</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->companyName ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->phoneNumber))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Phone Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->phoneNumber ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->companyEmail))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Company Email</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->companyEmail ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->insuranceAddress))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Insured Address</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->insuranceAddress ?? '' }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->conveyance))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Conveyance</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->conveyance ?? '' }}</p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($data['data']->goodsType))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Goods Type</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->goodsType ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->itemDescription))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Item Description</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->itemDescription ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->departure))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Departure</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->departure ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->arrival))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Arrival</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->arrival ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->pointOforigin))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Point of Origin</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->pointOforigin ?? '' }}</p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($data['data']->pointOfDestination))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Point of Destination</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    {{ $data['data']->pointOfDestination ?? '' }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->sumInsured))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Sum Insured</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{$data['data']->currency}}
                                    {{ number_format($data['data']->sumInsured, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->invoiceNumber))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Invoice Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->invoiceNumber ?? '' }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->packingListNumber))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Packing List Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    {{ $data['data']->packingListNumber ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->billOfLanding))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Bill of Landing Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->billOfLanding ?? '' }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->shipName))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Ship Name</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->shipName ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->vesselGroup))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Vessel Group</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->vesselGroup ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->containerLoad))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Container Load</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->containerLoad ?? '' }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->vesselMaterial))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Vessel Material</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->vesselMaterial ?? '' }}
                                </p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($data['data']->vesselType))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Vessel Type</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->vesselType ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->classified))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Classified</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->classified ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->builtYear))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Built Year</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['data']->builtYear ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['data']->transhipment))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Transhipment</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    {{ !empty($data['data']->transhipment) == 'on' ? 'YES' : 'NO' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['icc_selected']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Coverage</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    ICC {{ $data['icc_selected'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['icc_selected']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Deductibles</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $product->deductibles ?? null }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['icc_selected']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Total sum Insured</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    {{$data['data']->currency}} {{ number_format($data['data']->sumInsured, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <!-- @if (!empty($product->rate->{'icc_' . strtolower($data['icc_selected'])}))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Rate</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    ICC {{ $data['icc_selected'] ?? '' }} :
                                    {{ $product->rate->{'icc_' . strtolower($data['icc_selected'])}['premium_value'] }}</p>
                            </div>
                        </div>
                    @endif -->
{{-- 
                    @if (!empty($data['premium_amount']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Premium Calculation</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    IDR {{ number_format($data['data']->sumInsured, 0, ',', '.') }} x
                                    {{ $product->rate->{'icc_' . strtolower($data['icc_selected'])}['premium_value'] }} - {{ $product->discount }} =
                                    IDR {{ number_format($data['premium_amount'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endif --}}

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Premium Payment Warranty</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">:
                                7 days After Sailling Date</p>
                        </div>
                    </div>

                    @if (!empty($data['icc_selected']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Security</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $product->security ?? null }}</p>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>

    <div class="loader-container" id="load_save">
        <div class="d-flex align-items-center loader-content">
            <div class="spinner-grow text-primary" role="status"></div>
            <div class="spinner-grow text-info" role="status"></div>
            <div class="spinner-grow text-light" role="status"></div>
            <div class="ms-3">Please wait, processing your transaction...</div>
        </div>
    </div>
    <form action="{{ route('quote.saved') }}" id="post_data" method="post">
        @csrf
        <input type="hidden" name="data" value="{{ json_encode($data) }}" id="final_data">
    </form>

    <div id="payment">
        @if ($data['account_type'] == 'retail' && $data['is_risk'] !== '1')
            <div class="row mt-2" style="justify-content: center">
                <div class="card border-primary mb-3">
                    <div class="card-body text-primary">

                        <label style="color: rgb(126, 124, 124); font-size:12px"><b>Payment Method</b></label>
                        <select name="paymentMethod" id="paymentMethod" class="form-select"
                            style="background-color: #ffffff">
                            <option selected value="BCA">BCA</option>
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="MANDIRI">MANDIRI</option>
                            <option value="CIMB">CIMB NIAGA</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-2" style="justify-content: center">
                <div class="card border-primary mb-3">
                    <div class="card-body text-primary">
                        <p style="color: rgb(126, 124, 124); font-size:12px"><b>Total Payment</b></p>
                        <h5 class="text-primary">{{$data['data']->currency}}
                            @if ($data['data']->currency === "IDR")
                                {{ number_format($data['premium_amount'], 0, ',', '.') }}
                            @elseif ($data['data']->currency === "USD")
                                {{ number_format($data['premium_amount'], 2, ',', '.') }}
                            @else
                                {{ number_format($data['premium_amount'], 2, ',', '.') }}
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
        @endif

        <div class="row mt-2" style="margin-left: 9%">
            <div class="col-sm-6">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="iAggre" name="iAggre"
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
                <a href="{{ route('quote.index') }}" class="btn btn-default border-primary  text-primary" id="cancel"
                    style="width: 80%">Cancel</a>
            </div>
            <div class="col-sm-6 mb-3">
                <button type="button" class="btn btn-primary" id="confirm" style="width: 80%" data-bs-toggle="modal"
                    disabled>Confirm</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSuccess" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="modalSuccessLabel" aria-hidden="true">
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
                            <a href="{{ route('shipment.index') }}" type="button" class="btn btn-primary"
                                style="width: 150px; margin-top: 20px">Ok</a>
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

    <script>
        // $(document).ready(function() {
        //     $('#load_save').hide();
        //     $('#confirm').click(function() {
        //         $('#post_data').submit();
        //         // $('#load_save').show();
        //         // setTimeout(function() {
        //         //     $('#load_save').hide();
        //         //     $('#modalSuccess').modal('show');
        //         // }, 3000);
        //     });
        // });
    </script>
    <script>
        $(document).ready(function() {
            $("#iAggre").change(function() {
                if (this.checked) {
                    $("#confirm").attr('disabled', false);
                } else {
                    $("#confirm").attr('disabled', true);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#load_save').hide();
            $('#confirm').click(function() {
                var selectedPaymentMethod = $('#paymentMethod').val();
                var formData = {
                    _token: '{{ csrf_token() }}',
                    data: $('#final_data').val(),
                    payment_method: selectedPaymentMethod
                };
                $('#load_save').show();
                $.ajax({
                    url: '{{ route('quote.saved') }}',
                    type: 'GET',
                    data: formData,
                    success: function(response) {
                        setTimeout(function() {
                            $('#load_save').hide();
                            if (response.type === 'retail' && response.link) {
                                window.location.href = response.link;
                            } else {
                                $('#modalSuccess').modal('show');
                            }
                            history.replaceState({}, document.title, window.location
                                .href.split('?')[0]);
                        }, 1400);
                    },
                    error: function(xhr) {
                        $('#load_save').hide();
                        console.error(xhr);
                    }
                });
            });
        });
    </script>

{{-- 
    <script>
        $(document).on('contextmenu', function() {
            return false;
        });

        $(document).keydown(function(event) {
            if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
                return false;
            }
        });
        $(document).keydown(function(event) {
            if (event.ctrlKey && event.keyCode == 85) {
                return false;
            }
        });

        $(document).keydown(function(event) {
            if (event.keyCode == 123) { // F12
                return false;
            }
        });
    </script> --}}
@endsection
