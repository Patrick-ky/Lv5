@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #198754;" id="accordionSidebar">
    
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img style="width:65px;height:65px;" src="{{URL('images\logo-lgu.png')}}">
                </div>
                <div class="sidebar-brand-text mx-50" style="font-size: 10px;">{{ config('app.name') }}</div>
            </a>
    
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
    
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link active" href="/home">
                <i class="fas fa-fw fa-gauge-high"></i>
                    <span>Introduction</span></a>
            </li>
    
            <!-- Divider -->
            <hr class="sidebar-divider">
    
            <!-- Heading -->
            <div class="sidebar-heading">
                TABS
            </div>
    
            <!-- Nav Item - Clients -->
            <li class="nav-item active">
                <a class="nav-link active" href="/clients">
                <i class="fas fa-solid fa-users"></i>
                    <span>Clients</span></a>
            </li>
            <!-- Nav Item - Clients Info -->
            <li class="nav-item active">
                <a class="nav-link active" href="/client_info">
                <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Stall Info</span></a>
            </li>
            <!-- Nav Item - Billings -->
            <li class="nav-item active">
                <a class="nav-link active" href="/billingskie">
                <i class="fas fa-solid fa-table"></i>
                    <span>Billings</span></a>
            </li>
            <!-- Nav Item - Violations -->
            <li class="nav-item active">
                <a class="nav-link active" href="/violations">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Violations</span></a>
            </li>
            <!-- Nav Item - Stall Type -->
            <li class="nav-item active">
                <a class="nav-link active" href="/stall-types">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Stall Category</span></a>
            </li>
            <!-- Nav Item - Client Records -->
            <li class="nav-item active">
                <a class="nav-link active" href="/billing-record">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Client Records</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
          <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class="flex ml-3" >
                        <h4>Welcome, {{ Auth::user()->name }}!</h4>
                    </div>
                
      
                
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        
                        <!-- Nav Item - Alerts -->
                        
                        <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                                <!-- ... (Your alert content here) ... -->
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <!-- ... (Your message content here) ... -->
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('images/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Manage Account
                            </a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
                <!-- End of Topbar -->
                <div class="content">
                    <!-- Include Bootstrap CSS and JS -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" >
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
                    

                    @yield('clients.index')
                    @yield('clients.addclients')
                    @yield('client_info.index')
                    @yield('client_info.add')
                    @yield('client_info.edit')
                    {{-- @yield('clients.edit') --}}
                    @yield('billings.index')
                    @yield('billings.create')
                    @yield('violations.index')
                    @yield('violations.create')
                    @yield('violations.edit')
                    @yield('stall-types.index')
                    @yield('stall-types.create')
                    @yield('stall-types.edit')
                    @yield('stall-types.stallnumbers.view')
                    @yield('stall-types.stallnumbers.create')
                    @yield('violation.view')
                    @yield('clientrecords.index')
                    @yield('home')
                    @yield('scripts') 

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                </div>
                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>
            </div>
        </div>
    </div>
    


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
@endauth
