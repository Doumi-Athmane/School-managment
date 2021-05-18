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
                                <link rel="stylesheet" href="./public/css/gestionEns.css"  type="text/css" />
                                <title>Gestion des enseignants</title>
                        </head>
                        <section class="topBar">
                                <img src="./public/assets/logo.jpg" alt="logo" width="120px" height="70px">
                                <h1>Gestion des enseignants </h1>
                                <form method="POST" style="border: none;">
                                    <input type="submit" value="Déconnexion" name="dcnx">
                                </form>
                        </section>
                                
                        <section class="content">
                                        <div class="listEns">
                                           <?php foreach($ens as $enS): ?>
                                              <?php  $classes = $this->afficherClassEns($enS['IdEns']);?>

                                                        <div class="contact">
                                                        <header>
                                                        <center><h2><?php echo $enS["Nom"]." ".$enS["Prenom"]?></h2></center>
                                                        </header>
                                                        <h3>Heure de reception : <?=$enS['JourRecep'].' '.$enS['HeurResp']?></h3>
                                                        <?php foreach($classes as $classe):?>
                                                        <div class="element">
                                                                <p><b>Classe : </b> <?= $classe["IdClass"]?>&emsp;<b>Année : </b> <?= $classe["IdLevel"]?>&emsp;<b>Cycle : </b> <?= $classe["IdCycle"]?>&emsp;<b>Module : </b> <?= $classe["Module"]?>&emsp;<b>Nombre heures : </b> <?= $classe["HeureTravail"]?>h</p>
                                                                
                                                                <form action="GestionEns" method="POST">
                                                                        <input type="submit" id="supprimer" value="supprimer" name="supprimer">
                                                                        <input type="hidden" name="id" value="<?php echo "".$classe["IdEnseigner"]."" ?>">
                                                                </form>
                                                        </div>   
                                                        <?php endforeach; ?>
                                                        </div>
                                                <?php endforeach; ?>
                                        </div>
                                        <section class="ajouterEns" >
                                        <center><h2>Ajouter un enseignant à une classe</h2> </center>
                                        <br><br>
                                        <form action="GestionEns" method="POST">
                                                
                                                <br>
                                                <div class="element1">
                                                <label>La liste des enseignants :  </label>
                                                <select name="idEns" required>
                                                <?php foreach($ens as $enS): ?>
                                                        <option value=<?=$enS['IdEns']?>>- <?php echo $enS['Nom']." ".$enS['Prenom'] ;?></option>
                                                <?php endforeach; ?>
                                                </select>
                                                </div>
                                                <br><br>
                                                <div class="element1">
                                                <label>Choisi la classe :  </label>
                                                <select name="idClass" required>
                                                <?php foreach($class as $classe1): ?>
                                                        <option value=<?php echo $classe1['IdClass'],$classe1['IdLevel'],$classe1['IdCycle']?>>-<?php echo "Classe : ".$classe1['IdClass']."
                                                        _ Level : ".$classe1['IdLevel']."_ Cycle : ".$classe1['IdCycle'];?></option>
                                                <?php endforeach ; ?>
                                                </select>
                                                </div>
                                                <br><br>
                                                
                                                <div class="element1">
                                                <br><br>
                                                <label>Module : </label>
                                                <input type="text" id="module" name="module" required>
                                                </div>
                                                <br><br>
                                                <div class="element1">
                                                <label>Nombre d'heure : </label>
                                                <input type="number" id="hour" name="hour" required>
                                                </div>
                                                <br><br>
                                                <input type="submit" id="ajouter" value="ajouter" name="ajouter">
                                        </form>
                                        <center><h2>Heure de reception</h2> </center>
                                        <form action="GestionEns" method="POST">
                                        <br>
                                                <div class="element1">
                                                <label>La liste des enseignants :  </label>
                                                <select name="idEns" required>
                                                <?php foreach($ens as $enS): ?>
                                                        <option value=<?=$enS['IdEns']?>>- <?php echo $enS['Nom']." ".$enS['Prenom'] ;?></option>
                                                <?php endforeach; ?>
                                                </select>
                                                </div>
                                                <br><br>
                                                <div class="element1">
                                                <label>Jour de reception : </label>
                                                <select name="jour" required>
                                                        <option value="Samedi">Samedi</option>
                                                        <option value="Dimanche">Dimanche</option>
                                                        <option value="Lundi">Lundi</option>
                                                        <option value="Mardi">Mardi</option>
                                                        <option value="Mercredi">Mercredi</option>
                                                        <option value="Jeudi">Jeudi</option>
                                                </select>
                                                </div>
                                                <br><br>
                                                <div class="element1">
                                                <label>Heure de reception : </label>
                                                <select name="hour" required>
                                                        <option value="8h-10h">8h-10h</option>
                                                        <option value="9h-11h">9h-11h</option>
                                                        <option value="10h-12h">10h-12h</option>
                                                        <option value="11h-13h">11h-13h</option>
                                                        <option value="12h-14h">12h-14h</option>
                                                        <option value="13h-15h">13h-15h</option>
                                                        <option value="14h-16h">14h-16h</option>
                                                        <option value="15h-17h">15h-17h</option>
                                                </select>
                                                </div>
                                                <br>
                                                <input type="submit" id="ajouter" value="modifier heure de reception" name="ajouterRecep">
                                        </form>
                                        </section>
                                            
                        </section>
                
                
                 
                
                
                