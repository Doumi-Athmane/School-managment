<?php

class Classe extends Model{

    public function __construct()
    {
        $this->table = "class";
        $this->getBDD();
        
    }

    public function getAll(){
        $sql = "SELECT * FROM class ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

    public function ajouterClass(int $idCycle , int $idLevel , int $idClass){
        $sql = "INSERT INTO class (IdClass , IdLevel ,IdCycle) VALUES (:class,:level,:cycle) ";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'class'=>$idClass,
            'level'=>$idLevel,
            'cycle'=>$idCycle
        ));
        $res = $query->fetch();

    }
}