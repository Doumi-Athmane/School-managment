<?php 

class GestionUtilisateur extends Controller{

    
    public function index(){

        $this->gestionEleve();
        $this->gestionEns();
        $this->gestionParent();
        $this->gestionAdmin();
        $eleves = $this->getEleve();
        $enss = $this->getEns();
        $parents = $this->getParent();
        $admins = $this->getAdmin();

       $this->render("admin/GestionUtilisateur" , ['eleves'=>$eleves,'enss'=>$enss,'parents'=>$parents,'admins'=>$admins]);
       

    }

    public function getEleve(){
        $this->loadModel("Eleves");
        return( $this->Eleves->getAll());

    }

    public function gestionEleve(){
        $this->loadModel("Eleves");
        if(isset($_POST['supprimerEleve'])){
            $this->Eleves->supprimerEleve($_POST['idEleve']);
        }
        if(isset($_POST['ajouterEleve'])){
            if($this->Eleves->getOne($_POST['id'])){
                $this->Eleves->modifierEleve($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['phone1'],$_POST['phone2'],$_POST['class'],$_POST['level'],$_POST['cycle'],$_POST['login'],$_POST['pwd']);
            }else{
                $this->Eleves->ajouterEleve($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['phone1'],$_POST['phone2'],$_POST['class'],$_POST['level'],$_POST['cycle'],$_POST['login'],$_POST['pwd']);
            }
        }
        
    }

    public function getEns(){
        $this->loadModel("Enseignant");
        return( $this->Enseignant->getAll());

    }
    public function gestionEns(){
        $this->loadModel("Enseignant");
        if(isset($_POST['supprimerEns'])){
            $this->Enseignant->supprimerEns($_POST['idEns']);
        }
        if(isset($_POST['ajouterEns'])){
            if($this->Enseignant->getOne($_POST['id'])){
                $this->Enseignant->modifierEns($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['phone1'],$_POST['phone2'],$_POST['login'],$_POST['pwd']);
            }else{
                $this->Enseignant->ajouterEns($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['phone1'],$_POST['phone2'],$_POST['login'],$_POST['pwd']);
            }
        }
    }

    public function getParent(){
        $this->loadModel("Parents");
        return( $this->Parents->getAll());

    }
    public function gestionParent(){
        $this->loadModel("Parents");
        if(isset($_POST['supprimerParent'])){
            $this->Parents->supprimerParent($_POST['idParent']);
        }
        if(isset($_POST['ajouterParent'])){
            if($this->Parents->getOne($_POST['id'])){
                $this->Parents->modifierParent($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['phone1'],$_POST['phone2'],$_POST['login'],$_POST['pwd']);
            }else{
                $this->Parents->ajouterParent($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['phone1'],$_POST['phone2'],$_POST['login'],$_POST['pwd']);
            }
        }
        if(isset($_POST['affecter'])){
            $this->loadModel("Parent_eleve");
            $this->Parent_eleve->ajouter($_POST['idParent'],$_POST['idEleve']);
        }
    }

    public function getAdmin(){
        $this->loadModel("Admins");
        return( $this->Admins->getAll());

    }
    public function gestionAdmin(){
        $this->loadModel("Admins");
        if(isset($_POST['supprimerAdmin'])){
            $this->Admins->supprimerAdmin($_POST['idAdmin']);
        }
        if(isset($_POST['ajouterAdmin'])){
            if($this->Admins->getOne($_POST['id'])){
                $this->Admins->modifierAdmin($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['phone1'],$_POST['phone2'],$_POST['login'],$_POST['pwd']);
            }else{
                $this->Admins->ajouterAdmin($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['phone1'],$_POST['phone2'],$_POST['login'],$_POST['pwd']);
            }
        }
    }
}