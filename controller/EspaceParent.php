<?php 

class EspaceParent extends Controller{

    public function index(){
        
                $this->loadModel("Article");
                $articles = $this->Article->articleType("Par");
                $this->render("EspaceParentView" , ['articles'=>$articles]);
    }
        
    }
