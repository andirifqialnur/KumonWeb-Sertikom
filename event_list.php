<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: login.php"); // Redirect to the login page or another page
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    // exit();
}


?>
<?php
if ($_SESSION['role'] == 1){
?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM event WHERE id = $id");
    header('location:event_list.php');
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Event List</title>
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
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM event");
                ?>
                <h1>Event List</h1>
                <?php if (empty($result)): ?>
                <div class="alert alert-info mt-3">
                    No events available.
                </div>
                <?php else: ?>
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM event");
                ?>
                <table class="table table-bordered mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Event Id</th>
                            <th scope="col">Event Name</th>
                            <th scope="col">Event Detail</th>
                            <th scope="col">Event Date</th>
                            <th scope="col">Event Category</th>
                            <th scope="col">Event Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $counter = 1; // Variabel counter untuk nomor urut
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?= $counter; ?>
                                    </td>
                                    <td><?php echo $row["event_name"]; ?></td>
                                    <td><?php echo $row["detail"]; ?></td>
                                    <td><?php echo $row["date"]; ?></td>
                                    <td><?php echo $row["category"]; ?></td>
                                    <td>
                                        <img src="event_img/<?php echo $row["image"]; ?>" alt="Event Image" class="img-thumbnail" style="max-height: 100px;">
                                    </td>
                                    <td>
                                        <a href="event_update.php?update=<?=$row['id']?>" class="btn btn-warning btn-sm me-2"><i class="bi bi-pencil"></i></a>
                                        <a href="event_list.php?delete=<?=$row['id']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                    </td>
                                <?php
                                $counter++; // Increment counter setiap data ditampilkan
                            }
                        } else {
                                ?>
                                <tr>
                                    <td colspan="5">No Event</td>
                                </tr>
                            <?php
                        }
                            ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <div class="d-flex justify-content-end mb-3">
                    <a class="btn btn-primary px-4 me-sm-3" href="event_add.php">Add Event</a>
                    <a class="btn btn-success px-4 me-sm-3" href="event_feedback.php">Feedbacks</a>
                    <form action="" method="POST">
                        <input type="submit" class="btn btn-danger col-12" name="logout" value="Log out">
                    </form>

                </div>
            </div>
        </main>
    </body>
</html>

<?php
}
?>

