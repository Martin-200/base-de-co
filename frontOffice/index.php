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
  .icone_comDIV
    {
        width: 35;
    }

    .Capture_P
    {
        width: 60%;
    }

    .Cap_Comm
    {
        width: 60%;
    }
    .Cap_fiche
    {
        width: 60%;
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
            <div class="row">
                <div class="presentation_div1 col d-flex align-items-center justify-content-center">
                    <div>
                        <div class="mini-title">
                            <p>Présentation</p>
                        </div>
                        <H1 class="title">Une base de <br> connaissances <br> communautaire </H1>
                        <h2>Réalisé pour vous et par vous</h2>
                        <button><a href="hero-header">Rechercher mon erreur</a></button>
                    </div>
                </div>
                    
                <div class="presentation_div2 col d-flex align-items-center justify-content-center">
                    <img class="Capture_P" src="../ressource/capureFiche.png" alt="Capture fiche ereur avec comentaire">
                </div>
        </div>

    </section>

    <section class="communaute">
            <div class="row">
                <div class="commu_div1 col d-flex align-items-center justify-content-center">
                    <img class="Cap_Comm" src="../ressource/capureMesage.png"  alt="capture commentaire">
                </div>
                <div class="commu_div2 col d-flex align-items-center justify-content-center">
                    <div>
                        <div class="mini-title">
                            <p>Communauté</p>
                        </div>
                        <H1 class="title">Espace <br>  commentaire </H1>
                        <h4>404.io vous aide  à resoudre l’ensemble de vos <br> problèmes. Possédant une grande base de <br> connaissances notamment alimentée par vous,<br> nous vous proposons un maximum de solutions. </h4>
                        <div class="row">
                            <div class="icone_comDIV col">
                                <img class="icone_com" src="../ressource/Frame.png" alt="icone_com">
                            </div>
                            <div class="text_comDIV col">
                                <p>Nous mettons  à votre disposition un espace commentaire  - <br> présent  sous chaque fiche réponse. Cet espace  vous permettra <br> d’échanger avec la communauté.</p>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
    </section>

    <section class=fiche>
            <div class="row">
                <div class="fiche_div1 col d-flex align-items-center justify-content-center">
                    <div>
                        <div class="mini-title">
                            <p>Fiche</p>
                        </div>
                        <H1 class="title">Proposer votre <br>  fiche réponse </H1>
                        <h4>Notre base vous aide à trouver les solutions à vos <br> problèmes, de plus elle tend à s’agrandir. Ainsi, via la <br> proposition de fiches, vous nous aiderez à faire <br> évoluer le site. </h4>
                        <div class="row">
                            <div class="icone_comDIV col">
                                <img class="icone_Fic" src="../ressource/Icon_Ed.png" alt="icone_Fiche">
                            </div>
                            <div class="text_comDIV col" >
                                <p>En plus de la proposition de fiche, 404.io vous permet de <br> modifier des solutions existantes - si vous les trouvez <br> incomplètes ou erronées.</p>
                            </div>
                        </div>
                    </div>              
                </div>
                    <div class="fiche_div2 col d-flex align-items-center justify-content-center">
                        <img class="Cap_fiche" src="../ressource/capureFormul.png"  alt="capture fiche">
                    </div>
                </div>
            </div>
    </section>

    <section class="tecno">
        <div class="Tecno_contenu">
            <div class="mini-title">
                <p>Technologies</p>
            </div>
            <H1 class="title_center">Exemples de technologies traitées</H1>
            <img src="../ressource/icon_dev.png">
        </div>
    </section>

    <section class="aventage">
        <div class="aventage_contenu">
        <div class="mini-title">
                <p>Avantage</p>
            </div>
            <H1 class="title_center">Avantages</H1>
            <div class="col d-flex align-items-center">
                <div class="aventage_div1">
                    </div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign1_col1">
                        </div>
                        <div class="text_aven">
                            <h4>Un recueil de fiches en expansion</h4>
                            <p>Notre recueil de fiches solutions est en constante expension <br> et ne connait aucune limite</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign2_col1">
                        </div>
                        <div class="text_aven">
                            <h4>Une communauté soudée et passionnée</h4>
                            <p>Nous sommes une communauté soudée et à 100% <br> passionnée par l’informatique</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign3_col1">
                        </div>
                        <div class="text_aven">
                            <h4>Un accès cross-plateforme</h4>
                            <p>Accèdez à la base de connaissances où que vous soyez, peu <br> importe l’appareil</p>
                        </div>
                    </div>
                </div>

                <div class="aventage_div2">
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign1_col2">
                        </div>
                        <div class="text_aven">
                            <h4>Vérification par une équipe passionnée</h4>
                            <p>Notre équipe vérifiera chaque fiche afin vous proposer des <br> solutions pertinentes qui vous feront gagner du temps</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign2_col2">
                        </div>
                        <div class="text_aven">
                            <h4>Startup unique en son genre</h4>
                            <p>Découvrez une startup unique en son genre avec un projet <br> novateur tendant à réunir les passionnés d’informatique</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign3_col2">
                        </div>
                        <div class="text_aven">
                            <h4>Des développeurs rigoureux</h4>
                            <p>Notre équipe travaille dur pour corriger chaque bug et vous <br> proposer la meilleure expérience possible</p>
                        </div>
                    </div>
                </div>
            </div>
        <div>

    </section>

</body>

</html>