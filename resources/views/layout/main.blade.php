<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Patlima Store</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        <div class="iq-sidebar  sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="{{ url('/dashboard') }}">
                    <img src="../assets/images/logo.png">
                </a>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard') }}" class="svg-icon">
                                <svg class="svg-icon" id="p-dash1" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                    </path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                                <span class="ml-4">Dashboards</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('product*') ? 'active' : '' }}">
                            <a href="#product" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg class="svg-icon" id="p-dash2" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span class="ml-4">Products</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="product" class="iq-submenu collapse {{ Request::is('product*') ? 'show' : '' }}"
                                data-parent="#iq-sidebar-toggle">
                                <li class="{{ Request::is('product') ? 'active' : '' }}">
                                    <a href="{{ url('/product') }}">
                                        <i class="las la-minus"></i><span>List Product</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('product/add') ? 'active' : '' }}">
                                    <a href="{{ url('/product/add') }}">
                                        <i class="las la-minus"></i><span>Add Product</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('report') ? 'active' : '' }}">
                            <a href="{{ url('/report') }}" class="">
                                <svg class="svg-icon" id="p-dash7" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">Sales Reports</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div id="sidebar-bottom" class="position-relative sidebar-bottom">
                    <div class="card border-none">
                        <div class="card-body p-0">
                            <div class="sidebarbottom-content">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image"><img src="../assets/images/layouts/astronaut.gif" class="img-fluid" alt="side-bkg">
                </div>
                <div class="p-3"></div>
            </div>
        </div>
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a href="{{ url('/dashboard') }}" class="header-logo">
                            <img src="../assets/images/logo.png" class="img-fluid rounded-normal" alt="logo">
                        </a>
                    </div>
                    <div class="iq-search-bar device-search">
                        <form action="#" class="searchbox">
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon dropdown caption-content">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('assets/images/user/1.png') }}" class="img-fluid rounded"
                                            alt="user">
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 text-center">
                                                <div class="media-body profile-detail text-center">
                                                    <img src="../assets/images/page-img/profile-bg.jpg" alt="profile-bg"
                                                        class="rounded-top img-fluid mb-4">
                                                    <img src="../assets/images/user/1.png" alt="profile-img"
                                                        class="rounded profile-img img-fluid avatar-70">
                                                </div>
                                                <div class="p-3">
                                                    <h5 class="mb-1">{{ Auth::user()->email }}</h5>
                                                    <div class="d-flex align-items-center justify-content-center mt-3">
                                                        <a href="{{ route('logout') }}"
                                                            class="btn btn-orange border">Logout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="modal fade" id="new-order" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">New Order</h4>
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Name or Email">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div class="btn btn-outline-primary" data-dismiss="modal">Create</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- loader END -->
        <!-- Wrapper Start -->
        @yield('content')
        <!-- Wrapper End-->
        <footer class="iq-footer">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                                <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                            </ul> -->
                            </div>
                            <div class="col-lg-6 text-right">
                                <span class="mr-1">
                                    <script>document.write(new Date().getFullYear())</script>©
                                </span><a href="{{ url('/dashboard') }}" class="text-secondary">Patlima Store</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <!-- Backend Bundle JavaScript -->
        <script src="../assets/js/backend-bundle.min.js"></script>

        <!-- Table Treeview JavaScript -->
        <script src="../assets/js/table-treeview.js"></script>

        <!-- Chart Custom JavaScript -->
        <script src="../assets/js/customizer.js"></script>

        <!-- Chart Custom JavaScript -->
        <script async src="../assets/js/chart-custom.js"></script>

        <!-- app JavaScript -->
        <script src="../assets/js/app.js"></script>


</body>

</html>
