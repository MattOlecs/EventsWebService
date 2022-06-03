<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<section class="py-5">
    <form method="post">
        <div class="container px-4 px-lg-5 " style="width: 70vh;">
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <label>Event name:</label>
                <input id="name" name="name" type="text" placeholder="Name" class="form-control" required>
            </div>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <label>Event description:</label>
                <textarea id="description" name="description" placeholder="Description" cols="40" rows="5" class="form-control" required></textarea>
            </div>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <label>Event date:</label>
                <input id="date" name="date" type="date" class="form-control" required>
            </div>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <label>Event time:</label>
                <input id="time" name="time" type="time" class="form-control" required>
            </div>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <button name="submit" type="submit" class="btn btn-primary">Create event</button>
            </div>
        </div>
    </form>
    <script>
        if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
    </script>
</section>