<?php
    include 'enteteAdmin.php'
?>

<div class="row container-fluid">
    <div class="col-md-10">
        <form action="AjoutMembreBase.php" method="post">
            
            Mail : <input type="text" name="mel">
            <br> 
            Mot de Passe : <input type="text" name="motdepasse">
            <br>
            Nom : <input type="text" name="nom">
            <br> 
            Prenom : <input type="text" name="prenom">
            <br>
            Adresse : <input type="text" name="adresse">
            <br> 
            Ville : <input type="text" name="ville">
            <br>
            Code Postal : <input type="text" name="codepostal">
            <br> 
            Profil : <input type="text" name="profil">
            <br>
            <input type="submit" value="Valider">

        </form>
    </div>
    <?php
        include_once 'blocIdentification.php';
    ?>

</body>
</html>