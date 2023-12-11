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
        <h5 class="text-primary">Shipment</h5>
    </div>
    <div class="row mt-2" style="justify-content: center">
        <div class="card border-primary mb-3">
            <div class="card-body text-primary">
                <table id="shipment" class="table table-striped table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-primary text-center">Policy Summary Number</th>
                            <th class="text-primary text-center">Insured Name</th>
                            <th class="text-primary text-center">Point of Origin</th>
                            <th class="text-primary text-center">Point of Destination</th>
                            <th class="text-primary text-center">Policy Periode</th>
                            <th class="text-primary text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class=" text-center">{{ @$item->transaction->policy_number }}</td>
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
                                <td class="">
                                    <div class="row">
                                        {{-- <div class="col-sm-6">
                                            <a href="{{ @$item->transaction->doc_premium ?? null }}"><span class="badge bg-primary "><i
                                                        class="fa fa-download p-1"></i>Premium Note</span></a>
                                        </div> --}}
                                        <div class="col-sm-6">
                                            <a href="{{ @$item->transaction->doc_policy ?? null }}">
                                                <span class="badge bg-white text-primary"
                                                    style="border: 1px solid #007BFF;">
                                                    <i class="fa fa-download p-1"></i>Policy Summary
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
        new DataTable('#shipment', {
            responsive: true,
            lengthMenu: [5, 10, 25, 50],
        });
    </script>
@endsection
