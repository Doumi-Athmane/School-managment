<?php
class InfoPra extends Controller{

    public function index(){

       $this->loadModel("InfoPratique");
       $infos = $this->InfoPratique->getInfo($_POST['id']);
       $this->render("infoPratique",['infos'=>$infos]);
        
    }

    
}