<?php

class CadreSpecial extends Model{

    public function __construct()
    {
        $this->table = "cadrespecial";
        $this->getBDD();
        
    }

    public function getCadre(string $title){
        $sql = "SELECT * FROM cadrespecial where Title = '$title'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
}