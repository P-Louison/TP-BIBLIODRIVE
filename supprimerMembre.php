<?php
    include 'enteteAdmin.php';
?>
<?php
    if ($_SESSION['profil'] !== "admin"){
        header("Location: http://localhost/TP-BIBLIODRIVE/accueil.php");
    }
?>


    <div class="row container-fluid">
        <div class="col-md-10 texteCentrer">
           
            faire un delete grâce a toutes les infos du membres SANS execption
        </div>

        <?php
            include 'blocIdentification.php';
        ?>
</div>