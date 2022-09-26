<?php

require('../../../lib/config.php');

//$adminID = $_SESSION['userID'];
$adminID = "1";

$userId = $_POST["userID"];
$banTemp = $_POST["banTemp"];


$sql = "INSERT INTO ban (userID, banDate, adminID) VALUES (?, ?, ?);";


try {
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$userId, $banTemp, $adminID]);
} catch (PDOException $e) {
    $message = $e->getMessage();
}

