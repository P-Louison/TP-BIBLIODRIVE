    
    <div class="col-md-2">
        <div class="row container-fluid caseBlocIdentification ">
            <?php

                if(isset($_SESSION['profil']) && ($_SESSION['profil'] != "")) 
                {
                    echo '<center> <p> '.$_SESSION['prenomAuteur'].'  '.$_SESSION['txtNom'].'</p>
                        <p class="centrer-mail">'.$_SESSION['melAuteur'].'</p>
                        <p>'.$_SESSION['adresseAuteur'].'</p>
                        <p>'.$_SESSION['codepostaleAuteur'].' '.$_SESSION['villeAuteur'].'</p> 
                        </center>'; 

                    if(!isset($_POST['btndeconnexion'])){             
                        echo '<center>
                        <form method="post">
                        <input type="submit" class="btn btn-outline-danger" name="btndeconnexion" value="déconnexion" >
                        </form>
                        </center>';
                    }
                    else{
                        session_destroy();
                        echo '<script> location.replace("http://localhost/TP-BIBLIODRIVE/accueil.php") </script>';
                        
                    }

                    
                }
                else 
                {
                    if (!isset($_POST['connecter'])){
                        echo '
                        <h4>Connexion </h4>
                        <form action="" method="post">
                            Identifiant : <input type="text" name="txtNom" class="form-control"><br>
                            Mot de passe : <input type="password" name="txtMdp" class="form-control"> <br>
                            
                            <input type="submit" class="btn btn-outline-success" name="connecter" value="Connexion" >
                            <br>
                            <br>
                        </form>';
                        $_SESSION['profil'] = "";
                        $_SESSION['panier'] = "";
                        
                    }
                    else{

                        require_once('connexionbase.php');
                        $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE nom = :txtNom AND motdepasse = :txtMdp");
                        $stmt->setFetchMode(PDO::FETCH_OBJ);
                        $stmt->bindValue(":txtNom", $_POST['txtNom']); 
                        $stmt->bindValue(":txtMdp", $_POST['txtMdp']); 
                        $stmt->execute();
                        $info = $stmt->fetch();
                        
                        if($info)
                        {          
                            $_SESSION['txtNom'] = $info->nom;
                            $_SESSION['txtMdp'] = $info->motdepasse; 
                            $_SESSION['prenomAuteur'] = $info->prenom;
                            $_SESSION['melAuteur'] = $info->mel;
                            $_SESSION['adresseAuteur'] = $info->adresse;
                            $_SESSION['codepostaleAuteur'] = $info->codepostal;
                            $_SESSION['villeAuteur'] = $info->ville;
                            $_SESSION['profil'] = $info->profil;
                            $panier = array();
                            $_SESSION['panier'] = $panier;
                            $_SESSION['posLibre'] = 0;
                            

                            if ($_SESSION['profil'] == "admin"){
                                header("Location: http://localhost/TP-BIBLIODRIVE/menuAdmin.php");
                            }
                            else{
                                header("Location: http://localhost/TP-BIBLIODRIVE/accueil.php");
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
                                header("Location: http://localhost/TP-BIBLIODRIVE/accueil.php");
                            }          
                                        
                        } 
                        
                        
                        
                    }  
                    
                }    
            ?>     
        </div>    
    </div>    
</div>

