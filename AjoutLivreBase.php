<?php
    require_once('connexionbase.php');

    $auteur = $_POST['auteur'];
    $titre = $_POST['titre'];
    $isbn = $_POST['isbn'];
    $anneeparution = $_POST['anneeparution'];
    $resumer = $_POST['resumer'];
    $photo = $_POST['photo'];

faire une requete sql pour recuperer le numero de auteur par rapport a son recuperer dans la case auteur,
puis le bindvalues, faire correspondre le noauteur a la variable donner qui a joint le nom et le numero


    $sql = "INSERT INTO utilisateur (auteur, titre, isbn13, anneeparution, datail, photo) VALUES (:auteur, :titre, :isbn13, :anneeparution, :detail, :photo)";
    $stmt = $connexion->prepare($sql);

    $stmt->bindValue(":auteur", $mel); 
    $stmt->bindValue(":titre", $titre);
    $stmt->bindValue(":isbn13", $isbn); 
    $stmt->bindValue(":anneeparution", $anneeparution);
    $stmt->bindValue(":detail", $detail); 
    $stmt->bindValue(":photo", $photo); 


    $stmt->execute();
    $nb_ligne_affectees = $stmt->rowCount();
    echo $nb_ligne_affectees." ligne() insérée(s).<BR>";


?>