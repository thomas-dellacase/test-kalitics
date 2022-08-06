<?php
require_once '../class/classPointage.php';
require_once '../class/classChantier.php';
"<pre>";
var_dump($_SESSION['user']);
var_dump($_SESSION['user']['0']['id']);
"</pre>";
if(isset($_POST['pointageChantier'])){
    $pointage= new Pointage();
    $pointage->addPointage($_SESSION['user']['0']['id'],$_POST['idpointChant'],$_POST['datePoint'],$_POST['duree']);
}
if(isset($_SESSION['user']) && $_SESSION['user']!= ""){
    $point= new Pointage();
    $point->showPointage($_SESSION['user']['0']['id']);

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
    <a class='nav-link' href='deconnexion.php'>Deconnexion</a>
    <a class='nav-link' href='profil.php'>Profil</a>
    <a class='nav-link' href='pointage.php'>Pointage</a>
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
            <form method='POST' class='testDate'>
                <input type='date' name='date'></input>
                    <input type='submit' name='testDate'></input>
            </form>
        </div>
    </main>
</body>
</html>