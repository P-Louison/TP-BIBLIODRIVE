<?php
    include 'enteteAdmin.php'
?>

<div class="row container-fluid">
    <div class="col-md-10 texteCentrer">
        
        <form action="AjoutLivreBase.php" method="post">

        Auteur : <select name="auteur" id="cars">
                    <?php
                        require_once('connexionbase.php');   

                        $stmt = $connexion->prepare("SELECT DISTINCT(nom), noauteur FROM auteur");
                        $stmt->setFetchMode(PDO::FETCH_OBJ);
                        $stmt->execute();
                        
                        for ($i = 0; $i <= $stmt->rowcount()-1; $i ++) {
                            $result = $stmt->fetch();
                            $_SESSION['nomAuteurAjoutLivre'] = $result->nom;
                            $_SESSION['noauteur'] = $result->noauteur;

                            echo ' <option value="'.$_SESSION['noauteur'].'"> '.$_SESSION['nomAuteurAjoutLivre'].'</option>';
                        }
                    ?>
                    
                    
                    
                </select>
            <br><br> 
            Titre : <input type="txt" name="titre">
            <br><br> 
            ISBN : <input type="txt" name="isbn">
            <br><br> 
            Année de parution : <input type="txt" name="anneeparution">
            <br><br> 
            Résumé : <input type="txt" name="detail">
            <br><br> 
            Image : <input type="txt" name="imageLivre">
            <br><br> 
            <input type="submit" value="Valider">
        </form>
    
    </div>
    <?php
        include_once 'blocIdentification.php';
    ?>

</body>
</html>