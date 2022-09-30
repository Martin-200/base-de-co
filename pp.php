<?php 
include "db.php";
session_start();

@$_SESSION['userID'];
@$_SESSION['firstName'] ;
@$_SESSION['lastName'] ;
@$_SESSION['username'] ;
@$_SESSION['mail'];
@$_SESSION['userLevel'];
@$_SESSION['profilePictureUrl'];

@$firstName = htmlspecialchars($_POST['firstName']);
@$lastName = htmlspecialchars($_POST['lastName']);
@$mail = htmlspecialchars($_POST['mail']);
@$username = htmlspecialchars($_POST['username']);


@$password = sha1($_POST['password']);


$rp = $bdd->query('SELECT profilePictureUrl FROM user WHERE userID = "'.$_SESSION['userID'].'" ');
$rx = $rp->fetch();


if (isset($_POST['con'])) {
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){
    if ($_FILES['image']['size'] <= 1000000){ // Testons si le fichier n'est pas trop gros
        $fileInfo = pathinfo($_FILES['image']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'webp'];

        if (in_array($extension, $allowedExtensions)){ // Testons si l'extension est autorisée
            $newName = base_convert($_SESSION['userID'], 10, 2);
            $photo = $newName.".".$fileInfo['extension'];

            move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $photo);

            $update = $bdd->prepare('UPDATE user SET profilePictureUrl = ? WHERE userID = ? ');
            $update->execute([$photo, $_SESSION['userID']]);
            $update->closeCursor();
            @$msg = '<span class="alert alert-success"> Photo modifier ! Veuillez vous reconnectez <i class="fas fa-checkmark"></i></span>';
            header("refresh: 3; url=http://localhost/basedeco/signout.php");
        }
    }
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

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<body>

<a href="profil.php"><span class="fi-rr-arrow-left" style="font-size:45px; margin-left: 10vw;margin-top:1vh"></a>

    <div class="wrapper">
        <?php if (@$msg) {
            echo @$msg;
        }  ?>
        <div class="logo"> <img src="ressource/logo.png" alt=""> </div>

        <div class="text-center mt-4 name" id="nom"> 404.Just found it </div>
        <h6 class="text-center" > Modifier votre photo </h6>
        <form class="p-3 mt-3" method="post" enctype= "multipart/form-data" >
            
            <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="file" name="image" id="profilePicture" placeholder="Photo de profil" accept="image/png, image/jpeg"> </div>
            <br>

            <div>
                <h3 style="text-align:center;">Image actuelle</h3>
                <img style="max-width: 150px;display: block;margin-left: auto;margin-right: auto;width: 50%;" src="image/<?=$rx[0]?>" alt="">
        </div> 
            <button type="submit" name="con" class="btn mt-3">Confirmer</button>
        </form>
        <a href="rpassword2.php"> Modifier votre mot de passe ici</a>
        
    </div>
</body>

</html>