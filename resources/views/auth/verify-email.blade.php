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
            top: 120px;
            left: 32%;
            transform: translate(-50%, -50%);
            text-align: left;
            color: rgb(46, 10, 173);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 150px;
        }

        .textQuote {
            position: absolute;
            top: 250px;
            left: 60%;
            transform: translate(-50%, -50%);
            text-align: left;
            color: rgb(46, 10, 173);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 550px;
        }

        @media screen and (max-width: 768px) {
            .textQuote {
                width: 100%;
                left: 50%;
                top: 30%;
            }

            .imageQuote {
                width: 65%;
                left: 50%;
                margin-top: 50%;
                margin-bottom: 15px;
            }
        }

        .btnOk {
            margin-left: 0;
            text-align: center;
            margin-top: 100px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <img src="{{ asset('images/Waiting Verification.png') }}" alt="Gambar Responsif" class="responsive-image imageQuote">
        <div class="textQuote">
            <h2 class="text-primary">Please Verification in your email first.</h2>
        </div>
    </div>
    <div class="btnOk">
        <p class="text-center">
        <form id="resendVerificationForm" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button id="resendVerificationButton" type="submit" class="btn btn-link">Resend Verification Email</button>
        </form>
        <span id="cooldownTimer"></span>
        </p>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

<script>
    $(document).ready(function() {
        $('#resendVerificationForm').submit(function(event) {
            event.preventDefault(); // Prevent form submission
            
            // Disable the button
            $('#resendVerificationButton').prop('disabled', true);
            
            var form = $(this);
            var url = form.attr('action');
            var token = form.find('input[name="_token"]').val();

            var cooldownTime = 30; // Cooldown time in seconds
            var timer = cooldownTime;

            var cooldownInterval = setInterval(function() {
                $('#cooldownTimer').text('Cooldown: ' + timer + ' seconds');
                timer--;

                if (timer < 0) {
                    clearInterval(cooldownInterval);
                    $('#cooldownTimer').text('');
                    // Enable the button after cooldown
                    $('#resendVerificationButton').prop('disabled', false);
                }
            }, 1000); // Update every second

            $.ajax({
                type: 'POST',
                url: url,
                data: {_token: token},
                success: function(response) {
                    // Handle success response
                    // console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    // console.error(xhr.responseText);
                    // Clear the interval and enable the button
                    clearInterval(cooldownInterval);
                    $('#cooldownTimer').text('');
                    $('#resendVerificationButton').prop('disabled', false);
                }
            });
        });
    });
</script>
@endsection
