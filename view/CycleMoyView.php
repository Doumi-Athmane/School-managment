<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./public/css/template.css"  type="text/css" />
        <link rel="stylesheet" href="./public/css/cycle.css"  type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Cycle moyen</title>


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
    <center><h2>Cycle moyen</h2></center>
    <section class="content">
    <div class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col">
                    <div class="card h-100">
                        <img src="./<?=$EDT['Image']?>"  height="200px" class="card-img-top" alt="<?= $EDT["Title"]?>">
                        <div class="card-body">
                        <h5 class="card-title"><?= $EDT["Title"]?></h5>
                        <p class="card-text"><?=$EDT["Description"]?></p>
                        <form action="EDT" method="POST" style="margin-top: 20px;">
                            <input type="submit" id="info" value="voir l'EDT" name="EDT">
                            <input type="hidden" name="id" value="Moy"></input>
                        </form>                        </div>
                    </div>
            </div>
            <div class="col">
                    <div class="card h-100">
                        <img src="./<?=$ListEns['Image']?>"  height="200px" class="card-img-top" alt="<?= $ListEns["Title"]?>">
                        <div class="card-body">
                        <h5 class="card-title"><?= $ListEns["Title"]?></h5>
                        <p class="card-text"><?=$ListEns["Description"]?></p>
                        <form action="ListEns" method="POST" style="margin-top: 20px;">
                            <input type="submit" id="info" value="voir la liste" name="list">
                            <input type="hidden" name="id" value="1"></input>
                        </form>                       
                     </div>
                    </div>
            </div>
            <div class="col">
                    <div class="card h-100">
                        <img src="./<?=$InfoPra['Image']?>"  height="200px" class="card-img-top" alt="<?= $InfoPra["Title"]?>">
                        <div class="card-body">
                        <h5 class="card-title"><?= $InfoPra["Title"]?></h5>
                        <p class="card-text"><?=$InfoPra["Description"]?></p>
                        <form action="InfoPra" method="POST" style="margin-top: 20px;">
                            <input type="submit" id="info" value="voir les informations" name="infoPra">
                            <input type="hidden" name="id" value="Moy"></input>
                        </form>                       
                     </div>
                    </div>
            </div>
            <div class="col">
                    <div class="card h-100">
                        <img src="./<?=$InfoRes['Image']?>"  height="200px" class="card-img-top" alt="<?= $InfoRes["Title"]?>">
                        <div class="card-body">
                        <h5 class="card-title"><?= $InfoRes["Title"]?></h5>
                        <p class="card-text"><?=$InfoRes["Description"]?></p>
                        <form action="InfoResto" method="POST" style="margin-top: 20px;">
                            <input type="submit" id="info" value="voir les informations" name="infoResto">
                            <input type="hidden" name="id" value="Moy"></input>
                        </form>
                        </div>
                    </div>
            </div>
                
            <?php foreach($articles as $article): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="./<?=$article['Image']?>"  height="200px" class="card-img-top" alt="<?= $article["Title"]?>">
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