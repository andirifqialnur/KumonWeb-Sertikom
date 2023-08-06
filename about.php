<?php
include 'controller.php';
?>

<?=template_header('About')?>

<!-- Header-->
    <header class="py-5">
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-6">
                    <div class="text-center my-5">
                        <h1 class="fw-bolder mb-3">Our mission is to make building websites easier for everyone.</h1>
                        <p class="lead fw-normal text-muted mb-4">Start Bootstrap was built on the idea that quality, functional website templates and themes should be available to everyone. Use our open source, free products, or support us by purchasing one of our premium products or services.</p>
                        <a class="btn btn-primary btn-lg" href="#scroll-target">Read our story</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About section one-->
    <section class="py-5 bg-light" id="scroll-target">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="assets/img/anu_sekolah1.jpg" alt="..." /></div>
                <div class="col-lg-6">
                    <h2 class="fw-bolder">Our founding</h2>
                    <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About section two-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="assets/img/anu_sekolah2.jpg" alt="..." /></div>
                <div class="col-lg-6">
                    <h2 class="fw-bolder">Growth &amp; beyond</h2>
                    <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Team members section-->
    <section class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="fw-bolder">Our team</h2>
                <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
            </div>
            <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                    <div class="text-center">
                        <iframe src="https://www.youtube.com/embed/JiV1C4ZIUbE" width="250px" height="200px"></iframe>
                        <h5 class="fw-bolder">Kumon Agency</h5>
                        <div class="fst-italic text-muted">With your pleasure</div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="text-center">
                        <iframe src="https://www.youtube.com/embed/fsd7BlYSho0" width="250px" height="200px"></iframe>
                        <h5 class="fw-bolder">Kumon Agency</h5>
                        <div class="fst-italic text-muted">With your pleasure</div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="text-center">
                        <iframe src="https://www.youtube.com/embed/PKbrFX0mEOM" width="250px" height="200px"></iframe>
                        <h5 class="fw-bolder">Kumon Agency</h5>
                        <div class="fst-italic text-muted">With your pleasure</div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="text-center">
                        <iframe src="https://www.youtube.com/embed/_cRaSUux3xM" width="250px" height="200px"></iframe>
                        <h5 class="fw-bolder">Kumon Agency</h5>
                        <div class="fst-italic text-muted">With your pleasure</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?=template_footer()?>