<?php

require('../../../lib/config.php');

$banID = $_POST["banID"];


$sql = "DELETE FROM ban WHERE banID=?";


try {
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$banID]);
} catch (PDOException $e) {
    $message = $e->getMessage();
    echo json_encode(array('success' => 0));
} finally {
    echo json_encode(array('success' => 1));
}

