<?php
include('db.php');
@session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    a{
        font-family: 'Poppins';
        font-weight: 600;
        font-size: 20px;
        line-height: 24px;
        color: #11053B;
        
    }
    b{
        color: #21FCA0;
    }

    </style>
    

<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="index.php"> <img src="ressource/logo.png" height="70" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil <b>.</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Ressources <b>.</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">A propos <b>.</b></a>
        </li>
      </ul>
      <div class="d-flex p-2 ml-auto flex-column flex-md-row">
      <div class="ml-2"><button style="border:none;border-radius: 31px;background: #D3D5FF;padding:10px"><a href="signin.php" style="text-decoration: none;font-size:16px;padding: 10px 27px 10px 32px;color: #11053B;"> Connexion </a></button></div>
      <div class="ml-2 mt-2 mt-md-0"><button style="border:none;border-radius: 31px;background: #11053B;padding:10px"><a href="signup.php" style="text-decoration: none;font-size:16px;padding: 10px 27px 10px 32px;color: #FDFDFD;"> Inscription </a></button></div>
      </div>
    </div>
  </div>
</nav>

</body>
</html>


