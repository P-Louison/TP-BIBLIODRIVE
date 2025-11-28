<?php
    include 'entete.php';
?>
<div class="row container-fluid"> 
    <div class="col-md-10 container-fluid">  
        <?php
            require_once('connexionbase.php');    
            $recherche = $_GET['navBar'];

            $stmt = $connexion->prepare("SELECT * FROM livre INNER JOIN auteur ON livre.noauteur = auteur.noauteur where auteur.nom like :navBar");
            $stmt->bindValue(":navBar", "%".$_GET['navBar']."%"); 
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            for ($i = 0; $i <= $stmt->rowcount()-1; $i ++) 
            {
                $nom = $stmt->fetch();

                echo "<a href='http://localhost/TPPHP/TP%20BIBLIODRIVE/detailLivre.php?titre=".$nom->titre."'>".$nom->titre.' ('.$nom->anneeparution.')</a><BR>';
            }
        ?>
    </div>
    
    <?php
    include 'blocIdentification.php';
    ?>

    
