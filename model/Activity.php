<?php

class Activity extends Model{

    public function __construct()
    {
        $this->table = "participer";
        $this->getBDD();
        
    }

    public function getActivityEleve(int $id){
       
        $sql = "SELECT a.* FROM activity a inner join (SELECT * from participer Where IdEleve = :id) p on a.IdActivity = p.IdActivity ";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id
        ));
        $res = $query->fetchAll();
        return $res;
    }

    public function ajouterActivitie(string $nom,string $desc,string $type){
        $sql = "INSERT INTO activity (Nom, Description, Type) values (:nom,:desc,:type)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'nom'=>$nom,
            'desc'=>$desc,
            'type'=>$type
        ));
        $query->fetch();
    }
}