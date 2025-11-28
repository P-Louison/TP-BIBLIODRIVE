<?php
    include 'entete.php';
?>

<div class="row container-fluid"> 
    <div class="col-md-10 container-fluid">  
        <?php
            require_once('connexionbase.php');    

            $stmt = $connexion->prepare("SELECT * FROM livre INNER JOIN auteur ON livre.noauteur = auteur.noauteur where livre.titre = :titre ");
            $stmt->bindValue(":titre", $_GET['titre']); 
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
                        <img src="./image/'.$livre->photo.'" class="d-block mx-auto" style="width:80%">
                    </div>
                    


                  </div>';
            
        ?>


        



    </div>
<?php
    include 'blocIdentification.php';
    ?>