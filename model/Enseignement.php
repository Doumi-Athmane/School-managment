<?php

class Enseignement extends Model{

    public function __construct()
    {
        $this->table = "enseigner";
        $this->getBDD();

        
    }

    public function getOne($id){
        $sql = "SELECT * FROM enseigner where IdEns = ".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }
    
    public function ajouterEnsClass($idEns ,$idClass ,$idLevel , $idCycle ,$module,$hour){
        $sql = "INSERT INTO enseigner (IdEns,IdClass,IdLevel,IdCycle,Module,HeureTravail) VALUES (:idens ,:idclass,:idlevel,:idcycle,:module,:hour)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'idens'=>$idEns,
            'idclass'=>$idClass,
            'idlevel'=>$idLevel,
            'idcycle'=>$idCycle,
            'module'=>$module,
            'hour'=>$hour
        ));
        $query->fetch();
    }

    public function supprimerEnsClass($id){
        $sql = "DELETE FROM enseigner where IdEnseigner = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id            
        ));
        $query->fetch();
    }
   

}