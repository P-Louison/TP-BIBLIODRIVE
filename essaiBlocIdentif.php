    
    <div class="col-md-2 container-fluid">
        
        <?php

            if($_SESSION['profil'] == "") 
            {
                echo '
                <h4>Connexion </h4>
                <form action="" method="post">
                Identifiant : <input type="text" name="txtNom"><br>
                Mot de passe : <input type="password" name="txtMdp"> <br>
                <br>
                <input type="submit" name="btnEnvoyer" value="Connexion" >
                </form>';
                $_SESSION['nomprofil'] = $_POST['txtNom']
                $_SESSION['mdpprofil'] = $_POST['txtMdp']
                                          
            }

            else 
            {
                require_once('connexionbase.php');
                $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE nom = :txtNom AND motdepasse = :txtMdp");
                $stmt->bindValue(":txtNom", $_SESSION['nomprofil']); 
                $stmt->bindValue(":txtMdp", $_SESSION['mdpprofil']); 
                $stmt->setFetchMode(PDO::FETCH_OBJ);
                $stmt->execute();
                $info = $stmt->fetch();
                $_SESSION['profil'] = $info->profil;

                if($info)
                {          
                    if($_SESSION['profil'] == "client" & $_SESSION['profil'] != "admin"){             
                    
                        echo ' <p>'.$info->prenom.'  '.$info->nom.'</p>
                        <p>'.$info->mel.'</p>
                        <p>'.$info->adresse.'</p>
                        <p>'.$info->codepostal.' '.$info->ville.'</p>   
                        <form method="post">
                          <input type="submit" name="btndeconnexion" value="déconnexion">
                        </form>
                        ';
                    }
                    else{
                        $_SESSION['profil'] = "";
                        header("Location: http://localhost/tP-BIBLIODRIVE/accueille.php");
                        
                    }

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

