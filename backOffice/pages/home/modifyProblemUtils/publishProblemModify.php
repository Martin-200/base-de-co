<?php

require('../../../../lib/config.php');

$problemID = $_POST["problemID"];
$title = $_POST["title"];
$description = $_POST["description"];
$codeError = $_POST["codeError"];
$solution = $_POST["solution"];
$status = $_POST["status"];
$newProblemID = $_POST["newProblemID"];


$sql = "UPDATE problem set title=?, description=?, codeError=?, solution=?, status=? WHERE problemID=?; DELETE FROM problemmodify WHERE problemModifyID=?";


try {
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$title, $description, $codeError, $solution, $status, $problemID, $newProblemID]);
} catch (PDOException $e) {
    $message = $e->getMessage();
    echo json_encode($message);
} finally {
    echo json_encode(array('success' => 1));
}
