<!-- Section-->
<div class="text-center">
        <?php
            if ($loginInfo) {?>
            <p class="lead">Dzień doberek: <?=$user['login']?> :)</p>
            <?php }?>
        </div>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach ($users as $user) { ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="http://rndimg.com/ImageStore/OilPaintingBlue/500x500_OilPaintingBlue_513a2e003a55426a8b7f74b6f15229dd.jpg" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?=$user['login']?></h5>
                                        <!-- Product price-->
                                        <?=$user['email']?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                                </div>
                            </div>
                        </div>    
                    <?php } ?>
                </div>
            </div>
        </section>