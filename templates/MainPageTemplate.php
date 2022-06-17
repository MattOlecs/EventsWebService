<!-- Section-->
<div class="text-center">
    <?php
    if ($loginInfo) { ?>
        <p class="lead fw-normal mb-0">Welcome back <?= $user['login'] ?> :)</p>
    <?php } ?>
</div>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($events as $event) { ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://source.unsplash.com/random/600x500/?img=<?= $event['id'] ?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $event['title'] ?></h5>
                                <!-- Product price-->
                                <?= $event['description'] ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto" href="/event-details/<?= $event['id'] ?>">Details</a>
                                <?php if($loginInfo != 0) {?>
                                    <form method="post">
                                        <button class="btn btn-outline-dark mt-auto" type="submit" name="event_id" value=<?= $event['id'] ?>>
                                            <?php if(in_array($event['id'], array_values($favouriteEvents))) {?>
                                                <i class="bi bi-x-circle-fill"></i>
                                            <?php } else {?>
                                                <i class="bi bi-heart-fill"></i>
                                            <?php }?>
                                        </button>
                                    <form>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script>
        if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
    </script>
</section>