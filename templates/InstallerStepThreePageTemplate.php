<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<section class="py-5">
    <form method="post">
        <div class="container px-4 px-lg-5 " style="width: 70vh;">
            <div class="row gx-4 gx-lg-5 px-4 p-2 align-items-center">
                <div class="d-flex justify-content-center">
                    <?php if ($isDataSet) { ?>
                        <a href="installer/4" class="btn btn-primary">Następny krok</a>
                    <?php }else { ?>
                        <button name="submit" type="submit" class="btn btn-primary">Stwórz oraz uzupełnij bazę danych</button>
                    <?php } ?>
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