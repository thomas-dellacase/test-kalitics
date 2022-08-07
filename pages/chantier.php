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
    <title>Chantier</title>
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
        </div>
        <div>
            <form action="" method="POST">
                <label for="nomChant">Nom</label>
                <input type="text" name="nomChant" id="nomChant" placeholder="Nom">
                <label for="adresseChant">Adresse</label>
                <input type="text" name="adresseChant" id="adresseChant" placeholder="Adresse">
                <label for="dateChant">Date</label>
                <input type="date" name="dateChant" id="dateChant" placeholder="Date">
                <input type="submit" name="addChantier" value="Ajouter">
            </form>
        </div>
        <div>
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
        <div>
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
        <div>
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
    </main>
</body>
</html>