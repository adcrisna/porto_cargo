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
                                        <button class="btn btn-default border-warning text-warning">Expired</button>
                                    @endif

                                </td>
                                <td>{{ number_format($item->premium_amount, 0, ',', '.') }}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-default border-primary mt-1" style="width: 90px"
                                        data-bs-toggle="modal" data-bs-target="#detailModal">Details</a>
                                    @if (Auth::user()->account_type == 'retail')
                                        <a href="" class="btn btn-sm btn-primary mt-1" style="width: 90px">Pay</a>
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
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Details</h5>
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
                                        <p class="text-dark" style="font-size:12px">: PT Xyz Terus</p>
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
                                        <p class="text-dark" style="font-size:12px">: xyzterus@gmail.com</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="text-dark" style="font-size:12px"><b>Insured Address</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-dark" style="font-size:12px">: JL. Xyz No.69 </p>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        style="width: 120px">Back</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
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
@endsection
