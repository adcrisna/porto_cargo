@extends('layouts.index')
@section('css')
    <style>
        .newBackground {
            background-image: url('images/cover_cargo.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 580px;
            width: 100%;
        }

        .newBackground::before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .content {
            position: absolute;
            top: 35%;
            left: 20%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 4vw;
            font-weight: bold;
            text-align: center;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .newBackground,
            .content {
                width: 100%;
                left: 50%;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 24px;
            }

            p {
                font-size: 16px;
            }
        }

        .content1 {
            width: 60%;
            margin-top: 50px;
            margin-left: 20%;
            margin-bottom: 50px;
        }

        .content2 {
            width: 80%;
            margin-left: 10%;
            margin-bottom: 50px;
        }

        .cardContent1 {
            width: 60%;
            margin-left: 35%;
            margin-bottom: 10px;
        }

        .cardContent2 {
            width: 60%;
            margin-left: 5%;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {

            .cardContent1,
            .cardContent2 {
                width: 100%;
                margin-left: 0%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="newBackground">
        <div class="col-lg-6 p-5 wow fadeIn content" data-wow-delay="0.1s">
            <br>
            <br>
            <h1 class="display-4 text-white">Cargo Cover</h1>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
