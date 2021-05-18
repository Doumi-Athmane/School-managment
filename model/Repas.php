<?php

class Repas extends Model{

    public function __construct()
    {
        $this->table = "repas";
        $this->getBDD();
        
    }

    public function ajouterRepas(string $nom , string $jour)
    {
        $sql = "INSERT INTO repas (NomRepas , Jour) VALUES (:nom ,:jour)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'nom'=>$nom,
            'jour'=>$jour
            
        ));
        $query->fetch();

    }

    public function repasDate(string $jour){
        $sql = "SELECT * FROM repas where Jour = :jour";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'jour'=>$jour
        ));
        if($query->fetch()) return true;
        else false;
    }

    public function modifierRepas(string $nom ,string $jour)
    {
        $sql = "UPDATE repas SET NomRepas = :nom where Jour = :jour";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'nom'=>$nom,
            'jour'=>$jour
        ));
        $query->fetch();

    }

    public function supprimerRepas($id){
        $sql = "DELETE FROM repas where IdRepas = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id            
        ));
        $query->fetch();
    }
}