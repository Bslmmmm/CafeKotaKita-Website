<!DOCTYPE html>
<html lang="en">

<head>
    <title>KafeKotaKita</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('images/logo-hitam.png') }}" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .navbar {
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background-color: white;
            transition: background-color 0.3s ease;
            /* background: #000;
            color: #fff; */
        }

        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
        }

        .logo-box {
            /* background: #000; */
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

        .feature-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
        }

        .feature-description {
            margin-top: 8px;
            padding: 10px;
            background-color: #f9f9f9;
            border-left: 3px solid #000;
        }

        .stacked-images {
            perspective: 1000px;
            transform-style: preserve-3d;
            margin-bottom: 30px;
        }

        /* Styling untuk setiap gambar dalam tumpukan */
        .stacked-image {
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
        }

        /* Efek bayangan untuk gambar */
        .shadow-lg {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Efek hover untuk gambar bertumpuk */
        .stacked-images:hover .stacked-image:nth-child(1) {
            transform: translateY(-10px) rotate(-3deg);
        }

        .stacked-images:hover .stacked-image:nth-child(2) {
            transform: translateY(-5px) rotate(-1deg);
        }

        .stacked-images:hover .stacked-image:nth-child(3) {
            transform: translateY(0) rotate(1deg);
        }

        Responsivitas untuk layar kecil @media (max-width: 992px) {
            .stacked-images {
                max-width: 400px;
                margin: 0 auto 30px;
            }
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

        .stacked-images-right {
            perspective: 1000px;
            transform-style: preserve-3d;
            margin: 30px auto;
            max-width: 90%;
        }

        /* Styling untuk setiap gambar dalam tumpukan */
        .stacked-image {
            transition: all 0.3s ease;
            overflow: hidden;
        }

        /* Efek bayangan untuk gambar */
        .shadow-lg {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        /* Border radius untuk gambar */
        .rounded-lg {
            border-radius: 15px;
        }

        /* Efek hover untuk gambar bertumpuk */
        .stacked-images-right:hover .stacked-image:nth-child(1) {
            transform: translateY(-5px) translateX(-5px) rotate(-2deg);
        }

        .stacked-images-right:hover .stacked-image:nth-child(2) {
            transform: translateY(-3px) translateX(-3px) rotate(-1deg);
        }

        .stacked-images-right:hover .stacked-image:nth-child(3) {
            transform: translateY(0) rotate(0deg);
        }

        /* Background untuk section */
        .how-it-section {
            background-color: #f8f9fa;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        /* Responsivitas untuk layar kecil */
        @media (max-width: 992px) {
            .stacked-images-right {
                max-width: 350px;
                margin: 40px auto;
            }

            .how-it-section {
                padding: 60px 0;
            }
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
                    {{-- <img src="{{asset("images/logo-hitam.png")}} alt="" width="60" height="60"> --}}
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
                        <a class="nav-link" href="#about">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">
                            {{ Auth::check() ? 'LOGOUT' : 'LOGIN' }}
                        </a>
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
                    <img src="{{ asset('images/dashboard.png') }}" class="img-fluid app-preview" alt="KafeKotaKita App">
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
                    <h4 class="feature-title">Cari Kafe Sesuai Mood</h4>
                    <p>Bingung mau nongkrong di mana? Temukan kafe yang pas dengan suasana hati kamu – dari yang cozy
                        sampai yang estetik, lengkap dengan fasilitas yang kamu butuhkan.</p>
                </div>
                <div class="col-md-4">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h4 class="feature-title">Lihat & Bagikan Review</h4>
                    <p>Lihat ulasan jujur dari pengunjung lain, dan ceritakan pengalamanmu sendiri. Bantu sesama pencari
                        kafe menemukan tempat terbaik!</p>
                </div>
                <div class="col-md-4">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h4 class="feature-title">Langsung Booking Tempat</h4>
                    <p>Suka kafenya? Jangan sampai kehabisan tempat! Langsung lakukan reservasi dari aplikasi dan
                        siap-siap nongkrong tanpa ribet.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- How It Looks Section -->
    <section class="about-section">
        <div class="container">
            <h2 class="section-title">How It Looks</h2>
            <p class="text-center mb-5">
                Intip tampilan elegan dan user-friendly dari KafeKotaKita. Dirancang khusus agar kamu bisa mencari,
                memilih, dan menyimpan kafe favorit dengan mudah dan cepat.
            </p>

            <div class="text-center">
                <div id="appCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/page-awal.png') }}" class="dashboard-img" alt="App Dashboard">
                            <h5 class="mt-4">First Page</h5>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/dashboard.png') }}" class="dashboard-img" alt="App Dashboard">
                            <h5 class="mt-4">Dashboard</h5>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/community-page.png') }}" class="dashboard-img"
                                alt="App Community">
                            <h5 class="mt-4">Community</h5>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/Saved Cafee.png') }}" class="dashboard-img"
                                alt="App Dashboard">
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
    <section class="how-it-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2>What is KafeKotaKita?</h2>
                    <p>
                        <strong>KafeKotaKita</strong> adalah aplikasi pencarian kafe yang membantu kamu menemukan tempat
                        nongkrong terbaik di kota sesuai dengan selera dan kebutuhanmu.
                        Mau cari kafe dengan suasana retro, fasilitas Wi-Fi super cepat, atau tempat yang nyaman untuk
                        kerja? Semua bisa kamu temukan di sini!
                        <br><br>
                        Dengan fitur filter berdasarkan genre, fasilitas, hingga review dari pengguna lain, KafeKotaKita
                        memudahkanmu memilih kafe yang pas tanpa perlu bingung atau buang waktu.
                        Aplikasi ini hadir untuk jadi teman andalanmu saat mencari tempat ngopi, meeting, atau sekadar
                        bersantai.
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="stacked-images-right position-relative">
                        <!-- Image 1 (top) -->
                        <div class="stacked-image" style="position: relative; z-index: 3; width: 95%;">
                            <img src="{{ asset('images/page-awal.png') }}" class="img-fluid shadow-lg rounded-lg"
                                alt="KafeKotaKita App">
                        </div>
                        <!-- Image 2 (middle) -->
                        <div class="stacked-image"
                            style="position: absolute; top: 20px; left: 40px; z-index: 2; width: 90%;">
                            <img src="{{ asset('images/saved-page.png') }}" class="img-fluid shadow-lg rounded-lg"
                                alt="KafeKotaKita App">
                        </div>
                        <!-- Image 3 (bottom) -->
                        <div class="stacked-image"
                            style="position: absolute; top: 40px; left: 70px; z-index: 1; width: 85%;">
                            <img src="{{ asset('images/community-page.png') }}"
                                class="img-fluid shadow-lg rounded-lg" alt="KafeKotaKita App">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Stack of 3 images -->
                    <div class="stacked-images position-relative">
                        <!-- Image 1 (top) -->
                        <div class="stacked-image" style="position: relative; z-index: 3; width: 95%;">
                            <img src="{{ asset('images/community-page.png') }}" class="img-fluid shadow-lg"
                                alt="App Screenshots">
                        </div>
                        <!-- Image 2 (middle) -->
                        <div class="stacked-image"
                            style="position: absolute; top: 20px; left: 40px; z-index: 2; width: 90%;">
                            <img src="{{ asset('images/saved-page.png') }}" class="img-fluid shadow-lg"
                                alt="App Screenshots">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <h2>Features</h2>
                    <p>
                        KafeKotaKita hadir dengan fitur-fitur cerdas untuk membantu kamu menemukan kafe favorit dengan
                        cepat dan mudah.
                        Tak perlu bingung, semua kebutuhanmu ada di sini – cukup satu aplikasi untuk semua!
                    </p>

                    <div class="feature-list">
                        <div class="feature-item" onclick="toggleDetail(this, 'filters')">
                            Filters
                            <div class="feature-description" id="filters" style="display: none;">
                                <p>
                                    Gunakan filter untuk menyesuaikan pencarian berdasarkan genre, fasilitas,
                                    dan suasana yang kamu inginkan.
                                    Temukan kafe yang benar-benar cocok dengan seleramu!
                                </p>
                            </div>
                        </div>

                        <div class="feature-item" onclick="toggleDetail(this, 'community')">
                            Community
                            <div class="feature-description" id="community" style="display: none;">
                                <p>
                                    Terhubung dengan pengguna lain, baca dan bagikan pengalaman nongkrongmu.
                                    Dapatkan rekomendasi jujur langsung dari sesama pecinta kafe.
                                </p>
                            </div>
                        </div>

                        <div class="feature-item" onclick="toggleDetail(this, 'reservations')">
                            Reservations
                            <div class="feature-description" id="reservations" style="display: none;">
                                <p>
                                    Ingin memastikan tempatmu tersedia? Lakukan reservasi langsung dari aplikasi tanpa
                                    perlu repot menelepon atau antre.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section" id="gallery">
        <div class="container">
            <h2 class="section-title">Gallery</h2>

            <div class="carousel slide" id="galleryCarousel" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col">
                                <div class="gallery-item">
                                    <img src="{{ asset('images/Reset Password.png') }}" class="img-fluid"
                                        alt="Reset Password">
                                    <div class="p-3 text-center">
                                        <h5>Reset Password</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="gallery-item">
                                    <img src="{{ asset('images/OTP verification.png') }}" class="img-fluid"
                                        alt="Verification">
                                    <div class="p-3 text-center">
                                        <h5>Verification</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="gallery-item">
                                    <img src="{{ asset('images/Forgot Password.png') }}" class="img-fluid"
                                        alt="Forgot Password">
                                    <div class="p-3 text-center">
                                        <h5>Forgot Password</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="gallery-item">
                                    <img src="{{ asset('images/Sign in.png') }}" class="img-fluid"
                                        alt="Create Account">
                                    <div class="p-3 text-center">
                                        <h5>Create Account</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="gallery-item">
                                    <img src="{{ asset('images/Login.png') }}" class="img-fluid" alt="Log In">
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
                <!-- Kolom Kiri -->
                <div class="col-md-3">
                    <!-- Item 1 Kiri -->
                    <div class="text-center explore-item mb-4">
                        <img src="{{ asset('images/icon-vibes.png') }}" alt="Find Your Vibes" class="explore-icon">
                        <h5>Find Your Vibes</h5>
                        <p>Temukan kafe dengan suasana yang cocok dengan mood kamu — mulai dari yang cozy hingga retro.
                        </p>
                    </div>

                    <!-- Item 2 Kiri -->
                    <div class="text-center explore-item mb-4">
                        <img src="{{ asset('images/icon-comment.png') }}" alt="Post a Comment" class="explore-icon">
                        <h5>Post a Comment</h5>
                        <p>Berbagi ulasan, beri rating, dan bantu pengguna lain menemukan tempat nongkrong terbaik.</p>
                    </div>

                    <!-- Item 3 Kiri -->
                    <div class="text-center explore-item">
                        <img src="{{ asset('images/icon-reservation.png') }}" alt="Book a Table"
                            class="explore-icon">
                        <h5>Book a Table</h5>
                        <p>Ingin tempat aman? Pesan meja secara langsung tanpa harus repot antre atau telepon.</p>
                    </div>
                </div>

                <!-- Kolom Tengah - Dashboard Image -->
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/dashboard.png') }}" class="img-fluid app-preview" alt="App Mockup">
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-3">
                    <!-- Item 1 Kanan -->
                    <div class="text-center explore-item mb-4">
                        <img src="{{ asset('images/icon-profile.png') }}" alt="Customize Your Profile"
                            class="explore-icon">
                        <h5>Customize Your Profile</h5>
                        <p>Atur profilmu, simpan kafe favorit, dan buat daftar kunjungan versimu sendiri.</p>
                    </div>

                    <!-- Item 2 Kanan -->
                    <div class="text-center explore-item mb-4">
                        <img src="{{ asset('images/icon-vibes.png') }}" alt="Find Nearest Cafe"
                            class="explore-icon">
                        <h5>Find Nearest Cafe</h5>
                        <p>Gunakan fitur lokasi untuk mencari kafe terdekat tanpa ribet. Langsung tahu mana yang paling
                            dekat!</p>
                    </div>

                    <!-- Item 3 Kanan -->
                    <div class="text-center explore-item">
                        <img src="{{ asset('images/icon-reservation.png') }}" alt="mobile jb app"
                            class="explore-icon">
                        <h5>Discover Jember Cafes</h5>
                        <p>Jelajahi berbagai kafe unik di Kota Jember yang mungkin belum pernah kamu kunjungi
                            sebelumnya!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section class="download-section">
        <div class="container text-center">
            <a href="https://play.google.com/store/apps/details?id=com.kafekotakita.app" target="_blank">
                <img src="{{ asset('images/icon-playstore.png') }}" alt="Get it on Google Play" class="store-badge">
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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        function toggleDetail(element, id) {
            const detail = element.querySelector(`#${id}`);

            // Toggle tampilan (sembunyikan jika sedang tampil, tampilkan jika tersembunyi)
            if (detail.style.display === 'none') {
                detail.style.display = 'block';
            } else {
                detail.style.display = 'none';
            }
        }
    </script>

</body>

</html>
