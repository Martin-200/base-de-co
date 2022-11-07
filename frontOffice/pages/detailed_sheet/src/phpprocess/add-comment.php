<?php
    require_once('../../../../../lib/config.php');

    $userID = htmlspecialchars($_POST["userID"]);
    $problemID = htmlspecialchars($_POST["problemID"]);
    $message = htmlspecialchars($_POST["message"]);
    $respondTo = htmlspecialchars($_POST["respondTo"]);

    if (!is_null($userID)){
        $sql = "INSERT INTO comments (userID, problemID, message, respondTo) VALUES (?,?,?,?)";
        
        try {
            $check= $bdd->prepare($sql);
            $check->execute([$userID, $problemID, $message, $respondTo]);
            $check->closeCursor();
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo json_encode($errorMessage);
        } finally {
            echo json_encode(array('success' => 1));
        }
    }

    