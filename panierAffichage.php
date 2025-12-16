<?php
    require 'entete.php';
?>

<div class="row container-fluid"> 
    <div class="col-md-10 container-fluid " style="text-align: center;">  
        <h2> Votre panier </h2>
        
        <?php
            $panier = array();

            if (isset($_SESSION['panier']) && ($_SESSION['panier'] != "")){
                if ($_SESSION['panier'] == array()){
                    echo 'Aucun livre dans le panier !';
                }
                else{
                    for($x = 0; $x < count($_SESSION['panier']); $x++) {

                        echo '<div class="row">
                                <div class="col-md-7">
                                <a href="http://localhost/TP-BIBLIODRIVE/detailLivre.php?titre='.$_SESSION['panier'][$x].'"> '.$_SESSION['panier'][$x].' </a><br>
                                </div>
                                <br><br>
                                <div class="col-md-3">
                                    <form method="post">
                                    <input type="submit" name="supprimer" value="supprimer">
                                    </form>
                                </div>
                            </div>
                                ';
                  
                        }
                    
                    if(!isset($_POST['emprunter'])){             
                        echo '
                        <div class="row">
                            <div class="col-md-7">
                            <form method="post">
                            <input type="submit" name="emprunter" value="Emprunter le(s) livre(s)">
                            </form>
                            </div>
                        ';
                    }
                    else{

                        $dateactuel = date("Y-m-d");
                        require_once('connexionbase.php');

                        $sql = "INSERT INTO emprunter (mel, nolivre, dateemprunt, dateretour) 
                                    VALUES (:melutilisateur, :nolivre, :dateactuel, :dateretour)";
                        $stmt = $connexion->prepare($sql);
                        
                        $stmt->bindValue(":melutilisateur", $_SESSION['melAuteur']);
                        $stmt->bindValue(":nolivre", $_SESSION['nolivre']);
                        $stmt->bindValue(":dateactuel", $dateactuel); 
                        $stmt->bindValue(":dateretour", NULL);
                        $stmt->execute();
                        $nb_ligne_affectees = $stmt->rowCount();
                        echo $nb_ligne_affectees." livre(s) sont emprunté(s) à votre nom !<BR>";
                    
                    }
                    if(!isset($_POST['toutsupprimer'])){             
                            echo '<div class="col-md-3">
                            <form method="post">
                            <input type="submit" name="toutsupprimer" value="Vider le panier">
                            </form>
                            </div>
                        </div>
                        ';
                    }
                    else{
                        unset($_SESSION['panier']);
                        $_SESSION['panier'] == $panier;

                        header("Location: http://localhost/TP-BIBLIODRIVE/panierAffichage.php");
                    }
                    
                }
                
                
                
            }
            else{
                echo "veuillez-vous connecter avant d'avoir accès au panier";
            }
            
            if (isset($_POST['supprimer'])){
                echo 'AAAAAAAAA';
            }
                        

            
            
            
        
        
        ?>
    </div>
    
    <?php
    require_once 'blocIdentification.php';
    ?>
