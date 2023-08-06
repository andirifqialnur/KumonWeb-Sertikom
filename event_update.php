<?php

@include 'config.php';

$id = $_GET['update'];

if (isset($_POST['update_event'])) {

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

        $update_event = "UPDATE event SET event_name='$event_name', detail='$detail', date='$date', category='$category', image='$image'  WHERE id = '$id'";
        $upload = mysqli_query($conn, $update_event);

        if ($upload) {
            move_uploaded_file($image_tmp_name, $image_folder);
            header('location:event_list.php');
        } else {
            $$message[] = 'please fill out all!';
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
        <title>Update Event</title>
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
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM event WHERE id = '$id'");
                    while ($row = mysqli_fetch_assoc($select)) {
                ?>
                <form id="contactForm" action="" method="POST" enctype="multipart/form-data">
                    <!-- Event Name -->
                    <div class="form-group mb-3">
                        <label for="event_name">Event Name</label>
                        <input type="text" class="form-control" id="event_name" name="event_name" required value="<?php echo $row['event_name']; ?>">
                    </div>

                    <!-- Event Details -->
                    <div class="form-group mb-3">
                        <label for="detail">Event Detail</label>
                        <textarea class="form-control" id="detail" name="detail" rows="3" required><?php echo $row['detail']; ?></textarea>
                    </div>

                    <!-- Event Date -->
                    <div class="form-group mb-3">
                        <label for="date">Event Date</label>
                        <input type="date" class="form-control" id="date" name="date" required value="<?php echo $row['date']; ?>">
                    </div>

                    <!-- Event Category -->
                    <div class="form-group mb-3">
                        <label for="category">Event Category</label>
                        <input type="text" class="form-control" id="category" name="category" required value="<?php echo $row['category']; ?>">
                    </div>

                    <!-- Event Image -->
                    <div class="form-group mb-3">
                        <label for="image" class="mb-2">Event Image</label></br>
                        <img src="event_img/<?php echo $row["image"]; ?>" class="img-thumbnail mb-3" style="max-height: 100px;">
                        <input type="file" class="form-control" id="image" name="image" value="<?php echo $row['image']; ?>">
                    </div>

                    <div class="d-grid mb-5">
                        <button name="update_event" class="btn btn-primary btn-lg enabled" id="submitButton" value="Submit" type="submit">Update</button>
                    </div>
                </form>
                <?php }; ?>
            </div>
        </main>
    </body>
</html>