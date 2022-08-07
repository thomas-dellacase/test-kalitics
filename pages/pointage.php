<?php
require_once '../class/classPointage.php';
require_once '../class/classChantier.php';

if(isset($_POST['pointageChantier'])){
    $pointage= new Pointage();
    $message = $pointage->addPointage($_SESSION['user']['0']['id'],$_POST['idpointChant'],$_POST['datePoint'],$_POST['duree']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/pointage.css">
    <title>Piontage</title>
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
        <div id="titrePoint">
            <h1>Gestion des pointage</h1>
            <h2>Monsieur <?php echo $_SESSION['user'][0]['nom'];?> ici vous pourrez pointer les chantier existant et consulter vos pointages existant</h2>
            <?php if (isset($message)) {
                echo "<h3>".$message."</h3>";
            } ?>
        </div>
    <div id="divPointage">
        <article id='choiseChant'>
                <form method='POST' class='formAdmin'>
                <select class="input" name='idpointChant'>
                        <option value="" disabled selected>Choisisez un chantier ou pointer</option>
                        <?php
                        $option = new Chantier();
                        $option->getChantier();
                        ?>
                    </select>
                    <input class="input" type='date' name='datePoint'></input>
                    <select class="input" name="duree">
                        <option value="" disabled selected>Choisisez une durée</option>
                        <option value="1">1h</option>
                        <option value="2">2h</option>
                        <option value="3">3h</option>
                        <option value="4">4h</option>
                        <option value="5">5h</option>
                        <option value="6">6h</option>
                        <option value="7">7h</option>
                        <option value="8">8h</option>
                        <option value="9">9h</option>
                        <option value="10">10h</option>
                        <option value="11">11h</option>
                        <option value="12">12h</option>
                    </select>
                    <input class="input" type='submit' name='pointageChantier'></input>
                </form>
        </div>
        <div id="divInfoPointage">
            <article id='showPointage'>
            <form method='POST' class='formAdmin'>
                <select name='idPointShow'>
                    <option value="" disabled selected>Choisisez un chantier ou vous avez pointé</option>
                        <?php
                        $option = new Chantier();
                        $option->getChantier();
                        ?>
                    </select>
                    <input type='submit' name='pointageShow'></input>
                    </form>
            </article>
        </div>
        </div>
        <div>
            <?php
            if(isset($_POST['idPointShow']) && $_SESSION['user']!= ""){
                $point= new Pointage();
                $idUser=$_SESSION['user']['0']['id'] ;
                $idChant=$_POST['idPointShow'];
                $message =$point->showPointage($idUser, $idChant);
                // var_dump($_POST['idPointShow']);
                // var_dump($_SESSION['user']['0']['id']);
            }
            ?>
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