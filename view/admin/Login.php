<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="././public/css/login.css"  type="text/css" />
    </head>
    <body>
        <div id="container">
           
            
            <form action="admin" method="POST">
                <h1><center>Login Administrateur</center></h1>
                <br>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="pwd" required>

                <input type="submit" id='submit' value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Nom d'utilisateur ou mot de passe incorrect</p>";  
                }
                ?>
            </form>
        </div>
    </body>
</html>