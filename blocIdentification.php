    
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
                    echo '<p>'.$info->prenom.'  '.$info->nom.'</p>
                    <p>'.$info->mel.'</p>
                    <p>'.$info->adresse.'</p>
                    <p>'.$info->codepostal.' '.$info->ville.'</p>    
                    ';
                }
                else
                {
                    echo "l'identifiant ou le mot de passe est différent";

                }  
            }
            
                      
        ?>
       
    </div>        
</div>

