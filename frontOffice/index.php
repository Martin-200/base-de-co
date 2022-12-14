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
        background-color: #fff;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.03);
    }
    .float-container {
    border: 3px none #fff;  
    }
    

    .icon_livre
    {
        margin-right: 6px;
        height: 15;
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
        margin-top: 12px;
        
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
        margin-right: 15px;
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
        padding-top: 225px;
    }

    .fiche
    {
        padding-top: 225px;
    }

    .searchProblem
    {
        border: none;
        width: 295px;
        outline: 0;
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
    .icone_loupe
    {
        padding-right: 9px;
    }
    h6
    {
        margin-top: 18px;
    }
    .icone_aven
    {
        margin-right: 15px;
    }
    .aventage_div1
    {
        margin-right: 85px;
        min-width: 400px;
    }
   .aventage_div2
   {
        min-width: 400px;
   }

   .presentation_div1
   {
    min-width: 400px;
   }
   .presentation_div2
   {
    min-width: 400px;
   }

   .commu_div1
   {
    min-width: 400px;
   }
   .commu_div2
   {
    min-width: 400px;
   }

   .fiche_div1
   {
    min-width: 400px;
   }
   .fiche_div2
   {
    min-width: 400px;
   }

   @media (min-width: 0px) and (max-width: 600px) 
   { 
        .aventage_div1
        {
            margin-right: 0;
            min-width: none;
        }
        .container
        {
            margin: 10px;
        }
        .presentation_div2
        {
            margin-top: 42px;
        }
        .commu_div2
        {
            margin-top: 42px;
        }
    }
   
</style>

<body>
    <section id="recherche" class="hero-header">

        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <div>
                        <div class="mini-title d-flex align-items-center">
                            <img class="icon_livre" src="../ressource/Vector.png">
                            <p>Base de connaissance</p>
                        </div>
                        <H1 class="radiant-title">Jamais 4 Erreurs <br> Sans 4 Solutions</H1>
                        <h6 class="fw-bold">Trouve la solution ?? ton erreur</h6>
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
                <div class="presentation_div1 col d-flex align-items-center justify-content-center flex-wrap">
                    <div class="pre col d-flex align-items-center justify-content-center">
                        <div>
                            <div class="mini-title">
                                <p>Pr??sentation</p>
                            </div>
                            <H1 class="title">Une base de <br> connaissances <br> communautaire </H1>
                            <h6> R??alis??  <a class="titreBico"> pour vous </a> et <a class="titreBico"> par vous </a> </h6>
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
            <div class="row flex-wrap">
                <div class="commu_div1 col d-flex align-items-center justify-content-center">
                    <img class="Cap_Comm" src="../ressource/capureMesage.png"  alt="capture commentaire">
                </div>
                <div class="commu_div2 col d-flex align-items-center justify-content-center">
                    <div>
                        <div class="mini-title">
                            <p>Communaut??</p>
                        </div>
                        <H1 class="title">Espace <br>  commentaire </H1>
                        <h6>404.io vous aide  ?? resoudre l???ensemble de vos <br> probl??mes. Poss??dant une grande base de <br> connaissances notamment aliment??e par vous,<br> nous vous proposons un maximum de solutions. </h6>
                        <div>
                            <div class="icone_comDIV d-flex mt-4">
                                <img class="icone_com" src="../ressource/Frame.png" alt="icone_com">
                                <p>Nous mettons  ?? votre disposition un espace commentaire  - <br> pr??sent  sous chaque fiche r??ponse. Cet espace  vous permettra <br> d?????changer avec la communaut??.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class=fiche>
            <div class="row flex-wrap">
                <div class="fiche_div1 col d-flex align-items-center justify-content-center">
                    <div>
                        <div class="mini-title">
                            <p>Fiche</p>
                        </div>
                        <H1 class="title">Proposer votre <br>  fiche r??ponse </H1>
                        <h6>Notre base vous aide ?? trouver les solutions ?? vos <br> probl??mes, de plus elle tend ?? s???agrandir. Ainsi, via la <br> proposition de fiches, vous nous aiderez ?? faire <br> ??voluer le site. </h6>
                        <div>
                            <div class="icone_comDIV d-flex mt-4">
                                <img class="icone_Fic" src="../ressource/Icon_Ed.png" alt="icone_Fiche">
                                <p class="ms-3">En plus de la proposition de fiche, 404.io vous permet de <br> modifier des solutions existantes - si vous les trouvez <br> incompl??tes ou erron??es.</p>
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
            <H1 class="title">Exemples de technologies trait??es</H1>
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
            
            <div class="col d-flex align-items-center justify-content-center mt-5 flex-wrap container">
                <div class="aventage_div1 ">
                    <div class="d-flex mt-3">
                        <div class="icone_aven">
                            <img alt="icone_lign1_col1" src="../ressource/recueil-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>Un recueil de fiches en expansion</h4>
                            <p>Notre recueil de fiches solutions est en constante expension <br> et ne connait aucune limite</p>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <div class="icone_aven">
                            <img alt="icone_lign2_col1" src="../ressource/commu-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>Une communaut?? soud??e et passionn??e</h4>
                            <p>Nous sommes une communaut?? soud??e et ?? 100% <br> passionn??e par l???informatique</p>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <div class="icone_aven">
                            <img alt="icone_lign3_col1" src="../ressource/acces-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>Un acc??s cross-plateforme</h4>
                            <p>Acc??dez ?? la base de connaissances o?? que vous soyez, peu <br> importe l???appareil</p>
                        </div>
                    </div>
                    
                </div>

                <div class="aventage_div2 ">
                    <div class="d-flex mt-3">
                        <div class="icone_aven">
                            <img alt="icone_lign1_col2" src="../ressource/verif-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>V??rification par une ??quipe passionn??e</h4>
                            <p>Notre ??quipe v??rifiera chaque fiche afin vous proposer des <br> solutions pertinentes qui vous feront gagner du temps</p>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <div class="icone_aven">
                            <img alt="icone_lign2_col2" src="../ressource/startup-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>Startup unique en son genre</h4>
                            <p>D??couvrez une startup unique en son genre avec un projet <br> novateur tendant ?? r??unir les passionn??s d???informatique</p>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <div class="icone_aven">
                            <img alt="icone_lign3_col2" src="../ressource/dev-icon.png">
                        </div>
                        <div class="text_aven">
                            <h4>Des d??veloppeurs rigoureux</h4>
                            <p>Notre ??quipe travaille dur pour corriger chaque bug et vous <br> proposer la meilleure exp??rience possible</p>
                        </div>
                    </div>
                </div>
            </div>
        <div>

    </section>

</body>

</html>