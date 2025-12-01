
    <div class="col-md-2 container-fluid">
        
        <h4> Se connecter </h4>
        <br>
        identifiant : <input type="text" name="identifiant">
        <br> 
        Mot de Passe : <input type="text" name="motdepasse">
        <br>
        <input type="submit" value="Connexion" name=btnEnvoyer>






        <?php

 

        if(!isset($_POST['btnEnvoyer'])) 
        {/* L'entrée btnEnvoyer est vide = le formulaire n'a pas été posté, on affiche le formulaire */
            echo '
            <form action="" method="post">
            Nom : <input type="text" name="txtNom"><br>
            Mél : <input type="text" name="txtMel"><br>
            <input type="submit" name="btnEnvoyer" value="Envoyer" >
            </form>';
        }
        else 
        /* L'utilisateur a cliqué sur Envoyer, l'entrée btnEnvoyer <> vide, on traite le formulaire */
        {    echo "Bonjour : ".$_POST["txtNom"]."<br>";
            echo "Votre mél est : ".$_POST["txtMel"]; 
        }
        ?>
       
    </div>        
</div>

