<?php
		require_once '../Modele/database.php';
		require_once '../Modele/databasePatient.php';

		// Information d'ajout Patient
		if (isset($_post['addinscription']) && $_post['addinscription'] == 'false') {
            echo "<div class='alert_danger'>
                 	<strong>inscription non ajouté. </strong> 
                    Veuillez nous contacter pour plus d'informations !
                  </div>";           				
         }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="../Assets/Css/inscription.css">
</head>
<body>
         <!--  debut header -->
    <header>
       <img src="../Assets/images/logo.png" alt="">
        <ul class="menu">
            <a href="../index.php">Accueil</a>
            <a href="#">services</a>
            <a href="#">Apropos</a>
            <a href="#">Contact</a>
        </ul>
        <div class="">
        <a href="../View/inscription.php" class="inscrire"></a>
        </div>
        
    </header>
     <!-- fin header -->
     
     <!-- formulaire -->
     <div class="body">
     <div class="container">
        <h1 class="titre">Formulaire d'inscription</h1>
        <form  action="rvpatient.php" method="post">
            <div class="main-user-infos">
                <div class="user-input-box">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Entrer Votre Nom">
                </div>
                <div class="user-input-box">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Entrer Votre Prenom">
                </div>
                <div class="user-input-box">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Entrer Votre Email">
                </div>
                <div class="user-input-box">
                    <label for="telephone">Telephone</label>
                    <input type="text" id="telephone" name="telephone" placeholder="Entrer Votre Telephone">
                </div>
                <div class="user-input-box">
                    <label for="mdp">Mot de Passe</label>
                    <input type="password" id="mdp" name="mdp" placeholder="">
                </div>
                <div class="user-input-box">
                    <label for="confirmer">Confirmer Mot de Pass</label>
                    <input type="password" id="cmdp" name="cmdp" placeholder="">
                </div>
            </div>
            <div class="genre">
                <span class="titre-genre">Genre</span>
                <div class="categorie">
                    <input type="radio" name="sexe" id="homme">
                    <label for="homme">Homme</label>
                    <input type="radio" name="sexe" id="femme">
                    <label for="femme">Femme</label>
                   
                </div>
            </div>
            <div class="soumettre">
            <input type="submit" value="Soumettre">
            </div>
        </form>
    </div>
     </div>

   <!-- fin formulaire -->
</body>
</html>