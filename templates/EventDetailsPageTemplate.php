<link href="../styles/myStyle.css" rel="stylesheet" />

<section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <?php if ($isCreator or $isAdmin) { ?>
                <div class="row gx-4 gx-lg-5 align-items-right" style="width: 11vh;">
                    <a class="btn btn-danger" href="<?= $hrefPrefix ?>delete-event/<?= $event['id'] ?>">Delete event <i class="bi bi-calendar-x-fill"></i></a>
                </div>
            <?php } ?>
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-5"><img class="card-img-top mb-5 mb-md-0" src="https://source.unsplash.com/random/600x700/?img=1" alt="..." /></div>
                <div class="col-md-4">
                    <div class="small mb-1">Organizer: <?= $creator ?></div>
                    <h1 class="display-5 fw-bolder"><?= $event['title'] ?></h1>
                    <div class="fs-5 mb-5">
                        <span><?= $event['date'] ?></span>
                    </div>
                    <p class="lead"><?= $event['description'] ?></p>
                    <!-- Registration button -->
                    <form method="post">
                        <div class="d-flex">
                            <?php if ($loginInfo != 0) { ?>
                                <?php if ($isRegistered) { ?>
                                    <button class="btn btn-outline-danger flex-shrink-0" type="submit">    
                                    Unregister
                                    <i class="bi bi-x-lg"></i>
                                    </button>
                                <?php } else {?>
                                    <button class="btn btn-outline-dark flex-shrink-0" type="submit">    
                                    Register
                                    <i class="bi bi-check-lg"></i>
                                    </button>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <form>
                    <!-- List of registered users -->
                </div>
                <div class="col-md-3 align-self-start overflow-auto" style="height: 50vh;">
                <p>Registered users:</p>
                <?php if (Count($registeredUsers) > 0) { ?>
                    <ul class="list-group">
                        <?php foreach ($registeredUsers as $user) { ?>
                            <li class="list-group-item"><?= $user['login'] ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } else { ?>
                    <div class="small mb-1">There are no registered users for this event yet.</div>
                <?php } ?>
            </div>
        </div>
    <script>
        if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
    </script>
</section>