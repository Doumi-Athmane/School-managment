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
        <link rel="stylesheet" href="./public/css/gestionExtra.css"  type="text/css" />
        <title>Paramètres</title>
</head>
    <section class="topBar">
        <img src="./public/assets/logo.jpg" alt="logo" width="120px" height="70px">
        <h1>Paramètres </h1>
        <form method="POST" style="border: none;">
            <input type="submit" value="Déconnexion" name="dcnx">
        </form>
    </section>
        
        <section class="content">
        <div class="row">
                <center><h2>Images de diaporama :</h2></center>
                <div class="diaporama">
                    <form action="GestionExtra" method="POST" enctype="multipart/form-data">
                        <center><h3>Ajouter image :</h3></center>
                        <div>
                            <label>Image : </label>
                            <input type="file" id="image" name="image" required>
                        </div>
                        <input type="submit" id="ajouter" value="Ajouter image" name="ajouterImage" style="width:50%;margin:10px">
                    </form>
                    <form action="GestionExtra" method="POST">
                        <center><h3>Selectionner les images :</h3></center>
                        <select title="Selectionner l'image 1 your surfboard" class="selectpicker" name="image1" required>
                            <option value="NULL">Select image 1</option>
                            <?php foreach($images as $image): ?>
                                        <option value=<?=$image['IdImage']?>><?=$image['IdImage']?></option>
                            <?php endforeach; ?>
                        </select>
                        <select title="Selectionner l'image 1 your surfboard" class="selectpicker" name="image2" required>
                            <option value="NULL">Select image 2</option>
                            <?php foreach($images as $image): ?>
                                        <option value=<?=$image['IdImage']?>><?=$image['IdImage']?></option>
                            <?php endforeach; ?>
                        </select>
                        <select title="Selectionner l'image 1 your surfboard" class="selectpicker" name="image3" required>
                            <option value="NULL">Select image 3</option>
                            <?php foreach($images as $image): ?>
                                        <option value=<?=$image['IdImage']?>><?=$image['IdImage']?></option>
                            <?php endforeach; ?>
                        </select>
                        <select title="Selectionner l'image 1 your surfboard" class="selectpicker" name="image4" required>
                            <option value="NULL">Select image 4</option>
                            <?php foreach($images as $image): ?>
                                        <option value=<?=$image['IdImage']?>><?=$image['IdImage']?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" id="ajouter" value="Valider" name="valider" style="width:50%;margin:10px">
                    </form>
                    <div class="img" >
                         <?php foreach($images as $image): ?>
                            <div style="margin: 2px;border:1px solid black;">
                                        <p>Id : <?=$image['IdImage']?></p>
                                        <img src="./<?=$image['Path']?>" width="120px" height="120px"></img>
                            </div>
                            <?php endforeach; ?>
                    </div>
                   
                </div>
           
            </div>
            <div class="row">
                <center><h2>Creér une class : </h2></center>
                <form action="GestionExtra" method="POST">
                    <div class="element">
                        <label>Selectionner le cycle : </label>
                        <select name="cycle" required>
                            <option value="1">Premair</option>
                            <option value="2">Moyen</option>
                            <option value="3">Secondaire</option>
                        </select>
                    </div>
                    <div class="element">
                        <label>Selectionner l'année : </label>
                        <select name="level" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="element">
                        <label>Entréer le numéro de la classe : </label>
                        <input type="number" name="class" required>
                    </div>
                    <div class="element">
                        <input type="submit" value="ajouter" name="ajouterClass">
                    </div>
                </form>
            </div>
            <div class="row">
                 <center><h2>Ajouter une activitie</h2></center>
                 <form action="GestionExtra" method="POST">
                    <div class="element">
                        <label>Nom :</label>
                        <input type="text" name="nom" required>
                    </div>
                    <div class="element">
                        <label>Description :</label>
                        <textarea type="text" name="desc" required></textarea>
                    </div>
                    <div class="element">
                        <label>Type :</label>
                        <input type="text" name="type" required>
                    </div>
                    <div class="element">
                        <input type="submit" value="ajouter" name="ajouterActivitie">
                    </div>
                </form>
            </div>
            
        </section>