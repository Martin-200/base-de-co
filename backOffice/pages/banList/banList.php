<?php
require('../../../lib/config.php');



$data = $bdd->query("SELECT ban.banID, ban.userID, ban.banDate, ban.adminID, User.username FROM ban INNER JOIN User ON ban.userID=User.userID")->fetchAll();

$bans = array();
foreach ($data as $row) {
    $bans[$row['banID']] = $row;
}

?>

<head>
    <title>Liste des bans | 404.io</title>
    <?php include '../../components/head/head.php'; ?>
</head>
<main>
    <audio id="audio" src="./assets/Hallelujah.mp3"></audio>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../home/home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ban</li>
                    </ol>
                </nav>
                <H1>Liste de tout les bans</H1>
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
                            echo "<td><button style='margin-left: 5px;' type='button' class='btn btn-danger delete-ban' data-banID='" . $row['banID'] . "' data-bs-toggle='modal' data-bs-target='#deleteBan'>Annuler le ban</button></td>";
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
                    Etes vous sur de vouloir annuler un ban ? Cette action est irréverssible
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ne pas annuler</button>
                    <button type="button" class="btn btn-danger" id="deleteBan" data-banID=''>Annuler le ban</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var banList = <?php echo json_encode($bans); ?>;
            console.log(banList);

            //Bouton Cancel Ban
            $('.delete-ban').on('click', function(e) {
                e.preventDefault();
                $thisbutton = $(this);
                var banID = $thisbutton.attr('data-banID');

                $("#deleteBan").attr("data-banID", banID);
            })

            //Confirm Delete
            $('#deleteBan').on('click', function(e) {
                e.preventDefault();
                $thisbutton = $(this);
                var banID = $thisbutton.attr('data-banID');
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