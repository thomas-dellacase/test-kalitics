<?php

require '../class/classUser.php';
var_dump($_SESSION['user']);

if(isset($_POST['update'])){
    $update= new User();
    $update->user_profil($_POST['nomUp'],$_POST['prenomUp'],$_POST['matriculeUp'],$_POST['passwordUp'],$_POST['passwordUp2']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profils</title>
</head>
<header>
    <a class='nav-link' href='../index.php'>home</a>
    <a class='nav-link' href='chantier.php'>chantier</a>
    <a class='nav-link' href='deconnexion.php'>Deconnexion</a>
    <a class='nav-link' href='profil.php'>Profil</a>
    <a class='nav-link' href='pointage.php'>Pointage</a>
</header>
<body>
        <div>
            <form action="" method="POST">
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
</body>
</html>




