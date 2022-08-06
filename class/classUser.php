<?php
require 'db.php';
class User{
public $nom;
public $prenom;
public $matricule;
public $password;
public $db;

function __construct(){
$this->db=connect();
}


//fonction pour ajouter un user
function addUser($nom,$prenom,$matricule,$password,$password2){

$nom=htmlentities($_POST['nom'], ENT_QUOTES, "ISO-8859-1");
$prenom=htmlentities($_POST['prenom'], ENT_QUOTES, "ISO-8859-1");
$matricule=htmlentities($_POST['matricule'], ENT_QUOTES, "ISO-8859-1");
$password=htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
$password2=htmlentities($_POST['password2'], ENT_QUOTES, "ISO-8859-1"); 

$inscription=$this->db->prepare("SELECT matricule FROM utilisateurs WHERE matricule = :matricule ");
$inscription->bindValue('matricule',$matricule);
$inscription->execute();

$userExists = $inscription->rowcount();
$connexionfetch=$inscription->fetchAll(PDO::FETCH_ASSOC);

if($userExists==1){
    $message="ce nom d'utilisateur existe déjà";
}
elseif(strlen($_POST['password'])>=6){
    if($password==$password2){
        $password=password_hash($password,PASSWORD_DEFAULT);
        $sqlinsert="INSERT INTO utilisateurs(nom, prenom, matricule,password) VALUES(:nom,:prenom,:matricule,:password)";
        $connexioninsert=$this->db->prepare($sqlinsert);
        $connexioninsert->execute(array(
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':matricule' =>$matricule,
            ':password'=>$password
        ));
        //header("Location: connexion.php");
    }
    else $message="Les mots de passe ne sont pas identiques";
}
else $message= "Le mot de passe est trop court !";       

}
//connexion d'un user 
public function user_connexion($matricule, $password) {

        $matricule = htmlentities($_POST['matriculeCo'], ENT_QUOTES, "ISO-8859-1"); 
        $password = htmlentities(password_hash($_POST['passwordCo'],PASSWORD_DEFAULT));
        $connexion = $this->db->prepare("SELECT * FROM utilisateurs WHERE matricule = :matricule ");
        $connexion->execute(array(':matricule' => $matricule));
        $userExists = $connexion->rowcount();
        $cofetch = $connexion->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($cofetch);
       
    if(password_verify($_POST['passwordCo'],$cofetch['0']['password'])) {
        $_SESSION['user'] = $cofetch;
        //header("Location: ");
    }

    else{
        $message='le login ou le mot de passe est incorrect';  
    }
    
    

}
//function update user 
public function user_profil($nom,$prenom,$matricule,$password,$password2){

    $nom=htmlentities($_POST['nomUp'], ENT_QUOTES, "ISO-8859-1");
    $prenom=htmlentities($_POST['prenomUp'], ENT_QUOTES, "ISO-8859-1");
    $matricule=htmlentities($_POST['matriculeUp'], ENT_QUOTES, "ISO-8859-1");
    $password1=htmlentities($_POST['passwordUp'], ENT_QUOTES, "ISO-8859-1");
    $password2=htmlentities($_POST['passwordUp2'], ENT_QUOTES, "ISO-8859-1");
    $oldprenom=$_SESSION['user']['0']['prenom'];
    $oldnom=$_SESSION['user']['0']['nom'];
    $oldmatricule=$_SESSION['user']['0']['matricule'];

    $profil=$this->db->prepare("SELECT * FROM `utilisateurs` WHERE `matricule`= :matricule");
    $profil->bindValue(':matricule',$oldmatricule);
    $profil->execute();
    $verifinfo=$profil->fetchall(PDO::FETCH_ASSOC);

    echo"cc1";
    var_dump($verifinfo);
    
    if(isset($_POST['update'])){
        if(empty($_POST['matriculeUp'])){
            $_POST['matriculeUp']=$oldmatricule;
        }
        if(empty($_POST['nomUp'])){
            $_POST['nomUp']=$oldnom;
        }
        if(empty($_POST['prenomUp'])){
            $_POST['prenomUp']=$oldprenom;
        }
        $profil=$this->db->prepare("SELECT * FROM `utilisateurs`WHERE `matricule`= :matricule ");
        $profil->bindValue(':matricule',$matricule);
        $userExists = $profil->rowcount();
        $verifprofil=$profil->fetchAll(PDO::FETCH_ASSOC);

        echo"cc2";
        var_dump($verifprofil);

    if($userExists>0){
        $message="ce matricule existe déjà";
    }

    else{
        $update=$this->db->prepare("UPDATE `utilisateurs` SET `nom`=:nom, `prenom`=:prenom, `matricule`=:matricule1  WHERE `matricule`= :matricule");
        $update->bindValue(':nom',$nom ,PDO::PARAM_STR);
        $update->bindValue(':prenom',$prenom ,PDO::PARAM_STR);
        $update->bindValue(':matricule',$oldmatricule ,PDO::PARAM_STR);
        $update->bindValue(':matricule1',$matricule ,PDO::PARAM_STR);
        $update->execute();

        $update=$this->db->prepare("SELECT * FROM `utilisateurs` WHERE `matricule`= :matricule ");
        $update->bindValue(':matricule',$matricule);
        $update->execute();
        $fetch=$update->fetchall(PDO::FETCH_ASSOC);
        $_SESSION['user']=$fetch;
        var_dump($fetch);
        //$_SESSION['user']['0']['matricule']=$matricule;

        if(strlen($_POST['passwordUp'])>=6){
            if($password1==$password2){
                $password1=password_hash($password1,PASSWORD_DEFAULT);
                $sqlinsert="INSERT INTO utilisateurs(password) VALUES(:password)";
                $update=$this->db->prepare($sqlinsert);
                $update->execute(array(
                ':password'=>$password1));
        }
}  
}
}
}

//function delete user 
public function delete_user($matricule){
    $delete=$this->db->prepare("DELETE FROM `utilisateurs` WHERE `matricule`= :matricule");
    $delete->bindValue(':matricule',$matricule);
    $delete->execute();
}
}
?>