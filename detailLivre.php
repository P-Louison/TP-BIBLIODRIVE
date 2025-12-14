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
            $_SESSION['PrenomAuteur'] = $livre->prenom;
            $_SESSION['NomAuteur'] = $livre->nom;
            $_SESSION['isbnLivre'] = $livre->isbn13;
            $_SESSION['DetailLivre'] = $livre->detail;
            $_SESSION['PhotoLivre'] = $livre->photo;


            echo '<div class="row container-fluid"> 
                    <div class="col-md-6 container-fluid"> 
                        
                        <h4> Auteur : '.$_SESSION['PrenomAuteur'].'  '.$_SESSION['NomAuteur'].'</h4>
                        <h4>  '.$_SESSION['TitreLivre'].'</h4>
                        <h4> ISBN13 : '.$_SESSION['isbnLivre'].'</h4>

                        <h4>Résumé du livre </h4> <br>
                        <h5>'.$_SESSION['DetailLivre'].'</h5>
                    </div>
                    <div class="col-md-4 container-fluid"> 
                        <img src="./image/'.$_SESSION['PhotoLivre'].'" class="d-block mx-auto" style="width:90%">
                    </div>
                  </div>';

            $num = $livre->nolivre;
            $_SESSION['panier'] = array();
            
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
                            DISPONIBLE    <button type="button" class="btn btn-outline-success" name="btnPanier">Ajouter au panier</button>
                      </div>
                      ';
                    

                if (!isset($_POST['btnPanier']) & (isset($_SESSION['profil']))){
                    echo 'DDDDDDD';
                }
                else{
                    array_push($_SESSION['panier'], $_SESSION['TitreLivre']);
                }
                
                var_dump($_SESSION['panier']);
                         
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