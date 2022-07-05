<link href="../styles/myStyle.css" rel="stylesheet" />

<div class="text-center">
    <h5 class="lead" style="padding-top:5vh">Error - Unknown request!</h5>
    
    <p class="lead fw-normal mb-0" style="padding-bottom:2vh">
        <?php if (!is_null($errorMessage)) { ?>
            <?= $errorMessage ?>
        <?php } ?>
    </p>
   
    <a href="<?= $hrefPrefix ?>" style="padding-top:10vh"><button class="btn btn-primary" >Homepage</button></a>
</div>