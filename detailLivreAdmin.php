<?php
    require 'enteteAdmin.php';
?>

<?php
    if ($_SESSION['profil'] !== "admin"){
        header("Location: http://localhost/TP-BIBLIODRIVE/accueil.php");
    }
?>

<div class="row container-fluid"> 
    <div class="col-md-10 container-fluid">  
        <?php
            require_once('connexionbase.php');    

            $stmt = $connexion->prepare("SELECT * FROM livre INNER JOIN auteur ON livre.noauteur = auteur.noauteur where nolivre = :num ");
            $stmt->bindValue(":num", $_GET['nolivre']); 
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            $livre = $stmt->fetch();
            
            echo '<div class="row container-fluid"> 
                    <div class="col-md-6 container-fluid"> 
                        
                        <h4> Auteur : '.$livre->prenom.'  '.$livre->nom.'</h4>
                        <h4>  '.$livre->titre.'</h4>
                        <h4> ISBN13 : '.$livre->isbn13.'</h4>

                        <h4>Résumé du livre </h4> <br>
                        <h5>'.$livre->detail.'</h5>
                    </div>
                    <div class="col-md-4 container-fluid"> 
                        <img src="./image/'.$livre->photo.'" class="d-block mx-auto tailleImage">
                    </div>
                  </div>';
        ?>
    </div>
    <?php
        require_once 'blocIdentification.php';
    ?>
<?php
    include 'piedDePage.html';
?>