<?php
include("db.php");
session_start();

$original_date = $_SESSION['date_creation_account'];

$timestamp = strtotime($original_date);

$new_date = date("d-m-Y", $timestamp);

$rp = $bdd->query('SELECT profilePictureUrl FROM user WHERE userID = "'.$_SESSION['userID'].'" ');
$rx = $rp->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Flaticon/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>404.Just found it</title>
</head>
<body>

<style>
    .avatar{
    width: 100px;
    height: 100px;
    margin: auto;
    background: cornflowerblue;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 100%;
    font-size: 30px;
    color: white;
    font-weight: 600;
}

img {
    max-width: 100%;
    max-height: 100%;
    border-radius:100px;
}
</style>

<?php

$avatar = strtoupper(substr(@$_SESSION['firstName'], 0, 2));
if (!empty($_SESSION)) {
?>
    <a href="index.php"><span class="fi-rr-arrow-left" style="font-size:45px; margin-left: 10vw;margin-top:1vh"></a>
    <a href="edit.php"><span class="fi-rr-edit" style="font-size:45px; margin-left: 65vw;margin-top:1vh"></a>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">
                    <div class="text-center avatar"> 
                        <?php
                        if (isset($rx)){
                            echo "<img src='image/".$rx[0]."' alt='img' style='' >";
                        }
                        else {
                            echo $avatar;
                        }
                        ?> </div>
                    <div class="text-center mt-3">
                        <?php
                                                
                                                if ($_SESSION['userLevel'] == 2) {
                                                    echo '<span class="bg-primary p-1 px-4 rounded text-white">Administrateur</span>';
                                                } elseif ($_SESSION['userLevel'] == 1) {
                                                    echo '<span class="bg-success p-1 px-4 rounded text-white">Moderateur</span>';
                                                } else {
                                                    echo '<span class="bg-secondary p-1 px-4 rounded text-white">Utilisateur</span>';
                                                }
                                                ?>

                        <h5 class="mt-2 mb-0"> <i style="color:blue"> Pseudo : </i> <?= $_SESSION['username'];  ?> </h5> 
                        <h5 class="mt-2 mb-0"> <i style="color:blue"> Email : </i><?=  $_SESSION['mail']; ?> </h5>
                        <h5 class="mt-2 mb-0"> <i style="color:blue">Nom : </i><?= $_SESSION['firstName'];  ?> </h5>
                        <h5 class="mt-2 mb-0"> <i style="color:blue">Prenom : </i><?= $_SESSION['lastName']; ?> </h5>
                        <h5> <i style="color:blue">Membre depuis le : </i> <?=$new_date;?> </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" mx-4 mb-3 mb-lg-4">
                    <button  type="submit" name="confirm"  style="text-decoration: none;border-radius:100px;background:#FDFDFD;font-size:16px;padding: 10px 27px 10px 32px;color: #FDFDFD;"><a href="signout.php">Se déconnecter</a></button> 
                </div>

                <div class=" mx-4 mb-3 mb-lg-4">
                    <button  type="submit" name="confirm"  style="text-decoration: none;border-radius:100px;background:#FDFDFD;font-size:16px;padding: 10px 27px 10px 32px;color: #FDFDFD;"><a href="">Supprimer mon compte</a></button> 
                </div>  

<?php
}

?>

    
</body>
</html>