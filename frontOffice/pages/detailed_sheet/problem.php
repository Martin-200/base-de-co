<?php include '../../../lib/config.php' ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <title>Connexion | BookinG4</title>
        <?php include '../../components/global/includes/head.php'; ?>
    </head>

    <body>
        <header>
            <?php include '../../components/global/includes/header.php'; ?>
        </header>
        
        <main>
            <section>
                <?php /*

                Récupérer données GET ?id= affichage fiche + infos (auteur, galerie, basiques=titre,description)
                Espace commentaires en dessous (stylisé mini pour rép)

                */
                
                if (isset($_GET['id'])){
                    $problemId = htmlspecialchars($_GET['id']);

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
                        $problemAuthorId = htmlspecialchars($data['userID']);
                        $problemViews = htmlspecialchars($data['view']);
                        $problemStatus = htmlspecialchars($data['status']);
                        $problemGallery = explode(',', htmlspecialchars($data['linkToScreen']));
                        $problemPublicationDateBdd = htmlspecialchars($data['dateOfPublication']);
                        $problemPublicationDateStr = strtotime($problemPublicationDateBdd);
                        $problemPublicationDateBrut = date_create($problemPublicationDateBdd);

                        $year = date_format($problemPublicationDateBrut, 'Y');
                        $month = date_format($problemPublicationDateBrut, 'm');
                        $day = date_format($problemPublicationDateBrut, 'd');
                        $hour = date_format($problemPublicationDateBrut, 'H');
                        $minute = date_format($problemPublicationDateBrut, 'i');

                        $problemPublicationDate = $day."/".$month."/".$year;
                        $problemPublicationHour = $hour."h".$minute;

                        $checkAuthor = $bdd->prepare('SELECT * FROM user WHERE userID = ?');
                        $checkAuthor->execute([$problemAuthorId]);
                        $dataAuthor = $checkAuthor->fetch();
                        $rowAuthor = $checkAuthor->rowCount();
                        $checkAuthor->closeCursor();

                        if ($rowAuthor > 0){
                            $problemAuthor = htmlspecialchars($dataAuthor['username']);
                        } else {
                            $problemAuthor = "Unknown";
                        }

                        // Statuts = proposé / publié / supprimé (sauvegarde) / en attente de modification

                        if (USER_LEVEL == 1){ // Vue utilisateur lambda
                            ?>
                            <h1><?= $problemTitle ?></h1>
                            <p><?= $problemDescription ?></p>
                            <p><?= $problemSolution ?></p>
                            <?php
                            if (!empty($problemCodeError)){
                                ?> <p>Code d'Erreur = <?= $problemCodeError ?></p> <?php
                            }
                            for ($i = 0; $i < sizeof($problemGallery) - 1; $i++) { 
                                ?>
                                <img src="./images/<?= $problemGallery[$i] ?>" alt="Illustration n°<?= $i ?>">
                                <?php
                            }
                            ?>
                            <p><?= $problemPublicationDate ?></p>
                            <p><?= $problemPublicationHour ?></p>
                            <p><?= $problemAuthor ?></p>
                            <p><?= $problemViews ?></p>
                            <?php
                        } else { // Vue admin / modo
                            
                        }
                    } else {
                        ?>
                        <p>Fiche non existante</p>
                        <?php
                    }
                }
                ?>
            </section>
        </main>
        
        <footer>
            <?php include '../../components/global/includes/footer.php'; ?>
        </footer>
    </body>
</html>