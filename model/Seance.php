<?php

class Seance extends Model{

    public function __construct()
    {
        $this->table = "seance";
        $this->getBDD();
        
    }

    public function ajouterSeance($SHour,$EHour,$Salle,$IdEns,$Module,$IdClass,$IdLevel,$IdCycle){
        $sql = "INSERT INTO seance (SHour,EHour,Salle,IdEns,Module,IdClass,IdLevel,IdCycle) VALUES (:SHour,:EHour,:Salle,:IdEns,:Module,:IdClass,:IdLevel,:IdCycle)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'SHour'=>$SHour,
            'EHour'=>$EHour,
            'Salle'=>$Salle,
            'IdEns'=>$IdEns,
            'Module'=>$Module,
            'IdClass'=>$IdClass,
            'IdLevel'=>$IdLevel,
            'IdCycle'=>$IdCycle
        ));
        $query->fetch();
    }
}