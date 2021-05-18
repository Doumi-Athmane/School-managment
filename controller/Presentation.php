<?php 

class Presentation extends Controller{

    public function index(){

       $this->loadModel("Presentations");
       $presentations = $this->Presentations->getAll();
       $this->render("PresentationView" , ['presentations'=>$presentations]);
       

    }
}