<?php 

class GestionExtra extends Controller{

    
    public function index(){

       $this->ajouterClass();
       $this->ajouterActivities();
       $this->ajouterImage();
       $this->ajouterDiapo();
       $images = $this->getImages();
       $this->render("admin/GestionExtra" ,['images'=>$images]);
       

    }

    public function ajouterClass(){
        if(isset($_POST['ajouterClass'])){
         
                $this->loadModel('Classe');
                $this->Classe->ajouterClass($_POST['cycle'],$_POST['level'],$_POST['class']);
            }
           
            
        }
    public function ajouterActivities(){
            if(isset($_POST['ajouterActivitie'])){
                    $this->loadModel('Activity');
                    $this->Activity->ajouterActivitie($_POST['nom'],$_POST['desc'],$_POST['type']);
                }
               
                
    }

    public function ajouterImage(){
        if(isset($_POST['ajouterImage'])){
            $this->loadModel('ImageDiapo');
            $image = $_FILES['image']['name'];
            $path = 'public/assets/'.$image;
            $this->ImageDiapo->ajouterImage($path);
            move_uploaded_file($_FILES['image']['tmp_name'],$path);

        }
    }

    public function getImages(){
        $this->loadModel('ImageDiapo');
        return $this->ImageDiapo->getAll();
    }

    public function ajouterDiapo(){
        if(isset($_POST['valider'])){
            $this->loadModel('ImageDiapo');
            $this->ImageDiapo->setZero();
            $this->ImageDiapo->ajouterDiapo($_POST['image1']);
            $this->ImageDiapo->ajouterDiapo($_POST['image2']);
            $this->ImageDiapo->ajouterDiapo($_POST['image3']);
            $this->ImageDiapo->ajouterDiapo($_POST['image4']);

        }
    }

    
}

