<?php
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION['id']) || ($_SESSION['type']!="Eleve")&&!isset($_SESSION['pass']))
    { 
          header("location:EspaceEleve");
    }
   else{
        $id = $_SESSION['id'];
    }
    if(isset($_SESSION['pass'])){
        $id = $_SESSION['idV2'];
    }
    if(isset($_POST['dcnx'])){
        session_unset();
        session_destroy();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="./public/css/template.css"  type="text/css" />
        <link rel="stylesheet" href="./public/css/eleve.css"  type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Eleve</title>
    </head>
    
    <section class="topBar">
         <img src="./public/assets/logo.jpg" alt="logo" width="120px" height="70px">
        <div>
            <br>
           <img src="./public/assets/fcb.png" alt="logofcb" width="30px" height="30px">
           <img src="./public/assets/insta.png" alt="logoinsta" width="30px" height="30px">
           <img src="./public/assets/linkedin.png" alt="logolinkedin" width="30px" height="30px">
           <img src="./public/assets/tweet.png" alt="logoyweet" width="30px" height="30px">
        </div>
        <form method="POST" style="border: none;">
            <input type="submit" value="Déconnexion" name="dcnx" style="cursor: pointer;">
    </form>
    </section>
    <section class="menu">
        <nav>
            <ul>
                <li><a href="./">Acueil</a></li>
                <li><a href="Presentation">Présenation de l'école</a></li>

                <li class="deroulant"><a>Présenation des cycles</a>
                    <ul class="sous">
                        <li><a href="CyclePre">Cycle primaire</a></li>
                        <li><a href="CycleMoy">Cycle moyen</a></li>
                        <li><a href="CycleSec">Cycle secondaire</a></li>
                    </ul>
                </li>
                <li><a href="EspaceEleve">Espace éléve</a></li>
                <li><a href="EspaceParent">Espace parent</a></li>
                <li><a href="contact">Contact</a></li>

            </ul>
        </nav>
    </section>
    <br>
    <center><h2><?=$eleve['Nom'].' '.$eleve['Prenom']?></h2></center>

    <section class="content">
     <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-40">
                    <div class="card-body">
                    <center><h5 class="card-title">Informations personnelles</h5></center>
                     <img src="./public/assets/info_perso.jpg"  height="200px" class="card-img-top" alt="info">
                     <center>
                     <form action="Eleve" method="POST" style="margin-top: 20px;">
                        <input type="submit" id="info" value="voir les informations" name="info">
                        <input type="hidden" name="id" value="<?=$id?>"></input>
                    </form>
                     </center>
                      
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-40">
                    <div class="card-body">
                    <center><h5 class="card-title">Emploi du temps</h5></center>
                     <img src="./public/assets/edt.png"  height="200px" class="card-img-top" alt="info">
                     <center>
                     <form action="Eleve" method="POST" style="margin-top: 20px;">
                        <input type="submit" id="info" value="voir EDT" name="edt">
                        <input type="hidden" name="id" value="<?=$id?>"></input>
                    </form>
                     </center>
                      
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-40">
                    <div class="card-body">
                    <center><h5 class="card-title ">Notes</h5></center>
                     <img src="./public/assets/note.jpg"  height="200px" class="card-img-top" alt="info">
                     <center>
                     <form action="Eleve" method="POST" style="margin-top: 20px;">
                     <input type="submit" id="note" value="voir les notes" name="note">
                        <input type="hidden" name="id" value="<?=$id?>"></input>
                    </form>
                     </center>
                      
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-40">
                    <div class="card-body">
                    <center><h5 class="card-title ">Activités extrascolaires</h5></center>
                     <img src="./public/assets/activity.png"  height="200px" class="card-img-top" alt="info">
                     <center>
                     <form action="Eleve" method="POST" style="margin-top: 20px;">
                     <input type="submit" id="activity" value="voir les activities" name="activity">
                        <input type="hidden" name="id" value="<?=$id?>"></input>
                    </form>
                     </center>
                      
                    </div>
                </div>
            </div>
    </section>
    <section class="footer">
         <nav class="footer">
            <ul>
                <li><a href="./">Acueil</a></li>
                <li><a href="Presenation">Présenation de l'école</a></li>

                <li class="deroulant"><a>Présenation des cycles</a>
                    <ul class="sous">
                        <li><a href="CyclePre">Cycle primaire</a></li>
                        <li><a href="CycleMoy">Cycle moyen</a></li>
                        <li><a href="CycleSec">Cycle secondaire</a></li>
                    </ul>
                </li>
                <li><a href="EspaceEleve">Espace éléve</a></li>
                <li><a href="EspaceParent">Espace parent</a></li>
                <li><a href="contact">Contact</a></li>

            </ul>
        </nav>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright: ha_doumi@esi.dz   
        </div>
    </section>

</html>