<?php

class Contacts extends Model{

    public function __construct()
    {
        $this->table = "contact";
        $this->getBDD();
        
    }

    public function ajouterContact($email ,$phone, $phone2){
        $sql = "INSERT INTO contact (Email , Phone ,Phone2) VALUES (:email ,:phone ,:phone2)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'email'=>$email,
            'phone'=>$phone,
            'phone2'=>$phone2
            
        ));
        $query->fetch();

    }

    public function supprimerContact($id){
        $sql = "DELETE FROM contact where IdContact = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id            
        ));
        $query->fetch();
    }

}