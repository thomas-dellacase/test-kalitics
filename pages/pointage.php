<?php
require_once '../class/classPointage.php';
require_once '../class/classChantier.php';
// echo "<pre>";
// var_dump($_SESSION['user']);
// var_dump($_SESSION['user']['0']['id']);
// echo "</pre>";
if(isset($_POST['pointageChantier'])){
    $pointage= new Pointage();
    $pointage->addPointage($_SESSION['user']['0']['id'],$_POST['idpointChant'],$_POST['datePoint'],$_POST['duree']);
}







// if(isset($_POST['testDate'])){
//     $date = $_POST['testDate'];
//     $pointage = new Pointage();
//     $pointage->addWeek($date);
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piontage</title>
</head>
<body>
<header>
    <a class='nav-link' href='../index.php'>home</a>
    <a class='nav-link' href='chantier.php'>chantier</a>
    <a class='nav-link' href='profil.php'>Profil</a>
    <a class='nav-link' href='pointage.php'>Pointage</a>
    <a class='nav-link' href='deconnexion.php'>Deconnexion</a>
</header>
    <main>
    <div>
        <article id='choiseChant'>
                <form method='POST' class='formAdmin'>
                <select name='idpointChant'>
                        <option value="" disabled selected>Choisisez un chantier ou pointer</option>
                        <?php
                        $option = new Chantier();
                        $option->getChantier();
                        ?>
                    </select>
                    <input type='date' name='datePoint'></input>
                    <select name="duree">
                        <option value="" disabled selected>Choisisez une durée</option>
                        <option value="1">1h</option>
                        <option value="2">2h</option>
                        <option value="3">3h</option>
                        <option value="4">4h</option>
                        <option value="5">5h</option>
                        <option value="6">6h</option>
                        <option value="7">7h</option>
                        <option value="8">8h</option>
                    </select>
                    <input type='submit' name='pointageChantier'></input>
                </form>
        </div>
        <div>
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
                $point->showPointage($idUser, $idChant);
                // var_dump($_POST['idPointShow']);
                // var_dump($_SESSION['user']['0']['id']);
            }
            ?>
        </div>
    </main>
</body>
</html>