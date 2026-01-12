<?php
    include 'enteteAdmin.php'
?>

<?php
    if ($_SESSION['profil'] !== "admin"){
        header("Location: http://localhost/TP-BIBLIODRIVE/accueil.php");
    }
?>

<div class="row container-fluid">
    <div class="col-md-10 texteCentrer">
        
        <form action="AjoutLivreBase.php" method="post">

        Auteur : <select name="auteur" required>
                    <?php
                        require_once('connexionbase.php');   

                        $stmt = $connexion->prepare("SELECT DISTINCT(nom), noauteur FROM auteur");
                        $stmt->setFetchMode(PDO::FETCH_OBJ);
                        $stmt->execute();
                        
                        for ($i = 0; $i <= $stmt->rowcount()-1; $i ++) {
                            $result = $stmt->fetch();
                            echo ' <option value="'.$result->noauteur.'"> '.$result->nom.'</option>';
                        }
                    ?>                             
                </select>
            <br><br> 
            Titre : <input type="txt" name="titre" required>
            <br><br> 
            ISBN : <input type="txt" name="isbn" required>
            <br><br> 
            Année de parution : <input type="number" name="anneeparution" required>
            <br><br> 
            Résumé : <input type="txt" name="detail" required>
            <br><br> 
            Image : <input type="txt" name="imageLivre" required>
            <br><br> 
            <input type="submit" class="btn btn-outline-success" value="Valider" >
        </form>
    
    </div>
    <?php
        include_once 'blocIdentification.php';
    ?>

<?php
    include 'piedDePage.html';
?>