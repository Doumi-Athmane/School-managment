<?php 
        require_once(ROOT.'controller/Cycle.php');

class CycleMoy extends Cycle{

    public function index(){

      
            $this->loadModel("CadreSpecial");
            $this->getInfo("CycleMoyView","Moy");
        }
    
}