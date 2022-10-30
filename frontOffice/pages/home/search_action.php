<?php


include '../../../lib/config.php';


$input = $_POST["searchProblem"];

$data = $bdd->query("SELECT * FROM problem WHERE title LIKE '%$input%' OR codeError LIKE '%$input%'")->fetchAll();


$problems =[];
foreach ($data as $key => $value) {
    $problems[] = $value["problemID"];
}

session_start();
$_SESSION['problems'] = $problems;

header("Location: listAllProblem.php?input=$input");


