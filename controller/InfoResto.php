<?php

class InfoResto extends Controller{

    public function index()
    {
        $this->loadModel("Repas");
        $repass = $this->Repas->getAll();
        $this->render("InfoResto" , ['repass'=>$repass]);
    }
}