<?php 

class Contact extends Controller{

   
    public function index(){

       $this->loadModel("contacts");
       $contacts = $this->contacts->getAll();
       $this->render("ContactView" ,['contact' => $contacts] );

    }
}