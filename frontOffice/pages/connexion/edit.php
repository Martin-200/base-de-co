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

// if (isset($_POST['con'])) {
// if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){
//     if ($_FILES['image']['size'] <= 1000000){ // Testons si le fichier n'est pas trop gros
//         $fileInfo = pathinfo($_FILES['image']['name']);
//         $extension = $fileInfo['extension'];
//         $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'webp'];

//         if (in_array($extension, $allowedExtensions)){ // Testons si l'extension est autorisée
//             $newName = base_convert($_SESSION['userID'], 10, 2);
//             $photo = $newName.".".$fileInfo['extension'];

//             move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $photo);

//             $update = $bdd->prepare('UPDATE user SET profilePictureUrl = ? WHERE userID = ? ');
//             $update->execute([$photo, $_SESSION['userID']]);
//             $update->closeCursor();
//             @$msg = '<span class="alert alert-success"> Photo envoyee ! <i class="fas fa-checkmark"></i></span>';
//         }
//     }
// }
// }



if (isset($_POST['confirm'])) {
    if (!empty($_POST['firstName']) OR !empty($_POST['lastName']) OR !empty($_POST['mail']) OR !empty($_POST['username']) OR !empty($_POST['password'])){

    @$_SESSION['userID'];

    $req = $bdd->prepare('SELECT * FROM user WHERE mail = ? ');
    $req->execute(array($mail));
    $count = $req->rowCount();
    if ($count < 1) {

        $upd = $bdd->query('UPDATE user SET firstName = "'.$_POST['firstName'].'", lastName = "'.$_POST['lastName'].'", mail = "'.$_POST['mail'].'" , username = "'.$_POST['username'].'" , password = "'.$_POST['password'].'"  WHERE userID = "'.$_SESSION['userID'].'"  ');
        
        @$msg = '<span class="alert alert-success"> Modification réussie ! Veuillez vous reconnectez... <i class="fas fa-checkmark"></i></span>';
        header("refresh: 3; url=http://localhost/basedeco/signout.php");
            
            } else {  @$msg = '<span class="alert alert-danger" >Email déjà utilisée <i class="fas fa-cross"></i></span>';
                    }
            
    } else {
        @$msg = '<span class="alert alert-danger"> Veuillez remplir les champs ! <i class="fas fa-checkmark"></i></span>';
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
        <br>
        <div class="text-center mt-4 name" id="nom"> 404.Just found it </div>
        <h6 class="text-center" > Modifier vos informations </h6>
        <br>
        <a href="pp.php"> Modifier photo de profil</a>
        <form class="p-3 mt-3" method="post" enctype= "multipart/form-data" >
            <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="firstName" id="name" placeholder = <?= $_SESSION['firstName'] ?> value = "<?= $_SESSION['firstName'] ?>" >  </div>
            <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="text" name="lastName" id="pname" placeholder = <?= $_SESSION['lastName'] ?> value = <?= $_SESSION['lastName'] ?> >  </div>
            <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="email" name="mail" id="mail" placeholder = <?= $_SESSION['mail'] ?> value = <?= $_SESSION['mail'] ?>>  </div>
            <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="text" name="username" id="username" placeholder = <?= $_SESSION['username'] ?>  value = <?= $_SESSION['username'] ?>> </div>
            <button type="submit" name="confirm" class="btn mt-3">Confirmer</button>

        </form>
        <a href="rpassword2.php"> Modifier votre mot de passe ici</a>
        
    </div>
</body>

</html>