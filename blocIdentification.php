    <div class="col-md-2 container-fluid">

        <?php
            if(isset($_SESSION['profil'])) 
            {
                var_dump($_SESSION['profil']);
                echo 'SORTIE SESSION';
                die();

                /*
                require_once('connexionbase.php');
                $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE nom = :txtNom AND motdepasse = :txtMdp");
                $stmt->setFetchMode(PDO::FETCH_OBJ);
                $stmt->bindValue(':txtNom', $_POST['txtNom']); 
                $stmt->bindValue(':txtMdp', $_POST['txtMdp']);
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
                }*/
            }
            
            else
            {
                echo 'AAAAAA';
                
                if (!isset($_GET['connecter'])){
                        echo '<center>
                        <from action="" method="GET">
                            <h4>Connexion </h4>
                            Identifiant : <input type="text" name="txtNom"><br>
                            Mot de passe : <input type="password" name="txtMdp"> <br>
                        
                            <input type="submit" name="connecter" value="Connexion" >
                        </form>
                        </center>
                            ';
                           
                }
                else
                {
                    require_once 'connexionbase.php';
                    $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE nom = :txtNom AND motdepasse = :txtMdp");
                    $stmt->setFetchMode(PDO::FETCH_OBJ);
                    $stmt->bindValue(":txtNom", $_GET['txtNom']); 
                    $stmt->bindValue(":txtMdp", $_GET['txtMdp']);
                    $stmt->execute();
                    $info = $stmt->fetch();
                
                    if ($info){
                        $_SESSION['txtNom'] = $_GET['txtNom'];
                        $_SESSION['txtMdp'] = $_GET['txtMdp']; 
                        $_SESSION['prenomAuteur'] = $info->prenom;
                        $_SESSION['melAuteur'] = $info->mel;
                        $_SESSION['adresseAuteur'] = $info->adresse;
                        $_SESSION['codepostaleAuteur'] = $info->codepostal;
                        $_SESSION['villeAuteur'] = $info->ville;
                        $_SESSION['profil'] = $info->profil;    
                        var_dump($_SESSION['profil']);
                        
                        
                    } 
                    
                    header("Location: http://localhost/tP-BIBLIODRIVE/accueille.php");
                    
                }      
            }
            
        ?>
       
    </div>        
</div>