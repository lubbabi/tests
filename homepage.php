<?php
session_start();

// Include the database connection file
include 'db_connection.php';

// Function to sanitize user inputs
function sanitize_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered homeowner ID and password and sanitize them
    $homeowner_id = sanitize_input($_POST['homeowner_id']);
    $password = sanitize_input($_POST['password']);

    // Prepare and bind parameters to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM homeowners WHERE homeowner_id=?");
    $stmt->bind_param("s", $homeowner_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Retrieve the password from the database
        $db_password = $row['password'];
        // Compare the entered password with the password from the database
        if ($password == $db_password) {
            // Password is correct, start a new session
            session_regenerate_id();
            $_SESSION['homeowner_id'] = $homeowner_id;
            $_SESSION['authenticated'] = true; // Authorization flag
            header("Location: user/dashboard.php");
            exit();
        } else {
            // Invalid password
            $error = "Invalid credentials";
        }
    } else {
        // No user found with the provided ID
        $error = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>HOA Voting System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <link rel="stylesheet" href="homepage.css">
  <link rel="stylesheet" href="loginform.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container">
    <div class="header">
      <header class="header-content">
        <span class="logo">HOA Voting System</span>
        <button class="loginBTN" id="loginButton">Login</button>
      </header>
    </div>

    <div class="main-title-container">
      <div class="main-title-content">
        <h1 class="main-title-text">Streamline HOA Voting</h1>
        <span class="main-title-subtext"> Effortless and Secure Online Voting System for HOAs</span>
        <div class="learnMore-BTN">
          <button>Learn More&nbsp;→</button>
        </div>
      </div>
    </div>

    <div id="loginBox" class="login-box">
      <div class="login-content">
        <h2>Welcome Member</h2>
        <form action="homepage.php" method="post" autocomplete="off">
          <div class="field">
            <div class="input-area">
              <input type="text" id="homeowner_id" name="homeowner_id" placeholder="Homeowner ID">
              <i class="icon fas fa-user"></i>
              <i class="error error-icon fas fa-exclamation-circle"></i>
            </div>
            <div class="error error-txt"></div>
          </div>

          <div class="field">
            <div class="input-area">
              <input type="password" id="password" name="password" placeholder="Password">
              <i class="icon fas fa-lock"></i>
              <i class="error error-icon fas fa-exclamation-circle"></i>
            </div>
            <div class="error error-txt"></div>
          </div>
          <button type="submit" class="loginformBtn" name="login" id="loginformBtn"><i class="bi bi-box-arrow-in-right"></i> Login</button>
        </form>
        <button class="close-popup" onclick="closePopup()">X</button>
      </div>
    </div>

    <!-- featuresContainer -->
    <div class="featuresContainer">
      <div class="featuresContent">

        <div class="features-title">
          <span class="FeatureSmallTitle">Feature</span>
          <h2 class="FeatureMainTitle">Empower Your HOA with Advanced Features</h2>
          <span class="FeatureSubtitle"> Discover the key features that make our HOA voting system stand out from the rest.</span>
        </div>

        <div class="features-grid">
          <div class="featuresCard"> <!-- BOX 1-->
            <div class="card-container">
              <h3 class="card-title">
                <i class="bi bi-check-circle"></i>
                <span>Secure Online Voting</span>
              </h3>
              <span class="card-description"> Ensure the integrity of your HOA elections with our secure online voting system.</span>
            </div>
          </div>


          <div class="featuresCard"> <!-- BOX 2-->
            <div class="card-container">
              <h3 class="card-text">
                <i class="bi bi-check-circle"></i>
                <span>Easy Member Verification</span>
              </h3>
              <span class="card-description">Simplify the verification process for HOA members to participate in voting.</span>
            </div>
          </div>

          <div class="featuresCard"> <!-- BOX 3-->
            <div class="card-container">
              <h3 class="card-text">
                <i class="bi bi-check-circle"></i>
                <span>Real-Time Results</span>
              </h3>
              <span class="card-description"> Get instant access to voting results as soon as the polls close.</span>
            </div>
          </div>

          <div class="featuresCard"> <!-- BOX 4-->
            <div class="card-container">
              <h3 class="card-text">
                <i class="bi bi-check-circle"></i>
                <span>Customizable Ballots</span>
              </h3>
              <span class="card-description">Tailor the voting experience by creating custom ballots to suit your HOA's needs.</span>
            </div>

          </div>
        </div>
      </div>


      <div class="banner">
        <div class="bannerContainer">
          <h1 class="bannerTitle">Revolutionize Your HOA Elections</h1>
          <span class="bannerDescription"><span> Our HOA Voting System simplifies the voting process,
              increases member engagement, and ensures transparency. Say goodbye to paper ballots and embrace the future
              of HOA elections with our user-friendly platform. <br>
              <button class="buttonFilled">Learn More</button>
        </div>
      </div>

      <!-- FAQ Container -->
      <div class="FAQ-Container">
        <div class="FAQ-title">
          <span class="FAQ-small-title"> Frequently Ask Questions </span>
          <h2 class="FAQ-maintitle">
            <i class="bi bi-patch-question-fill"></i>
            Common questions
          </h2>
          <span class="FAQ-subtitle"> Here are some of the most common questions that we get. </span>
        </div>

        <div>
          <div class="QuestionContainer">
            <!-- Question 1 -->
            <span class="QuestionText">
              <span>How does the HOA voting system work?</span>
            </span>
            <span class="answer">
              The HOA voting system allows members to cast their votes electronically for important decisions and elections within the community.
            </span>
          </div>

          <div class="QuestionContainer">
            <!-- Question 2 -->
            <span class="QuestionText">
              <span> Is the HOA voting system secure? </span>
            </span>
            <span class="answer">
              Yes, the HOA voting system is designed with robust security measures to ensure the confidentiality and integrity of the voting process.
            </span>
          </div>

          <div class="QuestionContainer">
            <!-- Question 3 -->
            <span class="QuestionText">
              Can members vote remotely using the HOA voting system?
            </span>
            <span class="answer">
              Yes, members can conveniently cast their votes from anywhere using their computer or mobile device with internet access.
            </span>
          </div>

          <div class="QuestionContainer">
            <!-- Question 4 -->
            <span class="QuestionText">
              <span>How are election results determined with the HOA voting system?</span>
            </span>
            <span class="answer"><span>Election results are calculated automatically by the system based on the
                votes cast by the members, ensuring accuracy and transparency.</span>
            </span>
          </div>

          <div class="QuestionContainer">
            <!-- Question 5 -->
            <span class="QuestionText">
              <span>What support is available for members using the HOA voting system?</span>
            </span>
            <span class="answer">
              <span>Members can access user guides and contact our support team for assistance with any questions or
                issues related to using the HOA voting system.</span>
            </span>
          </div>
        </div>
      </div>

      <footer class="footerContainer">
        <div class="footer-separator"></div>
        <span class="footer-text"> © CDM | HOA Voting System </span>
      </footer>
      <script src="login-form.js"></script>
      <script src="https://kit.fontawesome.com/680727b49b.js" crossorigin="anonymous"></script>
</body>

</html>