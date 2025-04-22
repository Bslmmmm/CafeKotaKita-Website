
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
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
                <a class="nav-link" href="{{route('admin.dashboard')}}">
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
              <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
                <i class="ni ni-single-copy-04 text-pink"></i>
                <span class="nav-link-text">Manajemen Kafe</span>
              </a>
              <div class="collapse" id="navbar-forms">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{route('kafe.index')}}" class="nav-link">
                      <span class="sidenav-mini-icon"></span>
                      <span class="sidenav-normal"> Kafe </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('fasilitas.index')}}" class="nav-link">
                      <span class="sidenav-mini-icon"></span>
                      <span class="sidenav-normal"> Fasilitas </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('genre.index')}}" class="nav-link">
                      <span class="sidenav-mini-icon"></span>
                      <span class="sidenav-normal"> Genre </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                <i class="fas fa-hamburger" aria-hidden="true"></i>
                <span class="nav-link-text">Manajemen Menu</span>
              </a>
              <div class="collapse" id="navbar-tables">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{route('menu.index')}}" class="nav-link">
                      <span class="sidenav-mini-icon">  </span>
                      <span class="sidenav-normal"> Menu </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('kategori.index')}}" class="nav-link">
                      <span class="sidenav-mini-icon"> </span>
                      <span class="sidenav-normal"> Kategori </span>
                    </a>
                  </li>
                 
                </ul>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('gallery.index')}}" >
                  <i class="ni ni-chart-pie-35"></i>
                  <span class="nav-link-text">Galeri</span>
                </a>
              </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                <i class="ni ni-map-big text-primary"></i>
                <span class="nav-link-text">Maps</span>
              </a>
              <div class="collapse" id="navbar-maps">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="../../pages/maps/google.html" class="nav-link">
                      <span class="sidenav-mini-icon"> G </span>
                      <span class="sidenav-normal"> Google </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/maps/vector.html" class="nav-link">
                      <span class="sidenav-mini-icon"> V </span>
                      <span class="sidenav-normal"> Vector </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li> --}}
            {{-- <li class="nav-item">
              <a class="nav-link" href="../../pages/widgets.html">
                <i class="ni ni-archive-2 text-green"></i>
                <span class="nav-link-text">Widgets</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/charts.html">
                <i class="ni ni-chart-pie-35 text-info"></i>
                <span class="nav-link-text">Charts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/calendar.html">
                <i class="ni ni-calendar-grid-58 text-red"></i>
                <span class="nav-link-text">Calendar</span>
              </a>
            </li> --}}
          </ul>
          {{-- <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
            <span class="docs-mini">D</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard-pro/docs/getting-started/overview.html" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Getting started</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard-pro/docs/foundation/colors.html" target="_blank">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Foundation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard-pro/docs/components/alerts.html" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Components</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard-pro/docs/plugins/charts.html" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Plugins</span>
              </a>
            </li>
          </ul> --}}
        </div>
      </div>
    </div>
  </nav>
  <div class="main-content" id="panel">
