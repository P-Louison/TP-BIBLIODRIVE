<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" type="text/css" href="CSS.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="row container-fluid">
        <div class="col-md-10">
            <p>
                La Bibliothèque de Moulinsart est fermée au public jusqu'à nouvel ordre. 
                Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive
            </p>
            <br>

            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="container-fluid">
                
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <form class="d-flex container-fluid" action="pageLivre.php" method="get">
                            <input class="form-control me-2" type="text" placeholder="Rechercher dans le catalogue (saisie du nom de l'auteur)" name="navBar" >                         
                            <button class="btn btn-outline-warning" type="submit">Rechercher</button> 
                            <a href="http://localhost/TP-BIBLIODRIVE/panierAffichage.php"> <button class="btn btn-outline-success" type="button">Panier</button> </a>  
                        </form> 
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-md-2 container-fluid">
             <a href="http://localhost/TP-BIBLIODRIVE/accueil.php"><img src="./image/chateauMoulinsart.jpg" class="float-end" width="100%"></a>
        </div>
    </div>
<br>


