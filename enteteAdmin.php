<?php
session_start();
?>

<?php
    if ($_SESSION['profil'] !== "admin"){
        header("Location: http://localhost/TP-BIBLIODRIVE/accueil.php");
    }
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

            <nav class="navbar navbar-expand-sm bg-warning ">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item " >
                            <a class="nav-link" href="http://localhost/TP-BIBLIODRIVE/menuAdmin.php"><button class="btn btn-outline-secondary" type="button">Accueil</button></a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/TP-BIBLIODRIVE/CaseNewMembre.php"><button class="btn btn-outline-secondary" type="button">Ajouter un membre</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/TP-BIBLIODRIVE/caseAjoutLivre.php"><button class="btn btn-outline-secondary" type="button">Ajouter un livre</button></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/TP-BIBLIODRIVE/supprimerMembre.php"><button class="btn btn-outline-secondary" type="button">Supprimer un membre</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/TP-BIBLIODRIVE/supLivreADMIN.php"><button class="btn btn-outline-secondary" type="button">Supprimer un livre</button></a>
                    </li>
                    
                    </ul>
                </div>
            </nav>

        </div>

        <div class="col-md-2 container-fluid">
             <a href="http://localhost/TP-BIBLIODRIVE/accueil.php"><img src="./image/chateauMoulinsart.jpg" class="float-end" width="100%"></a>
        </div>
    </div>
    
<br>




