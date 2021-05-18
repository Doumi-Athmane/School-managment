<?php

class Eleves extends Model{



    public function __construct()
    {
        $this->table = "eleve";
        $this->getBDD();
        
    }

    public function supprimerEleve(int $id){
        $sql = "DELETE FROM eleve where IdEleve = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id            
        ));
        $query->fetch();
    }

    public function ajouterEleve(int $id , string $nom,string $prenom ,string $adresse,string $email,int $phone1,int $phone2,int $calss,int $level ,int $cycle,string $login , string $pwd){
        $sql = "INSERT INTO eleve (IdEleve,Nom,Prenom,Adresse,Email,Phone1,Phone2,IdClass,IdLevel,IdCycle,Login,PWD) 
        VALUES (:id ,:nom,:prenom,:adrss,:email,:phone1,:phone2,:class,:level,:cycle,:login,:pwd)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id,
            'nom'=>$nom,
            'prenom'=>$prenom,
            'adrss'=>$adresse,
            'email'=>$email,
            'phone1'=>$phone1,
            'phone2'=>$phone2,
            'class'=>$calss,
            'level'=>$level,
            'cycle'=>$cycle,
            'login'=>$login,
            'pwd'=>$pwd
        ));
        $query->fetch();
    }

    public function modifierEleve(int $id , string $nom,string $prenom ,string $adresse,string $email,int $phone1,int $phone2,int $calss,int $level ,int $cycle ,string $login , string $pwd){
        $sql = "UPDATE eleve SET  Nom = :nom ,Prenom = :prenom,Adresse = :adrss,Email = :email,Phone1 = :phone1
        ,Phone2 = :phone2,IdClass = :class,IdLevel = :level,IdCycle = :cycle,Login = :login,PWD = :pwd where IdEleve = :id";
        
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id,
            'nom'=>$nom,
            'prenom'=>$prenom,
            'adrss'=>$adresse,
            'email'=>$email,
            'phone1'=>$phone1,
            'phone2'=>$phone2,
            'class'=>$calss,
            'level'=>$level,
            'cycle'=>$cycle,
            'login'=>$login,
            'pwd'=>$pwd
        ));
        $query->fetch();
    }

    public function getEleve($username ,$pwd)
    {
        $sql = "SELECT * FROM eleve where login = :nom and pwd =:pwd";
        $request = $this->_connexion->prepare($sql);
        $request->execute(array(
                   'nom' => $username,
                    'pwd' =>$pwd));
        $res = $request->fetch();
        
        return $res;
    }

    public function getEleveByID($id)
    {
        $sql = "SELECT * FROM eleve where IdEleve = :id";
        $request = $this->_connexion->prepare($sql);
        $request->execute(array(
                   'id' => $id));
        $res = $request->fetch();
        
        return $res;
    }
    
        
     
    

}