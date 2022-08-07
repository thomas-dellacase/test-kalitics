    <?php
require '../class/classChantier.php';
require_once '../class/classPointage.php';

if(isset($_POST['addChantier'])){
    $insert= new Chantier;
    $insert->addChantier($_POST['nomChant'],$_POST['adresseChant'],$_POST['dateChant']);
}
if(isset($_POST['upChantier'])){
    $update= new Chantier;
    $update->updateChanT($_POST['upIdChant'],$_POST['nomChantUp'],$_POST['adresseChantUp'],$_POST['dateChantUp']);
}
if(isset($_POST['deleteChantier'])){
    $delete= new Chantier;
    $delete->deleteChantier($_POST['idDeleteChant']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/scriptChant.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/chantier.css">
    <title>Chantier</title>
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
    <main>
        <div id="titreChant">
            <h1>Gestion des chantiers</h1>
        </div>
        <div id="infoChant">
        <article id='infoChantier'>
                <form method='POST' class='formAdmin'>
                <select name='idInfoChant'>
                        <option value="" disabled selected>Info chantiers</option>
                        <?php
                        $option = new Chantier();
                        $option->getChantier();
                        ?>
                    </select>
                    <input type='submit' name='infoChantier'></input>
                </form>
                <div>
                    <?php
                        if(isset($_POST['infoChantier'])){
                        $info = new Pointage();
                        $info->showAllInfoChant($_POST['idInfoChant']);
                        }
                    ?>
                </div>
        </div>
        <div id="ajoutChant">
            <form action="" method="POST">
                <span nom="spanChant" id="spanChant"></span>
                <label for="nomChant">Nom</label>
                <input type="text" name="nomChant" id="nomChant" placeholder="Nom">
                <label for="adresseChant">Adresse</label>
                <input type="text" name="adresseChant" id="adresseChant" placeholder="Adresse">
                <label for="dateChant">Date</label>
                <input type="date" name="dateChant" id="dateChant" placeholder="Date">
                <input type="submit" name="addChantier" value="Ajouter">
            </form>
        </div>
        <div id="updateChant">
            <form action="" method="POST">
            <select name='upIdChant'>
                        <option value="" disabled selected>Choisisez un chantier a modifier</option>
                        <?php
                        $option = new Chantier();
                        $option->getChantier();
                        ?>
                    </select>
                <label for="nomChantUp">Nom</label>
                <input type="text" name="nomChantUp" id="nomChant" placeholder="Nom">
                <label for="adresseChantUp">Adresse</label>
                <input type="text" name="adresseChantUp" id="adresseChant" placeholder="Adresse">
                <label for="adresseChantUp">Date</label>
                <input type="date" name="dateChantUp" id="dateChant" placeholder="Date">
                <input type="submit" name="upChantier" value="Ajouter">
            </form>
        </div>
        <div id='deleteChant'>
        <article id='deleteChantier'>
                <form method='POST' class='formAdmin'>
                <select name='idDeleteChant'>
                        <option value="" disabled selected>Choisisez un chantier a supprimer</option>
                        <?php
                        $option = new Chantier();
                        $option->getChantier();
                        ?>
                    </select>
                    <input type='submit' name='deleteChantier'></input>
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