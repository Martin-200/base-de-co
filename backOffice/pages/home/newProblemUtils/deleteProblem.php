<?php

require('../../../../lib/config.php');

$problemID = $_POST["problemID"];


$sql = "DELETE FROM problem WHERE problemID=?";


try {
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$problemID]);
} catch (PDOException $e) {
    $message = $e->getMessage();
    echo json_encode(array('success' => 0));
} finally {
    echo json_encode(array('success' => 1));
}

