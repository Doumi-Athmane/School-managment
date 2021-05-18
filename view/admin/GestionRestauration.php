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
        <link rel="stylesheet" href="./public/css/gestionRestauration.css"  type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Gestion du la restauration </title>

</head>
<section class="topBar">
        <img src="./public/assets/logo.jpg" alt="logo" width="120px" height="70px">
        <h2>Gestion du la restauration </h2>
        <form method="POST" style="border: none;">
            <input type="submit" value="Déconnexion" name="dcnx">
        </form>
</section>
        
<section class="content">
                <div class="espace">
                        <table class="table table-striped">
                                <thead>
                                        <tr>
                                                <th scope="col">Repas</th>
                                                <th scope="col">Jour</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php foreach($repass as $repas): ?>
                                        <tr>
                                                <td><?= $repas['NomRepas']?></td>
                                                <td><?= $repas['Jour']?></td>
                                                <td id="supp">
                                                        <form action="GestionRestauration" method="POST">
                                                        <input type="submit" value="supprimer" name="supprimer">
                                                        <input type="hidden" name="id" value="<?php echo "".$repas['IdRepas']."" ?>"></input>
                                                        </form>
                                                </td>
                                        </tr>
                                        <?php endforeach; ?>
                                </tbody>
                        </table>        
                </div>
                <section class="fonct" >
                <center><h3>Ajouter un repas</h3> </center>
                <br><br>
                        <form action="GestionRestauration" method="POST">
                        <br>
                        <label>Nom de repas : </label>
                        <input type="text" id="nom" name="nom" required>
                        <br><br>
                        
                        <label>Jour : </label>
                       <select name="jour" required>
                               <option value="Dimanche">-Dimnache</option>
                               <option value="Lundi">-Lundi</option>
                               <option value="Mardi">-Mardi</option>
                               <option value="Mercredi">-Mercredi</option>
                               <option value="Jeudi">-Jeudi</option>

                       </select>
                        <br><br>
                        <input type="submit" id="ajouter" value="ajouter" name="ajouter">
                </form>
             
                </section>
                        
</section>


 


