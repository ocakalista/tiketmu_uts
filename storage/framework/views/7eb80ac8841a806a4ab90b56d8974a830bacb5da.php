<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>tiketmu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Platform penjualan tiket konser online dengan sistem cepat dan aman.">
    <meta name="keywords" content="tiket konser, beli tiket online, event musik, konser Indonesia">

    <!-- Favicon -->
    <link href="<?php echo e(asset('img/favicon.ico')); ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>

<body>
    
    <?php echo $__env->make('partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Header -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Invoice Tiket</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo e(url('/')); ?>">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Invoice</p>
            </div>
        </div>
    </div>

    <!-- Invoice Detail -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-light p-5 rounded">
                <h3 class="mb-4 text-secondary">Invoice Detail</h3>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Invoice Number:</strong> <?php echo e($invoice_number); ?></p>
                        <p><strong>Tanggal & Waktu Pembelian:</strong> <?php echo e($purchase_datetime); ?></p>
                        <p><strong>Nama Event:</strong> <?php echo e($event_name); ?></p>
                        <p><strong>Seat / Area:</strong> <?php echo e($seat_info); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Lokasi Event:</strong> <?php echo e($event_location); ?></p>
                        <p><strong>Tanggal & Waktu Event:</strong> <?php echo e($event_datetime); ?></p>
                        <p><strong>Penyelenggara:</strong> <?php echo e($organizer); ?></p>
                        <p><strong>Harga yang harus dibayar:</strong> <span class="text-primary">Rp <?php echo e(number_format($amount_due, 0, ',', '.')); ?></span></p>
                    </div>
                </div>
                <hr>
                <div class="text-right">
                    <a href="#" class="btn btn-secondary px-4 py-2">Download PDF</a>
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-primary px-4 py-2">Kembali ke Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('lib/easing/easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/waypoints/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/counterup/counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/owlcarousel/owl.carousel.min.js')); ?>"></script>

    <!-- Template Javascript -->
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
</body>

</html><?php /**PATH /Users/macbookpro/Documents/Pemrograman/php/pemrog-web/tiketmu_uts/resources/views/invoice.blade.php ENDPATH**/ ?>