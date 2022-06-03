<section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1">Organizer: <?= $creator ?></div>
                    <h1 class="display-5 fw-bolder"><?= $event['name'] ?></h1>
                    <div class="fs-5 mb-5">
                        <span><?= $event['date'] ?></span>
                    </div>
                    <p class="lead"><?= $event['description'] ?></p>
                    <div class="d-flex">
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            Register
                            <i class="bi-cart-fill me-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</section>