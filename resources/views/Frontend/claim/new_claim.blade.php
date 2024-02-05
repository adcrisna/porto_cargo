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
        <h5 class="text-primary">New Claim</h5>
    </div>
    <div class="row mt-2" style="justify-content: center">
        <div class="card border-primary mb-3">
            <div class="card-body text-primary">
                <table id="example" class="table table-striped table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-primary">Policy Summary Number</th>
                            <th class="text-primary">Insured Name</th>
                            <th class="text-primary">Departure Address</th>
                            <th class="text-primary">Destination Address</th>
                            <th class="text-primary">Policy Periode</th>
                            <th class="text-primary">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->transaction->policy_number }}</td>
                                <td>{{ $item->company_name }}</td>
                                <td>{{ $item->point_of_origin }}</td>
                                <td>{{ $item->point_of_destination }}</td>
                                <td>
                                    @if ($item->transaction)
                                        {{ date('Y-m-d', strtotime($item->transaction->start_policy_date)) }}
                                        - {{ date('Y-m-d', strtotime($item->transaction->end_policy_date)) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('claim.form', $item->id) }}" class="btn btn-sm btn-primary"
                                        style="width: 90px">Claim</a>
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
        new DataTable('#example', {
            responsive: true
        });
    </script>
@endsection
