<?php
require('../../../lib/config.php');



$data = $bdd->query("SELECT problemmodify.problemModifyID, problemmodify.problemID, problemmodify.newTitle, problemmodify.newCodeError, problemmodify.newDescription, problemmodify.newSolution, problemmodify.newLinkToScreen, problemmodify.dateOfModification, problem.problemID, problem.userID, problem.title, problem.description, problem.codeError, problem.solution, problem.linkToScreen, problem.dateOfPublication FROM problemmodify INNER JOIN problem ON problem.problemID=problemmodify.problemID")->fetchAll();

$modifyProblems = array();
foreach ($data as $row) {
    $modifyProblems[$row['problemID']] = $row;
}

?>
<h2>Liste des problèmes qui ont été modifiés</h2>

<?php
foreach ($modifyProblems as $row) {
    echo '<div class="d-bloc list-MP" data-modifyProblemID=' . $row['problemID'] . '>';
    echo "<p class='title'>" . $row['newTitle'] . "</p>";
    echo "<p class='codeError'>" . $row['newCodeError'] . "</p>";
    echo "<p class='dateOfPublication'>" . $row['dateOfModification'] . "</p>";
    echo "<div><button type='button' class='btn btn-primary edit-modalModify' data-modifyProblemID='" . $row['problemID'] . "' data-bs-toggle='modal' data-bs-target='#moreInfomodifyProblems'>Voir</button><button type='button' class='btn btn-outline-danger npPublieMP' data-modifyProblemID='" . $row['problemID'] . "'>Ne pas publié</button><button type='button' class='btn btn-outline-success publieMP' data-modifyProblemID='" . $row['problemID'] . "'>Publié</button></div>";
    echo "</div>";
}
?>



<!-- Modal Informations -->
<div class="modal fade" id="moreInfoModifyProblems" tabindex="-1" aria-labelledby="moreInfoModifyProblemsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="moreInfoModifyProblemsLabel">Problème en details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Merci de lire attentiviement le problème et de vous assurer que ce problème peut etre posté</p>
                <div class="d-flex">
                    <div>
                        <h2 id="titreMP">Titre</h2>
                        <p id="descriptionMP">dfodfdf</p>
                        <p id="codeErrorMP"></p>
                        <p id="solutionMP"></p>
                        <p id="photosMP">photo</p>
                        <p id="dateMP">Publié le :</p>
                    </div>
                    <div>
                        <h2 id="newTitreMP">Titre</h2>
                        <p id="newDescriptionMP">dfodfdf</p>
                        <p id="newCodeErrorMP"></p>
                        <p id="newSolutionMP"></p>
                        <p id="newPhotosMP">photo</p>
                        <p id="newDateMP">Modifié le :</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-danger npPublieMP" data-modifyProblemID=''>Ne pas publié</button>
                <button type="button" class="btn btn-success publieMP" data-modifyProblemID=''>Publié</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        var modifyProblemList = <?php echo json_encode($modifyProblems); ?>;

        //Bouton voir le pbm
        $('.edit-modalModify').on('click', function(e) {
            e.preventDefault();
            $thisbutton = $(this);
            var problemID = $thisbutton.attr('data-modifyProblemID');
            $("#titreMP").text(modifyProblemList[problemID]['title']);
            $("#descriptionMP").text("Description de l'erreur : " + modifyProblemList[problemID]['description']);
            $("#codeErrorMP").text("Code erreur : " + modifyProblemList[problemID]['codeError']);
            $("#solutionMP").text("Solution : " + modifyProblemList[problemID]['solution']);
            $("#photosMP").text("Photos : " + modifyProblemList[problemID]['linkToScreen']);
            $("#dateMP").text("Date de publication : " + modifyProblemList[problemID]['dateOfPublication']);
            $("#newTitreMP").text(modifyProblemList[problemID]['newTitle']);
            $("#newDescriptionMP").text("Description de l'erreur : " + modifyProblemList[problemID]['newDescription']);
            $("#newCodeErrorMP").text("Code erreur : " + modifyProblemList[problemID]['newCodeError']);
            $("#newSolutionMP").text("Solution : " + modifyProblemList[problemID]['newSolution']);
            $("#newPhotosMP").text("Photos : " + modifyProblemList[problemID]['newLinkToScreen']);
            $("#newDateMP").text("Date de modifications " + modifyProblemList[problemID]['dateOfModification']);
            $("#moreInfomodifyProblems .publieMP").attr("data-modifyProblemID", problemID);
            $("#moreInfomodifyProblems .npPublieMP").attr("data-modifyProblemID", problemID);

        });


        //Bouton publié
        $('.publieMP').on('click', function(e) {
            e.preventDefault();
            $thisbutton = $(this);

            var problemID = $thisbutton.attr("data-modifyProblemID");
            var newProblemID = modifyProblemList[problemID]['problemModifyID'];


            var title = modifyProblemList[problemID]['newTitle'];
            var description = modifyProblemList[problemID]['newDescription'];
            var codeError = modifyProblemList[problemID]['newCodeError'];
            var solution = modifyProblemList[problemID]['newSolution'];
            var status = 2;

            var dataString = "problemID=" + problemID + "&title=" + title + "&description=" + description + "&codeError=" + codeError + "&solution=" + solution + "&status=" + status + "&newProblemID=" + newProblemID;


            $.ajax({
                type: "POST",
                url: "./modifyProblemUtils/publishProblemModify.php",
                data: dataString,
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });

            $("div[data-modifyProblemID=" + problemID + "]").remove();

            delete modifyProblemList[problemID];

            $('#moreInfoModifyProblems').modal('hide');



        });

        //Bouton Ne pas publié
        $('.npPublieMP').on('click', function(e) {
            e.preventDefault();
            $thisbutton = $(this);
            var problemID = $thisbutton.attr('data-modifyProblemID');
            var newProblemID = modifyProblemList[problemID]['problemModifyID'];
            var dataString = "problemID=" + problemID + "&newProblemID=" + newProblemID;

            $.ajax({
                type: "POST",
                url: "./modifyProblemUtils/cancelModification.php",
                data: dataString,
                success: function(data) {
                    console.log(data);
                }
            });

            delete modifyProblemList[problemID];

            $("div[data-modifyProblemID=" + problemID + "]").remove();



            $('#moreInfoModifyProblems').modal('hide');
        })

    });
</script>