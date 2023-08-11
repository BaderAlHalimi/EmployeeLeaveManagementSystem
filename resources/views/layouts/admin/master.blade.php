<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Leave Management System</title>
    <link rel="stylesheet" href="{{ asset("assets") }}/css/bootstrap.css">//127.0.0.1:8000/assets/css/bootstrap.css
    <script defer src="{{ asset("assets") }}/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="{{ asset("assets") }}/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="{{ asset("assets") }}/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset("assets") }}/css/app.css">
    <style type="text/css">
        .notif:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div id="app">
        @include('layouts.admin.sidebar')
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i><span class="badge bg-info">2</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="row mb-2">
                                            <div class="col-md-12 notif">
                                                <a href="leave_details.html">
                                                    <h6 class='text-bold'>John Doe</h6>
                                                    <p class='text-xs'>
                                                        applied for leave at 05-21-2021
                                                    </p>
                                                </a>
                                            </div>
                                            <div class="col-md-12 notif">
                                                <a href="leave_details.html">
                                                    <h6 class='text-bold'>Jane Doe</h6>
                                                    <p class='text-xs'>
                                                        applied for leave at 05-21-2021
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="{{ asset("assets") }}/images/admin.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item"><i data-feather="log-out"></i>
                                        Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
    <script src="{{ asset("assets") }}/js/feather-icons/feather.min.js"></script>
    <script src="{{ asset("assets") }}/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset("assets") }}/js/app.js"></script>
    <script src="{{ asset("assets") }}/vendors/chartjs/Chart.min.js"></script>
    <script src="{{ asset("assets") }}/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset("assets") }}/js/pages/dashboard.js"></script>
    <script src="{{ asset("assets") }}/js/main.js"></script>
</body>

</html>
