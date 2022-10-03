<?php
include "db.php";

@$firstName = htmlspecialchars($_POST['firstName']);
@$lastName = htmlspecialchars($_POST['lastName']);
@$mail = htmlspecialchars($_POST['mail']);
@$username = htmlspecialchars($_POST['username']);
@$password = sha1($_POST['password']);
@$repassword = sha1($_POST['repassword']);
@$date = date("Y-m-d");
@$photo = '';

if (isset($_POST['confirm'])) {

  $req = $bdd->prepare('SELECT * FROM user WHERE mail = ?');
  $req->execute(array($mail));
  $count = $req->rowCount();

  if ($count < 1) {
    if ($password === $repassword) {

      $insert = $bdd->prepare("INSERT INTO User(firstName,lastName,mail,username,password,date_creation_account,profilePictureUrl) VALUES(?,?,?,?,?,?,?)");
      $insert->execute(array(
        $firstName,
        $lastName,
        $mail,
        $username,
        $password,
        $date,
        $photo = 'rien'
      ));

      @$msg = '<span class="alert alert-success text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;" >Inscription réussie ! <i class="fas fa-checkmark"></i></span>';
      $md = 'border-color: green;';
      header("refresh: 3; url=http://localhost/basedeco/signin.php");
    } else {
      @$msg = '<span class="alert alert-danger text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;" >Mot de passes non identiques ! <i class="fas fa-cross"></i></span>';
      $m = 'border-color: red;';
    }
  } else {
    @$msg = '<span class="alert alert-danger text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;" >Email déjà utilisée <i class="fas fa-cross"></i></span>';
    $mr = 'border-color: red;';
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
  <link rel="stylesheet" href="style.css">
  <title>Inscription</title>
</head>

<body>

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
  </style>

  <script>
    window.onbeforeunload = function() {
      window.scrollTo(0, 0);
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    }
  </script>

  <div class="card text-black">
    <div class="">
      <div class="row justify-content-center lil zoom">
        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1" style="padding: 30px;    margin-top: 30px;">

          <div>
            <button type="button" style="text-decoration: none;border-radius:100px;background:#DDFFF1;font-size:16px;padding: 2px 4px 2px 4px;color: #09442B;border: none;
    font-weight: 600;" disabled>Compte</button>
            <?php if (@$msg) {
              echo @$msg;
            }  ?>
          </div>

          <h1 class="text-left h1 fw-bold" style="margin-left:1px;font-weight: 700;font-size: 40px;line-height: 60px;color: #11053B;">Crée mon compte</h1>
          <p class="text-left h6" style="font-family: 'Poppins';font-style: normal;font-weight: 500;font-size: 16px;line-height: 24px;color: #8881A3;">En créant votre compte, vous pourrez accéder à des fonctionnalités supplémentaires.</p>

          <form class="" method="post">

            <div class="float-container">
              <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Nom*</label>
                  <input style="border-radius:100px;<?= $md ?>" type="text" class="form-control" name="firstName" id="name" placeholder="Nom" required />
                </div>
              </div>

              <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Prénom*</label>
                  <input style="border-radius:100px;<?= $md ?>" type="text" class="form-control" name="lastName" id="pname" placeholder="Prenom" required />
                </div>
              </div>
            </div>

            <div class="float-container">
              <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Pseudo*</label>
                  <input style="border-radius:100px;<?= $md ?>" type="text" class="form-control" name="username" id="username" placeholder="Pseudo" required />
                </div>
              </div>


              <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">E-mail*</label>
                  <input style="border-radius:100px;<?= $md ?>;<?= $mr ?>" type="email" class="form-control" name="mail" id="mail" placeholder="E-mail" required />
                </div>
              </div>
            </div>

            <div class="float-container">
              <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Mot de passe*</label>
                  <input style="border-radius:100px;<?= $m ?>;<?= $md ?>" type="password" class="form-control" name="password" id="pwd" placeholder="Mot de passe" required />
                </div>
              </div>


              <div class="d-flex flex-row align-items-center mb-4 float-child" style="width:50% ;">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Re-mot de passe*</label>
                  <input style="border-radius:100px;<?= $m ?>;<?= $md ?>" type="password" class="form-control" name="repassword" id="rpwd" placeholder="Re-mot de passe" required />
                </div>
              </div>
            </div>


            <div class="mb-3 mb-lg-4">
              <button type="submit" name="confirm" style="text-decoration: none;border-radius:100px;background:#11053B;font-size:16px;padding: 10px 50px 10px 50px;color: #FDFDFD;">Créer mon compte</button>
            </div>
            Vous avez déjà un compte ? <a href="signin.php" style="text-decoration: none;"> Connectez-vous !</a>

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
          <img src="ressource/i.png" class="img-fluid" alt="Sample image">
        </div>
      </div>
    </div>
  </div>
</body>

</html>