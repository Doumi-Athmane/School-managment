<?php 

abstract class Cycle extends Controller{

    public function loadModel(string $model){

       parent::loadModel($model);
      
      
    }
    public function getInfo(string $view ,string $cycle){
        $EDT = $this->CadreSpecial->getCadre("Emploi du temps");
        $ListEns = $this->CadreSpecial->getCadre("Enseignants");
        $InfoPrat = $this->CadreSpecial->getCadre("Informations pratiques");
        $InfoRes = $this->CadreSpecial->getCadre("Informations sur la restauration");
        $this->loadModel("Article");

        $articles = $this->Article->articleType($cycle); 
 
 
        $this->render($view,['articles'=>$articles , 'EDT'=>$EDT , 'ListEns'=>$ListEns, 'InfoPra'=>$InfoPrat , 'InfoRes'=>$InfoRes] ); 
 
    }


}