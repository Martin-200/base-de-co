<?php
//include 'problem_creation.php';
include 'SQLconfig.php';

$gta = $bdd->query('SELECT categoryID from category');
$sot = $gta->rowCount();
echo $sot;

?>