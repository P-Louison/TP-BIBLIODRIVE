<?php
    require 'entete.php';
?>

<div class="row container-fluid"> 
    <div class="col-md-10 container-fluid">  
        <?php
            require_once('connexionbase.php');    

            $stmt = $connexion->prepare("SELECT * FROM livre INNER JOIN auteur ON livre.noauteur = auteur.noauteur where nolivre = :num ");
            $stmt->bindValue("num", $_GET['nolivre']); 
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
      
            $stmt = $connexion->prepare("SELECT * FROM emprunter where emprunter.nolivre = :nolivre order by dateemprunt desc");
            $stmt->bindValue(":nolivre", $livre->nolivre); 
            $stmt->setFetchMode(PDO::PARAM_INT);
            $stmt->execute();
            $present = $stmt->fetch();
//______________________________________PAS CONNECTE_______________________________________________________________________           
            if (($_SESSION['profil'] == "" && ($present && $present->dateretour != NULL )) || ($_SESSION['profil'] == "")&&(!$present)){
                echo '<div>
                            disponible
                      </div>
                          Veuiller vous connecter avant de pouvoir emprunter un livre';
            }
            elseif (($_SESSION['profil'] == "" && $present && $present->dateretour == NULL ) || ($_SESSION['profil'] == "")&&(!$present)) {
                echo '<div>
                            indisponible
                      </div>
                          Veuiller vous connecter avant de pouvoir emprunter un livre';
            }

//____________________________________CLIENT_________________________________________________________________________
            if (($_SESSION['profil'] == "client" && $present && $present->dateretour != NULL ) || ($_SESSION['profil'] == "client")&&(!$present)){
                echo '<div>
                            DISPONIBLE    
                            <form action="" method="post" >
                            <input type="submit" class="btn btn-outline-success" name="btnPanier" value="Ajouter au panier" >
                        </form>
                      </div>
                      ';      
                $dansLePanier = False;
                for($x = 0; $x < count($_SESSION['panier']); $x++){
                        if ($_SESSION['panier'][$x][0] == $livre->nolivre){
                            $dansLePanier = True;
                        }
                            
                    }

                if (isset($_POST['btnPanier']) && $dansLePanier == False && (count($_SESSION['panier'])<6)){

                    $_SESSION['panier'][] = array($livre->nolivre ,$livre->prenom, $livre->nom, $livre->titre, $livre->anneeparution);
                    echo 'Livre ajouté au panier !
                          <a href="http://localhost/TP-BIBLIODRIVE/accueil.php"> <input type="submit" class="btn btn-outline-success" value="retour accueil" > </a>

                    ';
                    
                    
                }
                elseif (isset($_POST['btnPanier']) && $dansLePanier == True) {
                        echo 'Le livre est déjà dans le panier !';
                }
                elseif (isset($_POST['btnPanier']) && count($_SESSION['panier'])>5) {
                        echo 'Le panier est plein, vous ne pouvez plus y ajouter de livre !';
                }
                
                         
            }
            elseif (($_SESSION['profil'] == "client" && $present && $present->dateretour == NULL ) || ($_SESSION['profil'] == "client")&&(!$present)) {
                echo '<div>
                            indisponible
                      </div>
                          ';
            }





        ?>
    </div>
    <?php
        require_once 'blocIdentification.php';
    ?>
<?php
    include 'piedDePage.html';
?>