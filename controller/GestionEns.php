<?php 

class GestionEns extends Controller{

    
    public function index(){

       $this->loadModel("Enseignement");
       $this->affecterEnsClass();
       $this->supprimerEnsClass();
       $this->ReceptionEns();
       $ens = $this->afficherEns();
       $class = $this->getClass();
       $this->render("admin/GestionEns" , ['ens'=>$ens ,'class'=>$class]); 

    }
     public function afficherEns(){
        $this->loadModel("Enseignant");
        return $this->Enseignant->getAll();
    }

    public function afficherClassEns($id){
        $this->loadModel("Enseignement");
        return $this->Enseignement->getOne($id);
    }

    public function supprimerEnsClass(){
        if(isset($_POST["supprimer"])){
            $this->Enseignement->supprimerEnsClass($_POST["id"]);

           }
    }
    public function getClass(){
        $this->loadModel("Classe");
        return $this->Classe->getAll();
    }

    public function affecterEnsClass(){
        if(isset($_POST['ajouter'])){
            $this->Enseignement->ajouterEnsClass($_POST['idEns'],$_POST['idClass'][0],$_POST['idClass'][1],$_POST['idClass'][2],$_POST['module'], (int)$_POST['hour']);
        }
    }
    public function ReceptionEns(){
        if(isset($_POST['ajouterRecep'])){
            $this->loadModel("Enseignant");
            $this->Enseignant->ajouterRecep($_POST['idEns'],$_POST['jour'],$_POST['hour']);
        }
    }

}