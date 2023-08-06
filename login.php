<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize user input
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    // You can add more validation for the password if needed.

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the username exists in the database
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $storedPassword = $row['password'];
      $userRole = $row['role']; // Retrieve the user's role from the database

      // Verify the hashed password using password_verify
      if (password_verify($password, $storedPassword)) {
        // Set session variables
        $_SESSION['email'] = $username;
        $_SESSION['role'] = $userRole; // Store the user's role in the session
        $_SESSION['status'] = "login";

        // Redirect the user to a secure page after successful login
        if($userRole === '1'){
          header("Location: event_list.php");
        } else {
          header("Location: index.php");
        }
        exit();
      } else {
        echo "Invalid password.";
      }
    } else {
      echo "Invalid username.";
    }
  } else {
    echo "Please enter both username and password.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">
                <!-- Contact form-->
                <div class="rounded-3 py-2 px-1 px-md-3 mb-2">
                    <div class="text-center mb-3">
                        <h1 class="fw-bolder">Login</h1>
                        <p class="lead fw-normal text-muted mb-0">We already miss you</p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form id="contactForm" action="login.php" data-sb-form-api-token="API_TOKEN" method="POST">
                                <!-- Email Input input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="arana"
                                        data-sb-validations="required" />
                                    <label for="email">Email</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">Email is
                                        required.</div>
                                </div>
                                <!-- Password input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" name="password" type="password" placeholder=""
                                        data-sb-validations="required" />
                                    <label for="password">Password</label>
                                    <div class="invalid-feedback" data-sb-feedback="password:required">Password is
                                        required.</div>
                                </div>
                                <div id="error-message" class="text-danger mb-3"></div>
                                <div class="text-center mb-3">
                                    <div class="fw-bolder"></div>
                                    Don't Have an account?
                                    <a href="register.php">Register</a>
                                </div>
                                <!-- Submit Button-->
                                <div class="d-grid"><button class="btn btn-primary btn-lg enabled" id="submitButton" value="Login"
                                        type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Bootstrap core JS-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Core theme JS-->
                <script src="js/scripts.js"></script>
                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                
</body>

</html>