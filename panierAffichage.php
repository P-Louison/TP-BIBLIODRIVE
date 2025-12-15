<?php
    require 'entete.php';
?>

<div class="row container-fluid"> 
    <div class="col-md-10 container-fluid " style="text-align: center;">  
        <h2> Votre panier </h2>
        
        <?php
            if (isset($_SESSION['panier'])){
                for($x = 0; $x < count($_SESSION['panier']); $x++) {
                echo '<a href="http://localhost/TP-BIBLIODRIVE/detailLivre.php?titre='.$_SESSION['panier'][$x].'"> '.$_SESSION['panier'][$x].' </a><br>';
                }
                
            }
            else{
                
                echo 'le panier est vide';
            }
            
            if(!isset($_POST['btnViderPanier'])){             
                    echo '
                    <form method="post">
                    <input type="submit" name="btnViderPanier" value="Vider le panier">
                    </form>
                    ';
                }
                else{
                    unset($_SESSION['panier']);
                    header("Location: http://localhost/TP-BIBLIODRIVE/acceuille.php");   
                }
        
        
        ?>
    </div>
    
    <?php
    require_once 'blocIdentification.php';
    ?>
