<?php
include("db.php");

@$Email = htmlspecialchars($_POST['mail']);

    //On recupere les addresse email de la bdd  et on les stock dans la variable $mail
    $req = $bdd->prepare('SELECT mail FROM user WHERE mail = ?');
    $req->execute(array($Email));

    $mail = $req->fetch();
    
if (isset($_POST['login'])) {
    if ($Email = $mail) {

        $email = htmlspecialchars($_POST['mail']);
        $subject = "[404.Just found it] Reinitialisez votre mot de passe";
        $message = '
Cliquez sur ce lien pour reinitialiser votre mot de passe : 
http://localhost/basedeco/rpassword.php?qNx!=' . base64_encode($_POST['mail']) . ' 
        
        404.Just found it  © '.@$annee.'Copyright';
        $headers = 'Content-type: text/html; charset=UTF-8' . "\r\n";
        @mail($email, $subject, $message,$headers);

        @$msg = '<span class="alert alert-success">Lien de reinitialisation envoyer !</span>';
        header("refresh: 3; url=http://localhost/basedeco/signin.php");
    } else {
        @$msg = '<span class="alert alert-danger">Email inconnu ! </span>';
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
    <title>Reinitialiser mot de passe</title>
</head>

<body>
    <div class="wrapper">
        <?php if (@$msg) {
            echo @$msg;
        }  ?>
        <div class="logo">
            <img src="ressource/logo.png" alt="">
        </div>
        <br>
        <div class="text-center mt-4 name" id="nom"> 404.Just found it  </div>
        <form class="p-3 mt-3" method="post">
            <br>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="mail" id="Email" placeholder="Entrez votre Email" required>
            </div>

            <button type="submit" name="login" class="btn mt-3">Envoyer</button>
        </form>

    </div>
</body>

</html>