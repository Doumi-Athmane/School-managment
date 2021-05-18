<?php 

class GestionContact extends Controller{

    
    public function index(){

       $this->loadModel("contacts");
       $this->ajouterContact();
       $this->supprimerContact();
       $contacts = $this->contacts->getAll();      
        $this->render("admin/GestionContact",['contact' => $contacts]);

       
       
    }

    public function supprimerContact(){
        if(isset($_POST["supprimer"])){
          
            $this->contacts->supprimerContact($_POST["id"]);

           }
    }

    public function ajouterContact(){
        if(isset($_POST["ajouter"])){
            $this->contacts->ajouterContact($_POST['email'] ,$_POST['phone'],$_POST['phone2']);
        }
    }
}