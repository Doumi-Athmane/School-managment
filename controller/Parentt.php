<?php 
 if (session_status() === PHP_SESSION_NONE){
    session_start();
}
class Parentt extends Controller{

    public function index(){
        
            if(isset($_POST['username'])){
                $this->acueilParent($_POST['username'],$_POST['pwd']);
            }else{
                if(isset($_SESSION['id'])){
                    if(isset($_SESSION['idV2']))unset($_SESSION['idV2']);
                    $this->acueilParentByID($_SESSION['id']);
                }
                else{
                    session_destroy();
                    header("location:EspaceParent");
                }
            }
    }
    
    public function acueilParent($login , $pwd){
        $this->loadModel("Parents");
        $parent = $this->Parents->getParent($login,$pwd);
        $this->loadModel("Parent_eleve");
        $eleves = $this->Parent_eleve->getEleves($parent['IdParent']);
        if($parent!=0){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['id'] = $parent['IdParent'];
            $_SESSION['type']="Parent";
            $this->render("ParentView" ,['parent'=>$parent , 'eleves'=>$eleves]);
        }
    }
    public function acueilParentByID($id){
        $this->loadModel("Parents");
        $parent = $this->Parents->getOne($id);
        $this->loadModel("Parent_eleve");
        $eleves = $this->Parent_eleve->getEleves($parent['IdParent']);
        if($parent!=0){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['id'] = $parent['IdParent'];
            $_SESSION['type']="Parent";

            $this->render("ParentView" ,['parent'=>$parent , 'eleves'=>$eleves]);
        }
    }

}