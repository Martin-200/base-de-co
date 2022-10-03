<?php
include "db.php";
session_start();

@$_SESSION['userID'];
@$_SESSION['firstName'];
@$_SESSION['lastName'];
@$_SESSION['username'];
@$_SESSION['mail'];
@$_SESSION['userLevel'];
@$_SESSION['profilePictureUrl'];

@$firstName = htmlspecialchars($_POST['firstName']);
@$lastName = htmlspecialchars($_POST['lastName']);
@$mail = htmlspecialchars($_POST['mail']);
@$username = htmlspecialchars($_POST['username']);


@$password = sha1($_POST['password']);


$rp = $bdd->query('SELECT profilePictureUrl FROM user WHERE userID = "' . $_SESSION['userID'] . '" ');
$rx = $rp->fetch();


if (isset($_POST['con'])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        if ($_FILES['image']['size'] <= 1000000) { // Testons si le fichier n'est pas trop gros
            $fileInfo = pathinfo($_FILES['image']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'webp'];

            if (in_array($extension, $allowedExtensions)) { // Testons si l'extension est autorisée
                $newName = base_convert($_SESSION['userID'], 10, 2);
                $photo = $newName . "." . $fileInfo['extension'];

                move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $photo);

                $update = $bdd->prepare('UPDATE user SET profilePictureUrl = ? WHERE userID = ? ');
                $update->execute([$photo, $_SESSION['userID']]);
                $update->closeCursor();

                @$msg = '<span class="alert alert-success text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;"> Image mise à jour !<i class="fas fa-checkmark"></i></span>';
                // header("refresh: 3; url=http://localhost/basedeco/signout.php");
            }
        }
    } else {
        @$msg = '<span class="alert alert-danger text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;"> Selectionnez une photo !<i class="fas fa-checkmark"></i></span>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Flaticon/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="style.css">
    <title>Modifier mon profil</title>
</head>

<style>
    .text-focus-in {
        -webkit-animation: text-focus-in 0.4s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
        animation: text-focus-in 0.4s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
    }

    @-webkit-keyframes text-focus-in {
        0% {
            -webkit-filter: blur(12px);
            filter: blur(12px);
            opacity: 0;
        }

        100% {
            -webkit-filter: blur(0px);
            filter: blur(0px);
            opacity: 1;
        }
    }

    @keyframes text-focus-in {
        0% {
            -webkit-filter: blur(12px);
            filter: blur(12px);
            opacity: 0;
        }

        100% {
            -webkit-filter: blur(0px);
            filter: blur(0px);
            opacity: 1;
        }
    }

    @media screen and (min-width: 991px) {
        * {
            overflow-x: hidden;
            overflow-y: hidden;
        }
    }

    .float-container {
        border: 3px none #fff;
    }

    .float-child {
        width: 50%;
        float: left;
    }

    .cont img {
        width: 100%;
        height: auto;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    @media screen and (min-width: 1200px) {
        .lol {
            padding-left: 8%;
        }
    }

    @media screen and (min-width: 1900px) {
        .cont img {
            width: 100%;
            height: 90%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    }

    @media screen and (min-width: 1200px) {
        .lil {
            margin-left: 5%;
            padding-left: 3%;
        }
    }

    .zoom {
        zoom: 108%;
    }

    .avatar {
        width: 100px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 100%;
        border: solid 1px #11053B;
        font-size: 30px;
        color: #11053B;
        font-weight: 600;
        overflow-x: hidden;
        overflow-y: hidden;
    }
</style>

<script>
    window.onbeforeunload = function() {
        window.scrollTo(0, 0);
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    }
</script>



<body>


    <div class="row justify-content-center lil zoom">
        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1" style="padding: 30px;    margin-top: 30px;">

            <div>
                <button type="button" style="text-decoration: none;border-radius:100px;background:#DDFFF1;font-size:16px;padding: 2px 4px 2px 4px;color: #09442B;border: none;
                    font-weight: 600;" disabled>Compte</button>
                <?php if (@$msg) {
                    echo @$msg;
                }  ?>
            </div>


            <h1 class="text-left h1 fw-bold" style="margin-left:1px;font-weight: 700;font-size: 40px;line-height: 60px;color: #11053B;">Photo de profil</h1>
            <p class="text-left h6" style="font-family: 'Poppins';font-style: normal;font-weight: 500;font-size: 16px;line-height: 24px;color: #8881A3;">Modifier votre photo de profil.</p>

            <form class="mx-1" method="post" enctype="multipart/form-data">

                <div class="float-container">
                    <div class="flex-row align-items-center  " style="width:60% ;">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <input style="border-radius:100px;" type="file" name="image" id="profilePicture" placeholder="Photo de profil" accept="image/png, image/jpeg" class="form-control" />
                        </div>
                    </div>


                    <?php
                    $avatar = strtoupper(substr(@$_SESSION['firstName'], 0, 2));
                    if (!empty($_SESSION)) {
                    ?>
                        <div class="flex-row align-items-center mb-4 " style="width:60% ;">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Photo actuelle</label>
                                <div class="text-center avatar">
                                    <?php
                                    if (@$rx[0] === 'rien') {
                                        echo $avatar;
                                    } else {
                                        echo "<img src='image/" . @$rx[0] . "'>";
                                    }
                                    ?> </div>
                            </div>
                        </div>
                </div>
            <?php } ?>


            <div class="mb-3 mb-lg-4">
                <button type="submit" name="con" style="text-decoration: none;border-radius:100px;background:#11053B;font-size:16px;padding: 10px 70px 10px 70px;color: #FDFDFD;">Changer de photo</button>
            </div>
            <a href="profil.php" style="text-decoration: none;"> Retourner au profil </a>
            <hr>
            <a href="rpassword2.php" style="text-decoration: none;"> Modifier votre mot de passe ici </a>

            </form>
            <h6 style="padding-top:50px;
left: 4.58%;
right: 69.03%;
top: 80.92%;
bottom: 1.66%;
font-family: 'Poppins';
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 21px;
color: #AEACC8;">© 2022 404.io Tous droits réservés</h6>
        </div>
        <div class="col-md-10 col-lg-6 col-xl-7 d-flex order-1 order-lg-2 cont lol">
            <img src="ressource/l.png" class="img-fluid" alt="Sample image">
        </div>
    </div>

</body>

</html>