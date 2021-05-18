<?php

class ListEns extends Controller{

    public function index()
    {
        $this->loadModel("Enseignant");
        $enss = $this->Enseignant->EnsCycle($_POST['id']);
        $this->render("ListEns" , ['enss'=>$enss]);
    }
}