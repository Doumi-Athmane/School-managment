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
        <link rel="stylesheet" href="./public/css/gestionUtilisateur.css"  type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Gestion des utilisateurs </title>
</head>
<section class="topBar">
    <img src="./public/assets/logo.jpg" alt="logo" width="120px" height="70px">
        <h2>Gestion des utilisateurs </h2>
        <form method="POST" style="border: none;">
            <input type="submit" value="Déconnexion" name="dcnx">
        </form>
</section>
<section class="content">
    <section class="user">
        <div class="titreSection"><h3>Gestion des eleves</h3></div>
        <div class="contentUser">
            <div class="affichUser">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col ">#</th>
                            <th scope="col ">Nom</th>
                            <th scope="col ">Prénom</th>
                            <th scope="col ">Adresse</th>
                            <th scope="col ">Email</th>
                            <th scope="col ">Phone 1</th>
                            <th scope="col ">Phone 2</th>
                            <th scope="col ">Classe</th>
                            <th scope="col ">Année</th>
                            <th scope="col ">Cycle</th>
                        </tr>
                    </thead>
                    <tbody id="tableauForm">
                        <?php foreach($eleves as $eleve): ?>
                            <tr>
                             <td><?= $eleve['IdEleve']?></td>
                             <td><?= $eleve['Nom']?></td>
                             <td><?= $eleve['Prenom']?></td>
                             <td><?= $eleve['Adresse']?></td>
                             <td><?= $eleve['Email']?></td>
                             <td><?= $eleve['Phone1']?></td>
                             <td><?= $eleve['Phone2']?></td>
                             <td><?= $eleve['IdClass']?></td>
                             <td><?= $eleve['IdLevel']?></td>
                             <td><?= $eleve['IdCycle']?></td>
                             <td>
                                <form action="GestionUtilisateur" method="POST">
                                      <input type="submit" value="supprimer" name="supprimerEleve">
                                      <input type="hidden" name="idEleve" value="<?php echo "".$eleve["IdEleve"]."" ?>"></input>
                                </form>
                            </td>
                            </tr> 
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="ajouterUser">
                <center><h3>Ajouter / Modifier un compte éleve</h3></center>
                <br><br>
                     <form action="GestionUtilisateur" method="POST">
                                <div class="element">
                                <label>Id : </label>
                                <input type="number" id="id" name="id" size="5" maxlength="4" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Nom : </label>
                                <input type="text" id="nom" name="nom" size="13" required>
                                <label>Prénom : </label>
                                <input type="text" id="prenom" name="prenom" size="13" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Adresse : </label>
                                <input type="text" id="adresse" name="adresse" size="16" required>
                                <label>Email : </label>
                                <input type="text" id="email" name="email" size="13" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Phone1 : </label>
                                <input type="number" id="phone1" name="phone1" min="0"max="9999999999" required>
                                <label>Phone2 : </label>
                                <input type="number" id="phone2" name="phone2" min="0"max="9999999999" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Classe : </label>
                                <input type="number" id="class" name="class" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Année : </label>
                                <select name="level" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                </div>
                                <br>
                                <div class="element">
                                <label>Cycle : </label>
                                <select name="cycle" required>
                                    <option value="1">Premair</option>
                                    <option value="2">Moyen</option>
                                    <option value="3">Secondaire</option>
                                </select>
                                </div>
                                <br>
                                <div class="element">
                                <label>Login : </label>
                                <input type="text" id="login" name="login" size="13" required>
                                <label>Password : </label>
                                <input type="text" id="pwd" name="pwd" size="13" required>
                                </div>
                                <br>
                                <div class="element">
                                <input type="submit" id="ajouter" value="Ajouter/Modifier" name="ajouterEleve"> 
                                </div>
                    </form>
            </div>
        </div>
    </section>
    <section class="user">
    <div class="titreSection"><h3>Gestion des enseignants</h3></div>
            <div class="contentUser">
            <div class="affichUser">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col ">#</th>
                            <th scope="col ">Nom</th>
                            <th scope="col ">Prénom</th>
                            <th scope="col ">Adresse</th>
                            <th scope="col ">Email</th>
                            <th scope="col ">Phone 1</th>
                            <th scope="col ">Phone 2</th>
                        </tr>
                    </thead>
                    <tbody id="tableauForm">
                        <?php foreach($enss as $ens): ?>
                            <tr>
                             <td><?= $ens['IdEns']?></td>
                             <td><?= $ens['Nom']?></td>
                             <td><?= $ens['Prenom']?></td>
                             <td><?= $ens['Adresse']?></td>
                             <td><?= $ens['Email']?></td>
                             <td><?= $ens['Phone1']?></td>
                             <td><?= $ens['Phone2']?></td>
                             <td>
                                <form action="GestionUtilisateur" method="POST">
                                      <input type="submit" value="supprimer" name="supprimerEns">
                                      <input type="hidden" name="idEns" value="<?php echo "".$ens['IdEns']."" ?>"></input>
                                </form>
                            </td>
                            </tr> 
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="ajouterUser">
            <center><h3>Ajouter / Modifier un compte enseignant</h3></center>
                <br><br>
                     <form action="GestionUtilisateur" method="POST">
                                <div class="element">
                                <label>Id : </label>
                                <input type="number" id="id" name="id" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Nom : </label>
                                <input type="text" id="nom" name="nom" size="13"required>
                                <label>Prénom : </label>
                                <input type="text" id="prenom" name="prenom"size="13" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Adresse : </label>
                                <input type="text" id="adresse" name="adresse" size="16"required>
                                <label>Email : </label>
                                <input type="text" id="email" name="email" size="13"required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Phone1 : </label>
                                <input type="number" id="phone1" name="phone1" min="0" max="9999999999" required>
                                <label>Phone2 : </label>
                                <input type="number" id="phone2" name="phone2" min="0" max="9999999999" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Login : </label>
                                <input type="text" id="login" name="login" size="13"required>
                                <label>Password : </label>
                                <input type="text" id="pwd" name="pwd"size="13" required>
                                </div>
                                <br>
                                <div class="element">
                                <input type="submit" id="ajouter" value="Ajouter/Modifier" name="ajouterEns">
                                
                                </div>
                    </form>
            </div>
            </div>
        </div>
    </section>
    <section class="user">
    <div class="titreSection"><h3>Gestion des parents</h3></div>
            <div class="contentUser">
            <div class="affichUser">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col ">#</th>
                            <th scope="col ">Nom</th>
                            <th scope="col ">Prénom</th>
                            <th scope="col ">Adresse</th>
                            <th scope="col ">Email</th>
                            <th scope="col ">Phone 1</th>
                            <th scope="col ">Phone 2</th>
                        </tr>
                    </thead>
                    <tbody id="tableauForm">
                        <?php foreach($parents as $parent): ?>
                            <tr>
                             <td><?= $parent['IdParent']?></td>
                             <td><?= $parent['Nom']?></td>
                             <td><?= $parent['Prenom']?></td>
                             <td><?= $parent['Adresse']?></td>
                             <td><?= $parent['Email']?></td>
                             <td><?= $parent['Phone1']?></td>
                             <td><?= $parent['Phone2']?></td>
                             <td>
                                <form action="GestionUtilisateur" method="POST">
                                      <input type="submit" value="supprimer" name="supprimerParent">
                                      <input type="hidden" name="idParent" value="<?php echo "".$parent['IdParent']."" ?>"></input>
                                </form>
                            </td>
                            </tr> 
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="ajouterUser">
            <center><h3>Ajouter / Modifier un compte parent</h3></center>
                <br><br>
                     <form action="GestionUtilisateur" method="POST">
                                <div class="element">
                                <label>Id : </label>
                                <input type="number" id="id" name="id" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Nom : </label>
                                <input type="text" id="nom" name="nom"size="13" required>
                                <label>Prénom : </label>
                                <input type="text" id="prenom" name="prenom" size="13"required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Adresse : </label>
                                <input type="text" id="adresse" name="adresse"size="16" required>
                                <label>Email : </label>
                                <input type="text" id="email" name="email"size="13" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Phone1 : </label>
                                <input type="number" id="phone1" name="phone1" min="0" max="9999999999" required>
                                <label>Phone2 : </label>
                                <input type="number" id="phone2" name="phone2" min="0" max="9999999999" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Login : </label>
                                <input type="text" id="login" name="login"size="13" required>
                                <label>Password : </label>
                                <input type="text" id="pwd" name="pwd"size="13" required>
                                </div>
                                <br>
                                <div class="element">
                                <input type="submit" id="ajouter" value="Ajouter/Modifier" name="ajouterParent">
                                
                                </div>
                    </form>
                    <br><br>
                    <center><h3>Affecter éleves à leurs parent</h3></center>
                    <form action="GestionUtilisateur" method="POST">
                                <div class="element">
                                <label>Selectionner le parent : </label>
                                <select name="idParent" required>
                                <?php foreach($parents as $parent): ?>
                                        <option value=<?=$parent['IdParent']?>>- <?php echo $parent['Nom']." ".$parent['Prenom'];?></option>
                                <?php endforeach; ?>
                                </select>
                                </div>
                                <br>
                                <div class="element">
                                <label>Selectionner l'éleve : </label>
                                <select name="idEleve" required>
                                <?php foreach($eleves as $eleve): ?>
                                        <option value=<?=$eleve['IdEleve']?>>- <?php echo $eleve['Nom']." ".$eleve['Prenom'];?></option>
                                <?php endforeach; ?>
                                </select>
                                </div>
                                <br>
                                <div class="element">
                                <input type="submit" id="ajouter" value="Affecter" name="affecter">
                                
                                </div>
                               
                    </form>

            </div>
        </div>
    </section>
    <section class="user">
    <div class="titreSection"><h3>Gestion des admins</h3></div>
            <div class="contentUser">
            <div class="affichUser">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col ">#</th>
                            <th scope="col ">Nom</th>
                            <th scope="col ">Prénom</th>
                            <th scope="col ">Adresse</th>
                            <th scope="col ">Email</th>
                            <th scope="col ">Phone 1</th>
                            <th scope="col ">Phone 2</th>
                        </tr>
                    </thead>
                    <tbody id="tableauForm">
                        <?php foreach($admins as $admin): ?>
                            <tr>
                             <td><?= $admin['IdAdmin']?></td>
                             <td><?= $admin['Nom']?></td>
                             <td><?= $admin['Prenom']?></td>
                             <td><?= $admin['Adresse']?></td>
                             <td><?= $admin['Email']?></td>
                             <td><?= $admin['Phone1']?></td>
                             <td><?= $admin['Phone2']?></td>
                             <td>
                                <form action="GestionUtilisateur" method="POST">
                                      <input type="submit" value="supprimer" name="supprimerAdmin">
                                      <input type="hidden" name="idAdmin" value="<?php echo "".$admin['IdAdmin']."" ?>"></input>
                                </form>
                            </td>
                            </tr> 
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="ajouterUser">
            <center><h3>Ajouter / Modifier un compte admin</h3></center>
                <br><br>
                     <form action="GestionUtilisateur" method="POST" required>
                                <div class="element">
                                <label>Id : </label>
                                <input type="number" id="id" name="id" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Nom : </label>
                                <input type="text" id="nom" name="nom"size="13" required>
                                <label>Prénom : </label>
                                <input type="text" id="prenom" name="prenom"size="13" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Adresse : </label>
                                <input type="text" id="adresse" name="adresse"size="16" required>
                                <label>Email : </label>
                                <input type="text" id="email" name="email"size="13" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Phone1 : </label>
                                <input type="number" id="phone1" name="phone1" min="0" max="9999999999"required>
                                <label>Phone2 : </label>
                                <input type="number" id="phone2" name="phone2" min="0" max="9999999999" required>
                                </div>
                                <br>
                                <div class="element">
                                <label>Login : </label>
                                <input type="text" id="login" name="login"size="13" required>
                                <label>Password : </label>
                                <input type="text" id="pwd" name="pwd"size="13" required>
                                </div>
                                <br>
                                <div class="element">
                                <input type="submit" id="ajouter" value="Ajouter/Modifier" name="ajouterAdmin">
                                
                                </div>
                    </form>
            </div>
        </div>
    </section>


</section>