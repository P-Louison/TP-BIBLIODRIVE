<?php
session_start();
?>

<?php
    
    for ($i = 0; $i <= $_SESSION['posLibre'] - 1; $i++){
        if ($_SESSION['panier'][$i][0] == $_GET['sup']){
            unset($_SESSION['panier'][$i]);
            array_splice($_SESSION['panier'], $_SESSION['posLibre'] - 1, $_SESSION['posLibre'] - 1);
        }
    }
    $_SESSION['posLibre'] -= 1;

    header("Location: http://localhost/TP-BIBLIODRIVE/panierAffichage.php");

    
    
    
?>
                