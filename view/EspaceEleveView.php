<?php
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
        
    if(!isset($_SESSION['id']))
    { 
          session_unset();
          session_destroy();
    }
    elseif(isset($_SESSION['type'])&&($_SESSION['type']==="Eleve"))
    {
        header("location:Eleve");
    }else{

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./public/css/template.css"  type="text/css" />
        <link rel="stylesheet" href="./public/css/espaceEleve.css"  type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <title>Espace éleve</title>


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
    <center><h2>Espace éleve</h2></center>
    <br>
    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
           Login Eleve
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
        <form action="Eleve" method="POST">         
                <label><b>Nom d'utilisateur : </b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                <label><b>Mot de passe : </b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="pwd" required>
                <input type="submit" id='submit' value='LOGIN' >
            </form>
        </div>
    </div>
    <section class="content">
    <div class="row row-cols-1 row-cols-md-4 g-4">
    <?php 
        $i= 1;
        foreach($articlePre as $article): 
        if($i > 2){ break;}
        $i++
    ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?=$article['Image']?>"  height="200px" class="card-img-top" alt="<?= $article["Title"]?>">
                    <div class="card-body">
                     <h5 class="card-title"><?= $article["Title"]?></h5>
                     <p class="card-text"><?= substr($article["Description"],0,60)?> ...</p>
                     <a href='acueil/article/<?=$article['IdArticle']?>'>Afficher la suite</a>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>
            
    <?php 
        $i= 1;
        foreach($articleMoy as $article): 
        if($i > 3){ break;}
        $i++
    ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?=$article['Image']?>"  height="200px" class="card-img-top" alt="<?= $article["Title"]?>">
                    <div class="card-body">
                     <h5 class="card-title"><?= $article["Title"]?></h5>
                     <p class="card-text"><?= substr($article["Description"],0,60)?> ...</p>
                     <a href='acueil/article/<?=$article['IdArticle']?>'>Afficher la suite</a>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>
            
    <?php 
        $i= 1;
        foreach($articleSec as $article): 
        if($i > 3){ break;}
        $i++
    ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?=$article['Image']?>"  height="200px" class="card-img-top" alt="<?= $article["Title"]?>">
                    <div class="card-body">
                     <h5 class="card-title"><?= $article["Title"]?></h5>
                     <p class="card-text"><?= substr($article["Description"],0,60)?> ...</p>
                     <a href='acueil/article/<?=$article['IdArticle']?>'>Afficher la suite</a>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>


        

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