    <?php
        include 'enteteAdmin.php';
    ?>

    <?php
        require_once('connexionbase.php');
        $noauteur = $_POST['auteur'];
        $titre = $_POST['titre'];
        $isbn = $_POST['isbn'];
        $anneeparution = $_POST['anneeparution'];
        $detail = $_POST['detail'];
        $imageLivre = $_POST['imageLivre'];
        
        $dateactuel = date("Y-m-d");

        $sql = "INSERT INTO livre (noauteur, titre, isbn13, anneeparution, detail, dateajout, photo) 
                                    VALUES (:noauteur, :titre, :isbn13, :anneeparution, :detail, :dateajout, :imageLivre)";
        $stmt = $connexion->prepare($sql);

        
        $stmt->bindValue(":noauteur", $noauteur, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre);
        $stmt->bindValue(":isbn13", $isbn); 
        $stmt->bindValue(":anneeparution", $anneeparution);
        $stmt->bindValue(":detail", $detail); 
        $stmt->bindValue(":dateajout", $dateactuel); 
        $stmt->bindValue(":imageLivre", $imageLivre); 

        $stmt->execute();
        $nb_ligne_affectees = $stmt->rowCount();
    
        
    ?>

    <div class="row container-fluid">
        <div class="col-md-10 texteCentrer">
            <h3> le livre à bien été ajouté !</h3>
        </div>

    <?php
        include 'blocIdentification.php';
    ?>
        
</div>