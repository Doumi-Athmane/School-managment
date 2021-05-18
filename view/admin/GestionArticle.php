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

<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./public/css/gestionArticle.css"  type="text/css" />
        <title>Gestion des articles</title>
    </head>
    <section class="topBar">
        <img src="./public/assets/logo.jpg" alt="logo" width="120px" height="70px">
        <h1>Gestion des articles </h1>
        <form method="POST" style="border: none;">
            <input type="submit" value="Déconnexion" name="dcnx">
        </form>
    </section>
    
        <section class="content">
                <section class="fonct">
                <center><h2>Ajouter / Modifier un article</h2></center>
                <br><br>
                        <form action="GestionArticle" method="POST" enctype="multipart/form-data">
                                <div class="element">
                                <label>Titre de l'article : </label>
                                <input type="text" id="TitreArticle" name="titre" required>
                                </div>
                                <br><br>
                                <div class="element">
                                <label>Image : </label>
                                <input type="file" id="image" name="image" required>
                                </div>
                                <br><br>
                                <div class="element">
                                <label>Description : </label>
                                <textarea type="text" id="description" name="description" required></textarea>
                                </div>
                                <br><br>
                                <div class="element">
                                <label>Utilisateurs concernés : </label>
                                <select name="type" required>
                                <option value="Pre">Eleves de primaire</option>
                                <option value="Moy">Eleves de cem</option>
                                <option value="Sec">Eleves de lycée</option>
                                <option value="Ens">Enseignants</option>
                                <option value="Par">Parents</option>
                                <option value="Tous">Tous</option>
                                </select>
                                </div>
                                <br><br>
                                <div class="element">
                                <label>Seléctionner l'id de l'article (Si vous voulez modifier) :  </label>
                                <select name="idarticle" >      
                                        <option value= NULL >-----</option>
                                <?php foreach($articles as $article): ?>
                                        <option value=<?=$article['IdArticle']?>>- <?=$article['IdArticle']?></option>
                                <?php endforeach; ?>
                                </select>
                                <br><br>
                                </div>
                                <div class="element">
                                <input type="submit" id="ajouter" value="Ajouter/Modifier" name="ajouter">
                                </div>
                        </form>
                </section>
                <section class="lesarticles">
                <center><h2>Les articles</h2></center>
                <div class="afficher" >
                                <?php foreach($articles as $article): ?>
                                        <div class="element1">
                                                <div class="info">
                                                        <h1>L'identifiant de l'article : <b style="font-size: 18px;"><?= $article['IdArticle']?></b> </h1>
                                                        <p>Titre : <b style="font-size: 18px;"><?= $article['Title']?></b></p>
                                                        <p><b>Description : </b><?= $article['Description']?></p>
                                                </div>
                                                <div class="pic">
                                                        <img src="<?=$article['Image']?>" width="150px" height="150px">
                                                        <br>
                                                        <form action="GestionArticle" method="POST">
                                                        <input type="submit" id="supprimer" value="supprimer" name="supprimer">
                                                        <input type="hidden" name="id" value="<?php echo "".$article["IdArticle"]."" ?>"></input>
                                                </div>
                                             </form>
                                        </div>
                                <?php endforeach; ?>                          
               </div>
                </section>
        </section>

