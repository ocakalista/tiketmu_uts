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

    <!-- Google Web Fonts -->
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

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Concert Detail</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/') }}">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Concert Detail</p>
            </div>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button" data-toggle="dropdown">Category</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Musik</a>
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
    <!-- Header End -->

    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <!-- KONTEN UTAMA -->
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Concert Detail</h6>
                            <h1 class="display-4">CRSL Land Festival</h1>
                        </div>
                        <img class="img-fluid rounded w-100 mb-4" src="{{ asset('img/crsl.jpg') }}" alt="Image">
                        <p>Tempor erat elitr at rebum at at clita aliquyam consetetur...</p>
                        <p>Sadipscing labore amet rebum est et justo gubergren...</p>
                    </div>

                    <h2 class="mb-3">Related Events</h2>
                    <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                        @foreach([1,2,3] as $item)
                            <a class="concert-list-item position-relative d-block overflow-hidden mb-2" href="{{ url('/detail') }}">
                                <img class="img-fluid" src="{{ asset('img/crsl.jpg') }}" alt="">
                                <div class="concert-text">
                                    <h4 class="text-center text-white px-3">CRSL Land Festival</h4>
                                    <div class="border-top w-100 mt-3">
                                        <div class="d-flex justify-content-between p-4">
                                            <span class="text-white"><i class="fa fa-user mr-2"></i>CRSL</span>
                                            <span class="text-white"><i class="fa fa-star mr-2"></i>4.5 <small>(250)</small></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Concert Features -->
                    <div class="bg-primary mb-5 py-3">
                        <h3 class="text-white py-3 px-4 m-0">Concert Features</h3>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Date</h6>
                            <h6 class="text-white my-3">27-28 Sept 2025</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Time</h6>
                            <h6 class="text-white my-3">15.00 WIB <small>(selesai)</small></h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Location</h6>
                            <h6 class="text-white my-3">Lap. Kenari Jogja</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Organizers</h6>
                            <h6 class="text-white my-3">CRSL</h6>
                        </div>
                        <h5 class="text-white py-3 px-4 m-0">Event Price: Rp130.000,-</h5>
                        <div class="py-3 px-4">
                            <a class="btn btn-block btn-secondary py-3 px-5" href="#">Enroll Now</a>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="mb-5">
                        <h2 class="mb-3">Categories</h2>
                        <ul class="list-group list-group-flush">
                            @foreach(['Music' => 1234, 'Teater' => 123, 'Seminar' => 123, 'Pameran' => 1234, 'Olahraga' => 1234] as $category => $count)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <a href="#" class="text-decoration-none h6 m-0">{{ $category }}</a>
                                    <span class="badge badge-primary badge-pill">{{ $count }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Recent Events -->
                    <div class="mb-5">
                        <h2 class="mb-4">Recent Events</h2>
                        @foreach(range(1, 4) as $i)
                            <a class="d-flex align-items-center text-decoration-none mb-4" href="{{ url('/detail') }}">
                                <img class="img-fluid rounded" src="{{ asset('img/courses-80x80.jpg') }}" alt="">
                                <div class="pl-3">
                                    <h6>CRSL Land Festival</h6>
                                    <div class="d-flex">
                                        <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i>CRSL</small>
                                        <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5 (250)</small>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

    <!-- Feature Start -->
    <div class="container-fluid bg-image" style="margin: 90px 0;">
        <div class="container">
            <div class="row">
                <!-- KONTEN DESKRIPSI -->
                <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Why Choose Us?</h6>
                        <h1 class="display-4">Why You Should Choose Us?</h1>
                    </div>
                    <p class="mb-4 pb-2">
                        Aliquyam accusam clita nonumy ipsum sit sea clita ipsum clita, ipsum dolores amet voluptua duo dolores et sit ipsum rebum,
                        sadipscing et erat eirmod diam kasd labore clita est. Diam sanctus gubergren sit rebum clita amet.
                    </p>

                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-rocket text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Fast & Easy Booking</h4>
                            <p>
                                Labore rebum duo est Sit dolore eos sit tempor eos stet, vero vero clita magna kasd no nonumy et eos dolor magna ipsum.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-lock text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Secure Payments</h4>
                            <p>
                                Labore rebum duo est Sit dolore eos sit tempor eos stet, vero vero clita magna kasd no nonumy et eos dolor magna ipsum.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-calendar-alt text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Wide Range of Events</h4>
                            <p class="m-0">
                                Labore rebum duo est Sit dolore eos sit tempor eos stet, vero vero clita magna kasd no nonumy et eos dolor magna ipsum.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- GAMBAR -->
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('img/feature.jpg') }}" style="object-fit: cover;" alt="Feature Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    {{-- Footer Start --}}
    @include('partials.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>