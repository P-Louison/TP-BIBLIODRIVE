<?php
    require_once('connexionbase.php');

    $mel = $_GET['mel'];
    $motdepasse = $_GET['motdepasse'];
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $adresse = $_GET['adresse'];
    $codepostal = $_GET['codepostal'];
    $profil = $_GET['profil'];

    $sql = "INSERT INTO utilisateur (mel, motdepasse, nom, prenom, adresse, ville, codepostal, profil) VALUES (:mel, :motdepasse, :nom, :prenom, :adresse, :ville, :codepostal, :profil)";
    $stmt = $connexion->prepare($sql);

    $stmt->bindValue(":mel", $mel); 
    $stmt->bindValue(":motdepasse", $motdepasse);
    $stmt->bindValue(":nom", $nom); 
    $stmt->bindValue(":prenom", $prenom);
    $stmt->bindValue(":adresse", $adresse); 
    $stmt->bindValue(":codepostal", $codepostal);
    $stmt->bindValue(":profil", $profil);

    $stmt->execute();
    $nb_ligne_affectees = $stmt->rowCount();
    echo $nb_ligne_affectees." ligne() insérée(s).<BR>";
    
    $dernier_numero = $connexion->lastInsertId();
    // Optionnel, Nota Bene : sur récup. sur l'objet PDO, connexion
    echo "Dernier numéro region généré : ".$dernier_numero."<BR>";

?>