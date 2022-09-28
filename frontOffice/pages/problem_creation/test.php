<?php
//include 'problem_creation.html';
include 'SQLconfig.php';

$gta = $bdd->query('SELECT categoryID from category');
$sot = $gta->rowCount();

$gto = $bdd->query('SELECT categoryName from category');
$sat = $gto->fetchall();

//print_r($sat);

$in = 0;
$y=0;
$TableauC=array();

for ($ligne = 0; $ligne<$sot;$ligne++)
{
    //echo $sat[$in][0];
    array_push($TableauC,$sat[$in][0]);

    $in=$in+1;   
}
//for ($ligne = 0; $ligne<$sot;$ligne++)
//{
//    echo $TableauC[$y];
//    $y=$y+1;
//}


//while ($donnees = $gta->fetch())
//{
//   $donnees['categoryName'];
//}

echo $sot;



?>