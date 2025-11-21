
       <!-- Carousel -->
      <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
        
        <!-- The slideshow/carousel -->
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
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev" style="40%">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next" style="40%">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
