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
        <h5 class="text-primary">Claim Details</h5>
    </div>
    <div class="row mt-2" style="justify-content: center">
        <div class="card border-primary mb-3">
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Company Name</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->company_name }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Phone Number</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->phone_number }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Company Email</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->company_email }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Insured Address</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->insured_address }} </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Conveyance</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->conveyance }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Goods Type</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->goods_type }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Departure</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">:
                            {{ $data->transaction->order->estimated_time_of_departure }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Estimated Time Of Arrival</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">:
                            {{ $data->transaction->order->estimated_time_of_arrival }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Point of Origin</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->point_of_origin }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Point of Destination</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->point_of_destination }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Sum Insured</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->sum_insured }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Invoice Number</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->invoice_number }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Packing List Number</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->packing_list_number }}
                        </p>
                    </div>
                </div>
                @if ($data->transaction->order->conveyance == 'Sea')
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Bill of Landing Number</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">:
                                {{ $data->transaction->order->bill_of_lading_number }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Ship Name</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->ship_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Vessel Group</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->vessel_group }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Container Load</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->container_load }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Vessel Material</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">:
                                {{ $data->transaction->order->vessel_material }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Vessel Type</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->vessel_type }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Classified</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->classified }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Built Year</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->built_year }}</p>
                        </div>
                    </div>
                @elseif ($data->transaction->order->conveyance == 'Land')
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Travel Permission</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">:
                                {{ $data->transaction->order->travel_permission }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Licence Plate</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->license_plate }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Licence Plat Inter</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">:
                                {{ $data->transaction->order->license_plateinter }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Inter Island</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->inter_island }}
                            </p>
                        </div>
                    </div>
                @elseif ($data->transaction->order->conveyance == 'Air')
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="text-dark" style="font-size:12px"><b>Airway Bill</b></p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->airway_bill }}
                            </p>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Transipment</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->transhipment }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Coverage</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->coverage }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Deductibles</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->deductibles }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Total Sum Insurance</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->total_sum_insured }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Rate</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->rate }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Premium Calculation</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">:
                            {{ $data->transaction->order->premium_calculation }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Premium Payment Warranty</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">:
                            {{ $data->transaction->order->premium_payment_warranty }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Security</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->transaction->order->security }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Chronology</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->chronology }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Date of Loss</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->date_of_loss }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Ammount of Loss</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->amount_of_loss }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Invoice</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">:
                            <a href="{{ $data->invoice }}" class="btn btn-warning" target="_blank"
                                rel="packing_list"><i class="fa fa-download"></i>Download</a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Bill of Landing</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">: {{ $data->bill_of_lading }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Police Investigation Report</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">:
                            <a href="{{ $data->police_investigation_report }}" class="btn btn-warning" target="_blank"
                                rel="packing_list"><i class="fa fa-download"></i>Download</a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Packing List</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">:
                            <a href="{{ $data->packing_list }}" class="btn btn-warning" target="_blank"
                                rel="packing_list"><i class="fa fa-download"></i>Download</a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Photos of Damage Items</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">:
                            @foreach ($data->photos_of_damaged_items as $value)
                                <a href="{{ $value['file_path'] }}" class="btn btn-warning" target="_blank"
                                    rel="photo_of_damage"><i class="fa fa-download"></i>Download</a>
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="text-dark" style="font-size:12px"><b>Photos of Unloading Process</b></p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-dark" style="font-size:12px">:
                            @foreach ($data->photos_of_unloading_process as $value)
                                <a href="{{ $value['file_path'] }}" class="btn btn-warning" target="_blank"
                                    rel="photo_of_damage"><i class="fa fa-download"></i>Download</a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="submit" style="margin-left: 10%">
        <div class="row mt-2">
            <div class="col-sm-12 mb-3">
                <a href="{{ route('claim.submitted') }}" class="btn btn-primary" id="submit"
                    style="width: 90%">Close</a>
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
@endsection
