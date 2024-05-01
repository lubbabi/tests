<?php
session_start();

// Check if user is logged in and authorized, otherwise redirect to homepage
if (!(isset($_SESSION['homeowner_id']) && $_SESSION['authenticated'])) {
    header("Location: homepage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">


    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-check-to-slot"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HOA Voting Website</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Election Status</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Candidates
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-people-group"></i>
                    <span>Candidates</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">HOA Resources:</h6>
                        <a class="collapse-item" href="bod-tables.php">HOA Board of Directors</a>
                        <a class="collapse-item" href="officers-tables.php">HOA Officers</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Voting Form
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>HOA Election</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Vote For:</h6>
                        <a class="collapse-item active" href="vote-page-dob.php">Board of Director</a>
                        <a class="collapse-item" href="vote-page-off.php">Officer</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
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

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="container-xl big-padding">
        <div class="row section-title">
            <h2 class="fs-4">Organization - The Master Brand Company</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eleifend arcu et sem elementum faucibus.
                Vestibulum faucibus eleifend dolor, id luctus libero. Suspendisse commodo, orci eu mattis mattis, ante
                ligula porta tortor, ut scelerisque massa risus a quam.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="text-white text-center mb-4 votcard shadow-md bg-white p-4 pt-5">
                    <img class="rounded-pill shadow-md p-2" src="assets/images/testimonial/member-01.jpg" alt="">
                    <h4 class="mt-3 fs-5 mb-1 fw-bold">James Anderson</h4>
                    <h6 class="fs-7">Runnung to Be: <span class="text-primary fw-bold">President</span></h6>
                    <p class="text-dark mt-3 mb-3 fs-8">Aliquam utrum nibh rutrum nibh vitae tortor dapibus egestas.
                        Cras condimentum dapibus tellus vel semper. Quisque vel dui molestie est auctor utrum nibh
                        porttitor.</p>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-primary fw-bolder fs-8">View Manifesto</button>
                    <button class="btn btn-danger fw-bolder px-4 ms-2 fs-8">Vote</button>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="text-white text-center mb-4 votcard shadow-md bg-white p-4 pt-5">
                    <img class="rounded-pill shadow-md p-2" src="assets/images/testimonial/member-02.jpg" alt="">
                    <h4 class="mt-3 fs-5 mb-1 fw-bold">Arun Kumar</h4>
                    <h6 class="fs-7">Runnung to Be: <span class="text-primary fw-bold">President</span></h6>
                    <p class="text-dark mt-3 mb-3 fs-8">Aliquam utrum nibh rutrum nibh vitae tortor dapibus egestas.
                        Cras condimentum dapibus tellus vel semper. Quisque vel dui molestie est auctor utrum nibh
                        porttitor.</p>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-primary fw-bolder fs-8">View Manifesto</button>
                    <button class="btn btn-danger fw-bolder px-4 ms-2 fs-8">Vote</button>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="text-white text-center mb-4 votcard shadow-md bg-white p-4 pt-5">
                    <img class="rounded-pill shadow-md p-2" src="assets/images/testimonial/member-03.jpg" alt="">
                    <h4 class="mt-3 fs-5 mb-1 fw-bold">Pream Nath</h4>
                    <h6 class="fs-7">Runnung to Be: <span class="text-primary fw-bold">President</span></h6>
                    <p class="text-dark mt-3 mb-3 fs-8">Aliquam utrum nibh rutrum nibh vitae tortor dapibus egestas.
                        Cras condimentum dapibus tellus vel semper. Quisque vel dui molestie est auctor utrum nibh
                        porttitor.</p>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-primary fw-bolder fs-8">View Manifesto</button>
                    <button class="btn btn-danger fw-bolder px-4 ms-2 fs-8">Vote</button>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="text-white text-center mb-4 votcard shadow-md bg-white p-4 pt-5">
                    <img class="rounded-pill shadow-md p-2" src="assets/images/testimonial/member-04.jpg" alt="">
                    <h4 class="mt-3 fs-5 mb-1 fw-bold">Reena Anath</h4>
                    <h6 class="fs-7">Runnung to Be: <span class="text-primary fw-bold">President</span></h6>
                    <p class="text-dark mt-3 mb-3 fs-8">Aliquam utrum nibh rutrum nibh vitae tortor dapibus egestas.
                        Cras condimentum dapibus tellus vel semper. Quisque vel dui molestie est auctor utrum nibh
                        porttitor.</p>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-primary fw-bolder fs-8">View Manifesto</button>
                    <button class="btn btn-danger fw-bolder px-4 ms-2 fs-8">Vote</button>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="text-white text-center mb-4 votcard shadow-md bg-white p-4 pt-5">
                    <img class="rounded-pill shadow-md p-2" src="assets/images/testimonial//member-05.png" alt="">
                    <h4 class="mt-3 fs-5 mb-1 fw-bold">Allen Shory</h4>
                    <h6 class="fs-7">Runnung to Be: <span class="text-primary fw-bold">President</span></h6>
                    <p class="text-dark mt-3 mb-3 fs-8">Aliquam utrum nibh rutrum nibh vitae tortor dapibus egestas.
                        Cras condimentum dapibus tellus vel semper. Quisque vel dui molestie est auctor utrum nibh
                        porttitor.</p>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-primary fw-bolder fs-8">View Manifesto</button>
                    <button class="btn btn-danger fw-bolder px-4 ms-2 fs-8">Vote</button>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="text-white text-center mb-4 votcard shadow-md bg-white p-4 pt-5">
                    <img class="rounded-pill shadow-md p-2" src="assets/images/testimonial/member-06.png" alt="">
                    <h4 class="mt-3 fs-5 mb-1 fw-bold">Vimal kumar</h4>
                    <h6 class="fs-7">Runnung to Be: <span class="text-primary fw-bold">President</span></h6>
                    <p class="text-dark mt-3 mb-3 fs-8">Aliquam utrum nibh rutrum nibh vitae tortor dapibus egestas.
                        Cras condimentum dapibus tellus vel semper. Quisque vel dui molestie est auctor utrum nibh
                        porttitor.</p>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-primary fw-bolder fs-8">View Manifesto</button>
                    <button class="btn btn-danger fw-bolder px-4 ms-2 fs-8">Vote</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-6 fw-bold fs-5" id="exampleModalLabel">View Manifesto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="molist">
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu nibh et felis interdum
                            accumsan. Pellentesque elit odio, interdum quis ante in, varius rhoncus orci.</li>
                        <li>Etiam laoreet dapibus ante at mollis. Morbi lobortis ultricies risus, in faucibus est
                            blandit eu. Nunc nec imperdiet elit.</li>
                        <li>Praesent eget massa finibus, placerat tortor sed, pretium justo. Aenean et lectus accumsan,
                            tincidunt metus sit amet, laoreet nunc.</li>
                        <li>In et tincidunt est. Sed neque sapien, ultricies a orci et, fringilla egestas nibh. Sed
                            luctus eros et erat suscipit fermentum.</li>
                        <li>Cras blandit orci quis purus placerat tincidunt. Nunc ullamcorper iaculis nibh, sed dapibus
                            dui lobortis nec.</li>
                        <li>Sed tristique ante ac rhoncus facilisis. Maecenas hendrerit velit a interdum convallis.
                            Vivamus tempus eu justo nec rutrum. Praesent sollicitudin interdum nisl, at sollicitudin
                            justo interdum vel</li>
                        <li>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                            egestas. Nunc eget orci maximus, tincidunt nulla molestie, porta nisi. Integer fringilla
                            lorem at lacinia iaculis. </li>
                        <li>Maecenas tempus libero laoreet est facilisis, vitae iaculis dui eleifend. Proin eget magna
                            vitae diam dictum interdum at at nulla. Fusce eu porttitor felis. Aenean pretium lacinia
                            nunc ut convallis.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/680727b49b.js" crossorigin="anonymous"></script>



        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
        <script src="assets/plugins/testimonial/js/owl.carousel.min.js"></script>
        <script src="assets/js/script.js"></script>
</body>

</html>