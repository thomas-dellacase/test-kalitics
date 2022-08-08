<?php
require 'db.php';

class Chantier{
public $id;
public $nom;
public $adresse;
public $date;
public $db;
function __construct(){
    $this->db=connect();
    }


function addChantier($nom, $adresse, $date){
$nom=htmlentities($_POST['nomChant'], ENT_QUOTES, "ISO-8859-1");
$adresse=htmlentities($_POST['adresseChant'], ENT_QUOTES, "ISO-8859-1");
$date=htmlentities($_POST['dateChant'], ENT_QUOTES, "ISO-8859-1");

$insertion=$this->db->prepare("SELECT nom FROM `Chantiers` WHERE `nom`= :nom");
$insertion->bindValue(':nom',$nom);
$insertion->execute();

$verif=$insertion->rowcount();
$insertionfetch=$insertion->fetchAll(PDO::FETCH_ASSOC);

$getWeekNumber = $this->db->prepare("SELECT WEEK(:date) AS week");
$getWeekNumber->bindValue(':date',$date);
$getWeekNumber->execute();
$weekNumber=$getWeekNumber->fetch(PDO::FETCH_ASSOC);

if($verif>0){
    $message="ce Chantier existe déjà";
    return $message;
}
else{
    $insertion=$this->db->prepare("INSERT INTO `Chantiers`(`nom`, `adresse`, `date`,`week`) VALUES (:nom, :adresse, :date,:semaine)");
    $insertion->bindValue(':nom',$nom);
    $insertion->bindValue(':adresse',$adresse);
    $insertion->bindValue(':date',$date);
    $insertion->bindValue(':semaine',$weekNumber['week']);
    $insertion->execute();
    $message="chantier ajouté";
    return $message;
}
}
public function getChantier(){
    $select=$this->db->prepare("SELECT * FROM `Chantiers`");
    $select->execute();
    $fetch=$select->fetchall(PDO::FETCH_ASSOC);
    foreach($fetch as $values){
        echo '<option value="' . $values['id'] . '">' . $values['nom'] . '</option>';
    }
    }

public function updateChant($idUp,$nomUp,$adresseUp,$dateUp){
    $getAllInfos = $this->db->prepare("SELECT * FROM Chantiers WHERE id = :id");
    $getAllInfos->bindValue(':id', $idUp, PDO::PARAM_STR);
    $getAllInfos->execute();
    $result=$getAllInfos->fetchall(PDO::FETCH_ASSOC);
        if(empty($_POST['nomChantUp'])){
            $_POST['nomChantUp'] = $result[0]['nom'];
        }if(empty($_POST['adresseChantUp'])){
            $_POST['adresseChantUp'] = $result[0]['adresse'];
        }if(empty($_POST['dateChantUp'])){
            $_POST['dateChantUp'] = $result[0]['Date'];
        }
        $nomUp=htmlentities($_POST['nomChantUp'], ENT_QUOTES, "ISO-8859-1");
        $adresseUp=htmlentities($_POST['adresseChantUp'], ENT_QUOTES, "ISO-8859-1");
        $dateUp=htmlentities($_POST['dateChantUp'], ENT_QUOTES, "ISO-8859-1");

    $insertProd = $this->db->prepare("UPDATE Chantiers SET nom=:nom, adresse=:adresse ,Date=:date WHERE id = :id");
    $insertProd->bindValue(':id', $idUp, PDO::PARAM_STR);
    $insertProd->bindValue(':nom', $nomUp, PDO::PARAM_STR);
    $insertProd->bindValue(':adresse', $adresseUp, PDO::PARAM_STR);
    $insertProd->bindValue(':date', $dateUp, PDO::PARAM_STR);
    $insertProd->execute();
    $message="chantier modifié";
    return $message;
    }
    public function deleteChantier($id){
        $delete=$this->db->prepare("DELETE FROM `Chantiers` WHERE `id`= :id");
        $delete->bindValue(':id',$id);
        $delete->execute();
        $message="chantier supprimé";
        return $message;
    }

    public function getWeeChant($date){
        $select=$this->db->prepare("SELECT * FROM `Chantiers` WHERE `date`= :date");
        $select->bindValue(':date',$date);
        $select->execute();
        $fetch=$select->fetchall(PDO::FETCH_ASSOC);
        foreach($fetch as $values){
            echo '<option value="' . $values['id'] . '">' . $values['nom'] . '</option>';
        }
    }    
}







?>