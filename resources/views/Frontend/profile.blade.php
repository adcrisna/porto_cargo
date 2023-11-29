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
            width: 20%;
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
    </style>
@endsection
@section('content')
    <form action="{{ route('auth.updateProfile') }}" method="POST" style="margin-top: 60px">
        @csrf
        <div id="profileUser">
            <div class="row mt-2" style="justify-content: center">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-white">
                        <h5 class="text-primary mt-2">Profile</h5>
                    </div>
                    <div class="card-body text-primary">
                        <input type="hidden" class="form-control" name="id" id="id" value="{{ $profile->id }}"
                            required>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Name Type</label>
                                <select class="form-select" name="nametype" id="nameType" style="background-color: #ffffff"
                                    required>
                                    <option selected>-Selected-</option>
                                    <option value="PT" @selected($profile->type == 'PT')>PT</option>
                                    <option value="Individu" @selected($profile->type == 'Individu')>Individu</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $profile->name }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ $profile->email }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label style="color: rgb(126, 124, 124)">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number" id="phone_number"
                                    value="{{ $profile->phone_number }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label style="color: rgb(126, 124, 124)">New Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="update">
            <div class="row" style="justify-content: center">
                <button type="submit" class="btn btn-primary" id="calculate" style="width: 80%">UPDATE</button>
            </div>
        </div>
    </form>

    <br>
    <br>
@endsection

@section('javascript')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
@endsection
