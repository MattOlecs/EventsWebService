<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<section class="py-5">
    <div class="text-center">
        <h1 style="padding-top:5vh">Instalator :: Krok 2</h2>
        <p><?=$installerMessage?></p>
    </div>
    <form method="post">
        <div class="container px-4 px-lg-5 " style="width: 70vh;">
            <!-- Server name -->
            <label>Nazwa lub adres serwera:</label>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-start">
                <input id="host" name="host" type="text"class="form-control" required>
            </div>
            <!-- Database name -->
            <label>Nazwa bazy danych</label>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <input id="dbname" name="dbname" type="text" class="form-control" required>
            </div>
            <!-- Username -->
            <label>Nazwa użytkownika:</label>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <input id="user" name="user" type="text" class="form-control" required>
            </div>
            <!-- Password -->
            <label>Hasło:</label>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <input id="password" name="password" type="password" class="form-control" required>
            </div>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <div class="d-flex justify-content-center">
                    <?php if ($isStepDone) { ?>
                        <a href="3" class="btn btn-primary">Następny krok</a>
                    <?php } else {?>
                        <button name="submit" type="submit" class="btn btn-primary">Zapisz dane</button>
                    <?php }?>
                </div>
            </div>
        </div>
    </form>
    <script>
        if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
    </script>
</section>