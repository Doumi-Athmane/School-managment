<?php 

class GestionRestauration extends Controller{

    
    public function index(){

       $this->loadModel("Repas");
       $this->gestionRepas();
       $repass = $this->Repas->getAll();
       $this->render("admin/GestionRestauration" , ['repass'=>$repass]);
       

    }

    public function gestionRepas(){
        if(isset($_POST["ajouter"])){
            if($this->Repas->repasDate($_POST['jour']))
            {
             $this->Repas->modifierRepas($_POST['nom'] ,$_POST['jour']);
 
            }else{
             $this->Repas->ajouterRepas($_POST['nom'] ,$_POST['jour']);
            }
        }
        if(isset($_POST["supprimer"])){
            $this->Repas->supprimerRepas($_POST['id']);
        }
    }

}