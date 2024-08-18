<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Book List</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.css')  }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3"></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/main/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            
                
            <li class="nav-item">
                <a class="nav-link collapsed" href="../main/books">
                    
                    <span>Book List</span>
                </a>
                
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../main/rent" >
                    <span>Rent Books</span>
                </a>
    
            </li>
                    

            <!-- Divider -->

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

                    

                       
                          
                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                       
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Book List</h1>
                        
                    </div>
                   
                    <div class="my-5">
                        <div class="row">

                            @foreach ($books as $item)

                            <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                <div class="card h-100">
                                    <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('image/notfound.jpg') }}" class="card-img-top" draggable="false">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $item->title }}</h4>
                                        <p class="text-muted fs-6 ">{{ $item->book_code }}</p>
                                        <p class="text-muted fs-6 ">By {{ $item->author }}</p>
                                        <div class="badge p-2 text-wrap {{ $item->status == 'available' ? 'bg-success' : 'bg-danger' }}">
                                            <p class="card-text fs-6 text-light">{{ $item->status }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                           
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset(' template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset(' template/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset(' template/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset(' template/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>