<?php
include("db.php");

session_start();

$req = $bdd->query('SELECT password FROM user WHERE mail = "'.$_SESSION['mail'].'" ');
$ver = $req->fetch();

if (isset($_POST['login'])) {
  @$omdp = sha1($_POST['omdp']);
  @$mdp = sha1($_POST['mdp']);
  @$mdp2 = sha1($_POST['mdp2']);

if ( $omdp === $ver['password']) {

    if ($mdp == $mdp2 ) {

      $req2 = $bdd->query('UPDATE user SET password = "'.$mdp.'" WHERE mail = "'.$_SESSION['mail'].'"  ');
      @$msg = '<span class="alert alert-success">Mot de passe modifier avec success ! redirection dans 3 secondes...</span>';
      header("refresh: 3; url=http://localhost/basedeco/index.php");
    } else {
      @$msg = '<span class="alert alert-danger">les mots de passes sont differents !</span>';
    } 
  } else {
    @$msg = '<span class="alert alert-danger"> Mot de passe errones !</span>';
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
  <title>Modifier votre mot de passe</title>
</head>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<body>

<a href="edit.php"><span class="fi-rr-arrow-left" style="font-size:45px; margin-left: 10vw;margin-top:1vh"></a>

  <div class="wrapper">
    <?php
    if (@$msg) {
      echo @$msg;
    }
    ?>
    <div class="logo"> <img src="ressource/logo.png" alt=""> </div>
    <br>
    <div class="text-center mt-4 name" id="nom"> 404.Just found it  </div>
    <form class="p-3 mt-3" method="post">
      <br>
      <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="omdp" id="pwd" placeholder="Ancien mot de passe" required> </div>
      <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="mdp" id="pwd" placeholder="Mot de Passe" required> </div>
      <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="mdp2" id="pwd" placeholder="Re-tapez le mot de Passe" required> </div>
      <button type="submit" name="login" class="btn mt-3">Modifier mot de passe</button>
  </div>
</body>

</html>