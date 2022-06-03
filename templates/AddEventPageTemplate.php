<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<section class="py-5">
    <form method="post">
        <div class="container px-4 px-lg-5 " style="width: 70vh;">
            <?php if (!$isCreated) { ?>
                <!-- Name input -->
                <label>Event name:</label>
                <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-start">
                    <input id="name" name="name" type="text" placeholder="Name" class="form-control" required>
                </div>
                <!-- Description input -->
                <label>Event name:</label>
                <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                    <textarea id="description" name="description" placeholder="Description" cols="40" rows="5" class="form-control" required></textarea>
                </div>
                <!-- Date input -->
                <label>Event date:</label>
                <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                    <input id="date" name="date" type="date" class="form-control" required>
                </div>
                <!-- Time input -->
                <label>Event time:</label>
                <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                    <input id="time" name="time" type="time" class="form-control" required>
                </div>
                <!-- Button -->
                <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                    <button name="submit" type="submit" class="btn btn-primary">Create event</button>
                </div>
            <?php } else{ ?>
                <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                    <h1 class="display-7 fw text-center">Event created successfully.</h1>
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