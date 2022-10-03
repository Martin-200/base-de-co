<?php
include("db.php");
session_start();
//date
$original_date = $_SESSION['date_creation_account'];
$timestamp = strtotime($original_date);
$new_date = date("d-m-Y", $timestamp);

//photo
$rp = $bdd->query('SELECT profilePictureUrl FROM user WHERE userID = "' . $_SESSION['userID'] . '" ');
$rx = $rp->fetch();

//variable
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

//condition modification profil
if (isset($_POST['confirm'])) {
    if (!empty($_POST['firstName']) or !empty($_POST['lastName']) or !empty($_POST['username'])) {

        @$_SESSION['userID'];

        $upd = $bdd->query('UPDATE user SET firstName = "' . $_POST['firstName'] . '", lastName = "' . $_POST['lastName'] . '", username = "' . $_POST['username'] . '" WHERE userID = "' . $_SESSION['userID'] . '"  ');

        @$msg = '<span class="alert alert-success text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;"> Modification réussie ! Reconnectez vous... <i class="fas fa-checkmark"></i></span>';
        header("refresh: 3; url=http://localhost/basedeco/signout.php");
    } else {
        @$msg = '<span class="alert alert-danger text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;"> Veuillez remplir les champs ! <i class="fas fa-checkmark"></i></span>';
    }
}

//conditon suppression image profil
if (isset($_POST['suppr'])) {
    if ($rx[0] !== 'rien') {
        $suppr = $bdd->query('UPDATE user SET profilePictureUrl = "rien" WHERE userID = "' . $_SESSION['userID'] . '" ');
        @$msg = '<span class="alert alert-success text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;"> Image mise à jour ! <i class="fas fa-checkmark"></i></span>';
    } else {
        @$msg = '<span class="alert alert-danger text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;"> Aucune image à supprimer <i class="fas fa-checkmark"></i></span>';
    }
}

//deconnexion avec pop up javascript
if (isset($_POST['deco'])) {
    session_destroy();

    setcookie("userID", NULL, time() - 3600 * 24 * 30);
    setcookie("username", NULL, time() - 3600 * 24 * 30);
    setcookie("mail", NULL, time() - 3600 * 24 * 30);

    unset($_COOKIE['userID']);
    unset($_COOKIE["username"]);
    unset($_COOKIE["mail"]);

    echo '<script type="text/javascript">
            window.onload = function () { alert("Deconnexion réussi"); } 
            </script>';
    header("refresh: 0; url=http://localhost/basedeco/signin.php");
}

