
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./public/css/template.css"  type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="./public/css/InfoPerson.css"  type="text/css" />
        <title>Information Pratiques</title>

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
    <center><h2>Les informations pratiques</h2></center>

    <section class="content">
        <?php foreach($infos as $info):?>
            <p><?=$info['Information']?></p>
        <?php endforeach?>
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
