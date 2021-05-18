<?php 

class GestionArticle extends Controller{

    
    public function index(){

       $this->loadModel("Article");
       if(isset($_POST["ajouter"])){
        $image = $_FILES['image']['name'];
        $path = 'public/images/articles/'.$image;
        if(($_POST['idarticle'])!='NULL'){
          $this->Article->modifierArticle($_POST['idarticle'],$_POST['titre'] ,$path,$_POST['description'],$_POST['type']);
          
        }else{
          $this->Article->ajouterArticle($_POST['titre'] ,$path,$_POST['description'],$_POST['type']);
        }
        move_uploaded_file($_FILES['image']['tmp_name'],$path);
        }

      if(isset($_POST["supprimer"])){
          
      $this->Article->supprimerArticle((int)$_POST['id']);
      }


       $articles = $this->Article->getAllAdmin();
       $this->render("admin/GestionArticle",['articles'=>$articles]);
       
       
       
    }
}