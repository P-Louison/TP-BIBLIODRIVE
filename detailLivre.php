<?php
    require 'entete.php';
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

            echo date("Y-d-m");

            echo '<div class="row container-fluid"> 
                    <div class="col-md-6 container-fluid"> 
                        
                        <h4> Auteur : '.$livre->prenom.'  '.$livre->nom.'</h4>
                        <h3> ISBN13 : '.$livre->isbn13.'</h3>

                        <h4>Résumé du livre </h4> <br>
                        <h5>'.$livre->detail.'</h5>
                    </div>
                    <div class="col-md-4 container-fluid"> 
                        
                        <h3>'.$livre->prenom.'  '.$livre->nom.'</h3><br>
                        <h5>  '.$livre->titre.'</h5><br>
                        <img src="./image/'.$livre->photo.'" class="d-block mx-auto" style="width:60%">
                    </div>
                  </div>';

            $num = $livre->nolivre;
            
            $stmt = $connexion->prepare("SELECT * FROM emprunter where emprunter.nolivre = :nolivre order by dateemprunt desc");
            $stmt->bindValue(":nolivre", $num); 
            $stmt->setFetchMode(PDO::PARAM_INT);
            $stmt->execute();
            $present = $stmt->fetch();
//______________________________________PAS CONNECTE_______________________________________________________________________           
            if (($_SESSION['profil'] == "" && $present && $present->dateretour != NULL ) || (!$present)){
                echo '<div>
                            disponible
                      </div>
                          Veuiller vous connecter avant de pouvoir emprunter un livre';
            }
            elseif (($_SESSION['profil'] == "" && $present && $present->dateretour == NULL ) || (!$present)) {
                echo '<div>
                            indisponible
                      </div>
                          Veuiller vous connecter avant de pouvoir emprunter un livre';
            }

//____________________________________CLIENT_________________________________________________________________________
            if (($_SESSION['profil'] == "client" && $present && $present->dateretour != NULL ) || (!$present)){
                echo '<div>
                            DISPONIBLE       <button type="button" class="btn btn-outline-success">Ajouter au panier</button>
                      </div>
                      ';
                         
            }
            elseif (($_SESSION['profil'] == "client" && $present && $present->dateretour == NULL ) || (!$present)) {
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