<?php
require_once __DIR__ . "/../../../lib/config.php";



$data = $bdd->query("SELECT * FROM problem")->fetchAll();

$problems = array();
foreach ($data as $row) {
    $problems[$row['problemID']] = $row;
}

?>
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
    <link rel="stylesheet" href="./css/problemList.css">
</head>


<?php require_once "../../components/header/header.php" ?>

<body>
    <main class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mini-title">
                        <p>Posts</p>
                    </div>
                    <H1>Liste posts</H1>
                    <p><?php echo count($problems) ?> posts</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Créer par</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Description</th>
                                <th scope="col">Code Error</th>
                                <th scope="col">Solution</th>
                                <th scope="col">Nbre de vues</th>
                                <th scope="col">Status</th>
                                <th scope="col">Images</th>
                                <th scope="col">Date de publication</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($problems as $row) {
                                echo '<tr data-problemID=' . $row['problemID'] . '>';
                                echo "<th scope='row'>" . $row['problemID'] . "</th>";
                                echo "<td class='problemID'>" . $row['userID'] . "</th>";
                                echo "<td class='title'>" . $row['title'] . "</td>";
                                echo "<td class='description'>" . substr($row['description'], 0, 30) . "...</td>";
                                echo "<td class='codeError'>" . $row['codeError'] . "</td>";
                                echo "<td class='solution'>" . substr($row['solution'], 0, 30) . "...</td>";
                                echo "<td class='view'>" . $row['view'] . "</td>";
                                echo "<td class='status'>" . $row['status'] . "</td>";
                                echo "<td class='pictures'>" . $row['status'] . "</td>";
                                echo "<td class='dateOfPublication'>" . $row['dateOfPublication'] . "</td>";
                                echo "<td><button type='button' class='btn-edit edit-modal' data-problemID='" . $row['problemID'] . "' data-bs-toggle='modal' data-bs-target='#updateProblem'>Modifier</button><button style='margin-left: 5px;' type='button' class='btn-delete delete-problem' data-problemID='" . $row['problemID'] . "' data-bs-toggle='modal' data-bs-target='#deleteProblem'><img src='../../assets/delete.png' alt='Delete'></button></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Update -->
        <div class="modal fade" id="updateProblem" tabindex="-1" aria-labelledby="updateProblemLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 750px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateProblemLabel">Modifier un Problème</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body edit-post">
                        <div>
                            <label for="modalTitle">Titre</label>
                            <input type="text" id="modalTitle">
                        </div>
                        <div>
                            <label for="modalDescription">Description</label>
                            <textarea id="modalDescription" name="modalDescription" rows="4" cols="50"></textarea>
                        </div>
                        <div>
                            <label for="modalCodeError">Code Error</label>
                            <input type="text" id="modalCodeError">
                        </div>
                        <div>
                            <label for="modalSolution">Solution</label>
                            <textarea id="modalSolution" name="modalSolution" rows="4" cols="50"></textarea>
                        </div>
                        <div>
                            <label for="modalStatus">Status</label>
                            <input type="number" id="modalStatus">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-fermer" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn-valider modalSave">Modifier</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Delete -->
        <div class="modal fade" id="deleteProblem" tabindex="-1" aria-labelledby="deleteProblemLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteProblemLabel">Supprimer un Problème</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Etes vous sur de vouloir supprimer un problème ? Cette action est irréverssible
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-fermer" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn-supprimer" id="modalDelete" data-problemID=''>Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var problemeList = <?php echo json_encode($problems); ?>;
                console.log(typeof problemeList);

                //Bouton edit
                $('.edit-modal').on('click', function(e) {
                    e.preventDefault();
                    $thisbutton = $(this);
                    var problemID = $thisbutton.attr('data-problemID');
                    $("#modalId").val(problemeList[problemID][0]);
                    $("#modalTitle").val(problemeList[problemID][2]);
                    $("#modalDescription").val(problemeList[problemID][3]);
                    $("#modalCodeError").val(problemeList[problemID][4]);
                    $("#modalSolution").val(problemeList[problemID][5]);
                    $("#modalStatus").val(problemeList[problemID][7]);
                });


                //Bouton Save
                $('.modalSave').on('click', function(e) {
                    e.preventDefault();
                    $thisbutton = $(this);

                    var problemID = $("#modalId").val();
                    var title = $("#modalTitle").val();
                    var description = $("#modalDescription").val();
                    var codeError = $("#modalCodeError").val();
                    var solution = $("#modalSolution").val();
                    var status = $('#modalStatus').val();

                    var dataString = "problemID=" + problemID + "&title=" + title + "&description=" + description + "&codeError=" + codeError + "&solution=" + solution + "&status=" + status;

                    console.log(dataString);
                    $.ajax({
                        type: "POST",
                        url: "saveChangeProblem.php",
                        data: dataString,
                        success: function(data) {
                            console.log(data);
                        }
                    });

                    $("tr[data-problemID=" + problemID + "] .title").text(title);
                    $("tr[data-problemID=" + problemID + "] .description").text(description);
                    $("tr[data-problemID=" + problemID + "] .codeError").text(codeError);
                    $("tr[data-problemID=" + problemID + "] .solution").text(solution);
                    $("tr[data-problemID=" + problemID + "] .status").text(status);

                    problemeList[problemID][2] = title;
                    problemeList[problemID][3] = description;
                    problemeList[problemID][4] = codeError;
                    problemeList[problemID][5] = solution;
                    problemeList[problemID][7] = status;


                    $('#updateProblem').modal('toggle');



                });

                //Bouton Delete
                $('.delete-problem').on('click', function(e) {
                    e.preventDefault();
                    $thisbutton = $(this);
                    var problemID = $thisbutton.attr('data-problemID');

                    $("#modalDelete").attr("data-problemID", problemID);
                })

                //Confirm Delete
                $('#modalDelete').on('click', function(e) {
                    e.preventDefault();
                    $thisbutton = $(this);
                    var problemID = $thisbutton.attr('data-problemID');
                    var dataString = "problemID=" + problemID;

                    $.ajax({
                        type: "POST",
                        url: "deleteProblem.php",
                        data: dataString,
                        success: function(data) {
                            console.log(data);
                        }
                    });

                    delete problemeList[problemID]
                    console.log(problemeList);

                    $("tr[data-problemID=" + problemID + "]").remove();




                    $('#deleteProblem').modal('toggle');
                })
            });
        </script>
    </main>
</body>

</html>