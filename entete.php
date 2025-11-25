<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>




    <div class="row container-fluid">
        <div class="col-md-10">
        <p>
            La Bibliothèque de Moulinsart est fermée au public jusqu'à nouvel ordre. 
            Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive
            <br>
            a faire, regler le probleme de include avec blocIdentification !!!
        </p>
        <br>

        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="mynavbar">
                
                <form class="d-flex container-fluid">
                    <input class="form-control me-2" type="text" placeholder="Rechercher dans le catalogue (saisie du nom de l'auteur)">
                    <button class="btn btn-primary" type="button">Panier</button>
                </form>
                
                </div>
            </div>
            </nav>


        </div>

        <div class="col-md-2 container-fluid">
            <img src="./image/chateauMoulinsart.jpg" class="float-end" width="80%">
        </div>
    </div>
    
    

</div>

<br>

<?php
    include 'carrousel.php';
    

    include 'blocIdentification.php';
    ?>

