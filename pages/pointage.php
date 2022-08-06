<?php
require '../class/classPointage.php';
require '../class/classChantier.php';

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
                <select name='idchoiseChant'>
                        <option value="" disabled selected>Choisisez un chantier a supprimer</option>
                        <?php
                        $option = new Chantier();
                        $option->getChantier();
                        ?>
                    </select>
                    <input type='submit' name='choixChantier'></input>
                </form>
        </div>
    </main>
</body>
</html>