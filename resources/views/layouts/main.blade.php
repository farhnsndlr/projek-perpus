<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.css')  }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

@yield('sidebar')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Divider -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3"></div>
            </a>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @if (Auth::user()->user_type == 'member')
                
            <li class="nav-item active">
                <a class="nav-link" href="/main/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="../main/books">
                    
                    <span>Books List</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../main/rent" >
                    <span>Rent Books</span>
                </a>
    
            </li> 
            @elseif (Auth::user()->user_type == 'admin')
            <li class="nav-item active">
                <a class="nav-link" href="../admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">
                
            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/books">
                    <span>Books</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/categories" >
                    <span>Categories</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../admin/logs" >
                    <span>Logs</span>
                </a>
            </li>
           
           <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/return-book">
                <span>Return Books</span></a>
           </li>

            @endif
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        
                    </form>
                           
                    @yield('topbar')
                        <div class="topbar-divider d-none d-sm-block"></div>
                       
                        <nav class="navbar bg-body-tertiary px-3 mb-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                
                                    <x-responsive-nav-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                                
                        </nav>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->
                @yield('content')
                <!-- Begin Page Content -->
                
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

   


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset(' template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.select-multiple').select2({
            placeholder: "Select Category",
            allowClear: true
        });
    });
    </script>
    <script>
        $(document).ready(function() {
            $('.input-box').select2();
        });
        </script>
</body>

</html>