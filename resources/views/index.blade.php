<!DOCTYPE html>
<html lang="en">

<head>
    <title>KafeKotaKita</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/logo-hitam.png" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .navbar {
            padding: 15px 0;
            background: #fff !important;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .logo-box {
            background: #000;
            padding: 10px;
            border-radius: 8px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-link {
            font-weight: 500;
            margin: 0 10px;
        }

        .btn-get-started {
            background-color: #000;
            color: #fff;
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: 500;
        }

        .btn-get-started:hover {
            background-color: #222;
            color: #fff;
        }

        .hero-section {
            padding: 100px 0;
        }

        .hero-heading {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .hero-subheading {
            font-weight: 500;
            margin-bottom: 30px;
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: #000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .feature-icon i {
            color: #fff;
            font-size: 2rem;
        }

        .feature-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .app-preview {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 40px;
            text-align: center;
        }

        .how-it-section {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .about-section {
            padding: 80px 0;
        }

        .feature-card {
            margin-top: 30px;
        }

        .feature-list {
            margin-top: 30px;
        }

        .feature-item {
            margin-bottom: 15px;
            font-weight: 500;
        }

        .gallery-section {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .gallery-item {
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .explore-section {
            padding: 80px 0;
        }

        .explore-item {
            margin-bottom: 40px;
        }

        .explore-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
        }

        .download-section {
            padding: 40px 0;
        }

        .store-badge {
            height: 50px;
            margin: 10px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
            background: #000;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .dashboard-img {
            max-width: 250px;
            margin: 0 auto;
            display: block;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="logo-box">
                    <img src="images/logo-hitam.png" alt="" width="60" height="60">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-get-started" href="#">GET STARTED</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h5>KAFE KOTA KITA</h5>
                    <h1 class="hero-heading">Find The Style You Want Here</h1>
                    <a href="#" class="btn btn-get-started">GET STARTED</a>
                </div>
                <div class="col-lg-6">
                    <img src="images/dashboard.png" class="img-fluid app-preview" alt="KafeKotaKita App">
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-section">
        <div class="container">
            <h2 class="section-title">How It Works</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="feature-icon">
                        <i class="fas fa-filter"></i>
                    </div>
                    <h4 class="feature-title">Find with filters</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod</p>
                </div>
                <div class="col-md-4">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h4 class="feature-title">Sharing Experiences</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod facilisis elit ut amet
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h4 class="feature-title">Set Your Reservation</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Looks Section -->
    <section class="about-section">
        <div class="container">
            <h2 class="section-title">How It Looks</h2>
            <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

            <div class="text-center">
                <div id="appCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/page-awal.png" class="dashboard-img" alt="App Dashboard">
                            <h5 class="mt-4">First Page</h5>
                        </div>
                        <div class="carousel-item">
                            <img src="images/dashboard.png" class="dashboard-img" alt="App Dashboard">
                            <h5 class="mt-4">Dashboard</h5>
                        </div>
                        <div class="carousel-item">
                            <img src="images/community-page.png" class="dashboard-img" alt="App Community">
                            <h5 class="mt-4">Community</h5>
                        </div>
                        <div class="carousel-item">
                            <img src="images/saved-page.png" class="dashboard-img" alt="App Dashboard">
                            <h5 class="mt-4">Saved Cafe</h5>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#appCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#appCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="how-it-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2>What is KafeKotaKita?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod facilisis elit ut amet
                        placerat. Id amet molestie libero viverra, neque, aenean enim in sollicitudin. Vitae fermentum
                        vulputate facilisis velit accumsan. Nulla facilisi. Integer nisl accumsan ante. In posuere
                        volutpat, tempus hendrerit magna ut sed pellentesque, consequat pulvinar nibh. Vestibulum
                        gravida sagittis elit, non fringilla felis. Vestibulum gravida sagittis elit, non fringilla
                        felis, vel consequat vel pellentesque eu. Vestibulum gravida sagittis elit, non fringilla felis,
                        vel consequat vel pellentesque eu. Vestibulum magna molestie, elit amet lobortis lorem,
                        vestibulum. Curabitur quespia ncessim nunc qurt adipisum. Nulla ut cursus sem. Cras volutpat
                        congue nunc.</p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="images/page-awal.png" class="img-fluid" alt="KafeKotaKita">
                    {{-- <a href="#" class="btn btn-get-started mt-3">GET STARTED</a> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="images/community-page.png" class="img-fluid" alt="App Screenshots">
                </div>
                <div class="col-lg-6">
                    <h2>Features</h2>
                    <p>Vivamus fermentum magna non facilisis dignissim. Sed a venenatis mi, vel tempus magna. Fusce
                        pharetra, diam in elementum facilisis, urna sem cursus augue.</p>

                    <div class="feature-list">
                        <div class="feature-item">Filters</div>
                        <div class="feature-item">Community</div>
                        <div class="feature-item">Reservations</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <h2 class="section-title">Gallery</h2>

            <div class="carousel slide" id="galleryCarousel" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col">
                                <div class="gallery-item">
                                    <img src="images/Reset Password.png" class="img-fluid" alt="Reset Password">
                                    <div class="p-3 text-center">
                                        <h5>Reset Password</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="gallery-item">
                                    <img src="images/OTP verification.png" class="img-fluid" alt="Verification">
                                    <div class="p-3 text-center">
                                        <h5>Verification</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="gallery-item">
                                    <img src="images/Forgot Password.png" class="img-fluid" alt="Forgot Password">
                                    <div class="p-3 text-center">
                                        <h5>Forgot Password</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="gallery-item">
                                    <img src="images/Sign in.png" class="img-fluid" alt="Create Account">
                                    <div class="p-3 text-center">
                                        <h5>Create Account</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="gallery-item">
                                    <img src="images/Login.png" class="img-fluid" alt="Log In">
                                    <div class="p-3 text-center">
                                        <h5>Log In</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#galleryCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#galleryCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Explore Section -->
    <section class="explore-section">
        <div class="container">
            <h2 class="section-title">Explore Yourself!</h2>

            <div class="row">
                <div class="col-md-3 text-center explore-item">
                    <img src="images/icon-vibes.png" alt="Find Your Vibes" class="explore-icon">
                    <h5>Find Your Vibes</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod facilisis elit ut amet
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="images/dashboard.png" class="img-fluid app-preview" alt="App Mockup">
                </div>
                <div class="col-md-3 text-center explore-item">
                    <img src="images/icon-profile.png" alt="Customize Your Profile" class="explore-icon">
                    <h5>Customize Your Profile</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod facilisis elit ut amet
                    </p>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-3 text-center explore-item">
                    <img src="images/icon-comment.png" alt="Post a Comment" class="explore-icon">
                    <h5>Post a Comment</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod facilisis elit ut amet
                    </p>
                </div>
                <div class="col-md-3 text-center explore-item">
                    <img src="images/icon-reservation.png" alt="Book a Table" class="explore-icon">
                    <h5>Book a Table</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod facilisis elit ut amet
                    </p>
                </div>
                <div class="col-md-3 text-center explore-item">
                    <img src="images/icon-vibes.png" alt="Find Nearest Cafe" class="explore-icon">
                    <h5>Find Nearest Cafe</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod facilisis elit ut amet
                    </p>
                </div>
                <div class="col-md-3 text-center explore-item">
                    <img src="images/icon-reservation.png" alt="mobile jb app" class="explore-icon">
                    <h5>mobile jb app</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod facilisis elit ut amet
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section class="download-section">
        <div class="container text-center">
            <a href="https://play.google.com/store/apps/details?id=com.kafekotakita.app" target="_blank">
                <img src="images/icon-playstore.png" alt="Get it on Google Play" class="store-badge">
            </a>
            <a href="https://apps.apple.com/app/id123456789" target="_blank">
                <img src="images/icon-appstore.png" alt="Download on the App Store" class="store-badge">
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> KafeKotaKita
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
