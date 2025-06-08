<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('assets/img/brand/logo-hitam.png') }}" alt="Logo" class="navbar-brand-img"
                    style="height: 40px; margin-right: 10px;">
                <span
                    style="font-family: 'poppins', sans-serif; font-size: 20px; font-weight: bold; color: black; letter-spacing: 1px; text-shadow: 1px 1px 2px rgba(0,0,0,0.4);">
                    KafeKotaKita
                </span>
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="ni ni-shop text-blue"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                </ul>
                <hr class="my-1">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Data Master</span>
                    <span class="docs-mini">D</span>
                </h6>
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-forms">
                            <i class="ni ni-single-copy-04 text-pink"></i>
                            <span class="nav-link-text">Manajemen Kafe</span>
                        </a>
                        <div class="collapse" id="navbar-forms">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('kafe.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"></span>
                                        <span class="sidenav-normal"> Kafe </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('fasilitas.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"></span>
                                        <span class="sidenav-normal"> Fasilitas </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('genre.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"></span>
                                        <span class="sidenav-normal"> Genre </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-tables">
                            <i class="fas fa-hamburger" aria-hidden="true"></i>
                            <span class="nav-link-text">Manajemen Menu</span>
                        </a>
                        <div class="collapse" id="navbar-tables">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('menu.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> Menu </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('kategori.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> Kategori </span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#reportMenu" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="reportMenu">
                            <i class="ni ni-chart-pie-35" aria-hidden="true"></i>
                            <span class="nav-link-text">Manajemen Laporan</span>
                        </a>
                        <div class="collapse" id="reportMenu">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('report.bookmark') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> Bookmark </span>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ route('kategori.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> Pengunjung </span>
                                    </a>
                                </li> --}}

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery.index') }}">
                            <i class="fas fa-project-diagram"></i>
                            <span class="nav-link-text">Galeri</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.owner') }}">
                            <i class="fas fa-person-booth"></i>
                            <span class="nav-link-text">Owner Kafe</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="fas fa-user"></i>
                            <span class="nav-link-text">Users</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</nav>
<div class="main-content" id="panel">
