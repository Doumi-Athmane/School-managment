<?php
   
define('ROOT' , str_replace('index.php' , '', $_SERVER['SCRIPT_FILENAME']));
require_once(ROOT.'public/Controller.php');
require_once(ROOT.'public/Model.php');


$params = explode('/',$_GET['p']);
if($params[0] == ""){
    header('Location: acueil/articles/1'); }
if($params[0] != ""){
    $controller = ucfirst($params[0]);
    
    $action = isset($params[1]) ? $params[1] : 'index';
    if(file_exists('controller/'.$controller.'.php')){
        require_once(ROOT.'controller/'.$controller.'.php');

        $controller = new $controller();
        if(method_exists($controller,$action)){
            unset($params[0]);
            unset($params[1]);
            call_user_func_array([$controller,$action],$params);
            
        }else{
            http_response_code(404);
            require_once(ROOT.'controller/Errorpage.php');
            $controller = new Errorpage();
            $controller->getError();
        }
    }else{
        http_response_code(404);
        require_once(ROOT.'controller/Errorpage.php');
        $controller = new Errorpage();
        $controller->getError();
    }
}
    
