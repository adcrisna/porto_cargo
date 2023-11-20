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
        <h5 class="text-primary">Report</h5>
    </div>
    <div class="row mt-2" style="justify-content: center">
        <div class="card border-primary mb-3">
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-sm-6">
                        <select name="selectReport" class="form-select" id="selectReport" style="width: 30%">
                            <option value="Shipment">Shipment</option>
                            <option value="Payment">Payment</option>
                            <option value="Claim">Claim</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" id="btnModalShipment" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalReportShipment" style="float: right">
                            Download Report
                        </button>
                        <button type="button" id="btnModalPayment" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalReportPayment" style="float: right; display: none">
                            Download Report
                        </button>
                        <button type="button" id="btnModalClaim" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalReportClaim" style="float: right; display: none">
                            Download Report
                        </button>
                    </div>
                </div>
                <br>
                <div id="reportShipment">
                    <table id="shipmentTable" class="table table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-primary">ID</th>
                                <th class="text-primary">Insured Name</th>
                                <th class="text-primary">Point of Origin</th>
                                <th class="text-primary">Point of Destination</th>
                                <th class="text-primary">Policy Periode</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class=" text-center">{{ @$item->id }}</td>
                                    <td class=" text-center">{{ @$item->company_name }}</td>
                                    <td class=" text-center">{{ @$item->point_of_origin }}</td>
                                    <td class=" text-center">{{ @$item->point_of_destination }}</td>
                                    <td class=" text-center">
                                        @if ($item->transaction)
                                            {{ date('Y-m-d', strtotime($item->transaction->start_policy_date)) }}
                                            - {{ date('Y-m-d', strtotime($item->transaction->end_policy_date)) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="reportPayment" style="display: none">
                    <table id="paymentTable" class="table table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-primary">ID</th>
                                <th class="text-primary">Insured Name</th>
                                <th class="text-primary">Departure Address</th>
                                <th class="text-primary">Destination Address</th>
                                <th class="text-primary">Payment Status</th>
                                <th class="text-primary">Premium Ammount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payment as $item)
                                <tr>
                                    <td>{{ $item->transaction->id }}</td>
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
                                            <button class="btn btn-default border-warning text-warning">Expired</button>
                                        @endif

                                    </td>
                                    <td>IDR {{ number_format($item->premium_amount, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="reportClaim" style="display: none">
                    <table id="claimTable" class="table table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-primary">ID</th>
                                <th class="text-primary">Insured Name</th>
                                <th class="text-primary">Departure Address</th>
                                <th class="text-primary">Destination Address</th>
                                <th class="text-primary">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($claim as $item)
                                <tr>
                                    <td>CLM-{{ $item->id }}</td>
                                    <td>{{ $item->transaction->order->company_name }}</td>
                                    <td>{{ $item->transaction->order->point_of_origin }}</td>
                                    <td>{{ $item->transaction->order->point_of_destination }}</td>
                                    <td>{{ $item->claim_status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalReportClaim" tabindex="-1" aria-labelledby="modalReportClaimLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReportClaimLabel">Download Report Claim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('report.claim') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="color: rgb(126, 124, 124)">Start Date</label>
                            <div class="input-group ">
                                <input type="date" class="form-control rounded-input datepicker col-sm-12"
                                    name="startDate" id="startDate" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="color: rgb(126, 124, 124)">End Date</label>
                            <div class="input-group ">
                                <input type="date" class="form-control rounded-input datepicker col-sm-12"
                                    name="endDate" id="endDate" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default border-primary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalReportPayment" tabindex="-1" aria-labelledby="modalReportPaymentLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReportPaymentLabel">Download Report Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('report.payment') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="color: rgb(126, 124, 124)">Start Date</label>
                            <div class="input-group ">
                                <input type="date" class="form-control rounded-input datepicker col-sm-12"
                                    name="startDate" id="startDate" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="color: rgb(126, 124, 124)">End Date</label>
                            <div class="input-group ">
                                <input type="date" class="form-control rounded-input datepicker col-sm-12"
                                    name="endDate" id="endDate" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default border-primary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalReportShipment" tabindex="-1" aria-labelledby="modalReportShipmentLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReportShipmentLabel">Download Report Shipment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('report.shipment') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="color: rgb(126, 124, 124)">Start Date</label>
                            <div class="input-group ">
                                <input type="date" class="form-control rounded-input datepicker col-sm-12"
                                    name="startDate" id="startDate" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="color: rgb(126, 124, 124)">End Date</label>
                            <div class="input-group ">
                                <input type="date" class="form-control rounded-input datepicker col-sm-12"
                                    name="endDate" id="endDate" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default border-primary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Download</button>
                    </div>
                </form>
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
        new DataTable('#shipmentTable', {
            responsive: true
        });
        new DataTable('#claimTable', {
            responsive: true
        });
        new DataTable('#paymentTable', {
            responsive: true
        });
    </script>
    <script>
        $("#selectReport").change(function() {
            var selectedOption = $(this).val();
            if (selectedOption === "Shipment") {
                document.querySelector('#btnModalShipment').style.display = 'block';
                document.querySelector('#reportShipment').style.display = 'block';
                document.querySelector('#btnModalPayment').style.display = 'none';
                document.querySelector('#reportPayment').style.display = 'none';
                document.querySelector('#btnModalClaim').style.display = 'none';
                document.querySelector('#reportClaim').style.display = 'none';
            } else if (selectedOption === "Payment") {
                document.querySelector('#btnModalShipment').style.display = 'none';
                document.querySelector('#reportShipment').style.display = 'none';
                document.querySelector('#btnModalPayment').style.display = 'block';
                document.querySelector('#reportPayment').style.display = 'block';
                document.querySelector('#btnModalClaim').style.display = 'none';
                document.querySelector('#reportClaim').style.display = 'none';
            } else if (selectedOption === "Claim") {
                document.querySelector('#btnModalShipment').style.display = 'none';
                document.querySelector('#reportShipment').style.display = 'none';
                document.querySelector('#btnModalPayment').style.display = 'none';
                document.querySelector('#reportPayment').style.display = 'none';
                document.querySelector('#btnModalClaim').style.display = 'block';
                document.querySelector('#reportClaim').style.display = 'block';
            }
        });
    </script>
@endsection
