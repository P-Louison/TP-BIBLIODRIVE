<?php
session_start();
?>

<?php
    var_dump($_SESSION['posLibre']);
    
    for ($i = 0; $i <= $_SESSION['posLibre'] - 1; $i++){
        if ($_SESSION['panier'][$i] == $_GET['sup']){
            unset($_SESSION['panier'][$i]);
            array_splice($_SESSION['panier'], $_SESSION['posLibre'] - 1, $_SESSION['posLibre'] - 1);
        }
    }
    $_SESSION['posLibre'] -= 1;

    header("Location: http://localhost/TP-BIBLIODRIVE/panierAffichage.php");

    
    
    
?>
                