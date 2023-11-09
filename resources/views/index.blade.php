@extends('layouts.index')
@section('css')
    <style>
        .newBackground {
            background-image: url('images/Background.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 655px;
            width: 100%;
        }

        .content {
            background-color: #3156A5;
            color: white;
            padding: 20px;
            width: 40%;
            height: 85%;
            box-sizing: border-box;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .newBackground,
            .content {
                width: 100%;
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
            <h1 class="display-4 text-white mt-5">Stay Safe <br> Stay Insured</h1>
            <p class="text-white">Fast, Secure, and Convenient Cargo Insurence Solution</p>
            <br>
            <br>
            <a class="btn btn-primary border-white px-4" href="" style="height: 40px">Register</a>
        </div>
    </div>
    <div class="content1">
        <center>
            <h2 class="text-dark">Lorem Ipsum dolor</h2>
            <br>
            <p style="justify-content: center">Lorem ipsum dolor, sit amet
                consectetur adipisicing elit. Vitae, quis? Ullam
                nostrum nihil voluptas optio
                repudiandae, itaque quas earum cumque nemo dignissimos rerum provident placeat. Vero impedit provident
                cumque praesentium. Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, maxime quo quia
                repudiandae repellendus voluptatum consectetur est autem doloremque repellat ipsum fuga quasi praesentium
                corporis aliquid delectus officia perspiciatis voluptatibus.</p>
        </center>
    </div>
    <div class="content2">
        <div class="row">
            <div class="col-sm-6">
                <div class="card cardContent1">
                    <img src="{{ asset('images/cover_cargo.png') }}" class="card-img-top" alt="cargo cover"
                        style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title">Cargo Cover</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, rem? Hic sit
                            nihil quidem illo suscipit dolor explicabo, doloribus dolores id reprehenderit pariatur nesciunt
                            veritatis quasi quae quia temporibus cum! lor</p>
                        <a href="{{ route('cargo') }}" class="text-primary"><u>Read more</u></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card cardContent2">
                    <img src="{{ asset('images/parcel_cover.png') }}" class="card-img-top" alt="cargo cover"
                        style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title">Parcel Cover</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, rem? Hic sit
                            nihil quidem illo suscipit dolor explicabo, doloribus dolores id reprehenderit pariatur nesciunt
                            veritatis quasi quae quia temporibus cum! lor.</p>
                        <a href="{{ route('parcel') }}" class="text-primary"><u>Read more</u></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
