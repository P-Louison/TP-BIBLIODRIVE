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

            
            
            $stmt = $connexion->prepare("SELECT * FROM emprunter INNER JOIN livre ON emprunter.nolivre = livre.titre = :titre");
            $stmt->bindValue(":titre", $_GET['titre']); 
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            $present = $stmt->fetch();
//_____________________________________ADMIN________________________________________________________________________
            if ($_SESSION['profil'] == "admin" && $present == NULL ){
                echo '<div>
                        Indisponible 
                      </div>';
            }
            if ($_SESSION['profil'] == "admin" && $present ){
                echo '<div>
                        Disponible 
                      </div>';
            }
//______________________________________PAS CONNECTE_______________________________________________________________________           
            if ($_SESSION['profil'] == "" && $present == NULL){


                echo '<div>
                        Indisponible 
                      </div>
                          Veuiller vous connecter avant de pouvoir emprunter un livre';
            }
            if ($_SESSION['profil'] == "" && $present){
                echo '<div>
                        Disponible 
                      </div>
                          Veuiller vous connecter avant de pouvoir emprunter un livre';
            }
//____________________________________CLIENT_________________________________________________________________________
            if ($_SESSION['profil'] == "client" && $present == NULL && !isset($_POST['btnEnvoyer'])){
                echo '<div>
                        Indisponible 
                      </div>';
            }
            if ($_SESSION['profil'] == "client" && $present ){
                header("Location: http://localhost/TP-BIBLIODRIVE/accueille.php");
                
                echo '<div>
                        Disponible 
                      </div>';
            }





        ?>
    </div>
    <?php
        include_once 'blocIdentification.php';
    ?>