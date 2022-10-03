<?php
        session_start();
        session_destroy();

        setcookie("userID" , NULL , time() - 3600 * 24 * 30);
        setcookie("username" , NULL , time() - 3600 * 24 * 30);
        setcookie("mail" , NULL , time() - 3600 * 24 * 30);

        unset($_COOKIE['userID']);
        unset($_COOKIE["username"]);
        unset($_COOKIE["mail"]);

        echo "Deconnexion reussi !";
        header("refresh: 3; url=http://localhost/basedeco/signin.php");
?>