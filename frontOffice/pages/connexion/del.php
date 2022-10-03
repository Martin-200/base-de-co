<?php
include("db.php");

@$Email = base64_decode($_GET['qNx!']);

$req = $bdd->prepare('SELECT mail FROM user WHERE mail = ?');
$req->execute(array($Email));
$mail = $req->fetch();

if (isset($_POST['del'])) {

    $req2 = $bdd->query('DELETE FROM user WHERE mail = "' . base64_decode($_GET['qNx!']) . '"  ');
    @$msg = '<span class="alert alert-success text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;">Compte supprimer avec succès !</span>';
    header("refresh: 3; url=http://localhost/basedeco/signin.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Modifier votre mot de passe</title>
</head>

<script>
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
</style>

<body>

    <div class="wrapper">

        <div class="row justify-content-center lil zoom">
            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1" style="padding: 30px;    margin-top: 30px;">

                <div>
                    <button type="button" style="text-decoration: none;border-radius:100px;background:#DDFFF1;font-size:16px;padding: 2px 4px 2px 4px;color: #09442B;border: none;
font-weight: 600;" disabled>Compte</button>
                    <?php if (@$msg) {
                        echo @$msg;
                    }  ?>
                </div>

                <h1 class="text-left h1 fw-bold" style="margin-left:1px;font-weight: 700;font-size: 40px;line-height: 60px;color: #11053B;">Voulez vous vraiment supprimer votre compte ?
                </h1>
                <p class="text-left h6" style="font-family: 'Poppins';font-style: normal;font-weight: 500;font-size: 16px;line-height: 24px;color: #8881A3;">Attention cette action est irreversible !</p>

                <form class="mx-1" method="post">



                    <div class="mb-3 mb-lg-4">
                        <button type="submit" name="del" style="text-decoration: none;border-radius:100px;border:none;background:#940E0E;font-size:16px;padding: 10px 70px 10px 70px;color: #FDFDFD;">Supprimer mon compte</button>
                    </div>
                    <a href="signin.php" style="text-decoration: none"> Retour à la connexion</a>
                    <br>
                    <hr>
                    Pas de compte ? <a href="signup.php" style="text-decoration: none"> Inscrivez-vous !</a>

                </form>
                <h6 style="padding-top:110px;
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