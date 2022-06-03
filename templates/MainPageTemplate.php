
<!-- Section-->
<div class="text-center">
    <p class="lead">Dzień doberek: <?=$user['first_name'] . ' ' . $user['last_name']?> :)</p>
    <?php echo 'PHP version: ' . phpversion();?>
</div>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($events as $event) { ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://source.unsplash.com/random/600x500/?img=<?=$event['id']?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?=$event['name']?></h5>
                                <!-- Product price-->
                                <?=$event['description']?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/event-details/<?=$event['id']?>">Details</a></div>
                        </div>
                    </div>
                </div>    
            <?php } ?>
        </div>
    </div>
</section>
