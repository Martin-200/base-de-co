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
        <a href="./frontOffice/pages/detailed_sheet/problem.php">Fiche détaillée</a>
        <?= $data['username'] ?>
    </body>
</html>
