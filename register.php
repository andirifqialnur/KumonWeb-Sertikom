<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $role = $_POST['role'];
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $password = $_POST['password']; // Use $password directly instead of $password1

    // Validate and sanitize user input
    $role = filter_var($role, FILTER_VALIDATE_INT);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Perform additional validation if needed (e.g., password length, email format, etc.)

    // Hash the password using password_hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "INSERT INTO user (role, name, email, password) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "isss", $role, $name, $email, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        // Registration successful, redirect to login page or another page of your choice
        if ($role === 1) {
            header("Location: event_list.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        $error_message = "Error during registration. Please try again.";
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
                        <h1 class="fw-bolder">Register</h1>
                        <p class="lead fw-normal text-muted mb-0">Hello, Welcome to our website</p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form id="contactForm" action="register.php" data-sb-form-api-token="API_TOKEN" method="POST">
                                <!-- Role input-->
                                <div class="form-row">
                                    <div class="input-group mb-3">
                                        <select name="role" class="custom-select form-control" id="inputGroupSelect01">
                                            <option selected>Choose your role...</option>
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Name address input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="name@example.com"
                                        data-sb-validations="required,name" />
                                    <label for="name">Name</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">Email is
                                        required.</div>
                                </div>
                                <!-- Email address input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com"
                                        data-sb-validations="required,email" />
                                    <label for="email">Email address</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">Email is
                                        required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.
                                    </div>
                                </div>
                                <!-- Password input-->
                                <div class="form-floating mb-2  ">
                                    <input class="form-control" id="password" name="password" type="password" placeholder=""
                                        data-sb-validations="required" />
                                    <label for="password">Password</label>
                                    <div class="invalid-feedback" data-sb-feedback="password:required">Password is
                                        required.</div>
                                </div>
                                <div id="error-message" class="text-danger mb-3"></div>
                                <div class="text-center mb-3">
                                    <div class="fw-bolder"></div>
                                    Already have an account? 
                                    <a href="login.php">Login</a>
                                </div>
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error sending message!</div>
                                </div>
                                <!-- Add a div to display the error message -->
                                <div id="error-message" class="text-center text-danger mb-3"></div>
                                <!-- Submit Button-->
                                <div class="d-grid"><button class="btn btn-primary btn-lg enable" id="submitButton" value="Register"
                                        type="submit">  Register</button>
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