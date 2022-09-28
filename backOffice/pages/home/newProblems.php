<?php
require('../../../lib/config.php');



$data = $bdd->query("SELECT problem.problemID, problem.userID, problem.title, problem.description, problem.codeError, problem.solution, problem.status, problem.linkToScreen, problem.dateOfPublication, User.username FROM problem INNER JOIN User ON problem.userID=User.userID WHERE problem.status=1")->fetchAll();

$newProblems = array();
foreach ($data as $row) {
    $newProblems[$row['problemID']] = $row;
}
?>
<h2>Liste des nouveaux problèmes</h2>

<?php
foreach ($newProblems as $row) {
    echo '<div class="d-bloc list-NP" data-newProblemID=' . $row['problemID'] . '>';
    echo "<p class='title'>" . $row['title'] . "</p>";
    echo "<p class='codeError'>" . $row['codeError'] . "</p>";
    echo "<p class='dateOfPublication'>" . $row['dateOfPublication'] . "</p>";
    echo "<p class='username'>" . $row['username'] . "</p>";
    echo "<div><button type='button' class='btn btn-primary edit-modal' data-newProblemID='" . $row['problemID'] . "' data-bs-toggle='modal' data-bs-target='#moreInfoNewProblems'>Voir</button><button type='button' class='btn btn-outline-danger npPublieNP' data-newProblemID='" . $row['problemID'] . "'>Ne pas publié</button><button type='button' class='btn btn-outline-success publieNP' data-newProblemID='" . $row['problemID'] . "'>Publié</button></div>";
    echo "</div>";
}
?>



<!-- Modal Informations -->
<div class="modal fade" id="moreInfoNewProblems" tabindex="-1" aria-labelledby="moreInfoNewProblemsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="moreInfoNewProblemsLabel">Problème en details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Merci de lire attentiviement le problème et de vous assurer que ce problème peut etre posté</p>
                <h2 id="titreNP">Titre</h2>
                <p id="userNP">Proposé par : user</p>
                <p id="descriptionNP">dfodfdf</p>
                <p id="codeErrorNP"></p>
                <p id="solutionNP"></p>
                <p id="photosNP">photo</p>
                <p id="dateNP">Publié le :</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-danger npPublieNP" data-newProblemID=''>Ne pas publié</button>
                <button type="button" class="btn btn-success publieNP" data-newProblemID=''>Publié</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        var newProblemList = <?php echo json_encode($newProblems); ?>;

        //Bouton voir le pbm
        $('.edit-modal').on('click', function(e) {
            e.preventDefault();
            $thisbutton = $(this);
            var problemID = $thisbutton.attr('data-newProblemID');
            $("#titreNP").text(newProblemList[problemID][2]);
            $("#userNP").text("Proposé par : " + newProblemList[problemID][9]);
            $("#descriptionNP").text("Description de l'erreur : " + newProblemList[problemID][3]);
            $("#codeErrorNP").text("Code errur : " + newProblemList[problemID][4]);
            $("#solutionNP").text("Solution : " + newProblemList[problemID][5]);
            $("#photosNP").text("Photos : " + newProblemList[problemID][7]);
            $("#dateNP").text("Date de publications " + newProblemList[problemID][8]);
            $("#moreInfoNewProblems .publieNP").attr("data-newProblemID", problemID);
            $("#moreInfoNewProblems .npPublieNP").attr("data-newProblemID", problemID);
        });


        //Bouton publié
        $('.publieNP').on('click', function(e) {
            e.preventDefault();
            $thisbutton = $(this);

            var problemID = $thisbutton.attr("data-newProblemID");

            var dataString = "problemID=" + problemID;

            $.ajax({
                type: "POST",
                url: "./newProblemUtils/publishProblem.php",
                data: dataString,
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });

            $("div[data-newProblemID=" + problemID + "]").remove();

            delete newProblemList[problemID];

            $('#moreInfoNewProblems').modal('hide');



        });

        //Bouton Ne pas publié
        $('.npPublieNP').on('click', function(e) {
                e.preventDefault();
                $thisbutton = $(this);
                var problemID = $thisbutton.attr('data-newProblemID');
                var dataString = "problemID=" + problemID;

                $.ajax({
                    type: "POST",
                    url: "./newProblemUtils/deleteProblem.php",
                    data: dataString,
                    success: function(data) {
                        console.log(data);
                    }
                });

                delete newProblemList[problemID];

                $("div[data-newProblemID=" + problemID + "]").remove();



                $('#moreInfoNewProblems').modal('hide');
            })

    });
</script>