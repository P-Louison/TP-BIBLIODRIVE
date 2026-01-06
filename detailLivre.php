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

            
            
            
            $stmt = $connexion->prepare("SELECT * FROM emprunter where emprunter.nolivre = :nolivre order by dateemprunt desc");
            $stmt->bindValue(":nolivre", $_SESSION['nolivre']); 
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
                        if ($_SESSION['panier'][$x][0] == $_SESSION['nolivre']){
                            $dansLePanier = True;
                        }
                            
                    }

                if (isset($_POST['btnPanier']) && $dansLePanier == False && (count($_SESSION['panier'])<6)){

                    $_SESSION['panier'][] = array($_SESSION['nolivre'] ,$_SESSION['PrenomAuteur'], $_SESSION['NomAuteur'], $_SESSION['TitreLivre'], $_SESSION['anneeparution']);
                    echo 'Livre ajouté au panier !';
                    
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