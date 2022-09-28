<?php

require('../../../../lib/config.php');

$problemID = $_POST["problemID"];
$newProblemID = $_POST["newProblemID"];


$sql = "UPDATE problem set status='2' WHERE problemID=?; DELETE FROM problemmodify WHERE problemModifyID=?";


try {
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$problemID, $newProblemID]);
} catch (PDOException $e) {
    $message = $e->getMessage();
    echo json_encode($message);
} finally {
    echo json_encode(array('success' => 1));
}
