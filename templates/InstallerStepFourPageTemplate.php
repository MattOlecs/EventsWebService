<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../styles/myStyle.css" rel="stylesheet" />

<section class="py-5">
    <div class="text-center">
        <h1 style="padding-top:5vh">Instalator :: Krok 4</h2>
        <p><?=$installerMessage?></p>
    </div>
    <form method="post">
        <?php if (!$isStepDone) { ?>
            <div class="container px-4 px-lg-5 " style="width: 70vh;">
            <!-- Admin login -->
            <label>Login administratora:</label>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-start">
                <input id="login" name="login" type="text"class="form-control" required>
            </div>
            <!-- Admin email -->
            <label>Email administratora:</label>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <input id="email" name="email" type="email" class="form-control" required>
            </div>
            <!-- Password -->
            <label>Hasło administratora:</label>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <input id="password" name="password" type="password" class="form-control" required>
            </div>
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <div class="d-flex justify-content-center">
                    <button name="submit" type="submit" class="btn btn-primary">Stwórz konto</button>
                </div>
        <?php } else { ?>  
            <div class="d-flex justify-content-center">
                <p>Instalacja zakończona.</p>
            </div>
            <div class="d-flex justify-content-center">
                <p><b>Przed wejściem do serwisu należy usunąć plik installer.php z folderu config/</b</p>
            </div>
            <div class="d-flex justify-content-center">
                <a href="<?=$hrefPrefix?>" class="btn btn-primary">Przejdź do serwisu</a>  
            </div>
        <?php } ?>      
            </div>
        </div>
    </form>
    <script>
        if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
    </script>
</section>