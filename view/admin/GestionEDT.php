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
        <link rel="stylesheet" href="./public/css/gestionEDT.css"  type="text/css" />

    </head>
    <section class="topBar">
        <h2> logo</h2>
        <h1>Gestion EDT </h1>
        <form method="POST" style="border: none;">
            <input type="submit" value="Déconnexion" name="dcnx">
        </form>
    </section>
    <section class="content">
<form action="GestionEDT" method="POST">
                <h2>Ajouter une séance</h2>
                <label>Heure de début : </label>
                <select name="SHour" required>
                            <option value="8">8h</option>
                            <option value="9">9h</option>
                            <option value="10">10h</option>
                            <option value="11">11h</option>
                            <option>------------</option>
                            <option value="13">13h</option>
                            <option value="14">14h</option>
                            <option value="15">15h</option>
                            <option value="16">16h</option>
                        </select>
                <br><br>
                <label>Heure de fin : </label>
                <select name="EHour" required>
                            <option value="9">9h</option>
                            <option value="10">10h</option>
                            <option value="11">11h</option>
                            <option value="12">12h</option>
                            <option>------------</option>
                            <option value="14">14h</option>
                            <option value="15">15h</option>
                            <option value="16">16h</option>
                            <option value="17">17h</option>
                        </select>
                <br><br>
                <label>Salle : </label>
                <input type="text" id="Salle" name="Salle" required>
                <br><br>
                <label>Enseignant : </label>
                <select name="IdEns" required>
                        <?php foreach($ens as $enS): ?>
                                <option value=<?=$enS['IdEns']?>>- <?php echo $enS['Nom']." ".$enS['Prenom'] ;?></option>
                        <?php endforeach; ?>
                </select>
                <br><br>
                <label>Module : </label>
                <input type="text" id="Module" name="Module" required>
                <br><br>
                <div class="element">
                        <label>Selectionner le cycle : </label>
                        <select name="IdCycle" required>
                            <option value="1">Premair</option>
                            <option value="2">Moyen</option>
                            <option value="3">Secondaire</option>
                        </select>
                </div>
                <br><br>
                <div class="element">
                        <label>Selectionner l'année : </label>
                        <select name="IdLevel" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                </div>
                <br><br>
                <div class="element">
                        <label>Entréer le numéro de la classe : </label>
                        <input type="number" name="IdClass" required>
                </div>
                <br><br>
                <input type="submit" id="ajouter" value="ajouter" name="ajouter">
        </form>
        </section>