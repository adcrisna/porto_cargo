@extends('layouts.users')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
    </style>
@endsection
@section('content')
    <div class="row" style="margin-left: 9%; margin-top: 3%">
        <h5 class="text-primary">Payment</h5>
    </div>
    <div class="row mt-2" style="justify-content: center">
        <div class="card border-primary mb-3">
            <div class="card-body text-primary">
                <table id="example" class="table table-striped table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-primary">PN Number</th>
                            <th class="text-primary">Insured Name</th>
                            <th class="text-primary">Departure Address</th>
                            <th class="text-primary">Destination Address</th>
                            <th class="text-primary">Payment Status</th>
                            <th class="text-primary">Premium Ammount</th>
                            <th class="text-primary">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->transaction->pn_number }}</td>
                                <td>{{ $item->company_name }}</td>
                                <td>{{ $item->point_of_origin }}</td>
                                <td>{{ $item->point_of_destination }}</td>
                                <td>
                                    @php
                                        $status = $item->transaction->payment_status;
                                    @endphp
                                    @if ($status == 'unpaid')
                                        <button class="btn btn-default border-danger text-danger">Unpaid</button>
                                    @elseif ($status == 'paid')
                                        <button class="btn btn-default border-success text-success">Paid</button>
                                    @else
                                        <button class="btn btn-default border-warning text-warning">Pending</button>
                                    @endif

                                </td>
                                <td>IDR {{ number_format($item->premium_amount, 0, ',', '.') }}</td>
                                <td>
                                    <button class="btn btn-default border-primary detail-btn"
                                        data-item-id="{{ $item->id }}" style="width: 90px">Detail</button>
                                    @if (Auth::user()->account_type == 'retail' && $item->transaction->payment_status == 'pending')
                                        <a href="{{ @$item->transaction->payment_link }}"
                                            class="btn btn-sm btn-primary mt-1" style="width: 90px">Pay</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="detailModalLabel">Details</h5>
                </div>
                <div class="modal-body">
                    <div class="row mt-2" style="justify-content: center">
                        <div class="card border-primary mb-3">
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Company Name</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px" id="companyName">:
                                            <span id="item-company_name"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Phone Number</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span id="item-phone_number"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Company Email</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span id="item-company_email"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Insured Address</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span
                                                id="item-insured_address"></span> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Conveyance</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span id="item-conveyance"></span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Goods Type</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span id="item-goods_type"></span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Departure</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">:
                                            <span id="item-estimated_time_of_departure"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Arrival</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">:
                                            <span id="item-estimated_time_of_arrival"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Point of Origin</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span
                                                id="item-point_of_origin"></span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Point of Destination</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span
                                                id="item-point_of_destination"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Sum Insured</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span id="item-sum_insured"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Invoice Number</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span
                                                id="item-invoice_number"></span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Packing List Number</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span
                                                id="item-packing_list_number"></span>
                                        </p>
                                    </div>
                                </div>
                                <div id="typeAir">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Airways Bill</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-airway_bill"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div id="typeLand">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Travel Permission Letter
                                                    Number</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-travel_permission"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>License Plate</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-license_plate"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row" id="inter_island">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Inter Island</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-inter_island"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row" id="license_plateinter">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>License Plate Inter</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-license_plateinter"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div id="typeSea">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Bill of Landing Number</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-bill_of_lading_number"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Ship Name</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-ship_name"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Vessel Group</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-vessel_group"></span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Container Load</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-container_load"></span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Vessel Material</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-vessel_material"></span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Vessel Type</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-vessel_type"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Classified</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-classified"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="text-dark" style="font-size:12px"><b>Built Year</b></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-dark" style="font-size:12px">: <span
                                                    id="item-built_year"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="transhipment">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Transipment</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span
                                                id="item-transhipment"></span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Coverage</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span id="item-coverage"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row" id="deductibles">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Deductibles</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span id="item-deductibles"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Total Sum Insurance</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span
                                                id="item-total_sum_insured"></span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Rate</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span id="item-rate"></span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Premium Calculation</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span
                                                id="item-premium_calculation"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row" id="premium_payment_warranty">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Premium Payment Warranty</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">:
                                            <span id="item-premium_payment_warranty"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row" id="security">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Security</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: <span id="item-security"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        style="width: 120px">Back</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    <script>
        $(document).ready(function() {
            const rupiah = (number) => {
                return new Intl.NumberFormat("id-ID", {
                    style: 'currency',
                    currency: "IDR",
                    minimumFractionDigits: 0,
                }).format(number);
            }

            $('#example').on('click', '.detail-btn', function() {
                var itemId = $(this).data('item-id');
                console.log(itemId);

                $.ajax({
                    url: '/payment_detail/' + itemId,
                    method: 'GET',
                    success: function(data) {

                        if (data.conveyance == 'Land') {
                            $("#typeLand").css("display", "block");
                            $("#typeSea").css("display", "none");
                            $("#typeAir").css("display", "none");
                        } else if (data.conveyance == 'Sea') {
                            $("#typeLand").css("display", "none");
                            $("#typeSea").css("display", "block");
                            $("#typeAir").css("display", "none");
                        } else if (data.conveyance == 'Air') {
                            $("#typeLand").css("display", "none");
                            $("#typeSea").css("display", "none");
                            $("#typeAir").css("display", "block");
                        }

                        $('#item-id').text(data.id);
                        $('#item-company_name').text(data.company_name);
                        $('#item-phone_number').text(data.phone_number);
                        $('#item-company_email').text(data.company_email);
                        $('#item-insured_address').text(data.insured_address);
                        $('#item-conveyance').text(data.conveyance);
                        $('#item-goods_type').text(data.goods_type);
                        $('#item-estimated_time_of_departure').text(data
                            .estimated_time_of_departure);
                        $('#item-estimated_time_of_arrival').text(data
                            .estimated_time_of_arrival);
                        $('#item-point_of_origin').text(data.point_of_origin);
                        $('#item-point_of_destination').text(data.point_of_destination);
                        $('#item-sum_insured').text(rupiah(data.sum_insured));
                        $('#item-invoice_number').text(data.invoice_number);
                        $('#item-packing_list_number').text(data.packing_list_number);
                        $('#item-bill_of_lading_number').text(data.bill_of_lading_number);
                        $('#item-ship_name').text(data.ship_name);
                        $('#item-vessel_group').text(data.vessel_group);
                        $('#item-container_load').text(data.container_load);
                        $('#item-vessel_material').text(data.vessel_material);
                        $('#item-vessel_type').text(data.vessel_type);
                        $('#item-classified').text(data.classified);
                        $('#item-built_year').text(data.built_year);
                        $('#item-transhipment').text(data.transhipment);
                        if (data.transhipment == null) {
                            $("#transhipment").css("display", "none");
                        }
                        $('#item-coverage').text(data.coverage);
                        $('#item-deductibles').text(data.deductibles);
                        if (data.deductibles == null) {
                            $("#deductibles").css("display", "none");
                        }
                        $('#item-total_sum_insured').text(rupiah(data
                            .total_sum_insured));
                        $('#item-rate').text(data.rate !== null ? parseFloat(data.rate).toFixed(
                            3) : null);
                        $('#item-premium_calculation').text(data.premium_calculation);
                        $('#item-premium_payment_warranty').text(data.premium_payment_warranty);
                        if (data.premium_payment_warranty == null) {
                            $("#premium_payment_warranty").css("display", "none");
                        }
                        $('#item-security').text(data.security);
                        if (data.security == null) {
                            $("#security").css("display", "none");
                        }
                        $('#item-travel_permission').text(data.travel_permission);
                        $('#item-license_plate').text(data.license_plate);
                        $('#item-license_plateinter').text(data.license_plateinter);
                        if (data.license_plateinter == null) {
                            $("#license_plateinter").css("display", "none");
                        }
                        $('#item-inter_island').text(data.inter_island);
                        if (data.inter_island == null) {
                            $("#inter_island").css("display", "none");
                        }
                        $('#item-airway_bill').text(data.airway_bill);
                        $('#detailModal').modal('show');
                    },
                    error: function() {
                        alert('Gagal mendapatkan data.');
                    }
                });
            });
        });
    </script>
@endsection
