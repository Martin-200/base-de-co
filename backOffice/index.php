

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Back office - 404.io</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./pages/home/css/home.css">
</head>

<body>
<?php require_once "./components/header/header.php" ?>

    <main>
        <div class='container'>
            <div class="row mt-4">
                <div class='col-12 col-md-6 col-lg-4 d-flex justify-content-start flex-column mx-1'>
                    <?php include_once __DIR__ . '/pages/home/newProblems.php'; ?>
                </div>
                <div class='col-12 col-md-6 col-lg-4 d-flex justify-content-start flex-column mx-1'>
                    <?php include_once __DIR__ . '/pages/home/modifyProblems.php'; ?>
                </div>
                <div class='col-12 col-md-6 col-lg-4 d-flex justify-content-start flex-column mx-1'></div>
            </div>
        </div>
    </main>
    </body>
</html>