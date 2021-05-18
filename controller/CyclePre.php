<?php 
        require_once(ROOT.'controller/Cycle.php');

class CyclePre extends Cycle{

    public function index(){

       $this->loadModel("CadreSpecial");
        $this->getInfo("CyclePreView","Pre");
    }

    
}