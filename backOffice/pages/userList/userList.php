<?php 
require('../../../lib/config.php');



$data = $bdd->query("SELECT * FROM User")->fetchAll();
// and somewhere later:
foreach ($data as $row) {
    echo $row['mail']."<br />\n";
}



?>


<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Prénom</th>
          <th scope="col">Nom</th>
          <th scope="col">Pseudo</th>
          <th scope="col">Mail</th>
          <th scope="col">User Level</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            for ($i = 0; i < count($data)-1; $i++) {
                echo '<tr>';
                echo "<th scope='row'>$data[$i]['userID']</th>";
                echo "<td >$data[$i]['firstName']</td>";
            }
        ?>
    </tbody>
</table>