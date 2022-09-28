<?php

require('../../../lib/config.php');

$problemID = $_POST["problemID"];
$title = $_POST["title"];
$description = $_POST["description"];
$codeError = $_POST["codeError"];
$solution = $_POST["solution"];
$status = $_POST["status"];


$sql = "UPDATE problem set title=?, description=?, codeError=?, solution=?, status=? WHERE problemID=?";


try {
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$title, $description, $codeError, $solution, $status, $problemID]);
} catch (PDOException $e) {
    $message = $e->getMessage();
}

