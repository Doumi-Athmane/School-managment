<?php
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(isset($_POST['dcnx']) || !isset($_SESSION['username']))
    { 
          session_unset();
          session_destroy();
          header("location:Admin");
          exit();
    }
   else{
        $user = $_SESSION['username'];
    }
?>
 <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./public/css/gestionPresentation.css"  type="text/css" />
        <title>Gestion des présentations</title>
    </head>
    <section class="topBar">
        <img src="./public/assets/logo.jpg" alt="logo" width="120px" height="70px">
        <h1>Gestion des présentations </h1>
        <form method="POST" style="border: none;">
            <input type="submit" value="Déconnexion" name="dcnx">
        </form>
    </section>
        
        <section class="content">
                
                <section class="ajouter" >
                <center><h2>Ajouter/Modifier un paragraphe</h2></center>
               
                        <form action="GestionPresentation" method="POST" enctype="multipart/form-data">
                        <br>
                        <label>Paragraphe : </label>
                        <textarea type="text" id="paragraph" name="paragraph"></textarea>
                        <br><br>
                        
                        <label>Image : </label>
                        <input type="file" id="image" name="image">
                        <br><br>
                        <label>Seléctionner l'id de présentation (Si vous voulez modifier) :  </label>
                                <select name="idparagr" >
                                        <option value= NULL >--------------------------</option>
                                <?php foreach($paragraphs as $parag): ?>
                                        <option value=<?=$parag['IdPresentation']?>>- <?=$parag['IdPresentation']?></option>
                                <?php endforeach; ?>
                                </select>
                                <br><br>
                        <input type="submit" id="ajouter" value="ajouter/modifier" name="ajouter">
                         </form>
                </section>
                <section class="afficher" >
                <center><h2>Les paragraphes de la présentation</h2></center>                        
                                <?php foreach($paragraphs as $parag): ?>
                                        <div class="element">
                                                <div>
                                                        <h5>L'identifiant de la présentation : <b style="font-size: 18px;"><?= $parag['IdPresentation']?></b></h5>
                                                        <p><?= $parag['Paragraph']?></p>
                                                </div>
                                                <div>
                                                        <img src="<?=$parag['Image']?>" width="300px" height="200px">
                                                        <form action="GestionPresentation" method="POST">
                                                        <input type="submit" id="supprimer" value="supprimer" name="supprimer">
                                                        <input type="hidden" name="id" value="<?php echo "".$parag["IdPresentation"]."" ?>"></input>

                                                </form>
                                                </div>
                                        </div>
                                <?php endforeach; ?>
                          
                </section>
                
                
        </section>


 

