<?php 
        require_once(ROOT.'controller/Cycle.php');


class CycleSec extends Cycle{

    public function index(){

      
        $this->loadModel("CadreSpecial");
        $this->getInfo("CycleSecView","Sec");
    }

    
}