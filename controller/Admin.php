<?php 
 if (session_status() === PHP_SESSION_NONE){
    session_start();
}
class Admin extends Controller{

    
    public function index(){
       $this->loadModel("Admins");
       if(isset($_POST["retour"])){
             $this->loginByID($_POST['idSes']);
       }else{
        if(isset($_POST['username']) && isset($_POST['pwd'])){
            if ($this->login($_POST['username'],$_POST['pwd'])){
                $this->render("admin/index");
            }else{
                $this->render("admin/login");
            } 
        }else $this->render("admin/login");
       }

    }

    public function login($username , $pwd){
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
            if(isset($username) && isset($pwd))
            { 
                    $res = $this->Admins->getAdmin($username,$pwd);
                    $count = $res[0]['count(*)'];
                   if($count!=0 && ($pwd === $res[0]['PWD']))
                    {   
                        $_SESSION['username'] = $username;
                        $_SESSION['id']=$res[0]['IdAdmin'];
                        return true;  
                    }
                    else
                    {                         
                        return false;
                    }
                }
    }
    public function loginByID($id){
        if (session_status() === PHP_SESSION_NONE){
            session_start();
        }
        $res = $this->Admins->getAdminById($id);
        $_SESSION['username'] = $res['username'];
        $_SESSION['id']=$res['IdAdmin'];
        $this->render("admin/index");


    }
}