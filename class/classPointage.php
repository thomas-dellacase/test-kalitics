<?php
require 'db.php';
class Pointage{
    public $id;
    public $idUser;
    public $idChant;
    public $date;
    public $db;

    function __construct(){
        $this->db=connect();
    }

    //nouveau pointage 
    public function addPointage($idUser,$idChant,$date){

    }


//function to calculate mondays
function getMonday($date) {
    $day = date('w', strtotime($date));
    $monday = date('Y-m-d', strtotime("-$day day", strtotime($date)));
    var_dump($monday);
    return $monday;
}

}
?>