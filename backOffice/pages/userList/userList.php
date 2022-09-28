<?php
require('../../../lib/config.php');



$data = $bdd->query("SELECT * FROM User")->fetchAll();

$users = array();
foreach ($data as $row) {
    $users[$row['userID']] = $row;
}

?>

<head>
    <title>Liste des utilisateurs | 404.io</title>
    <?php include '../../components/head/head.php'; ?>
</head>
<main>
<audio id="audio" src="./assets/Ban.mp3"></audio>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../home/home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                    </ol>
                </nav>
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
                            echo "<td><button type='button' class='btn btn-primary edit-modal' data-userID='" . $row['userID'] . "' data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button><button style='margin-left: 5px;' type='button' class='btn btn-danger delete-user' data-userID='" . $row['userID'] . "' data-bs-toggle='modal' data-bs-target='#deleteUser'>Supprimer</button> <button style='margin-left: 5px;' type='button' class='btn btn-warning ban-user' data-userID='" . $row['userID'] . "' data-bs-toggle='modal' data-bs-target='#banUser'>Ban</button> </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="modalId">ID</label>
                    <input type="number" id="modalId" disabled>
                    <label for="modalFirstName">Prénom</label>
                    <input type="text" id="modalFirstName">
                    <label for="modalLastName">Nom</label>
                    <input type="text" id="modalLastName">
                    <label for="modalUsername">Pseudo</label>
                    <input type="text" id="modalUsername">
                    <label for="modalMail">Mail</label>
                    <input type="email" id="modalMail">
                    <label for="modalUserLevel">User Level</label>
                    <select name="modalUserLevel" id="modalUserLevel">
                        <option value="0">User</option>
                        <option value="1">Modérateur</option>
                        <option value="2">Administrateur</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary modalSave">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Delete -->
    <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Etes vous sur de vouloir supprimer un utilisateur ? Cette action est irréverssible
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" id="modalDelete" data-userID=''>Supprimer</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Ban -->
    <div class="modal fade" id="banUser" tabindex="-1" aria-labelledby="banUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="banTemp">Durée du ban:</label>

                    <select name="banTemp" id="BanTemp">
                        <option value="1">1 Heure</option>
                        <option value="2">1 Jour</option>
                        <option value="3">1 Semaine</option>
                        <option value="4">1 Mois</option>
                        <option value="5">1 An</option>
                        <option value="6">A vie</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-warning" id="modalBan" data-userID=''>BAN !</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var userList = <?php echo json_encode($users); ?>;
            console.log(typeof userList);

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
                var selectUserLevel = userList[userID][6];
                console.log(selectUserLevel);
                $("#modalUserLevel option").removeAttr('selected');
                switch (selectUserLevel) {
                    case '0':
                        $("#modalUserLevel option[value='0']").attr('selected','true');
                        break;
                    case '1':
                        $("#modalUserLevel option[value='1']").attr('selected','true');
                        break;
                    case '2':
                        $("#modalUserLevel option[value='2']").attr('selected','true');
                        break;
                    default:
                    $("#modalUserLevel option[value='0']").attr('selected','true');
                }
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
                var userLevel = $("#modalUserLevel").find(":selected").val();

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

            //Bouton Delete
            $('.delete-user').on('click', function(e) {
                e.preventDefault();
                $thisbutton = $(this);
                var userID = $thisbutton.attr('data-userID');

                $("#modalDelete").attr("data-userID", userID);
            })

            //Confirm Delete
            $('#modalDelete').on('click', function(e) {
                e.preventDefault();
                $thisbutton = $(this);
                var userID = $thisbutton.attr('data-userID');
                var dataString = "userID=" + userID;
                console.log(dataString);

                $.ajax({
                    type: "POST",
                    url: "deleteUser.php",
                    data: dataString,
                    success: function(data) {
                        console.log(data);
                    }
                });

                delete userList[userID]

                $("tr[data-userID=" + userID + "]").remove();

                $('#deleteUser').modal('toggle');
            })

            //Bouton Ban
            $('.ban-user').on('click', function(e) {
                e.preventDefault();
                $thisbutton = $(this);
                var userID = $thisbutton.attr('data-userID');

                $("#modalBan").attr("data-userID", userID);
            })

            //Confirm Delete
            $('#modalBan').on('click', function(e) {
                e.preventDefault();
                $thisbutton = $(this);
                var userID = $thisbutton.attr('data-userID');
                var banTemp = $("#BanTemp").find(":selected").val();
                
                var dateOfDeban;
                var currentDate = new Date();

                console.log(currentDate.toString());

                switch (banTemp) {
                    case '1':
                        dateOfDeban = currentDate.setHours(currentDate.getHours() + 1);
                        break;
                    case '2':
                        dateOfDeban = currentDate.setHours(currentDate.getHours() + 24);
                        break;
                    case '3':
                        dateOfDeban = currentDate.setHours(currentDate.getHours() + 168);
                        break;
                    case '4':
                        dateOfDeban = currentDate.setMonth(currentDate.getMonth() + 1);
                        break;
                    case '5':
                        dateOfDeban = currentDate.setFullYear(currentDate.getFullYear() + 1);
                        break;
                    case '6':
                        dateOfDeban = currentDate.setFullYear(currentDate.getFullYear() + 42000);
                        break;
                    default:
                        dateOfDeban = currentDate.setHour(currentDate.getHour() + 1);
                }
                console.log(dateOfDeban);

                
                var dataString = "userID=" + userID + "&banTemp="+dateOfDeban;
                
                $.ajax({
                    type: "POST",
                    url: "banUser.php",
                    data: dataString,
                    success: function(data) {
                        console.log(data);
                    }
                });
                $("#audio")[0].play();
                $('#banUser').modal('toggle');
            })
        });
    </script>
</main>