<?php
require_once __DIR__ . "/../../../lib/config.php";



$data = $bdd->query("SELECT ban.banID, ban.userID, ban.banDate, ban.adminID, User.username FROM ban INNER JOIN User ON ban.userID=User.userID")->fetchAll();

$bans = array();
foreach ($data as $row) {
    $bans[$row['banID']] = $row;
}

?>

<style>
   
</style>

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
    <link rel="stylesheet" href="./css/banList.css">
</head>

<body>
    <?php require_once "../../components/header/header.php" ?>

    <main class="mt-3">

        <audio id="audio" src="./assets/Hallelujah.mp3"></audio>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mini-title">
                        <p>Bans</p>
                    </div>
                    <H1>Liste des bans</H1>
                    <p><?php echo count($bans) ?> bans</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Utilisateur Banni</th>
                                <th scope="col">Date de deban</th>
                                <th scope="col">Banni par</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $t =  $row['banDate'] / 1000;

                            foreach ($bans as $row) {
                                echo '<tr data-banID=' . $row['banID'] . '>';
                                echo "<th scope='row'>" . $row['banID'] . "</th>";
                                echo "<td class='banID'>" . $row['username'] . "</th>";
                                echo "<td class='title'>" . date('d/m/Y H:i', $t) . "</td>";
                                echo "<td class='description'>" . $row['adminID'] . "</td>";
                                echo "<td><button style='margin-left: 5px;' type='button' class='btn-deban delete-ban' data-banID='" . $row['banID'] . "' data-bs-toggle='modal' data-bs-target='#deleteBan'>Annuler le ban</button></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Modal Cancel Ban -->
        <div class="modal fade" id="deleteBan" tabindex="-1" aria-labelledby="deleteBanLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteBanLabel">Annuler un ban</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Etes vous sur de vouloir annuler le ban ? Cette action est irréverssible
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-fermer" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn-valider" id="cancelBan" data-banID=''>Annuler le ban</button>
                    </div>
                </div>
            </div>
        </div>
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>-->

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var banList = <?php echo json_encode($bans); ?>;
                console.log(banList);

                //Bouton Cancel Ban
                $('.delete-ban').on('click', function(e) {
                    e.preventDefault();
                    $thisbutton = $(this);
                    var banID = $thisbutton.attr('data-banID');

                    $("#cancelBan").attr("data-banID", banID);
                })

                //Confirm Delete
                $('#cancelBan').on('click', function(e) {
                    e.preventDefault();
                    $thisbutton = $(this);
                    var banID = $thisbutton.attr('data-banID');
                    console.log("ban id = " +banID);
                    var dataString = "banID=" + banID;

                    $.ajax({
                        type: "POST",
                        url: "deleteBan.php",
                        data: dataString,
                        success: function(data) {
                            console.log(data);
                        }
                    });

                    delete banList[banID]
                    console.log(banList);

                    $("tr[data-banID=" + banID + "]").remove();
                    $("#audio")[0].play();
                    $('#deleteBan').modal('toggle');
                })
            });
        </script>
    </main>
</body>

</html>