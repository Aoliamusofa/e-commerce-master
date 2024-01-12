<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" /><!-- create token csrf with ajax -->
    <title>{{ $title ?? 't-shirt' }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/css/vendor.bundle.base.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico" />
    {{-- jquery 3.7.1 --}}
    <script src="{{ asset('assets') }}/js/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- Navbar -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="/dashboard">
                    <h3>
                        <i class="mdi mdi-tshirt-crew menu-icon text-primary"></i>
                        T-SHIRT
                    </h3>
                </a>
                <a class="navbar-brand brand-logo-mini" href="/dashboard">
                    <i class="mdi mdi-tshirt-crew menu-icon text-primary"></i>
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- Sidebars -->
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi  mdi-view-dashboard menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kategori">
                            <span class="menu-title">Kategori produk</span>
                            <i class="mdi mdi-layers menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produk">
                            <span class="menu-title">Produk</span>
                            <i class="mdi mdi-tshirt-crew menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/expedisi">
                            <span class="menu-title">Expedisi</span>
                            <i class="mdi mdi-truck-delivery menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/payment">
                            <span class="menu-title">Pembayaran</span>
                            <i class="mdi mdi-credit-card menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users">
                            <span class="menu-title">Akun</span>
                            <i class="mdi mdi-account menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pesanan">
                            <span class="menu-title">Pesanan</span>
                            <i class="mdi mdi-shopping menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <span class="menu-title">Logout</span>
                            <i class="mdi mdi-logout menu-icon"></i>
                        </a>
                    </li>
                    @elseif (Auth::user()->role == 'pelanggan')
                    <li class="nav-item">
                        <a class="nav-link" href="/home">
                            <span class="menu-title">Produk</span>
                            <i class="mdi mdi-tshirt-crew menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pesanansaya">
                            <span class="menu-title">Pesanan saya</span>
                            <i class="mdi mdi-shopping menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <span class="menu-title">Logout</span>
                            <i class="mdi mdi-logout menu-icon"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>
            {{-- end-sidebar --}}

            <!-- content -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">T-Shirt © By Aolia
                            musofa</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('assets') }}/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets') }}/js/dashboard.js"></script>
    <script src="{{ asset('assets') }}/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>

</html>