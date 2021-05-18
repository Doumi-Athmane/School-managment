<?php

abstract class Controller {

    public function loadModel(string $model){
        require_once(ROOT.'model/'.$model.'.php');
        $this->$model = new $model();
    }

    
    public function loadModelAuth(string $model , int $id){
        require_once(ROOT.'model/'.$model.'.php');
        $this->$model = new $model($id);
    }

    public function render(string $file , array $data =[]){
        extract($data);
        require_once(ROOT.'view/'.$file.'.php');
    }

    
}