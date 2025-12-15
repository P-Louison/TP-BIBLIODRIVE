<?php
    include 'enteteAdmin.php'
?>

<div class="row container-fluid">
    <div class="col-md-10">
        <form action="AjoutLivreBase.php" method="post">

        
        
        Auteur : <select name="auteur" id="cars">
                    <?php
                        require_once('connexionbase.php');   

                        $stmt = $connexion->prepare("SELECT DISTINCT(nom) FROM auteur");

                        $recupnoauteur = $connexion->prepare("SELECT noauteur FROM auteur where nom = :nomauteur");
                        $recupnoauteur->bindValue(":nomauteur", $auteur ); 
                        $recupnoauteur->setFetchMode(PDO::PARAM_INT);
                        $recupnoauteur->execute();
                        $recupnoauteur->fetch();
                        $noauteur = $recupnoauteur;
                        
                        $stmt->setFetchMode(PDO::FETCH_OBJ);
                        $stmt->execute();
                        
                        for ($i = 0; $i <= $stmt->rowcount()-1; $i ++) {
                            $result = $stmt->fetch();
                            $_SESSION['nomAuteurAjoutLivre'] = $result->nom;
                            echo ' <option value="'.$noauteur.'"> '.$_SESSION['nomAuteurAjoutLivre'].'</option>';
                        }
                    ?>
                    
                    
                    
                </select>
        <br> 
        Titre : <input type="txt" name="titre">
        <br>
        ISBN : <input type="txt" name="isbn">
        <br>
        Année de parution : <input type="txt" name="anneeparution">
        <br>
        Résumé : <input type="txt" name="detail">
        <br>
        Image : <input type="txt" name="imageLivre">
        <br>
        <input type="submit" value="Valider">
    </form>
    
    </div>
    <?php
        include_once 'blocIdentification.php';
    ?>

</body>
</html>