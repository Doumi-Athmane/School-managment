<?php 

abstract class Model {

    private $host="127.0.0.1";
    private $db_name="tdw";
    private $username="root";
    private $password="";

    protected $_connexion;

    public $id;
    public $table;

    public function getBDD(){
        $this->_connexion = null;
        
        

        try{
            $this->_connexion= new PDO('mysql:host='.$this->host.';
            dbname='.$this->db_name ,$this->username,"");       

        }
        catch(PDOException $exp){
            echo $exp->getMessage();
        }


    }

    public function getAll(){
       
        $sql = "SELECT * FROM ".$this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

    public function getLimit(int $page,int $parpage){
       
        $sql = "SELECT * FROM ".$this->table." LIMIT ".$page."," .$parpage."";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }

    public function getOne($id){
        $sql = "SELECT * FROM " .$this->table ." where Id".ucfirst($this->table)." = ".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $res = $query->fetch();
        

            if($res!=false){
                return $res;
            }
        }
        
    }
