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

            $stmt = $connexion->prepare("SELECT * FROM livre INNER JOIN auteur ON livre.noauteur = auteur.noauteur where titre = :titre ");
            $stmt->bindValue("titre", $_GET['titre']); 
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            $livre = $stmt->fetch();
            $_SESSION['TitreLivre'] = $livre->titre;
            $_SESSION['PrenomAuteur'] = $livre->prenom;
            $_SESSION['NomAuteur'] = $livre->nom;
            $_SESSION['isbnLivre'] = $livre->isbn13;
            $_SESSION['DetailLivre'] = $livre->detail;
            $_SESSION['PhotoLivre'] = $livre->photo;
            $_SESSION['nolivre'] = $livre->nolivre;
            $_SESSION['anneeparution'] = $livre->anneeparution;

            echo '<div class="row container-fluid"> 
                    <div class="col-md-6 container-fluid"> 
                        
                        <h4> Auteur : '.$_SESSION['PrenomAuteur'].'  '.$_SESSION['NomAuteur'].'</h4>
                        <h4>  '.$_SESSION['TitreLivre'].'</h4>
                        <h4> ISBN13 : '.$_SESSION['isbnLivre'].'</h4>

                        <h4>Résumé du livre </h4> <br>
                        <h5>'.$_SESSION['DetailLivre'].'</h5>
                    </div>
                    <div class="col-md-4 container-fluid"> 
                        <img src="./image/'.$_SESSION['PhotoLivre'].'" class="d-block mx-auto tailleImage">
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