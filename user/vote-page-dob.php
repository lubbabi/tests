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
    <title>SB Admin 2 - Dashboard</title>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
                Voting Area
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-file-lines"></i>
                    <span>HOA Election</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Vote For:</h6>
                        <a class="collapse-item active" href="vote-page-dob.php">Board of Director</a>
                        <a class="collapse-item" href="vote-page-off.php">Officer</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="vote-summary.php">
                    <i class="fa-solid fa-file-lines"></i>
                    <span>Vote Summary</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
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
                                <?php
                                // Include the database connection file
                                require_once('db_connection.php');

                                // Retrieve user information from the database based on homeowner_id
                                $homeowner_id = $_SESSION['homeowner_id'];
                                $query = "SELECT first_name, last_name FROM homeowners WHERE homeowner_id = '$homeowner_id'";
                                $result = mysqli_query($conn, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    // Fetch user data
                                    $row = mysqli_fetch_assoc($result);
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];

                                    // Display first name and last name in the span tag
                                    echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $first_name . ' ' . $last_name . '</span>';
                                } else {
                                    // If no user data found, display default values or handle the case accordingly
                                    echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>';
                                }

                                ?>
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
                    <?php
                    include 'db_connection.php'; // Include database connection script

                    // Define custom order for positions
                    $positionOrder = [
                        "President",
                        "Vice President",
                        "Secretary",
                        "Treasurer",
                        "Auditor"
                    ];

                    // Check if the user has already voted for each position
                    $alreadyVotedPositions = [];
                    if (isset($homeowner_id)) {
                        $query = "SELECT position FROM hoa_board_of_directors WHERE boardID IN (SELECT board_id FROM ballot WHERE homeownerId = '$homeowner_id')";
                        $result = mysqli_query($conn, $query);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $alreadyVotedPositions[] = $row['position'];
                            }
                        }
                    }

                    // Handle the vote submission
                    if (isset($_POST['vote']) && isset($_POST['board_id']) && isset($_POST['homeowner_id'])) {
                        $board_id = $_POST['board_id'];
                        $homeowner_id = $_POST['homeowner_id'];
                        date_default_timezone_set('Asia/Shanghai');
                        $voteDateTime = date("Y-m-d H:i:s");

                        // Check if the user has already voted for this position
                        $position_query = "SELECT position FROM hoa_board_of_directors WHERE boardID = '$board_id'";
                        $position_result = mysqli_query($conn, $position_query);
                        $position_row = mysqli_fetch_assoc($position_result);
                        $position = $position_row['position'];

                        if (in_array($position, $alreadyVotedPositions)) {
                            echo "You have already voted for a candidate in this position.";
                            exit; // Stop further execution
                        }

                        // Generate a random 6-digit number for ballotId
                        $ballotId = rand(100000, 999999);

                        // Insert the vote into the database
                        $query = "INSERT INTO ballot (ballotId, homeownerId, board_id, voteDateTime) VALUES ('$ballotId', '$homeowner_id', '$board_id', '$voteDateTime')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo "Vote saved successfully!";
                            // Update alreadyVotedPositions array
                            $alreadyVotedPositions[] = $position;
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                        exit; // Stop further execution
                    }

                    // Fetch candidate data from the database, including the photo_path
                    $query = "SELECT first_name, middle_name, last_name, position, gender, date_of_birth, phone_number, email_address, photo_path, boardID FROM hoa_board_of_directors";
                    $result = mysqli_query($conn, $query);

                    if (!$result) {
                        die("Error fetching candidates: " . mysqli_error($conn));
                    }

                    // Initialize arrays to store candidates for each position
                    $candidatesByPosition = [];

                    // Loop through each candidate and organize them by position
                    while ($row = mysqli_fetch_assoc($result)) {
                        $position = $row['position'];
                        // Add the candidate to the respective position array
                        $candidatesByPosition[$position][] = $row;
                    }
                    ?>
                    <!-- HTML Code -->
                    <div class="container-xl big-padding">
                        <div class="row section-title" style="margin-top: -70px;">
                            <h2 class="fs-4">HOA Board of Director Election</h2>
                            <p>Lorem ipsum dolor sit amet,</p>
                        </div>
                        <div class="row">
                            <?php
                            // Loop through each position and display candidates
                            foreach ($positionOrder as $position) {
                                // Check if there are candidates for this position
                                if (isset($candidatesByPosition[$position])) {
                                    // Display position header
                                    echo '<div class="col-12"><h3 class="text-center">' . $position . '</h3></div>';
                                    // Loop through candidates for this position
                                    foreach ($candidatesByPosition[$position] as $candidate) {
                                        // Check if the user has already voted for a candidate in this position
                                        $alreadyVotedPosition = in_array($candidate['position'], $alreadyVotedPositions);
                                        // Determine if the vote button should be disabled
                                        $disabled = $alreadyVotedPosition ? 'disabled' : '';
                            ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="text-white text-center mb-4 votcard shadow-md bg-white p-4 pt-5">
                                                <?php
                                                // Display the candidate photo if available
                                                if (!empty($candidate['photo_path'])) {
                                                    echo '<img src="' . $candidate['photo_path'] . '" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;" alt="Candidate Photo">';
                                                }
                                                ?>
                                                <h4 class="mt-3 fs-5 mb-1 fw-bold">
                                                    <?php echo $candidate['first_name'] . ' ' . $candidate['last_name']; ?>
                                                </h4>
                                                <h6 class="fs-7">Running to Be: <span class="text-primary fw-bold"><?php echo $candidate['position']; ?></span></h6>
                                                <p class="text-dark mt-3 mb-3 fs-8">Aliquam utrum nibh rutrum nibh vitae tortor
                                                    dapibus egestas.
                                                    Cras condimentum dapibus tellus vel semper. Quisque vel dui molestie est auctor
                                                    utrum nibh
                                                    porttitor.
                                                </p>
                                                <div class="d-flex justify-content-center">
                                                    <form method="post" action="">
                                                        <input type="hidden" name="board_id" value="<?php echo $candidate['boardID']; ?>">
                                                        <input type="hidden" name="homeowner_id" value="<?php echo $homeowner_id; ?>">
                                                        <button type="submit" name="vote" class="btn btn-danger fw-bolder px-4 fs-8 mb-4" <?php echo $disabled; ?>>Vote</button>
                                                    </form>

                                                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary fw-bolder fs-8 view-details-btn ms-2 mb-4" data-firstname="<?php echo $candidate['first_name']; ?>" data-middlename="<?php echo $candidate['middle_name']; ?>" data-lastname="<?php echo $candidate['last_name']; ?>" data-gender="<?php echo $candidate['gender']; ?>" data-dob="<?php echo $candidate['date_of_birth']; ?>" data-phonenumber="<?php echo $candidate['phone_number']; ?>" data-emailaddress="<?php echo $candidate['email_address']; ?>">
                                                        View Details
                                                    </button>
                                                </div>


                                            </div>
                                        </div>
                                <?php
                                    }
                                        } else {
                                            // Display a message box if no candidates are found for this position
                                            echo '<div class="col-12"><div class="alert alert-info text-center" role="alert">No candidates found for ' . $position . '</div></div>';
                                        }
                                    }
                                ?>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <!-- Adjust modal size here (e.g., modal-sm, modal-md, modal-lg) -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-6 fw-bold fs-5" id="exampleModalLabel">Candidate Details</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul class="molist">
                                        <li style="font-size:16px"><strong>First Name:</strong> <span id="firstName"></span></li>
                                        <li style="font-size:16px"><strong>Middle Name:</strong> <span id="middleName"></span></li>
                                        <li style="font-size:16px"><strong>Last Name:</strong> <span id="lastName"></span></li>
                                        <li style="font-size:16px"><strong>Gender:</strong> <span id="gender"></span></li>
                                        <li style="font-size:16px"><strong>Date of Birth:</strong> <span id="dob"></span></li>
                                        <li style="font-size:16px"><strong>Phone Number:</strong> <span id="phoneNumber"></span></li>
                                        <li style="font-size:16px"><strong>Email Address:</strong> <span id="emailAddress"></span></li>
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
                        <span>HOA Voting System</span>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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
    <script>
        // Function to handle displaying candidate details in the modal
        function displayCandidateDetails(button) {
            var modal = $('#exampleModal');

            // Extract candidate details from the data attributes of the button
            var firstName = button.data('firstname');
            var middleName = button.data('middlename');
            var lastName = button.data('lastname');
            var gender = button.data('gender');
            var dob = button.data('dob');
            var phoneNumber = button.data('phonenumber');
            var emailAddress = button.data('emailaddress');

            // Populate the modal with candidate details
            modal.find('#firstName').text(firstName);
            modal.find('#middleName').text(middleName);
            modal.find('#lastName').text(lastName);
            modal.find('#gender').text(gender);
            modal.find('#dob').text(dob);
            modal.find('#phoneNumber').text(phoneNumber);
            modal.find('#emailAddress').text(emailAddress);
        }

        // Listen for the click event on the "View Details" button
        $(document).on('click', '[data-bs-target="#exampleModal"]', function() {
            var button = $(this);
            displayCandidateDetails(button);
        });
    </script>
</body>

</html>