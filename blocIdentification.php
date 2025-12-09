    
    <div class="col-md-2 container-fluid">

        <?php

            if(!isset($_POST['btnEnvoyer'])) 
            {
                echo '
                <h4>Connexion </h4>
                <form action="" method="post">
                Identifiant : <input type="text" name="txtNom"><br>
                Mot de passe : <input type="password" name="txtMdp"><br>
                <br>
                <input type="submit" name="btnEnvoyer" value="Connexion" >
                </form>';
                $_SESSION['profil'] = "";
                

                
            }

            else 
            {
                require_once('connexionbase.php');
                $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE nom = :txtNom AND motdepasse = :txtMdp");
                $stmt->bindValue(":txtNom", $_POST['txtNom']); 
                $stmt->bindValue(":txtMdp", $_POST['txtMdp']); 
                $stmt->setFetchMode(PDO::FETCH_OBJ);
                $stmt->execute();
                $info = $stmt->fetch();

                if($info)
                {          
                    if(!isset($_POST['btnDeconnexion'])){             
                    
                        echo ' <p>'.$info->prenom.'  '.$info->nom.'</p>
                        <p>'.$info->mel.'</p>
                        <p>'.$info->adresse.'</p>
                        <p>'.$info->codepostal.' '.$info->ville.'</p>    
                        <input type="submit" name="deconnexion" value="déconnexion">
                        bouton deconnexion a finir, ne renvoie pas le lien
                        ';
                    }
                    else{
                        header("Location: http://localhost/tP-BIBLIODRIVE/accueille.php");
                        $_SESSION['profil'] = "";
                    }



                    $_SESSION['profil'] = $info->profil;
                    
                    if ($_SESSION['profil'] == "admin"){
                        header("Location: http://localhost/tP-BIBLIODRIVE/menuAdmin.php");
                    }

                }
                else
                {
                    
                    if (!isset($_POST['reessaye'])){
                    echo ' <p> identifiant ou le mot de passe est différent </p>
                          <form method="post">
                          <input type="submit" name="reessaye" value="réessayer">
                          </form>
                          ';  
                    }          
                    else{
                        header("Location: http://localhost/tP-BIBLIODRIVE/accueille.php");
                    }              
                }  
                
            }
            
        ?>
       
    </div>        
</div>

