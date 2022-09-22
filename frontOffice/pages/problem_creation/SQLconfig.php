<?php
    define('BDD_HOST', 'localhost');  
    define('BDD_NAME', 'basedeco');
    define('BDD_USER', 'root');
    define('BDD_PASS', '');

    try
    {
        $bdd = new PDO('mysql:host='.BDD_HOST.';dbname='.BDD_NAME.';charset=utf8', BDD_USER, BDD_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }


?>