<?php

class Parents extends Model{



    public function __construct()
    {
        $this->table = "parent";
        $this->getBDD();
        
    }
    public function supprimerParent(int $id){
        $sql = "DELETE FROM parent where IdParent = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id            
        ));
   
        $query->fetch();
    }

    public function ajouterParent(int $id , string $nom,string $prenom ,string $adresse,string $email,int $phone1,int $phone2,string $login , string $pwd){
        $sql = "INSERT INTO parent (IdParent,Nom,Prenom,Adresse,Email,Phone1,Phone2,Login,PWD) 
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

    public function modifierParent(int $id , string $nom,string $prenom ,string $adresse,string $email,int $phone1,int $phone2 ,string $login , string $pwd){
        $sql = "UPDATE parent SET  Nom = :nom ,Prenom = :prenom,Adresse = :adrss,Email = :email,Phone1 = :phone1
        ,Phone2 = :phone2,Login = :login,PWD = :pwd where IdParent = :id";
        
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

    public function getParent($username ,$pwd)
    {
        $sql = "SELECT * FROM parent where login = :nom and pwd =:pwd";
        $request = $this->_connexion->prepare($sql);
        $request->execute(array(
                   'nom' => $username,
                    'pwd' =>$pwd));
        $res = $request->fetch();
        
        return $res;
    }
    
    
        
     
    

}