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
    .float-container {
    border: 3px none #fff;  
    }
    

    .icon_livre
    {
        margin-right: 6px;
    }
    
    .float-child {
        width: 50%;
        float: left;
    }

    .presentation
    {
        padding-top: 125px;
    }
    .bouton
    {
        border-radius:31px;
        background-color:#11053B;
        color:#fff;
        text-align: center;
        padding: 6px 24px;
        
    }

    .icone_Fic
    {
       height:55px;
    }

    .Capture_P
    {
        width: 60%;
    }

    .icone_com
    {
        height:55px;
    }

    .Cap_Comm
    {
        width: 60%;
    }
    .Cap_fiche
    {
        width: 60%;
    }

    .communaute
    {
        padding-top: 125px;
    }

    .fiche
    {
        padding-top: 125px;
    }

    .searchProblem
    {
        border: none;
        width: 295px;
    }

    .tecno
    {
        padding-top: 125px;
        padding-bottom: 75px;
    }
    .icon_lang
    {
        padding-top: 95px;
    }
    .aventage
    {
        padding-top: 85px;
        background-color:#11053B;
        color:#fff;
        padding-bottom: 85px;
    }

    .title_center
    {
        color: #fff;
    }

    .titreBico
    {
        color: #11053B;
        font-weight: 700;
        text-decoration: none;
        
    }
    a.titreBico:hover
    {
        color: #11053B;
    }
    .lien_B
    {
        text-decoration: none;
        color:#fff;
    }

   
   
</style>

<body>
    <section id="recherche" class="hero-header">

        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <div>
                        <div class="mini-title d-flex">
                            <img class="icon_livre" src="../ressource/Vector.png">
                            <p>Base de connaissance</p>
                        </div>
                        <H1 class="radiant-title">Jamais 4 Erreurs <br> Sans 4 Solutions</H1>
                        <h6>Trouve la solution a ton erreur</h6>
                        <form class="d-flex" action="./pages/home/search_action.php" method="POST">
                            <div id="searchProblem">
                                <img class="icone_loupe" src="../ressource/search-icon.png">
                                <input type="search" name="searchProblem" class="searchProblem"  placeholder='Rechercher'>
                            </div>
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
                    <div class="pre col d-flex align-items-center justify-content-center">
                        <div>
                            <div class="mini-title">
                                <p>Présentation</p>
                            </div>
                            <H1 class="title">Une base de <br> connaissances <br> communautaire </H1>
                            <h6> Réalisé  <a class="titreBico"> pour vous </a> et <a class="titreBico"> par vous </a> </h6>
                            <button class="bouton" type="button"><a class="lien_B" href="#recherche">Rechercher mon erreur</a></button>
                        </div>
                    </div>
                    <div class="presentation_div2 col d-flex align-items-center justify-content-center">
                        <img class="Capture_P" src="../ressource/capureFiche.png" alt="Capture fiche ereur avec comentaire">
                    </div>
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
                        <h6>404.io vous aide  à resoudre l’ensemble de vos <br> problèmes. Possédant une grande base de <br> connaissances notamment alimentée par vous,<br> nous vous proposons un maximum de solutions. </h6>
                        <div>
                            <div class="icone_comDIV d-flex">
                                <img class="icone_com" src="../ressource/Frame.png" alt="icone_com">
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
                        <h6>Notre base vous aide à trouver les solutions à vos <br> problèmes, de plus elle tend à s’agrandir. Ainsi, via la <br> proposition de fiches, vous nous aiderez à faire <br> évoluer le site. </h6>
                        <div>
                            <div class="icone_comDIV d-flex">
                                <img class="icone_Fic" src="../ressource/Icon_Ed.png" alt="icone_Fiche">
                                <p class="ms-3">En plus de la proposition de fiche, 404.io vous permet de <br> modifier des solutions existantes - si vous les trouvez <br> incomplètes ou erronées.</p>
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

    <section class="tecno ">
        <div class="Tecno_contenu d-flex align-items-center justify-content-center flex-column" >
            <div class="mini-title ">
                <p>Technologies</p>
            </div>
            <H1 class="title">Exemples de technologies traitées</H1>
            <img class="icon_lang " src="../ressource/icon_dev.png">
        </div>
    </section>

    <section class="aventage">
        <div class="aventage_contenu">
            <div class="aligne_titre d-flex align-items-center justify-content-center flex-column">
                <div class="mini-title">
                    <p>Avantage</p>
                </div>
                <H1 class="title_center">Avantages</H1>
            </div>
            
            <div class="col d-flex align-items-center justify-content-center">
                <div class="aventage_div1">
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign1_col1" src="../ressource/recueil-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>Un recueil de fiches en expansion</h4>
                            <p>Notre recueil de fiches solutions est en constante expension <br> et ne connait aucune limite</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign2_col1" src="../ressource/commu-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>Une communauté soudée et passionnée</h4>
                            <p>Nous sommes une communauté soudée et à 100% <br> passionnée par l’informatique</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign3_col1" src="../ressource/acces-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>Un accès cross-plateforme</h4>
                            <p>Accèdez à la base de connaissances où que vous soyez, peu <br> importe l’appareil</p>
                        </div>
                    </div>
                    
                </div>

                <div class="aventage_div2 ">
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign1_col2" src="../ressource/verif-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>Vérification par une équipe passionnée</h4>
                            <p>Notre équipe vérifiera chaque fiche afin vous proposer des <br> solutions pertinentes qui vous feront gagner du temps</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign2_col2" src="../ressource/startup-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>Startup unique en son genre</h4>
                            <p>Découvrez une startup unique en son genre avec un projet <br> novateur tendant à réunir les passionnés d’informatique</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="icone_aven">
                            <img alt="icone_lign3_col2" src="../ressource/dev-icon.png">
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