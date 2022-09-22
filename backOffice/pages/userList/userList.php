<?php
require('../../../lib/config.php');



$data = $bdd->query("SELECT * FROM User")->fetchAll();

$users = array();
foreach ($data as $row) {
    $users[$row['userID']] = $row;
}

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <H1>Liste de tout les utilisateurs</H1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Mail</th>
                            <th scope="col">User Level</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($users as $row) {
                            echo '<tr data-userID=' . $row['userID'] . '>';
                            echo "<th scope='row'>" . $row['userID'] . "</th>";
                            echo "<td class='firstName'>" . $row['firstName'] . "</td>";
                            echo "<td class='lastName'>" . $row['lastName'] . "</td>";
                            echo "<td class='username'>" . $row['username'] . "</td>";
                            echo "<td class='mail'>" . $row['mail'] . "</td>";
                            echo "<td class='userLevel'>" . $row['userLevel'] . "</td>";
                            echo "<td><button type='button' class='btn btn-primary edit-modal' data-userID='" . $row['userID'] . "' data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="modalId">ID</label>
                    <input type="text" id="modalId" disabled>
                    <label for="modalFirstName">Prénom</label>
                    <input type="text" id="modalFirstName">
                    <label for="modalLastName">Nom</label>
                    <input type="text" id="modalLastName">
                    <label for="modalUsername">Pseudo</label>
                    <input type="text" id="modalUsername">
                    <label for="modalMail">Mail</label>
                    <input type="text" id="modalMail">
                    <label for="modalUserLevel">User Level</label>
                    <input type="number" id="modalUserLevel" max="2" min="0">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary modalSave">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var userList = <?php echo json_encode($users); ?>;

            //Bouton edit
            $('.edit-modal').on('click', function(e) {
                e.preventDefault();
                $thisbutton = $(this);
                var userID = $thisbutton.attr('data-userID');
                $("#modalId").val(userList[userID][0]);
                $("#modalFirstName").val(userList[userID][1]);
                $("#modalLastName").val(userList[userID][2]);
                $("#modalUsername").val(userList[userID][4]);
                $("#modalMail").val(userList[userID][3]);
                $("#modalUserLevel").val(userList[userID][6]);
            });


            //Bouton Save
            $('.modalSave').on('click', function(e) {
                e.preventDefault();
                $thisbutton = $(this);

                var userID = $("#modalId").val();
                var firstName = $("#modalFirstName").val();
                var lastName = $("#modalLastName").val();
                var username = $("#modalUsername").val();
                var mail = $("#modalMail").val();
                var userLevel = $("#modalUserLevel").val();

                var dataString = "userID=" + userID + "&firstName=" + firstName + "&lastName=" + lastName + "&username=" + username + "&mail=" + mail + "&userlevel=" + userLevel;

                console.log(dataString);
                $.ajax({
                    type: "POST",
                    url: "saveChangeUser.php",
                    data: dataString,
                    success: function(data) {
                        console.log(data);
                    }
                });

                $("tr[data-userID=" + userID + "] .firstName").text(firstName);
                $("tr[data-userID=" + userID + "] .lastName").text(lastName);
                $("tr[data-userID=" + userID + "] .username").text(username);
                $("tr[data-userID=" + userID + "] .mail").text(mail);
                $("tr[data-userID=" + userID + "] .userLevel").text(userLevel);

                userList[userID][1] = firstName;
                userList[userID][2] = lastName;
                userList[userID][3] = mail;
                userList[userID][4] = username;
                userList[userID][5] = userLevel;


                $('#exampleModal').modal('toggle');



            });
        });
    </script>
</main>