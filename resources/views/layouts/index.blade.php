<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Salvus - Cargo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('template/lib/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f1f7f7;
            height: 100%;
            width: 100%;
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
    </style>
    @yield('css')
</head>

<body>
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="{{ asset('images/Logo_Salvus_Cargo.png') }}" alt="Logo">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('quote.index') }}" class="nav-item nav-link">Quote</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                <a href="{{ route('report.index') }}" class="nav-item nav-link">Report</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Claim</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="{{ route('claim.new') }}" class="dropdown-item">New Claim</a>
                        <a href="{{ route('claim.submitted') }}" class="dropdown-item">Submited Claim</a>
                        <a href="{{ route('claim.closed') }}" class="dropdown-item">Closed Claim</a>
                    </div>
                </div>
                <a href="{{ route('payment.index') }}" class="nav-item nav-link">Payment</a>
                <a href="{{ route('shipment.index') }}" class="nav-item nav-link">Shipment</a>
            </div>
            &nbsp;
            <a class="btn btn-default text-primary border-primary px-4" href="{{ route('auth.login') }}"
                style="height: 40px">Login</a>
            &nbsp; &nbsp;
            <a class="btn btn-primary px-4" href="{{ route('auth.register') }}" style="height: 40px">Register</a>
            &nbsp; &nbsp; &nbsp; &nbsp;
        </div>
    </nav>
    <div class="bgContent">
        @yield('content')
    </div>

    <div class="footer wow fadeIn" data-wow-delay="0.1s">
        <img src="{{ asset('images/footer.png') }}" class="responsive-image" alt="footer" style="width: 100%">
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('template/js/main.js') }}"></script>
    @yield('javascript')
</body>

</html>
