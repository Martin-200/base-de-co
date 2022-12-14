<?php
include("db.php");

session_start();

$req = $bdd->query('SELECT password FROM user WHERE mail = "' . $_SESSION['mail'] . '" ');
$ver = $req->fetch();

if (isset($_POST['login'])) {
  @$omdp = sha1($_POST['omdp']);
  @$mdp = sha1($_POST['mdp']);
  @$mdp2 = sha1($_POST['mdp2']);

  if ($omdp === $ver['password']) {

    if ($mdp == $mdp2) {

      $req2 = $bdd->query('UPDATE user SET password = "' . $mdp . '" WHERE mail = "' . $_SESSION['mail'] . '"  ');
      @$msg = '<span class="alert alert-success text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;">Mot de passe modifier avec success !</span>';
      $mx = 'border-color: green;';
      header("refresh: 3; url=http://localhost/basedeco/index.php");
    } else {
      @$msg = '<span class="alert alert-danger text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;">les mots de passes sont differents !</span>';
      $m = 'border-color: red;';
    }
  } else {
    @$msg = '<span class="alert alert-danger text-focus-in" style="margin-left:10%;text-decoration: none;border-radius:100px;font-size:16px;padding: 2px 6px 2px 6px;"> Mot de passe errones !</span>';
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


<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<body>

  <!-- <div class="wrapper">

    <div class="logo"> <img src="ressource/logo.png" alt=""> </div>
    <br>
    <div class="text-center mt-4 name" id="nom"> 404.Just found it  </div>
    <form class="p-3 mt-3" method="post">
      <br>
      <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="omdp" id="pwd" placeholder="Ancien mot de passe" required> </div>
      <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="mdp" id="pwd" placeholder="Mot de Passe" required> </div>
      <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="mdp2" id="pwd" placeholder="Re-tapez le mot de Passe" required> </div>
      <button type="submit" name="login" class="btn mt-3">Modifier mot de passe</button>
  </div>-->

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

        <h1 class="text-left h1 fw-bold" style="margin-left:1px;font-weight: 700;font-size: 40px;line-height: 60px;color: #11053B;">Changer votre mot de passe </h1>
        <p class="text-left h6" style="font-family: 'Poppins';font-style: normal;font-weight: 500;font-size: 16px;line-height: 24px;color: #8881A3;">Veuillez entrez votre nouveau mot de passe</p>

        <form class="mx-1" method="post">


          <div class="float-container">
            <div class="flex-row align-items-center  " style="width:60% ;">
              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Ancien Mot de passe*</label>
                <input style="border-radius:100px;<?= $mr ?>;<?= $mx ?>" type="password" class="form-control" name="omdp" id="pwd" placeholder="Mot de passe" required />
              </div>
            </div>

            <div class="flex-row align-items-center mb-4 " style="width:60% ;">
              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Mot de passe*</label>
                <input style="border-radius:100px;<?= $m ?>;<?= $mx ?>" type="password" class="form-control" name="mdp" id="repwd" placeholder="Re-Mot de passe" required />
              </div>
              <br>
              <div class="form-outline flex-fill mb-0">
                <label class="form-label" for="form3Example1c" style="font-weight:600;color: #11053B;">Re-Mot de passe*</label>
                <input style="border-radius:100px;<?= $m ?>;<?= $mx ?>" type="password" class="form-control" name="mdp2" id="repwd" placeholder="Re-Mot de passe" required />
              </div>
            </div>


          </div>

          <div class="mb-3 mb-lg-4">
            <button type="submit" name="login" style="text-decoration: none;border-radius:100px;background:#11053B;font-size:16px;padding: 10px 70px 10px 70px;color: #FDFDFD;">Changer mot de passe</button>
          </div>

          <hr>
          <a href="profil.php" style="text-decoration: none"> Retour au profil</a>
          <br>

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
color: #AEACC8;">?? 2022 404.io Tous droits r??serv??s</h6>
      </div>
      <div class="col-md-10 col-lg-6 col-xl-7 d-flex order-1 order-lg-2 cont lol">
        <img src="ressource/l.png" class="img-fluid" alt="Sample image">
      </div>
    </div>


</body>

</html>