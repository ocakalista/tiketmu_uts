<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        <a href="<?php echo e(url('/')); ?>" class="navbar-brand ml-lg-3">
            <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>TIKETMU</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="<?php echo e(url('/')); ?>" class="nav-item nav-link <?php echo e(Request::is('/') ? 'active' : ''); ?>">Home</a>
                <a href="<?php echo e(url('about')); ?>" class="nav-item nav-link <?php echo e(Request::is('about') ? 'active' : ''); ?>">About</a>
                <a href="<?php echo e(url('concert')); ?>" class="nav-item nav-link <?php echo e(Request::is('concert') ? 'active' : ''); ?>">Concert</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="<?php echo e(url('detail')); ?>" class="dropdown-item">Concert Detail</a>
                        <a href="<?php echo e(url('feature')); ?>" class="dropdown-item">Our Features</a>
                        <a href="<?php echo e(url('team')); ?>" class="dropdown-item">Instructors</a>
                        <a href="<?php echo e(url('testimonial')); ?>" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <a href="<?php echo e(url('contact')); ?>" class="nav-item nav-link <?php echo e(Request::is('contact') ? 'active' : ''); ?>">Contact</a>
            </div>
            <a href="<?php echo e(url('login')); ?>" class="btn btn-primary py-2 px-4 d-none d-lg-block">Join Us</a>
        </div>
    </nav>
</div>
<?php /**PATH /Users/macbookpro/Documents/Pemrograman/php/pemrog-web/tiketmu_uts/resources/views/partials/navbar.blade.php ENDPATH**/ ?>