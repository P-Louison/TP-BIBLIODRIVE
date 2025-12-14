    
    <div class="col-md-2 container-fluid" style="text-align: center;">

        <?php

            if(!isset($_POST['btnEnvoyer'])) 
            {
                echo '
                <h4>Connexion </h4>
                <form action="" method="post">
                Identifiant : <input type="text" name="txtNom"><br>
                Mot de passe : <input type="password" name="txtMdp"> <br>
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
                    if(!isset($_POST['btndeconnexion'])){             
                    
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








  <div class="col-md-2 container-fluid">

        <?php
        session_start();

            if(isset($_SESSION['profil'])) 
            {

                require_once('connexionbase.php');
                $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE nom = :txtNom AND motdepasse = :txtMdp");
                $stmt->bindValue(":txtNom", $_POST['txtNom']); 
                $stmt->bindValue(":txtMdp", $_POST['txtMdp']);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
                $stmt->execute();
                $info = $stmt->fetch();
            
                if ($info){
                    echo '<center> <p> '.$_SESSION['prenomAuteur'].'  '.$_SESSION['txtNom'].'</p>
                    <p>'.$_SESSION['melAuteur'].'</p>
                    <p>'.$_SESSION['adresseAuteur'].'</p>
                    <p>'.$_SESSION['codepostaleAuteur'].' '.$_SESSION['villeAuteur'].'</p>   
                    <form method="post">
                        <input type="submit" name="btndeconnexion" value="déconnexion">
                    </form>
                    </center>
                    ';
                    if(isset($_POST['btndeconnexion'])){             
                    session_destroy();
                    }
                }
            }
            
            else
            {
                
                
                if (!isset($_POST['btnEnvoyer']))
                    {
                        echo '
                            <h4>Connexion </h4>
                            <form action="" method="post">
                            Identifiant : <input type="text" name="txtNom"><br>
                            Mot de passe : <input type="password" name="txtMdp"> <br>
                            <br>
                            <input type="submit" name="btnEnvoyer" value="Connexion" >
                            </form>
                            ';
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
                
                    if ($info){
                        $_SESSION['txtNom'] = $info->nom;
                        $_SESSION['txtMdp'] = $info->motdepasse; 
                        $_SESSION['prenomAuteur'] = $info->prenom;
                        $_SESSION['melAuteur'] = $info->mel;
                        $_SESSION['adresseAuteur'] = $info->adresse;
                        $_SESSION['codepostaleAuteur'] = $info->codepostal;
                        $_SESSION['villeAuteur'] = $info->ville;
                        $_SESSION['profil'] = $info->profil;              
                        
                        
                    } 
                    else {
                        if (!isset($_POST['reessaye']))
                            {
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
                    header("Location: http://localhost/tP-BIBLIODRIVE/blocIdentification.php");
                    
                }      
            }
            
        ?>
       
    </div>        
</div>