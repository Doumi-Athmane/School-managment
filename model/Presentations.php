<?php

class Presentations extends Model{

    public function __construct()
    {
        $this->table = "presentation";
        $this->getBDD();
        
    }

    public function ajouterPresentation(string $paragraph, string $image){
        $sql = "INSERT INTO presentation (Paragraph,Image) VALUES (:paragraph ,:image)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'paragraph'=>$paragraph,
            'image'=>$image
        ));
        $query->fetch();
    }

    public function supprimerPresentation(int $id){

        $sql = "DELETE FROM presentation where IdPresentation = ".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        
         
    }

    public function modifierPresentation(int $id,string $paragraph , string $image ){
       
        $sql = "UPDATE presentation SET Paragraph = :paragraph ,Image = :image  where IdPresentation = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'paragraph'=>$paragraph,
            'image'=>$image,
            'id'=>$id
        ));
        $query->fetch();
        

    }

    public function getAllAdmin(){
        $sql = "SELECT * FROM presentation ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }
    

}