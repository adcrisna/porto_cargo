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
            /* width: 20%; */
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
        <img src="{{ asset('images/Quote.png') }}" alt="Gambar Responsif" class="responsive-image imageQuote">
        <div class="textQuote">
            <h2 class="text-primary">Quotation</h2>
            <p style="font-size: 22px" class="text-primary">Let's get your quotation now!</p>
        </div>
    </div>
    <form action="{{ route('quote.confirmation') }}" class="d-none" id="sendtoconfirm" method="post">
        @csrf
        <input type="hidden" value="{{ json_encode($data) }}" name="insured_detail">
        <input type="hidden" value="" name="premium_amount">
        <input type="hidden" value="" name="icc_selected">
        <input type="hidden" value="" name="product_id">
        <input type="hidden" value="{{ $is_risk }}" name="is_risk">
    </form>
    <form action="{{ route('quote.saved') }}" class="d-none" id="sendtosaved" method="post">
        @csrf
        <input type="hidden" value="{{ json_encode($data) }}" name="insured_detail">
        <input type="hidden" value="" name="premium_amount">
        <input type="hidden" value="" name="icc_selected">
        <input type="hidden" value="" name="product_id">
        <input type="hidden" value="{{ $is_risk }}" name="is_risk">
    </form>

    <br>
    <br>
    <div id="detailInsured">
        @php
            $data;
        @endphp
        <div class="row mt-2" style="justify-content: center">
            <div class="card border-primary mb-3">
                <div class="card-body
                 text-primary">
                    @if (!empty($data['companyName']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Company Name</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['companyName'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['phoneNumber']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Phone Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['phoneNumber'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['companyEmail']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Company Email</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['companyEmail'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['insuranceAddress']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Insured Address</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['insuranceAddress'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['conveyance']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Conveyance</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['conveyance'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($data['goodsType']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Goods Type</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['goodsType'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['departure']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Departure</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['departure'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['arrival']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Arrival</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['arrival'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['pointOforigin']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Point of Origin</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['pointOforigin'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($data['pointOfDestination']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Point of Destination</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['pointOfDestination'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['sumInsured']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Sum Insured</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: IDR {{ $data['sumInsured'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['invoiceNumber']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Invoice Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['invoiceNumber'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['packingListNumber']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Packing List Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['packingListNumber'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['billOfLanding']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Bill of Landing Number</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['billOfLanding'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['shipName']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Ship Name</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['shipName'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['vesselGroup']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Vessel Group</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['vesselGroup'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['containerLoad']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Container Load</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['containerLoad'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['vesselMaterial']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Vessel Material</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['vesselMaterial'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif


                    @if (!empty($data['vesselType']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Vessel Type</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['vesselType'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['classified']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Classified</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['classified'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['builtYear']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Built Year</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">: {{ $data['builtYear'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['transhipment']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Transhipment</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    {{ !empty($data['transhipment']) == 'on' ? 'YES' : 'NO' }}</p>
                            </div>
                        </div>
                    @endif
                    @if (!empty($data['itemDescription']))
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-dark" style="font-size:12px"><b>Item Description</b></p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-dark" style="font-size:12px">:
                                    {{ $data['itemDescription'] ?? '' }}
                                   </p>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div id="loader_calculate" class="d-flex justify-content-center d-none">
        <div class="spinner-border text-primary" role="status">
        </div>
    </div>

    <div id="yourInsurancePlan">
        <br>
        <center>
            <h1 class="text-primary">Your Insurance Plan</h1>
        </center>
        <br>
        @foreach ($result as $item)
            <div class="row mt-2" style="justify-content: center">
                <div class="card border-primary">
                    <div class="card-body text-primary">
                        <div class="row" style="justify-content: center">
                            <div class="col-sm-3 d-flex flex-column align-items-center" style="width: 140px">
                                <img src="{{ $item['product_data']['product_image'] }}" style="width: 120px" class="img-fluid" alt="logo">
                                <p class="text-primary font-weight-bold mt-2">{{ $item['product_data']['display_name'] }}</p>
                            </div>
                            @if (!empty($item['icc_price']['a']))
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
                                                    <h5 class="text-primary">IDR
                                                        {{ number_format($item['icc_price']['a'], 0, ',', '.') }}</h5>
                                                    <p></p>
                                                    <button type="button"
                                                        class="btn btn-sm btn-default border-primary btnDetails"
                                                        data-product='@json([
                                                            'product_name' => $item['product_data']['display_name'],
                                                            'premium_amount' => $item['icc_price']['a'],
                                                            'icc_type' => 'A'
                                                        ])'
                                                        data-detail='{{ $item['product_data']['rate']['icc_a']['detail'] }}'
                                                        data-proid='{{ $item['product_data']['id'] }}'>Details</button>

                                                    <button type="button"
                                                        class="btn btn-sm btn-primary OnlyConfirm"
                                                        data-product='@json([
                                                            'product_name' => $item['product_data']['display_name'],
                                                            'premium_amount' => $item['icc_price']['a'],
                                                            'icc_type' => 'A'
                                                        ])'
                                                        data-proid='{{ $item['product_data']['id'] }}'>Select</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($item['icc_price']['b']))
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
                                                    <h5 class="text-primary">IDR
                                                        {{ number_format($item['icc_price']['b'], 0, ',', '.') }}</h5>
                                                    <p></p>
                                                    <button type="button"
                                                        class="btn btn-sm btn-default border-primary btnDetails"
                                                        data-product='@json([
                                                            'product_name' => $item['product_data']['display_name'],
                                                            'premium_amount' => $item['icc_price']['b'],
                                                            'icc_type' => 'B'
                                                        ])'
                                                        data-detail='{{ $item['product_data']['rate']['icc_b']['detail'] }}'
                                                        data-proid='{{ $item['product_data']['id'] }}'>Details</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary OnlyConfirm"
                                                        data-product='@json([
                                                            'product_name' => $item['product_data']['display_name'],
                                                            'premium_amount' => $item['icc_price']['b'],
                                                            'icc_type' => 'B'
                                                        ])'
                                                        data-proid='{{ $item['product_data']['id'] }}'>Select</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($item['icc_price']['c']))
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
                                                    <h5 class="text-primary">IDR
                                                        {{ number_format($item['icc_price']['c'], 0, ',', '.') }}</h5>
                                                    <p></p>
                                                    <button type="button"
                                                        class="btn btn-sm btn-default border-primary btnDetails"
                                                        data-product='@json([
                                                            'product_name' => $item['product_data']['display_name'],
                                                            'premium_amount' => $item['icc_price']['c'],
                                                            'icc_type' => 'C'
                                                        ])'
                                                        data-detail='{{ $item['product_data']['rate']['icc_c']['detail'] }}'
                                                        data-proid='{{ $item['product_data']['id'] }}'>Details</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary OnlyConfirm"
                                                        data-product='@json([
                                                            'product_name' => $item['product_data']['display_name'],
                                                            'premium_amount' => $item['icc_price']['c'],
                                                            'icc_type' => 'C'
                                                        ])'
                                                        data-proid='{{ $item['product_data']['id'] }}'>Select</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <div id="btnCancel">
            <div class="row mt-3" style="justify-content: center">
                <a href="{{ route('quote.index') }}" class="btn btn-primary" id="cancel"
                    style="width: 80%">CANCEL</a>
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

    <div id="specialRisk" class="mt-5">
        <div class="row">
            <center>
                <h2 class="text-primary">Your goods are categorized as special risk</h2>
                <p class="text-primary">To assist with your special needs, our insurance specialist will contact you as
                    soon possible</p>
                <br>
                <div class="row" style="justify-content: center">
                    <button class="btn btn-primary" id="ok_risk" style="width: 80%">OK</button>
                </div>
                <br>
            </center>
        </div>
    </div>
    <br>
    <br>

    <div class="modal fade" id="detailInsuranceModals" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modalHeader">
                    <h5 class="modal-title text-primary">Details</h5>
                    <center>
                        <div class="borderProduct col-md-4">
                            <b class="text-primary" id="productName"></b>&nbsp; &nbsp;| &nbsp; &nbsp;<b
                                class="text-primary" id="iccType"></b>
                        </div>
                    </center>
                </div>
                <hr style="color: #3156A5">
                <div class="modal-body">
                    <div style="height: 400px; overflow-y: scroll;" id="productDetails">
                    </div>
                </div>
                <hr style="color: #3156A5">
                <div class="row mb-3">
                    <div class="col-sm-5" style="margin-left: 20px">
                        <p class="text-primary" style="font-size: 12px">Premium Ammount <br>
                        <h5 id="premiumAmount"></h5>
                        </p>
                    </div>
                    <div class="col-sm-6" style="margin-top: 20px">
                        <button class="btn btn-primary btnFooter" id="topayment">Select</button>
                        <button type="button" class="btn btn-default border-primary btnFooter"
                            data-bs-dismiss="modal">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/quote.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#load_save').hide();

            if ('{{ $is_risk }}' == '1') {
                $('#yourInsurancePlan').hide();
                $('#specialRisk').show();
            } else {
                $('#yourInsurancePlan').show();
                $('#specialRisk').hide();
            }

            $('#ok_risk').click(function() {
                $('#load_save').show();
                setTimeout(function() {
                    $('#loader_calculate').removeClass('d-block').addClass('d-none');
                    var formData = $('#sendtosaved').serialize();
                    formData += '&_token={{ csrf_token() }}';

                    $.ajax({
                        url: '{{ route('quote.saved') }}',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            $('#load_save').hide();
                            window.location.href = response.link
                        },
                        error: function(xhr) {
                            console.log(xhr);
                            $('#load_save').hide();
                            alert("ERROR!!!! DATA SEND PLEASE CONTACT YOUR ADMINISTATOR!!")
                        }
                    });

                    // $('#sendtosaved').submit();
                }, 400);

            });
        });
    </script>

    <script>
        function showProductDetails(product, detail, productid) {
            $('#productName').text(product.product_name);
            $('#iccType').text('ICC ' + product.icc_type);
            $('#premiumAmount').text('IDR ' + product.premium_amount.toLocaleString('id-ID'));
            $('#productDetails').html(detail);

            $('#detailInsuranceModals').modal('show');
        }

        $(document).ready(function() {
            $('.btnDetails').on('click', function() {
                var product = $(this).data('product');
                var detail = $(this).data('detail');
                var productid = $(this).data('proid');

                $('#sendtoconfirm input[name="premium_amount"]').val(product.premium_amount);
                $('#sendtoconfirm input[name="product_id"]').val(productid);
                $('#sendtoconfirm input[name="icc_selected"]').val(product.icc_type);

                showProductDetails(product, detail, productid);


            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#topayment').on('click', function() {
                $('#sendtoconfirm').submit();
            });

            $('.OnlyConfirm').on('click', function() {
                var product = $(this).data('product');
                var productid = $(this).data('proid');

                $('#sendtoconfirm input[name="premium_amount"]').val(product.premium_amount);
                $('#sendtoconfirm input[name="product_id"]').val(productid);
                $('#sendtoconfirm input[name="icc_selected"]').val(product.icc_type);


                $('#sendtoconfirm').submit();
            });
        });
    </script>


    <script>
        $(document).on('contextmenu', function () {
            return false;
        });

        $(document).keydown(function (event) {
            if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
                return false;
            }
        });
        $(document).keydown(function (event) {
            if (event.ctrlKey && event.keyCode == 85) {
                return false;
            }
        });

        $(document).keydown(function (event) {
            if (event.keyCode == 123) { // F12
                return false;
            }
        });
    </script>
@endsection
