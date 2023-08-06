<?php
@include 'config.php';
include 'controller.php';
// Your PHP code here.

// Home Page template below.
?>

<?=template_header('Event')?>

<!-- Blog preview section-->
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder">From our blog</h2>
                    <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                </div>
            </div>
        </div>
        <?php
            $result = mysqli_query($conn, "SELECT * FROM event");
        ?>
        <div class="row gx-5">
            <?php
                // Loop through each row of data from the event table
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <!-- Use the data from the row to populate the card content -->
                    <img class="card-img-top" src="event_img/<?php echo $row["image"]; ?>" alt="..." width="500" height="200"/>
                    <div class="card-body p-4">
                        <!-- Assuming you have a 'category' column in your event table -->
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?= $row['category']; ?></div>
                        <!-- Assuming you have a 'title' column in your event table -->
                        <a class="text-decoration-none link-dark stretched-link" href="#!">
                            <h5 class="card-title mb-3"><?= $row['event_name']; ?></h5>
                        </a>
                        <!-- Assuming you have a 'description' column in your event table -->
                        <p class="card-text mb-0"><?= $row['detail']; ?></p>
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle me-3" src="event_img/<?php echo $row["image"]; ?>" alt="..." width="40" height="40" />
                                <div class="small">
                                    <!-- Assuming you have a 'author' and 'date' column in your event table -->
                                    <div class="text-muted"><?= $row['date']; ?> &middot; 6 min read</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>

<?=template_footer()?>