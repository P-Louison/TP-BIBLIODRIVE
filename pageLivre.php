<?php
    require 'entete.php';
?>
<div class="row container-fluid"> 
    <div class="col-md-10 container-fluid">  
        <?php
            require_once('connexionbase.php');    

            $stmt = $connexion->prepare("SELECT * FROM livre INNER JOIN auteur ON livre.noauteur = auteur.noauteur where auteur.nom like :navBar");
            $stmt->bindValue(":navBar", "%".$_GET['navBar']."%"); 
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            for ($i = 0; $i <= $stmt->rowcount()-1; $i ++) {
                $nom = $stmt->fetch();

                echo '<a href="http://localhost/TP-BIBLIODRIVE/detailLivre.php?titre='.$nom->titre.'"> '.$nom->titre.' ('.$nom->anneeparution.') </a><BR>';
            
            }
        ?>
    </div>
    
    <?php
    require_once 'blocIdentification.php';
    ?>

    
