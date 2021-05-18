<?php 

class GestionEDT extends Controller{

    
    public function index(){

       $this->loadModel("Seance");
       $ens = $this->ens();
       $this->render("admin/GestionEDT", ['ens'=>$ens]);
       
       if(isset($_POST["ajouter"])){
           
           $this->Seance->ajouterSeance($_POST['SHour'] ,$_POST['EHour'],$_POST['Salle'],$_POST['IdEns'],
           $_POST['Module'] ,$_POST['IdClass'],$_POST['IdLevel'],$_POST['IdCycle']
                                        );
       }

    }

    public function ens(){
        $this->loadModel("Enseignant");
        return $this->Enseignant->getAll();
    }


}