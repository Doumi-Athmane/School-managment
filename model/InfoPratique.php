<?php

class InfoPratique extends Model{

    public function __construct()
    {
        $this->table = "infopra";
        $this->getBDD();
        
    }

    public function getInfo(string $type){
        $type = "\"$type\"";
        $sql = "SELECT * FROM infopra WHERE Type =".$type;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }
}