<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>tiketmu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Platform penjualan tiket konser online dengan sistem cepat dan aman.">
    <meta name="keywords" content="tiket konser, beli tiket online, event musik, konser Indonesia">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    {{-- Topbar Start --}}
    @include('partials.topbar')

    {{-- Navbar Start --}}
    @include('partials.navbar')

    {{-- Header Start --}}
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Concert</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="index.html">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Concert</p>
            </div>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Category</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Music</a>
                            <a class="dropdown-item" href="#">Teater</a>
                            <a class="dropdown-item" href="#">Seminar</a>
                        </div>
                    </div>
                    <input type="text" class="form-control border-light" style="padding: 30px 25px;" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Concert start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row mx-0 justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center position-relative mb-5">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Events</h6>
                    <h1 class="display-4">Checkout New Releases Of Our Events</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Event 1 -->
            <div class="col-lg-4 col-md-6 pb-4">
                <a class="concert position-relative d-block overflow-hidden mb-2" href="{{ url('event/detail/1') }}">
                    <img class="img-fluid" src="{{ asset('img/crsl.jpg') }}" alt="CRSL Event">
                    <div class="concert-text">
                        <h4 class="text-center text-black px-3">CRSL Land Festival</h4>
                        <div class="border-top w-100 mt-3">
                            <div class="d-flex justify-content-between p-4">
                                <span class="text-black"><i class="fa fa-user mr-2"></i>CRSL</span>
                                <span class="text-black"><i class="fa fa-star mr-2"></i>4.5 <small>(250)</small></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Event 2 -->
            <div class="col-lg-4 col-md-6 pb-4">
                <a class="concert position-relative d-block overflow-hidden mb-2" href="{{ url('event/detail/2') }}">
                    <img class="img-fluid" src="{{ asset('img/crsl.jpg') }}" alt="CRSL Event">
                    <div class="concert-text">
                        <h4 class="text-center text-black px-3">CRSL Land Festival</h4>
                        <div class="border-top w-100 mt-3">
                            <div class="d-flex justify-content-between p-4">
                                <span class="text-black"><i class="fa fa-user mr-2"></i>CRSL</span>
                                <span class="text-black"><i class="fa fa-star mr-2"></i>4.5 <small>(250)</small></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Event 3 -->
            <div class="col-lg-4 col-md-6 pb-4">
                <a class="concert position-relative d-block overflow-hidden mb-2" href="{{ url('event/detail/3') }}">
                    <img class="img-fluid" src="{{ asset('img/crsl.jpg') }}" alt="CRSL Event">
                    <div class="concert-text">
                        <h4 class="text-center text-black px-3">CRSL Land Festival</h4>
                        <div class="border-top w-100 mt-3">
                            <div class="d-flex justify-content-between p-4">
                                <span class="text-black"><i class="fa fa-user mr-2"></i>CRSL</span>
                                <span class="text-black"><i class="fa fa-star mr-2"></i>4.5 <small>(250)</small></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Pagination -->
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-lg justify-content-center mb-0">
                        <li class="page-item disabled">
                            <a class="page-link rounded-0" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link rounded-0" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Concert end -->

    {{-- Footer Start --}}
    @include('partials.footer')

    {{-- Back to Top --}}
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    {{-- JavaScript Libraries --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    {{-- Main Script --}}
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
