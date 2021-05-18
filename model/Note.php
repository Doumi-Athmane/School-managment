<?php

class Note extends Model{

    public function __construct()
    {
        $this->table = "note";
        $this->getBDD();
        
    }

    public function getNoteEleve(int $id){
       
        $sql = "SELECT * FROM note WHERE IdEleve =".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }
}