
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../public/css/template.css"  type="text/css" />
        <link rel="stylesheet" href="../../public/css/acueil.css"  type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Page d'accueil</title>
    </head>
    
    <section class="topBar">
        <img src="../../public/assets/logo.jpg" alt="logo" width="120px" height="70px">
        <div>
            <br>
           <img src="../../public/assets/fcb.png" alt="logofcb" width="30px" height="30px">
           <img src="../../public/assets/insta.png" alt="logoinsta" width="30px" height="30px">
           <img src="../../public/assets/linkedin.png" alt="logolinkedin" width="30px" height="30px">
           <img src="../../public/assets/tweet.png" alt="logoyweet" width="30px" height="30px">
        </div>   
    </section>
    <section class="Diapo">
        <div class="diaporama">
            <div class="slides">
                <?php foreach($images as $image) :?>
                    <div class="slide">
                        <img src="../../<?=$image['Path']?>" alt="photo de l'école">
                    </div>
                <?php endforeach;?>
            </div>
        </div>
       
      
    </section>
    <section class="menu">
        <nav>
            <ul>
                <li><a href="./">Acueil</a></li>
                <li><a href="../../Presentation">Présenation de l'école</a></li>

                <li class="deroulant"><a>Présenation des cycles</a>
                    <ul class="sous">
                        <li><a href="../../CyclePre">Cycle primaire</a></li>
                        <li><a href="../../CycleMoy">Cycle moyen</a></li>
                        <li><a href="../../CycleSec">Cycle secondaire</a></li>
                    </ul>
                </li>
                <li><a href="../../EspaceEleve">Espace éléve</a></li>
                <li><a href="../../EspaceParent">Espace parent</a></li>
                <li><a href="../../contact">Contact</a></li>

            </ul>
        </nav>
     
    </section>
    <section class="content">
     
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php foreach($articles as $article): ?>
            <div class="col">
                <div class="card h-100">
                    <img src="../../<?=$article['Image']?>"  height="200px" class="card-img-top" alt="<?= $article["Title"]?>">
                    <div class="card-body">
                     <h5 class="card-title"><?= $article["Title"]?></h5>
                     <p class="card-text"><?= substr($article["Description"],0,60)?> ...</p>
                     <a href='../../acueil/article/<?=$article['IdArticle']?>'>Afficher la suite</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>                   
    </section>
    <nav aria-label="Page navigation example" style="display:flex;justify-content:flex-end;">
                        <ul class="pagination" style="width: 25%;">
                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : ""?>">
                            <a class="page-link" href="<?=$currentPage - 1?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            <?php for($page = 1; $page <= $nbPage; $page ++): ?>
                                <li class="page-item <?= ($currentPage ==$page) ? "active" : ""?>">
                                    <a class="page-link" href="<?=$page?>"><?=$page?></a>
                                </li>
                            <?php endfor?>
                            <li class="page-item  <?= ($currentPage == $nbPage) ? "disabled" : ""?>">
                            <a class="page-link" href="<?=$currentPage + 1?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>
                    </ul>
    </nav>
    <section class="footer">
            <nav class="footer">
                <ul>
                    <li><a href="../../">Acueil</a></li>
                    <li><a href="../../Presenation">Présenation de l'école</a></li>

                    <li class="deroulant"><a>Présenation des cycles</a>
                        <ul class="sous">
                            <li><a href="../../CyclePre">Cycle primaire</a></li>
                            <li><a href="../../CycleMoy">Cycle moyen</a></li>
                            <li><a href="../../CycleSec">Cycle secondaire</a></li>
                        </ul>
                    </li>
                    <li><a href="../../EspaceEleve">Espace éléve</a></li>
                    <li><a href="../../EspaceParent">Espace parent</a></li>
                    <li><a href="../../contact">Contact</a></li>

                </ul>
            </nav>           
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright: ha_doumi@esi.dz   
            </div>
    </section>

</html>