<section class="py-5">
   
    <form method="POST">
        <div class="container px-4 px-lg-5 my-5 ">
            <?php if (!$isDeleted) { ?>
                <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                    <h1 class="display-7 fw">Are you sure you want to delete event: <b><?= $eventName ?></b>?</h1>
                </div>
                <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                    <div class="col-md-6 align-items-center">
                        <div class="d-flex justify-content-center">
                            <button name="confirm_button" type="submit" class="btn btn-danger" value="confirm" style="width: 60vh;">Confirm</button>
                        </div>
                    </div>
                    <div class="col-md-6 align-items-center">
                        <div class="d-flex justify-content-center">
                            <a name="cancel_button" type="submit" class="btn btn-primary" value="cancel" style="width: 60vh;" href="../">Cancel</a>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                    <h1 class="display-7 fw text-center">Event <b><?= $eventName ?></b> Deleted successfully.</h1>
                </div>
                <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                    <div class="d-flex justify-content-center">
                        <a name="home_button" class="btn btn-light" style="width: 50vh;" href="../">Homepage</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </form>
    <script>
        if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
    </script>
</section>