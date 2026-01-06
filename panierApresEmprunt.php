
<?php
    include 'entete.php';
?>
<div class="row container-fluid">
    <div class="col-md-10">
        <?php

            unset($_SESSION['panier']);
            $_SESSION['panier'] = array();
            echo '<div class="texteCentrer">
                    <h2> Votre panier </h2>
                    Tout le panier à bien été emprunté
                    <br><br>
                    <a href="http://localhost/TP-BIBLIODRIVE/accueil.php"> <input type="submit" class="btn btn-outline-warning" value="Retour au site" > </a>
            </div>
            ';
        ?>
    </div>

    <?php
        require 'blocIdentification.php';
    ?>
<?php
    include 'piedDePage.html';
?>