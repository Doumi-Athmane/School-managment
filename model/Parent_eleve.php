<?php

class Parent_eleve extends Model{

    public function __construct()
    {
        $this->table = "parent_eleve";
        $this->getBDD();
        
    }

    public function ajouter(int $idparent, int $ideleve){
        $sql = "INSERT INTO parent_eleve (IdParent , IdEleve ) VALUES (:parent,:eleve) ";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'parent'=>$idparent,
            'eleve'=>$ideleve
        ));
        $res = $query->fetch();
    }

    public function getEleves(int $idParent){
        $sql = "SELECT eleve.* from eleve inner join parent_eleve on eleve.IdEleve = parent_eleve.IdEleve where IdParent = :idparent";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'idparent'=>$idParent
        ));
        $res = $query->fetchAll();
        return $res;
    }
}