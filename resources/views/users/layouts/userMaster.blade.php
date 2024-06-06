<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/feathericon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
    <script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="{{ route('dashboard') }}" class="logo img"><img src="assets/img/logo.png" alt=""></a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
            <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <div class="sidebar-user">
                        <div class="d-flex justify-content-center">
                            <div class="flex-grow-1 ps-2">
                                <a class="sidebar-user-title" href="#">
                                    @auth
                                        {{ auth()->user()->name }}
                                    @else
                                        Guest
                                    @endauth
                                </a>
                                <div class="sidebar-user-subtitle">Penghuni</div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <ul>
                        <li class="active"> <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span></a> </li>
                        <li class="list-divider"></li>
                        <li class="submenu">
                            <a href="{{ route('payment.user') }}">
                                <i class="fas fa-bell"></i>
                                <span> Data Tagihan </span>
                            </a>
                        </li>
                        <br><br><br>
                        <li class="list-divider"></li>
                        <li class="menu-title mt-3"> <span>OTHERS</span> </li>
                        <li> <a href="{{ route('metode-pembayaran-user') }}"><i class="fas fa-dollar-sign"></i>
                                <span>Metode Pembayaran</span></a> </li>
                        <li> <a href="{{ route('aturan-user') }}"><i class="fas fa-suitcase"></i> <span>Aturan
                                    Kost</span></a> </li>
                        <li> <a href="{{ route('logout') }}"><i class="fe fe-logout"></i> <span>Logout</span></a> </li>
                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <script src="{{ URL::to('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/moment.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/script.js') }}"></script>
    <script src="{{ URL::to('assets/js/moment.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/datatables/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            console.log("Initializing DataTable");
            $('.datatable').DataTable();
        });

        document.addEventListener('DOMContentLoaded', function() {
            console.log("DOM fully loaded and parsed");
            document.querySelectorAll('a').forEach(function(anchor) {
                anchor.addEventListener('click', function(event) {
                    event.preventDefault();
                    window.location.href = event.currentTarget.href;
                });
            });
        });
    </script>

    @yield('script')
</body>

</html>
