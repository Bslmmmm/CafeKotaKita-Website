<!DOCTYPE html>
<html lang="en">

<head>
    <title>KafeKotaKita</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/logo-merah.png" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">KafeKota<small>Kita</small></a>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button> --}}
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
                    {{-- <li class="nav-item"><a href="menu.html" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="shop.html">Shop</a>
                            <a class="dropdown-item" href="product-single.html">Single Product</a>
                            <a class="dropdown-item" href="room.html">Cart</a>
                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                        </div> --}}
                    </li>
                    {{-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> --}}
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">
                        Login
                    </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Selamat Datang di KafeKotaKita</span>
                        <h1 class="mb-4">Pengalaman Menikmati Kopi Terbaik</h1>
                        <p class="mb-4 mb-md-5">Temukan kafe terbaik di kota Anda dengan mudah dan cepat melalui aplikasi kami.</p>
                        <p>
                            <a href="#download-app" class="btn btn-primary p-3 px-xl-4 py-xl-3">Unduh Aplikasi</a>
                            <a href="#our-menu" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Lihat Menu</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Nikmati Rasa &amp; Suasana yang Menawan</span>
                        <h1 class="mb-4">Kopi Berkualitas & Tempat yang Nyaman</h1>
                        <p class="mb-4 mb-md-5">Aplikasi kami membantu Anda menemukan kafe dengan cepat dan mudah.</p>
                        <p>
                            <a href="#download-app" class="btn btn-primary p-3 px-xl-4 py-xl-3">Unduh Aplikasi</a>
                            <a href="#our-menu" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Lihat Menu</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Kopi Siap Disajikan</span>
                        <h1 class="mb-4">Nikmati Kopi Hangat dan Segar</h1>
                        <p class="mb-4 mb-md-5">Unduh aplikasi kami dan temukan kafe favorit Anda dengan mudah.</p>
                        <p>
                            <a href="#download-app" class="btn btn-primary p-3 px-xl-4 py-xl-3">Unduh Aplikasi</a>
                            <a href="#our-menu" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Lihat Menu</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-about d-md-flex" id="our-menu">
        <div class="one-half img" style="background-image: url(images/about.jpg);"></div>
        <div class="one-half ftco-animate">
            <div class="overlap">
                <div class="heading-section ftco-animate ">
                    <span class="subheading">Temukan</span>
                    <h2 class="mb-4">Kafe Anda</h2>
                </div>
                <div>
                    <p>Kami menawarkan anda untuk memilih kafe sesuai dengan genre, fasilitas, dll. </p>
                </div>
            </div>
        </div>
    </section>

    <!-- The rest of the page remains unchanged -->

    <footer class="ftco-footer ftco-section img">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
                    <div class="container-wrap">
                        <div class="wrap d-md-flex align-items-xl-center justify-content-center">
                            <div class="info text-center">
                                <h2>Unduh Aplikasi Mobile KafeKotaKita</h2>
                                <p>Temukan kafe terbaik di kota Anda dengan mudah melalui aplikasi mobile kami. Dapatkan pengalaman terbaik dalam mencari dan menikmati kopi favorit Anda.</p>
                                <a href="https://play.google.com/store/apps/details?id=com.kafekotakita.app" target="_blank" class="btn btn-success mr-3">Google Play Store</a>
                                <a href="https://apps.apple.com/app/id123456789" target="_blank" class="btn btn-primary">App Store</a>
                            </div>
                            <div class="app-image ml-5">
                                <img src="images/logo-putih.png" alt="KafeKotaKita Mobile App" style="max-width: 120px;">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> KafeKotaKita
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
