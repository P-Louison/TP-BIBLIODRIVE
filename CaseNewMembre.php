<?php
    include 'enteteAdmin.php'
?>

<div class="row container-fluid">
    <div class="col-md-10 texteCentrer">
        <form action="AjoutMembreBase.php" method="post">
            
            Mail : <input type="text" name="mel">
            <br><br> 
            Mot de Passe : <input type="text" name="motdepasse">
            <br><br> 
            Nom : <input type="text" name="nom">
            <br> <br> 
            Prenom : <input type="text" name="prenom">
            <br><br> 
            Adresse : <input type="text" name="adresse">
            <br> <br> 
            Ville : <input type="text" name="ville">
            <br><br> 
            Code Postal : <input type="text" name="codepostal">
            <br> <br> 
            Profil : <input type="text" name="profil">
            <br>
            <input type="submit" class="btn btn-outline-success" value="Valider" >

        </form>
    </div>
    <?php
        include_once 'blocIdentification.php';
    ?>

</body>
</html>