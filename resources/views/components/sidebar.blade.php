<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0">
            <img src="{{ asset('assets/img/logo-kabupaten.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Dashboard RAD-PG</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
             <a class="nav-link {{ Request::routeIs('strategi') ? 'active' : '' }}" href="{{ route('strategi') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Strategi</span>
            </a>
        </li>
        <li class="nav-item">
             <a class="nav-link {{ Request::routeIs('rencanaAksi') ? 'active' : '' }}" href="{{ route('rencanaAksi') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Rencana Aksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('rencanakerja') ? 'active' : '' }}" href="{{ route('rencanakerja') }}"> <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Rencana Kerja</span>
            </a>
        </li>
        <li class="nav-item">
             <a class="nav-link {{ Request::routeIs('monev') ? 'active' : '' }}" href="{{ route('monev') }}"> <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-archive-2 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Monev</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('progres') ? 'active' : '' }}" href="{{ route('progres') }}"> <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-image text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Progres Kegiatan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('pengguna') ? 'active' : '' }}" href="{{ route('pengguna') }}"> <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Pengguna</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('opd') ? 'active' : '' }}" href="{{ route('opd') }}"> <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Opd</span>
            </a>
        </li>
        <li class="nav-item mt-10">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}"> <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('password.change') ? 'active' : '' }}" href="#"> <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-key-25 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Ganti Password</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#"> <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-button-power text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Logout</span>
            </a>
        </li>
    </ul>

</aside>
