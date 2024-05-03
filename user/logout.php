<?php
// Start the session
session_start();

// Close the database connection if it's open
if (isset($_SESSION['conn'])) {
    $_SESSION['conn']->close();
}

// Destroy all session data
session_destroy();

// Redirect the user to homepage.php
header("Location: ../homepage.php");
exit();
?>