//suppression de compte
if (isset($_POST['nooo'])){

    $email = htmlspecialchars($_SESSION['mail']);
    $subject = "[404.Just found it] Supprimer son compte";
    $message = '
Si vous voulez supprimer votre compte cliquez ici : 
http://localhost/basedeco/del.php?qNx!=' . base64_encode($_SESSION['mail']) . '

Si vous n\'avez pas demander la suppression de votre compte , veuillez changer votre mot de passe :
http://localhost/basedeco/rpassword.php?qNx!=' . base64_encode($_SESSION['mail']) . ' 
    
    404.Just found it  © ' . @$annee . 'Copyright';
    $headers = 'Content-type: text/html; charset=UTF-8' . "\r\n";
    @mail($email, $subject, $message, $headers);

    @$msg = '<span class="alert alert-success text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;">Veuillez verifier votre boite mail !</span>';
    header("refresh: 2; url=http://localhost/basedeco/signin.php");
}

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

    <script>
        //empecher le renvoi de formulaire
        window.onbeforeunload = function() {
            window.scrollTo(0, 0);
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        }
    </script>


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
                overflow-y: auto;
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
            .lol {
                padding-left: 8%;
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
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 100%;
            border: solid 1px #11053B;
            font-size: 30px;
            color: #11053B;
            font-weight: 600;
            overflow-y: hidden;
        }
    </style>



    <div class="card text-black">
        <div class="">
            <div class="row justify-content-center lil zoom">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1" style="margin-top: 30px;">

                    <div>
                        <button type="button" style="text-decoration: none;border-radius:100px;background:#DDFFF1;font-size:16px;padding: 2px 4px 2px 4px;color: #09442B;border: none;
                    font-weight: 600;" disabled>Compte</button>
                        <?php if (@$msg) {
                            echo @$msg;
                        }  ?>
                    </div>

                    <h1 class="text-left h1 fw-bold" style="margin-left:1px;font-weight: 700;font-size: 40px;line-height: 60px;color: #11053B;">Mon profil</h1>
                    <p class="text-left h6" style="font-family: 'Poppins';font-style: normal;font-weight: 500;font-size: 16px;line-height: 24px;color: #8881A3;padding-bottom:7%">Modifier les informations de votre profil</p>



                    <form class="" method="post" enctype="multipart/form-data">
                        <?php
                        $avatar = strtoupper(substr(@$_SESSION['firstName'], 0, 2));
                        if (!empty($_SESSION)) {
                        ?>

                            <div class="float-container">
                                <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:30% ;">
                                    <div class="form-outline mb-0" style="margin-bottom: 100%;">
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

                            <?php } ?>

                            <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:40%;padding-top: 5%;">
                                <div class="form-outline flex-fill mb-0">
                                    <button style="text-decoration: none;border:none;border-radius:100px;background: #D3D5FF;font-size:16px;padding: 10px 20px 10px 20px;;font-weight:600;"> <a href="pp.php" style="color: #11053B;text-decoration: none;"> Changer de photo </a> </button>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:30% ;padding-top: 5%;">
                                <div class="form-outline flex-fill mb-0">
                                    <button type="submit" name="suppr" style="border:1px solid #11053B ;border-radius:100px;background:#FDFDFD;font-size:16px;padding: 10px 20px 10px 20px;color: #11053B;font-weight:600;">Effacer</button>
                                </div>
                            </div>

                            </div>
                            <label style="font-family: 'Poppins';font-style: normal;font-weight: 500;font-size: 16px;line-height: 24px;color: #8881A3;padding-bottom:2%">Ajouter votre photo. La taille recommandée est 256px * 256px.</label>
                            <div class="float-container">
                                <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Nom</label>
                                        <input style="border-radius:100px;" type="text" class="form-control" name="firstName" id="firstName" placeholder=<?= $_SESSION['firstName'] ?> value="<?= $_SESSION['firstName'] ?>" required />
                                    </div>
                                </div>


                                <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Prenom</label>
                                        <input style="border-radius:100px;" type="lastName" class="form-control" name="lastName" id="lastName" placeholder=<?= $_SESSION['lastName'] ?> value="<?= $_SESSION['lastName'] ?>" required />
                                    </div>
                                </div>
                            </div>

                            <div class="float-container">
                                <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Surnom</label>
                                        <input style="border-radius:100px;" type="text" class="form-control" name="username" id="username" placeholder=<?= $_SESSION['username'] ?> value="<?= $_SESSION['username'] ?>" required />
                                    </div>
                                </div>


                                <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Adresse mail</label>
                                        <input style="border-radius:100px;" type="text" class="form-control" placeholder=<?= $_SESSION['mail'] ?> value="<?= $_SESSION['mail'] ?>" disabled />
                                    </div>
                                </div>
                            </div>

                            <label style="font-family: 'Poppins';font-style: normal;font-weight: 500;font-size: 16px;line-height: 24px;color: #8881A3;padding-bottom:2%"> <i>Membre depuis le : <?= $new_date; ?> </i> </label>


                            <div class="float-container">
                                <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <button type="submit" name="confirm" style="text-decoration: none;border:none;border-radius:100px;background:#11053B;font-size:16px;padding: 10px 50px 10px 50px;color: #FDFDFD;font-weight:600;">Enregistrer les modifications</button>
                                    </div>
                                </div>


                                <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <button type="submit" name="nooo" style="text-decoration: none;border:none;border-radius:100px;background:#940E0E;font-size:16px;padding: 10px 60px 10px 60px;color: #FDFDFD;font-weight:600;">Supprimer <br> compte</button>
                                    </div>
                                </div>
                            </div>

                            <div class="float-container">
                                <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <button style="text-decoration: none;border:none;border-radius:100px;background:#D3D5FF;font-size:16px;padding: 10px 35px 10px 35px;font-weight:600;"><a href="rpassword2.php" style="color: #11053B;text-decoration: none"> Modifier mot de passe </a> </button>
                                    </div>
                                </div>


                                <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <button style="border:none;border-radius:100px;background:#940E0E;color:#FDFDFD;font-size:16px;padding: 20px 50px 20px 50px;;font-weight:600;" name="deco"> Deconnexion</button>
                                    </div>
                                </div>
                            </div>





                    </form>
                    <h6 style="padding-top:50px;
left: 4.58%;
right: 69.03%;
top: 85.92%;
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
        </div>
    </div>





</body>

</html>