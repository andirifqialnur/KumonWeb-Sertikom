<?php
@include 'config.php';
session_start();

function template_header($title) {

    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
        // exit();
    }

    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>$title</title>
            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="assets/kumon_logo.jpg" />
            <!-- Bootstrap icons-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-VwpHkU4K3hYc67H8BqUpbbmBwOgbrb7AFimz9F6X3tBivG/hG2fY9kYHzRbHbIdF" crossorigin="anonymous">
            
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="css/styles.css" rel="stylesheet" />
        </head>
        <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.php"><img src="assets/kumon_logo.jpg" alt="Logo" width="33" height="30" class="me-2 rounded-circle d-inline-block align-text-top"><b>Kumon</b></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="event.php">Event</a></li>
                            <li class="nav-item"><a class="nav-link me-3" href="contact.php">Contact</a></li>
                            <li class="nav-item">
                                <form action="" method="POST">
                                    <input type="submit" class="btn btn-danger col-12" name="logout" value="Log out">
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    EOT;
}
function template_footer() {
echo <<<EOT
        </main>
            <!-- Footer-->
            <footer class="bg-dark py-4 mt-auto">
                <div class="container px-5">
                    <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                        <div class="col-auto">
                            <div class="small m-0 text-white">Copyright &copy; Kumon 2023</div>
                        </div>
                        <div class="col-auto">
                            <a class="link-light small" href="#!">Privacy</a>
                            <span class="text-white mx-1">&middot;</span>
                            <a class="link-light small" href="#!">Terms</a>
                            <span class="text-white mx-1">&middot;</span>
                            <a class="link-light small" href="#!">Contact</a>
                        </div>
                    </div>
                </div>
            </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
EOT;
}
?>