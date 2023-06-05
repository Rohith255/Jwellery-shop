<?php
use Illuminate\Support\Carbon;

$currentHour = Carbon::now('Asia/kolkata')->hour;

if ($currentHour >= 5 && $currentHour < 12) {
    $msg = 'Good Morning';
} elseif ($currentHour >= 12 && $currentHour < 18) {
    $msg = 'Good Afternoon';
} else {
    $msg = 'Good Evening';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <!-- plugins:css -->
    {{--    <link rel="stylesheet" href="{{asset('star/vendors/feather/feather.css')}}">--}}
    <link rel="stylesheet" href="{{asset('star/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('star/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('star/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('star/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('star/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('star/js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('star/css/vertical-layout-light/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- endinject -->
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row shadow">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div>
                <a class="navbar-brand brand-logo" href="#">
                    <img src="{{asset('star/images/logo-mini.svg')}}" alt="logo"/>
                    Admin
                </a>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">{{$msg}}, <span class="text-black fw-bold">{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</span></h1>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="{{asset('star/images/faces/face8.jpg')}}"
                             alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

                        <form method="post" action="{{route('admin.logout')}}" class="h-50">
                            @csrf
                            <input type="submit" class="form-control h-100 mt-2 bg-white border-0" value="Admin logout">
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>

        <ul id="search-result" class="container w-50" style="margin-top: 120px;display:none;"></ul>
    </nav>
</div>

<div class="d-flex w-100" style="height: 100vh">
    @include('layouts.sidebar')
    <div class="w-100" style="padding-top: 7.4%">
        @yield('content')
    </div>
</div>
<!-- plugins:js -->
<script src="{{asset('star/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('star/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('star/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('star/vendors/progressbar.js/progressbar.min.js')}}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('star/js/off-canvas.js')}}"></script>
<script src="{{asset('star/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('star/js/template.js')}}"></script>
<script src="{{asset('star/js/settings.js')}}"></script>
<script src="{{asset('star/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('star/js/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="{{asset('star/js/dashboard.js')}}"></script>
<script src="{{asset('star/js/Chart.roundedBarCharts.js')}}"></script>
<!-- End custom js for this page-->
</body>

</html>
