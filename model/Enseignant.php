<?php

class Enseignant extends Model{

    public function __construct()
    {
        $this->table = "ens";
        $this->getBDD();
        
    }

    
    public function supprimerEns(int $id){
        $sql = "DELETE FROM ens where IdEns = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id            
        ));
   
        $query->fetch();
    }

    public function ajouterEns(int $id , string $nom,string $prenom ,string $adresse,string $email,int $phone1,int $phone2,string $login , string $pwd){
        $sql = "INSERT INTO ens (IdEns,Nom,Prenom,Adresse,Email,Phone1,Phone2,Login,PWD) 
        VALUES (:id ,:nom,:prenom,:adrss,:email,:phone1,:phone2,:login,:pwd)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id,
            'nom'=>$nom,
            'prenom'=>$prenom,
            'adrss'=>$adresse,
            'email'=>$email,
            'phone1'=>$phone1,
            'phone2'=>$phone2,
            'login'=>$login,
            'pwd'=>$pwd
        ));
        $query->fetch();
    }

    public function modifierEns(int $id , string $nom,string $prenom ,string $adresse,string $email,int $phone1,int $phone2 ,string $login , string $pwd){
        $sql = "UPDATE ens SET  Nom = :nom ,Prenom = :prenom,Adresse = :adrss,Email = :email,Phone1 = :phone1
        ,Phone2 = :phone2,Login = :login,PWD = :pwd where IdEns = :id";
        
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id,
            'nom'=>$nom,
            'prenom'=>$prenom,
            'adrss'=>$adresse,
            'email'=>$email,
            'phone1'=>$phone1,
            'phone2'=>$phone2,
            'login'=>$login,
            'pwd'=>$pwd
        ));
        $query->fetch();    
    }

    public function EnsCycle($id){
        $sql = "SELECT ens.* FROM ens inner join enseigner on ens.IdEns = enseigner.IdEns where IdCycle =".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

    public function ajouterRecep($id,$jour ,$hour){
        $sql = "UPDATE ens SET  HeurResp = :hour, JourRecep = :jour where IdEns = :id";
        
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id,
            'jour'=>$jour,
            'hour'=>$hour
        ));
        $query->fetch();   
    }
    
        
  
}