<?php
session_start();
?>

<?php

    $panier = array();
    unset($_SESSION['panier']);
    $_SESSION['panier'] = $panier;

    header("Location: http://localhost/TP-BIBLIODRIVE/panierAffichage.php");
?>