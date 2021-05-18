<?php 

class Acueil extends Controller{

    
    public function index(){
       
     
        $this->loadModel("Article");
        $articles = $this->Article->getLimit(0,8);
        
      
        $this->render("AcueilView" , ['articles'=>$articles]);

    }

    public function article($id){
        $this->loadModel("Article");
        $article = $this->Article->getOneArticle($id);    
        $this->render("AfficherArticle" , ['article'=>$article]);
    }

    public function articles($page){

        if(isset($page) && !empty($page)){
            $currentPage = (int)strip_tags($page);
        }else{
            $currentPage = 1;
        }
        $this->loadModel("Article");
        $nbPage =(int)ceil(($this->Article->countArticles())/8) ;
        $articles = $this->Article->getLimit($currentPage*8-8,8);
        $this->loadModel("ImageDiapo");
        $images= $this->ImageDiapo->getSelected();
        $this->render("AcueilView" , ['articles'=>$articles ,'nbPage'=>$nbPage,'currentPage'=>$page ,'images'=>$images]);

    }

    
}