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
        <form action="AjoutMembreBase.php" method="post">
            
            Mail : <input type="email" name="mel" required>
            <br><br> 
            Mot de Passe : <input type="password" name="motdepasse" required>
            <br><br> 
            Nom : <input type="text" name="nom" required>
            <br> <br> 
            Prenom : <input type="text" name="prenom" required>
            <br><br> 
            Adresse : <input type="text" name="adresse" required>
            <br> <br> 
            Ville : <input type="text" name="ville" required>
            <br><br> 
            Code Postal : <input type="number" name="codepostal" required>
            <br> <br> 
            Profil : <input type="text" name="profil" required>
            <br>
            <input type="submit" class="btn btn-outline-success" value="Valider" >
        </form>
    </div>
    <?php
        include_once 'blocIdentification.php';
    ?>

<?php
    include 'piedDePage.html';
?>