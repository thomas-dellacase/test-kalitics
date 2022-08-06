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
    <title>Document</title>
</head>
<body>
    <header>
        <a class='nav-link' href='index.php'>home</a>
        <a class='nav-link' href='pages/chantier.php'>chantier</a>
        <a class='nav-link' href='pages/deconnexion.php'>Deconnexion</a>
        <a class='nav-link' href='pages/profil.php'>Profil</a>
        <a class='nav-link' href='pages/pointage.php'>Pointage</a>
    </header>
    <main>
        <div>
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
        <div>
            <form action="" method="POST">
                <label for="matriculeCo">Matricule</label>
                <input type="text" name="matriculeCo" id="matriculeCo">
                <label for="passwordCo">Mot de passe</label>
                <input type="password" name="passwordCo" id="passwordCo">
                <input type="submit" name="connexion" value="Connexion">
            </form>
        </div>
        <div>
            <form action="" method="POST">
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
</body>
</html>