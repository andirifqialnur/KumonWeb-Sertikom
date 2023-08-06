<?php
    include 'config.php'
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
                    $result = mysqli_query($conn, "SELECT * FROM feedback");
                ?>
                <h1>Event List</h1>
                <?php if (empty($result)): ?>
                <div class="alert alert-info mt-3">
                    No events available.
                </div>
                <?php else: ?>
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM feedback");
                ?>
                <table class="table table-bordered mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
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
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["phone"]; ?></td>
                                    <td><?php echo $row["message"]; ?></td>
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
                    <a class="btn btn-primary px-4 me-sm-3" href="event_list.php">Back</a>
                </div>
            </div>
        </main>
    </body>
</html>