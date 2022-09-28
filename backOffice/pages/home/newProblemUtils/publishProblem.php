<?php

require('../../../../lib/config.php');

$problemID = $_POST["problemID"];


$sql = "UPDATE problem SET status=? WHERE problemID=?";

try {
    $stmt = $bdd->prepare($sql);
    $stmt->execute([2, $problemID]);
} catch (PDOException $e) {
    $message = $e->getMessage();
    echo json_encode($message);
} finally {
    echo json_encode(array('success' => 1));
}
