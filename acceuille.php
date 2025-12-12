

<?php
    include 'entete.php';
    ?>


<div class="row container-fluid">
  <div class="col-md-10 container-fluid decor">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
      <?php
                 
          require_once('connexionbase.php');
          $stmt = $connexion->prepare("SELECT * FROM livre ORDER BY dateajout DESC");
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $stmt->execute();
          $couverture1 = $stmt->fetch();
          $couverture2 = $stmt->fetch();
          $couverture3 = $stmt->fetch();
    
      echo '<div class="carousel-item active">
          <img src="./image/'.$couverture1->photo.'" class="d-block mx-auto" style="width:20%">
          <div class="carousel-caption"></div>
        </div>';
        echo '<div class="carousel-item">
          <img src="./image/'.$couverture2->photo.'" class="d-block mx-auto" style="width:20%">
          <div class="carousel-caption" ></div> 
        </div>';
        echo '<div class="carousel-item">
          <img src="./image/'.$couverture3->photo.'" class="d-block mx-auto" style="width:20%">
          <div class="carousel-caption"></div>  
        </div>
      </div>';
      ?>    

    </div>
    <?php
    include 'blocIdentification.php';
    ?>
  </div>
  
    
    

    

