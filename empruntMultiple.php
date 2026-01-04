<?php
session_start();
?>

<?php
    $_SESSION['nbLivreEmprunt'] = 0;
    $dateactuel = date("Y-m-d");
    require_once('connexionbase.php'); 

    for ($i = 0; $i < count($_SESSION['panier']); $i++){
        
        $stmt = $connexion->prepare("INSERT INTO emprunter (mel, nolivre, dateemprunt, dateretour) 
            VALUES (:melutilisateur, :nolivre, :dateactuel, :dateretour)");
        
        $stmt->bindValue(":melutilisateur", $_SESSION['melAuteur']);
        $stmt->bindValue(":nolivre", $_SESSION['panier'][$i][0]);
        $stmt->bindValue(":dateactuel", $dateactuel); 
        $stmt->bindValue(":dateretour", NULL);
        $stmt->execute();

        $_SESSION['nbLivreEmprunt'] += $stmt->rowCount();
    }

    header("Location: http://localhost/TP-BIBLIODRIVE/panierApresEmprunt.php");

   

?>