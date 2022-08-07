<?php

require '../class/classUser.php';

if(isset($_POST['update'])){
    $update= new User();
    $message = $update->user_profil($_POST['nomUp'],$_POST['prenomUp'],$_POST['matriculeUp'],$_POST['passwordUp'],$_POST['passwordUp2']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/profil.css">
    <script src="../js/scriptProfil.js"></script>
    <title>Profils</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand"  style='color: white' href="#">Kalitics</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
            <a class='nav-link'  style='color: white' href='../index.php'>Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class='nav-link'  style='color: white' href='profil.php'>Profil</a>
            </li>
            <li class="nav-item">
            <a class='nav-link'  style='color: white' href='chantier.php'>Chantier</a>
            </li>
            <li class="nav-item">
            <a class='nav-link'  style='color: white' href='pointage.php'>Pointage</a>
            </li>
            <li class="nav-item">
            <a class='nav-link'  style='color: white' href='deconnexion.php'>Deconnexion</a>
            </li>
            </ul>
        </div>
    </nav>
</header>
<body>
    <main>
        <div id="titreProfil">
            <h1>Mettez vos information a jours</h1>
            <?php if (isset($message)) {
                echo "<h3>".$message."</h3>";
            } ?>
        </div>
        <div id="divUpdate">
            <span id="spanUp"></span>
            <form action="" id=formProfil method="POST">
                <label for="nom"><?php echo $_SESSION['user']['0']['nom'];?></label>
                <input type="text" name="nomUp" id="nomUp" placeholder="">
                <label for="prenom"><?php echo $_SESSION['user']['0']['prenom'];?></label>
                <input type="text" name="prenomUp" id="prenomUp" placeholder="">
                <label for="matricule"><?php echo $_SESSION['user']['0']['matricule'];?></label>
                <input type="text" name="matriculeUp" id="matriculeUp" placeholder="">
                <label for="password">Mot de passe</label>
                <input type="password" name="passwordUp" id="passwordUp" placeholder="Mot de passe">
                <label for="password2">Confirmation du mot de passe</label>
                <input type="password" name="passwordUp2" id="passwordUp2" placeholder="Confirmation du mot de passe">
                <input type="submit" name="update" value="Modifier mon profil">
            </form>
        </div>
        <div id="divDelete">
        <article id='deleteUser'>
                <form method='POST' class='formAdmin'>
                <select name='matricule'>
                        <option value="" disabled selected>Choisisez un utilisateur a supprimer</option>
                        <?php
                        $option = new User();
                        $option->getUser();
                        ?>
                    </select>
                    <input type='submit' name='deleteUser'></input>
                </form>
        </div>
    </main>
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




