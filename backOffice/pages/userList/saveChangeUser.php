<?php

require_once __DIR__ . "/../../../lib/config.php";

$userId = $_POST["userID"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$mail = $_POST["mail"];
$username = $_POST["username"];
$userLevel = $_POST["userlevel"];


$sql = "UPDATE User set firstName=?, lastName=?, mail=?, username=?, userLevel=? WHERE userID=?";


try {
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$firstName, $lastName, $mail, $username, $userLevel, $userId]);
} catch (PDOException $e) {
    $message = $e->getMessage();
}

