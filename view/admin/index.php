<?php
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(isset($_POST['dcnx']) || !isset($_SESSION['username']))
    { 
          header("location:Admin");
    }
   else{
        $user = $_SESSION['username'];
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./public/css/admin.css"  type="text/css" />
        <title>Admin Panel</title>

    </head>
    <section class="topBar">
        <img src="./public/assets/logo.jpg" alt="logo" width="120px" height="70px">
        <h1>Partie Admin</h1>
        <form method="POST" style="border: none;">
            <input type="submit" value="Déconnexion" name="dcnx" style="cursor: pointer;">
        </form>
        
        
    </section>

    <section class="content">
           
            <div class="row"> 
                <div class="cards">
                    <a href="GestionArticle">
                    
                    <center>
                        <h2>Gestion des articles</h2>
                        <img src="./public/assets/article.jpg">
                        
                    </center>
                    </a>
                </div>
                <div class="cards">
                     <a href="GestionPresentation">

                      <center>
                        <h2>Gestion de la présentation</h2>
                        <img src="./public/assets/presentation.jpg">

                    </center>
                    </a>
                </div>
                <div class="cards">
                    <a href="GestionEDT">

                   <center>
                        <h2>Gestion des emplois du temps</h2>
                        <img src="./public/assets/edt.png">

                    </center>
                    </a>
                </div>
                <div class="cards">
                 <a href="GestionEns">

                     <center>
                        <h2>Gestion des enseignants</h2>
                        <img src="./public/assets/ens.png">

                    </center>
                    </a>
                </div>
            </div> 
            <div class="row">
                <div class="cards">
                 <a href="GestionUtilisateur">

                    <center>
                        <h2>Gestion des utilisateurs</h2>
                        <img src="./public/assets/use.png">

                    </center>
                    </a>
                </div>
                <div class="cards">
                 <a href="GestionRestauration">

                  <center>
                        <h2>Gestion de la restauration</h2>
                        <img src="./public/assets/resto.png">

                    </center>
                    </a>
                </div>
                <div class="cards">
                 <a href="GestionContact">

                    <center>
                        <h2>Gestion de page contact</h2>
                        <img src="./public/assets/contact.png">

                    </center>
                    </a>
                </div>
                <div class="cards">
                    <a href="GestionExtra">

                     <center>
                        <h2>Paramètres</h2>
                        <img src="./public/assets/param.png" width="200px" height="200px">

                    </center>
                    </a>
                </div>
            </div>
            

    </section>


</html>