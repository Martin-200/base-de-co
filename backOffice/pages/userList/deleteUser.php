<?php

require_once __DIR__ . "/../../../lib/config.php";

$userId = $_POST["userID"];


$sql = "DELETE FROM User WHERE userID=?";


try {
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$userId]);
} catch (PDOException $e) {
    $message = $e->getMessage();
    echo json_encode($message);
} finally {
    echo json_encode(array('success' => 1));
}
