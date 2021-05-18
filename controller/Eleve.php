<?php 
 if (session_status() === PHP_SESSION_NONE){
    session_start();
}
class Eleve extends Controller{

    public function index(){

       if(isset($_POST['info'])){
            $this->InfoPerson($_POST['id']);
       }else{
            if(isset($_POST['note'])){
                $this->Note($_POST['id']);
            }else{
                if(isset($_POST['activity'])){
                    $this->Activities($_POST['id']);
                }else{
                    if(isset($_POST['profil'])){
                        $this->accueilEleveParent($_POST['id']);
                    }else{
                        if(isset($_POST['username'])){
                            $this->acueilEleve($_POST['username'],$_POST['pwd']);
                        }else{
                            if(isset($_SESSION['pass'])){
                                $this->accueilEleveParent($_SESSION['idV2']);
                            }else{
                            if(isset($_SESSION['id'])){
                                $this->accueilEleveParent($_SESSION['id']);
                            }
                            else{
                                session_destroy();
                                header("location:EspaceEleve");
                            }
                        }
                        }

                }
            
            }
           
        }
    }
}

    public function getArticles($type){
        $this->loadModel("Article");
        $articles = $this->Article->articleType($type); 
        return $articles;
    }

    public function accueilEleveParent($id){
        $this->loadModel("Eleves");
        $eleve = $this->Eleves->getEleveByID($id);
        if($eleve!=0){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_POST['profil']) || isset($_SESSION['pass'])){
                $_SESSION['type']="Parent";
                $_SESSION['idV2']=$eleve['IdEleve'];
                $_SESSION['pass']= 1;
            }elseif(!isset($_SESSION['pass'])){
                $_SESSION['id'] = $eleve['IdEleve'];
                $_SESSION['type']="Eleve";
            }
            $this->render("EleveView" ,['eleve'=>$eleve]);
        }

    }

    public function acueilEleve($login , $pwd){
        $this->loadModel("Eleves");
        $eleve = $this->Eleves->getEleve($login,$pwd);
        if($eleve!=0){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['id'] = $eleve['IdEleve'];
            $_SESSION['type']="Eleve";

            $this->render("EleveView" ,['eleve'=>$eleve]);
        }
    }

    public function EDT(){
        // recupérer l'EDT et l'envoyer vers le view EDT
        $this->render("EDT" );
    }

    public function InfoPerson($id){

        $this->loadModel("Eleves");
        $eleve = $this->Eleves->getOne($id);
        if(isset($_POST['profil']) || isset($_SESSION['pass'])){
            $_SESSION['type']="Parent";
            $_SESSION['idV2']=$eleve['IdEleve'];
            $_SESSION['pass']= 1;
        }elseif(!isset($_SESSION['pass'])){
            $_SESSION['id'] = $eleve['IdEleve'];
            $_SESSION['type']="Eleve";
        }

        $this->render("InfoPerson" , ['eleve'=>$eleve]);

    }

    public function Note($id){
        $this->loadModel("Eleves");
        $eleve = $this->Eleves->getOne($id);
        if(isset($_POST['profil']) || isset($_SESSION['pass'])){
            $_SESSION['type']="Parent";
            $_SESSION['idV2']=$eleve['IdEleve'];
            $_SESSION['pass']= 1;
        }elseif(!isset($_SESSION['pass'])){
            $_SESSION['id'] = $eleve['IdEleve'];
            $_SESSION['type']="Eleve";
        }

        $this->loadModel("Note");
        $this->loadModel("Enseignant");
        $notes =$this->Note->getNoteEleve($id);
        $i = 1;
        $ens =[];
        foreach($notes as $note):
            $ens[$i] = $this->Enseignant->getOne($note['IdEns'])['Nom']." ".$this->Enseignant->getOne($note['IdEns'])['Prenom'];
            $i++;
        endforeach;
        $this->render("Note" , ['notes'=>$notes ,'ens'=>$ens ,'eleve'=>$eleve]);
    }

    public function Activities($id){
        $this->loadModel("Eleves");
        $eleve = $this->Eleves->getOne($id);
        if(isset($_POST['profil']) || isset($_SESSION['pass'])){
            $_SESSION['type']="Parent";
            $_SESSION['idV2']=$eleve['IdEleve'];
            $_SESSION['pass']= 1;
        }elseif(!isset($_SESSION['pass'])){
            $_SESSION['id'] = $eleve['IdEleve'];
            $_SESSION['type']="Eleve";
        }

        $this->loadModel("Activity");
        $activities = $this->Activity->getActivityEleve($id);
        $this->render("Activity" , ['activities'=>$activities,'eleve'=>$eleve]);
    }




    
}