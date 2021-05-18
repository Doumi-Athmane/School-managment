<?php

class Article extends Model{

    public function __construct()
    {
        $this->table = "article";
        $this->getBDD();
        
    }

    public function articleType(string $type){
        $sql = "SELECT article.* FROM article inner join typearticle on article.IdArticle=typearticle.IdArticle
        where typearticle.Type =:typearticle LIMIT 4";
        if($type === "Par"){$sql = "SELECT article.* FROM article inner join typearticle on article.IdArticle=typearticle.IdArticle
            where typearticle.Type =:typearticle LIMIT 8";}
        $query = $this->_connexion->prepare($sql);
        $query->execute((array(
            'typearticle' => $type)));
        $res = $query->fetchAll();
        return $res;
    }


    public function ajouterArticle(string $title , string $image ,string $description,string $type){
        $sql = "INSERT INTO article (Title,Image,Description) VALUES (:titre ,:image,:desc)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'titre'=>$title,
            'image'=>$image,
            'desc'=>$description
        ));
        $query->fetch();
        
        $res = $this->_connexion->prepare("SELECT IdArticle From article order by IdArticle Desc LIMIT 1");
        $res->execute();
        $res = $res->fetch();
        $sql = "INSERT INTO typearticle (Type , IdArticle) VALUES (:type , :id)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'type'=>$type,
            'id'=>$res['IdArticle']
        ));
        $query->fetch();

    }


    public function supprimerArticle(int $id){

        $sql = "DELETE FROM typearticle where IdArticle = ".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        
        $sql = "DELETE FROM article where IdArticle = ".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        
    }

    public function getAllAdmin(){
        $sql = "SELECT * FROM article order by IdArticle ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

    public function modifierArticle(int $id,string $title , string $image ,string $description,string $type){
        $sql = "UPDATE article SET Title = :titre , Image = :image , Description = :desc where IdArticle = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'titre'=>$title,
            'image'=>$image,
            'desc'=>$description,
            'id'=>$id
        ));
        $query->fetch();
        $sql = "UPDATE typearticle SET Type = :type  where IdArticle = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'type'=>$type,
            'id'=>$id
        ));
        $query->fetch();

    }

    public function getOneArticle($id){
        $sql = "SELECT * FROM article where IdArticle = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array(
            'id'=>$id
        ));
        $res = $query->fetch();
        

            if($res!=false){
                return $res;
            }
        }
    
    public function countArticles(){
        $sql = "SELECT COUNT(*) AS NbrArticles FROM article";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetch();
        return (int)$res['NbrArticles'];

    }
       

}