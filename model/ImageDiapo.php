<?php
class ImageDiapo extends Model{

    public function __construct()
    {
        $this->table = "imagediaporama";
        $this->getBDD();
        
    }

    public function ajouterImage($path){
        $path = "\"".$path."\"";
        $sql = "INSERT INTO imagediaporama (Path) VALUES (".$path.")";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $query->fetch();
    }
    public function setZero(){
        $sql = "UPDATE imagediaporama SET Selected = 0";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $query->fetch();
    }
    public function ajouterDiapo($img){
        $sql = "UPDATE imagediaporama SET Selected = 1 where IdImage =".$img;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $query->fetch();
    }

    public function getSelected(){
        $sql = "SELECT * from imagediaporama where Selected = 1";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();
        return $res;
    }
}