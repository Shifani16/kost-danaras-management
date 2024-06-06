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
    <link href="css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

    
    @yield('head')
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="{{ route('dashboard') }}" class="logo img"><img src={{ URL::to('assets/img/logo.png') }} alt=""></a>
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
                                <div class="sidebar-user-title">
                                    @auth
                                        {{ auth()->user()->name }}
                                    @else
                                        Guest
                                    @endauth
                                </div>
                                <div class="sidebar-user-subtitle">Administrator</div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <ul>
                        <li class="active"> <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span></a> </li>
                        <li class="list-divider"></li>
                        <li class="submenu"> <a href="#"><i class="fas fa-key"></i> <span> Data Kamar </span>
                                <span class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none;">
                                <li><a href="{{ route('form/allRoom/page') }}">All Rooms </a></li>
                                <li><a href="{{ route('form/addRoom/page') }}"> Add Rooms </a></li>
                            </ul>
                        </li>
                        <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Data Penghuni </span>
                                <span class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none;">
                                <li><a href="{{ route('form/allOccupant/page') }}"> All Occupant </a></li>
                                <li><a href="{{ route('form/addOccupant/page') }}"> Add Occupant </a></li>
                            </ul>
                        </li>
                        <li class="submenu"> <a href="#"><i class="fas fa-bell"></i> <span> Data Tagihan </span>
                                <span class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none;">
                                <li><a href="{{ route('form/allBill/page') }}"> All Bill </a></li>
                                <li><a href="{{ route('form/addBill/page') }}"> Add Bill </a></li>
                            </ul>
                        </li>
                        <li> <a href="{{ route('lunas') }}"><i class="far fa-money-bill-alt"></i> <span>Pembayaran
                                    Lunas</span></a> </li>
                        <li class="list-divider"></li>
                        <li class="menu-title mt-3"> <span>OTHERS</span> </li>
                        <li> <a href="{{ route('metode-pembayaran') }}"><i class="fas fa-dollar-sign"></i> <span>Metode
                                    Pembayaran</span></a> </li>
                        <li> <a href="{{ route('aturan') }}"><i class="fas fa-suitcase"></i> <span>Aturan
                                    Kost</span></a> </li>
                        <li> <a href="{{ route('register') }}"><i class="fas fa-edit"></i> <span>Create
                                    Account</span></a> </li>
                        <li> <a href="{{ route('logout') }}"><i class="fe fe-logout"></i> <span>Logout</span></a> </li>
                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log("Initializing DataTable");
            $('.datatable').DataTable();
        });

        document.getElementById('dark-mode-toggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
            } else {
                localStorage.setItem('darkMode', 'disabled');
            }
        });

        // Check for saved user preference
        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
        }
    </script>

    @yield('script')
</body>

</html>
