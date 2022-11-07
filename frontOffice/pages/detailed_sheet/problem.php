<?php session_start(); ?>
<?php include '../../../lib/config.php' ?>
<?php
if (isset($_GET['id'])){
                        
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <title> - 404io</title>
        <?php include '../../components/global/includes/head.php'; ?>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="./src/css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <header>
            <?php include '../../components/global/includes/header.php'; ?>
        </header>
        
        <main>
            <section class="bandeau-resultat">
                <h2>Voici la fiche associée à votre erreur</h2>
            </section>

            <section class="detail">
                <div class="colonne-recherche">
                    <div>
                        <label for="search">Rechercher</label>
                        <form action="">
                            <button type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <input type="text" id="search" name="search" placeholder="Rechercher">
                        </form>
                    </div>
                </div>

                <div class="colonne-fiche">
                    <?php
                    /*
                    Récupérer données GET ?id= affichage fiche + infos (auteur, galerie, basiques=titre,description)
                    Espace commentaires en dessous (stylisé mini pour rép)
                    */

                    

                    $problemId = htmlspecialchars($_GET['id']);

                        $userId = isset($_SESSION['userID']) ? $_SESSION['userID'] : NULL;
                        ?>
                        <script type="text/javascript">
                            const userID = <?= json_encode($userId) ?>;
                            const problemID = <?= json_encode($problemId) ?>;
                        </script>
                        <?php

                        $check = $bdd->prepare('SELECT * FROM problem WHERE problemID = ?');
                        $check->execute([$problemId]);
                        $data = $check->fetch();
                        $row = $check->rowCount();
                        $check->closeCursor();

                        if ($row > 0){
                            $problemTitle = htmlspecialchars($data['title']);
                            $problemDescription = htmlspecialchars($data['description']);
                            $problemSolution = htmlspecialchars($data['solution']);
                            $problemCodeError = htmlspecialchars($data['codeError']);
                            $problemAuthorID = htmlspecialchars($data['userID']);
                            $problemViews = htmlspecialchars($data['view']);
                            $problemStatus = htmlspecialchars($data['status']);
                            $problemGallery = explode(',', htmlspecialchars($data['linkToScreen']));
                            $problemPublicationDateBdd = htmlspecialchars($data['dateOfPublication']);
                            $problemPublicationDateStr = strtotime($problemPublicationDateBdd);
                            $problemPublicationDateBrut = date_create($problemPublicationDateBdd);

                            $year = date_format($problemPublicationDateBrut, 'Y');
                            $month = date_format($problemPublicationDateBrut, 'm');
                            $day = date_format($problemPublicationDateBrut, 'd');

                            $problemPublicationDate = $day."/".$month."/".$year;

                            $checkCategory = $bdd->prepare('SELECT * FROM `category` WHERE `categoryID` IN ( SELECT `categoryID` FROM `problemcategory` WHERE `problemID` = ? )');
                            $checkCategory->execute([$problemId]);
                            $rowCategory = $checkCategory->rowCount();
                            $problemCategories = array();

                            if ($rowCategory > 0){
                                while ($dataCategory = $checkCategory->fetch()){
                                    $problemCategoryID = htmlspecialchars($dataCategory['categoryID']);
                                    $problemCategoryName = htmlspecialchars($dataCategory['categoryName']);
                                    $problemCategoryColor = htmlspecialchars($dataCategory['categoryColor']);

                                    array_push($problemCategories, [
                                        "problemCategoryID" => $problemCategoryID,
                                        "problemCategoryName" => $problemCategoryName,
                                        "problemCategoryColor" => $problemCategoryColor
                                    ]);
                                }
                            }
                            $checkCategory->closeCursor();

                            $checkAuthor = $bdd->prepare('SELECT * FROM user WHERE userID = ?');
                            $checkAuthor->execute([$problemAuthorID]);
                            $dataAuthor = $checkAuthor->fetch();
                            $rowAuthor = $checkAuthor->rowCount();
                            $checkAuthor->closeCursor();

                            if ($rowAuthor > 0){
                                $problemAuthorName = htmlspecialchars($dataAuthor['username']);
                                $problemAuthorPicture = htmlspecialchars($dataAuthor['profilePictureUrl']);
                            } else {
                                $problemAuthorName = "Utilisateur supprimé";
                                $problemAuthorPicture = "undefined.png";
                            }
                            ?>

                            <div class="recurrence-erreur-container">
                                <div class="recurrence-erreur">
                                    <p>Récurrence de l'erreur :</p>
                                    <div class="stars">
                                        <?php
                                        for ($i = 0; $i < 5; $i++) { 
                                            ?>
                                            <i class="fa-solid fa-star"></i>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <a href="#" class="retour-fiche">
                                    <i class="fa-solid fa-share"></i>
                                </a>
                            </div>

                            <h1 data-problem="<?= $problemId ?>" data-user="<?= $problemId ?>">
                                <?php
                                echo $problemTitle;
                                if (!empty($problemCodeError)){
                                    ?> <small>[Code d'erreur <?= $problemCodeError ?>]</small> <?php
                                }
                                ?>
                            </h1>

                            <div class="infos-container">
                                <div class="auteur">
                                    <div class="auteur-image" style="background-image: url(<?= $problemAuthorPicture ?>);"></div>
                                    <div class="auteur-nom"><?= $problemAuthorName ?></div>
                                </div>

                                <div class="date-publication"><?= $problemPublicationDate ?></div>
                            </div>

                            <div class="probleme-description">
                                <h3>Contexte</h3>
                                <p><?= $problemDescription ?></p>
                            </div>

                            <div class="probleme-solution">
                                <h3>Solution</h3>
                                <p><?= $problemSolution ?></p>
                            </div>

                            <div class="galerie">
                                <div class="galerie-carroussel">
                                    <?php
                                    for ($i = 0; $i < sizeof($problemGallery); $i++) { 
                                        ?>
                                        <img src="./images/<?= $problemGallery[$i] ?>" alt="Illustration n°<?= $i+1 ?>">
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="vues-container">
                                <div class="vues">
                                    <i class="fa-solid fa-eye"></i>
                                    <p><?= $problemViews ?> vues</p>
                                </div>

                                <div class="tags">
                                    <?php
                                     for ($i = 0; $i < sizeof($problemCategories); $i++) {
                                        ?>
                                        <div class="tag">
                                            <?= $problemCategories[$i]["problemCategoryName"] ?>
                                        </div>
                                        <?php
                                     }
                                    ?>
                                </div>
                            </div>

                            <div>
                                <?php
                                if (isset($_SESSION['userLevel']) && $_SESSION['userLevel'] >= 2){
                                    ?>
                                    <a href="">Modifier</a>
                                    <a href="">Supprimer</a>
                                    <?php
                                }
                                ?>
                            </div>
                            
                            <h3 class="titre-commentaires">Commentaires</h3>

                            <hr class="separation-fiche">

                            <div class="comments">
                                <?php
                                $checkComments = $bdd->prepare('SELECT * FROM comments WHERE problemID = ? ORDER BY numberUpVote DESC, dateOfPublication DESC');
                                $checkComments->execute([$problemId]);
                                $rowComments = $checkComments->rowCount();

                                if ($rowComments > 0){
                                    $commentRespondToCount = 0;

                                    while ($dataComments = $checkComments->fetch()){
                                        $commentID = htmlspecialchars($dataComments['commentID']);
                                        $commentRespondToCommentID = $dataComments['respondTo'];

                                        if (is_null($commentRespondToCommentID)){
                                            $commentAuthorID = htmlspecialchars($dataComments['userID']);
                                            $commentMessage = htmlspecialchars($dataComments['message']);
                                            $commentUpVotes = htmlspecialchars($dataComments['numberUpVote']);
                                            $commentDownVotes = htmlspecialchars($dataComments['numberDownVote']);
                                            $commentPublicationDateBdd = htmlspecialchars($dataComments['dateOfPublication']);
                                            $commentPublicationDateString = strtotime($commentPublicationDateBdd);
                                            $commentPublicationDateBrut = date_create($commentPublicationDateBdd);

                                            $year = date_format($commentPublicationDateBrut, 'Y');
                                            $month = date_format($commentPublicationDateBrut, 'm');
                                            $day = date_format($commentPublicationDateBrut, 'd');
                                            $hour = date_format($commentPublicationDateBrut, 'H');
                                            $minute = date_format($commentPublicationDateBrut, 'i');

                                            $commentPublicationDate = $day."/".$month."/".$year;
                                            $commentPublicationHour = $hour."h".$minute;

                                            $commentPublicationSentAtString = abs($commentPublicationDateString - time());
                                            $tmp = $commentPublicationSentAtString;
                                            $commentPublicationSentAt['second'] = $tmp % 60;
                                            $commentPublicationSentAtTime = $commentPublicationSentAt['second'];
                                            $commentPublicationSentAtTimeType = "s";
                                        
                                            $tmp = floor( ($tmp - $commentPublicationSentAt['second']) /60 );
                                            $commentPublicationSentAt['minute'] = $tmp % 60;
                                            if ($commentPublicationSentAt['minute'] > 0){
                                                $commentPublicationSentAtTime = $commentPublicationSentAt['minute'];
                                                $commentPublicationSentAtTimeType = "min";
                                            }
                                        
                                            $tmp = floor( ($tmp - $commentPublicationSentAt['minute'])/60 );
                                            $commentPublicationSentAt['hour'] = $tmp % 24;
                                            if ($commentPublicationSentAt['hour'] > 0){
                                                $commentPublicationSentAtTime = $commentPublicationSentAt['hour'];
                                                $commentPublicationSentAtTimeType = "h";
                                            }
                                        
                                            $tmp = floor( ($tmp - $commentPublicationSentAt['hour'])  /24 );
                                            $commentPublicationSentAt['day'] = $tmp;
                                            if ($commentPublicationSentAt['day'] > 0){
                                                $commentPublicationSentAtTime = $commentPublicationSentAt['day'];
                                                $commentPublicationSentAtTimeType = "j";
                                            }

                                            $checkAuthor = $bdd->prepare('SELECT * FROM user WHERE userID = ?');
                                            $checkAuthor->execute([$commentAuthorID]);
                                            $dataAuthor = $checkAuthor->fetch();
                                            $rowAuthor = $checkAuthor->rowCount();
                                            $checkAuthor->closeCursor();

                                            if ($rowAuthor > 0){
                                                $commentAuthorName = htmlspecialchars($dataAuthor['username']);
                                                $commentAuthorPicture = htmlspecialchars($dataAuthor['profilePictureUrl']);
                                            } else {
                                                $commentAuthorName = "Utilisateur supprimé";
                                                $commentAuthorPicture = "undefined.png";
                                            }
                                            ?>
                                            <div class="comment" id="comment-<?= $commentID ?>">
                                                <div class="comment-author">
                                                    <div class="comment-author-frame">
                                                        <div class="comment-author-frame-picture" style="background-image: url(<?= $commentAuthorPicture ?>);"></div>
                                                    </div>

                                                    <div class="comment-author-infos">
                                                        <div class="comment-author-infos-identity">
                                                            <p class="comment-author-infos-identity-name"><?= $commentAuthorName ?></p>
                                                            <p class="comment-author-infos-identity-datesend">• il y a <?= $commentPublicationSentAtTime." ".$commentPublicationSentAtTimeType ?></p>
                                                        </div>

                                                        <div class="comment-author-infos-comment">
                                                            <?= $commentMessage ?>
                                                        </div>

                                                        <div class="comment-author-infos-interactions">
                                                            <div class="comment-author-infos-interactions-votes">
                                                                <div class="comment-author-infos-interactions-votes-upvote">
                                                                    <i class="fa-solid fa-arrow-up"></i>
                                                                    <p><?= $commentUpVotes ?></p>
                                                                </div>
                                                                <div class="comment-author-infos-interactions-votes-downvote">
                                                                    <i class="fa-solid fa-arrow-down"></i>
                                                                </div>
                                                            </div>

                                                            <div class="comment-author-infos-interactions-respond">
                                                                <i class="fa-solid fa-comment"></i>
                                                                <p>Répondre</p>
                                                            </div>

                                                            <div class="comment-author-infos-interactions-report">
                                                                <i class="fa-solid fa-flag"></i>
                                                                <p>Signaler</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <button>Signaler le commentaire</button>
                                                <button type="button" data-commentbutton="answer-<?= $commentID ?>">Répondre au commentaire</button>
                                                <div>
                                                    <textarea name="answer" data-commentfield="answer-<?= $commentID ?>"></textarea>
                                                    <button type="button" data-commentsend="answer-<?= $commentID ?>">Envoyer</button>
                                                </div>
                                            </div>

                                            
                                            <?php
                                            $responseID = $commentID;
                                            do{
                                                
                                            } while (!is_null($commentRespondToCommentID));
                                            $commentRespondToCount += 1;

                                            $checkResponse = $bdd->prepare('SELECT * FROM comments WHERE respondTo = ?');
                                            $checkResponse->execute([$commentID]);
                                            $rowResponse = $checkResponse->rowCount();
                                            
                                            if ($rowResponse > 0){
                                                while ($dataResponse = $checkResponse->fetch()){
                                                    $commentRespondToCommentID = $dataResponse['respondTo'];
                                                    $responseID = htmlspecialchars($dataResponse['commentID']);

                                                    $responseAuthorID = htmlspecialchars($dataResponse['userID']);
                                                    $responseMessage = htmlspecialchars($dataResponse['message']);
                                                    $responseUpVotes = htmlspecialchars($dataResponse['numberUpVote']);
                                                    $responseDownVotes = htmlspecialchars($dataResponse['numberDownVote']);
                                                    $responsePublicationDateBdd = htmlspecialchars($dataResponse['dateOfPublication']);
                                                    $responsePublicationDateString = strtotime($responsePublicationDateBdd);
                                                    $responsePublicationDateBrut = date_create($responsePublicationDateBdd);

                                                    $year = date_format($responsePublicationDateBrut, 'Y');
                                                    $month = date_format($responsePublicationDateBrut, 'm');
                                                    $day = date_format($responsePublicationDateBrut, 'd');
                                                    $hour = date_format($responsePublicationDateBrut, 'H');
                                                    $minute = date_format($responsePublicationDateBrut, 'i');

                                                    $responsePublicationDate = $day."/".$month."/".$year;
                                                    $responsePublicationHour = $hour."h".$minute;

                                                    $checkAuthor = $bdd->prepare('SELECT * FROM user WHERE userID = ?');
                                                    $checkAuthor->execute([$responseAuthorID]);
                                                    $dataAuthor = $checkAuthor->fetch();
                                                    $rowAuthor = $checkAuthor->rowCount();
                                                    $checkAuthor->closeCursor();

                                                    if ($rowAuthor > 0){
                                                        $responseAuthorName = htmlspecialchars($dataAuthor['username']);
                                                        $responseAuthorPicture = htmlspecialchars($dataAuthor['profilePictureUrl']);
                                                    } else {
                                                        $responseAuthorName = "Utilisateur supprimé";
                                                        $responseAuthorPicture = "undefined.png";
                                                    }
                                                    ?>
                                                    <div class="comment response" id="comment-<?= $responseID ?>">
                                                        <!-- Tepmplate commentaire include -->
                                                        <p>Répond à <?= $commentAuthorName ?></p>
                                                        <p class="comment-message"><?= $responseMessage ?></p>
                                                        <p><?= $responsePublicationDate ?> à <?= $responsePublicationHour ?></p>
                                                        <?php
                                                        if ($responseAuthorID == $problemAuthorID){
                                                            ?>
                                                            <p class="comment-problem-author"><?= $responseAuthorName ?></p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p><?= $responseAuthorName ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                        <img src="./url/<?= $responseAuthorPicture ?>" alt="Photo de profil de l'utilisateur">
                                                        <p><?= $responseUpVotes ?> Up vote</p>
                                                        <p><?= $responseDownVotes ?> Down Vote</p>
                                                        <button>Signaler le commentaire</button>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            $checkResponse->closeCursor();

                                            $commentRespondToCount = 0;
                                        }
                                    }
                                } else {
                                    ?>
                                    <p>Pas de commentaires</p>
                                    <?php
                                }
                                $checkComments->closeCursor();

                                // Ajouter un commentaire
                                ?>
                            </div>



                            
                            
                            


                            
                            <p>Ajouter un commentaire</p>
                            <?php
                        } else {
                            ?>
                            <p>Fiche non existante</p>
                            <?php
                        }
                    ?>
                </div>
            </section>
        </main>
        
        <footer>
            <?php include '../../components/global/includes/footer.php'; ?>
        </footer>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="./src/js/nav.js" type="text/javascript"></script>
</html>