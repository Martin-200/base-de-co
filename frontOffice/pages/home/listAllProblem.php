<?php
include '../../../lib/config.php';
session_start();
$input = $_GET["input"];
$problems = $_SESSION["problems"];

$query = "SELECT * FROM problem WHERE problemID='";

for ($i=0; $i < count($problems); $i++) { 
    if ($i === count($problems)-1) {
        $query = $query . $problems[$i]."'";
    } else {
        $query = $query . $problems[$i] . "' OR problemID='";
    }
}

$data = $bdd->query($query)->fetchAll();

?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de recherche - 404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./components/global/css/main.css">
</head>



<body>
    <style>
        .header-search {
            height: 200px;
            background-color: #F8F6FF;
        }

        .header-search>div {
            width: 60%;
        }

        #searchProblem {
            padding: 1em;
            border-radius: 25px;
            width: 100%;
            border: 1px solid #D3D5FF;
        }

        .label_search {
            font-weight: 500;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-center header-search">
                <div>
                    <form action="./pages/home/search_action.php" method="POST">
                        <label class="label_search" for="searchProblem">Saisissez votre erreur</label>
                        <input type="search" name="searchProblem" id="searchProblem" placeholder='Rechercher' value="<?= $input ?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-2">

            </div>
            <div class="col-8">
                <h1>
                    Resultat pour "<?= $input ?>"
                </h1>
                <p><?php echo count($problems) ?> résultat trouvé</p>

                <div class="listAllProbs">
                    <?php 
                    foreach ($data as $value) {
                        ?>

                    <div class="item">
                        <div class="d-flex">
                            <div>
                                <p>photo</p>
                            </div>
                            <div>
                                <h2><?= $value["title"] ?></h2>
                                <p><?= substr($value["description"], 0, 40) . "..." ?></p>
                            </div>
                        </div>
                    </div>

                        <?php
                    }

                    ?>
                </div>

            </div>
            <div class="col-2">

            </div>
        </div>
    </div>
</body>

</html>