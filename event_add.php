<?php

@include 'config.php';

if (isset($_POST['add_event'])) {

    $event_name = $_POST['event_name'];
    $detail = $_POST['detail'];
    $date = $_POST['date'];
    $category = $_POST['category'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'event_img/' . $image;

    if (empty($event_name) || empty($detail) || empty($date) || empty($category) || empty($image)) {
        $message[] = 'Please fill out all';
    } else {
        $insert = "INSERT INTO event(event_name, detail, date, category, image) VALUES('$event_name', '$detail', '$date', '$category', '$image')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Added';
            header('Location: event_list.php');
        } else {
            $message[] = 'Failed';
        }
    }
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Event</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/kumon_logo.jpg" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <div class="container mt-5">
                <h1 class="mb-4">Event Form</h1>
                <form id="contactForm" action="event_add.php" method="POST" enctype="multipart/form-data">
                    <!-- Event Name -->
                    <div class="form-group mb-3">
                        <label for="event_name">Event Name</label>
                        <input type="text" class="form-control" id="event_name" rows="3" name="event_name" required>
                    </div>

                    <!-- Event Details -->
                    <div class="form-group mb-3">
                        <label for="detail">Event Detail</label>
                        <textarea class="form-control" id="detail" name="detail" rows="3" required></textarea>
                    </div>

                    <!-- Event Date -->
                    <div class="form-group mb-3">
                        <label for="date">Event Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <!-- Event Category -->
                    <div class="form-group mb-3">
                        <label for="category">Event Category</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>

                    <!-- Event Image -->
                    <div class="form-group mb-3">
                        <label for="image">Event Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="d-grid mb-5">
                        <button name="add_event" class="btn btn-primary btn-lg enabled" id="submitButton" value="Submit" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>