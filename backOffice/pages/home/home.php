<head>
    <title>Pannel Admin Home | 404.io</title>
    <?php include '../../components/head/head.php'; ?>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/newProblems.css">

</head>

<header>

</header>
<main>
    <div class='container'>
        <div class='row'>
            <div class='col-12 col-md-6 col-lg-4 d-flex justify-content-center '>
                <a class="btn btn-primary" href="../problemList/problemList.php" role="button">Gérer les problèmes</a>
            </div>
            <div class='col-12 col-md-6 col-lg-4 d-flex justify-content-center'>
                <a class="btn btn-primary" href="../userList/userList.php" role="button">Gérer les utilisateurs</a>
            </div>
            <div class='col-12 col-md-6 col-lg-4 d-flex justify-content-center'>
                <a class="btn btn-primary" href="../banList/banList.php" role="button">Gérer les bans</a>
            </div>
        </div>
        <div class="row">
            <div class='col-12 col-md-6 col-lg-4 d-flex justify-content-start flex-column'>
                <?php include './newProblems.php'; ?>
            </div>
            <div class='col-12 col-md-6 col-lg-4 d-flex justify-content-start flex-column'>
                <?php include './modifyProblems.php'; ?>
            </div>
            <div class='col-12 col-md-6 col-lg-4 d-flex justify-content-start flex-column'></div>
        </div>
    </div>
</main>