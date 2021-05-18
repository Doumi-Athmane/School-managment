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
        <link rel="stylesheet" href="./public/css/gestionContact.css"  type="text/css" />
        <title>Gestion des contacts </title>

</head>
<section class="topBar">
        <img src="./public/assets/logo.jpg" alt="logo" width="120px" height="70px">
        <h1>Gestion des contacts </h1>
        <form method="POST" style="border: none;">
            <input type="submit" value="Déconnexion" name="dcnx">
        </form>
</section>
        
<section class="content">
                <div class="fonct1">
                                <?php foreach($contact as $contactt): ?>
                                
                                <div class="contact">
                               
                                <header>
                                <h2>Email : <?= $contactt["Email"]?></h2>
                                </header>    
                                <div class="element">
                                        <p><b>Numéro de téléphone 1 : </b> <?= $contactt["Phone"]?></p>

                                        <form action="GestionContact" method="POST">
                                                <input type="submit" id="supprimer" value="supprimer" name="supprimer">
                                                <input type="hidden" name="id" value="<?php echo "".$contactt["IdContact"]."" ?>"></input>
                                        </form>
                                </div>     
                                <div class="element">
                                        <p><b>Numéro de téléphone 2 : </b> <?= $contactt["Phone2"]?></p>
                                </div>
                                </div>
                        <?php endforeach; ?>
                </div>
                <section class="fonct" >
                <center><h2>Ajouter contact</h2> </center>
                <br><br>
                <form action="GestionContact" method="POST">
                        
                        <br>
                        <label>Email : </label>
                        <input type="text" id="email" name="email">
                        <br><br>
                        
                        <label>Numéro de telephone 1 : </label>
                        <input type="text" id="phone" name="phone">
                        <br><br>
                        <label>Numéro de telephone 2 : </label>
                        <input type="text" id="phone2" name="phone2">
                        <br><br>
                        <input type="submit" id="ajouter" value="ajouter" name="ajouter">
                 </form>
                </section>
                       
</section>


 


