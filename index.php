<?php

require 'class/classUser.php';
// "<pre>";
// var_dump($_SESSION['user']);
// "</pre>";

if(isset($_POST['sign_up'])){
$inscription= new User();
$inscription->addUser($_POST['nom'],$_POST['prenom'],$_POST['matricule'],$_POST['password'],$_POST['password2']);
}
if(isset($_POST['connexion'])){
$connexion= new User();
$connexion->user_connexion($_POST['matriculeCo'],$_POST['passwordCo']);
}
if(isset($_POST['deleteUser'])){
$deleteUser= new User();
$deleteUser->delete_user($_POST['matricule']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/scriptIndex.js"></script>
    <title>Document</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand"  style='color: white' href="#">Kalitics</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
            <a class='nav-link' style="color: white" href='index.php'>Home <span class="sr-only">(current)</span></a>
            </li>
            <?php
        if (isset($_SESSION['user'])) {
                        echo "<li class='nav-item'>
                            <a class='nav-link' style='color: white' href='pages/profil.php'>profil</a>
                        </li>";
                    }
                    ?>
        <?php
        if (isset($_SESSION['user'])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link'  style='color: white' href='pages/chantier.php'>chantier</a>
                        </li>";
                    }
                    ?>
        <?php
        if (isset($_SESSION['user'])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link'  style='color: white' href='pages/pointage.php'>Pointage</a>
                        </li>";
                    }
                    ?>

        <?php
        if (isset($_SESSION['user'])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link'   style='color: white' href='pages/deconnexion.php'>Deconnexion</a>
                        </li>";
                    }
                    ?>
            </ul>
        </div>
    </nav>
</header>
    <main>
        <div id="titre">
        <?php
            if (!(isset($_SESSION['user']))) {
                echo "<h1>Veuillez vous connecter pour acceder au reste du site</h1>";
            }else{
                echo "<h1>Kalitics api de solution pour la gestion des pointage.<br> Bienvenue monsieur ".$_SESSION['user'][0]['nom']."</h1>";
            }
        ?>
        </div>
        <div id="divConnect">
            <form name="formCo" id="formCo" action="" method="POST">
                <span id="spanCo" name="spanCo"></span>
                <label for="matriculeCo">Matricule</label>
                <input type="text" name="matriculeCo" id="matriculeCo">
                <label for="passwordCo">Mot de passe</label>
                <input type="password" name="passwordCo" id="passwordCo">
                <input type="submit" name="connexion" value="Connexion">
            </form>
        </div>
        <div id="divInscrip">
            <form action="" name=formIns id="formIns" method="POST">
                <span id="spanIns" name="spanIns"></span>
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prenom">
                <label for="matricule">Matricule</label>
                <input type="text" name="matricule" id="matricule" placeholder="Matricule">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">
                <label for="password2">Confirmation du mot de passe</label>
                <input type="password" name="password2" id="password2" placeholder="Confirmation du mot de passe">
                <input type="submit" name="sign_up" value="Inscription">
            </form>
        </div>
    </main>
    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
        ></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
        ></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-google"></i
        ></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
        ></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
        ></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-github"></i
        ></a>
        </section>
        <!-- Section: Social media -->

        <!-- Section: Form -->
        <section class="">
        <form action="">
            <!--Grid row-->
            <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
                <p class="pt-2">
                <strong>Sign up for our newsletter</strong>
                </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-5 col-12">
                <!-- Email input -->
                <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example21" class="form-control" />
                <label class="form-label" for="form5Example21">Email address</label>
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-auto">
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-light mb-4">
                Subscribe
                </button>
            </div>
            <!--Grid column-->
            </div>
            <!--Grid row-->
        </form>
        </section>
        <!-- Section: Form -->

        <!-- Section: Text -->
        <section class="mb-4">
        <p>
            Kalitics
        </p>
        </section>
        <!-- Section: Text -->
    </footer>
</body>
</html>