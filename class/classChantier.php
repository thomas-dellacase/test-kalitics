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
    echo"cc1";
$nom=htmlentities($_POST['nomChant'], ENT_QUOTES, "ISO-8859-1");
$adresse=htmlentities($_POST['adresseChant'], ENT_QUOTES, "ISO-8859-1");
$date=htmlentities($_POST['dateChant'], ENT_QUOTES, "ISO-8859-1");

$insertion=$this->db->prepare("SELECT nom FROM `Chantiers` WHERE `nom`= :nom");
$insertion->bindValue(':nom',$nom);
$insertion->execute();

$verif=$insertion->rowcount();
$insertionfetch=$insertion->fetchAll(PDO::FETCH_ASSOC);
var_dump($insertionfetch);

var_dump($verif);

if($verif>0){
    $message="ce Chantier existe déjà";
    if(isset($message)){
        echo $message;
    }
}
else{
    echo"cc2";
    $insertion=$this->db->prepare("INSERT INTO `Chantiers`(`nom`, `adresse`, `date`) VALUES (:nom, :adresse, :date)");
    $insertion->bindValue(':nom',$nom);
    $insertion->bindValue(':adresse',$adresse);
    $insertion->bindValue(':date',$date);
    $insertion->execute();
    $message="chantier ajouté";
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
    //echo "getAllInfos";

    $getAllInfos = $this->db->prepare("SELECT * FROM Chantiers WHERE id = :id");
    $getAllInfos->bindValue(':id', $idUp, PDO::PARAM_STR);
    $getAllInfos->execute();
    $result=$getAllInfos->fetchall(PDO::FETCH_ASSOC);

        echo'<pre>';
        var_dump($result);
        echo '</pre>';
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
        
    // echo"oldInfo";
    // echo'<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    

    $insertProd = $this->db->prepare("UPDATE Chantiers SET nom=:nom, adresse=:adresse ,Date=:date WHERE id = :id");
    $insertProd->bindValue(':id', $idUp, PDO::PARAM_STR);
    $insertProd->bindValue(':nom', $nomUp, PDO::PARAM_STR);
    $insertProd->bindValue(':adresse', $adresseUp, PDO::PARAM_STR);
    $insertProd->bindValue(':date', $dateUp, PDO::PARAM_STR);
    $insertProd->execute();
    // echo'updateChant';
    // echo'<pre>';
    // var_dump($nomUp);
    // echo '</pre>';
    // echo'<pre>';
    // var_dump($adresseUp);
    // echo '</pre>';
    // echo'<pre>';
    // var_dump($dateUp);
    // echo '</pre>';
    }
    public function deleteChantier($id){
        $delete=$this->db->prepare("DELETE FROM `Chantiers` WHERE `id`= :id");
        $delete->bindValue(':id',$id);
        $delete->execute();
    }


    
}






?>