<?php
session_start();
?>

<?php
    
    for ($i = 0; $i <= count($_SESSION['panier']); $i++){
        if ($_SESSION['panier'][$i][0] == $_GET['sup']){
            unset($_SESSION['panier'][$i]);
            array_splice($_SESSION['panier'], count($_SESSION['panier']), count($_SESSION['panier']));
        }
    }
    header("Location: http://localhost/TP-BIBLIODRIVE/panierAffichage.php");

?>
                