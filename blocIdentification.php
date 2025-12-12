<div class="col-md-2 container-fluid">

        <?php

            if(isset($_SESSION['profil'])) 
            {
                echo 'AAAAAAAA';
                if ($_SESSION['profil'] == "admin"){
                    header("Location: http://localhost/tP-BIBLIODRIVE/menuAdmin.php");
                }
                
                if(!isset($_POST['btndeconnexion'])){             
                    
                    echo 'BBBBBBBBBBBBBBB';

                    echo ' <p> '.$_SESSION['prenomAuteur'].'  '.$_SESSION['txtNom'].'</p>
                    <p>'.$_SESSION['melAuteur'].'</p>
                    <p>'.$_SESSION['adresseAuteur'].'</p>
                    <p>'.$_SESSION['codepostaleAuteur'].' '.$_SESSION['villeAuteur'].'</p>   
                    <form method="post">
                        <input type="submit" name="btndeconnexion" value="déconnexion">
                    </form>
                    ';
                }
                else
                    {
                    session_destroy();
                }
            }
            
            else
            {
                echo 'CCCCCCCCCCC';
                
                if (!isset($_POST['btnEnvoyer']))
                    {
                        echo 'DDDDDDDDDDDD';
                        

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

                    

                    echo 'SSSSSSSSSSSSSSSSSS';
                    
                    
                
                    if ($info){
                        $_SESSION['txtNom'] = $info->nom;
                        $_SESSION['txtMdp'] = $info->motdepasse; 
                        $_SESSION['prenomAuteur'] = $info->prenom;
                        $_SESSION['melAuteur'] = $info->mel;
                        $_SESSION['adresseAuteur'] = $info->adresse;
                        $_SESSION['codepostaleAuteur'] = $info->codepostal;
                        $_SESSION['villeAuteur'] = $info->ville;
                        $_SESSION['profil'] = $info->profil;

                        echo 'LLLLLLLLLLLLLLLLL';
                       
                        
                        
                    } 
                    else {
                        if (!isset($_POST['reessaye']))
                            {
                                echo 'VVVVVVVVVVVV';
                                var_dump($_SESSION);
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
            }
            
        ?>
       
    </div>        
</div>