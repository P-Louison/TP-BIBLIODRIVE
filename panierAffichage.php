<?php
    require 'entete.php';
?>

<div class="row container-fluid"> 
    <div class="col-md-10 container-fluid " style="text-align: center;">  
        <h2> Votre panier </h2>
        
        <?php
        var_dump($_SESSION['panier']);
            for($x = 0; $x < count($_SESSION['panier']); $x++) {

                echo '<a href="http://localhost/TP-BIBLIODRIVE/detailLivre.php?titre='.$_SESSION['panier'][$x].'"> '.$_SESSION['panier'][$x].' </a>';

            }

        ?>
    </div>
    
    <?php
    require_once 'blocIdentification.php';
    ?>
