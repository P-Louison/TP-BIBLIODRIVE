
    
<?php
    require 'enteteAdmin.php';
?>
    
    <div class="row container-fluid">
        <div class="col-md-10 texteCentrer">
            <h1> Menu Administrateur </h1>
            <h3> liste des livres présents dans la Bibliothèque </h3>
        
            <div class="row container-fluid">
                <?php
                
                require_once('connexionbase.php'); 
                $stmt = $connexion->prepare("SELECT nom, photo, titre FROM auteur INNER JOIN livre ON auteur.noauteur=livre.noauteur");
                $stmt->setFetchMode(PDO::FETCH_OBJ);
                $stmt->execute();
                

                
                for ($i = 0; $i < $stmt->rowcount(); $i++){ 
                $info = $stmt->fetch();   
                echo '
            
                <div class="col-md-3 texteCentrer caseBlocIdentification">
                    <img src="./image/'.$info->photo.'" class="taille-Image-Carroussel" >
                    <br>
                    <a href="http://localhost/TP-BIBLIODRIVE/detailLivreAdmin.php?titre='.$info->titre.'"> <button class="btn btn-outline-success" type="button">'.$info->titre.' </button>  </a>
                </div>';
                }
                
                ?>
            </div>
            
            
        </div>

        <?php
            include 'blocIdentification.php';
        ?>
    </div>
<?php
    include 'piedDePage.html';
?>

