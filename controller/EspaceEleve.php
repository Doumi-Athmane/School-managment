<?php 

class EspaceEleve extends Controller{

    public function index(){
      
                    $articlePre = $this->getArticles("Pre");
                    $articleMoy = $this->getArticles("Moy");
                    $articleSec = $this->getArticles("Sec");

                    $this->render("EspaceEleveView" , ['articlePre'=>$articlePre ,'articleMoy'=>$articleMoy , 'articleSec'=>$articleSec]);
    }
            


    public function getArticles($type){
        $this->loadModel("Article");
        $articles = $this->Article->articleType($type); 
        return $articles;
    }



  

  

  



    
}