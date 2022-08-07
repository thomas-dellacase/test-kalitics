<?php
//require 'db.php';
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
    public function addPointage($idUser,$idChant,$date,$duree){
        $getAllChantInfos= $this->db->prepare("SELECT * FROM Chantiers WHERE id=:idChant");
        $getAllChantInfos->bindValue('idChant',$idChant);
        $getAllChantInfos->execute();
        $chantInfos=$getAllChantInfos->fetchAll(PDO::FETCH_ASSOC);

        // echo"<pre>";
        // var_dump($chantInfos);
        // echo"</pre>";

        $getAllTimes=$this->db->prepare("SELECT * FROM Pointage WHERE id_user = :idUser AND id_chant = :idChant ");
        $getAllTimes->bindValue(':idUser',$idUser, PDO::PARAM_STR);
        $getAllTimes->bindValue(':idChant',$idChant, PDO::PARAM_STR);
        //$getAllTimes->bindValue(':date',$date, PDO::PARAM_STR);
        $getAllTimes->execute();
        $result=$getAllTimes->fetchall(PDO::FETCH_ASSOC);

        // echo"<pre>";
        // var_dump($result);
        // echo"</pre>";

        //$dateChantier = $chantInfos['0']['Date'];
        foreach($result as $key=>$value){
            
        // echo"<pre>";
        // echo"coucou";
        // var_dump($value);
        // echo"</pre>";

        //var_dump($date);
        if($value['date']==$date){
            $error= "vous ne pouvez pas pointer 2 fois sur le meme chantier le meme jours";
            var_dump($error);
            return $error;
        }
        }
        $getWeekNumber = $this->db->prepare("SELECT WEEK(:date) AS week");
        $getWeekNumber->bindValue(':date',$date);
        $getWeekNumber->execute();
        $weekNumber=$getWeekNumber->fetch(PDO::FETCH_ASSOC);
        // echo"<pre>";
        // var_dump($weekNumber);
        // echo"</pre>";

        $calculTime=$this->db->prepare("SELECT SUM(duree) AS total FROM Pointage WHERE id_user = :idUser AND id_chant = :idChant AND WEEK(date) = :weekNumber");
        $calculTime->bindValue(':idUser',$idUser, PDO::PARAM_STR);
        $calculTime->bindValue(':idChant',$idChant, PDO::PARAM_STR);
        $calculTime->bindValue(':weekNumber',$weekNumber['week'], PDO::PARAM_STR);
        $calculTime->execute();
        $resultas=$calculTime->fetch(PDO::FETCH_ASSOC);
        for($i=0;$i<$duree;$i++){
            $resultas['total']=$resultas['total']+1;
        }
        // echo"<pre>";
        // echo ($i);
        // var_dump($duree);
        // var_dump($resultas['total']);
        // echo"</pre>";

        if($resultas['total'] > 35){
            $error= "vous ne pouvez pas pointer sur un chantier plus de 35h";
            var_dump($error);
            return $error;
        }
        else{
            $addPointage=$this->db->prepare("INSERT INTO Pointage (id_user,id_chant,date,duree,semaine) VALUES (:idUser,:idChant,:date,:duree,:semaine)");
            $addPointage->bindValue(':idUser',$idUser, PDO::PARAM_STR);
            $addPointage->bindValue(':idChant',$idChant, PDO::PARAM_STR);
            $addPointage->bindValue(':date',$date, PDO::PARAM_STR);
            $addPointage->bindValue(':duree',$duree, PDO::PARAM_STR);
            $addPointage->bindValue(':semaine',$weekNumber['week'], PDO::PARAM_STR);
            $addPointage->execute();
            $ajout= "pointage ajouté";
            var_dump($ajout);
            return $ajout;
        }

    }
    //affichage pointage pour utilisateur
    public function showPointage($idUser,$idChant){
        $getAllPointage=$this->db->prepare("SELECT * FROM Pointage INNER JOIN Chantiers ON Chantiers.id=Pointage.id_chant INNER JOIN utilisateurs ON utilisateurs.id=Pointage.id_user WHERE utilisateurs.id=:idUser AND Chantiers.id=:idChant");
        $getAllPointage->bindValue(':idUser',$idUser, PDO::PARAM_STR);
        $getAllPointage->bindValue(':idChant',$idChant, PDO::PARAM_STR);
        $getAllPointage->execute();
        $result=$getAllPointage->fetchall(PDO::FETCH_ASSOC);

        // echo"<pre>";
        // var_dump($result);
        // echo"</pre>";

        $showchant=$this->db->prepare("SELECT * FROM Chantiers WHERE id=:idChant");
        $showchant->bindValue(':idChant',$idChant, PDO::PARAM_STR);
        $showchant->execute();
        $chant=$showchant->fetch(PDO::FETCH_ASSOC);

        echo"<pre>";
        var_dump($chant);
        echo"</pre>";
        ?>
        <div>
            <h1>Chantier <?php echo $chant['nom']; ?></h1>
            <h2>Adresse <?php echo $chant['adresse'];?></h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Duree</th>
                        <th>Semaine</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $key=>$value){ ?>
                        <tr>
                            <td><?php echo $value['date']; ?></td>
                            <td><?php echo $value['duree']; ?>h</td>
                            <td><?php echo $value['semaine']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </div>
                    <?php
        //return $result;
    }



}

?>