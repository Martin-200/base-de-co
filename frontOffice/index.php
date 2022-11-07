<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - 404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./components/global/css/main.css">
</head>

<style>
    .hero-header {

        /* ff 3.6+ */
        background: -moz-radial-gradient(circle at 100% 61%, rgba(215, 248, 240, 1) 0%, rgba(248, 246, 255, 1) 57%);

        /* safari 5.1+,chrome 10+ */
        background: -webkit-radial-gradient(circle at 100% 61%, rgba(215, 248, 240, 1) 0%, rgba(248, 246, 255, 1) 57%);

        /* opera 11.10+ */
        background: -o-radial-gradient(circle at 100% 61%, rgba(215, 248, 240, 1) 0%, rgba(248, 246, 255, 1) 57%);

        /* ie 10+ */
        background: -ms-radial-gradient(circle at 100% 61%, rgba(215, 248, 240, 1) 0%, rgba(248, 246, 255, 1) 57%);

        /* global 92%+ browsers support */
        background: radial-gradient(circle at 100% 61%, rgba(215, 248, 240, 1) 0%, rgba(248, 246, 255, 1) 57%);
    }

    .radiant-title {
        background: -webkit-linear-gradient(326deg, #11053B, #0066FF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

    }

    #searchProblem {
        padding: 1em;
        border-radius: 25px;
        width: 100%;
        border: 1px solid #D3D5FF;
    }
</style>

<body>
    <section class="hero-header">

        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <div>
                        <div class="mini-title">
                            <p>Base de connaissance</p>
                        </div>
                        <H1 class="radiant-title">Jamais 4 Erreurs <br> Sans 4 Solutions</H1>
                        <h2>Trouve la solution a ton erreur</h2>
                        <form action="./pages/home/search_action.php" method="POST">
                            <input type="search" name="searchProblem" id="searchProblem" placeholder='Rechercher'>
                        </form>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <img src="./assets/HomeIcons.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="presentation">
        <div class="presentation_row">
            <div class="col d-flex align-items-center">
                <div class="presentation_div1">
                    <div class="mini-title">
                        <p>Présentation</p>
                    </div>
                    <H1 class="title">Une base de <br> connaissances <br> communautaire </H1>
                    <h2>Réalisé pour vous et par vous</h2>
                    <button></button>
                </div>

                <div class="presentation_div2">

                </div>
            </div>
        </div>

    </section>

    <div class="communaute">
    </div>

    <div class=fiche>

    </div>

    <div class="tecno">

    </div>

    <div class="aventage">

    </div>

</body>

</html>