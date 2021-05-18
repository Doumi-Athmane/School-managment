<?php 

class GestionPresentation extends Controller{

    
    public function index(){

       $this->loadModel("Presentations");
       
       if(isset($_POST["ajouter"])){
        $image = $_FILES['image']['name'];
        $path = 'public/images/presentations/'.$image;
        if(($_POST['idparagr'])!='NULL'){
          $this->Presentations->modifierPresentation($_POST['idparagr'],$_POST['paragraph'] ,$path);
        }else{  
          $this->Presentations->ajouterPresentation($_POST['paragraph'] ,$path);
        }
        move_uploaded_file($_FILES['image']['tmp_name'],$path);

    }
    
    if(isset($_POST["supprimer"])){
        
     $this->Presentations->supprimerPresentation($_POST['id']);
     }
      $parags = $this->Presentations->getAllAdmin();
       $this->render("admin/GestionPresentation",['paragraphs'=>$parags]);
       
       
    }
}