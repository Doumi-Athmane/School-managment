<?php

class Admins extends Model{

    public function __construct()
    {
        $this->table = "admin";
        $this->getBDD();
        
    }

    public function getAdmin($username ,$pwd)
    {
        $sql = "SELECT count(*),PWD,IdAdmin FROM admin where login = :nom ";
        $request = $this->_connexion->prepare($sql);
        $request->execute(array(
                   'nom' => $username,));
        $res = $request->fetchAll();
        
        return $res;
    }
    public function getAdminById($id)
    {
        $sql = "SELECT * FROM admin where IdAdmin = :id";
        $request = $this->_connexion->prepare($sql);
        $request->execute(array(
                   'id' => $id,));
        $res = $request->fetchAll();
        
        return $res;
    }


    public function supprimerAdmin(int $id){
        $sql = "DELETE FROM admin where IdAdmin = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id            
        ));
   
        $query->fetch();
    }

    public function ajouterAdmin(int $id , string $nom,string $prenom ,string $adresse,string $email,int $phone1,int $phone2,string $login , string $pwd){
        $sql = "INSERT INTO admin (IdAdmin,Nom,Prenom,Adresse,Email,Phone1,Phone2,Login,PWD) 
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

    public function modifierAdmin(int $id , string $nom,string $prenom ,string $adresse,string $email,int $phone1,int $phone2 ,string $login , string $pwd){
        $sql = "UPDATE admin SET  Nom = :nom ,Prenom = :prenom,Adresse = :adrss,Email = :email,Phone1 = :phone1
        ,Phone2 = :phone2,Login = :login,PWD = :pwd where IdAdmin = :id";
        
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
    

}