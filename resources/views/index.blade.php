<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>tiketmu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Platform penjualan tiket konser online dengan sistem cepat dan aman.">
    <meta name="keywords" content="tiket konser, beli tiket online, event musik, konser Indonesia">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.icon') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Vite -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Topbar Start --}}
    @include('partials.topbar')

    {{-- Navbar Start --}}
    @include('partials.navbar')


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white mt-4 mb-4">TIKETMU</h1>
            <h1 class="text-white display-1 mb-5"></h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Category</button>
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


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('img/about.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">About Us</h6>
                        <h1 class="display-4">Tiketmu</h1>
                    </div>
                    <p>Tempor erat elitr at rebum at at clita aliquyam consetetur...</p>
                    <!-- Counter boxes -->
                    <div class="row pt-3 mx-0">
                        @foreach ([['success','1234','Music'],['primary','123','Teater'],['secondary','123','Seminar'],['warning','1234','Pameran']] as [$bg,$num,$label])
                        <div class="col-3 px-0">
                            <div class="bg-{{ $bg }} text-center p-4">
                                <h1 class="text-white" data-toggle="counter-up">{{ $num }}</h1>
                                <h6 class="text-uppercase text-white">Event<span class="d-block">{{ $label }}</span></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


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
    <!-- Feature Start -->


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

    <!-- Team Start -->
    <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="section-title text-center position-relative mb-5">
            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Events</h6>
            <h1 class="display-4">See more our events</h1>
        </div>
        <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
            <div class="team-item">
                <img class="img-fluid w-100" src="{{ asset('img/wijaya.webp') }}" alt="">
                <div class="bg-light text-center p-4">
                    <h5 class="mb-3">Wijaya</h5>
                    <p class="mb-2">Concert</p>
                    <div class="d-flex justify-content-center">
                        <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-item">
                <img class="img-fluid w-100" src="{{ asset('img/wijaya.webp') }}" alt="">
                <div class="bg-light text-center p-4">
                    <h5 class="mb-3">Wijaya</h5>
                    <p class="mb-2">Concert</p>
                    <div class="d-flex justify-content-center">
                        <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-item">
                <img class="img-fluid w-100" src="{{ asset('img/wijaya.webp') }}" alt="">
                <div class="bg-light text-center p-4">
                    <h5 class="mb-3">Wijaya</h5>
                    <p class="mb-2">Concert</p>
                    <div class="d-flex justify-content-center">
                        <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-item">
                <img class="img-fluid w-100" src="{{ asset('img/wijaya.webp') }}" alt="">
                <div class="bg-light text-center p-4">
                    <h5 class="mb-3">Wijaya</h5>
                    <p class="mb-2">Concert</p>
                    <div class="d-flex justify-content-center">
                        <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Testimonial</h6>
                    <h1 class="display-4">What Say Our Client</h1>
                </div>
                <p class="m-0">Dolor est dolores et nonumy sit labore dolores est sed rebum amet, justo duo ipsum sanctus dolore magna rebum sit et. Diam lorem ea sea at. Nonumy et at at sed justo est nonumy tempor. Vero sea ea eirmod, elitr ea amet diam ipsum at amet. Erat sed stet eos ipsum diam</p>
            </div>
            <div class="col-lg-7">
                <div class="owl-carousel testimonial-carousel">
                    <div class="bg-light p-5">
                        <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                        <p>Sed et elitr ipsum labore dolor diam, ipsum duo vero sed sit est est ipsum eos clita est ipsum. Est nonumy tempor at kasd. Sed at dolor duo ut dolor, et justo erat dolor magna sed stet amet elitr duo lorem</p>
                        <div class="d-flex flex-shrink-0 align-items-center mt-4">
                            <img class="img-fluid mr-4" src="{{ asset('img/testimonial.jpg') }}" alt="">
                            <div>
                                <h5>Rosa Kalista</h5>
                                <span>Manage Events</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light p-5">
                        <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                        <p>Sed et elitr ipsum labore dolor diam, ipsum duo vero sed sit est est ipsum eos clita est ipsum. Est nonumy tempor at kasd. Sed at dolor duo ut dolor, et justo erat dolor magna sed stet amet elitr duo lorem</p>
                        <div class="d-flex flex-shrink-0 align-items-center mt-4">
                            <img class="img-fluid mr-4" src="{{ asset('img/testimonial.jpg') }}" alt="">
                            <div>
                                <h5>Rita Rahmawati</h5>
                                <span>Pameran</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Testimonial Start -->


    <!-- Contact Start -->
   <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Info Kontak -->
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                    <div class="d-flex align-items-center mb-5">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Our Location</h4>
                            <p class="m-0">Universitas AMIKOM Yogyakarta</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-5">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-phone-alt text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Call Us</h4>
                            <p class="m-0">08123456789</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-envelope text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Email Us</h4>
                            <p class="m-0">info@tiketmu.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Kontak -->
            <div class="col-lg-7">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Need Help?</h6>
                    <h1 class="display-4">Send Us A Message</h1>
                </div>
                <div class="contact-form">
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Name" required>
                            </div>
                            <div class="col-6 form-group">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" rows="5" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Message" required>{{ old('message') }}</textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Contact End -->


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