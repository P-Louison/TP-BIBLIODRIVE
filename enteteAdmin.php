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
            </p>
            <br>

            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                <a class="nav-link active" href="http://localhost/TP-BIBLIODRIVE/CaseNewMembre.php">Ajouter un membre</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="http://localhost/TP-BIBLIODRIVE/caseAjoutLivre.php">Ajouter un livre</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="http://localhost/TP-BIBLIODRIVE/menuAdmin.php">Disabled</a>
                </li>
            </ul>

        </div>

        <div class="col-md-2 container-fluid">
             <a href="http://localhost/TP-BIBLIODRIVE/acceuille.php"><img src="./image/chateauMoulinsart.jpg" class="float-end" width="100%"></a>
        </div>
    </div>
    
<br>