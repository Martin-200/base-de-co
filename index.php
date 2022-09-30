<?php 
require('./lib/config.php');



$check = $bdd->prepare('SELECT * FROM User WHERE username = ?');
$var = 'Pierson38';
$check->execute(array($var));
$data = $check->fetch();
$row = $check->rowCount();
$check->closeCursor();

?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    
    <body>
    <?php
                echo @$_SESSION['userID']; echo "-";
                echo @$_SESSION['firstName']; echo "-";
                echo @$_SESSION['lastName']; echo "-";
                echo @$_SESSION['username']; echo "-";
                echo @$_SESSION['mail']; echo "-";
                echo @$_SESSION['userLevel'];

                if (empty($_SESSION['userID']) AND empty($_SESSION['mail'])){
                    session_destroy();
                    echo "Connectez vous pour acceder a ce contenu!";
                    header("refresh: 3; url=http://localhost/basedeco/signin.php");
                } else {
                    echo ' <a href="profil.php" class="nav-item nav-link" style="padding-left:6.5vw; display:flex; align-items:center"><i class="fi-rr-user" style="font-size:25px; margin-right:5px"></i> ' . $_SESSION['username'] . '</a>';
                    echo '<a href="signout.php" class="nav-item nav-link" style="padding-left:6.5vw; display:flex; align-items:center"><i class="fi-rr-sign-out" style="font-size:25px; margin-right:5px"></i></a>';
                }
    ?>

        <a href="./frontOffice/pages/detailed_sheet/problem.php">Fiche détaillée</a>
        <?= $data['username'] ?>
    </body>
</html>
