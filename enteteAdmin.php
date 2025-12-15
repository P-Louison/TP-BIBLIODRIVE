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

            <div class="container mt-4">
                
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="http://localhost/TP-BIBLIODRIVE/CaseNewMembre.php">Ajouter un membre</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="http://localhost/TP-BIBLIODRIVE/caseAjoutLivre.php">Ajouter un livre</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="http://localhost/TP-BIBLIODRIVE/menuAdmin.php">supprimer livre/membre ?</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="http://localhost/TP-BIBLIODRIVE/menuAdmin.php">retour au menu</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="accueilMenu" class="container tab-pane active"><br>
                    <?php
                        header("Location: http://localhost/TP-BIBLIODRIVE/menuAdmin.php");
                    ?>
                    </div>
                    <div id="menu1" class="container tab-pane fade"><br>
                    <?php
                        header("Location: http://localhost/TP-BIBLIODRIVE/menuAdmin.php");
                    ?>
                    </div>
                    <div id="menu2" class="container tab-pane fade"><br>
                    <?php
                        header("Location: http://localhost/TP-BIBLIODRIVE/menuAdmin.php");
                    ?>
                    </div>
                </div>
                </div>



        </div>

        <div class="col-md-2 container-fluid">
             <a href="http://localhost/TP-BIBLIODRIVE/acceuille.php"><img src="./image/chateauMoulinsart.jpg" class="float-end" width="100%"></a>
        </div>
    </div>
    
<br>